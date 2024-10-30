<?php
include "../include/topo.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        //fazer select para consultar o cpf na tabela usuarios
        //se não existir registro inserir usuario
        $sql = "INSERT INTO cadastro_fun
            (id_funcionario, nome, cpf, cargo, cep, valor_hora, data_inicio, empresa)
            VALUES (NULL, :nome, :cpf, :cargo,:cep, :valor_hora, CURDATE(), :empresa)";

        $comando = $banco->prepare($sql);

        // Bind dos parâmetros
        $comando->bindParam(':nome', $_POST["nome"]);
        $comando->bindParam(':cpf', $_POST["cpf"]);
        $comando->bindParam(':cargo', $_POST["cargo"]);
        $comando->bindParam(':cep', $_POST["cep"]);
        $comando->bindParam(':valor_hora', $_POST["valor_hora"]);
        $comando->bindParam(':empresa', $_SESSION["usuario"]["id_usuario"]);




        if ($comando->execute()) {
            echo "Cadastro efetuado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="cadastrarfun.css">
</head>

<body>
    <div class="header">
        CADASTRAR FUNCIONÁRIOS
    </div>

    <div class="container">
        <div>
            <img src="user_image_placeholder.png" alt="Ícone de Funcionário">
            <div class="back-button">

            </div>
        </div>

        <div class="form-container">
            <h2>Cadastrar Funcionário</h2>
            <form action="cadastrarfun.php" method="post">
                <input type="text" id="nome" name="nome" placeholder="Nome" required>
                <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <input type="text" id="cargo" name="cargo" placeholder="Cargo" required>

                <!-- Agrupando os campos CEP e Valor Hora na mesma linha -->
                <div class="cep-valor-hora">
                    <input type="text" id="cep" name="cep" placeholder="CEP" required>
                    <input type="number" id="valor_hora" name="valor_hora" placeholder="Valor hora" required>
                </div>

                <button type="submit">Adicionar</button>
            </form>
        </div>
    </div>
    <div class="boxvazia"></div>
    <?php
    include "../include/rodape.php";
    ?>
</body>

</html>
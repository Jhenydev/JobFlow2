<?php
$css = "cadastrarfun.css";
include "../include/topo.php";

// Inicializa variável para mensagens de alerta
$mensagemToastr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Verifica se o CPF existe na tabela de usuários
        $sqlVerificaCPF = "SELECT id_usuario FROM usuarios WHERE cpf = :cpf";
        $comandoVerifica = $banco->prepare($sqlVerificaCPF);
        $comandoVerifica->bindParam(':cpf', $_POST["cpf"]);
        $comandoVerifica->execute();

        // Se o CPF existir, prossegue com o cadastro
        if ($comandoVerifica->rowCount() > 0) {
            $id_usuario = $comandoVerifica->fetchColumn();

            // Preparar o comando para inserir o funcionário
            $sql = "INSERT INTO cadastro_fun
                (id_funcionario, nome, cpf, cargo, cep, valor_hora, data_inicio, empresa)
                VALUES (:id_funcionario, :nome, :cpf, :cargo, :cep, :valor_hora, CURDATE(), :empresa)";

            $comando = $banco->prepare($sql);

            // Bind dos parâmetros
            $comando->bindParam(':id_funcionario', $id_usuario);
            $comando->bindParam(':nome', $_POST["nome"]);
            $comando->bindParam(':cpf', $_POST["cpf"]);
            $comando->bindParam(':cargo', $_POST["cargo"]);
            $comando->bindParam(':cep', $_POST["cep"]);
            $comando->bindParam(':valor_hora', $_POST["valor_hora"]);
            $comando->bindParam(':empresa', $_SESSION["usuario"]["id_usuario"]);

            if ($comando->execute()) {
                $mensagemToastr = "success|Cadastro efetuado com sucesso!";
                header("location:../empresa/empresa.php");
            } else {
                $mensagemToastr = "error|Erro ao cadastrar usuário.";
            }
        } else {
            $mensagemToastr = "warning|Usuário não encontrado. Por favor, verifique o CPF.";
        }
    } catch (PDOException $e) {
        $mensagemToastr = "error|Erro:" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<?php
include '../include/headerfuncionario.php';
?>
<body>
    <div class="container">
        <div>
            <img src="../img/cadastraricon.png" alt="Ícone de Funcionário">
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
    <?php include "../include/rodape.php"; ?>

    <script>
        $(document).ready(function () {
            <?php
            if (!empty($mensagemToastr)) {
                list($tipo, $mensagem) = explode('|', $mensagemToastr);
                echo "toastr.$tipo('$mensagem');";
            }
            ?>
        });
    </script>

    <div class="espaco">
        
    </div>
</body>
</html>

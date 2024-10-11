<?php

include "conexao.php";
include "navbar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    
    try {
        // Verificar se o funcionário já existe (com base no CPF)
        $sql_verifica = "SELECT * FROM cadastro_fun WHERE cpf = :cpf";
        $comando_verifica = $banco->prepare($sql_verifica);
        $comando_verifica->bindParam(':cpf', $cpf);
        $comando_verifica->execute();

        if ($comando_verifica->rowCount() > 0) {
            // Se o CPF já existe, fazer o UPDATE (edição)
            $sql = "UPDATE cadastro_fun SET nome = :nome, cargo = :cargo, cep = :cep, valor_hora = :valor_hora WHERE cpf = :cpf";
        } else {
            // Se o CPF não existe, fazer o INSERT (novo cadastro)
            $sql = "INSERT INTO cadastro_fun (id_funcionario, nome, cpf, cargo, cep, valor_hora)
                    VALUES (NULL, :nome, :cpf, :cargo, :cep, :valor_hora)";
        }
        
        $comando = $banco->prepare($sql);

        // Bind dos parâmetros
        $comando->bindParam(':nome', $_POST["nome"]);
        $comando->bindParam(':cpf', $_POST["cpf"]);
        $comando->bindParam(':cargo', $_POST["cargo"]);
        $comando->bindParam(':cep', $_POST["cep"]);
        $comando->bindParam(':valor_hora', $_POST["valor_hora"]);

        if ($comando->execute()) {
            echo $comando_verifica->rowCount() > 0 ? "Dados atualizados com sucesso!" : "Cadastro efetuado com sucesso!";
        } else {
            echo "Erro ao salvar os dados.";
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Lógica para remover funcionário
if (isset($_POST["remover"])) {
    try {
        $sql_remover = "DELETE FROM cadastro_fun WHERE cpf = :cpf";
        $comando_remover = $banco->prepare($sql_remover);
        $comando_remover->bindParam(':cpf', $_POST["cpf"]);

        if ($comando_remover->execute()) {
            echo "Funcionário removido com sucesso!";
        } else {
            echo "Erro ao remover funcionário.";
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
    <title>Editar ou Remover Funcionário</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .header {
            background-color: #F69D3B;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 50px auto;
            width: 70%;
        }

        .container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .cep-valor-hora {
            display: flex;
            gap: 15px;
        }

        .cep-valor-hora input {
            width: calc(50% - 20px);
        }

        button {
            background-color: #F69D3B;
            color: white;
            padding: 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .remover-button {
            background-color: #e74c3c;
            margin-top: 10px;
        }

        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .back-button button {
            background-color: #F69D3B;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="header">
        EDITAR OU REMOVER FUNCIONÁRIO
    </div>

    <div class="container">
        <div>
            <img src="user_image_placeholder.png" alt="Ícone de Funcionário">
        </div>

        <div class="form-container">
            <h2>Editar Funcionário</h2>
            <form action="" method="post">
                <input type="text" id="nome" name="nome" placeholder="Nome" required>
                <input type="text" id="cpf" name="cpf" placeholder="CPF (Necessário para atualizar/remover)" required>
                <input type="text" id="cargo" name="cargo" placeholder="Cargo" required>

                <!-- Agrupando os campos CEP e Valor Hora na mesma linha -->
                <div class="cep-valor-hora">
                    <input type="text" id="cep" name="cep" placeholder="CEP" required>
                    <input type="number" id="valor_hora" name="valor_hora" placeholder="Valor hora" required>
                </div>

                <button type="submit">Salvar Alterações</button>
            </form>

            <!-- Botão para remover funcionário -->
            <form action="" method="post">
                <input type="hidden" name="cpf" id="cpf-remover" required>
                <button type="submit" name="remover" class="remover-button">Remover Funcionário</button>
            </form>
        </div>
    </div>

    <?php
    include "topo.php";
?>
</body>
</html>

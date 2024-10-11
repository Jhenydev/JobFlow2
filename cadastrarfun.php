<?php
include "topored.php";
include "conexao.php";


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
            width: calc(50% - 15px);
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
        .boxvazia {
            padding: 50px;
        }

    </style>
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
include "rodape.php";
?>
</body>
</html>

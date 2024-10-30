<?php

include "../include/topo.php"; // Incluindo o topo aqui

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO usuarios 
            (id_usuario, nome, email, telefone, data_nascimento, sexo, cpf, endereco, bairro, cidade, estado, cep, senha)
            VALUES (NULL, :nome, :email, :telefone, :data_nascimento, :sexo, :cpf, :endereco, :bairro, :cidade, :estado, :cep, :senha)";
        
        $comando = $banco->prepare($sql);

        $comando->bindParam(':nome', $_POST["nome"]);
        $comando->bindParam(':email', $_POST["email"]);

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
    <title>Página Salário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5F5;
        }
        .header {
            /* Adicione aqui os estilos para o seu topo, se necessário */
            background-color: #d9534f; /* Exemplo de cor */
            color: white;
            padding: 5px;
            text-align: center; /* Centralizando o texto no topo */
        }
        .content {
            padding: 30px;
            text-align: center;
            background-color: white;
            width: 60%;
            height: 300px;
            margin: 20px auto; /* Centraliza horizontalmente e adiciona espaço acima/abaixo */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* Permite que a posição interna seja controlada */
            top: 0; /* Ajusta a posição vertical do conteúdo */
        }
        .box {
            display: inline-block;
            width: 15%;
            margin-right: 4%;
            border: 2px solid #555;
            padding: 10px;
            border-radius: 4px;
        }
        .box .label {
            font-size: 16px;
            color: white;
            border-radius: 3px;
            background-color: #d9534f;
        }
        .box .value {
            font-size: 20px;
            font-weight: bold;
            
        }
        .box.right {
            text-align: center;
            border: 2px solid #555;
            width: 500px;
            height: 200px;
            border-radius: 4px;
            line-height: 90px;
        }
        .box.right .value {

            font-size: 40px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
       
    </div>
    <div class="content">
        <div class="box">
            <div class="label">Salário hora:</div>
            <div class="value" id="salario_hora">R$</div>
        </div>
        <div class="box right">
            <div class="label">Ganho previsto no mês:</div>
            <div class="value" id="ganhos">R$ </div>
        </div>
    </div>
</body>
</html>

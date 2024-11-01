<?php
include '../include/headerfuncionario.php';
?>

<?php

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
    <link rel="stylesheet" href="ganhos.css">
    
</head>
<body>

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

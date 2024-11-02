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

<div class="boxes" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px;">
        <div class="buttons-container">
            <form id="pontoForm" method="POST">
                <div class="button-item">
                <h2>Ganhos Previstos</h2>
                    <hr style="width: 100%; margin: 20px auto;">
                    <h3> R$ 29,90
                </div>
            </form>
        </div>

        <div class="buttons-container">
            <form id="pontoForm2" method="POST">
                <div class="button-item">
                    <h3>Horas Trabalhadas</h3>
                    <hr style="width: 100%; margin: 20px auto;">
                </div>
            </form>
        </div>
    </div>



</body>
</html>

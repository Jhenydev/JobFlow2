<?php 
include "topored.php";
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO ponto
            (id_ponto, id_usuario, hora_entrada, hora_saida, data)
            VALUES (NULL, :id_usuario, : hora_entrada, : hora_saida, :data)";
        
        $comando = $banco->prepare($sql);
        

        $comando->bindParam(':id_usuario', $_POST["id_usuario"]);
        $comando->bindParam(':hora_entrada', $_POST[" hora_entrada"]);
        $comando->bindParam(':hora_saida', $_POST["hora_saida"]);
        $comando->bindParam(':data', $_POST["data"]);
        
    
        
        if ($comando->execute()) {
            echo "Ponto efetuado com sucesso!";
        } else {
            echo "Não foi possivel marcar o ponto";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

date_default_timezone_set('America/Sao_Paulo');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $data_hora = date('Y-m-d H:i:s'); // Data e hora atuais do servidor

    // Salvando a data e hora da última marcação no localStorage do navegador
    echo "<script>
        localStorage.setItem('ultimaMarcacao', '$data_hora');
    </script>";

    echo "<p>Ponto marcado com sucesso!</p>";
    echo "<p>Data e Hora: $data_hora</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Ponto</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .time-container {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .button-item {
            margin: 15px 0;
            width: 100%;
            max-width: 300px;
        }

        .buttons-container button {
            padding: 25px;
            align-items: center;
            font-size: 16px;
            background-color: #C94C51;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .history-container {
            margin-top: 30px;
            text-align: center;
        }
    </style>

    <script>
        function marcarPonto() {
            // Enviar o formulário para marcar o ponto
            document.getElementById('pontoForm').submit();
        }

        // Função para carregar o horário da última marcação de ponto
        function carregarHistorico() {
            const ultimaMarcacao = localStorage.getItem('ultimaMarcacao');
            if (ultimaMarcacao) {
                document.getElementById('historico').innerText = 'Última marcação: ' + ultimaMarcacao;
            } else {
                document.getElementById('historico').innerText = 'Ainda não houve marcações de ponto.';
            }
        }

        // Carregar o histórico ao iniciar a página
        window.onload = function() {
            carregarHistorico();
        }
    </script>
</head>
<body>

<h1>Marcar Ponto</h1>

<div class="buttons-container">
    <form id="pontoForm" method="POST">
        <div class="button-item">
            <button type="button" onclick="marcarPonto()">Entrada</button>
            <button type="button" onclick="marcarPonto()">Saida</button>
        </div>
    </form>
</div>

<div class="history-container">
    <h2>Histórico</h2>
    <p id="historico"></p>
</div>


<?php
    include "rodape.php";
?>
</body>
</html>

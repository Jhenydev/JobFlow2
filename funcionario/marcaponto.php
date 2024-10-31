<?php


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
    <link rel="stylesheet" href="marcaponto.css">

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

<div class="header">
        <img src="profile.jpg" alt="Foto de Perfil" class="profile-pic">
        <div class="user-info">
            <div class="user-name">Mary Lorem</div>
            <div class="user-position">839478 - Analista de Marketing</div>
            <div class="tags">
                <div class="tag">Filial: LDC Transporte Centro-oeste</div>
                <div class="tag">Depto: Depósito Centro de Distribuição</div>
            </div>
        </div>
        <div class="email-icon">✉️</div>
    </div>
    

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
    include "../include/rodape.php";
    ?>
</body>

</html>
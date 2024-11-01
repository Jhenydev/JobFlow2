<?php
include '../include/headerfuncionario.php';
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
            
            document.getElementById('pontoForm').submit();
        }

        
        function carregarHistorico() {
            const ultimaMarcacao = localStorage.getItem('ultimaMarcacao');
            if (ultimaMarcacao) {
                document.getElementById('historico').innerText = 'Última marcação: ' + ultimaMarcacao;
            } else {
                document.getElementById('historico').innerText = 'Ainda não houve marcações de ponto.';
            }
        }

        
        window.onload = function () {
            carregarHistorico();
        }
    </script>
</head>

    <div class="boxes" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px;">
        <div class="buttons-container">
            <form id="pontoForm" method="POST">
                <div class="button-item">
                    <h3>Marcar Ponto</h3>
                    <hr style="width: 100%; margin: 20px auto;">
                    <button type="button" onclick="marcarPonto()">Entrada</button>
                    <button type="button" onclick="marcarPonto()">Saída</button>
                </div>
            </form>
        </div>

        <div class="buttons-container">
            <form id="pontoForm2" method="POST">
                <div class="button-item">
                    <h3>Histórico</h3>
                    <hr style="width: 100%; margin: 20px auto;">
                </div>
            </form>
        </div>
    </div>

    <?php include "../include/rodape.php"; ?>
</body>

</html>

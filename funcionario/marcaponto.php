<?php
session_start();
include_once '../include/conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $hora_tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : null;
        $hora_atual = date('H:i:s');
        $data_atual = date('Y-m-d');

        if ($hora_tipo) {
            $sql = "INSERT INTO marca_ponto
                (id_ponto, id_usuario, hora_entrada, hora_saida, data)
                VALUES (NULL, :id_usuario, :hora_entrada, :hora_saida, :data)";

            $comando = $banco->prepare($sql);

       
            $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
            $comando->bindParam(':data', $data_atual);

            if ($hora_tipo === 'entrada') {
                $comando->bindParam(':hora_entrada', $hora_atual);
                $comando->bindValue(':hora_saida', null, PDO::PARAM_NULL);
            } else {
                $comando->bindValue(':hora_entrada', null, PDO::PARAM_NULL);
                $comando->bindParam(':hora_saida', $hora_atual);
            }

            if ($comando->execute()) {
                echo "Ponto de $hora_tipo registrado com sucesso!";
                $_SESSION["ultimaMarcacao"] = "$hora_tipo - " . date('H:i:s');
            } else {
                echo "Erro ao marcar o ponto.";
            }
        } else {
            echo "Erro: Tipo de marcação não especificado.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
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
        function carregarHistorico() {
            const ultimaMarcacao = "<?php echo $_SESSION['ultimaMarcacao'] ?? 'Ainda não houve marcações de ponto.'; ?>";
            document.getElementById('historico').innerText = 'Última marcação: ' + ultimaMarcacao;
        }

        window.onload = function() {
            carregarHistorico();
        }
    </script>
</head>

<body>
    <div class="boxes" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px;">
        <div class="buttons-container">
            <form id="pontoForm" method="POST">
                <div class="button-item">
                    <h3>Marcar Ponto</h3>
                    <hr style="width: 100%; margin: 20px auto;">
                    
                    <!-- Botões de entrada e saída com o mesmo nome e valores diferentes -->
                    <button type="submit" name="tipo" value="entrada">Entrada</button>
                    <button type="submit" name="tipo" value="saida">Saída</button>
                    
                    <div class="justificar">
                        <button type="button" onclick="alert('Justificativa de Ponto')">Justificar Ponto</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="buttons-container">
            <div class="button-item">
                <h3>Histórico do dia</h3>
                <hr style="width: 100%; margin: 20px auto;">
                <p id="historico">Carregando histórico...</p>
            </div>
        </div>
    </div>

    <?php include "../include/rodape.php"; ?>
</body>

</html>

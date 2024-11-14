<?php
session_start();
include_once '../include/conexao.php'; 

include '../include/headerfuncionario.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $empresa = $_POST["empresa"];
        $hora_tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : null;
        $hora_atual = date('H:i:s');
        $data_atual = date('Y-m-d');

        if ($hora_tipo) {
            if ($hora_tipo == 'entrada'){
                $sql = "INSERT INTO marca_ponto
                (id_usuario, empresa, data, hora_entrada)
                VALUES (:id_usuario, :empresa, :data, :hora)";
            } else {
                $sql = "UPDATE marca_ponto set hora_saida = :hora
                where id_usuario = :id_usuario and empresa = :empresa";

            }
            

            $comando = $banco->prepare($sql);

       
            $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);

            $comando->bindParam(':empresa', $empresa);
            $comando->bindParam(':hora', $hora_atual);
            if ($hora_tipo == 'entrada'){
                $comando->bindParam(':data', $data_atual);
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
    <br><br>
<a href="indexfuncionario.php" class="botao">Voltar</a> 
    <div class="boxes" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px;">
        <div class="buttons-container">
            <form id="pontoForm" method="POST">
                <div class="button-item">
                    <h3>Marcar Ponto</h3>
                    <hr style="width: 100%; margin: 20px auto;">

                    <?php
    
    $sql = "SELECT  empresa, usuarios.nome 
FROM cadastro_fun INNER JOIN usuarios ON (empresa = id_usuario) 
WHERE cadastro_fun.cpf = ?";
    $comando = $banco->prepare($sql);
    $comando->execute(array($_SESSION["usuario"]["cpf"]));
    
    while ($registro = $comando->fetch()) {
        extract($registro, EXTR_PREFIX_ALL, "campo");
    
        echo "<input type = 'radio' name = 'empresa' value = '$campo_empresa' required >$campo_nome<br>";
    }

    ?>
                    
                    <button type="submit" name="tipo" value="entrada">Entrada</button>
                    <button type="submit" name="tipo" value="saida">Saída</button>
                    
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
        
        
        <div class="buttons-container">
    <div class="button-item">
        <h3>Esqueceu de Marcar?</h3>
        <hr style="width: 100%; margin: 20px auto;">

        <form method="POST">
            <?php 
            $sql = "SELECT empresa, usuarios.nome 
                    FROM cadastro_fun 
                    INNER JOIN usuarios ON (empresa = id_usuario) 
                    WHERE cadastro_fun.cpf = ?";
            $comando = $banco->prepare($sql);
            $comando->execute(array($_SESSION["usuario"]["cpf"]));

            while ($registro = $comando->fetch()) {
                extract($registro, EXTR_PREFIX_ALL, "campo");

                // Exibe os botões de rádio para selecionar a empresa
                echo "<input type='radio' name='empresa' value='$campo_empresa' required>$campo_nome<br>"; 
            }
            ?>

            <label for="entrada">Entrada</label>
            <input type="time" name="entrada" id="entrada" required>

            <label for="saida">Saída</label>
            <input type="time" name="saida" id="saida" required>

            <label for="data">Data</label>
            <input type="date" name="data" id="data" required>

            <label for="justificativa">Justificativa</label>
            <textarea name="justificativa" id="justificativa" placeholder="Escreva sua justificativa aqui" rows="4" required></textarea>

            <button type="submit" name="tipo" value="JUSTIFICAR">Justificar</button>
        </form>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tipo"]) && $_POST["tipo"] === "JUSTIFICAR") {
            // Preparar SQL para inserir os dados no banco
            $sql = "INSERT INTO justificar (id_usuario, empresa, justificativa, data, entrada, saida)
                    VALUES (:id_usuario, :empresa, :justificativa, :data, :entrada, :saida)";
            $comando = $banco->prepare($sql);

            // Passa os valores capturados pelo POST
            $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
            $comando->bindParam(':empresa', $_POST["empresa"]);
            $comando->bindParam(':justificativa', $_POST["justificativa"]);
            $comando->bindParam(':data', $_POST["data"]);
            $comando->bindParam(':entrada', $_POST["entrada"]);
            $comando->bindParam(':saida', $_POST["saida"]);

            // Executa e verifica o resultado
            if ($comando->execute()) {
                echo "<p>Mensagem enviada com sucesso!</p>";
                header("Location: ../funcionario/marcaponto.php");
                exit;
            } else {
                echo "<p>Erro ao enviar a mensagem</p>";
            }
        }
        ?>
    </div>  
</div>
    </div>
<div class="espaco">

</div>
  

    <?php include "../include/rodape.php"; ?>
</body>

</html>
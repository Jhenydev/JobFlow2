<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once '../include/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_single'])) {
    try {
        $empresa = $_POST['empresa'];
        $data = $_POST['data'];
        $entrada = $_POST['entrada'];
        $saida = $_POST['saida'];

        $sql = "DELETE FROM justificar 
                WHERE id_usuario = :id_usuario 
                  AND empresa = :empresa 
                  AND data = :data 
                  AND entrada = :entrada 
                  AND saida = :saida";
                  
        $comando = $banco->prepare($sql);
        $comando->bindParam(':id_usuario', $_SESSION['usuario']['id_usuario']);
        $comando->bindParam(':empresa', $empresa);
        $comando->bindParam(':data', $data);
        $comando->bindParam(':entrada', $entrada);
        $comando->bindParam(':saida', $saida);
        $comando->execute();

        echo "<p>Notificação concluída e removida com sucesso!</p>";
    } catch (PDOException $e) {
        echo "<p>Erro ao remover notificação: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações</title>
    <link rel="stylesheet" href="empresa.css">
    <link rel="stylesheet" href="notificacoes.css">
</head>
<body>

<div class="container">
    <div class="menu">
        <a href="cadastrarfun.php">
            <button>CADASTRAR FUNCIONÁRIO</button> 
        </a>
        <a href="gerenciarfun.php">
            <button>GERENCIAR FUNCIONÁRIO</button> 
        </a>
    </div>
</div>

<div class="notifications-container">
    <h2>Notificações</h2>
    <ul id="notificationsList">
        <?php
        try {
            $sql = "SELECT empresa, justificativa, data, entrada, saida 
                    FROM justificar 
                    WHERE id_usuario = :id_usuario 
                    ORDER BY data DESC";
            $comando = $banco->prepare($sql);
            $comando->bindParam(':id_usuario', $_SESSION['usuario']['id_usuario']);
            $comando->execute();

            if ($comando->rowCount() > 0) {
                while ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li class='notification-item'>";
                    echo "<div class='notification-text'>";
                    echo "<strong>Empresa:</strong> {$registro['empresa']}<br>";
                    echo "<strong>Data:</strong> {$registro['data']}<br>";
                    echo "<strong>Justificativa:</strong> {$registro['justificativa']}<br>";
                    echo "<strong>Entrada:</strong> {$registro['entrada']}<br>";
                    echo "<strong>Saída:</strong> {$registro['saida']}";
                    echo "</div>";
                    echo "<form method='POST' action='' class='delete-form'>";
                    echo "<input type='hidden' name='empresa' value='{$registro['empresa']}'>";
                    echo "<input type='hidden' name='data' value='{$registro['data']}'>";
                    echo "<input type='hidden' name='entrada' value='{$registro['entrada']}'>";
                    echo "<input type='hidden' name='saida' value='{$registro['saida']}'>";
                    echo "<button type='submit' name='delete_single' class='complete-btn'>Concluído</button>";
                    echo "</form>";
                    echo "</li>";
                }
            } else {
                echo "<li class='notification-item'>Nenhuma notificação encontrada.</li>";
            }
        } catch (PDOException $e) {
            echo "<p>Erro ao carregar notificações: " . $e->getMessage() . "</p>";
        }
        ?>
    </ul>
</div>

</body>
</html>
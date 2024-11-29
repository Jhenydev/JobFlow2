<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once '../include/conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_single'])) {
    try {

        $id = $_POST['id_justificativa'];



        $sql = "UPDATE   justificar SET situacao = 'Recusado'
                WHERE id = :id";

        $comando = $banco->prepare($sql);
        $comando->bindParam(':id', $id);
        $comando->execute();

        echo "<p>Notificação concluída e removida com sucesso!</p>";
    } catch (PDOException $e) {
        echo "<p>Erro ao remover notificação: " . $e->getMessage() . "</p>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aceitar'])) {
    try {

        $id = $_POST['id_justificativa'];
        $hora_entrada = $_POST['hora_entrada'];
        $hora_saida = $_POST['hora_saida'];

        $sql = "SELECT * FROM justificar WHERE id = :id";
        $comando = $banco->prepare($sql);
        $comando->bindParam(':id', $id);
        $comando->execute();

        if ($registro_justificar = $comando->fetch(PDO::FETCH_ASSOC)) {
            $sql = "SELECT * FROM marca_ponto 
                WHERE id_usuario = :id_usuario
                AND empresa = :empresa
                AND data = :data";
            $comando = $banco->prepare($sql);
            $comando->bindParam(':id_usuario', $registro_justificar["id_usuario"]);
            $comando->bindParam(':empresa', $registro_justificar["empresa"]);
            $comando->bindParam(':data', $registro_justificar["data"]);
            $comando->execute();

            if ($registro_marca_ponto = $comando->fetch(PDO::FETCH_ASSOC)) {

                $sql = "UPDATE  marca_ponto SET hora_entrada = :hora_entrada, hora_saida = :hora_saida
                WHERE id_usuario = :id_usuario
                AND empresa = :empresa
                AND data = :data";
    
                $comando = $banco->prepare($sql);
                $comando->bindParam(':id_usuario', $registro_justificar["id_usuario"]);
                $comando->bindParam(':empresa', $registro_justificar["empresa"]);
                $comando->bindParam(':data', $registro_justificar["data"]);
                $comando->execute();
    
            } else {

                $sql = "INSERT INTO marca_ponto (id_usuario, empresa, data, hora_entrada, hora_saida)
                    VALUES (:id_usuario, :empresa, :data, :hora_entrada, :hora_saida)";
    
                $comando = $banco->prepare($sql);
                $comando->bindParam(':id_usuario', $registro_justificar["id_usuario"]);
                $comando->bindParam(':empresa', $registro_justificar["empresa"]);
                $comando->bindParam(':data', $registro_justificar["data"]);
                $comando->bindParam(':hora_entrada', $hora_entrada);
                $comando->bindParam(':hora_saida', $hora_saida);
                $comando->execute();
    
            }



            $sql = "UPDATE   justificar SET situacao = 'Aceito'
            WHERE id = :id";

            $comando = $banco->prepare($sql);
            $comando->bindParam(':id', $id);
            $comando->execute();

            echo "<p>Notificação concluída e removida com sucesso!</p>";
        }
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
<?php
include '../include/headerfuncionario.php';
?>
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


                $sql = "
            SELECT id, id_usuario, empresa, justificativa, data, entrada, saida, usuarios.nome
            FROM justificar
            INNER JOIN usuarios USING (id_usuario)
            WHERE empresa = :empresa
            AND situacao is NULL
            ORDER BY data DESC";

                $comando = $banco->prepare($sql);
                $comando->bindParam(':empresa', $_SESSION['usuario']['id_usuario']);
                $comando->execute();


                if ($comando->rowCount() > 0) {
                    while ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li class='notification-item'>";
                        echo "<div class='notification-text'>";

                        echo "<form method='post'>";
                        echo "<input type='hidden' name='id_justificativa' value='{$registro["id"]}'>";
                        echo "<strong>Funcionario:</strong> {$registro['nome']}<br>";
                        echo "<strong>Data:</strong> {$registro['data']}<br>";
                        echo "<strong>Justificativa:</strong> {$registro['justificativa']}<br>";
                        echo "<strong>Entrada:</strong> <input type='time' name='hora_entrada' value='{$registro['entrada']}' id='hora_entrada'/><br>";
                        echo "<strong>Saída:</strong> <input type='time' name='hora_saida' value='{$registro['saida']}' id='hora_saida'/>";
                        echo "<button class='salvar' name='aceitar' type='submit'>Salvar Alterações</button>";
                        echo "</form>";

                        echo "</div>";

                        echo "<form method='POST' action='' class='delete-form'>";
                        echo "<input type='hidden' name='id_justificativa' value='{$registro['id']}'>";
                        echo "<button type='submit' name='delete_single' class='complete-btn'>Recusar</button>";
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

    <div class="data-preview">


        <?php
        $sql = "UPDATE marca_ponto SET hora_entrada = :hora_entrada, hora_saida = :hora_saida
                WHERE id_usuario = :id_usuario AND empresa = :empresa";

        $comando = $banco->prepare($sql);
        $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
        $comando->bindParam(':empresa', $empresa);
        $comando->bindParam(':hora_entrada', $hora_entrada);
        $comando->bindParam(':hora_saida', $hora_saida);


        if ($comando->execute()) {
            
        } else {
            echo "Erro ao executar a atualização.";
        }
        ?>

       


    </div>


</body>

</html>
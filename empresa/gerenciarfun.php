<?php
include "../include/topo.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="gerenciarfun.css">

</head>

<body>

    <div class="header">
        <div class="logo">Painel de Controle</div>
    </div>

    <div class="container">
        <?php
        $sql = "SELECT * FROM cadastro_fun where empresa =?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($_SESSION["usuario"]["id_usuario"]));

        while ($registro = $comando->fetch()) {
            extract($registro, EXTR_PREFIX_ALL, "campo");

            echo "
        <div class='card'>
            <img src='https://via.placeholder.com/70' alt='Avatar'>
            <div class='dados'>
                <h2 class='nome'>$campo_nome</h2>
                <p class='cpf'>$campo_cpf</p>
                <p class='cep'>$campo_cep</p>
                <br>
                <a href='geren2.php' class='button'>GERENCIAR</a>
            </div>
        </div>
        ";
        }
        ?>
    </div>

</body>

</html>
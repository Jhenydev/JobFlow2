<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    // session isn't started
    session_start();
}
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
}
if (!isset($_SESSION["usuario"])) {
    // header("location: ../usuario/index.php");
    // exit();
    echo ("Voce esta desconectado.");
}
include "../include/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCC</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <?php
    if (isset($_SESSION["usuario"])) {
    ?>
        <link rel="stylesheet" href="../include/topoConec.css">
    <?php
    } else {

    ?>
        <link rel="stylesheet" href="../include/topoDesconec.css">

    <?php
    }
    ?>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <?php
                if (isset($_SESSION["usuario"])) {
                    $logo = "white.png";
                ?>
                    <li><a href="index.php?logout"><i class="fa fa-sign-out-alt"></i> Sair</a></li>
                <?php
                } else {
                    $logo = "logojob.png";
                ?>
                    <li><a href="login.php"><i class="fa fa-user"></i>Entrar</a></li>

                <?php

                }
                ?>
                <li><a href="../usuario/index.php">Home</a></li>
                <li><a href="../usuario/quemsomos.php">Quem somos</a></li>
                <li><a href="../usuario/coberturas.php">Coberturas</a></li>
                <li><a href="../usuario/contato.php">Contato</a></li>
            </ul>
            <a href="index.php" class="logo" style="margin-right: 100px;">
                <img src="<?php echo $logo; ?>" alt="Logo JobFlow">
            </a>
        </div>
    </nav>



    <hr>

</body>

</html>
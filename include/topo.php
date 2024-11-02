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

if (isset($area_restrita)) {
    if (isset($_SESSION["logado"])) {
        if ($_SESSION["logado"] == 0) {
            include "../include/arearestrita.php";
            exit();
        }
    } else {
        include "../include/arearestrita.php";
        exit();
    }
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
    <?php if (!isset($css)) {
        if (isset($_SESSION["usuario"])) {
            $css = "../include/topoConec.css";
        } else {
            $css = "../include/topoDesconec.css";
        }
    } ?>
    <link rel="stylesheet" href="<?php echo $css; ?>">
</head>

<body>
    <?php
    if (!isset($navbar)) $navbar = "navbargeral.php";
    include $navbar;
    ?>

    <hr>

</body>

</html>
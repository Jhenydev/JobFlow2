<?php
session_start();
if(isset($_GET["logout"])){
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu TCC</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
</head>

<body>

<!-- Navbar com logo à direita e itens centralizados -->
<nav class="navbar">
    <div class="container">
        <!-- Itens da lista centralizados -->
        <ul class="nav-links">
        <li><a href="index.php?logout" type="submit"><i class="fa fa-sign-out-alt"></i> Sair</a></li>

            <li><a href="quemsomos.php">Quem somos</a></li>
            <li><a href="coberturas.php">Coberturas</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        <a href="index.php" class="logo" style="margin-right: 100px;">
            <img src="white.png" alt="Logo JobFlow">
        </a>
    </div>
</nav>


<style>
/* Estilos da navbar */
.navbar {
    background-color: #C94C51;
    padding: 5px;
}

.navbar .container {
    display: flex;
    justify-content: space-between; /* Espaça logo e lista */
    align-items: center;
}

.logo img {
    height: 40px; 
    margin-bottom: 30px;
}

/* Centralização dos links */
ul.nav-links {
    display: flex;
    justify-content: center;
    list-style: none;

}

ul.nav-links li {
    margin: 0 30px; /* Espaçamento entre os itens */
}

.nav-links a {
    text-decoration: none;
    color: white;
    font-size: 20px;
    transition: color 0.3s;
    font-size: 18px;
}
</style>

<?php
   // session_start();
?>

<hr>

</body>
</html>

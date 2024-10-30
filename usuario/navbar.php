<?php session_start() ?>
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
<nav class="navbar">
    <div class="container">
        <!-- Links à esquerda -->
        <ul class="nav-links left-links">
            <li><a href="quemsomos.html">Quem somos</a></li>
            <li><a href="coberturas.html">Coberturas</a></li>
            <li><a href="contato.html">Contato</a></li>
            <li><a href="index.php?logout" type="submit">Sair</a></li>
        </ul>
        <a href="index.php" class="logo">
            <img src="white.png" alt="Logo JobFlow" style="height: 30px;"> 
        </a>
    </div>
</nav>

<style> 
/* Estilo dos links da barra de navegação */
ul.nav-links {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

ul.nav-links.left-links {
    justify-content: flex-start; /* Links à esquerda */
}

ul.nav-links.right-links {
    justify-content: flex-end; /* Links à direita */
}

/* Espaçamento entre itens da lista */
ul.nav-links li {
    margin: 0 20px; 
}

/* Estilos da logo centralizada */
.navbar .logo {
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
    color: white;

    padding: 20px;
}

/* Estilos da barra de navegação */
.navbar {
    background-color: #C94C51;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5px;
}

/* Estilo do container para centralizar a logo e ajustar os links */
.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.logo img {
    display: block;
    max-height: 30px;
}

/* Estilos dos links */
.nav-links a {
    text-decoration: none;
    color: white; /* Cor das letras alterada para branco */
    font-size: 1em;
    transition: color 0.3s;
    font-size: 15px;
}

.nav-links a:hover {
    color: #4F86C6; /* Efeito de hover */
}

/* Responsividade */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: center;
    }

    .container {
        flex-direction: column;
    }

    .nav-links {
        flex-direction: column;
        width: 100%;
    }

    .nav-links li {
        margin: 15px 0;
    }
}
</style>

<hr>

</body>
</html>

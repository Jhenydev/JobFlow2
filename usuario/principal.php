<?php
include "../include/topo.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seu Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="principal.css">
</head>
<body>

<h1>Escolha seu Perfil</h1>
<p>Bem-vindo <b><?php echo $_SESSION["usuario"]["nome"]; ?></b> ao sistema.</p>

<div class="container">
    <a href="../funcionario/indexfuncionario.php">
        <button class="option-button">
            <i class="fas fa-user-tie"></i>
            <span>Sou Funcionário</span>
        </button>
    </a>
    <a href="../empresa/empresa.php">
        <button class="option-button">
            <i class="fas fa-building"></i>
            <span>Sou Empresa</span>
        </button>
    </a>
</div>


<?php

    
?>


<?php
include "../include/rodape.php";
?>

</body>
</html>

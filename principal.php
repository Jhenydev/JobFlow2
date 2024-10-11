<?php
include "topored.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seu Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            margin-top: 30px;
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #555;
        }

        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .option-button {
            background-color: #c94c51;
            color: #fff;
            padding: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s, transform 0.3s;
            width: 200px;
            position: relative;
            overflow: hidden;
        }

        .option-button:hover {
            background-color: #c94c51;
            transform: translateY(-3px);
        }

        .option-button i {
            font-size: 24px;
            margin-right: 10px;
        }

        .option-button span {
            display: block;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Escolha seu Perfil</h1>
<p>Bem-vindo <b><?php echo $_SESSION["usuario"]["nome"]; ?></b> ao sistema.</p>

<div class="container">
    <a href="indexfuncionario.php">
        <button class="option-button">
            <i class="fas fa-user-tie"></i>
            <span>Sou Funcionário</span>
        </button>
    </a>
    <a href="empresa.php">
        <button class="option-button">
            <i class="fas fa-building"></i>
            <span>Sou Empresa</span>
        </button>
    </a>
</div>


<?php

    
?>


<?php
include "rodape.php";
?>

</body>
</html>

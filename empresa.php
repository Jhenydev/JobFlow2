
<?php
    include "topored.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }
        .header {
            background-color: #f79321;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header .user {
            display: flex;
            align-items: center;
        }
        .header .user img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid white;
        }
        .header .user p {
            margin: 0;
            font-weight: bold;
            font-size: 18px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            display: flex;
            justify-content: space-around;
            padding: 60px;
        }
        .menu {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .menu button {
            width: 100vh;
            padding: 15px;
            background: #c94c51;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 17px;
            padding: 30px;
        }
        .pendencias {
            width: 500px;
            height: 300px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .pendencias h2 {
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
            Painel de Controle
        </div>
    </div>

    <div class="container">
        <div class="menu">

        <a href="cadastrarfun.php">
    <button>CADASTRAR FUNCIONARIOS</button> </a>

    <a href="gerenciarfun.php">
    <button>GERENCIAS FUNCIONARIOS</button> </a>

        </div>

    </div>

    <?php
include "rodape.php";
?>
</body>
</html>

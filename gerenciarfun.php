<?php
session_start();
include "conexao.php";
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
            background-color: #F69D3B;
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
        .container {
            display: flex;
            flex-wrap: wrap; /* Permite que os cartões se movam para a linha seguinte */
            justify-content: space-around;
            padding: 60px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 20%; /* Define a largura do cartão para 30% */
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            margin-bottom: 20px;
        }
        .card img {
            border-radius: 50%;
            width: 70px;
            height: 70px;
            margin-right: 20px;
        }
        .card .dados {
            flex-grow: 1;
            margin-left: 20px; 
            line-height: 1.1;
        }
        .card h2 {
            font-size: 18px;
            margin: 0;
        }
        .card p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .button {
            background-color: #F69D3B;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #ff5a00;
        }
    </style>
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

    while($registro = $comando->fetch()) {
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

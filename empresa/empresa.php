
<?php
    include "../include/topo.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="empresa.css">
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
include "../include/rodape.php";
?>
</body>
</html>

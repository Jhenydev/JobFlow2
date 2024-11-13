<?php
$area_restrita = 1;
include '../include/headerfuncionario.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link rel="stylesheet" href="indexfuncionario.css"> 
</head>
<body>
    <?php
    include_once '../include/conexao.php'; 
    $sql = "SELECT  empresa, usuarios.nome, cadastro_fun.cargo
FROM cadastro_fun INNER JOIN usuarios ON (empresa = id_usuario) 
WHERE cadastro_fun.cpf = ?";

    $comando = $banco->prepare($sql);
    $comando->execute(array($_SESSION["usuario"]["cpf"]));
    
    echo "
    <table class='dados-table'>
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
";

while ($registro = $comando->fetch()) {
    extract($registro, EXTR_PREFIX_ALL, "campo");

    echo "
        <tr>
            <td>$campo_nome</td>
            <td>$campo_cargo</td>
        </tr>
    ";
}

echo "
        </tbody>
    </table>
";
?>

    <div class="container">
        <div class="menu">

        <a href="marcaponto.php">
                <button>MARCAR PONTO</button> </a>

            <a href="frequencia.PHP">
                <button>FREQUÊNCIA</button> </a>

            <a href="ganhos.php">
                <button>GANHOS</button> </a>

            
           
        </div>
    </div>

</body>

</html>
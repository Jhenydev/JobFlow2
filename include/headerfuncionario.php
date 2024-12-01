<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    // session isn't started
    session_start();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobFlow</title>
    <link rel="stylesheet" href="../funcionario/marcaponto.css">

</head>

<body>
    <div class="header">
    <button class="voltar" onclick="history.back()" style="background: none; border: none; cursor: pointer; display: flex; align-items: center;">
    <img src="../img/volte.png" alt="volte" width="40" height="40" style="margin-right: 10px;">
    
</button>
        <div class="user-info">
            
            <h3>
              <a href="../funcionario/profile.php" class="config"><?php echo $_SESSION["usuario"]["nome"]; ?></a>  
            </h3>
            </h3>
            <?php echo $_SESSION["usuario"]["cpf"]; ?>
        </div>
        <img src="../img/logowhite.png" alt="Logo" width="130" height="30" style="margin-right: 20px;">
    </div>

</body>

</html>
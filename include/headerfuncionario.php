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
    <title>Marcar Ponto</title>
    <link rel="stylesheet" href="marcaponto.css">
    
</head>

<body>
    <div class="header">
        <img src="profile.jpg" alt="Foto de Perfil" class="profile-pic">
        <div class="user-info">
        <?php echo $_SESSION["usuario"]["nome"]; ?></b> </p>
            <div class="user-position">839478 - Analista de Marketing</div>
        </div>
        <img src="../usuario/logowhite.png" alt="Logo" width="130" height="30" style="margin-right: 20px;">
    </div>
   
</body>

</html>

<nav class="navbar">
    <div class="container">
        <ul class="nav-links">
            <?php
                if (isset($_SESSION["usuario"])) {
                    $logo = "white.png";
            ?>
                <li><a href="index.php?logout"><i class="fa fa-sign-out-alt"></i> Sair</a></li>
                <li><a href="principal.php"></i>Perfil</a></li>
            <?php
                } else {
                $logo = "logojob.png";
                ?>
                    <li><a href="login.php"><i class="fa fa-user"></i>Entrar</a></li>
                <?php
            }
            ?>
            <?php
                if (!isset($_SESSION["usuario"])) {
                    $logo = "logojob.png";
            ?>
                <li><a href="../usuario/index.php">Home</a></li>
            <?php
                } else {
                ?>
                <?php
            }
            ?>
            <li><a href="../usuario/cobertura.php">Coberturas</a></li>
            <li><a href="../usuario/contato.php">Contato</a></li>
        </ul>
        <a href="index.php" class="logo" style="margin-right: 100px;">
            <img src="<?php echo $logo; ?>" alt="Logo JobFlow">
        </a>
    </div>
</nav>
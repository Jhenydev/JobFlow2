<?php
$css = "principal.css";
include "../include/topo.php";
?>




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

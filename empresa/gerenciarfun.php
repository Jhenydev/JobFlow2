<?php
$css = "gerenciarfun.css";
$navbar = "navbarempresa.php";
include "../include/topo.php";
?>

<body>

    <div class="container">
        <?php
        $sql = "SELECT * FROM cadastro_fun where empresa = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($_SESSION["usuario"]["id_usuario"]));

        while ($registro = $comando->fetch()) {
            extract($registro, EXTR_PREFIX_ALL, "campo");

            echo "
        <div class='card'>
            <img src='https://via.placeholder.com/70' alt='Avatar'>
            <div class='dados'>
                <h2 class='nome'>$campo_nome</h2>
                <p class='cpf'>$campo_cpf</p>
                <p class='cep'>$campo_cep</p>
                <br>
                <a href='geren2.php?id=$campo_id_funcionario' class='button'>GERENCIAR</a>
            </div>
        </div>
        ";
        }
        ?>
    </div>


</body>

</html>
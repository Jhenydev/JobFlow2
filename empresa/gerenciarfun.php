<?php
$css = "gerenciarfun.css";
$navbar = "navbarempresa.php";
include "../include/topo.php";
?>
<?php
include '../include/headerfuncionario.php';
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
                <img src='../img/identidade.png' alt='Ícone'>
                <div class='dados'>
                    <h2 class='nome'>$campo_nome</h2>
                    <p class='cpf'>" . preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $campo_cpf) . "</p>
                    <p class='cep'>$campo_cargo</p>
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
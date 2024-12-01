<div class="login">
    <?php
    include "../include/topo.php";

    $mensagemToastr = "";

$mensagem = "";
if (isset($_POST["usuarios"])) {
    $sql = "SELECT * FROM usuarios WHERE (nome = ? OR email = ?) AND senha = ?";
    $consulta = $banco->prepare($sql);
    $consulta->execute(array($_POST["usuarios"],$_POST["usuarios"], $_POST["senha"]));
    
    if ($registro = $consulta->fetch()) {
        $_SESSION["usuario"] = $registro; 
        $_SESSION["logado"] = 1;
        
       
        if (is_null($registro["sexo"])) {
            header("Location: /tcc/JobFlow2/empresa/empresa.php");
        } else {
            header("Location: /tcc/JobFlow2/funcionario/indexfuncionario.php");
        }
        exit;
    } else {
        $mensagem = "Usuário ou senha inválidos!";
        $_SESSION["logado"] = 0;
    }
}
?>


<link rel="stylesheet" href="login.css">

    <div class="login-container">
        <form action="login.php" method="POST">
            <h1>Faça login</h1>
            <label>Nome de usuário ou Email</label>
            <input type="text" name="usuarios" required>
            <label>Senha</label>
            <input type="password" name="senha" required>
            <div class="options">
                <a href="esquecisenha.php">Esqueceu sua senha?</a>
            </div>
            <?php echo $mensagem;
                    echo "<br>";
                    echo "<br>";
            ?>
            <input type="submit" value="ENTRAR">
            <br><br><br>
            <div class="criarconta">
                <a href="cadastro2.php">Criar Conta</a>
                
            </div>
    </div>
    </form>

</div>
</div>
<script>
    $(document).ready(function() {
        <?php
        if (!empty($mensagemToastr)) {
            list($tipo, $mensagem) = explode('|', $mensagemToastr);
            echo "toastr.$tipo('$mensagem');";
        }
        ?>
    });
</script>
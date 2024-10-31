<div class="login">
<?php
include "../include/topo.php";


$mensagem = "";
if(isset($_POST["usuarios"])) {
    $sql = "SELECT * FROM usuarios WHERE nome = ? OR email = ? AND senha = ?";
    $consulta = $banco->prepare($sql);
    $consulta->execute(array($_POST["usuarios"], $_POST["usuarios"],$_POST["senha"]));
    if($registro = $consulta->fetch()) {
        $_SESSION["usuario"] = $registro;
        header("Location: principal.php");
    } else {
        $mensagem = "Usuário ou senha inválidos!";
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
        <input type="submit" value="ENTRAR">
        <br><br><br>
        <div class="criarconta">
        <a href="cadastro2.php">Criar Conta</a> 
        </div>
        </div>
    </form> 
   
</div>
</div>
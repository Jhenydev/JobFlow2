<?php
session_start();
include "conexao.php";

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

<style>
    
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 800px;
        text-align: center;
        position: relative;
    }

    h1 {
        font-size: 24px;
        margin-top: 40px;
        margin-bottom: 60px;
        color: #333;
    }

    label {
        display: block;
        text-align:center;
        margin-bottom: 5px;
        color: #555;
        
    }

    input[type="text"],
    input[type="password"] {
        width: 70%;
        
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 12px;
        width: 60%;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    input[type="submit"]:hover {
        background-color: #F69D3B;
    }

    a {
        
        color: #000;
        text-decoration: none;
        font-size: 14px;
        
    }

    a:hover {
        text-decoration: underline;
    }

    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    .options label {
        font-size: 14px;
        color: #555;
    }

    .options a {
        font-size: 14px;
        margin-left: 42%;
        color: gray;
    }
    .criarconta a {
        width: 200px;
        height: 30px;
        background-color: white;
        color: black;
        border: none;
        padding: 10px 10px;
        font-size: 16px;
        cursor: pointer;
        border: 1px solid black;
        border-radius: 5px;
    }

</style>
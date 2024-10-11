<?php
include "topo.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST["email"])) {
    $sql = "SELECT * FROM usuarios WHERE email=?";
    $consulta = $banco->prepare($sql);
    $consulta->execute(array($_POST["email"]));
    if ($registro = $consulta->fetch()) {
        $email = $registro["email"];
        $senha = $registro["senha"];
        $nome = $registro["nome"];

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'mail.profcarlosgomes.com.br';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tcc@profcarlosgomes.com.br';
            $mail->Password   = 'Tcc@2024!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('tcc@profcarlosgomes.com.br', 'TCC');
            $mail->addAddress($email, $nome);

            $mail->isHTML(true);
            $mail->Subject = 'TCC | Recuperação de senha';
            $mail->Body    = 'A sua senha para acesso ao JobFlow é:<b>' . $senha . '</b>';
            $mail->CharSet = "UTF-8";
            $mail->send();
            echo 'O email foi enviado!';
        } catch (Exception $e) {
            echo "Não foi possível enviar o email";
        }
    } else {
        echo "<p>Email não cadastrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recuperar Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin: 30px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        a {
            color: #000;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
            display: block;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Recuperar Senha</h1>
<form action="esquecisenha.php" method="POST">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required>
    <input type="submit" value="Enviar">
    <p><a href="index.php">Voltar</a></p>
</form>


<?php
include "rodape.php";
?>

</body>
</html>

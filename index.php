<?php
    include "topo.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobFlow</title>
    <link rel="stylesheet" href="index2.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: Arial, sans-serif;
            height: 100%;
        }

        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* A imagem vai ocupar 100% da altura da tela */
            width: 100%;
            overflow: hidden; /* Para garantir que a imagem não transborde */
        }

        .hero-image img {
            width: 100vw;
            height: 100vh;
            object-fit: cover; /* Faz a imagem se ajustar proporcionalmente e cobrir toda a tela */
        }

        .app-button {
            position: absolute;
            top: 60%;
            left: 21%; /* Centraliza horizontalmente */
            transform: translate(-50%, -50%);
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            width: 380px;
            text-decoration: none; /* Remove o sublinhado */
            text-align: center;
        }

        .steps {
            padding: 40px;
            text-align: center;
        
        }

        .steps h2 {
            font-size: 30px;
            color: #000;
            margin-bottom: 90px;
            padding: 70px;

        }

        .steps h3 {
            margin-bottom: 8px;
        }

        .step {
            display: inline-block;
            width: 250px;
            margin: 0 20px;
            text-align: center;
        }

        .step img {
            width: 45px;
            height: 45px;
            margin-bottom: 20px;
            
        }

        .phone-account {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    background-color: #fff;
}

.phone-image img {
    max-width: 300px;
    height: auto;
}

.account-info h2 {
    font-size: 20px;
    margin-bottom: 15px;
    
    
}

.account-info ul {
    list-style: none;
}

.account-info ul li {
    font-size: 16px;
    margin-bottom: 10px;
    position: relative;
    padding-left: 20px;
}

.account-info ul li:before {
    content: '✔';
    color: green;
    position: absolute;
    left: 0;
    top: 0;
    font-size: 16px;
}

/* Footer */
footer {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    color: #333;
}
    </style>
</head>
<body>

    <section class="hero">
        <div class="hero-image">
            <img src="fotoindex.png" alt="Imagem">
            <a href="cadastro2.php" class="app-button">Cadastrar</a>
        </div>
    </section>

    <section class="steps">
        <h2> Controle total para empresas, acesso exclusivo para <br> funcionários. Tudo em uma plataforma!</h2>
        <div class="step">
            <img src="time.png" alt="Ícone de cartão">
            <h3>Marca ponto digital</h3>
            <p>Marque seu ponto pelo seu dispositivo sem dificuldades.</p>
        </div>

        <div class="step">
            <img src="calendar.png"><br>
            <h3>Controle de Frequência</h3>
            <p>Tenha acesso a toda sua frequência no trabalho.</p>
        </div>

        <div class="step">
            <img src="dinheiro.png" alt="Ícone de responsável">
            <h3>Controle de ganhos</h3>
            <p>Veja seu ganho mensal de acordo com as horas trabalhadas.</p>
        </div>
        
    </section>




    <?php
include "rodape.php";
?>

</body>
</html>

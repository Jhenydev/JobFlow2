<?php
    include "../include/topo.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobFlow</title>
    <link rel="stylesheet" href="index2.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    
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
include "../include/rodape.php";
?>

</body>
</html>

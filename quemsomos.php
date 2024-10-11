<?php
// Incluir o cabeçalho
include "topo.php"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }

        /* Header */
        .header {
            background-color: #C94C51;
            padding: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            margin-right: 10px;
        }

        .logo h1 {
            color: white;
            font-size: 22px;
        }

        .btn-contact {
            background-color: #ff9900;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .btn-contact:hover {
            background-color: #e68a00;
        }

        /* Seção Quem Somos */
        .intro-section {
            background-color: #f4f4f9;
            padding: 60px 20px;
            text-align: center;
        }

        .intro-section h2 {
            font-size: 42px;
            color: #003399;
            margin-bottom: 10px;
        }

        .intro-section h4 {
            font-size: 24px;
            color: #555;
            font-style: italic;
            margin-bottom: 20px;
        }

        .intro-section h1 {
            font-size: 32px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
        }

        .intro-section p {
            font-size: 18px;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Seção Valores */
        .values-section {
            background-color: #fff;
            padding: 60px 20px;
            text-align: center;
        }

        .values-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .value-box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .value-box:hover {
            transform: translateY(-5px);
        }

        .value-box img {
            width: 60px;
            margin-bottom: 20px;
        }

        .value-box h4 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #003399;
        }

        .value-box p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                text-align: center;
            }

            .values-container {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
       
    <!-- Seção Quem Somos -->
    <section class="intro-section">
        <h2>Quem Somos</h2>
        <h1>Conheça nossa história</h1>
        <p>
            A JobFlow nasceu da necessidade de apoiar trabalhadores informais, aqueles que atuam por conta
            própria ou realizam "bicos" em diversas áreas. Desde sua criação, a empresa se comprometeu a
            oferecer soluções práticas e eficientes para o controle e a gestão desse tipo de mão de obra.
            Com o aumento do trabalho informal, identificamos uma lacuna no mercado para um serviço que compreendesse
            as necessidades específicas desses profissionais, proporcionando ferramentas para gerenciar suas atividades,
            renda e benefícios. Fundada por especialistas em gestão de pessoas e tecnologia, a JobFlow se destacou ao criar uma plataforma adaptada para trabalhadores autônomos, facilitando a organização de suas rotinas e melhorando sua qualidade de vida.
        </p>
    </section>

    <!-- Seção Valores -->
    <section class="values-section">
        <div class="values-container">
            <div class="value-box">
                <img src="missao.png" alt="Nossa Missão">
                <h4>Nossa Missão</h4>
                <p>JobFlow especializada no controle de funcionários informais. Queremos entender melhor as necessidades
                    de quem trabalha por conta própria ou realiza "bicos".</p>
            </div>
            <div class="value-box">
                <img src="visao.png" alt="Nossa Visão">
                <h4>Nossa Visão</h4>
                <p>Ser referência no Brasil em controle e gestão de funcionários informais, transformando o mercado e
                    oferecendo soluções inovadoras que ajudem trabalhadores autônomos a alcançar estabilidade, segurança
                    e reconhecimento profissional.</p>
            </div>
            <div class="value-box">
                <img src="valores.png" alt="Nossos Valores">
                <h4>Nossos Valores</h4>
                <p>Os valores da JobFlow incluem compromisso com o trabalhador informal, inovação, transparência, acessibilidade
                    e responsabilidade social, sempre buscando melhorar as condições de trabalho dos autônomos.</p>
            </div>
        </div>
    </section>

    <!-- Incluir o rodapé -->
    <?php include "rodape.php"; ?>

</body>
</html>

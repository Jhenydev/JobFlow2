<?php
    include "topo.php"; // Inclui o cabeçalho
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cobertura</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container-menor-idade {
            display: flex;
            width: 100%; 
            max-width: 1400px;  
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            overflow: hidden;
        }

        .image-section img {
            width: 100%;
            height: auto;  
            object-fit: cover;
        }

        .text-section {
            flex: 1;
            background-color: #fce4ec;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .text-section h1 {
            font-size: 36px;
            color: #000;
            margin-bottom: 20px;
        }

        .text-section p {
            font-size: 20px;  
            color: #333;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .text-section a {
            display: inline-block;
            background-color: #000;
            color: #fff;
            padding: 15px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .text-section a:hover {
            background-color: #333;
        }

        .container-jobflow {
            display: flex;
            justify-content: space-between;
            width: 100%;  
            max-width: 1400px;  
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .text-content {
            max-width: 600px;
        }

        h1 {
            color: #C94C51;
            font-size: 3rem;  
            letter-spacing: 1px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        p {
            color: #555;
            font-size: 1.2rem;  
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .highlight {
            font-weight: bold;
            color: #C94C51;
        }

        .benefits {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #fce4ec;
            padding: 20px;
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .benefit-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .benefit-item img {
            width: 60px;  
            height: 60px;
        }

        .benefit-text {
            font-size: 1.1rem;
            color: #333;
        }

        .cta-button {
            background-color: #C94C51;
            color: #fff;
            padding: 15px 30px;
            font-size: 1.3rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s;
            margin-top: 40px;
        }

        .cta-button:hover {
            background-color: #C94C51;
            transform: translateY(-2px);
        }

        .image-content img {
            width: 100%;  
            max-width: 600px;  
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .container-jobflow {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .text-content {
                text-align: center;
            }

            .benefits {
                grid-template-columns: 1fr;
            }

            .image-content img {
                width: 100%;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container-menor-idade">
        <div class="image-section">
            <img src="https://via.placeholder.com/400" alt="Mãe e filha com celular">
        </div>
        <div class="text-section">
            <h1>Teste</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
            </p>
            <p>Se tiver alguma dúvida, acesse:</p>
            <a href="#">Saiba mais →</a>
        </div>
    </div>

    <div class="container-jobflow">
        <div class="text-content">
            <h1>Nossas <span class="highlight">COBERTURAS</span></h1>
            <p>O JobFlow oferece uma cobertura completa para ajudar pequenas empresas a gerenciar trabalhos informais,
                monitorar a frequência dos funcionários, marcar pontos e rastrear os ganhos com eficiência.</p>

            <div class="benefits">
                <div class="benefit-item">
                    <img src="img/relogio-calendario.png" alt="Ícone de Gestão de Ponto">
                    <div class="benefit-text">Registre as horas trabalhadas com precisão.</div>
                </div>
                <div class="benefit-item">
                    <img src="img/olho.png" alt="Ícone de Frequência">
                    <div class="benefit-text">Monitore a frequência dos colaboradores facilmente.</div>
                </div>
                <div class="benefit-item">
                    <img src="img/circulo-usd.png" alt="Ícone de Relatórios de Ganhos">
                    <div class="benefit-text">Tenha uma visão detalhada dos ganhos dos funcionários.</div>
                </div>
                <div class="benefit-item">
                    <img src="img/documento.png" alt="Ícone de Relatório">
                    <div class="benefit-text">Relatórios automáticos para uma melhor gestão.</div>
                </div>
            </div>

            <a href="#" class="cta-button">Quero uma conta na JobFlow</a>
        </div>

        <div class="image-content">
            <img src="img/cartao-z1.png" alt="foto">
        </div>
    </div>

    <?php
        include "rodape.php";
    ?>

</body>
</html>

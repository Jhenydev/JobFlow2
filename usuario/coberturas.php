<?php
    include "../include/topo.php"; // Inclui o cabeçalho
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cobertura</title>
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
        include "../include/rodape.php";
    ?>

</body>
</html>

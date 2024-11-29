<?php
    include "../include/topo.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coberturas</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #222;
            background: linear-gradient(180deg, #f4f4f9 50%, #e8e8f3 100%);
        }

        .section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 60px 5%;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #f6f6f6;
            margin: 20px auto;
            max-width: 1200px;
        }

        
        .text-content {
            flex: 1;
            min-width: 300px;
            max-width: 50%;
            padding: 10px;
            text-align: left;
        }

        .text-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #444;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .text-content p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
        }

        .text-content .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #C94C51, #ff7a85);
            border: none;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .text-content .btn:hover {
            background: linear-gradient(135deg, #b03c42, #ff4f5f);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
        }

        .espaco {
            height: 160px;
            background-color: #f6f6f6;
        }

        .image-content {
            flex: 1;
            min-width: 300px;
            max-width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 15px;
        }

        .image-content img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-content img:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                text-align: center;
                padding: 40px;
            }

            .text-content,
            .image-content {
                max-width: 100%;
            }

            .text-content h1 {
                font-size: 2rem;
            }

            .text-content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <?php 
    // Estrutura de conteúdo para evitar repetição
    $sections = [
        [
          'title' => 'Descubra a praticidade<br>com o JobFlow', 
"text" => "O JobFlow oferece uma solução completa para auxiliar pequenas empresas na gestão de seus colaboradores informais, proporcionando eficiência e organização.<br><br>Tanto empresas quanto funcionários têm acesso a ferramentas que permitem o gerenciamento detalhado de ganhos, frequência e outras informações essenciais.",
'button_text' => 'Abrir uma conta JobFlow',
'img_src' => '../img/cobertura1.jpg',
'img_alt' => 'Imagem descritiva',
'reverse' => false,



        ],

          [
            'title' => 'Controle Preciso de Horas Trabalhadas',
'text' => 'Simplifique o controle de jornada! Nossa plataforma permite que empresas e colaboradores visualizem um calendário completo com os registros de ponto e dias trabalhados, mês a mês. Com acompanhamento em tempo real, garantimos mais transparência, pagamentos justos e a eliminação de erros nos registros.',
'img_src' => '../img/cobertura4.png',
'img_alt' => 'Calendário com registros de ponto e jornada de trabalho',
'reverse' => true,


        ],
        [
            'title' => 'Registro de Ponto Fácil e Preciso',
'text' => 'Permita que seus colaboradores registrem o ponto de forma rápida e precisa diretamente na plataforma. Essa funcionalidade exclusiva para funcionários garante que todas as horas sejam contabilizadas corretamente, evitando falhas e garantindo pagamentos justos.',
'img_src' => '../img/controleg.png',
'img_alt' => 'Imagem descritiva',
'reverse' => true,


        ],
      
        [
           'title' => 'Visibilidade Completa dos Ganhos',
'text' => 'Com base no registro de ponto, a plataforma permite que a empresa calcule os valores devidos com precisão, enquanto o funcionário acompanha seus ganhos previstos de forma clara e transparente, promovendo confiança e satisfação para ambas as partes.',
'img_src' => '../img/ganhos.png',
'img_alt' => 'Imagem descritiva',
'reverse' => true,


        ],
    ];

    foreach ($sections as $section) {
        $order = $section['reverse'] ? 'reverse' : '';
        echo "<div class='section $order'>";
        if ($section['reverse']) {
            echo "<div class='image-content'><img src='{$section['img_src']}' alt='{$section['img_alt']}'></div>";
        }
        echo "<div class='text-content'>
                <h1>{$section['title']}</h1>
                <p>{$section['text']}</p>";
        if (!empty($section['button_text'])) {
            echo "<a href='#' class='btn'>{$section['button_text']}</a>";
        }
        echo "</div>";
        if (!$section['reverse']) {
            echo "<div class='image-content'><img src='{$section['img_src']}' alt='{$section['img_alt']}'></div>";
        }
        echo "</div>";
    }
    ?>
    <div class="espaco">

    </div>
    <?php
        include "../include/rodape.php";
    ?>

</body>
</html>

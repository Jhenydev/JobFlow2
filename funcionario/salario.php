<?php
session_start();
include_once '../include/conexao.php'; 

include '../include/headerfuncionario.php';



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Informações de Cargo e Salário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6f6f6;
            
        }
        .container {
            max-width: 900px; /* Aumentei o tamanho da tela para desktop */
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h3 {
            color: white;
            text-align: center;
        }
        .table th,
        .table td {
            text-align: left;
            padding: 12px 20px;
        }
        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #666;
        }
        .table td {
            font-size: 18px;
            color: #333;
        }
        .table .highlight {
            font-size: 20px;
            font-weight: bold;
            color: #4CAF50;
        }
        .filter {
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 40px;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
        @media (max-width: 576px) {
            .container {
                padding: 15px;
                width: 70%;
            }
            .header h3 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h3>Salário Previsto</h3>
        </div>

        <!-- Filtro de data -->
        <div class="filter">
            <label for="filter" class="form-label">Selecione o período</label>
            <select id="filter" class="form-select">
                <option value="30">Últimos 30 dias</option>
                <option value="60">Últimos 60 dias</option>
                <option value="90">Últimos 90 dias</option>
            </select>
        </div>

        <table class="table">
            <tbody>
                <tr>
                    <th>Cargo</th>
                    <td>Desenvolvedor</td>
                </tr>
                <tr>
                    <th>Valor Hora</th>
                    <td>22,90</td>
                </tr>
                <tr>
                    <th>Horas prestadas</th>
                    <td>560h</td>
                </tr>
                <tr>
                    <th>Salário Previsto</th>
                    <td class="highlight">R$5.000,00</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>

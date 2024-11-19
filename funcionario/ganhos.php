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
    <link rel="stylesheet" href="ganhos.css"> 
</head>

<?php
        $sql = "SELECT cargo, valor_hora, SUM(TIMESTAMPDIFF(MINUTE, hora_entrada, hora_saida)) minutos_prestados,
                        SUM(valor_hora/60 * TIMESTAMPDIFF(MINUTE, hora_entrada, hora_saida)) salario_previsto
            FROM cadastro_fun
            INNER JOIN usuarios USING (cpf)
            INNER JOIN marca_ponto USING (empresa, id_usuario)
            WHERE hora_saida IS NOT NULL  
            AND empresa = :empresa
            AND cpf = :cpf
            AND DATA >= DATE_SUB(CURDATE(), INTERVAL :dias DAY)
            GROUP BY cargo, valor_hora";
        $comando = $banco->prepare($sql);

        // buscar esses valores pelo formulário
        $empresa = 1;
        $cpf = '37269980802';
        if(isset($_REQUEST["dias"])) {
            $dias = $_REQUEST["dias"];
        } else {
            $dias = 30;
        }

        $comando->bindParam(':empresa', $empresa);
        $comando->bindParam(':cpf', $cpf);
        $comando->bindParam(':dias', $dias);
        $comando->execute();
        
            if ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
                $cargo = $registro['cargo'];
                $valor_hora = number_format($registro['valor_hora'], 2, ',', '.');
                $horas_prestadas = sprintf("%02d:%02d", floor($registro['minutos_prestados']/60), $registro['minutos_prestados']%60);
                $salario_previsto = number_format($registro['salario_previsto'], 2, ',', '.');
            } else {
                echo "<p>Dados não encontrados.</p>";
            }
        
    ?>



<body>

    <div class="container">
        <div class="titulo">
            <h3>Salário Previsto</h3>
        </div>

        <form>
        <div class="filter">
            <label for="filter" class="form-label">Selecione o período</label>
            <select id="filter" class="form-select" name="dias">
                <option value="30" <?php if($dias==30) echo "selected"; ?>>Últimos 30 dias</option>
                <option value="60" <?php if($dias==60) echo "selected"; ?>>Últimos 60 dias</option>
                <option value="90" <?php if($dias==90) echo "selected"; ?>>Últimos 90 dias</option>
            </select>
        </div>
        <input type="submit">
        </form>

        <table class="table">
        <tbody>
            <tr>
                <th>Cargo</th>
                <td><?php echo isset($cargo) ? htmlspecialchars($cargo) : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Valor Hora</th>
                <td><?php echo isset($valor_hora) ? "R$ $valor_hora" : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Horas Prestadas</th>
                <td><?php echo isset($horas_prestadas) ? "$horas_prestadas h" : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Salário Previsto</th>
                <td class="highlight"><?php echo isset($salario_previsto) ? "R$ $salario_previsto" : 'N/A'; ?></td>
            </tr>
        </tbody>
    </table>
    </div>

</body>
</html>



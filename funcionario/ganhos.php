<?php
session_start();
include_once '../include/conexao.php'; 
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
<body>
<?php
include '../include/headerfuncionario.php';
?>
<div class="container">
    <div class="titulo">
        <h3>Salário Previsto</h3>
    </div>

    <form>
        <div class="filter">
            <label for="filter" class="form-label">Selecione a empresa</label><br>
            <br>
            <?php
            // Exibe as empresas associadas ao CPF do usuário
            $sql = "SELECT empresa, usuarios.nome 
                    FROM cadastro_fun 
                    INNER JOIN usuarios ON (empresa = id_usuario) 
                    WHERE cadastro_fun.cpf = ?";
            $comando = $banco->prepare($sql);
            $comando->execute([$_SESSION["usuario"]["cpf"]]);

            while ($registro = $comando->fetch()) {
                extract($registro, EXTR_PREFIX_ALL, "campo");
                echo "<div class='form-check'>
                        <input type='radio' class='form-check-input' name='empresa' value='$campo_empresa' required>
                        <label class='form-check-label'>$campo_nome</label>
                      </div>";
            }
            ?>

            <select id="filter" class="form-select mt-2" name="dias">
                <option value="30" <?php if (isset($dias) && $dias == 30) echo "selected"; ?>>Últimos 30 dias</option>
                <option value="60" <?php if (isset($dias) && $dias == 60) echo "selected"; ?>>Últimos 60 dias</option>
                <option value="90" <?php if (isset($dias) && $dias == 90) echo "selected"; ?>>Últimos 90 dias</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary mt-3">
    </form>

    <?php
    // Verifica se os filtros foram enviados pelo formulário
    if (isset($_REQUEST['empresa']) && isset($_REQUEST['dias'])) {
        $empresa = $_REQUEST['empresa'];
        $cpf = $_SESSION["usuario"]["cpf"];
        $dias = $_REQUEST['dias'];

        $sql = "SELECT cargo, valor_hora, 
                       SUM(TIMESTAMPDIFF(MINUTE, hora_entrada, hora_saida)) minutos_prestados,
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
        $comando->bindParam(':empresa', $empresa);
        $comando->bindParam(':cpf', $cpf);
        $comando->bindParam(':dias', $dias);
        $comando->execute();

        if ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
            $cargo = $registro['cargo'];
            $valor_hora = number_format($registro['valor_hora'], 2, ',', '.');
            $horas_prestadas = sprintf("%02d:%02d", floor($registro['minutos_prestados'] / 60), $registro['minutos_prestados'] % 60);
            $salario_previsto = number_format($registro['salario_previsto'], 2, ',', '.');
        } else {
            echo "<p class='mt-3 text-danger'>Dados não encontrados.</p>";
        }
    }
    ?>

    <table class="table mt-3">
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
<div class="espaco">
</div>
</body>
</html>

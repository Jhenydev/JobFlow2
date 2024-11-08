<?php
include "../include/conexao.php";
session_start();

// Verifica se os parâmetros necessários foram passados
if (isset($_REQUEST["date"]) && isset($_REQUEST["empresa"])) {
    $date = $_REQUEST["date"];
    $empresa = $_REQUEST["empresa"];
    $idUsuario = $_SESSION["usuario"]["id_usuario"];

    // Consulta para buscar apenas os registros da data e empresa selecionadas
    $sql = "SELECT hora_entrada, hora_saida 
            FROM marca_ponto 
            WHERE id_usuario = ? AND data = ? AND empresa = ?";
    $comando = $banco->prepare($sql);
    $comando->execute(array($idUsuario, $date, $empresa));

    // Verifica se há registros para exibir
    if ($comando->rowCount() > 0) {
        while ($registro = $comando->fetch()) {
            extract($registro, EXTR_PREFIX_ALL, "campo");

            // Exibe a entrada e saída com os textos "ENTRADA" e "SAÍDA" antes dos horários
            echo "
            <div class='dados'>
                <p class='entrada'><strong>ENTRADA:</strong> $campo_hora_entrada</p>
                <p class='saida'><strong>SAÍDA:</strong> $campo_hora_saida</p>
            </div>
            ";
        }
    } else {
        echo "<p>Nenhum dado disponível para esta data e empresa selecionada.</p>";
    }
} else {
    echo "<p>Por favor, selecione uma empresa e uma data.</p>";
}

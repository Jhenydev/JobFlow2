<?php
include "../include/conexao.php";
session_start();

$sql = "SELECT * FROM marca_ponto where id_usuario = ? and data = ?";
$comando = $banco->prepare($sql);
$comando->execute(array($_SESSION["usuario"]["id_usuario"],$_REQUEST["date"]));

while ($registro = $comando->fetch()) {
    extract($registro, EXTR_PREFIX_ALL, "campo");

    echo "

    <div class='dados'>
        <h2 class='entrada'>$campo_hora_entrada</h2>
        <p class='saida'>$campo_hora_saida</p>
    </div>

";
}

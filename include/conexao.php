<?php
try {
    $user = "data7c94_jobflow";
    $pass = "etec@147";
    $banco = new PDO('mysql:host=profcarlosgomes.com.br;dbname=data7c94_jobflow', $user, $pass);
    date_default_timezone_set("America/Sao_Paulo");
} catch (PDOException $e) {
    die("Erro na conexao com o banco de dados");
}
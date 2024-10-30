<?php
try {
    $user = "data7c94_jobflow";
    $pass = "etec@147";
    $banco = new PDO('mysql:host=profcarlosgomes.com.br;dbname=data7c94_jobflow', $user, $pass);
} catch (PDOException $e) {
    die("Erro na conexao com o banco de dados");
}
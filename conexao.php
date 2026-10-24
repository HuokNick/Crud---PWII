<?php
$conexao = new mysqli("localhost", "root", "1234", "dblojateste");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>

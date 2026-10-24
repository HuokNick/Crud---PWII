<?php
include "conexao.php";

$sql = "SELECT * FROM cliente";
$resultado = $conexao->query($sql);

while ($cliente = $resultado->fetch_assoc()) {
    echo $cliente["id_cliente"] . " - ";
    echo $cliente["nome"] . " - ";
    echo $cliente["documento"] . " - ";
    echo $cliente["telefone"] . "<br>";
}
?>

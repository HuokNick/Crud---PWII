<a href="index.php" class="voltar">← Voltar</a>

<?php
include "conexao.php";

$sql = "SELECT * FROM cliente";
$resultado = $conexao->query($sql);
?>

<h2>Clientes cadastrados</h2>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cliente</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <form>
        <?php
            while ($cliente = $resultado->fetch_assoc()) {
                echo $cliente["id_cliente"] . " - ";
                echo $cliente["nome"] . " - ";
                echo $cliente["documento"] . " - ";
                echo $cliente["telefone"] . "<br>";
            }
        ?>
    </form>
    
</body>
</html>
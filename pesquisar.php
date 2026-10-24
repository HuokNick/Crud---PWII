<a href="index.php" class="voltar">← Voltar</a>

<?php
include "conexao.php";

if (isset($_POST["pesquisar"])) {
    $nome = $_POST["nome"];

    $sql = "SELECT * FROM cliente WHERE nome LIKE '%$nome%'";
    $resultado = $conexao->query($sql);
}
?>

<?php
if (isset($resultado)) {
    if ($resultado->num_rows > 0) {
        while ($cliente = $resultado->fetch_assoc()) {
            echo "ID: " . $cliente["id_cliente"] . " - ";
            echo "Nome: " . $cliente["nome"] . " - ";
            echo "Documento: " . $cliente["documento"] . " - ";
            echo "Telefone: " . $cliente["telefone"] . "<br>";
        }
    } else {
        $mensagem = "Nenhum cliente encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Cliente</title>
    <link rel="stylesheet" href="src/css/style.css">

</head>
<body>
       
    <form method="POST">
        <h2>Pesquisar Registros</h2>

        Nome:
        <input type="text" name="nome" required>

        <button type="submit" name="pesquisar">Pesquisar</button>
         <?php if (isset($mensagem)) { ?>
            <p class="mensagem">
                <?php echo $mensagem; ?>
            </p>
        <?php } ?>
    </form>
    
</body>
</html>

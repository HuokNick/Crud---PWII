<a href="index.php" class="voltar">← Voltar</a>

<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_cliente"];

    $sql = $conexao->prepare(
        "DELETE FROM cliente WHERE id_cliente = ?"
    );

    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        $mensagem = "Cliente excluído!";
    } else {
        $mensagem = "Erro ao excluir.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <form method="POST">
        ID do cliente: <input type="number" name="id_cliente" required><br>
        <button type="submit">Excluir</button>
        <?php if (isset($mensagem)) { ?>
            <p class="mensagem">
                <?php echo $mensagem; ?>
            </p>
        <?php } ?>
    </form>
</body>
</html>

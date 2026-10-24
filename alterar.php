<a href="index.php" class="voltar">← Voltar</a>

<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_cliente"];
    $nome = $_POST["nome"];

    $sql = $conexao->prepare(
        "UPDATE cliente SET nome = ? WHERE id_cliente = ?"
    );

    $sql->bind_param("si", $nome, $id);

    if ($sql->execute()) {
        $mensagem = "Cliente atualizado!";
    } else {
        $mensagem = "Erro ao atualizar.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <form method="POST">
    ID do cliente: <input type="number" name="id_cliente" required><br>
    Novo nome: <input type="text" name="nome" required><br>
    <button type="submit">Editar</button>
    <?php if (isset($mensagem)) { ?>
            <p class="mensagem">
                <?php echo $mensagem; ?>
            </p>
    <?php } ?>
</form>
</body>
</html>

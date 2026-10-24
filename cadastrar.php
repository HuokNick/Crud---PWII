<a href="index.php" class="voltar">← Voltar</a>

<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $documento = $_POST["documento"];
    $telefone = $_POST["telefone"];

    $sql = $conexao->prepare(
        "INSERT INTO cliente (nome, documento, telefone)
         VALUES (?, ?, ?)"
    );

    $sql->bind_param("sss", $nome, $documento, $telefone);

    if ($sql->execute()) {
        $mensagem = "Cliente cadastrado!";
    } else {
        $mensagem = "Erro ao cadastrar cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="src/css/style.css">

</head>
<body>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Documento: <input type="text" name="documento" required><br>
        Telefone: <input type="text" name="telefone"><br>
        <button type="submit">Cadastrar</button>
        <?php if (isset($mensagem)) { ?>
            <p class="mensagem">
                <?php echo $mensagem; ?>
            </p>
        <?php } ?>

    </form>
</body>
</html>




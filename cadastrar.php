
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
        echo "Cliente cadastrado!";
    } else {
        echo "Erro ao cadastrar cliente.";
    }
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Documento: <input type="text" name="documento" required><br>
    Telefone: <input type="text" name="telefone"><br>
    <button type="submit">Cadastrar</button>
</form>
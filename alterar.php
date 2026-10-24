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
        echo "Cliente atualizado!";
    } else {
        echo "Erro ao atualizar.";
    }
}
?>

<form method="POST">
    ID do cliente: <input type="number" name="id_cliente" required><br>
    Novo nome: <input type="text" name="nome" required><br>
    <button type="submit">Editar</button>
</form>

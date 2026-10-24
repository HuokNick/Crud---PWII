<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_cliente"];

    $sql = $conexao->prepare(
        "DELETE FROM cliente WHERE id_cliente = ?"
    );

    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        echo "Cliente excluído!";
    } else {
        echo "Erro ao excluir.";
    }
}
?>

<form method="POST">
    ID do cliente: <input type="number" name="id_cliente" required><br>
    <button type="submit">Excluir</button>
</form>

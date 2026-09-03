<?php

include "../../config/conexao.php";

$id = $_POST["id"];

$sql = "DELETE FROM pets WHERE id = $id";

if (mysqli_query($conexao, $sql)) {

    if (mysqli_affected_rows($conexao) == 1) {
        header("Location: ../../pages/dashboard.php");
        exit;
    } else {
        echo "Erro ao excluir o pet.";
    }

} else {
    echo "Erro ao excluir o pet.";
}

?>
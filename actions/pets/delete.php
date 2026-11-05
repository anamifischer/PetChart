<?php

include "../../config/conexao.php";

$id = (int) $_POST["id"];

$stmt = mysqli_prepare($conexao, "SELECT foto FROM pets WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $foto);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($conexao, "DELETE FROM pets WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    if (mysqli_stmt_affected_rows($stmt) == 1) {

        //Se o pet tinha foto, apaga o arquivo da pasta
        if (!empty($foto)) {
            $caminho = __DIR__ . "/../../uploads/pets/" . basename($foto);

            if (file_exists($caminho)) {
                unlink($caminho);
            }
        }

        header("Location: ../../pages/dashboard.php");
        exit;
    } else {
        echo "Erro ao excluir o pet.";
    }

} else {
    echo "Erro ao excluir o pet.";
}

?>
<?php

include "../../config/conexao.php";

mysqli_report(MYSQLI_REPORT_OFF);

$id = $_POST["id"];

$sql = "DELETE FROM especies WHERE id = $id";

if (mysqli_query($conexao, $sql)) {

    if (mysqli_affected_rows($conexao) == 1) {
        header("Location: ../../pages/especies.php");
        exit;
    } else {
        echo "Erro ao excluir a espécie.";
    }

} else {

    if (mysqli_errno($conexao) == 1451) {
        header("Location: ../../pages/especies.php?erro=especie_em_uso");
        exit;
    } else {
        echo "Erro ao excluir a espécie.";
    }

}

?>
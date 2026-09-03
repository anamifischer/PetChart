<?php

include "../../config/conexao.php";

mysqli_report(MYSQLI_REPORT_OFF);

$id = $_POST["id"];

$sql = "DELETE FROM responsaveis WHERE id = $id";

if (mysqli_query($conexao, $sql)) {

    if (mysqli_affected_rows($conexao) == 1) {
        header("Location: ../../pages/responsaveis.php");
        exit;
    } else {
        echo "Erro ao excluir o responsável.";
    }

} else {

    if (mysqli_errno($conexao) == 1451) {
        header("Location: ../../pages/responsaveis.php?erro=responsavel_em_uso");
        exit;
    } else {
        echo "Erro ao excluir o responsável.";
    }

}

?>
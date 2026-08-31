<?php

include "../../config/conexao.php";
    require_once "../config/sessao.php";
    verificarLogin();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $sql_delete = "DELETE FROM pets WHERE id = ?";
    $execucao_sql_delete = $conexao->prepare($sql_delete);
    $execucao_sql_delete->bind_param(
        "i",
        $id
    );

    if ($execucao_sql_delete->execute()) {
        header("Location: ../../pages/dashboard.php");
        exit;
    } else {
        echo "Erro ao excluir: " . $execucao_sql_delete->error;
    }
    $execucao_sql_delete->close();
}
<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $sql_delete = "DELETE FROM especies WHERE id = ?";

    try{
        $execucao_sql_delete = $conexao->prepare($sql_delete);
        $execucao_sql_delete->bind_param("i", $id);
        $execucao_sql_delete->execute();
        header("Location: /pages/especies.php?sucesso=excluido"); exit;
    }
    catch (mysqli_sql_exception $e) {
        header("Location: /pages/especies.php?erro=especie_em_uso"); 
        exit;
    }
}
?>
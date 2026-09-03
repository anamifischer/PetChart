<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO responsaveis 
        (nome, endereco, telefone)
        VALUES ('$nome', '$endereco', '$telefone')";

    if (mysqli_query($conexao, $sql)) {

        if (mysqli_affected_rows($conexao) == 1) {
            header("Location: ../../pages/responsaveis.php");
            exit;
        } else {
            echo "Erro ao cadastrar o responsável.";
        }

    } else {
        echo "Erro ao cadastrar o responsável.";
    }
}

?>
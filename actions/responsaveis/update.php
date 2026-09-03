<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "SELECT * FROM responsaveis WHERE id = $id";

    $resultado = mysqli_query($conexao, $sql);
    $responsavel = mysqli_fetch_assoc($resultado);

    header("Content-Type: application/json");
    echo json_encode($responsavel);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "UPDATE responsaveis
            SET nome = '$nome',
                telefone = '$telefone',
                endereco = '$endereco'
            WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {

        if (mysqli_affected_rows($conexao) == 1) {
            header("Location: ../../pages/responsaveis.php");
            exit;
        } else {
            echo "Nenhuma alteração foi realizada.";
        }

    } else {
        echo "Erro ao atualizar o responsável.";
    }
}

?>
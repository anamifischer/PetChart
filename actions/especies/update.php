<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "SELECT * FROM especies WHERE id = $id";

    $resultado = mysqli_query($conexao, $sql);
    $especie = mysqli_fetch_assoc($resultado);

    header("Content-Type: application/json");
    echo json_encode($especie);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $especie = $_POST["especie"];

    $sql = "UPDATE especies 
            SET especie = '$especie'
            WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {

        if (mysqli_affected_rows($conexao) == 1) {
            header("Location: ../../pages/especies.php");
            exit;
        } else {
            echo "Nenhuma alteração foi realizada.";
        }

    } else {
        echo "Erro ao atualizar a espécie.";
    }
}

?>
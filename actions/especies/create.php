<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $especie = $_POST["especie"];

    $sql = "INSERT INTO especies (especie) VALUES ('$especie')";

    if (mysqli_query($conexao, $sql)) {

        if (mysqli_affected_rows($conexao) == 1) {
            header("Location: ../../pages/especies.php");
            exit;
        } else {
            echo "Erro ao cadastrar a espécie.";
        }

    } else {
        echo "Erro ao cadastrar a espécie.";
    }
}

?>
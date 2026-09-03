<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $especie_id = $_POST["especie_id"];
    $genero = $_POST["genero"];
    $responsavel_id = $_POST["responsavel_id"];
    $prontuario = $_POST["prontuario"];

    $sql = "INSERT INTO pets 
        (nome, nascimento, especie_id, genero, responsavel_id, prontuario)
        VALUES ('$nome', '$nascimento', $especie_id, '$genero', $responsavel_id, '$prontuario')";

    if (mysqli_query($conexao, $sql)) {

        if (mysqli_affected_rows($conexao) == 1) {
            header("Location: ../../pages/dashboard.php");
            exit;
        } else {
            echo "Erro ao cadastrar o pet.";
        }

    } else {
        echo "Erro ao cadastrar o pet.";
    }
}

?>

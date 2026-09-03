<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "SELECT 
                pets.id,
                pets.nome,
                pets.nascimento,
                pets.genero,
                pets.prontuario,
                pets.especie_id,
                pets.responsavel_id,
                especies.especie,
                responsaveis.nome AS responsavel
            FROM pets
            INNER JOIN especies ON pets.especie_id = especies.id
            INNER JOIN responsaveis ON pets.responsavel_id = responsaveis.id
            WHERE pets.id = $id";

    $resultado = mysqli_query($conexao, $sql);
    $pet = mysqli_fetch_assoc($resultado);

    header("Content-Type: application/json");
    echo json_encode($pet);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $especie_id = $_POST["especie_id"];
    $genero = $_POST["genero"];
    $responsavel_id = $_POST["responsavel_id"];
    $prontuario = $_POST["prontuario"];

    $sql = "UPDATE pets 
            SET nome = '$nome',
                nascimento = '$nascimento',
                especie_id = $especie_id,
                genero = '$genero',
                responsavel_id = $responsavel_id,
                prontuario = '$prontuario'
            WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {

        if (mysqli_affected_rows($conexao) == 1) {
            header("Location: ../../pages/dashboard.php");
            exit;
        } else {
            echo "Nenhuma alteração foi realizada.";
        }

    } else {
        echo "Erro ao atualizar o pet.";
    }
}

?>
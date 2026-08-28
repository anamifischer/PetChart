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
                especies.especie,
                responsaveis.nome AS responsavel
            FROM pets
            INNER JOIN especies ON pets.especie_id = especies.id
            INNER JOIN responsaveis ON pets.responsavel_id = responsaveis.id
            WHERE pets.id = ?";
    $execucao = $conexao->prepare($sql);
    $execucao->bind_param("i", $id);
    $execucao->execute();
    $resultado = $execucao->get_result();
    $pet = $resultado->fetch_assoc();
    header("Content-Type: application/json");
    echo json_encode($pet);
    $execucao->close();
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
            SET nome = ?, 
                nascimento = ?, 
                especie_id = ?, 
                genero = ?, 
                responsavel_id = ?, 
                prontuario = ?
            WHERE id = ?";

    $execucao = $conexao->prepare($sql);

    $execucao->bind_param(
        "ssisisi",
        $nome,
        $nascimento,
        $especie_id,
        $genero,
        $responsavel_id,
        $prontuario,
        $id
    );

    if ($execucao->execute()) {
        header("Location: ../../pages/dashboard.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $execucao->error;
    }
    $execucao->close();
}


?>
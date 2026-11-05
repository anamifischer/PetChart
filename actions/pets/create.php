<?php

include "../../config/conexao.php";
include "../../assets/includes/upload.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $especie_id = $_POST["especie_id"];
    $genero = $_POST["genero"];
    $responsavel_id = $_POST["responsavel_id"];
    $prontuario = $_POST["prontuario"];

    // chama a função e guarda o nome da foto
    $foto = salvarFoto($_FILES["foto"]);

    $stmt = mysqli_prepare($conexao,
        "INSERT INTO pets (nome, nascimento, especie_id, genero, responsavel_id, prontuario, foto)
         VALUES (?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ssisiss",
        $nome, $nascimento, $especie_id, $genero, $responsavel_id, $prontuario, $foto);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../pages/dashboard.php");
        exit;
    } else {
        echo "Erro ao cadastrar o pet.";
    }
}

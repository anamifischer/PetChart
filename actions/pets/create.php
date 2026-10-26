<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $especie_id = $_POST["especie_id"];
    $genero = $_POST["genero"];
    $responsavel_id = $_POST["responsavel_id"];
    $prontuario = $_POST["prontuario"];
    $foto = "NULL";
    $foto_tipo = "NULL";

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        $conteudo = file_get_contents($_FILES["foto"]["tmp_name"]);
        $tipo = mime_content_type($_FILES["foto"]["tmp_name"]);

        $foto = "'" . mysqli_real_escape_string($conexao, $conteudo) . "'";
        $foto_tipo = "'" . $tipo . "'";
    }

    $sql = "INSERT INTO pets 
        (nome, nascimento, especie_id, genero, responsavel_id, prontuario, foto, foto_tipo)
        VALUES ('$nome', '$nascimento', $especie_id, '$genero', $responsavel_id, '$prontuario', $foto, $foto_tipo)";

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

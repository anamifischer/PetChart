<?php

include "../../config/conexao.php";
include "../../assets/includes/upload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "SELECT 
                pets.id,
                pets.nome,
                pets.nascimento,
                pets.genero,
                pets.prontuario,
                pets.foto,
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

    $id = (int) $_POST["id"];
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $especie_id = (int) $_POST["especie_id"];
    $genero = $_POST["genero"];
    $responsavel_id = (int) $_POST["responsavel_id"];
    $prontuario = $_POST["prontuario"];

    // salva a foto nova (devolve null se o usuário não escolheu nenhuma)
    $foto = salvarFoto($_FILES["foto"]);

    if ($foto != null) {

        // pega o nome da foto antiga pra apagar depois
        $stmt = mysqli_prepare($conexao, "SELECT foto FROM pets WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $foto_antiga);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // atualiza COM a foto nova
        $stmt = mysqli_prepare($conexao,
            "UPDATE pets SET nome=?, nascimento=?, especie_id=?, genero=?, responsavel_id=?, prontuario=?, foto=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssisissi",
            $nome, $nascimento, $especie_id, $genero, $responsavel_id, $prontuario, $foto, $id);

    } else {

        // atualiza SEM mexer na foto
        $stmt = mysqli_prepare($conexao,
            "UPDATE pets SET nome=?, nascimento=?, especie_id=?, genero=?, responsavel_id=?, prontuario=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssisisi",
            $nome, $nascimento, $especie_id, $genero, $responsavel_id, $prontuario, $id);
    }

    if (mysqli_stmt_execute($stmt)) {

        // se trocou a foto, apaga a antiga da pasta
        if ($foto != null && !empty($foto_antiga)) {
            $caminho = __DIR__ . "/../../uploads/pets/" . basename($foto_antiga);
            if (file_exists($caminho)) {
                unlink($caminho);
            }
        }

        header("Location: ../../pages/dashboard.php");
        exit;
    } else {
        echo "Erro ao atualizar o pet.";
    }
}

?>
<?php

include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];
    $sql = "SELECT * FROM responsaveis WHERE id = ?";
    $execucao = $conexao->prepare($sql);
    $execucao->bind_param("i", $id);
    $execucao->execute();
    $resultado = $execucao->get_result();
    $responsavel = $resultado->fetch_assoc();
    header("Content-Type: application/json");
    echo json_encode($responsavel);
    $execucao->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    

    $sql = "UPDATE responsaveis 
            SET nome = ?, 
                telefone = ?, 
                endereco = ? 
            WHERE id = ?";

    $execucao = $conexao->prepare($sql);

    $execucao->bind_param(
        "sssi",
        $nome,
        $telefone,
        $endereco,
        $id
    );

    if ($execucao->execute()) {
        header("Location: ../../pages/responsaveis.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $execucao->error;
    }
    $execucao->close();
}

?>
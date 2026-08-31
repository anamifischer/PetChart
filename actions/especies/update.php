<?php
    require_once "../config/sessao.php";
    verificarLogin();
    include "../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];
    $sql = "SELECT * FROM especies WHERE id = ?";
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
    $especie = $_POST["especie"];

    $sql = "UPDATE especies 
            SET especie = ? WHERE id = ?";

    $execucao = $conexao->prepare($sql);

    $execucao->bind_param(
        "si",
        $especie,
        $id
    );

    if ($execucao->execute()) {
        header("Location: ../../pages/especies.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $execucao->error;
    }
    $execucao->close();
}


?>
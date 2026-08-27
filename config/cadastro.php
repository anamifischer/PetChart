<?php
session_start();
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirma_senha = $_POST["confirma_senha"];

    if ($senha !== $confirma_senha) {

    echo "As senhas não coincidem!";
    exit;
    }
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql_email = "SELECT id FROM usuarios WHERE email = ?";

    $consulta = $conexao->prepare($sql_email);
    $consulta->bind_param("s", $email);
    $consulta->execute();

    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        echo "Esse e-mail já está cadastrado!";
        exit;
    }

    //Criação da conta no banco
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";

    $consulta = $conexao->prepare($sql);
    $consulta->bind_param("sss", $nome, $email, $senhaHash);

    if ($consulta->execute()) {
        $idUsuario = $conexao->insert_id;
        $_SESSION["id"] = $idUsuario;
        $_SESSION["nome"] = $nome;
        header("Location: ../pages/dashboard.php");
        
exit;
    } else {
        echo "Erro ao criar a conta.";
    }
}
?>
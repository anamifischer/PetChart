<?php
    session_start();
    require_once "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
    
        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $consulta = $conexao->prepare($sql);
        $consulta->bind_param("s", $email);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario && password_verify($senha, $usuario["senha"])) {
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];
            header("Location: ../pages/dashboard.php");
            exit;

        } else {
         echo "E-mail ou senha incorretos!";
        }
    }

    function verificarLogin(){
        if(!isset($_SESSION["id"])){
            header("Location: ../pages/auth/login.php");
            exit;
        }
    }

?>
<?php   
    include "../../config/conexao.php";
    require_once "../config/sessao.php";
    verificarLogin();

    //CREATE DA TABELA RESPONSAVEIS
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        
        $sql_insert_responsavel = "INSERT INTO responsaveis 
            (nome, endereco, telefone)
            VALUES (?, ?, ?)";

        $execucao_sql_insert = $conexao->prepare($sql_insert_responsavel);

        $execucao_sql_insert->bind_param(
            "sss",
            $nome,
            $endereco,
            $telefone
        );

        if ($execucao_sql_insert->execute()){
            header("Location: /pages/responsaveis.php");
            exit;
        } else{
            echo "Erro ao cadastrar" . $execucao_sql_insert->error;
        }
        $execucao_sql_insert->close();
    }

?>
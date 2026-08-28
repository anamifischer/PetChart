<?php   
    include "../config/conexao.php";

    //CREATE DA TABELA ESPECIES
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $especie = $_POST["especie"];
        
        $sql_insert_especies = "INSERT INTO especies 
            (especie)
            VALUES (?)";

        $execucao_sql_insert = $conexao->prepare($sql_insert_especies);

        $execucao_sql_insert->bind_param(
            "s",
            $nome,
        );

        if ($execucao_sql_insert->execute()){
            header("Location: ../pages/especies.php");
            exit;
        } else{
            echo "Erro ao cadastrar" . $execucao_sql_insert->error;
        }
        $execucao_sql_insert->close();
    }
?>
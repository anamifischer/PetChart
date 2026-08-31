<?php   
    include "../../config/conexao.php";
    
    //CREATE DA TABELA PETS
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $especie_id = $_POST["especie_id"];
        $genero = $_POST["genero"];
        $responsavel_id = $_POST["responsavel_id"];
        $prontuario = $_POST["prontuario"];

        $sql_insert_pets = "INSERT INTO pets 
            (nome, nascimento, especie_id, genero, responsavel_id, prontuario)
            VALUES (?, ?, ?, ?, ?, ?)";

        $execucao_sql_insert = $conexao->prepare($sql_insert_pets);

        $execucao_sql_insert->bind_param(
            "ssisis",
            $nome,
            $nascimento,
            $especie_id,
            $genero,
            $responsavel_id,
            $prontuario
        );

        if ($execucao_sql_insert->execute()){
            header("Location: ../../pages/dashboard.php");
            exit;
        } else{
            echo "Erro ao cadastrar" . $execucao_sql_insert->error;
        }
        $execucao_sql_insert->close();
    }

?>

<?php
    require_once "../config/sessao.php";
    verificarLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <title>responsaveis</title>

</head>
<body>

    <?php include("../assets/includes/sidebar.php"); ?>
    <h1>Responsáveis</h1>

    <button class="btn btn-primary" id="btn-novo">+ Cadastrar Responsável</button>

    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Endereço</td>
        <td>Telefone</td>>
        <td>Pets</td>
    </tr>




    
</body>
</html>
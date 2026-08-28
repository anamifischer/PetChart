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

    <title>Especies</title>

</head>
<body>

    <?php include("../assets/includes/sidebar.php"); ?>
    <h1>Espécies atendidas</h1>

    <button class="btn btn-primary" id="btn-novo">+ Nova Espécie</button>
    
    <table class="data-table">
        <tr>
            <td>Id</td>
            <td>Espécies Cadastradas</td>
        </tr>
    </table>




    
</body>
</html>
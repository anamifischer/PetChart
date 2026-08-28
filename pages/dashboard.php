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
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">


    <title>Dashboard</title>
</head>
<body>
    <div class="layout">
        <?php include("../assets/includes/sidebar.php"); ?>

        <main class="conteudo">
            <h1>Dashboard</h1>

            <div class="cartoes">
                <div class="cartao">
                    <h2>Cadastrados</h2>
                    <p><?php ?></p>
                    <p>pets</p>
                </div>
                
                <div class="cartao">
                    <h2>Espécies</h2>
                    <p><?php ?></p>
                    <p>atendidas</p>
                </div>
                <div class="cartao">
                        <h2>Responsáveis</h2>
                        <p><?php ?></p>
                        <p>cadastrados</p>
                </div>
            </div>

            <h1>Pets cadastrados</h1>

            <div class="button">
                <button class="btn" id="btn-novo">+ Novo pet</button>
            </div>

            <table class="data-table">
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Responsável</td>
                    <td>Nascimento</td>
                    <td>Gênero</td>
                    <td>Espécie</td>
                    <td>Prontuário</td>
                </tr>
            </table>
        </main>


    </div>

</body>
</html>
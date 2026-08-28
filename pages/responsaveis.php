<?php
    require_once "../config/conexao.php";
    require_once "../config/sessao.php";
    verificarLogin();

    $sql_responsaveis = "SELECT 
                        responsaveis.id,
                        responsaveis.nome,
                        responsaveis.endereco,
                        responsaveis.telefone,
                        GROUP_CONCAT(pets.nome SEPARATOR ', ') AS pets
                    FROM responsaveis
                    LEFT JOIN pets 
                        ON responsaveis.id = pets.responsavel_id
                    GROUP BY responsaveis.id";
    $resultado = $conexao->query($sql_responsaveis);
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

    <div class="layout">
        <?php include("../assets/includes/sidebar.php"); ?>

        <div class="conteudo">
            <header>
                <h1>Responsáveis</h1>
            </header>       

            <div class="button">
                <button class="btn" id="btn-novo-responsavel">+ Cadastrar Responsável</button>
            </div>
            
            <table class="data-table">
                <thead class="table-header">
                    <tr>
                        <td>Id</td>
                        <td>Nome</td>
                        <td>Endereço</td>
                        <td>Telefone</td>
                        <td>Pets</td>
                    </tr>
                </thead>

                <tbody>
                <?php while ($responsavel = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?=$responsavel["id"] ?> </td>
                        <td><?=$responsavel["nome"]?></td>
                        <td><?=$responsavel["endereco"]?></td>
                        <td><?=$responsavel["telefone"]?></td>
                        <td><?=$responsavel["pets"]?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <div class="modal" id="modal-responsavel">

            <div class="modal-conteudo">
                <button class="modal-fechar" id="fechar-modal-responsavel">&times;</button>

                <h2>Cadastrar novo pet</h2>
                <p>Preencha as informações do pet.</p>

                <form method="POST" action="../actions/responsaveis/create.php">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" required>

                    <label for="endereco">Telefone</label>
                    <input type="text" id="telefone" name="telefone" required>

                    <button type="submit" class="btn-modal">Cadastrar Responsável</button>
                </form>
            </div>
        </div>

    </div>
    <script src="../assets/js/utils.js"></script>
</body>
</html>
<?php
    require_once "../config/conexao.php";
    require_once "../config/sessao.php";
    verificarLogin();

    $sql_especies = "SELECT * FROM especies";
    $resultado = $conexao->query($sql_especies);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <title>Especies</title>

</head>
<body>
    <div class="layout">
    <?php include("../assets/includes/sidebar.php"); ?>
    <?php include("../assets/includes/modal-excluir.php"); ?>

        <?php if (isset($_GET["erro"]) && $_GET["erro"] === "especie_em_uso"): ?>

            <div class="modal ativo" id="modal-erro-especie">
                <div class="modal-conteudo modal-erro">
                    <button class="modal-fechar" id="fechar-erro-especie">
                        &times;
                    </button>
                    <div class="erro-icone">⚠️</div>
                    <h2>Não foi possível excluir</h2>
                    <p>
                        Esta espécie está vinculada a um ou mais pets.
                    </p>
                    <button class="btn-modal" id="fechar-erro-btn">
                        Entendi
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="conteudo">
            <header>
                <h1>Espécies atendidas</h1>
            </header>

            <div class="button">
                <button class="btn" id="btn-nova-especie">+ Nova Espécie</button>
            </div>

            <table class="data-table">
                <thead class="table-header">
                    <tr>
                        <td>Id</td>
                        <td>Espécies Cadastradas</td>
                        <td>Ações</td>
                    </tr>
                </thead>

                <tbody>
                <?php while ($especie = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?=$especie["id"] ?> </td>
                        <td><?=$especie["especie"]?></td>
                        <td class="acoes">
                            <button type="button" class="btn-editar" data-id="<?= $especie["id"] ?>" data-tipo="especie">
                                <img src="../assets/imgs/pen.png" alt="Editar">
                            </button>
                            <button type="button" 
                                    class="btn-excluir" 
                                    data-id="<?= $especie["id"] ?>"
                                    data-tipo="especie">
                                <img src="../assets/imgs/delete.png" alt="Excluir">
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>


    <div class="modal" id="modal-especie">

        <div class="modal-conteudo">
            <button class="modal-fechar" id="fechar-modal-especie">&times;</button>

            <h2 id="titulo-modal-especie">Cadastrar nova Espécie</h2>
            <p>Informe o nome da nova espécie atendida pela clínica</p>

            <form method="POST" action="../actions/especies/create.php" id="form-especie">
                <input type="hidden" id="especie-id" name="id">
            
                <label for="especie">Nome</label>
                <input type="text" id="especie" name="especie" required>
                <button type="submit" class="btn-modal" id="btn-submit-especie">Cadastrar Espécie</button>
            </form>
        </div>
    </div>   

    <script src="../assets/js/utils.js"></script>
</body>
</html>
<?php
    require_once "../config/conexao.php";
    require_once "../config/sessao.php";
    verificarLogin();

    $sql_pets = "SELECT 
                    pets.id,
                    pets.nome,
                    responsaveis.nome AS responsavel,
                    pets.nascimento,
                    pets.genero,
                    especies.especie,
                    pets.prontuario
                FROM pets
                INNER JOIN responsaveis 
                    ON pets.responsavel_id = responsaveis.id
                INNER JOIN especies 
                    ON pets.especie_id = especies.id";

    $resultado = $conexao->query($sql_pets);

    $sql_numeros = "SELECT
                (SELECT COUNT(*) FROM pets) AS pets,
                (SELECT COUNT(*) FROM responsaveis) AS responsaveis,
                (SELECT COUNT(*) FROM especies) AS especies";

    $resultado_numeros = $conexao->query($sql_numeros);
    $totais = $resultado_numeros->fetch_assoc();
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
        <?php include("../assets/includes/modal-excluir.php"); ?>

        <main class="conteudo">
            <header>
                <h1>Dashboard</h1>
            </header>

            <div class="cartoes">
                <div class="cartao">
                    <h2>Cadastrados</h2>
                    <p class="contagem"><?= $totais["pets"] ?></p>
                    <p>pets</p>
                </div>
                
                <div class="cartao">
                    <h2>Espécies</h2>
                    <p class="contagem"><?= $totais["especies"] ?></p>
                    <p>atendidas</p>
                </div>
                <div class="cartao">
                    <h2>Responsáveis</h2>
                    <p class="contagem"><?= $totais["responsaveis"] ?></p>
                    <p>cadastrados</p>
                </div>
            </div>

            <div class="table-title">
                <h2>Pets cadastrados</h2>
                <div class="button">
                    <button class="btn" id="btn-novo-pet">+ Novo pet</button>
                </div>
            </div>

            <table class="data-table">
                <thead class="table-header"> 
                    <tr>
                        <td>Id</td>
                        <td>Nome</td>
                        <td>Espécie</td>
                        <td>Gênero</td>
                        <td>Responsável</td>
                        <td>Nascimento</td>
                        <td>Ações</td>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($pet = $resultado->fetch_assoc()): ?>   
                        <tr>
                            <td><?= $pet["id"] ?></td>
                            <td><?= $pet["nome"] ?></td>
                            <td><?= $pet["especie"] ?></td>
                            <td><?= $pet["genero"] ?></td>
                            <td><?= $pet["responsavel"] ?></td>
                            <td><?= $pet["nascimento"] ?></td>
                            <td class="acoes">
                                <button class="btn-detalhes">
                                    <img src="../assets/imgs/details.png" alt="Editar">
                                </button>
                                <button class="btn-editar">
                                    <img src="../assets/imgs/pen.png" alt="Editar">
                                </button>
                                <button type="button" 
                                        class="btn-excluir" 
                                        data-id="<?= $pet["id"] ?>"
                                        data-tipo="pet">
                                    <img src="../assets/imgs/delete.png" alt="Excluir">
                                </button>
                            </td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
        </main>

        <div class="modal" id="modal-pet">

            <div class="modal-conteudo">
                <button class="modal-fechar" id="fechar-modal-pet">&times;</button>

                <h2>Cadastrar novo pet</h2>
                <p>Preencha as informações do pet.</p>

                <form method="POST" action="../actions/pets/create.php">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" id="nascimento" name="nascimento" required>
                    <label for="especie">Espécie</label>
                    <select id="especie" name="especie_id" required>
                        <option value="">Selecione uma espécie</option>

                        <?php
                        $sql_especies = "SELECT * FROM especies";
                        $resultado_especies = $conexao->query($sql_especies);

                        while ($especie = $resultado_especies->fetch_assoc()):
                        ?>

                            <option value="<?= $especie["id"] ?>">
                                <?= $especie["especie"] ?>
                            </option>

                        <?php endwhile; ?>
                    </select>

                    <label for="genero">Gênero</label>
                    <select id="genero" name="genero" required>
                        <option value="">Selecione</option>
                        <option value="macho">Macho</option>
                        <option value="femea">Fêmea</option>
                    </select>

                    <label for="responsavel">Responsável</label>
                    <select id="responsavel" name="responsavel_id" required>
                        <option value="">Selecione um responsável</option>
                        <?php
                        $sql_responsaveis = "SELECT * FROM responsaveis";
                        $resultado_responsaveis = $conexao->query($sql_responsaveis);
                        while ($responsavel = $resultado_responsaveis->fetch_assoc()):
                        ?>
                            <option value="<?= $responsavel["id"] ?>">
                                <?= $responsavel["nome"] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="prontuario">Prontuário</label>
                    <textarea id="prontuario" name="prontuario"></textarea>

                    <button type="submit" class="btn-modal">Cadastrar pet</button>

                </form>
            </div>
        </div> 
    </div>

    <script src="../assets/js/utils.js"></script>
</body>
</html>
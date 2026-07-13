<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/Trabalho 2°T/assets/css/global.css">
  <link rel="stylesheet" href="/Trabalho 2°T/assets/css/pets.css">

  <title>Pets — Pet Chart</title>
</head>

<body>

  <div class="layout">

    <?php include("../assets/includes/sidebar.php"); ?>

    <main class="conteudo">

      <!-- Cabeçalho da página -->
      <div class="page-top">
        <h1>Pets cadastrados</h1>
        <button class="btn btn-primary" id="btn-novo">+ Novo pet</button>
      </div>

      <!-- Tabela virá aqui -->
       <!-- Tabela de pets -->
        <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Nascimento</th>
                <th>Gênero</th>
                <th>Prontuário</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($pets) > 0): ?>
                <?php foreach ($pets as $pet): ?>
                <tr>
                    <td><?= $pet['nome'] ?></td>
                    <td><?= $pet['especie'] ?></td>
                    <td><?= date('d/m/Y', strtotime($pet['nascimento'])) ?></td>
                    <td><?= $pet['genero'] ?></td>
                    <td><?= $pet['prontuario'] ?></td>
                    <td>
                    <button class="btn-sm btn-edit">Editar</button>
                    <button class="btn-sm btn-del">Excluir</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                <td colspan="6">Nenhum pet cadastrado ainda.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        </div>

      <!-- Modal virá aqui -->

    </main>

  </div>

</body>
</html>
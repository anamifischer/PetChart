<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/PetChart/assets/css/global.css">
  <link rel="stylesheet" href="/PetChart/assets/css/pets.css">

  <title>Pets — Pet Chart</title>
</head>

<body>


    <?php include("../assets/includes/sidebar.php"); ?>

    <!-- Cabeçalho da página -->
      <div class="page-top">
        <h1>Pets cadastrados</h1>
        <button class="btn btn-primary" id="btn-novo">+ Novo pet</button>
      </div>

    <table>
      <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Nascimento</td>
        <td>Gênero</td>
        <td>Espécie</td>
        <td>Prontuário</td>
      </tr>
    </table>







</body>
</html>
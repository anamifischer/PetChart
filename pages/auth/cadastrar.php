<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    

    <title>Login</title>

</head>
<body>
    <header class="auth">
        <img src="../../assets/imgs/logo-sem-fundo.png" alt="Logotipo da marca PetChart - uma pata de gato">
        <h1>PetChart</h1>
    </header>


        <div class="loginBox">
            <form method = "POST" action = "../../config/cadastro.php">
                <h2>Bem-vindo(a) ao PetChart</h2>
                <p>Realize seu cadastro para começar a utilizar</p>

                <p>Nome: </p> 
                <input type = "text" name = "nome"> <br>

                <p>E-mail: </p> 
                <input type = "text" name = "email"> <br>

                <p>Senha: </p>
                <input type = "password" name = "senha"> <br>

                <p>Confirme sua senha: </p>
                <input type = "password" name = "confirma_senha"> <br>
                
                <input type="submit" id="cadastrar" value="Criar Conta">
            </form>
        </div>

    <footer>
        <p>Pet Chart Soluções Digitais LTDA</p>
        <p>CNPJ 00.000.000/0001-01</p>
    </footer>

</body>
</html>
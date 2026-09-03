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
            <form method = "POST" action = "../../config/sessao.php">
                <h2>Bem-vindo(a) ao PetChart</h2>
                <p>Por favor, faça login para acessar aos recursos do sistema</p>

                <p>Usuário: </p> 
                <input type = "text" name = "email"> <br>

                <p>Senha: </p>
                <input type = "password" name = "senha"> <br> 
                
                <?php if (isset($_GET["erro"])): ?>
                    <p class="erro-login">E-mail ou senha incorretos.</p>
                <?php endif; ?>
                
                <input type="submit" id="Login" value="Login">

                <div class="links">
                    <a href = "cadastrar.php">Ainda não tem uma conta?</a>
                </div>
                
            </form>
        </div>

    <div class="footer">
        <p>Pet Chart Soluções Digitais LTDA</p>
        <p>CNPJ 00.000.000/0001-01</p>
    </div>

</body>
</html>
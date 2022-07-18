<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link Css -->
    <link rel="stylesheet" href="assets/css/loginStyle.css">
    <!-- Link Font Awesome -->
    <script src="https://kit.fontawesome.com/99a619f27c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>

        <ul>
            <li><a href="index.php">Pagina Inicial</a></li>
            <li><a href="sobreNos.php">Sobre Nós</a></li>
            <li><a href="login.php">Log-in</a></li>
        </ul>
   </nav>
    <div class="bg">
        <div class="container">
            <div class="text-login">
                <h1>Login</h1>
            </div>
            <form action="command/acaoLogin.php" method="post">
                <div class="input-box">
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input type="text" autocomplete="off" placeholder ="Nome de usuario" name="usuario">
                </div>
                <div class="input-box">
                    <div class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="password" placeholder="Digite sua senha" name="senha">
                </div>
                <div class="login-button">
                    <button type="submit" name="acao" value="login">Entrar</button>
                </div>
                <div class="feet">
                    <p>Not a member?<a href="forms/formUsuario.php">Sing up now</a></p>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
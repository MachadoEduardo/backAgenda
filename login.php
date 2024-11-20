<?php
session_start();
require 'classes/usuarios.class.php';

if (!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuarios = new Usuarios();
    if ($usuarios->fazerLogin($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        echo '<span style="color: red">' . "Usuário e/ou senha incorreto!" . '</span>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Login - ByteSquad</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .login-container {
            margin-top: 100px;
            max-width: 400px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container">
            <h1 class="text-center">Login</h1>
            <form method="POST">
                Email: <br>
                <input type="email" name="email"><br><br>
                Senha: <br>
                <input type="password" name="senha"><br><br>
                <a href="esqueceuSenha.php">Esqueci a senha!</a><br>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
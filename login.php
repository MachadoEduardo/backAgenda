<?php
session_start();
require 'classes/usuarios.class.php';

if (!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = $_POST['senha'];  // Não criptografe a senha aqui, vamos fazer isso com password_verify() depois

    $usuarios = new Usuarios();
    if ($usuarios->fazerLogin($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">Usuário e/ou senha incorreto!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>BackAgenda - Login</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }

        .login-container {
            margin-top: 100px;
            max-width: 400px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 700;
            text-align: center;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1.1rem;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            font-size: 0.9rem;
            color: #007bff;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            text-align: center;
            font-weight: 600;
        }

        .login-container .input-group {
            margin-bottom: 20px;
        }

        .input-group-text {
            background-color: #f0f2f5;
            border: 1px solid #ced4da;
            border-radius: 10px 0 0 10px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            border-radius: 10px;
            font-size: 1rem;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container">
            <h1>Login</h1>
            <form method="POST">
                <!-- Input Email -->
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
                </div>
                <!-- Input Senha -->
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Entrar</button>
                <div class="forgot-password">
                    <a href="esqueceuSenha.php">Esqueci minha senha</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>

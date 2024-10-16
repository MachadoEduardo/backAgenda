<?php
session_start();
require 'classes/usuarios.class.php';

if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuarios = new Usuarios();
    if($usuarios->fazerLogin($email, $senha)){
        header("Location: index.php");
        exit;
    } else{
        echo '<span style="color: red">'."Usuário e/ou senha incorreto!".'</span>';
    }
}
?>
<h1>LOGIN</h1>
<form method="POST">
    Email: <br>
    <input type="email" name="email"><br><br>
    Senha: <br>
    <input type="password" name="senha"><br><br>
    <a href="esqueceuSenha.php">Esqueci a senha!</a><br>
    <input type="submit" value="Entrar">
</form>


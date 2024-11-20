<?php
include 'classes/usuarios.class.php';
$usuario = new Usuarios();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $usuario->buscar($id);
    if (empty($info['email'])) {
        header("Location: indexUsuarios.php");
        exit;
    }
} else {
    header("Location: indexUsuarios.php");
    exit;
}
?>

<h1>EDITAR USUARIO</h1>

<form method="POST" action="editarUsuarioSubmit.php">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>"> <br>
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br><br>
    Email: <br>
    <input type="text" name="email" value="<?php echo $info['email']; ?>"><br><br>
    Senha: <br>
    <input type="text" name="senha" value=""><br><br>
    Permissões: <br>
    <input type="text" id="permissoes" name="permissoes" value="<?php echo $info['permissoes']; ?>"><br><br>
    <input type="submit" name="btAlterar" value="ALTERAR" />
</form>
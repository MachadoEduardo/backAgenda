<?php
    include 'classes/usuarios.class.php';

    $usuario = new Usuarios();
?>

<h1>Agenda Senac</h1>
<hr>
<button><a href="adicionarUsuario.php">ADICIONAR</a></button>
<table border="3" width="100%"> 
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>SENHA</th>
        <th>PERMISSOES</th>
        <th>AÇÕES</th>
    </tr>
<?php
    $lista = $usuario->listar();
    foreach ($lista as $item):
?>
<tbody>
    <tr>
        <td><?php echo $item['id']?></td>
        <td><?php echo $item['nome']?></td>
        <td><?php echo $item['email']?></td>
        <td><?php echo $item['senha']?></td>
        <td><?php echo $item['permissoes']?></td>
        <td>
            <a href="editarUsuario.php?id=<?php echo $item['id'];?>">EDITAR</a>
            <a href="excluirUsuario.php?id=<?php echo $item['id'];?>" onclick="return confirm('Você tem certeza que deseja excluir <?php echo $item['nome']?>? ')"> | EXCLUIR</a>
        </td>
    </tr>
</tbody>
<?php
    endforeach
?>

</table>
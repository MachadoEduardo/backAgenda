<?php
session_start();
include 'classes/contatos.class.php';
include 'classes/usuarios.class.php';

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$contato = new Contatos();
$usuarios = new Usuarios();
$usuarios->setUsuario($_SESSION['logado']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Página de Administração - Agenda de Contatos</title>
    <style>
        .table-container {
            max-width: 100%;
            margin: center;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        .btn-action {
            margin: 2px 0;
        }
    </style>
</head>
<body>
    <div>
        <h1 class="text-center mb-1">Administração de Contatos</h1>

        <!-- Botões de Ação -->
        <?php if ($usuarios->temPermissoes('add')): ?>
            <button><a href="adicionarContato.php">ADICIONAR</a></button>
        <?php endif; ?>

        <?php if ($usuarios->temPermissoes('super')): ?>
            <button><a href="listarUsuario.php">GERENCIAR Usuario</a></button>
        <?php endif; ?>

        <button><a href="sair.php">SAIR</a></button>
        <br><br>

        <!-- Tabela de Contatos -->
        <div class="table-container">
            <table border="6" class="table table-striped table-bordered table-hover shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>TELEFONE</th>
                        <th>ENDEREÇO</th>
                        <th>DATA DE NASCIMENTO</th>
                        <th>DESCRIÇÃO</th>
                        <th>LINKEDIN</th>
                        <th>EMAIL</th>
                        <th>FOTO</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lista = $contato->listar();
                    foreach ($lista as $item):
                    ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['telefone']; ?></td>
                        <td><?php echo $item['endereco']; ?></td>
                        <td><?php echo $item['dt_nasc']; ?></td>
                        <td><?php echo $item['descricao']; ?></td>
                        <td><?php echo $item['linkedin']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td>
                            <?php if (!empty($item['foto'])): ?>
                                <img src="img/contatos/<?php echo $item['foto']; ?>" alt="Foto de <?php echo $item['nome']; ?>" width="200" height="200">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="editarContato.php?id=<?php echo $item['id']; ?>">EDITAR</a>
                            <?php if ($usuarios->temPermissoes('del')): ?>
                                <a href="excluirContato.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Tem certeza que vai excluir esse contato <?php echo $item['nome']; ?>?')" class="btn btn-danger btn-sm btn-action">EXCLUIR</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

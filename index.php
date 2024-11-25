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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Página de Administração - Agenda de Contatos</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar a {
            color: white !important;
        }

        .navbar a:hover {
            color: #f8f9fa !important;
        }

        .container {
            margin-top: 30px;
        }

        .table-container {
            margin-top: 20px;
        }

        th,
        td {
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

        .btn-custom {
            margin: 5px 0;
            width: 100%;
        }

        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
            color: white !important;
        }

        .btn-danger:hover {
            background-color: #c82333 !important;
            border-color: #bd2130 !important;
        }

        .img-thumbnail {
            max-width: 100px;
            height: auto;
            border-radius: 10px;
        }

        .action-links a {
            margin: 5px;
            font-size: 0.9rem;
            color: #007bff;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: none;
            color: #0056b3;
        }

        .action-links a:focus {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agenda de Contatos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if ($usuarios->temPermissoes('ADD')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="adicionarContato.php"><i class="bi bi-person-plus"></i> Adicionar Contato</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($usuarios->temPermissoes('SUPER')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="indexUsuarios.php"><i class="bi bi-person-circle"></i> Gerenciar Usuários</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Administração de Contatos</h1>

        <!-- Tabela de Contatos -->
        <div class="card table-container">
            <div class="card-header">
                <h5 class="mb-0">Lista de Contatos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Data de Nascimento</th>
                                <th>Descrição</th>
                                <th>LinkedIn</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Ações</th>
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
                                            <img src="img/contatos/<?php echo $item['foto']; ?>" alt="Foto de <?php echo $item['nome']; ?>" class="img-thumbnail">
                                        <?php endif; ?>
                                    </td>
                                    <td class="action-links">
                                        <?php if ($usuarios->temPermissoes('EDIT')): ?>
                                            <a href="editarContato.php?id=<?php echo $item['id']; ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                                        <?php endif; ?>
                                        <?php if ($usuarios->temPermissoes('DELETE')): ?>
                                            <a href="excluirContato.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Tem certeza que vai excluir esse contato <?php echo $item['nome']; ?>?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'classes/usuarios.class.php';

$usuario = new Usuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Senac - Administração</title>

    <!-- Adicionando o Bootstrap para uma interface responsiva e moderna -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-custom {
            margin-right: 10px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 1rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            padding: 12px;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dfe4ea;
        }

        .actions a {
            color: #007bff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 0 5px;
            
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #007bff;
            color: white;
        }

        .actions .btn-danger {
            background-color: #dc3545;
            color: white;
            
        }

        .actions .btn-danger:hover {
            background-color: #c82333;
            
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Agenda Senac - Administração</h1>

    <!-- Botões de navegação -->
    <div class="text-center mb-4">
        <a href="sair.php" class="btn btn-custom btn-danger"><i class="fas fa-sign-out-alt"></i> SAIR</a>
        <a href="index.php" class="btn btn-custom btn-primary"><i class="fas fa-edit"></i> EDITAR CONTATOS</a>
    </div>

    <!-- Tabela de usuários -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>SENHA</th>
                    <th>PERMISSÕES</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $usuario->listar();
                foreach ($lista as $item):
                ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo $item['senha']; ?></td>
                        <td><?php echo $item['permissoes']; ?></td>
                        <td class="actions">
                            <a href="editarUsuario.php?id=<?php echo $item['id']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a>
                            <a href="excluirUsuario.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Você tem certeza que deseja excluir <?php echo $item['nome']; ?>?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Botão para adicionar novo usuário -->
    <div class="text-center mt-4">
        <a href="adicionarUsuario.php" class="btn btn-success btn-custom"><i class="fas fa-plus-circle"></i> ADICIONAR USUÁRIO</a>
    </div>
</div>

<!-- Scripts do Bootstrap e FontAwesome -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

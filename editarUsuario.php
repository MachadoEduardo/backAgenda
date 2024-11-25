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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!-- Link do Bootstrap para deixar a página mais moderna -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-size: 1.1rem;
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        input, select {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input, .form-group select {
            border-color: #ddd;
            font-size: 1rem;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Editar Usuário</h1>

    <!-- Formulário de Edição de Usuário -->
    <form method="POST" action="editarUsuarioSubmit.php">
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $info['nome']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $info['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" value="">
        </div>

        <div class="form-group">
            <label for="permissoes">Permissões:</label>
            <input type="text" class="form-control" id="permissoes" name="permissoes" value="<?php echo $info['permissoes']; ?>" required>
        </div>

        <button type="submit" name="btAlterar" class="btn btn-custom">Alterar Usuário</button>
    </form>
</div>

<!-- Scripts do Bootstrap e FontAwesome -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

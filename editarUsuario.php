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
    <input type="text" name="senha" value="<?php echo $info['senha']; ?>"><br><br>
    Permissões: <br>
    <input type="hidden" id="permissoes" name="permissoes" value="<?php echo $info['permissoes']; ?>"><br><br>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Super" id="superCheck">
        <label class="form-check-label" for="superCheck">Super</label><br>

        <input class="form-check-input" type="checkbox" value="Add" id="addCheck">
        <label class="form-check-label" for="addCheck">Add</label><br>

        <input class="form-check-input" type="checkbox" value="Delete" id="deleteCheck">
        <label class="form-check-label" for="deleteCheck">Delete</label><br>

        <input class="form-check-input" type="checkbox" value="Edit" id="editCheck">
        <label class="form-check-label" for="editCheck">Edit</label><br>
    </div>
    <input type="submit" name="btAlterar" value="ALTERAR" />
</form>

<script>
    // Seleciona todas as checkboxes
    const checkboxes = document.querySelectorAll('.form-check-input');
    const permissoesInput = document.getElementById('permissoes');

    // Função para atualizar o input "permissoes" com os valores das checkboxes selecionadas
    function atualizarPermissoes() {
        const permissoesSelecionadas = [];
        
        // Itera por todas as checkboxes e adiciona os valores marcados ao array
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                permissoesSelecionadas.push(checkbox.value);
            }
        });

        // Atualiza o valor do input hidden com as permissões selecionadas, separadas por vírgula
        permissoesInput.value = permissoesSelecionadas.join(', ');
    }

    // Adiciona um evento de 'change' para cada checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', atualizarPermissoes);
    });

    // Chama a função para preencher o campo com as permissões salvas quando a página carregar
    window.onload = atualizarPermissoes;
</script>
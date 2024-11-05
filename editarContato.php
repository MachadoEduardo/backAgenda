<?php   
include 'classes/contatos.class.php';
$contato = new Contatos();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $contato->buscar($id);
    if(empty($info['email'])){
        header("Location: /backsenac");
        exit;
    }
} else {
    header("Location: /backsenac");
    exit;  
}
if(!empty($_POST['id'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dt_nasc = $_POST['dt_nasc'];
    $descricao = $_POST['descricao'];
    $linkedin = $_POST['linkedin'];
    $email = $_POST['email'];
    if(isset($_FILES['foto'])){
        $foto = $_FILES['foto'];
    } else {
        $foto = array();
    }

    if(!empty($email)){
        $contato->editar($nome, $telefone, $endereco, $dt_nasc, $descricao, $linkedin, $email, $foto, $_GET['id']);
    }
    header("Location: /backsenac");
}
if(isset($_GET["id"]) && !empty($_GET['id'])){
    $info = $contato->getContato($_GET['id']);
} else {
    ?>
    <script type="text/javascript">window.location.href="index.php";</script>
    <?php 
    exit;
}

?>

<h1>EDITAR CONTATO</h1>

<form method="POST" enctype="multipart/form-data"> <!-- Corrigido a tag form -->
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>"><br>
    
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br><br>
    
    Telefone: <br>
    <input type="text" name="telefone" value="<?php echo $info['telefone']; ?>"><br><br>
    
    Endereço: <br>
    <input type="text" name="endereco" value="<?php echo $info['endereco']; ?>"><br><br>
    
    Data de nascimento: <br>
    <input type="date" name="dt_nasc" value="<?php echo $info['dt_nasc']; ?>"><br><br>
    
    Descrição: <br>
    <input type="text" name="descricao" value="<?php echo $info['descricao']; ?>"><br><br>
    
    Linkedin: <br>
    <input type="text" name="linkedin" value="<?php echo $info['linkedin']; ?>"><br><br>
    
    Email: <br>
    <input type="text" name="email" value="<?php echo $info['email']; ?>"><br><br>
    
    Foto: <br>
    <input type="file" name="foto[]" multiple /><br>
    
    <div class="grupo">
        <div class="cabecalho">Foto Contato</div>
        <div class="corpo">
            <?php foreach($info['foto'] as $foto) { ?> <!-- Corrigido o foreach -->
                <div class="foto_item">
                    <img src="img/contatos/<?php echo $foto['url']; ?>" alt="Foto do Contato"/> <!-- Corrigido o src -->
                    <a href="excluir_foto.php?id=<?php echo $foto['id']; ?>">Excluir Imagem</a> <!-- Corrigido o echo -->
                </div>
            <?php } ?>
        </div>
    </div>
    
    <input type="submit" name="btAlterar" value="ALTERAR"/>
</form>


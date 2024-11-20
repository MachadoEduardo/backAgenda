<?php
require_once 'conexao.class.php';
class Usuarios
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    /* permissoes: add, edit, del, super ou utilizar checkbox para isso */
    private $permissoes;

    private $con;

    public function __construct()
    {
        // Método construtor é o primeiro método a ser executado
        $this->con = new Conexao();
    }

    public function existeEmail($email){
        $sql = $this->con->conectar()->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(); //fetch retorna o email encontrado
        } else {
            $array = array();
        }
        return $array;
    }

    public function adicionar($email, $nome, $senha, $permissoes)
    {
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->senha = $senha;
                $this->permissoes = $permissoes;
                $this->email = $email;
                $sql = $this->con->conectar()->prepare("INSERT INTO usuarios(nome, email, senha, permissoes) VALUES 
                (:nome, :email, :senha, :permissoes)");

                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', md5($senha));
                $sql->bindValue(':permissoes', $permissoes);
                $sql->execute();
                return TRUE;

            } catch (PDOException $ex) {
                return 'ERRO: ' . $ex->getMessage();
            }
        } else {
            return FALSE;
        }
    }

    public function listar()
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }
    
    public function buscar($id)
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return array();
            }
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }

    public function editar($nome, $email, $senha, $permissoes, $id){
        $emailExistente = $this -> existeEmail($email);
        if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
            return FALSE;
        } else{
            try{
                $sql = $this->con->conectar()->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, permissoes = :permissoes WHERE id = :id");
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', md5($senha));
                $sql->bindValue(':permissoes', $permissoes);
                $sql->bindValue(':id', $id);

                $sql->execute();
                return TRUE;
            } catch(PDOException $ex){
                echo 'ERRO'.$ex->getMessage();
            }     
        }
    }

    public function deletar($id){
        $sql = $this->con->conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function fazerLogin($email, $senha){
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['logado'] = $sql['id'];
            return TRUE;
        }
        return FALSE;
    }
    public function setUsuario($id){
        $this->id = $id;
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $this->permissoes = explode(', ', $sql['permissoes']); // Transforma em array
        }
    }
    public function getPermissoes(){
        return $this->permissoes;
    }
    public function temPermissoes($p){
        if(in_array($p, $this->permissoes)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

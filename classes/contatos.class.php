<?php
require 'conexao.class.php';
class Contatos
{
    private $id;
    private $nome;
    private $endereço;
    private $dt_nasc;
    private $descricao;
    private $linkedin;
    private $email;
    private $foto;

    private $con;

    public function __construct()
    {
        // Método construtor é o primeiro método a ser executado
        $this->con = new Conexao();
    }
    private function existeEmail($email)
    {
        $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(); //fetch retorna o email encontrado
        } else {
            $array = array();
        }
        return $array;
    }
    public function adicionar($email, $nome, $telefone, $endereco, $dt_nasc, $descricao, $linkedin, $foto)
    {
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->telefone = $telefone;
                $this->endereco = $endereco;
                $this->dt_nasc = $dt_nasc;
                $this->descricao = $descricao;
                $this->linkedin = $linkedin;
                $this->foto = $foto;
                $this->email = $email;
                $sql = $this->con->conectar()->prepare("INSERT INTO contatos(nome, telefone, endereco, dt_nasc, descricao, linkedin, foto, email) VALUES 
                (:nome, :telefone, :endereco, :dt_nasc, :descricao, :linkedin, :email, :foto)");

                $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
                $sql->bindParam(':telefone', $telefone, PDO::PARAM_STR);
                $sql->bindParam(':endereco', $endereco, PDO::PARAM_STR);
                $sql->bindParam(':dt_nasc', $dt_nasc, PDO::PARAM_STR);
                $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
                $sql->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
                $sql->bindParam(':email', $email, PDO::PARAM_STR);
                $sql->bindParam(':foto', $foto, PDO::PARAM_STR);
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
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }

    public function buscar($id)
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos WHERE id = :id");
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

    public function editar($nome, $telefone, $endereco, $dt_nasc, $descricao, $linkedin, $email, $foto, $id){
        $emailExistente = $this -> existeEmail($email);
        if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
            return FALSE;
        } else{
            try{
                $sql = $this->con->conectar()->prepare("UPDATE contatos SET nome = :nome, telefone = :telefone, endereco = :endereco, dt_nasc = :dt_nasc, descricao = :descricao, linkedin = :linkedin, email = :email, foto = :foto WHERE id = :id");
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':telefone', $telefone);
                $sql->bindValue(':endereco', $endereco);
                $sql->bindValue(':dt_nasc', $dt_nasc);
                $sql->bindValue(':descricao', $descricao);
                $sql->bindValue(':linkedin', $linkedin);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':foto', $foto);
                $sql->bindValue(':id', $id);

                $sql->execute();
                // Inserir imagens
                if(count($foto) > 0){
                    for($q = 0; $q < count($foto['tmp_name']); $q++){
                        $tipo = $foto['type']['$q'];
                        if(in_array($tipo, array('image/jpeg', 'image/png'))){
                            $tmpname = md5(time().rand(0, 999)).'.jpg';
                            move_uploaded_file($foto['tmp_name'][$q], 'img/contatos/'.$tmpname);
                            list($width_orig, $height_orig) = getimagesize('img/contatos'.$tmpname);
                            $ratio = $width_orig/$height_orig;

                            $width = 500;
                            $height = 500;

                            if($width/$height > $ratio){
                                $width = $height * $ratio;
                            }
                        }
                 }
                }
                return TRUE;
            } catch(PDOException $ex){
                echo 'ERRO'.$ex->getMessage();
            }     
        }
    }

    public function deletar($id){
        $sql = $this->con->conectar()->prepare("DELETE FROM contatos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
<?php
include 'classes/contatos.class.php';
$con = new Contatos();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $con->deletar($id);
    header("Location: index.php");
}
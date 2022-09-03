<?php
session_start();
include('verifica_login.php');
include_once "conexao.php";

$id = $_GET['codigo'];
if (mysqli_query($conexao, "delete from alunos where matricula = '$id'")) {
    session_start();
    $_SESSION['msg'] = "Removido com sucesso";
    header("location: alunos.php");
} else {
    $_SESSION['msg'] = "Falha na remoção";
}
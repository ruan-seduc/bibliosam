<?php
session_start();
include('verifica_login.php');
include_once "conexao.php";

$id = $_GET['codigo'];
if (mysqli_query($conexao, "delete from alunos where matricula = '$id'")) {
    echo ("<script>alert('Aluno removido com sucesso!')</script>");
    header("location: alunos.php");
} else {
    echo ("<script>alert('Algo não funcionou!')</script>");
}
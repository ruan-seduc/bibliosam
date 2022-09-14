<?php
session_start();
include('verifica_login.php');
include_once "conexao.php";

$id = $_GET['codigo'];
if (mysqli_query($conexao, "delete from livros where codigo = '$id'")) {
    if (mysqli_query($conexao, "delete from historico where codigo = '$id'")) {
        echo ("<script>alert('Livro removido com sucesso!')</script>");
        header("location: home.php");
    }
} else {
    echo ("<script>alert('Algo deu errado!')</script>");
}
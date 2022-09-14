<?php
session_start();
include('verifica_login.php');
include_once "conexao.php";

$id = $_GET['codigo'];

$sql = "select count(*) as total from registro where codigo = '$id'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    echo ("<script>alert('Erro! Você não pode remover um livro que está emprestado. Registre a devolução do livro para que possa removê-lo')</script>");
}

echo ("
    <script>
var resultado = confirm('Tem certeza que deseja excluir o livro selecionado? Essa ação NÃO PODE SER DESFEITA.');
if (resultado == true) {
    window.location.href = 'deletar.php?codigo=" . $id . "'
} else {
    window.location.href = 'home.php';
}
</script>");
<?php
    session_start();
    include('verifica_login.php');
    include_once "conexao.php";

    $id = $_GET['codigo'];

    echo("
    <script>
var resultado = confirm('Tem certeza que deseja excluir o livro selecionado? Essa ação NÃO PODE SER DESFEITA.');
if (resultado == true) {
    window.location.href = 'deletar.php?codigo=". $id . "'
} else {
    window.location.href = 'home.php';
}
</script>");

?>
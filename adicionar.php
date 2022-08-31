<?php
session_start();
include('verifica_login.php');
include "conexao.php";

if (isset($_POST['codigo'])) {
    $codigo = trim($_POST['codigo']);
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $paginas = $_POST['paginas'];
    $publicacao = $_POST['publicacao'];
    $publicacao = date("Y-m-d",strtotime(str_replace('/','-',$publicacao))); 

    $sql = "select count(*) as total from livros where codigo = '$codigo'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	echo("<script>alert('Erro: código duplicado! Você não pode cadastrar dois livros com o mesmo código.'); window.location.href = 'adicionar.php'</script>");
	exit;
}
    if (mysqli_query($conexao, "insert into livros (codigo, titulo, autor, editora, paginas, publicacao, data_cadastro) values ('$codigo','$titulo','$autor','$editora','$paginas','$publicacao', NOW()) ")) {
    ?>
<script type="text/javascript">
alert("Livro adicionado com sucesso!")
window.location.href = "home.php";
</script>"
<?php

    } else {

        echo "
        <div>
        <p>Desculpe, algo não funcionou!</p>
        </div>";
    }
}
mysqli_close($conexao);


?>






<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/style-form.css">

    <title>Adicionar Livro</title>
</head>

<body class="body-form">
    <div class="container">
        <!-- NavBar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Easy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex">
                        <div class="me-2">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Sair</a>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
        <!--//NavBar-->
        <h1 class="text-start text-white mt-5 pt-4 pb-3">Adicionar Livro</h1>

        <div id="controlDiv" class="row justify-content-start">
            <div class="col-8 text-white">
                <form method="post" action="">

                    <div class="mb-3">
                        <label class="form-label">Código do Livro</label>
                        <input class="form-control" type="text" name="codigo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input class="form-control" type="text" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <input class="form-control" type="text" name="autor" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editora</label>
                        <input class="form-control" type="text" name="editora" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nº de Páginas</label>
                        <input class="form-control" type="text" name="paginas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data de Publicação</label>
                        <input class="form-control" type="date" name="publicacao" required>
                    </div>
                    <button type="submit" class="btn btn-dark">ADICIONAR</button>
                </form>
            </div>
        </div>
    </div>

    <!--JS-->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
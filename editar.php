<?php
session_start();
include('verifica_login.php');
include "conexao.php";

if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $resultado = mysqli_query($conexao, "Select * from livros where codigo = '$id'");
    $dados = mysqli_fetch_array($resultado);
}

if (isset($_POST['codigo'])) {
    $codigo = trim($_POST['codigo']);
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $publicacao = date("Y-m-d", strtotime(str_replace('/', '-', $publicacao)));

    $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', editora = '$editora' WHERE codigo = '$id'";
    if (mysqli_query($conexao, $sql)) {
        echo ("<script>alert('Livro atualizado com sucesso!'); window.location.href = 'home.php'</script>");
    }
}
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

    <title>Editar Livro</title>
</head>
</head>

<body class="body-form">

    <div class="container">
        <!-- NavBar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">BiblioTech</a>
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

        <h1 class="text-start text-white mt-5 pt-4 pb-3">Tela de Edição</h1>

        <div id="controlDiv" class="row justify-content-start">
            <div class="col-8 text-white">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Código</label>
                        <input readonly class="form-control" type="text" name="codigo"
                            value="<?php echo trim($dados["codigo"]) ?>">
                        <small class="form-text text-muted">Por questões de integridade, não é possível alterar o código
                            do livro.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input class="form-control" type="text" name="titulo" value="<?php echo $dados['titulo'] ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <input class="form-control" type="text" name="autor" value="<?php echo $dados['autor'] ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editora</label>
                        <input class="form-control" type="text" name="editora" value="<?php echo $dados['editora'] ?>"
                            required>
                    </div>
                    <button class="btn btn-dark" type="submit"> ATUALIZAR </button>
                </form>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
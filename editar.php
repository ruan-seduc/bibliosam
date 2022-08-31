<?php
session_start();
include('verifica_login.php');
include "conexao.php";

if(isset($_GET['codigo'])){
    $id = $_GET['codigo'];
    $resultado = mysqli_query($conexao, "Select * from livros where codigo = '$id'");
    $dados = mysqli_fetch_array($resultado);

} 

if(isset($_POST['codigo'])){
    $codigo = trim($_POST['codigo']);
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $paginas = $_POST['paginas'];
    $publicacao = $_POST['publicacao'];
    $publicacao = date("Y-m-d",strtotime(str_replace('/','-',$publicacao))); 

    $sqlc = "select count(*) as total from livros where codigo = '$codigo'";
    $resultc = mysqli_query($conexao, $sqlc);
    $rowc = mysqli_fetch_assoc($resultc);

    if($row['total'] == 1) {
        echo("<script>alert('Erro: código duplicado! Você não pode cadastrar dois livros com o mesmo código.'); window.location.href = 'adicionar.php'</script>");
        exit;
    }

    $sql = "UPDATE livros SET codigo = '$codigo', titulo = '$titulo', autor = '$autor', editora = '$editora', paginas = '$paginas', publicacao = '$publicacao' WHERE codigo = '$id'";
    if(mysqli_query($conexao, $sql)){
        $_SESSION['msg'] = "Atualizado com Sucesso!";

        echo '

            <script>
                    window.location.href = "home.php";
            </script>
        
        ';

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
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark rounded">
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
                        <input class="form-control" type="text" name="codigo"
                            value=" <?php echo trim($dados["codigo"]) ?> ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input class="form-control" type="text" name="titulo" value="<?php echo $dados['titulo']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <input class="form-control" type="text" name="autor" value="<?php echo $dados['autor']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editora</label>
                        <input class="form-control" type="text" name="editora" value="<?php echo $dados['editora']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nº de Páginas</label>
                        <input class="form-control" ype="text" name="paginas" value="<?php echo $dados['paginas']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data de Publicação</label>
                        <input class="form-control" type="date" name="publicacao"
                            value="<?php echo $dados['publicacao']?>">
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
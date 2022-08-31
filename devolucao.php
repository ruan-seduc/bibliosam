<?php
    session_start();
    include('verifica_login.php');
    include "conexao.php";
    
    if(isset($_GET['codigo'])){
        $id = trim($_GET['codigo']);
        $resultado = mysqli_query($conexao, "Select * from registro where codigo = '$id'");
        $dados = mysqli_fetch_array($resultado);
    }

    if (isset($_POST['codigo'])) {
        $codigo = trim($_POST['codigo']);
        $nome = $_POST['nome'];
        $turma = $_POST['turma'];
        $emprestado = $_POST['data'];
        $prazo = $_POST['prazo'];
        $devolucao = $_POST['devolucao'];
    
        $sql = "select count(*) as total from registro where codigo = '$codigo'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_query($conexao, "delete from registro where codigo = '$codigo'")) {
            $sqlb = "UPDATE livros SET status = 'disponivel' WHERE codigo = '$codigo'";
            if(mysqli_query($conexao, $sqlb)){
                ?>
<script type="text/javascript">
alert("Livro devolvido com sucesso!")
window.location.href = "home.php";
</script>
<?php

            }
            else{
                echo("<script type='text/javascript'>
                alert('Livro devolvido com sucesso!')
                window.location.href = 'home.php';
                </script>");
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style-form.css">

    <title>Devolver Livro</title>
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
        <h1 class="text-start text-white mt-5 pt-4 pb-3">Devolver Livro</h1>

        <div id="controlDiv" class="row justify-content-start">
            <div class="col-8 text-white">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Código do Livro</label>
                        <input class="form-control" type="text" name="codigo" value=" <?php echo $dados["codigo"] ?> "
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" value=" <?php echo $dados["nome"] ?>"
                            required>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Turma</label>
                        <input class="form-control" type="text" name="turma" value=" <?php echo $dados["turma"] ?>"
                            required>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Data do Empréstimo</label>
                        <input class="form-control" type="text" name="data" value=" <?php echo $dados["data"] ?>"
                            required>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Prazo de Devolução</label>
                        <input class="form-control" type="text" name="prazo"
                            value=" <?php echo $dados["prazo"]." dias" ?>" required>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Data da Devolução</label>
                        <input class="form-control" type="date" name="devolucao" required>
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main JS -->
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>
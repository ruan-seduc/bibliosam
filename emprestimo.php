<?php
session_start();
include('verifica_login.php');
include "conexao.php";

if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $resultadol = mysqli_query($conexao, "Select * from livros where codigo = '$id'");
    $dadosl = mysqli_fetch_array($resultadol);

    $search = mysqli_query($conexao, "SELECT codigo, status FROM livros where codigo = '$id' AND status = 'emprestado'");
    if (mysqli_num_rows($search)) {
        header('Location: devolucao.php?codigo=' . $id);
        exit;
    };
}

if (isset($_POST['codigo'])) {
    $codigo = trim($_POST['codigo']);
    $matricula = $_POST['matricula'];
    $emprestado = $_POST['data'];
    $prazo = $_POST['prazo'];

    $sql = "select count(*) as total from registro where codigo = '$codigo'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        $_SESSION['codigo_duplicado'] = true;
        header('Location: emprestimo.php');
        exit;
    }
    if (mysqli_query($conexao, "insert into registro (codigo, matricula, data, prazo) Value ('$codigo','$matricula','$emprestado','$prazo') ")) {
        $sqlb = "UPDATE livros SET status = 'emprestado' WHERE codigo = '$id'";
        if (mysqli_query($conexao, $sqlb)) {
?>
<script type="text/javascript">
alert("Empréstimo realizado com sucesso!")
window.location.href = "home.php";
</script>
<?php

        }
    } else { ?>
<script type="text/javascript">
alert("Algo deu errado!")
window.location.href = "home.php";
</script>
<?php
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

    <title>Emprestar Livro</title>
</head>

<body class="body-form">
    <div class="container">
        <!-- NavBar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Biblioteca</a>
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
                                    <a class="nav-link" href="alunos.php">Alunos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
        <!--//NavBar-->
        <h1 class="text-start text-white mt-5 pt-4 pb-3">Emprestar Livro</h1>

        <div id="controlDiv" class="row justify-content-start">
            <div class="col-8 text-white">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Código do Livro</label>
                        <input class="form-control" type="text" name="codigo" required
                            value=" <?php echo ($dadosl["codigo"]) ?> ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nº de matrícula</label>
                        <input class="form-control" type="text" name="matricula" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Turma</label>
                        <input class="form-control" type="text" name="turma" required>
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Data do Empréstimo</label>
                        <input class="form-control" type="date" name="data" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prazo de Devolução (em dias)</label>
                        <input class="form-control" type="text" name="prazo" required>
                    </div>
                    <button type="submit" class="btn btn-dark">REGISTRAR</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Main JS -->
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>
<?php
session_start();
include('verifica_login.php');
include("conexao.php");

if (isset($_POST['matricula'])) {
    $codigo = trim($_POST['matricula']);
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];

    $sql = "select count(*) as total from alunos where matricula = '$codigo'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        echo ("<script>alert('Erro: código duplicado! Você não pode cadastrar o mesmo número de matrícula duas vezes.'); window.location.href = 'cadastro_alunos.php'</script>");
        exit;
    }
    if (mysqli_query($conexao, "insert into alunos (matricula, nome, turma) values ('$codigo','$nome','$turma') ")) {
?>
<script type="text/javascript">
alert("Aluno cadastrado com sucesso!")
window.location.href = "alunos.php";
</script>
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

    <title>Cadastrar Aluno</title>
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
        <h1 class="text-start text-white mt-5 pt-4 pb-3">Cadastrar Aluno</h1>

        <div id="controlDiv" class="row justify-content-start">
            <div class="col-8 text-white">
                <form method="post" action="">

                    <div class="mb-3">
                        <label class="form-label">Matrícula</label>
                        <input class="form-control" type="text" name="matricula" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Turma</label>
                        <input class="form-control" type="text" name="turma" required>
                    </div>
                    <button type="submit" class="btn btn-dark">CADASTRAR</button>
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
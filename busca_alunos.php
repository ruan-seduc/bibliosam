<?php
session_start();
include('verifica_login.php');
include "conexao.php";

if (!isset($_GET['busca_alunos'])) {
    header("Location: alunos.php");
    exit;
}

$busca = trim($_GET['busca_alunos']);

// $sql = mysqli_query($conexao, "SELECT * FROM livros WHERE titulo LIKE '%$busca%' order by titulo");

// sistema de paginação
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
if (!$pagina) {
    $pc = "1";
} else {
    $pc = $pagina;
}

$total_reg = "2"; // número de registros por página

$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = mysqli_query($conexao, "SELECT * FROM alunos WHERE nome LIKE '%$busca%' OR turma LIKE '%$busca%' ORDER BY nome LIMIT $inicio,$total_reg");
$todos = mysqli_query($conexao, "SELECT * FROM alunos WHERE nome LIKE '%$busca%' OR turma LIKE '%$busca%' ORDER BY nome");

$tr = mysqli_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas

/*$count = mysqli_num_rows($sql);
if ($count == 0) {
    echo "Nenhum resultado!";
} else {
    // senão
    if ($count == 1) {
        echo "1 resultado encontrado! <br>";
    }
    // se houver um resultado diz que existe um resultado
    if ($count > 1) {
        echo "$count resultados encontrados! <br>";
    }
    // se houver mais de um resultado diz quantos resultados existem
    while ($dados = mysqli_fetch_array($sql)) {
        // enquanto houverem resultados...
        echo "$dados[titulo]";
        echo " - $dados[codigo] <br>";
        // exibir a coluna nome e a coluna email
    }
} */ ?>

<!doctype html>
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

    <link rel="stylesheet" href="assets/css/style-home.css">

    <title>Controle de Livros</title>
</head>

<body>
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

        <h1 class="text-center mt-5 p-4">Busca de Livros</h1>

        <div class="row justify-content-center">
            <div class="accordion mt-4 col-8 media-control" id="accordion">
                <?php
                for ($read = 1; $res = mysqli_fetch_array($limite); $read++) {
                    echo "
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='heading" . $read . "'>
                            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapse" . $read . "' aria-expanded='false' aria-controls='collapse" . $read . "'>"
                        . $res['nome'] . " - " . $res['turma'] . "
                            </button>
                            </h2>
                            <div id='collapse" . $read . "' class='accordion-collapse collapse' aria-labelledby='heading" . $read . "'
                            data-bs-parent='#accordion'>
                            <div class='row justify-content-center'>
                                <div class='accordion-body col-auto'>
                                    Matrícula: " . $res['matricula'] . "<br>
                                    <div class='mt-3'>
                                        <a href='confirmar_remocao_aluno.php?codigo=" . $res['matricula'] . "'><i class='material-icons' style='color: brown;'>close</i></a>
                                        <a href='editar_aluno.php?codigo=" . $res['matricula'] . "' ><i class='material-icons' style='color: brown;'>edit</i></a>
                                        <a href='historico.php?matricula=" . $res['matricula'] . "'><i class='material-icons' style='color: brown;' >app_registration</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                }
                ?>
            </div>
            <?php
            $anterior = $pc - 1;
            $proximo = $pc + 1;
            if ($pc > 1) {
                echo " <a class='btn btn-dark' role='button' href='?busca_alunos=$busca&pagina=$anterior'><- Anterior</a> ";
            }
            if ($pc < $tp) {
                echo " <a class='btn btn-dark' role='button' href='?busca_alunos=$busca&pagina=$proximo'>Próxima -></a>";
            }
            ?>
        </div>
    </div>
    <!-- JS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
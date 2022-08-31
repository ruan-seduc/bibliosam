<?php
    session_start();
    include('verifica_login.php');
    include "conexao.php";


    $resultado = mysqli_query($conexao, "select * from livros");
?>

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
        <h1 class="text-center mt-5 p-4">Controle de Livros</h1>

        <div class="row justify-content-center">
            <div class="col-6">
                <input id="searchbar" onkeyup="search_books()" type="text" class="form-control"
                    placeholder="Pesquisar livros">
            </div>
        </div>

        <style>
        .form-control:focus {
            border-color: rgb(102, 52, 45) !important;
            box-shadow: 0 0 0 0.12rem rgba(102, 52, 45, 0.719);
        }
        </style>

        <div class="row justify-content-center">
            <div class="col-auto mt-3">
                <a class="btn btn-dark" href="adicionar.php" role="button">Adicionar Livro</a>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="accordion mt-4 col-8 media-control" id="accordion">
                <?php 
                 for($read=1; $res = mysqli_fetch_array($resultado); $read++){
                    echo "
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='heading".$read."'>
                            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapse".$read."' aria-expanded='false' aria-controls='collapse".$read."'>"
                            . $res['codigo']. " - ". $res['titulo']."
                            </button>
                            </h2>
                            <div id='collapse".$read."' class='accordion-collapse collapse' aria-labelledby='heading".$read."'
                            data-bs-parent='#accordion'>
                            <div class='row justify-content-center'>
                                <div class='accordion-body col-auto'>
                                    Autor: ".$res['autor']."<br>
                                    Editora: ".$res['editora']."<br>
                                    Nº de Páginas: ".$res['paginas']."<br>
                                    Data de Publicação: ".$res['publicacao']." <br>
                                    Status: ".$res['status']."<br>
                                    <div class='mt-3'>
                                        <a href='confirmar_delete.php?codigo=". $res['codigo'] ."'><i class='material-icons' style='color: brown;'>close</i></a>
                                        <a href='editar.php?codigo=". $res['codigo'] ."' ><i class='material-icons' style='color: brown;'>edit</i></a>
                                        <a href='emprestimo.php?codigo=". $res['codigo'] ."'><i class='material-icons' style='color: brown;' >app_registration</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
            ?>
            </div>
        </div>


        <!--Accordion
        <div class="accordion mt-5" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Autor: fulano<br>
                        Editora: tal<br>
                        Ano de Publicação: 1111-11-11<br>
                        <a href="editar.php?codigo=123"><i class="material-icons" style='color: black;'>edit</i></a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
        </div>
-->
    </div>

    <!-- JS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- SearchBar JS -->
    <script src="assets/js/search2.js"></script>

</body>

</html>
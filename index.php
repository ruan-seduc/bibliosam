<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style-home.css">
    <title>Sistema de Login</title>
</head>

<body>
    <section class="h-100 bg">
        <div class="container h-100%">
            <div class="row justify-content-sm-center align-items-center vh-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <!--<div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo"
                            width="100">
                    </div>-->
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        ERRO: Usuário ou senha inválidos.
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Login</h1>
                            <form method="POST" action="login.php" class="needs-validation">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted">Usuário</label>
                                    <input type="text" class="form-control" name="usuario" value="" required autofocus>
                                </div>

                                <style>
                                .form-control:focus {
                                    border-color: rgb(102, 52, 45) !important;
                                    box-shadow: 0 0 0 0.12rem rgba(102, 52, 45, 0.719);
                                }
                                </style>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                    </div>
                                    <input type="password" class="form-control" name="senha" required>
                                </div>

                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-dark ms-auto btnmain">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Ainda não é cadastrado? <a href="cadastro.php" class="text-dark">Cadastre-se</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
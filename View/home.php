<?php
require_once('../config/config.php');
if (!isset($_SESSION['usuario']) && empty($_SESSION['usuario'])) {
    header('Location: login/login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laboratório 03</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item-active">
                    <a class="nav-link text-dark" href="#">Home</a>
                </li>
                <?php if ($_SESSION['usuarioTipo'] != 'Aluno') { ?>
                    <li class="nav-item">
                        <a class="nav-link  tex-dark" href="painel/painel.php">Painel Administrativo</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link  tex-dark" href="controleMoedas/controleMoedas.php">Controle de Moedas</a>
                </li>
                <li class="nav-item-active">
                    <a class="nav-link  tex-dark" href="vantagens/vantagens.php">Vantagens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tex-dark" href="login/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <hr>
        <div class="jumbotron">
            <h1 class="display-4">Bem Vindo <?php echo $_SESSION['usuarioNome'] ?> !</h1>
            <p class="lead">Projeto desenvolvido para o Laboratório 03</p>
            <hr class="my-4">
            <p>Desenvolvido com PHP e bootstrap</p>
        </div>
    </div>
    <div class="rodape" style="position: absolute;
    bottom: 0;
    background-color: #007bff;
    color: #FFF;
    width: 100%;
    height: 70px;    
    text-align: center;
    line-height: 100px;">
    </div>
</body>

</html>
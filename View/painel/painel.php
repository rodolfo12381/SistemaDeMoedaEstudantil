<?php
require_once('../../config/config.php');
if (!isset($_SESSION['usuario']) && empty($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
}
if ($_SESSION['usuarioTipo'] == 'Aluno') {
    header('Location: ../login/login.php');
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../home.php">Home</a>
                </li>
                <li class="nav-item-active">
                    <a class="nav-link  tex-dark" href="#">Painel Administrativo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  tex-dark" href="../controleMoedas/controleMoedas.php">Controle de Moedas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  tex-dark" href="../login/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="d-flex justify-content-center pt-3">Painel Administrativo</h1>
    <select class="btn btn-success ml-3" name="crud" id="gerencia">
        <option value="">--Selecione--</option>
        <?php if ($_SESSION['usuarioTipo'] == 'Admin' || $_SESSION['usuarioTipo'] == 'Professor') { ?>
            <option value="usuario">Gerenciar Alunos</option>
        <?php } ?>
        <?php if ($_SESSION['usuarioTipo'] == 'Admin') { ?>
            <option value="empresa">Gerenciar Empresas</option>
            <option value="professor">Gerenciar Professores</option>
        <?php } ?>
        <?php if ($_SESSION['usuarioTipo'] == 'Empresa') {?>
            <option value="vantagem">Gerenciar Vantagens</option>
            <?php }?>
        <input type="hidden" value="<?php echo $_SESSION['usuarioID'] ?>">
    </select>
    <hr>
    <div id="tabela">

    </div>
    <div style="height: 100px;"></div>
</body>
<div id="rodape" class="bg-primary" style="height: 50px; bottom: 0; width: 100%;position: fixed"></div>

</html>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="painel.js"></script>
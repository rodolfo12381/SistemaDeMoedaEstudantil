<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/EmpresaController.php';
require_once('../../Controller/VantagensController.php');
$arrayEmpresas = EmpresaController::listarEmpresas($con);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vantagens</title>
</head>

<body>
    <?php
    require_once('../../config/config.php');
    require_once('../../Controller/ContaController.php');
    require_once('../../Controller/AlunoController.php');
    require_once('../../Controller/TransacaoController.php');

    if (!isset($_SESSION['usuario']) && empty($_SESSION['usuario'])) {
        header('Location: ../login/login.php');
    }
    $conta = ContaController::buscaSaldo($con, $_SESSION['usuarioID']);
    $arrayAlunos = AlunoController::listarAlunos($con);
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
        <script src="https://kit.fontawesome.com/a495e3013d.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../home.php">Home</a>
                    </li>
                    <?php if ($_SESSION['usuarioTipo'] != 'Aluno') { ?>
                        <li class="nav-item">
                            <a class="nav-link  tex-dark" href="../painel/painel.php">Painel Administrativo</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item-active">
                        <a class="nav-link  tex-dark" href="../controleMoedas/controleMoedas.php">Controle de Moedas</a>
                    </li>
                    <li class="nav-item-active">
                        <a class="nav-link  tex-dark" href="../vantagens/vantagens.php">Vantagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  tex-dark" href="../login/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <hr>
        <div class="row">
        <?php foreach ($arrayEmpresas as $empresa) { ?>
            <div class="card col-lg-2"  style="margin: 20px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $empresa['nome']?></h5>
                    <a href="listaVantagens.php?id=<?php echo $empresa['id']?>" class="btn btn-success">Visualizar Produtos</a>
                </div>
            </div>
        <?php } ?>
        </div>

    </body>

    </html>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
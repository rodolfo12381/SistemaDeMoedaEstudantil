<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/EmpresaController.php';
require_once('../../Controller/VantagensController.php');
$arrayVantagens = VantagensController::listarVantagemPorId($con, $_GET['id']);
$i = 0;
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
        <a href="vantagens.php" class="btn btn-primary" style="margin-left: 30px;">Voltar</a>
        <div class="row">
            <?php foreach ($arrayVantagens as $vantagem) { 
                    $i++;
            ?>
                <div class="card col-lg-3" style="margin:20px; width: 18rem;">
                    <div class="card-body">
                        <img src="../../config/cms/uploads/<?php echo $vantagem['foto'] ?>" class="card-img-top" style="height: 200px ">
                        <h3 class="card-title"><?php echo $vantagem['nome'] ?></h3>
                        <p><?php echo $vantagem['descricao'] ?></p>
                        <span> <strong>
                                <p><?php echo $vantagem['custo'] ?></p>
                            </strong> </span>
                            <form class="frmEscolha<?php echo $i?>" method="POST" action="action.php">
                                <input type="hidden" name="empresaID" value="<?php echo $vantagem['fk_empresa']?>">
                                <input type="hidden" name="alunoID" value="<?php echo $_SESSION['usuarioID']?>">
                                <input type="hidden" name="custo" value="<?php echo $vantagem['custo']?>">
                                <input type="hidden" name="saldo" value="<?php echo '1000'?>">
                                <button  class="btn btn-success">Escolher Vantagem</button>
                            </form>
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
<script src="vantagem.js"></script>
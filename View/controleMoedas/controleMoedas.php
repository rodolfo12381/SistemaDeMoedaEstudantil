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
                    <a class="nav-link  tex-dark" href="#">Controle de Moedas</a>
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
    <div class="row">
        <div class="col-lg-10">
            <i class="fa-solid fa-user fa-4x mr-3 mt-3 ml-4"></i>
            <h1 class="display-4" style="display: inline;"><?php echo $_SESSION['usuarioNome'] ?></h1>
        </div>
        <div class="col-lg-2 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-coin " viewBox="0 0 16 16">
                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
            </svg>
            <h1 class="display-4 ml-3" style="display: inline;"><?php echo $conta ?></h1>
        </div>
    </div>
    <hr>
    <?php if($_SESSION['usuarioTipo'] == 'Admin' || $_SESSION['usuarioTipo'] == 'Professor'){?>
    <button type="button" class="btn btn-success ml-5" data-toggle="modal" data-target="#modalCadastro">
        Enviar Moedas
    </button>
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark" id="modalCadastroLabel">Enviar Moedas</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="action.php" method="POST">
                        <div class="form-row pt-4">
                            <label for="aluno">Aluno:</label>
                            <select name="data[aluno]" id="aluno" class="form-control">
                                <option value="">--SELECIONE--</option>
                                <?php
                                foreach ($arrayAlunos as $aluno) {
                                ?>
                                    <option value="<?php echo $aluno['id'] ?>"> <?php echo $aluno['nome'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="form-row pt-4">
                                <label for="nome">Valor:</label>
                                <input class="form-control" type="text" name="data[valor]" id="valor">
                            </div>
                        </div>
                        <input type="hidden" value="envio" name="data[acao]">
                        <input type="hidden" value="envio" name="data[tipo]">
                        <div class="form-row d-flex justify-content-center pt-3">
                            <button class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <h3 class="mt-3 ml-5">Transações:</h3>
    <table class="table table-dark mx-auto mt-3" style="width: 400px">
        <thead>
            <tr>
                <th>#id</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th>Usuario Alvo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $data = array();
                $data['id'] = $_SESSION['usuarioID'];
                $data['usuarioTipo'] = $_SESSION['usuarioTipo'];
                $arrayExtratoEnvio = TransacaoController::listarExtratoEnvio($con,$data);
                $arrayExtratoRecebimento = TransacaoController::listarExtratoRecebimento($con,$data);
                $arrayExtrato = array_merge($arrayExtratoEnvio,$arrayExtratoRecebimento);

                foreach($arrayExtrato as $extrato) {
                    $aluno = AlunoController::buscaAluno($con,$extrato['fk_usuario_recebimento']);
            ?>
            <tr>
                <td><?php echo $extrato['id'];?></td>
                <td><?php echo $extrato['valor'];?></td>
                <td><?php echo $extrato['tipo'];?></td>
                <td><?php echo $aluno[2]?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
<?php if($_SESSION['usuarioTipo'] == 'Aluno') {?>
    <h3 class=" ml-5">Vantagens Escolhidas:</h3>
<?php }?>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
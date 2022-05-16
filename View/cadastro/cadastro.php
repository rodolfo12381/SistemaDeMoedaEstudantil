<?php 
require_once '../../config/config.php';
require_once '../../Controller/InstituicaoController.php';
require_once '../../Controller/CursoController.php';

$arrayInstituicoes = InstituicaoController::listarInstituicoes($con);
$arrayCursos = CursoController::listarCursos($con);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laboratório 03</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link tex-dark" href="../home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  tex-dark" href="../login/login.php">Login</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container d-flex justify-content-center">
      <div class="card col-6 d-flex justify-content-center mt-5">
        <div class="card-header  d-flex justify-content-center">
        <h1>Cadastro do Aluno</h1>
        </div>
        <div class="card-body">
          <form action="action.php" method="POST">
            <div class="form-row pt-4">
                <label for="nome" class="col-4">Nome:</label>
                <input class="form-control col-8" type="text" name="data[nome]" id="nome">
            </div>
            <div class="form-row pt-4">
                <label for="email" class="col-4">Email:</label>
                <input class="form-control col-8" type="email" name="data[email]" id="email">
            </div>
            <div class="form-row pt-4">
                <label for="cpf" class="col-4">CPF:</label>
                <input class="form-control col-8" type="text" name="data[cpf]" id="cpf">
            </div>
            <div class="form-row pt-4">
                <label for="rg" class="col-4">RG:</label>
                <input class="form-control col-8" type="text" name="data[rg]" id="rg">
            </div>
            <div  class="form-row pt-4">
                <label for="endereco" class="col-4">Endereço:</label>
                <input class="form-control col-8" type="text" name="data[endereco]" id="endereco">
            </div>
            <div  class="form-row pt-4">
                <label for="instituicao" class="col-4">Instituição de Ensino:</label>
                <select name="data[instituicao]" id="instituicao" class="form-control col-8">
                    <option value="">--SELECIONE--</option>
                    <?php
                        foreach($arrayInstituicoes as $instituicao) {
                    ?>
                        <option value="<?php echo $instituicao['id'] ?>"> <?php echo $instituicao['nome']."-".$instituicao['sigla'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div  class="form-row pt-4">
                <label for="curso" class="col-4">Curso:</label>
                <select name="data[curso]" id="curso" class="form-control col-8">
                    <option value="">--SELECIONE--</option>
                    <?php 
                        foreach($arrayCursos as $curso) {
                    ?>
                        <option value="<?php echo $curso['id'] ?>"> <?php echo $curso['nome'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-row pt-4">
                <label for="senha" class="col-4">Senha:</label>
                <input class="form-control col-8" type="password" name="data[senha]" id="senha">
            </div>
            <div class="form-row d-flex justify-content-center pt-3">
                <button class="btn btn-primary" id="btn-cadastro-Aluno">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
    <div class="bg-primary" style="height: 100px;">
            
    </div>
  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="cadastro.js"></script>

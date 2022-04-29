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
                <li class="nav-item-active">
                    <a class="nav-link text-dark" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tex-dark" href="login/login.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  tex-dark" href="cadastro/cadastro.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="d-flex justify-content-center pt-3">Painel Administrativo</h1>
    <select class="btn btn-success ml-3" name="crud" id="gerencia">
        <option value="">--Selecione--</option>
        <option value="usuario">Gerenciar Alunos</option>
        <option value="empresa">Gerenciar Empresas</option>
        <option value="professor">Gerenciar Professores</option>
    </select>
    <hr>
    <div id="tabela">
        
    </div>
</body>

</html>
<script src="painel.js"></script>
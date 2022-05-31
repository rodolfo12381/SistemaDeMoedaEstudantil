<?php
require_once('../../config/config.php');
require_once('../../Controller/AlunoController.php');
require_once('../../Controller/ProfessorController.php');
require_once('../../Controller/AdminController.php');
require_once('../../Controller/EmpresaController.php');

if (!empty($_POST['email'] && $_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
} else {
    header('Location: login.php');
}
$arrayUsuario = null;

switch ($_POST['usuarioTipo']) {

    case 'Admin':
        $arrayUsuario = AdminController::listarAdmin($con);
        break;
    case 'Aluno':
        $arrayUsuario = AlunoController::listarAlunos($con);
        break;
    case 'Empresa':
        $arrayUsuario = EmpresaController::listarEmpresas($con);
        break;
    case 'Professor':
        $arrayUsuario = ProfessorController::listarProfessores($con);
        break;
}

foreach ($arrayUsuario as $usuario) {
    if ($email == $usuario['email'] && $senha == $usuario['senha']) {
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['usuarioTipo'] = $_POST['usuarioTipo'];
        $_SESSION['usuarioNome'] = $usuario['nome'];
        $_SESSION['usuarioID'] = $usuario['id'];
    }
}

if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
    header('Location: ../home.php');
} else {
    header('Location: ../index.php');
}

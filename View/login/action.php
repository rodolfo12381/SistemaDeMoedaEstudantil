<?php
require_once('../../config/config.php');
require_once('../../Controller/AlunoController.php');
require_once('../../Controller/ProfessorController.php');

$arrayAlunos = AlunoController::listarAlunos($con);
$arrayProfessores = ProfessorController::listarProfessores($con);

if (!empty($_POST['email'] && $_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
} else {
    header('Location: login.php');
}

foreach ($arrayAlunos as $aluno) {
    if ($email == $aluno['email'] && $senha == $aluno['senha']) {
        $_SESSION['usuario'] = $aluno['email'];
    }
}

foreach ($arrayProfessores as $professor) {
    if ($email == $professor['email'] && $senha == $professor['senha']) {
        $_SESSION['usuario'] = $professor['email'];
    }
}

if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
    header('Location: ../home.php');
} else {
    header('Location: login.php');
}

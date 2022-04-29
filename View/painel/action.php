<?php require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/AlunoController.php';
      require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/EmpresaController.php';
      require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/ProfessorController.php';

switch ($_POST['acao']) {

    case 'usuario':
        echo require_once 'gerenciarAluno.php';
    break;
    case 'empresa':
        echo require_once 'gerenciarEmpresa.php';
    break;
    case 'professor':
        echo require_once 'gerenciarProfessor.php';
    break;
    case 'tbusuario':
        AlunoController::excluirAluno($con,$_POST['id']);
    break;
    case 'tbempresa':
        EmpresaController::excluirEmpresa($con,$_POST['id']);
    break;
    case 'tbprofessor':
        ProfessorController::excluirProfessor($con,$_POST['id']);
    break;

}

?>
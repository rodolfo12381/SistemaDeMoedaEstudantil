<?php require_once '../../Controller/AlunoController.php';
require_once '../../Controller/EmpresaController.php';
require_once '../../Controller/ProfessorController.php';
require_once '../../Controller/VantagensController.php';


if (isset($_POST['data']) && !empty($_POST['data'])) {

    try {
        AlunoController::alterarAluno($con, $_POST['data']);
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    } finally {
        header('Location: painel.php');
    }
}
switch ($_POST['acao']) {

    case 'usuario':
        echo require_once 'gerenciarAluno.php';
        break;
    case 'empresa':
        echo require_once 'gerenciarEmpresa.php';
        break;
    case 'vantagem':
        echo require_once 'gerenciarVantagem.php';
        break;
    case 'professor':
        echo require_once 'gerenciarProfessor.php';
        break;
    case 'tbusuario':
        AlunoController::excluirAluno($con, $_POST['id']);
        break;
    case 'tbempresa':
        EmpresaController::excluirEmpresa($con, $_POST['id']);
        break;
    case 'tbprofessor':
        ProfessorController::excluirProfessor($con, $_POST['id']);
        break;
    case 'tbvantagem':
        VantagensController::excluirProduto($con, $_POST['id']);
        break;
    case 'atualizar':
        print_r($_POST);
        break;
}

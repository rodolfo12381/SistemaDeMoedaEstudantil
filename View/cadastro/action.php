<?php
require_once '../../config/config.php';
require_once '../../Controller/AlunoController.php';


if(isset($_POST['data']) && !empty($_POST['data'])){
    
    try{
        AlunoController::criarAluno($con,$_POST['data']);
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }finally{
        $_SESSION['usuario'] = $_POST['data']['email'];
        $_SESSION['usuarioNome'] = $_POST['data']['nome'];
        $_SESSION['usuarioTipo'] = 'Aluno';
        header('Location: ../home.php');
    }
}


?>
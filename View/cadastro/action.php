<?php
require_once '../../config/config.php';
require_once '../../Controller/AlunoController.php';


if(isset($_POST['data']) && !empty($_POST['data'])){
    
    try{
        AlunoController::criarAluno($con,$_POST['data']);
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }finally{
        header('Location: ../home.php');
    }
}


?>
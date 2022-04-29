<?php
require_once '../../config/config.php';
require_once '../../Controller/AlunoController.php';



if(isset($_POST['data']) && !empty($_POST['data'])){
    
    AlunoController::criarAluno($con,$_POST['data']);

}


?>
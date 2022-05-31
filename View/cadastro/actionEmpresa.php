<?php
require_once ('../../config/config.php');
require_once ('../../Controller/EmpresaController.php');
require_once ('../../Controller/VantagensController.php');

if(isset($_POST['data']) && !empty($_POST['data'])){
    
    try{
        EmpresaController::criarEmpresa($con,$_POST['data']);
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }finally{
        header('Location: ../painel/painel.php');
    }
}
if(isset($_POST['atualiza']) && !empty($_POST['atualiza'])){
    
    try{
        EmpresaController::alterarEmpresa($con,$_POST['atualiza']);
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }finally{
        header('Location: ../painel/painel.php');
    }
}
if(isset($_POST['produto']) && !empty($_POST['produto'])){

    try{
        $img = VantagensController::validaImagem($_FILES['imagem']);
        if (!($img == false)) {
            $img = VantagensController::uploadImagem($_FILES['imagem']);
            $_POST['produto']['foto'] = $img;
        }
        VantagensController::adicionarVantagem($con,$_POST['produto']);
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }finally{
        header('Location: ../painel/painel.php');
    }
}
if(isset($_POST['produtoEditar']['atualiza']) && !empty($_POST['produtoEditar']['atualiza'])){

    try{
        $img = VantagensController::validaImagem($_FILES['imagemAtualiza']);
        if (!($img == false)) {
            $img = VantagensController::uploadImagem($_FILES['imagemAtualiza']);
            $_POST['produtoEditar']['atualiza']['foto'] = $img;
        }
        VantagensController::editarVantagem($con,$_POST['produtoEditar']['atualiza']);
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }finally{
        header('Location: ../painel/painel.php');
    }
}
?>
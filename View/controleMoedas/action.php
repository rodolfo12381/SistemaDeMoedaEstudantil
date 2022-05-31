<?php
require_once '../../config/config.php';
require_once '../../Controller/ContaController.php';
require_once '../../Controller/TransacaoController.php';



$acao = $_POST['data']['acao'];

switch($acao)
{
    case 'envio':
        $data = array();
        $data['tipo'] = $_POST['data']['tipo'];
        $data['valor'] = $_POST['data']['valor'];
        $data['fk_destinatario'] = $_POST['data']['aluno'];
        $data['fk_remetente'] = $_SESSION['usuarioID'];
        $data['usuarioTipo'] = $_SESSION['usuarioTipo'];
        ContaController::enviarMoeda($con,$data);
        TransacaoController::registrarTransacao($con,$data);
        $data['tipo'] = 'recebimento';
        $data['usuarioTipo'] = 'Aluno';
        TransacaoController::registrarTransacao($con,$data);        
        header('Location: controleMoedas.php');
    break;
}



?>
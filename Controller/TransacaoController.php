<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/TransacaoModel.php';

class TransacaoController extends TransacaoModel
{
    public static function registrarTransacao($con,$data)
    {
        return parent::insert($con,$data);
    }
    public static function listarExtratoEnvio($con,$data)
    {
        return parent::selectByIdEnvio($con,$data);
    }
    public static function listarExtratoRecebimento($con,$data)
    {
        
        return parent::selectByIdRecebimento($con,$data);
    }
}


?>
<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/EmpresaModel.php';

class EmpresaController extends EmpresaModel {


    public static function criarEmpresa ($con,$data)
    {
       return parent::insert($con,$data);   
    }
    public static function listarEmpresas ($con)
    {
        return parent::selectAll($con);
    }
    public static function excluirEmpresa($con,$data)
    {
        return parent::delete($con,$data);
    }
    public static function alterarEmpresa($con,$data)
    {
        return parent::update($con,$data);
    }
}

?>
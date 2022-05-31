<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/AlunoModel.php';

class AlunoController extends AlunoModel {


    public static function criarAluno ($con,$data)
    {
       return parent::insert($con,$data);   
    }
    public static function listarAlunos ($con)
    {
        return parent::selectAll($con);
    }
    public static function excluirAluno($con,$data)
    {
        return parent::delete($con,$data);
    }
    public static function alterarAluno($con,$data)
    {
        return parent::update($con,$data);
    }
    public static function buscaAluno($con,$data)
    {
        return parent::selectById($con,$data);
    }
}

?>
<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/ProfessorModel.php';

class ProfessorController extends ProfessorModel {


    public static function criarProfessor ($con,$data)
    {
       return parent::insert($con,$data);   
    }
    public static function listarProfessores ($con)
    {
        return parent::selectAll($con);
    }
    public static function excluirProfessor($con,$data)
    {
        return parent::delete($con,$data);
    }
}

?>
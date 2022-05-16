<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/InstituicaoModel.php';

class InstituicaoController extends InstituicaoModel {


    public static function listarInstituicoes ($con)
    {
        return parent::selectAll($con);
    }
    public static function buscarPorId($data,$con)
    {
        return parent::selectById($data,$con);
    }
}


?>
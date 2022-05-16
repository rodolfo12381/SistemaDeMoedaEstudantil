<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/CursoModel.php';

class CursoController extends CursoModel {


    public static function listarCursos ($con)
    {
        return parent::selectAll($con);
    }
    public static function buscarPorId ($data,$con)
    {
        return parent::selectById($data,$con);
    }

}


?>
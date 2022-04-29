<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/VantagensModel.php';

class VantagensController extends VantagensModel {


    public static function criarVantagen ($con,$data)
    {
       return parent::insert($con,$data);   
    }
}

?>
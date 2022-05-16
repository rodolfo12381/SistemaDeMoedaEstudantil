<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/VantagensModel.php';

class VantagensController extends VantagensModel {


    public static function criarVantagen ($con,$data)
    {
       return parent::insert($con,$data);   
    }
    public static function adicionarVantagem($con,$data)
    {
       return parent::insert($con,$data);   
    }
    public static function listarVantagemPorId($con,$data)
    {
       return parent::selectById($con,$data);
    }
    public static function excluirProduto($con,$data) 
    {
       return parent::delete($con,$data);
    }
    public static function editarVantagem($con,$data)
    {
       return parent::update($con,$data);
    }
}

?>
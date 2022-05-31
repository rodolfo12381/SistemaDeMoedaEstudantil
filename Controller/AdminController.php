<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/AdminModel.php';

class AdminController extends AdminModel {

    public static function listarAdmin($con){
        return parent::selectAll($con);
    }

}
?>
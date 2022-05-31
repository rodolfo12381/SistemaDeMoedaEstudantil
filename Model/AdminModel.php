<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';

class AdminModel {

    public static function selectAll ($con)
    {
        $sql = "SELECT * FROM tbadmin";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao buscar Admin';
            die();
        }
        $arrayAdmin= array();
        while ($row = $result->fetch_assoc()){
            $arrayAdmin [] = $row;
        }
        return $arrayAdmin;
    }
}
?>
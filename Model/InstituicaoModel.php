<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';


class InstituicaoModel {

    public static function selectAll ($con)
    {
        
        $sql = "SELECT * FROM tbinstituicao";
        $result = mysqli_query($con,$sql);
        $arrayInstituicoes = array();
        while ($row = $result->fetch_assoc()){
            $arrayInstituicoes [] = $row;
        }
        return $arrayInstituicoes;
    }
    public static function selectById ($data,$con)
    {
        
        $sql = "SELECT * FROM tbinstituicao WHERE id = $data";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($result);
        $instituicao = $row;
        return $instituicao;
    }
}


?>
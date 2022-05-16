<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';


class CursoModel {

    public static function selectAll ($con)
    {
        
        $sql = "SELECT * FROM tbcurso";
        $result = mysqli_query($con,$sql);
        $arrayCursos = array();
        while ($row = $result->fetch_assoc()){
            $arrayCursos[] = $row;
        }
        return $arrayCursos;
    }

    public static function selectById ($data,$con)
    {
        $sql = "SELECT * FROM tbcurso WHERE id = {$data}";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($result);
        $curso = $row;
        return $curso;
    }
}


?>
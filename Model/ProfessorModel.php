<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';

    class ProfessorModel {


        public static function update($con,$data)
        {
            $sql = "UPDATE tbprofessor SET ($data= $data) WHERE  condition = $data";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao atualizar Professor';
                die();
            }
        }

        public static function insert ($con,$data) 
        {
            
            $sql = "INSERT INTO tbprofessor (nome,email,senha,instituicao,curso,cpf)
                    VALUES ('{$data['nome']}','{$data['email']}','{$data['senha']}','{$data['instituicao']}',
                    '{$data['curso']}','{$data['cpf']}');";
            $result = mysqli_query($con,$sql);
            if(!$result) {
                echo 'Erro ao cadastrar Professor';
                die();
            }
        }

        public static function delete ($con,$data)
        {
            $sql = "DELETE FROM tbprofessor WHERE id = $data";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao deletar Professor';
                die();
            }
        }

        public static function selectAll ($con) 
        {
            $sql = "SELECT * FROM tbprofessor";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao buscar Professor';
                die();
            }
            $arrayProfessores = array();
            while ($row = $result->fetch_assoc()){
                $arrayProfessores [] = $row;
            }
            return $arrayProfessores;
        }

    }

?>
<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';

    class AlunoModel {


        public static function update($con,$data)
        {
            $sql = "UPDATE tbusuario SET ($data= $data) WHERE  condition = $data";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao atualizar Aluno';
                die();
            }
        }

        public static function insert ($con,$data) 
        {
            
            $sql = "INSERT INTO tbusuario (email,nome,senha,rg,endereco,instituicao,curso,cpf)
                    VALUES ('{$data['email']}','{$data['nome']}','{$data['senha']}','{$data['rg']}','{$data['endereco']}',
                    '{$data['instituicao']}','{$data['curso']}','{$data['cpf']}');";
            $result = mysqli_query($con,$sql);
            if(!$result) {
                echo 'Erro ao cadastrar Aluno';
                die();
            }
        }

        public static function delete ($con,$data)
        {
            $sql = "DELETE FROM tbusuario WHERE id = $data";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao deletar Aluno';
                die();
            }
        }

        public static function selectAll ($con) 
        {
            $sql = "SELECT * FROM tbusuario";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao buscar Aluno';
                die();
            }
            $arrayAlunos = array();
            while ($row = $result->fetch_assoc()){
                $arrayAlunos [] = $row;
            }
            return $arrayAlunos;
        }

    }

?>
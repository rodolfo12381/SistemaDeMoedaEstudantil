<?php require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';

class VantagensModel {

    public static function update ($con,$data)
    {
        $sql = "UPDATE tbvantagem SET ($data= $data) WHERE  condition = $data";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao atualizar Vantagem';
            die();
        }
    }

    public static function insert ($con,$data)
    {
        $sql = "INSERT INTO tbvantagem (nome,descricao,custo,foto)
        VALUES ('{$data['nome']}','{$data['descricao']}','{$data['custo']}','{$data['foto']}');";
        $result = mysqli_query($con,$sql);
        if(!$result) {
            echo 'Erro ao cadastrar Vantagem';
            die();
        }
    }

    public static function delete ($con,$data)
    {
        $sql = "DELETE FROM tbvantagem WHERE condition = $data";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao deletar Vantagem';
                die();
            }
    }

    public static function select ($con,$data)
    {
        $sql = "SELECT * FROM tbvantagem WHERE condition = $data";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao buscar Vantagem';
            die();
        }
    }
}

?>
<?php require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';

class VantagensModel {

    public static function update ($con,$data)
    {
    
        $sql = "UPDATE tbvantagem SET nome = '{$data['nome']}', descricao = '{$data['descricao']}', custo = '{$data['custo']}',
        foto = '{$data['foto']}', fk_empresa = '{$data['id']}' WHERE  id = {$data['id_vantagem']}";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao atualizar Vantagem';
            die();
        }
    }

    public static function insert ($con,$data)
    {
        $sql = "INSERT INTO tbvantagem (nome,descricao,custo,foto,fk_empresa)
        VALUES ('{$data['nome']}','{$data['descricao']}','{$data['custo']}','{$data['foto']}',{$data['id']});";
        $result = mysqli_query($con,$sql);
        if(!$result) {
            echo 'Erro ao cadastrar Vantagem';
            die();
        }
    }

    public static function delete ($con,$data)
    {
        $sql = "DELETE FROM tbvantagem WHERE id = $data";
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
    public static function selectById ($con,$data)
    {
        $sql = "SELECT * FROM tbvantagem WHERE fk_empresa = $data";
        $result = mysqli_query($con,$sql);
        $arrayVantagens= array();
        while ($row = $result->fetch_assoc()){
            $arrayVantagens [] = $row;
        }
        return $arrayVantagens;
    }
}

?>
<?php require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';

class EmpresaModel {

    public static function update ($con,$data)
    {
        $sql = "UPDATE tbempresa SET nome = '{$data['nome']}', email = '{$data['email']}', senha = '{$data['senha']}', 
        cnpj = '{$data['cnpj']}' WHERE id = {$data['id']}";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao atualizar Empresa';
            die();
        }
    }

    public static function insert ($con,$data)
    {
        $sql = "INSERT INTO tbempresa (nome,email,senha,cnpj)
        VALUES ('{$data['nome']}','{$data['email']}','{$data['senha']}','{$data['cnpj']}');";
        $result = mysqli_query($con,$sql);
        if(!$result) {
        echo 'Erro ao cadastrar Empresa';
        die();
}
    }

    public static function delete ($con,$data)
    {
        $sql = "DELETE FROM tbempresa WHERE id = $data";
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo 'Erro ao deletar Empresa';
                die();
            }
    }

    public static function selectAll ($con)
    {
        $sql = "SELECT * FROM tbempresa";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao buscar Empresa';
            die();
        }
        $arrayEmpresas = array();
        while ($row = $result->fetch_assoc()){
            $arrayEmpresas [] = $row;
        }
        return $arrayEmpresas;
    }
    
}

?>
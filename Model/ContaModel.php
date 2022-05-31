<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
class ContaModel {

    public static function select($con,$data)
    {
        $sql = "SELECT * FROM tbconta WHERE id = '{$data}'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($result);
        $conta = $row;
        return $conta;
    }
    public static function insert ($con,$data)
    {
        $sql = "INSERT INTO tbconta (saldoMoeda,fk_usuario)
        VALUES ('{$data['valor']}','{$data['fk_destinatario']}');";
        $result = mysqli_query($con,$sql);
        if(!$result) {
        echo 'Erro ao cadastrar Empresa';
        die();
        }
    }
    public static function update ($con,$data)
    {
        $sql = "UPDATE tbconta SET saldoMoeda = '{$data['valor']}'
         WHERE id = '{$data['fk_destinatario']}'";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo 'Erro ao atualizar Empresa';
            die();
        }
    }
}

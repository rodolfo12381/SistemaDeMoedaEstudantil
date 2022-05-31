<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/ContaModel.php';

class ContaController extends ContaModel
{
    public static function buscaSaldo($con, $data)
    {
        return parent::select($con, $data);
    }
    public static function enviarMoeda($con, $data)
    {
        $saldoAtual = parent::select($con, $data['fk_destinatario']);
        $saldoAtual = doubleval($saldoAtual[1]);
        $data['valor'] = doubleval($data['valor']);
        $data['valor'] += $saldoAtual;
        return parent::update($con, $data);
    }
    public static function retiraMoeda($con, $data)
    {
        $saldoAtual = parent::select($con, $data['fk_destinatario']);
        $saldoAtual = doubleval($saldoAtual[1]);
        $data['valor'] = doubleval($data['valor']);
        $data['valor'] -= $saldoAtual;
        return parent::update($con, $data);
    }
}

<?php
require_once '../../config/config.php';

function imagemValida($img){
    if($img['type'] == 'image/jpeg' || $img['type'] == 'image/png' || $img['type'] == 'image/jpg'){
        $tamanho = intval($img['size']/1024);

        if($tamanho < 300){
            return true;
        }else{
            // echo 'Tamanho excedido. <br> *Tamanho máximo: 300KB.';
        }
    }
}

function uploadFile($file){
    $formatoArquivo = explode('.',$file['name']);
    $nomeImagem = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1]; 
    if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$nomeImagem)){
        return $nomeImagem;
    }else{
        return false;
    }
}

?>
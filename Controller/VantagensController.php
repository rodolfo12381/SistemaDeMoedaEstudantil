<?php
require_once 'C:/programas_php/htdocs/workspace/lab03/config/config.php';
require_once 'C:/programas_php/htdocs/workspace/lab03/Model/VantagensModel.php';

class VantagensController extends VantagensModel
{


   public static function criarVantagen($con, $data)
   {
      return parent::insert($con, $data);
   }
   public static function adicionarVantagem($con, $data)
   {
      return parent::insert($con, $data);
   }
   public static function listarVantagemPorId($con, $data)
   {
      return parent::selectById($con, $data);
   }
   public static function excluirProduto($con, $data)
   {
      return parent::delete($con, $data);
   }
   public static function editarVantagem($con, $data)
   {
      return parent::update($con, $data);
   }
   public static function validaImagem($data)
   {
      if ($data['type'] == 'image/jpeg' || $data['type'] == 'image/png' || $data['type'] == 'image/jpg') {
         $tamanho = intval($data['size'] / 1024);

         if ($tamanho < 1000) {
            return true;
         }
      }
   }
   public static function uploadImagem($data)
   {
      $formatoArquivo = explode('.', $data['name']);
      $nomeImagem = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
      if (move_uploaded_file($data['tmp_name'], BASE_DIR_PAINEL . '/uploads/' . $nomeImagem)) {
         return $nomeImagem;
      } else {
         return false;
      }
   }
}

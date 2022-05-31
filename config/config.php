<?php
session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'db_laboratorio03');


if ($con->connect_errno) {
  echo("Falha ao conectar com o banco de dados: " . $con->connect_error);
  exit();
}

define('BASE_DIR_PAINEL', __DIR__.'/cms');

?>
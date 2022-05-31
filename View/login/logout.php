<?php
require_once ('../../config/config.php');
unset($_SESSION['usuario']);
session_destroy();

header('Location: ../index.php');
?>
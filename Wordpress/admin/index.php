<?php 
include_once('topo-config.php');
Usuario::verificaLogin();
header("Location: ".URLADMIN."home");
?>
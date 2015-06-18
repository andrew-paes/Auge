<?php
session_start();
ob_start();
include_once("topo-config.php");
unset($_SESSION['s3'][NOMESITE]['admin']);
header('Location: '.URLADMIN.'login.php');
?>
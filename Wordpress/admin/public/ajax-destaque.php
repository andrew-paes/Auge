<?php
require_once 'topo-ajax.php';

##########################
# alterar
##########################
$idAlterar = $_POST['id'];
$nomeClasse = $_POST['tabela'];

if(isPost($idAlterar)){
    $obj = new $nomeClasse();
    $obj->id = $idAlterar;
    $obj->carregar();
}

if($obj->destaque == 's'){
    $_POST[$nomeClasse]['destaque'] = 'n';
}else{
    $_POST[$nomeClasse]['destaque'] = 's';  
}

$obj->carga($_POST[$nomeClasse]);
if(!$obj->alterar()){}

?>
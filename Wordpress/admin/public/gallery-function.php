<?php
include_once('topo-ajax.php');

if($_POST['funcao'] == 'refresh'){
    $obj = new $_POST['nomeClasse']();
    $obj->id = $_POST['id'];
    $obj->carregar();

    $_POST['galeria']['data'] = DATAHORAMYSQL;
    $_POST['galeria']['legenda'] = $_POST['legenda'];

    $obj->carga($_POST['galeria']);
    if($obj->alterar()){
        $msg = 'Legenda Alterada com sucesso!';
    }
}

?>
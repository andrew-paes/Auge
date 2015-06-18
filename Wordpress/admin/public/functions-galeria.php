<?php
include_once('topo-ajax.php');

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $action();
}

function updateCapa(){
    $nomeClasse = $_POST['nomeClasse'];
    global ${'arrinfos3'.strtolower($nomeClasse)};
    $arrInfo = ${'arrinfos3'.strtolower($nomeClasse)};
    
    global $db;
    $up1 = "UPDATE ".$arrInfo[INFOTABELA]['tabelanome']."
                    SET    principal = 'n'
                    WHERE ".$_POST['indice']." = ".$_POST['foto_album'];
    $db->query($up1);
    
    // seta apenas o principal
    $up1 = "UPDATE ".$arrInfo[INFOTABELA]['tabelanome']."
                    SET    principal = 's'
                    WHERE  id = ".$_POST['foto_id'];
    $db->query($up1);	
}

function updateLegenda(){
    $obj = new $_POST['nomeClasse']();
    $obj->id = $_POST['id'];
    $obj->carregar();

    $_POST['galeria']['legenda'] = $_POST['legenda'];

    $obj->carga($_POST['galeria']);
    if($obj->alterar()){
        $msg = $msg_ok;
        $msgClass = "msgSucesso";
    }
}

function updatePosicao(){
    extract($_POST);
    parse_str($item,$arr);	
	
    foreach($arr['item'] as $pos => $foto_id){
        $obj = new $_POST['nomeClasse']();
        $obj->id = $foto_id;
        $obj->carregar();

        $_POST['galeria']['ordem'] = $pos;

        $obj->carga($_POST['galeria']);
        if($obj->alterar()){
            $msg = $msg_ok;
            $msgClass = "msgSucesso";
        }
    }
}

?>
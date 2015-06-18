<?php
include_once('topo-ajax.php');

$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

    //UPLOAD DE IMAGEM    
    if($_FILES['Filedata']['name'] != ''){
        $tamanhoMaximo = 1000000;
        $extensoes = array(".jpg", ".jpeg", ".gif", ".png", ".JPG", ".JPEG", ".GIF", ".PNG");
        $destino = $_GET['destino'];
        $nomeFile = "Filedata";
        $idImagem = $idP;
        $classe = $_GET['nomeClasse'];

        $VerificaErro = UtilObjeto::uploadUnico($_FILES[$nomeFile]['name'], $tamanhoMaximo, $extensoes, $destino, $nomeFile, $idImagem, $classe);
        if($VerificaErro[0] != ''){
            $_POST['galeria']['imagem'] = $VerificaErro[0];
        }else{		
            $msg = $VerificaErro[1];
            $erro = true;
        }
    }	
    
    if($erro == true){
        $msg = $msg_erro;
    }else{
        $idSalva = $_GET['idSalva'];
        $_POST['galeria'][$idSalva] = $_GET['id'];
        $_POST['galeria']['data'] = DATAHORAMYSQL;
        $_POST['galeria']['principal'] = 'n';
        $obj = new $_GET['nomeClasse']($_POST['galeria']);

        if($obj->inserir()){
            $msg = $msg_ok;
            $msgClass = "msgSucesso";
        }else{
            $msg = $msg_erro;
        }
    }
}
?>
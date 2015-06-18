<?php
include "../../config/define.php";
include "../../config/conecta.php";
include "../../config/classes.php";
include "../../config/funcoes.php";

header("Pragma: no-cache");
header("Expires: 0");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"Newsletter_".DATAHORABR.".csv\"");

$listar = UtilObjeto:: listar("newsletter");

$campos = "Nome;";
$campos .= "E-mail;";
$campos .= "Data;";
$campos .= "\n";

print utf8_decode($campos);
foreach($listar as $id => $dados){
    
    $nome = 'N/F';
    if(isPost($dados['nome'])){
        $nome = $dados['nome'];
    }
    
    $item = '"';
    $item .= utf8_decode($nome).'";"';
    $item .= utf8_decode($dados['email']).'";"';
    $item .= utf8_decode(mysql_to_data($dados['data'], true, true)).'";';
    $item .= "\r\n";
    
    echo $item;
}
exit;

?>
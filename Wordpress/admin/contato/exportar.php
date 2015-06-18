<?php
include "../../config/define.php";
include "../../config/conecta.php";
include "../../config/classes.php";
include "../../config/funcoes.php";

header("Pragma: no-cache");
header("Expires: 0");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"Contato_".DATAHORABR.".csv\"");

$listar = UtilObjeto:: listar("contato","order by data desc");

$campos = "Nome;";
$campos .= "E-mail;";
$campos .= "Mensagem;";
$campos .= "Data;";
$campos .= "\n";

print utf8_decode($campos);
foreach($listar as $id => $dados){    
    
    $item = '"';
    $item .= utf8_decode($dados['nome']).'";"';
    $item .= utf8_decode($dados['email']).'";"';
    $item .= utf8_decode($dados['mensagem']).'";"';
    $item .= utf8_decode(mysql_to_data($dados['data'], true, false)).'";';
    $item .= "\r\n";
    
    echo $item;
}
exit;

?>
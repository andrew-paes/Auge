<?php
include "../../config/define.php";
include "../../config/conecta.php";
include "../../config/classes.php";
include "../../config/funcoes.php";

header("Pragma: no-cache");
header("Expires: 0");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"Servicos_Contato_".DATAHORABR.".csv\"");

$listar = UtilObjeto:: listar("servicoscontato","order by data desc");

$campos = "Nome;";
$campos .= "Serviços;";
$campos .= "E-mail;";
$campos .= "Mensagem;";
$campos .= "Data;";
$campos .= "\n";

print utf8_decode($campos);
foreach($listar as $id => $dados){    

	$objServico = new Servicos();
	$objServico->id = $dados['id_servico'];
	$objServico->carregar();
    
    $item = '"';
    $item .= utf8_decode($dados['nome']).'";"';
    $item .= utf8_decode($objServico->titulo).'";"';
    $item .= utf8_decode($dados['email']).'";"';
    $item .= utf8_decode($dados['mensagem']).'";"';
    $item .= utf8_decode(mysql_to_data($dados['data'], true, false)).'";';
    $item .= "\r\n";
    
    echo $item;
}
exit;

?>
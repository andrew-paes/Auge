<?php
require_once("topo-ajax.php");
$lista = UtilObjeto::listar("cidade","WHERE id_estado = ".$_POST['estado']." ORDER BY nome");
if(!$lista){
                $html = "<option value=''>Nenhuma Cidade</option>";
}
else{
                $html = "<option value=''></option>";
                foreach($lista as $id => $dados){
                               $html .= "<option value='".$id."'>".$dados['nome']."</option>";
                }
}
echo $html;
?>
<?php
$validacao = true;
$uploadImagem = true;
include_once('../public/inc/cabecalho.php');

$msg = "";
$msgClass = "msgErro";
$titulo = "Banner";
$acao = "Cadastrar";
$pg_voltar = URLADMIN."banner";
$msg_ok = "Dados Cadastrados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasse = "Banner";

##########################
# cadastrar
##########################
if(isPost($_POST['ok'])){
       
    $_POST[$nomeClasse]['texto'] = $_POST['texto'];
    //UPLOAD DE IMAGEM    
    if($_FILES['imagem']['name'] != ''){
        $tamanhoMaximo = 10000000;
        $extensoes = array(".jpg", ".jpeg", ".gif", ".png", ".JPG", ".JPEG", ".GIF", ".PNG");
        $destino = "banner";
        $nomeFile = "imagem";
        $idImagem = $idP;
        $classe = $nomeClasse;

        $VerificaErro = UtilObjeto::uploadUnico($_FILES[$nomeFile]['name'], $tamanhoMaximo, $extensoes, $destino, $nomeFile, $idImagem, $classe);
        if($VerificaErro[0] != ''){
            $_POST[$nomeClasse][$nomeFile] = $VerificaErro[0];
        }else{		
            $msg = $VerificaErro[1];
            $erro = true;
        }
    }
	
    if($erro == true){
        $msg = $msg_erro;
    }else{
        $obj = new $nomeClasse($_POST[$nomeClasse]);
        if($obj->inserir()){
            $msg = $msg_ok;
            $msgClass = "msgSucesso";
            //'header("location: galeria.php?id=".$obj->id);		
        }else{
            $msg = $msg_erro;
        }
    }
}
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2><?php echo $titulo.' > '.$acao; ?></h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URLADMIM; ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span><?php echo $titulo; ?></span></li>
                <li><span><?php echo $acao; ?></span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>    
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?php echo $titulo; ?></h2>
        </header>
        <form name="" id="form" method="post" action="" enctype="multipart/form-data">
            <div class="panel-body">
                <?php include PATHADMIN.'msg.php'; ?>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="<?php echo $pg_voltar; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Título</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[titulo]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Link</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[link]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ativo</label>
                            <select class="form-control" name="<?php echo $nomeClasse; ?>[ativo]" required>
                                <option value="s">Sim</option>
                                <option value="n">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Abrir em nova aba?</label>
                            <select class="form-control" name="<?php echo $nomeClasse; ?>[targetBlank]" required>
                                <option value="s">Sim</option>
                                <option value="n">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ordem</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[ordem]" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Imagem <strong>( 1920px X 600px, conteúdo principal centralizado )</strong></label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Trocar</span>
                                        <span class="fileupload-new">Selecionar Imagem</span>
                                        <input type="file" name="imagem" />
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="panel-footer text-right">
		<button type="reset" class="btn btn-default">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="ok" value="Cadastrar" />
            </footer>
        </form>           
    </section>
</section>
<?php include_once('../public/inc/rodape.php'); ?>
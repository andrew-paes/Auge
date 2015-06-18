<?php
$validacao = true;
$data = true;
$masked = true;
$uploadImagem = true;
include_once('../public/inc/cabecalho.php');

$msg = "";
$msgClass = "msgErro";
$titulo = "Parceiros";
$acao = "Cadastrar";
$pg_voltar = URLADMIN."parceiros";
$msg_ok = "Dados Cadastrados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasse = "Parceiros";

##########################
# cadastrar
##########################
if(isPost($_POST['ok'])){
    $_POST[$nomeClasse]['descricao'] = $_POST['descricao'];
    $novoNome = UtilObjeto::trataNomeUrl($_POST[$nomeClasse]['titulo']);
    $_POST[$nomeClasse]['seoLink'] = strtolower($novoNome);
    
    //UPLOAD DE IMAGEM    
    if($_FILES['imagem']['name'] != ''){
        $tamanhoMaximo = 10000000;
        $extensoes = array(".jpg", ".jpeg", ".gif", ".png", ".JPG", ".JPEG", ".GIF", ".PNG");
        $destino = "parceiros";
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

    $obj = new $nomeClasse($_POST[$nomeClasse]);
    if($obj->inserir()){
        $msg = $msg_ok;
        $msgClass = "msgSucesso";
        //header("location: galeria.php?id=".$obj->id);		
    }else{
        $msg = $msg_erro;
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
    
    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?php echo $titulo; ?></h2>
        </header>
        <form name="" id="form" method="post" class="form-bordered" action="" enctype="multipart/form-data">
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
                            <label class="control-label">Título *</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[titulo]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Link do site</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[link]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Ordem *</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[ordem]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ativo</label>
                            <select class="form-control" name="<?php echo $nomeClasse; ?>[ativo]" required>
                                <option value="s">Sim</option>
                                <option value="n">Não</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Imagem <strong>( 230px X 70px, conteúdo principal centralizado )</strong></label>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Descrição</label>
                            <?php
                            $editor = new CKEditor();
                            $editor->editor("descricao","");
                            ?>
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
    <!-- end: page -->
</section>
<?php include_once('../public/inc/rodape.php'); ?>
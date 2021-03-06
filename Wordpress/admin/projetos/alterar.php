<?php
$validacao = true;
$uploadImagem = true;
$lightBox = true;
$popup = true;
$masked = true;
include_once('../public/inc/cabecalho.php');

$idP = $_REQUEST['id'];
$msg = "";
$msgClass = "msgErro";
$titulo = "Projetos";
$acao = "Alterar";
$pg_voltar = URLADMIN."projetos";
$msg_ok = "Dados Alterados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasseG = "Projetos";
$nomeClasse = strtolower($nomeClasseG);

##########################
# carregar
##########################
if(isPost($idP)){
    $obj = new $nomeClasseG();
    $obj->id = $_REQUEST['id'];
    $obj->carregar();
}

##########################
# alterar
##########################
if(isPost($_POST['ok'])){
	$_POST[$nomeClasse]['texto'] = $_POST['texto'];
	$_POST[$nomeClasse]['fichaTecnica'] = $_POST['fichaTecnica'];
	$novoNome = str_replace('<br />', ' ', $_POST[$nomeClasse]['titulo']);
	$novoNome = UtilObjeto::trataNomeUrl($novoNome);
	$_POST[$nomeClasse]['seoLink'] = strtolower($novoNome);

	$obj->carga($_POST[$nomeClasse]);
	if(!$obj->alterar()){
		$msg = "Ocorreu um erro ao alterar os dados";
	}else{
		$msg = $msg_ok;
		$msgClass = "msgSucesso";
	}
}

##########################
# carga inicial do post
##########################
$arrAtributos = ${"arrinfos3$nomeClasse"};
foreach($arrAtributos[INFOCAMPOS] as $atributo){
    if(!isset($_POST[$nomeClasse][$atributo])) $_POST[$nomeClasse][$atributo] = $obj->{$atributo};
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
                <?php 
				include PATHADMIN.'msg.php';
				include_once('inc/menu.php');				
				?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Titulo</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[titulo]" class="form-control" value="<?php echo $_POST[$nomeClasse]['titulo']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Ordem</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[ordem]" class="form-control" value="<?php echo $_POST[$nomeClasse]['ordem']; ?>" required>
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ativo</label>
                            <select class="form-control" name="<?php echo $nomeClasse; ?>[ativo]" required>
                                <option value="s" <?php echo $_POST[$nomeClasse]['ativo']=='s'?'selected':''; ?>>Sim</option>
                                <option value="n" <?php echo $_POST[$nomeClasse]['ativo']=='n'?'selected':''; ?>>Não</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Ficha Técnica</label>
                            <?php
                            $editor = new CKEditor();
                            $editor->editor("fichaTecnica",$_POST[$nomeClasse]['fichaTecnica']);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Texto</label>
                            <?php
                            $editor = new CKEditor();
                            $editor->editor("texto",$_POST[$nomeClasse]['texto']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="panel-footer text-right">
                <input type="submit" class="btn btn-primary" name="ok" value="Alterar Dados" />
            </footer>
        </form>           
    </section>
    <!-- end: page -->
</section>
<?php include_once('../public/inc/rodape.php'); ?>
<?php
$validacao = true;
$uploadImagem = true;
$lightBox = true;
$popup = true;
include_once('../public/inc/cabecalho.php');

$idP = $_REQUEST['id'];
$msg = "";
$msgClass = "msgErro";
if($idP < 3){
$titulo = "Quem Somos";    
}elseif($idP==8){
$titulo = "Descrição home";    
}elseif($idP==9){
$titulo = "Imagem contato";    
}else{
$titulo = "Texto Parceiros";   
}
$acao = "Alterar";
$pg_voltar = URLADMIN."banner";
$pg_imagem = URLADMIN."paginas/galeria.php?id=".$idP;
$pg_videos = URLADMIN."paginas/videos.php?id=".$idP;
$temGaleria = false; //false
$msg_ok = "Dados Alterados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasseG = "Paginas";
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
    	
    if($temGaleria == true){
        //UPLOAD DE IMAGEM    
        if($_FILES['imagem']['name'] != ''){
            $tamanhoMaximo = 10000000;
            $extensoes = array(".jpg", ".jpeg", ".gif", ".png", ".JPG", ".JPEG", ".GIF", ".PNG");
            $destino = "paginas";
            $nomeFile = "imagem";
            $idImagem = $idP;
            $classe = $nomeClasse;

            $VerificaErro = UtilObjeto::uploadUnico($_FILES[$nomeFile]['name'], $tamanhoMaximo, $extensoes, $destino, $nomeFile, $idImagem, $classe);
            if($VerificaErro[0] != ''){
                $_POST[$nomeClasse][$nomeFile] = $VerificaErro[0];
                @unlink(PATHUPLOAD.'paginas/'.$obj->imagem);
            }else{		
                $msg = $VerificaErro[1];
                $erro = true;
            }
        }
    }
    
    $_POST[$nomeClasse]['texto'] = $_POST['texto'];
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
                <?php include PATHADMIN.'msg.php'; ?>
                <?php if($temGaleria == true){ ?>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="<?php echo $pg_imagem; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria Imagem</a>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Título</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[titulo]" class="form-control" value="<?php echo $_POST[$nomeClasse]['titulo']; ?>" <?php if($idP == 2 or $idP == 3 or $idP == 4){ echo 'readonly="readonly"'; }?> required>
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
                <input type="submit" class="btn btn-primary" name="ok" value="Salvar" />
            </footer>
        </form>           
    </section>
</section>
<?php include_once('../public/inc/rodape.php'); ?>
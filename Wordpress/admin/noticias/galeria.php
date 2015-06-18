<?php
$pnotify = true;
$validacao = true;
$galeria = true;
$lightBox = true;
$popup = true;

include_once('../public/inc/cabecalho.php');

$idP = $_REQUEST['id'];
$msg = "";
$msgClass = "msgErro";
$titulo = "Notícias";
$acao = "Galeria Imagem";
$pg_voltar = URLADMIN."noticias/alterar.php?id=".$idP;
$msg_ok = "Registro Excluído!";
$msg_erro = "Erro ao excluir!";
$tamanho_imagem = "Tamanho recomendado: 660px X 460px";
$nomeClasse = "NoticiasImagem";
$nomeTabela = strtolower($nomeClasse);
$destino = "noticias";
$idSalva = "idNoticia";
$indiceTabela = "id_noticia";
$paginaRetorno = URLADMIN."noticias/galeria.php?id=".$idP;

##########################
# excluir
##########################
if(isPost($_POST['idexcluir'])){
    $objRel = new $nomeClasse();
    $objRel->id = $_POST['idexcluir'];
    if($objRel->excluir()){
        $msg = $msg_ok;
        $msgClass = "msgSucesso";
    }else{
        $msg = $msg_erro;
    }
}

include PATHADMIN.'modal-excluir.php';
include PATHADMIN.'modal-galeria.php';
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
    <section class="panel media-gallery">
        <header class="panel-heading">
            <h2 class="panel-title"><?php echo $titulo; ?></h2>
        </header>
        <div class="panel-body">
                <?php 
                    include PATHADMIN.'msg.php';
                    include_once('inc/menu.php'); 
                ?>
            <div class="row" style="margin: 20px 0;">
                <div class="col-sm-12 center">
                    <p><strong><?php echo $tamanho_imagem; ?></strong></p>
                    <form>
                        <input id="file_upload" name="file_upload" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" type="file" multiple="true">
                        <div id="queue"></div>
                        <a class="mb-xs mt-xs mr-xs btn btn-danger" href="javascript:$('#file_upload').uploadifive('upload')"><i class="fa fa-image"></i> Upload Imagem</a>
                    </form>
                </div>
            </div>

            <?php
            $listar = UtilObjeto::listar($nomeClasse,"where ".$indiceTabela." = ".$idP." order by ordem");
            if(is_array($listar)){
            ?>
            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                <ul class="sortable col-sm-12" data-nome-classe="<?php echo $nomeClasse; ?>">
                    <?php foreach($listar as $id => $dados){ ?>
                    <li class="lisort col-sm-3 div_<?php echo $id; ?>" id="item_<?php echo $id; ?>">
                        <div class="isotope-item document">
                            <div class="thumbnail">
                                <div class="thumb-preview">
                                    <a class="thumb-image" href="<?php echo URLUPLOAD.$destino.'/'.$dados['imagem']; ?>">
                                        <img src="<?php echo URLUPLOAD.$destino.'/'.$dados['imagem']; ?>" class="img-responsive" alt="Galeria">
                                    </a>
                                    <div class="mg-thumb-options">
                                        <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                        <div class="mg-toolbar">
                                            <div class="mg-group pull-right">
                                                <a href="#modalForm" data-id="<?php echo $id; ?>" data-principal="<?php echo $dados['principal']; ?>" class="modal-form">EDITAR</a>
                                                <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                    <i class="fa fa-caret-up"></i>
                                                </button>
                                                <ul class="dropdown-menu mg-menu" role="menu">
                                                    <li><a href="<?php echo URLADMIN."public/download.php?arquivo=".$destino."/".$dados['imagem']; ?>"><i class="fa fa-download"></i> Download</a></li>
                                                    <li><a href="#modalAnim" class="excluir" data-id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mg-title text-semibold col-sm-6"><?php echo extensaoImagem($dados['imagem']); ?></h5>
                                <h5 class="mg-title text-semibold text-right col-sm-6">CAPA <input type="checkbox" <?php if($dados['principal'] == 's'){echo 'checked="checked"';} ?> class="cover" data-id="<?php echo $id; ?>" data-nome-classe="<?php echo $nomeClasse; ?>" data-indice="<?php echo $indiceTabela; ?>" data-id-album="<?php echo $idP; ?>" name="capa" /></h5>
                                <div class="mg-description">
                                    <small class="pull-left text-muted legenda" data-id="<?php echo $id; ?>"><?php echo $dados['legenda']; ?></small>
                                    <small class="pull-right text-muted"><?php echo mysql_to_data($dados['data'],true,false)?></small>
                                </div>
                            </div>
                        </div>
                    </li> 
                    <?php } ?>
                </ul>                
            </div>   
            <?php } ?>
        </div>      
    </section>
    <!-- end: page -->
</section>
<?php 
include PATHADMIN.'form_excluir.php';
include_once('../public/inc/rodape.php'); 
?>
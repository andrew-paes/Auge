<?php
include_once('../public/inc/cabecalho.php');

$idP = $_REQUEST['id'];
$msg = "";
$msgClass = "msgErro";
$titulo = "Projetos";
$acao = "Serviços";
$pg_voltar = URLADMIM."projetos/alterar.php?id=".$idP;
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
# cadastrar
##########################
if(isPost($_POST['ok'])){
    $erro = false;
    UtilObjeto::limpar("projetosservicos","WHERE id_projeto = ".$idP);
    if(isPost($_POST['categoria']) && is_array($_POST['categoria'])){
        foreach($_POST['categoria'] as $idPostCat){
            if(!$obj->inserirServicos($idPostCat)){
                $erro = true;
                break;
            }
        }
    }
    if(!$erro){
        $msg = $msg_ok;
        $msgClass = "msgSucesso";
    }else{
        $msg = $msg_erro;
    }
}

##########################
# carregar categorias
##########################
$arrCategoria = Projetos::listarProjetosServicos($idP);
$temCategoria = (is_array($arrCategoria)) ? true : false;
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
                <div class="row"><br /></div>
                <div class="row">
                <?php 
                    $lista = UtilObjeto::listar("servicos","where ativo = 's' order by titulo asc");
                    if(is_array($lista)){
                        foreach($lista as $id => $dados){
                            if($temCategoria && array_key_exists($id,$arrCategoria)){
                                $sel = "checked";
                            }else{
                                $sel = "";
                            }
                ?>
                    <div class="col-sm-4">
                        <div class="checkbox-custom checkbox-default">
                            <input id="<?php echo $id; ?>" name="categoria[]" value="<?php echo $id; ?>" <?php echo $sel; ?> type="checkbox">
                            <label for="<?php echo $id; ?>"><?php echo $dados['titulo']; ?></label>
                        </div>
                    </div>
                <?php }} ?>
                </div>
            </div>
            <footer class="panel-footer text-right">
                <input type="submit" class="btn btn-primary" name="ok" value="Salvar" />
            </footer>
        </form>           
    </section>
</section>
<?php include_once('../public/inc/rodape.php'); ?>
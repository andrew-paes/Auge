<?php
include_once('../public/inc/cabecalho.php');

$idP = $_REQUEST['id'];
$msg = "";
$msgClass = "msgErro";
$titulo = "Serviços Contato";
$acao = "Visualizar";
$pg_voltar = URLADMIN."servicos/contato.php";
$msg_ok = "Dados Alterados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasseG = "ServicosContato";
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
if($obj->lido == 'n' or $obj->lido == ''){
    $_POST[$nomeClasse]['lido'] = 's';
    $obj->carga($_POST[$nomeClasse]);
    if(!$obj->alterar()){}
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
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="<?php echo $pg_voltar; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><strong>Nome</strong></label>
                            <span class="help-block"><?php echo $_POST[$nomeClasse]['nome']; ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><strong>Serviço</strong></label>
                            <span class="help-block">
							<?php
							$objServico = new Servicos();
							$objServico->id = $_POST[$nomeClasse]['idServico'];
							$objServico->carregar();
							
							echo $objServico->titulo;
							?>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><strong>E-mail</strong></label>
                            <span class="help-block"><?php echo $_POST[$nomeClasse]['email']; ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><strong>Data</strong></label>
                            <span class="help-block"><?php echo mysql_to_data($_POST[$nomeClasse]['data'], true, false); ?></span>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"><strong>Mensagem</strong></label>
                            <span class="help-block"><?php echo $_POST[$nomeClasse]['mensagem']; ?></span>
                        </div>
                    </div>
                </div>                
            </div>
            <footer class="panel-footer text-right">
                <br />
            </footer>
        </form>           
    </section>
</section>
<?php include_once('../public/inc/rodape.php'); ?>
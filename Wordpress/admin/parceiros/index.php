<?php
$ativo = true;
$popup = true;
include_once('../public/inc/cabecalho.php');

$titulo = "Parceiros";
$acao = "Gerenciar";
$pg_cadastrar = URLADMIN."parceiros/cadastrar.php";
$pg_alterar = URLADMIN."parceiros/alterar.php";
$pg_visualizar = "";
$msg_ok = "Registro Excluído!";
$msg_erro = "Erro ao excluir, verifique se existe tarefas vinculados a este usuário.";
$nomeClasse = "Parceiros";
$nomeTabela = strtolower($nomeClasse);

##########################
# excluir
##########################
if(isPost($_POST['idexcluir'])){
    $obj = new $nomeClasse();
    $obj->id = $_POST['idexcluir'];
    if($obj->excluir()){
        $msg = $msg_ok;
        $msgClass = "msgSucesso";
    }else{
        $msg = $msg_erro;
    }
}

if(!isPost($_POST['txtBusca'])){
    # GERA A PAGINAÇÂO
    $Tabela = $nomeTabela;
    $Where = "order by ordem asc";
    $ItemPorPagina = 20;
    $UtilObjeto = 's';
    $Paginacao = Paginacao::geraPaginacao($UtilObjeto,$Tabela,$Where,$ItemPorPagina);

    # LISTA PAGINAÇÃO
    $Pagina = "parceiros/index.php";
    $ListaPaginacao = Paginacao::exibirPaginacao($Paginacao['npaginas'], $Paginacao['pgfim'], $Paginacao['pginicio'], $Pagina, $Paginacao['total']);
}

include PATHADMIN.'modal-excluir.php';
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
        <div class="panel-body">            
            <?php include PATHADMIN.'msg.php'; ?>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <div class="mb-md">
                        <a href="<?php echo $pg_cadastrar; ?>" title="Cadastrar" class="btn btn-primary">Cadastrar <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $listar = UtilObjeto::listar($nomeTabela,"order by ordem asc limit ".$Paginacao['limitini'].", ".$Paginacao['itensporpagina']);
                if(is_array($listar)){
                ?>
                <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th class="text-center">Ordem</th>
                            <th class="text-center">Ativo</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listar as $id => $dados){ ?>
                        <tr>
                            <td><?php echo $dados['titulo']; ?></td>
                            <td class="text-center"><?php echo $dados['ordem']; ?></td>
                            <td class="text-center">                                
                                <div class="switch ativo switch-sm switch-dark">
                                    <input type="checkbox" name="switch" data-tabela="<?php echo $nomeClasse; ?>" data-id="<?php echo $id; ?>" data-plugin-ios-switch <?php if($dados['ativo'] == 's'){echo 'checked="checked"';} ?> />
                                </div>
                            </td>
                            <td class="actions text-center">
                                <?php if(isPost($pg_visualizar)){ ?>
                                <a href="<?php echo $pg_visualizar.'?id='.$id; ?>" class="on-editing cancel-row"><i class="fa fa-search-plus"></i></a>
                                <?php } ?>
                                <a href="<?php echo $pg_alterar.'?id='.$id; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="#modalAnim" class="on-default excluir remove-row" data-id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo $ListaPaginacao; ?>
                <?php }else{ ?>
                    <div class="text-center">
                        <h4>Nenhum registro encontrado ou cadastrado.</h42>
                    </div>
                <?php } ?>
            </div>
        </div>
        </div>
    </section>
    <!-- end: page -->
</section>
<?php 
include PATHADMIN.'form_excluir.php';
include_once('../public/inc/rodape.php'); 
?>
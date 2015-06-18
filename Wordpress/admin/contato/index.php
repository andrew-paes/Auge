<?php
$popup = true;
include_once('../public/inc/cabecalho.php');

$titulo = "Contato";
$acao = "Gerenciar";
$pg_cadastrar = URLADMIN."contato/cadastrar.php";
$pg_alterar = URLADMIN."contato/alterar.php";
$pg_visualizar = URLADMIN."contato/visualizar.php";
$pg_exportar = URLADMIN."contato/exportar.php";
$msg_ok = "Registro Excluído!";
$msg_erro = "Erro ao excluir, verifique se existe tarefas vinculados a este usuário.";
$nomeClasse = "Contato";
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
    $Where = "order by data desc";
    $ItemPorPagina = 20;
    $UtilObjeto = 's';
    $Paginacao = Paginacao::geraPaginacao($UtilObjeto,$Tabela,$Where,$ItemPorPagina);

    # LISTA PAGINAÇÃO
    $Pagina = "contato/index.php";
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
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?php echo $titulo; ?></h2>
        </header>
        <div class="panel-body">            
            <?php include PATHADMIN.'msg.php'; ?>
            <?php
            $listar = UtilObjeto::listar($nomeTabela,"order by data desc limit ".$Paginacao['limitini'].", ".$Paginacao['itensporpagina']);
            if(is_array($listar)){
            ?>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <a href="<?php echo $pg_exportar; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-file-excel-o"></i> Exportar</a><br /><br />
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Lido</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listar as $id => $dados){ ?>
                        <tr>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['email']; ?></td>
                            <td class="text-center"><?php echo mysql_to_data($dados['data'], true, false); ?></td>
                            <td class="text-center"><i class="fa <?php if($dados['lido'] == 's'){echo 'fa-check-square';}else{echo 'fa-times-circle';} ?>"></i></td>
                            <td class="actions text-center">
                                <?php if(isPost($pg_visualizar)){ ?>
                                <a href="<?php echo $pg_visualizar.'?id='.$id; ?>" class="on-editing cancel-row"><i class="fa fa-search-plus"></i></a>
                                <?php } ?>
                                <a href="#modalAnim" class="on-default excluir remove-row" data-id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php echo $ListaPaginacao; ?>
            <?php }else{ ?>
                <div class="text-center">
                    <h4>Nenhum registro encontrado ou cadastrado.</h4>
                </div>
            <?php } ?>
        </div>
    </section>
</section>
<?php 
include PATHADMIN.'form_excluir.php';
include_once('../public/inc/rodape.php'); 
?>
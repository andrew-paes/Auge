<?php
$validacao = true;
$uploadImagem = true;
include_once('../public/inc/cabecalho.php');

$msg = "";
$msgClass = "msgErro";
$titulo = "Usuários";
$acao = "Cadastrar";
$pg_voltar = URLADMIN."usuarios";
$msg_ok = "Dados Cadastrados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasse = "Usuario";

##########################
# cadastrar
##########################
if(isPost($_POST['ok'])){
    //UPLOAD DE IMAGEM    
    if($_FILES['imagem']['name'] != ''){
        $tamanhoMaximo = 1000000;
        $extensoes = array(".jpg", ".jpeg", ".gif", ".png", ".JPG", ".JPEG", ".GIF", ".PNG");
        $destino = "usuarios";
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
        $senha1 = $nomeClasse::trataSenha($_POST[$nomeClasse]['senha']);
        $_POST[$nomeClasse]['senha'] = $senha1;
        
        $obj = new $nomeClasse($_POST[$nomeClasse]);
	if($obj->inserir()){
            $msg = $msg_ok;
            $msgClass = "msgSucesso";	
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
    
    <!-- start: page -->
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Nome</label>
                            <input type="text" name="<?php echo $nomeClasse; ?>[nome]" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input type="email" name="<?php echo $nomeClasse; ?>[email]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Senha</label>
                            <input type="password" name="<?php echo $nomeClasse; ?>[senha]" class="form-control" required>
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
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Imagem</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Trocar</span>
                                        <span class="fileupload-new">Selecionar Arquivo</span>
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
    <!-- end: page -->
</section>
<?php include_once('../public/inc/rodape.php'); ?>
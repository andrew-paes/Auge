<?php
$validacao = true;
$uploadImagem = true;
$lightBox = true;
$popup = true;
include_once('../public/inc/cabecalho.php');

$idP = $_REQUEST['id'];
$msg = "";
$msgClass = "msgErro";
$titulo = "Usuários";
$acao = "Alterar";
$pg_voltar = URLADMIN."usuarios";
$pg_remover_item = "alterar.php?id=".$idP."&removerItem=true";
$msg_ok = "Dados Alterados";
$msg_erro = "Oops desculpe. Erro ao cadastrar!";
$nomeClasse = "usuario";

##########################
# carregar
##########################
if(isPost($idP)){
    $obj = new Usuario();
    $obj->id = $_REQUEST['id'];
    $obj->carregar();
}


##########################
# remover item
##########################
if(isPost($_GET['removerItem'])){
    @unlink(PATHUPLOAD.'usuarios/'.$obj->imagem);
    $_POST['item']['imagem'] = "";
    $obj->carga($_POST['item']);
    if(!$obj->alterar()){
        $msg = "Ocorreu um erro ao remover o item";
    }else{
        $msg = "Item removido com sucesso";
        $msgClass = "msgSucesso";
    }
    header("location: alterar.php?id=".$obj->id);
}

##########################
# alterar
##########################
if(isPost($_POST['ok'])){

    if($_POST['senha'] == "" || $_POST['senha2'] == ""){
        $msg = "Preencha todos os campos";
    }else{
        if(strlen(trim($_POST['senha'])) < 6 || strlen(trim($_POST['senha2'])) > 10){
            $msg_erro = "A nova senha deve possuir entre 6 e 10 caracteres";
            $erro = true;
        }else{
            $senha1 = Usuario::trataSenha($_POST['senha']);
            $senha2 = Usuario::trataSenha($_POST['senha2']);
            if($senha1 != $senha2){
                $msg_erro = "Senha de confirmação não confere";
                $erro = true;
            }else{
                $_POST[$nomeClasse]['senha'] = $senha1;
            }
        }
    }
                
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
            @unlink(PATHUPLOAD.'usuarios/'.$obj->imagem);
        }else{		
            $msg = $VerificaErro[1];
            $erro = true;
        }
    }

    if($erro == true){
        $msg = $msg_erro;
    }else{	        
        $obj->carga($_POST[$nomeClasse]);
        if(!$obj->alterar()){
            $msg = "Ocorreu um erro ao alterar a senha";
        }else{
            $msg = $msg_ok;
            $msgClass = "msgSucesso";
        }
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
                            <input type="text" name="<?php echo $nomeClasse; ?>[nome]" class="form-control" value="<?php echo $_POST[$nomeClasse]['nome']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input type="email" name="<?php echo $nomeClasse; ?>[email]" value="<?php echo $_POST[$nomeClasse]['email']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Senha</label>
                            <input type="password" name="senha" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Repetir Senha</label>
                            <input type="password" name="senha2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ativo</label>
                            <select class="form-control" name="<?php echo $nomeClasse; ?>[ativo]" required>
                                <option value="s" <?php echo $_POST[$nomeClasse]['ativo']=='s'?'selected':''; ?>>Sim</option>
                                <option value="n" <?php echo $_POST[$nomeClasse]['ativo']=='n'?'selected':''; ?>>Não</option>
                            </select>
                        </div>
                    </div>
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
                                    <?php if(isPost($_POST[$nomeClasse]['imagem'])){ ?>
                                    <a href="<?php echo URLUPLOAD.'usuarios/'.$_POST[$nomeClasse]['imagem']; ?>" class="lightBox btn btn-default active">Visualizar Imagem</a>
                                    <a href="<?php echo $pg_remover_item; ?>" class="btn btn-default">Deletar</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="panel-footer text-right">
                <input type="submit" class="btn btn-primary" name="ok" value="Alterar" />
            </footer>
        </form>           
    </section>
    <!-- end: page -->
</section>
<?php include_once('../public/inc/rodape.php'); ?>
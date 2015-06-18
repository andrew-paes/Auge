<?php
include_once('topo-config.php');
$msg = array();

if(isset($_POST['entrar'])){
    $email = Usuario::antiInjection($_POST['email']);
    $senha = Usuario::antiInjection($_POST['senha']);    
    
    $msg = Usuario::login($email, $senha);   
}
?>
<!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Agência S3">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo URLADMIN; ?>/public/images/favicon.ico" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/css/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/css/theme.css" />
    </head>
    <body>
        <section class="body-sign">
            <div class="center-sign">
                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group mb-lg">
                                <label>E-mail</label>
                                <div class="input-group input-group-icon">
                                    <input name="email" type="text" tabindex="1" value="<?php if(isPost($_COOKIE['emailLogin'])){echo $_COOKIE['emailLogin'];} ?>" class="form-control input-lg" />
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Senha</label>
                                    <a href="<?php echo URLADMIN; ?>recuperar-senha.php" class="pull-right">Esqueceu a senha?</a>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input name="senha" type="password" tabindex="2" value="<?php if(isPost($_COOKIE['senhaLogin'])){echo $_COOKIE['senhaLogin'];} ?>" class="form-control input-lg" />
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="lembraSenha" <?php if(isPost($_COOKIE['lembraSenha'])){echo 'checked';}?> value="s" type="checkbox"/>
                                        <label for="RememberMe">Lembre-me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <input type="submit" name="entrar" class="btn btn-primary" value="Entrar" />
                                </div>
                            </div>
                            <?php 
                            if(count($msg) > 0){
                            $countMsg = 0;
                            echo '<div class="msgLogin">';
                            foreach($msg as $msgTxt){
                                    $countMsg++;
                                    echo $msg['0'];
                                }
                                echo '</div>';
                            }	 
                            ?>
                            <br />
                        </form>
                    </div>
                </div>
                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2015. Agência S3.</p>
            </div>
        </section>
    </body>
</html>
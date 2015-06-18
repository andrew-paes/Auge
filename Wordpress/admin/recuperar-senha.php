<?php
include_once('topo-config.php');
$msg = array();

if(isset($_POST['recuperar'])){
    $email = Usuario::antiInjection($_POST['email']);
    
    $msg = Usuario::recuperarSenha($email);   
}
?>
<!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Agência S3">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

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
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Recuperar Senha</h2>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            <p class="m-none text-semibold h6">Digite o seu e-mail abaixo e uma nova senha será enviada!</p>
                        </div>

                        <form method="post" action="">
                            <div class="form-group mb-none">
                                <div class="input-group">
                                    <input name="email" type="email" placeholder="E-mail" class="form-control input-lg" />
                                    <span class="input-group-btn">
                                        <input class="btn btn-primary btn-lg" name="recuperar" type="submit" value="Recuperar"/>
                                    </span>
                                </div>
                            </div>
                            <br />
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
                            <p class="text-center mt-lg">Lembrou? <a href="<?php echo URLADMIN; ?>">Login!</a>
                        </form>
                    </div>
                </div>
                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2015. Agência S3.</p>
            </div>
        </section>
    </body>
</html>
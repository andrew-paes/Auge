<?php
session_start();
ob_start();
include_once("../../config/define.php");
include_once("../../config/conecta.php");
include_once("../../config/classes.php");
include_once("../../config/funcoes.php");
Usuario::verificaLogin();
?>
<!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">

        <title>Admin | <?php echo TITLE; ?></title>
        <meta name="author" content="agencias3.com.br">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo URLADMIN; ?>/public/images/favicon.ico" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- CSS -->     
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/css/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/jquery-datatables-bs3/assets/css/datatables.css" />
                
        <?php if($galeria == true){ ?>
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/css/gallery.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo URLADMIN; ?>public/css/uploadifive.css">
        <?php } ?>
        
        <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/css/theme.css" />
        <script src="<?php echo URLADMIN; ?>public/js/modernizr/modernizr.js"></script>

    </head>
<body>
    <section class="body">
        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="<?php echo URLRAIZ; ?>" class="logo" target="_blank">
                    <?php echo TITLE; ?>
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <div class="header-right">
                <span class="separator"></span>
                <ul class="notifications">
                    <li>
                        <?php
                        $contato = UtilObjeto::listar("contato","where lido = 'n' limit 100");
                        if(is_array($contato)){
                            $totalContato = count($contato);
                            if($totalContato >= 100){
                                $totalContato = '99+';
                            }
                        }else{
                            $totalContato = 0;
                        }
                        ?>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="badge"><?php echo $totalContato; ?></span>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default"><?php echo $totalContato; ?></span>
                                Mensagens
                            </div>
                            <div class="content">
                                <ul>
                                    <?php
                                     if(is_array($contato)){
                                        $cont = 0;
                                        foreach($contato as $id => $dados){
                                            $cont++;
                                            if($cont <= 5){
                                    ?>
                                    <li>
                                        <a href="<?php echo URLADMIN.'contato/visualizar.php?id='.$id; ?>" class="clearfix">
                                            <span class="title"><?php echo $dados['nome']; ?></span>
                                            <span class="message">
                                                 <?php
                                                    $descricao =  strip_tags($dados['mensagem']);
                                                    $limite = 20;
                                                    $descricao = $descricao;  
                                                    if(strlen($descricao) < $limite){echo $descricao;}else{echo $descricao."...";}
                                                ?>
                                            </span>
                                        </a>
                                    </li>
                                     <?php }}} ?>
                                </ul>
                                <hr />
                                <div class="text-right">
                                    <a href="<?php echo URLADMIN; ?>contato" class="view-more">Visualizar Todas</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <?php if(isPost($_SESSION['s3'][NOMESITE]['admin']['usuario']['imagem'])){ ?>
                        <figure class="profile-picture">
                            <img src="<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['imagem']; ?>" alt="<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['nome']; ?>" class="img-circle" data-lock-picture="<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['imagem']; ?>" height="50" style="width: auto!important;"  />
                        </figure>
                        <?php }else{ ?>
                        <figure class="profile-picture">
                            <img src="<?php echo URLUPLOAD.'usuarios/logo.jpg'; ?>" alt="s3" class="img-circle" data-lock-picture="<?php echo URLUPLOAD.'usuarios/logo.jpg'; ?>" height="50" style="width: auto!important;"  />
                        </figure>
                        <?php } ?>
                        <div class="profile-info" data-lock-name="<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['nome']; ?>" data-lock-email="<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['email']; ?>">
                            <span class="name"><?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['nome']; ?></span>
                            <span class="role"><?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['tituloNivel']; ?></span>
                        </div>
                        <i class="fa custom-caret"></i>
                    </a>
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li><a role="menuitem" tabindex="-1" href="<?php echo URLADMIN; ?>usuarios/alterar.php?id=<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['id']; ?>"><i class="fa fa-user"></i> Meu Pefil</a></li>
                            <li><a role="menuitem" tabindex="-1" href="<?php echo URLADMIN; ?>logout.php"><i class="fa fa-power-off"></i> Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->
        
        <div class="inner-wrapper">
            <?php include_once('menu.php'); ?>
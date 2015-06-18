<?php include_once('../public/inc/cabecalho.php'); ?>
<section class="panel content-body">
    <header class="page-header">
        <h2>Home</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo URLADMIM; ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Home</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <header class="panel-heading">
        <h2 class="panel-title">Conteúdo do Gerenciador</h2>
    </header>
    <div class="panel-body">
        <p class="lead">Bem vindo,<br /><br />
        Ao seu gerenciador de conteúdo do site Agência S3 onde você poderá deixar sempre o seu site atualizado de forma simples e eficaz.<br />
        Qualquer dúvida você pode entrar em contato pelo email <a href="mailto:contato@agencias3.com.br" title="contato@agencias3.com.br">contato@agencias3.com.br</a>
        </p>
    </div>
    <div class="row">
        <br />
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-info">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-info">
                                <i class="fa fa-photo"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Banner</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>banner" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-secondary">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-secondary">
                                <i class="fa fa-institution"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Quem Somos</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=1" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-warning">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-warning">
                                <i class="fa fa-wrench"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Serviços</strong>
                                    <span class="text-primary"></span>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>servicos" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-dark">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-dark">
                                <i class="fa fa-tasks"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Projetos</strong>
                                    <span class="text-primary"></span>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>projetos" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-success">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-success">
                                <i class="fa fa-tag"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Notícias</strong>
                                    <span class="text-primary"></span>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>noticias" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-danger">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-danger">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Parceiros</strong>
                                    <span class="text-primary"></span>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>parceiros" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-primary">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Contato</strong>
                                    <span class="text-primary"></span>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>contato" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-tertiary">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-tertiary">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Usuários</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>usuarios" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <section class="panel panel-featured-left panel-featured-quartenary">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-quartenary">
                                <i class="fa fa-gear"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"></h4>
                                <div class="info">
                                    <strong class="amount">Configurações</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo URLADMIN; ?>configuracoes" class="text-muted text-uppercase">(Visualizar)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<?php include_once('../public/inc/rodape.php'); ?>
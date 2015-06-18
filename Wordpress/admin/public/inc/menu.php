<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
                Menu
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a href="<?php echo URLADMIN; ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo URLADMIN."/banner"; ?>">
                            <i class="fa fa-photo" aria-hidden="true"></i>
                            <span>Banner</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-institution" aria-hidden="true"></i>
                            <span>Quem Somos</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=1">
                                    Sobre a Empresa
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=2">
                                    Missão
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=3">
                                    Visão
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=4">
                                    Valores
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=5">
                                    Área de Atuação
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>paginas/alterar.php?id=6">
                                    Nossa Equipe
                                </a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-parent">
                        <a>
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span>Serviços</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URLADMIN; ?>servicos">
                                    Servicos
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>servicos/contato.php">
                                    Contato
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo URLADMIN; ?>projetos">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>Projetos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo URLADMIN; ?>noticias">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            <span>Notícias</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo URLADMIN; ?>parceiros">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Parceiros</span>
                        </a>
                    </li>         
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Contato</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URLADMIN; ?>contato">
                                    Contato
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>newsletter">
                                    Newsletter
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Usuários</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo URLADMIN; ?>usuarios">
                                    Gerenciar
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>usuarios/cadastrar.php">
                                    Cadastrar
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLADMIN; ?>usuarios/alterar.php?id=<?php echo $_SESSION['s3'][NOMESITE]['admin']['usuario']['id']; ?>">
                                    Meu Perfil
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="<?php echo URLADMIN; ?>configuracoes">
                            <i class="fa fa-gear" aria-hidden="true"></i>
                            <span>Configurações</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
<!-- end: sidebar -->

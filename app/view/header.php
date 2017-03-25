<!DOCTYPE html>
<html class="ls-theme-light-green ls-html-nobg ">
    <head>
        <title><?php echo $title ?>- WebOS</title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-painel2.png">
        <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-painel2.png">
        <meta name="apple-mobile-web-app-title" content="Painel 2">

        <link href="<?php echo CSS ?>locastyle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon"/>


    </head>
    <body class="documentacao documentacao_exemplos documentacao_exemplos_painel2 documentacao_exemplos_painel2_stats documentacao_exemplos_painel2_stats_index">

        <div class="ls-topbar">

            <!-- Barra de Notificações -->
            <div class="ls-notification-topbar">

                <div class="ls-alerts-list">
                    <?php if (Util::permissao(Util::$GESTOR)) { ?>
                        <a href="<?php echo ROOT ?>usuario/list" class="ls-ico-user" title="Lista de usuários" data-ls-module="topbarCurtain"></a>
                        <a href="<?php echo ROOT ?>usuario/bloqueado" class="ls-ico-eye-blocked" title="Usuário bloqueados" data-ls-module="topbarCurtain"></a>
                        <a href="<?php echo ROOT ?>os/finalizada/list?pagina=1" class="ls-ico-folder-open" title="OS finalizadas" data-ls-module="topbarCurtain"></a>
                    <?php } else { ?>
                        <a href="<?php echo ROOT ?>os/finalizada/list?pagina=1" class="ls-ico-folder-open icone" title="OS finalizadas" data-ls-module="topbarCurtain"></a>
                    <?php } ?>
                </div>

                <!-- Dropdown com detalhes da conta de usuário -->
                <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
                    <a href="#" class="ls-ico-user">
                        <img alt="" />
                        <span class="ls-name"><?php echo $_SESSION['USER']['NOME']; ?></span>

                    </a>

                    <nav class="ls-dropdown-nav ls-user-menu">
                        <ul>
                            <li><a href="<?php echo ROOT ?>usuario/edit/<?php echo $_SESSION['USER']['MATRICULA']; ?>">Meus dados</a></li>
                            <li><a href="<?php echo ROOT ?>sair">Sair</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <span class="ls-show-sidebar ls-ico-menu"></span>

            <a href="javascript:history.back()"  class="ls-go-next"><span class="ls-text">Voltar à lista de serviços</span></a>

            <!-- Nome do produto/marca com sidebar -->
            <h1 class="ls-brand-name">
                <a href="<?php echo ROOT ?>" class="ls-ico-screen">
                    ManOS
                    <small>Ordem de serviços online</small>
                </a>
            </h1>

            <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
        </div>
        <aside class="ls-sidebar">
            <div class="ls-sidebar-inner">
                <a href="/locawebstyle/documentacao/exemplos/painel2/pre-painel"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>
                <nav class="ls-menu">

                    <ul>
                        <li><a href="<?php echo ROOT ?>os/list?pagina=1" class="ls-ico-text">Lista de OSs</a></li>
                        <li><a href="<?php echo ROOT ?>os/add" class="ls-ico-edit-admin">Cadastrar OS</a></li>
                        <!--
                        <li>
                            <a href="<?php echo ROOT ?>usuario/list" class="ls-ico-user">Usuário</a>
                        <!--
                        <ul>
                            <li><a href="http://localhost/webos/usuario/add" class="ls-ico-plus">Cadastrar usuário</a></li>
                            <li><a href="http://localhost/webos/usuario/del" class="ls-ico-minus">Remover usuário</a></li>
                        </ul>
                        
                    </li>
                    <li>
                        <a href="#" class="ls-ico-folder-open">Finalizados</a>
                        <ul>
                            <li><a href="<?php echo ROOT ?>os/finalizada/list" class="ls-ico-checkmark">OS</a></li>
                            <li><a href="<?php echo ROOT ?>usuario/bloqueado" class="ls-ico-eye-blocked">Usuários bloqueados</a></li>
                        </ul>
                        
                    </li>
                        -->
                    </ul>

                </nav>
            </div>

        </aside>
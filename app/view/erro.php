<!DOCTYPE html>
<html class="ls-theme-light-green ls-html-nobg ">
    <head>
        <title>Erro - WebOS</title>
        <?php include(VIEW . "metas.php") ?>
    </head>
    <body>
        <div class="ls-topbar ">

            <!-- Barra de Notificações -->

            <span class="ls-show-sidebar ls-ico-menu"></span>

            <a href="<?php echo ROOT ?>login"  class="ls-go-next"><span class="ls-text">Voltar à lista de serviços</span></a>

            <!-- Nome do produto/marca com sidebar -->
            <h1 class="ls-brand-name">
                <a href="<?php echo ROOT ?>login" class="ls-ico-screen">
                    WebOS
                    <small>Ordem de serviços online</small>
                </a>
            </h1>

            <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
        </div>

        <main class="error">
            

                <div class="ls-box ls-no-bg ls-box-error">
                    <h1 class="ls-title-intro ls-ico-close">Página de erro</h1>
                    <p><?php echo $erro; ?></p>                    
                </div>

            
        </main>

            <script src="<?php echo JS ?>jquery-2.1.0.min.js"></script>
            <script src="<?php echo JS ?>example.js"></script>
            <script src="<?php echo JS ?>locastyle.js"></script>
            <script src="<?php echo JS ?>highcharts.js"></script>
            <script src="<?php echo JS ?>panel-charts.js"></script>
            <script type="text/javascript">
                $(window).load(function () {
                    locastyle.browserUnsupportedBar.init();
                });
            </script>

    </body>
</html>

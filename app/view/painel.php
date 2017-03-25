<?php
$title = "Listar OS - ManOS";
include(VIEW . "header_alone.php")
?>

<main class="ls-main main-painel">
    <div class="container-fluid mTopDados">
            
            <?php if($_SESSION['USER']['PAPEL']['ID'] > 2) { ?>
        <div class="ls-box ls-board-box">
            
            <header class="ls-info-header">
                <!-- <p class="ls-float-right ls-float-none-xs ls-small-info">Valido até <strong>01.05.2014</strong></p> -->
                <h2 class="ls-title-3">Detalhes e Ações</h2>
            </header>
            <div class = "row col-md-8 col-md-offset-2">
                <div id="sending-stats" class="row">
                     <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">OS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong class="ls-ico-edit-admin ls-ico-right icon-grande"></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>os/add" class="ls-btn ls-btn-xs">Cadastrar OS</a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">OS ABERTAS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong><?php echo $list_os_abertas->count("*"); ?></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>os/list?pagina=1" class="ls-btn ls-btn-xs">Lista de OS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">OS FINALIZADAS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong><?php echo $list_os_finalizadas->count("*"); ?></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>os/finalizada/list?pagina=1" class="ls-btn ls-btn-xs">OS finalizadas</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            </div>
            
            <?php } else { ?>
            <div class="ls-box ls-board-box">
            <header class="ls-info-header">
                <!-- <p class="ls-float-right ls-float-none-xs ls-small-info">Valido até <strong>01.05.2014</strong></p> -->
                <h2 class="ls-title-3">Detalhes</h2>
            </header>
            <div class = "row col-md-9 col-md-offset-3">
                <div id="sending-stats" class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">OS ABERTAS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong><?php echo $list_os_abertas->count("*"); ?></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>os/list?pagina=1" class="ls-btn ls-btn-xs">Lista de OS</a>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">OS FINALIZADAS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong><?php echo $list_os_finalizadas->count("*"); ?></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>os/finalizada/list?pagina=1" class="ls-btn ls-btn-xs">OS finalizadas</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="ls-box ls-board-box">

            <header class="ls-info-header">
                <!-- <p class="ls-float-right ls-float-none-xs ls-small-info">Valido até <strong>01.05.2014</strong></p> -->
                <h2 class="ls-title-3">Ações</h2>
            </header>
            <div class = "row col-md-9 col-md-offset-3">
                <div id="sending-stats" class="row">
                    <?php if(Util::permissao(Util::$GESTOR)){ ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">USUÁRIOS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong class="ls-ico-user ls-ico-right icon-grande"></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>usuario/add" class="ls-btn ls-btn-xs">Cadastrar usuários</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-sm-6 col-md-4">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">OS</h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong class="ls-ico-edit-admin ls-ico-right icon-grande"></strong>
                                </span>
                            </div>
                            <div class="ls-box-footer">
                                <a href="<?php echo ROOT ?>os/add" class="ls-btn ls-btn-xs">Cadastrar OS</a>
                            </div>
                        </div>
                    </div>                    
                </div>

            </div>

        </div>
        
            <?php } ?>

        <!--
        <div class="ls-box">
            <header class="ls-info-header">
                <h2 class="ls-title-3">Clientes que mais contrataram</h2>
                <a href="#" class="ls-btn ls-btn-sm">Ver mais relatórios</a>
            </header>

            <div id="panel-charts"></div>
        </div> -->
    </div>
</main>


<?php include(VIEW . "footer.php") ?>
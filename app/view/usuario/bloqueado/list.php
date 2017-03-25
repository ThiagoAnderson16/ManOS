<?php
$title = "Listar usuário - ManOS";
include(VIEW . "header.php")
?>

        <main class="ls-main ">
            <div class="container-fluid">
                <h1 class="ls-title-intro">Usuários bloqueados</h1>


                <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
                    <?php
                    if (count($list) > 0) {
                        foreach ($list as $user) {
                            ?>

                            <div class="ls-list">
                                <header class="ls-list-header">
                                    <div class="ls-list-title col-md-9 ls-ico-user">
                                        <strong><?php echo $user["nome"] ?></strong>
                                        <strong> - </strong>
                                        <strong><?php echo $user["matricula"] ?></strong>
                                    </div>
                                    <?php if(Util::permissao(Util::$COORDENADOR)){ ?>
                                    <div class="col-md-3 ls-txt-right">
                                        <div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
                                            <a href="#" class="ls-btn-primary">Opções</a>
                                            <ul class="ls-dropdown-nav">
                                                <li><a href="<?php echo ROOT ?>usuario/desbloquear/<?php echo $user["matricula"] ?>">Desloquear</a></li>
                                                <li><a href="<?php echo ROOT ?>usuario/desativar/<?php echo $user["matricula"] ?>">Desativar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php } ?> 
                                </header>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>


        </main>

<?php include(VIEW . "footer.php") ?>



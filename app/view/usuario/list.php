<?php
$title = "Listar usuário - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">

        <a href="<?php echo ROOT ?>usuario/add" class="ls-btn-primary ls-btn-lg botao-direita">Cadastrar Usuário</a>
        <h1 class="ls-title-intro">Lista de usuários</h1>


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
                            <div class="col-md-3 ls-txt-right">
                                <div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
                                    <a href="#" class="ls-btn-primary">Opções</a>
                                    <ul class="ls-dropdown-nav">
                                        <li><a href="<?php echo ROOT ?>usuario/edit/<?php echo $user["matricula"] ?>">Editar dados</a></li>
                                        <?php if (Util::permissao(Util::$COORDENADOR)) { ?>
                                            <li><a href="<?php echo ROOT ?>usuario/bloquear/<?php echo $user["matricula"] ?>">Bloquear</a></li>
                                        <?php }
                                        if (Util::permissao(Util::$COORDENADOR)) {
                                            ?>
                                            <li><a href="<?php echo ROOT ?>usuario/desativar/<?php echo $user["matricula"] ?>">Desativar</a></li>
        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
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



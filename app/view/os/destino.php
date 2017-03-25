<?php
$title = "Destino OS - ManOS";
include(VIEW . "header.php")
?>


        <main class="ls-main ">
            <div class="container-fluid">

                <div class="botao-direita">
                    <form action="<?php echo ROOT ?>os/search" method="POST" class="ls-form ls-form-inline row">
                        <label class="ls-label col-md-11">
                            <b class="ls-label-text">Número da OS</b>
                            <input type="number" name="numero_os_pesquisar" placeholder="Número da OS" required >
                        </label>
                        <label class="ls-label col-md-9">
                            <b class="ls-label-text">Equipamento</b>
                            <input type="text" name="equipamento" placeholder="Equipamento" required >
                        </label>
                        <div class="ls-actions-btn">
                            <button class="ls-btn">Filtrar</button>
                        </div>
                    </form>
                    <!--
                <input class="espacamento ls-login-bg-user ls-field-lg" type="text" placeholder="Número da OS" required autofocus>
                <input class="espacamento ls-login-bg-user ls-field-lg" type="password" placeholder="Equipamento" required autofocus>
                <input type="submit" value="Filtrar" class="espacamento ls-btn-primary ls-btn-lg">
                    -->
                </div>
                <!--<a href="<?php echo ROOT ?>os/abrir" class="ls-btn-primary ls-btn-lg botaoFiltrar">Filtrar OS</a>-->
                <h1 class="ls-title-intro">Lista de OSs</h1>
                <a href="<?php echo ROOT ?>os/add" class="ls-btn-primary ls-btn-lg botao-esquerda">Cadastrar OS</a>

                <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
                    <?php
                    if (count($list_os) > 0) {
                        foreach ($list_os as $os) {
                            ?>
                            <div class="ls-list">
                                <header class="ls-list-header">
                                    <div class="ls-list-title col-md-9">
                                        <strong><?php echo $os['numero_os'] ?></strong>
                                    </div>
                                    <div class="col-md-3 ls-txt-right">
                                        <div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
                                            <a href="#" class="ls-btn-primary">Opções</a>
                                            <ul class="ls-dropdown-nav">
                                                <li><a href="<?php echo ROOT ?>os/edit">Editar</a></li>
                                                <li><a href="">Emitir PDF</a></li>
                                                <li><a href="">Finalizar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </header>
                                <div class="ls-list-content ">
                                    <div class="col-xs-12 col-md-3">
                                        <span class="ls-list-label">Equipamento</span>
                                        <?php
                                        if (count($equipamentos) > 0) {
                                            foreach ($equipamentos as $equipamento) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                                                if ($os['equipamento_id'] == $equipamento['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                                                    ?>
                                                    <strong value="<?php echo $os['equipamento_id'] ?>"> <?php echo $equipamento['descricao'] ?> </strong>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>

                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <span class="ls-list-label">Data de entrada</span>
                                        <strong><?php echo $os['data_cadastro'] ?></strong>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <span class="ls-list-label">Útima modificação</span>
                                        <strong>null</strong>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <span class="ls-list-label">Status</span>
                                        <strong>null</strong>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>

                    <div class="ls-full-width">
                        <div class="ls-pagination-filter">
                            <ul class="ls-pagination">
                                <li class="ls-disabled"><a href="#">&laquo; Anterior</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li class="ls-active"><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Próximo &raquo;</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </div>


        </main>

<?php include(VIEW . "footer.php") ?>


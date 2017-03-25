<?php
$title = "Pesquisar OS - ManOS";
include(VIEW . "header.php")
?>


<main class="ls-main ">
    <div class="container-fluid">

                <!--<a href="<?php echo ROOT ?>os/abrir" class="ls-btn-primary ls-btn-lg botaoFiltrar">Filtrar OS</a>-->
        <h1 class="ls-title-intro">Dados da OS</h1>

        <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
            <?php
            if (count($list_os) > 0) {
                foreach ($list_os as $os) {

                    $resp_equipamento = ''; //inicializando a variável;

                    if (count($equipamentos) > 0) {
                        foreach ($equipamentos as $equipamento_filtro) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                            if (strtoupper($palavra_filtro) == strtoupper($equipamento_filtro['descricao'])) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                                $resp_equipamento = $equipamento_filtro['id'];
                            }
                        }
                    }

                    $responsavel_id = '-1';
                    $id_mod = $os['ultima_modificacao_user_id'];

                    if (count($usuarios) > 0) {
                        foreach ($usuarios as $usuario) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                            if (strtoupper($palavra_filtro) == strtoupper($usuario['nome'])) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                                $responsavel_id = $usuario['id'];
                            }
                            if($id_mod == $usuario['id']){
                                $id_mod = $usuario['nome'];
                            }
                        }
                    }

                    if ($os['numero_os'] == intval($palavra_filtro) or $os['ultima_modificacao_user_id'] == $responsavel_id or strtoupper($os['cliente']) == strtoupper($palavra_filtro) or strtoupper($os['equipamento_id']) == strtoupper($resp_equipamento)) {
                        //filtrando por numero_os, modelo e defeito
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
                                            <li><a href="<?php echo ROOT ?>os/detalhes/<?php echo $os["numero_os"] ?>">Detalhes</a></li>
                                            <li><a href="<?php echo ROOT ?>os/imprimir/<?php echo $os["numero_os"] ?>">Imprimir</a></li>
                                            <?php if ($os["os_status_id"] != 2) { ?>
                                                <li><a href="<?php echo ROOT ?>os/add-atividade/<?php echo $os["numero_os"] ?>">Adicionar Atividade</a></li>
                                                <li><a href="<?php echo ROOT ?>os/add-componentes/<?php echo $os["numero_os"] ?>" title="Adicionar componentes substituídos">Adicionar componentes</a></li>                                          
                                            <?php } ?>
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
                                    <strong><?php
                                        $apenasData = explode(" ", $os['ultima_modificacao']);
                                        $dt_novaData = explode("-", $apenasData[0]);
                                        $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];
                                        echo $dt_final ." - ". $id_mod;
                                        ?></strong>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <span class="ls-list-label">Status</span>
                                    <strong><?php echo $os->os_status['descricao'] ?></strong>
                                </div>
                            </div>                         
                        </div>

                        <?php
                    }
                }
            }
            ?>

        </div>
    </div>


</main>


<?php include(VIEW . "footer.php") ?>
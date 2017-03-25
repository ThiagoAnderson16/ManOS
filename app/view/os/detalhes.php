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
            if (count($os) > 0) {

                $id_mod = $os['ultima_modificacao_user_id'];

                if (count($usuarios) > 0) {
                    foreach ($usuarios as $usuario) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                        if ($id_mod == $usuario['id']) {
                            $id_mod = $usuario['nome'];
                        }
                    }
                }

                /*
                  $resp_equipamento = ''; //inicializando a variável;

                  if (count($equipamentos) > 0) {
                  foreach ($equipamentos as $equipamento_filtro) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                  if ($palavra_filtro == $equipamento_filtro['descricao']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                  $resp_equipamento = $equipamento_filtro['id'];
                  }
                  }
                  } */


                //filtrando por numero_os, modelo e defeito
                ?>
                <div class="ls-list">
                    <header class="ls-list-header">
                        <div class="ls-list-title col-md-9">
                            <strong><?php echo $os['numero_os'] ?></strong>
                            <!-- <strong><?php echo $os['os_status_id'] ?></strong> -->
                        </div>

                        <?php if ($os['os_status_id'] != 2) { ?>
                            <div class="col-md-3 ls-txt-right">
                                <div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
                                    <a href="#" class="ls-btn-primary">Opções</a>
                                    <ul class="ls-dropdown-nav">
                                        <?php if ($os["os_status_id"] != 2) { ?>
                                            <li><a href="<?php echo ROOT ?>os/add-atividade/<?php echo $os["numero_os"] ?>">Adicionar Atividade</a></li>
                                            <li><a href="<?php echo ROOT ?>os/add-componentes/<?php echo $os["numero_os"] ?>" title="Adicionar componentes substituídos">Adicionar componentes</a></li>                                          
                                            <li><a href="<?php echo ROOT ?>os/finalizar/<?php echo $os["numero_os"] ?>">Finalizar</a></li>
                                        <?php } ?>
                                        <li><a href="<?php echo ROOT ?>os/imprimir/<?php echo $os["numero_os"] ?>">Imprimir</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }

                        if ($os['os_status_id'] == 2 && Util::permissao(Util::$GESTOR)) {
                            ?>
                            <div class="col-md-3 ls-txt-right">
                                <div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
                                    <a href="#" class="ls-btn-primary">Opções</a>
                                    <ul class="ls-dropdown-nav">
                                        <li><a href="javascript:self.print()">Imprimir</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>


                    </header>
                    <div class="ls-list-content ">
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Origem</span>
                            <?php
                            if ($os["cliente"] !== null) {
                                ?>
                                Cliente: <strong value="<?php echo $os['cliente'] ?>"> <?php echo $os['cliente'] ?> </strong>
                                <?php
                            } else {
                                if (count($origens) > 0) {
                                    foreach ($origens as $origem) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                                        if ($os['origem_id'] == $origem['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                                            ?>
                                            <strong value="<?php echo $os['origem_id'] ?>"> <?php echo $origem['descricao'] ?> </strong>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>

                        </div>
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
                            <span class="ls-list-label">Data de cadastro</span>
                            <strong><?php
                        //DATA:
                        $apenasData = explode(" ", $os['data_cadastro']);
                        $dt_novaData = explode("-", $apenasData[0]);
                        $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];

                        echo $dt_final . " as " . $apenasData[1];
                            ?></strong>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Útima modificação</span>
                            <strong><?php
                            $apenasData = explode(" ", $os['ultima_modificacao']);
                            $dt_novaData = explode("-", $apenasData[0]);
                            $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];
                            echo $dt_final . " - " . $id_mod;
                            ?></strong>
                        </div>
                    </div>
                    <div class="ls-list-content ">
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Status</span>
                            <strong><?php echo $os->os_status['descricao'] ?></strong>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Numero de série</span>
                            <strong><?php echo $os['numero_serie'] ?></strong>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Modelo</span>
                            <strong><?php echo $os['modelo'] ?></strong>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Defeito</span>
                            <strong><?php echo $os['defeito'] ?></strong>
                        </div>
                    </div>
                    <div class="ls-list-content ">
                        <div class="col-xs-12 col-md-3">
                            <span class="ls-list-label">Observações</span>
                            <strong><?php echo $os['observacoes'] ?></strong>
                        </div>
                    </div>
                </div>

                <div class="ls-box-filter">

                    <h3>Atividades realizadas</h3>

                    <hr>

                    <?php
                    foreach ($servicos_realizados as $servico_realizado) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                        if ($servico_realizado['os_id'] == $os['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                            ?>
                            <table width="100%" class="ls-table ls-no-hover ls-table-striped">
                                <tr>
                                    <td class="hidden-xs"><?php
                $dt_novaData = explode("-", $servico_realizado['data']);
                $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];

                echo $dt_final
                            ?></td>
                                    <td class="hidden-xs"><?php echo $servico_realizado['descricao'] ?></td>
                                    <td class="hidden-xs"><?php
                            $responsavel = $db->usuario->where("id", $servico_realizado['usuario_id'])->fetch();

                            echo $responsavel['nome'];
                            ?>

                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="ls-box-filter">

                    <h3>Lista de componentes substituidos</h3>

                    <hr>

                    <?php
                    foreach ($componentes_substituidos as $componentes_substituido) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                        if ($componentes_substituido['os_id'] == $os['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                            ?>
                            <table width="100%" class="ls-table ls-no-hover ls-table-striped">
                                <tr>
                                    <td class="hidden-xs"><?php
                $dt_novaData = explode("-", $componentes_substituido['data']);
                $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];

                echo $dt_final
                            ?></td>
                                    <td class="hidden-xs"><?php echo $componentes_substituido['nome'] ?></td>
                                    <td class="hidden-xs"><?php echo $componentes_substituido['quantidade'] ?></td>
                                </tr>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>  

                <?php
            }
            ?>

        </div>
    </div>


</main>


<?php include(VIEW . "footer.php") ?>
<?php
$title = "Listar OS - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">

        <div class="botao-direita"> 
            <form action="<?php echo ROOT ?>os/search" method="POST" class="ls-form ls-form-inline row">
                <label class="ls-label col-md-9">
                    <b class="ls-label-text">Filtrar</b>
                    <input type="text" name="palavra_filtro" placeholder="OS, cliente, equipamento, extencionista" title="Número OS, Modelo e Defeito" required > <!-- alterar esse nome-->
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
                                        <li><a href="<?php echo ROOT ?>os/detalhes/<?php echo $os["numero_os"] ?>">Detalhes</a></li>
                                        <li><a href="<?php echo ROOT ?>os/add-atividade/<?php echo $os["numero_os"] ?>">Adicionar Atividade</a></li>
                                        <li><a href="<?php echo ROOT ?>os/add-componentes/<?php echo $os["numero_os"] ?>" title="Adicionar componentes substituídos">Adicionar componentes</a></li>
                                        <?php if (Util::permissao(Util::$COORDENADOR)) { ?>
                                            <!--<li><a href="<?php echo ROOT ?>os/finalizar/<?php echo $os["numero_os"] ?>">Finalizar</a></li> -->
                                            <li><a href="<?php echo ROOT ?>os/view-finalizar/<?php echo $os["numero_os"] ?>">Finalizar</a></li>
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
                                <span class="ls-list-label">Defeito</span>
                                <strong><?php echo $os['defeito'] ?></strong>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

            <div class="ls-pagination-filter">
                <?php
                if (!isset($_GET['pagina'])) {
                    $num_pag = 1;
                }
                ?>
                <ul class="ls-pagination">

                    <?php $o_get = $_GET["pagina"]; ?>

                    <li><a href="?pagina=<?php 
                    
                    if($o_get <= 1){
                        echo 1;
                    } else {
                        echo $o_get - 1;
                    }
                    
                    ?>">&laquo; Anterior</a></li>

                    <?php
                    $pages_controle_numero = 5;
                    $pages_controle_numero_anterior = 1;

                    if ($pages_controle_numero < $o_get) {
                        $pages_controle_numero_anterior = $pages_controle_numero + 1;
                        $pages_controle_numero += 5;
                    }




                    //$qtd_rows/$max_por_pag ====> pegando a qtd total e dividindo pela exibição de 5 páginas                    
                    /* $total_pages = 1 + ($qtd_rows / $max_por_pag); //pegando o inteiro maior

                      if ($total_pages > 5) {
                      $total_pages = 5;
                      } */



                    for ($i = $pages_controle_numero_anterior; $i <= $pages_controle_numero; $i++) {
                        echo '<li class="' . (($o_get == $i) ? "ls-active" : "") . '"><a href="?pagina=' . $i . '">' . $i . '</a></li>';
                    }

                    if ($o_get < 6) {
                        echo '<li><a href=?pagina=' . ((true == true) ? ($pages_controle_numero + 1) : "") . '>...</a></li>';
                    }
                    ?>


                    <li><a href="?pagina=<?php 
                    if($o_get >= 10){
                        echo 10;
                    } else {
                        echo $o_get + 1;
                    }
                    ?>">Próximo &raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>


</main>


<?php include(VIEW . "footer.php") ?>
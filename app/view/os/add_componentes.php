<?php
$title = "Adicionar Atividades - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">
        <h1 class="ls-title-intro">Adicionar Componentes a OS: <?php echo $os["numero_os"] ?></h1>

        <!-- <form action="" class="ls-form ls-form-horizontal ls-form-text" data-ls-module="form">    -->
        <label class="ls-label col-md-3 ls-form ls-form-horizontal ls-form-text">
            <!-- 
            <b class="ls-label-text">Ordem de serviço número: </b>
            <input type="text" name="nome" placeholder="GERAR ORDEM DE SERVIÇO (PODE SER EDITÁVEL)" class="ls-field" required>
            -->
        </label>



        <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
            <form action="<?= ROOT ?>os/add-componentes" method="post" class="ls-form ls-form-horizontal row">



                <div class="ls-box-filter">
                    <fieldset>
                        <input type="hidden" name="id_os" value="<?php echo $os["id"] ?>">
                        <input type="hidden" name="numero_os" value="<?php echo $os["numero_os"] ?>">
                        
                        <label class="ls-label col-md-2 col-sm-2">
                            <b class="ls-label-text">Data</b>
                            <span id="new_feature_custom_filter_2" data-ls-module="popover" data-content="Escolha o período desejado e clique em 'Filtrar'."></span>
                            <input type="text" name="data" class="datepicker" placeholder="<?php echo date("d/m/Y") ?>">
                        </label>
                        <label class="ls-label col-md-8 col-xs-12">
                            <b class="ls-label-text">Componente substituído</b>
                            <input type="text" name="componente" placeholder="Nome do componente" class="ls-field" required>
                        </label>  <label class="ls-label col-md-2 col-xs-12">
                            <b class="ls-label-text">Quantidade</b>
                            <input type="number" name="quantidade" placeholder="1" class="ls-field" required>
                        </label>
                    </fieldset>
                    <div class="ls-actions-btn  ls-float-right">
                        <button class="ls-btn-primary marg">Salvar</button>
                    </div>
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
                                    $dt_final = $dt_novaData[2]."/".$dt_novaData[1]."/".$dt_novaData[0];
                                    
                                    echo $dt_final ?></td>
                                    <td class="hidden-xs"><?php echo $componentes_substituido['nome'] ?></td>
                                    <td class="hidden-xs"><?php echo $componentes_substituido['quantidade'] ?></td>
                                </tr>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>                   
            </form>

        </div>
    </div>


</main>

<?php include(VIEW . "footer.php") ?>
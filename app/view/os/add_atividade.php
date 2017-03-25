<?php
$title = "Adicionar Atividades - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">
        <h1 class="ls-title-intro">Adicionar atividades da OS: <?php echo $os["numero_os"] ?></h1>

        <!-- <form action="" class="ls-form ls-form-horizontal ls-form-text" data-ls-module="form">    -->
        <label class="ls-label col-md-3 ls-form ls-form-horizontal ls-form-text">
            <!-- 
            <b class="ls-label-text">Ordem de serviço número: </b>
            <input type="text" name="nome" placeholder="GERAR ORDEM DE SERVIÇO (PODE SER EDITÁVEL)" class="ls-field" required>
            -->
        </label>



        <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
            <form action="<?=ROOT?>os/add-atividade" method="post" class="ls-form ls-form-horizontal row">
                <input type="hidden" name="id_os" value="<?php echo $os["id"] ?>">
                <input type="hidden" name="numero_os" value="<?php echo $os["numero_os"] ?>">

                <div class="ls-box-filter">
                    <fieldset>
                        <label class="ls-label col-md-2 col-sm-2">
                            <b class="ls-label-text">Data</b>
                            <span id="new_feature_custom_filter_2" data-ls-module="popover" data-content="Escolha o período desejado e clique em 'Filtrar'."></span>
                            <input type="text" name="data" class="datepicker" placeholder="<?php echo date("d/m/Y") ?>">
                        </label>
                        <label class="ls-label col-md-8 col-xs-12">
                            <b class="ls-label-text">Descrição da atividade</b>
                            <input type="text" name="descricao_atividade" placeholder="Descrição da atividade" class="ls-field" required>
                        </label>  <label class="ls-label col-md-2 col-xs-12">
                            <b class="ls-label-text">Responsável</b>
                            <input type="text" name="responsavel" value='<?php echo $_SESSION['USER']['NOME']; ?>' class="ls-field" disabled>
                        </label>
                    </fieldset>
                    <div class="ls-actions-btn  ls-float-right">
                        <button class="ls-btn-primary marg">Salvar</button>
                    </div>

                </div>

            </form>
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
                                    $dt_final = $dt_novaData[2]."/".$dt_novaData[1]."/".$dt_novaData[0];
                                    
                                    echo $dt_final ?></td>
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

        </div>
    </div>


</main>

<?php include(VIEW . "footer.php") ?>
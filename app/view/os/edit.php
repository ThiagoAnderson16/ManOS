<?php 
 $title = "Editar OS - ManOS";
 include(VIEW . "header.php") ?>

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
                    <form action="" class="ls-form ls-form-horizontal row">
                        <div class="ls-box-filter">
                            <fieldset>
                                <label class="ls-label col-md-2 col-sm-2">
                                    <b class="ls-label-text">Data</b>
                                    <span id="new_feature_custom_filter_2" data-ls-module="popover" data-content="Escolha o período desejado e clique em 'Filtrar'."></span>
                                    <input type="text" name="range_start" class="datepicker" placeholder="dd/mm/aaaa">
                                </label>
                                <label class="ls-label col-md-8 col-xs-12">
                                    <b class="ls-label-text">Descrição da atividade</b>
                                    <input type="text" name="nome" placeholder="Descrição da atividade" class="ls-field" required>
                                </label>  <label class="ls-label col-md-2 col-xs-12">
                                    <b class="ls-label-text">Responsável</b>
                                    <input type="text" name="nome" value="Thiago Anderson" class="ls-field" required>
                                </label>
                            </fieldset>

                        </div>



                        <div class="ls-box-filter">

                            <h1 class="ls-title-intro">Componente substituidos</h1>
                            <fieldset>
                                <label class="ls-label col-md-2 col-xs-12">
                                    <b class="ls-label-text">Item</b>
                                    <input type="text" name="nome" placeholder="Item" class="ls-field" required>
                                </label> 
                                <label class="ls-label col-md-8 col-xs-12">
                                    <b class="ls-label-text">Descrição</b>
                                    <input type="text" name="nome" placeholder="Descrição" class="ls-field" required>
                                </label>
                            </label>  <label class="ls-label col-md-2 col-xs-12">
                            <b class="ls-label-text">Quantidade</b>
                            <input type="number" name="nome" placeholder="Quantidade" class="ls-field" required>
                        </label>

                    </fieldset>


                </div>                   
                <!-- botões  -->
                <div class="ls-actions-btn  ls-float-right">
                    <button class="ls-btn-primary">Salvar</button>
                    <button class="ls-btn marg">Limpar</button>
                </div>


            </form>

        </div>
    </div>


</main>

<?php include(VIEW . "footer.php") ?>
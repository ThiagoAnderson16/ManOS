<?php
$title = "Abrir Finalizadas - ManOS";
include(VIEW . "header.php")
?>

        <main class="ls-main ">
            <div class="container-fluid">
                <h1 class="ls-title-intro">Abrir ordem de serviço finalizada</h1>
                <!-- <form action="" class="ls-form ls-form-horizontal ls-form-text" data-ls-module="form">    -->
                <label class="ls-label col-md-3 ls-form ls-form-horizontal ls-form-text">
                    <!-- <input type="text" name="nome" placeholder="GERAR ORDEM DE SERVIÇO (PODE SER EDITÁVEL)" class="ls-field" required> -->
                </label>
                <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
                    <form action="" class="ls-form ls-form-horizontal row">
                        <div class="ls-box-filter">
                            <fieldset>
                                <label class="ls-label col-md-4 col-xs-12">
                                    <b class="ls-label-text">Número da OS</b>
                                    <input type="number" name="nome" placeholder="Número da OS" class="ls-field" required>
                                </label>
                                <label class="ls-label col-md-4 col-xs-12">
                                    <b class="ls-label-text">Equipamento</b>
                                    <input type="text" name="nome" placeholder="Equipamento" class="ls-field" required>
                                </label>
                            </fieldset>

                        </div>


                        <!-- botões  -->
                        <div class="ls-actions-btn  ls-float-right">
                            <button class="ls-btn-primary">Filtrar</button>
                            <button class="ls-btn marg">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </main>

<?php include(VIEW . "footer.php") ?>
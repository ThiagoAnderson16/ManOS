<?php
$title = "Adicionar OS - ManOS";
include(VIEW . "header.php")
?>

<script type="text/javascript">
    function habilitaBtn() {
        var op = document.getElementById("opcao").value;

        if (op !== 7){
            document.getElementById('cliente').disabled=true;
            document.getElementById('cliente').value="";
        }
        
        if(op == 7){
            document.getElementById('cliente').disabled=false;
        }
    }
</script>


<main class="ls-main ">
    <div class="container-fluid">
        <h1 class="ls-title-intro">Cadastrar OS</h1>
        <p>Entrada do equipamento.</p>

        <!-- <form action="" class="ls-form ls-form-horizontal ls-form-text" data-ls-module="form">    -->
        <label class="ls-label col-md-3 ls-form ls-form-horizontal ls-form-text">
            <!-- <input type="text" name="nome" placeholder="GERAR ORDEM DE SERVIÇO (PODE SER EDITÁVEL)" class="ls-field" required> -->
        </label>
        <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
            <form action="<?php echo ROOT ?>os/add" method="POST" class="ls-form ls-form-horizontal row">
                <label> 
                    <h1 class="ls-title-intro">OS Número:
                        <?php
                        date_default_timezone_set('America/Recife');
                        $data = date('ymdHi');
                        /* ano, mes, dia, hora, minuto (2 algarismo cada) */
                        ?>
                        <input type="text" name="numero_os" value="<?php echo $data; ?>" style="font-size: 25px;"/> <!--Campo invisivel q guarda o numero_os -->

                    </h1>
                </label>
                <div class="ls-box-filter">
                    <fieldset>
                        <div class="row">
                            <label class="ls-label col-md-4">
                                <b class="ls-label-text">Origem</b>
                                <div class="ls-login-bg-user ls-field ls-custom-select tamInput">
                                    <select onchange="habilitaBtn()" id="opcao" name="origem" class="ls-select">
                                        <?php
                                        if (count($origens) > 0) {
                                            foreach ($origens as $origem) { //percorrer o array inteiro e a $origem recevbe o valor atual!
                                                ?>
                                                <option value="<?php echo $origem['id'] ?>"> <?php echo $origem['descricao'] ?> </option>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p class="link"><a href="<?php echo ROOT ?>os/view-add-outro?acao=origem">Outro</a></p>
                            </label>
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Nome do cliente</b>
                                <input type="text" id="cliente" name="cliente" placeholder="Nome" class="ls-field">
                            </label>
                            <label class="ls-label col-md-4">
                                <b class="ls-label-text">Equipamento</b>
                                <div class="ls-login-bg-user ls-field ls-custom-select tamInput">
                                    <select name="equipamento" class="ls-select">
                                        <?php
                                        if (count($equipamentos) > 0) {
                                            foreach ($equipamentos as $equipamento) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                                                ?>
                                                <option value="<?php echo $equipamento['id'] ?>"> <?php echo $equipamento['descricao'] ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p class="link"><a href="<?php echo ROOT ?>os/view-add-outro?acao=equipamento">Outro</a></p>
                            </label>
                        </div>
                        <div class="row">
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Marca</b>
                                <div class="ls-login-bg-user ls-field ls-custom-select tamInput">
                                    <select name="marca" class="ls-select">
                                        <?php
                                        if (count($marcas) > 0) {
                                            foreach ($marcas as $marca) {
                                                ?>
                                                <option value="<?php echo $marca['id'] ?>"> <?php echo $marca['descricao'] ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                                <p class="link"><a href="<?php echo ROOT ?>os/view-add-outro?acao=marca">Outro</a></p>
                            </label>
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Número de série</b>
                                <input type="text" name="numero_serie" placeholder="Nº série" class="ls-field" required>
                            </label>

                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Modelo</b>
                                <input type="text" name="modelo" placeholder="Modelo" class="ls-field" required>
                            </label>
                        </div>
                        <div class="row">
                            <label class="ls-label col-md-6 col-xs-12">
                                <b class="ls-label-text">Defeito</b>
                                <input type="text" name="defeito" placeholder="Defeito" class="ls-field" required>
                            </label>
                            <label class="ls-label col-md-6 col-xs-12">
                                <b class="ls-label-text">Observações</b>
                                <input type="text" name="observacoes" placeholder="Observações" class="ls-field" required>
                            </label>
                        </div>
                    </fieldset>

                </div>


                <!-- botões  -->
                <div class="ls-actions-btn  ls-float-right">
                    <button class="ls-btn-primary marg">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php include(VIEW . "footer.php") ?>

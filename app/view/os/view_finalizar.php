<?php
$title = "Listar OS - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">
        <!--<a href="<?php echo ROOT ?>os/abrir" class="ls-btn-primary ls-btn-lg botaoFiltrar">Filtrar OS</a>-->
        <h1 class="ls-title-intro">Finalizar os <?= $id ?></h1>


        <form action="<?php echo ROOT ?>os/finalizar/<?= $id ?>" method="POST" class="ls-form ls-form-inline row">

            <div class="ls-box-filter">
                <fieldset>
                    <div class="row">
                        <label class="ls-label col-md-4 marg-left">
                            <b class="ls-label-text">Destino:</b>
                            <div class="ls-login-bg-user ls-field ls-custom-select tamInput">
                                <select name="destino" class="ls-select">
                                    <?php
                                    if (count($destinos) > 0) {
                                        foreach ($destinos as $destino) { //percorrer o array inteiro e a $origem recevbe o valor atual!
                                            ?>
                                            <option value="<?php echo $destino['id'] ?>"> <?php echo $destino['descricao'] ?> </option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </label>
                        <label class="ls-label col-md-4">
                            <b class="ls-label-text">Situação final:</b>
                            <div class="ls-login-bg-user ls-field ls-custom-select tamInput">
                                <select name="situacao_final" class="ls-select">
                                    <?php
                                    if (count($situacoes) > 0) {
                                        foreach ($situacoes as $situacao) { //percorrer o array inteiro e a $origem recevbe o valor atual!
                                            ?>
                                            <option value="<?php echo $situacao['id'] ?>"> <?php echo $situacao['descricao'] ?> </option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </label>

                        <div class="ls-actions-btn  ls-float-right">
                            <button type="submit" class="ls-btn-primary marg">Finalizar</button>
                        </div>


                    </div>
                </fieldset>

            </div>
        </form>

    </div>


</main>


<?php include(VIEW . "footer.php") ?>
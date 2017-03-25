<?php
$title = "Listar OS - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">
        <!--<a href="<?php echo ROOT ?>os/abrir" class="ls-btn-primary ls-btn-lg botaoFiltrar">Filtrar OS</a>-->
        <h1 class="ls-title-intro">Adicionar outro(a) <?= $_GET["acao"] ?></h1>


        <form action="<?php echo ROOT ?>os/add-outro-atributo" method="GET" class="ls-form ls-form-inline row">

            <label class="ls-label col-md-3">

                <input type="text" name="atributo" placeholder="Adicionar" required > <!-- alterar esse nome-->
                <input type="hidden" name="tabela" placeholder="Adicionar" value="<?=$_GET["acao"]?>"> 
            </label>
            <div class="ls-actions-btn">
                <button type="submit" class="ls-btn">Adicionar</button>
            </div>
        </form>

    </div>


</main>


<?php include(VIEW . "footer.php") ?>
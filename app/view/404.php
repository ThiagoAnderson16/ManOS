<?php
$title = "Erro 404 - Página não encontrada - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="ls-box ls-no-bg ls-box-error">
        <h1 class="ls-title-intro ls-ico-close">Página não encontrada</h1>
        <p>A página não foi encontrada.</p>
        <p><strong>Você pode:</strong></p>
        <ol>
            <li>Verificar se digitou corretamente o endereço desejado.</li>
            <li>Retornar à <a href="<?php echo ROOT ?>" class="ls-color-theme">página inicial.</a></li>
        </ol>
    </div>
</main>

<?php include(VIEW . "footer.php") ?>
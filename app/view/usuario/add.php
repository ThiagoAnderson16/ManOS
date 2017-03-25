<?php
$title = "Adicionar usuário - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">

        <?php
        if (isset($_SESSION['DADOS']['ERRO'])) {
            echo '<div class="ls-alert-danger ls-dismissable"> <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>' . $_SESSION['DADOS']['ERRO'] . '</div>';
            unset($_SESSION['DADOS']['ERRO']);
        } else if (isset($_SESSION['DADOS']['INSERIDOS'])) {
            echo '<div class="ls-alert-success ls-dismissable"> <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>' . $_SESSION['DADOS']['INSERIDOS'] . '</div>';
            unset($_SESSION['DADOS']['INSERIDOS']);
        } else if(isset($_SESSION['DADOS']['EXISTENTE'])){
            echo '<div class="ls-alert-danger ls-dismissable"> <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>' . $_SESSION['DADOS']['EXISTENTE'] . '</div>';
            unset($_SESSION['DADOS']['EXISTENTE']);                    
        }
        ?>

        <h1 class="ls-title-intro">Cadastrar Usuário</h1>
        <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
            <form action="<?php echo ROOT ?>usuario/add" method="POST" class="ls-form ls-form-horizontal row">
                <div class="ls-box-filter">
                    <fieldset>
                        <div class="row">
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Tipo</b>
                                <div class="ls-login-bg-user ls-field ls-custom-select tamInput">
                                    <select name="tipo" class="ls-select">
                                        <option value="4">Extencionista</option>
                                        <?php if (Util::permissao(Util::$COORDENADOR)) { ?>
                                            <option value="3">Corpo Gestor</option>
                                        <?php }
                                        if (Util::permissao(Util::$COORDENADOR)) {
                                            ?>
                                            <option value="2">Coordenador</option>
<?php } ?>  
                                    </select>
                                </div>
                            </label>
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Nome</b>
                                <input type="text" name="nome" placeholder="Nome" class="ls-field" required>
                            </label>  
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Matricula</b>
                                <input type="number" name="matricula" placeholder="Matricula" class="ls-field" required>
                            </label>
                        </div>
                        <div class="row">
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">E-mail</b>
                                <input type="email" name="email" placeholder="E-mail" class="ls-field" required>
                            </label>
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Senha</b>
                                <input type="password" name="senha" placeholder="Senha" class="ls-field" required>
                            </label>
                            <label class="ls-label col-md-4 col-xs-12">
                                <b class="ls-label-text">Confirmar senha</b>
                                <input type="password" name="confirma_senha" placeholder="Confirmar senha" class="ls-field" required>
                            </label>
                        </div>
                    </fieldset>

                </div>


                <!-- botões  -->
                <div class="ls-actions-btn  ls-float-right">
                    <button class="ls-btn-primary marg" name="salvar">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</main>



<?php include(VIEW . "footer.php") ?>
<?php
$title = "Editar usuário - ManOS";
include(VIEW . "header.php")
?>

<main class="ls-main ">
    <div class="container-fluid">
        
         <?php
        if (isset($_SESSION['SENHA']['ERRO'])) {
            echo '<div class="ls-alert-danger ls-dismissable"> <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>' . $_SESSION['SENHA']['ERRO'] . '</div>';
            unset($_SESSION['SENHA']['ERRO']);
        } else if(isset($_SESSION['SENHA']['TROCADA'])){
            echo '<div class="ls-alert-success ls-dismissable"> <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>' . $_SESSION['SENHA']['TROCADA'] . '</div>';
            unset($_SESSION['SENHA']['TROCADA']);
        }
        ?>
        
        <h1 class="ls-title-intro">Editar dados pessoais</h1>
        <!-- <form action="" class="ls-form ls-form-horizontal ls-form-text" data-ls-module="form">    -->
        <label class="ls-label col-md-3 ls-form ls-form-horizontal ls-form-text">
            <!-- <input type="text" name="nome" placeholder="GERAR ORDEM DE SERVIÇO (PODE SER EDITÁVEL)" class="ls-field" required> -->
        </label>
        <div class="ls-box ls-board-box"> <!-- Essa div centraliza as coisas -->
            <form action="<?php echo ROOT ?>usuario/update" method="POST" class="ls-form ls-form-horizontal row">
                <input type="hidden" value="<?php echo $matricula ?>" name="matricula">
                <div class="ls-box-filter">
                    <fieldset>
                        <label class="ls-label col-md-4 col-xs-10">
                            <b class="ls-label-text">Grupo</b>
                            <?php
                            if (count($papeis) > 0) {
                                foreach ($papeis as $papel) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                                    if ($usuario['papel_id'] == $papel['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                                        ?>
                                        <input type="text" name="matricula" value="<?php echo $papel['descricao'] ?>" class="ls-field" required disabled>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            
                        </label>
                        <label class="ls-label col-md-4 col-xs-10">
                            <b class="ls-label-text">Nome</b>
                            <input type="text" name="nome" placeholder="Nome" value="<?php echo $usuario['nome'] ?>" class="ls-field" required>
                        </label>
                        <label class="ls-label col-md-4 col-xs-10">
                            <b class="ls-label-text">E-mail</b>
                            <input type="email" name="email" placeholder="Nome" value="<?php echo $usuario['email'] ?>" class="ls-field" required>
                        </label>
                        <label class="ls-label col-md-4 col-xs-10">
                            <b class="ls-label-text">Matrícula</b>
                            <input type="number" name="matricula" placeholder="Matrícula" value="<?php echo $usuario['matricula'] ?>" class="ls-field" required disabled>
                        </label>
                        <label class="ls-label col-md-4 col-xs-10">
                            <b class="ls-label-text">Digite a senha atual (nova senha, se quiser alterar)</b>
                            <input type="password" name="senha" placeholder="Nova senha" class="ls-field" required>
                        </label>
                        <label class="ls-label col-md-4 col-xs-10">
                            <b class="ls-label-text">Repita a senha atual (a nova senha, se quiser alterar)</b>
                            <input type="password" name="nova_senha" placeholder="Repita a nova senha" class="ls-field" required>
                        </label>
                    </fieldset>

                    <div class="ls-actions-btn  ls-float-right">
                        <button class="ls-btn-primary marg">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>

<?php include(VIEW . "footer.php") ?>
<?php
$title = "Pesquisar OS - ManOS";
include(VIEW . "header.php")
?>

<script type="text/javascript">
window.onload = function(){
	javascript:self.print();
}
</script>

<main class="ls-main ">
    <div class="container-fluid">

                <!--<a href="<?php echo ROOT ?>os/abrir" class="ls-btn-primary ls-btn-lg botaoFiltrar">Filtrar OS</a>-->
        <h1 class="ls-title-intro">Dados da OS: <?php echo $os['numero_os'] ?></h1>


        <?php
        if (count($os) > 0) {

            /*
              $resp_equipamento = ''; //inicializando a variável;

              if (count($equipamentos) > 0) {
              foreach ($equipamentos as $equipamento_filtro) {//percorrer o array inteiro e a $origem recevbe o valor atual!
              if ($palavra_filtro == $equipamento_filtro['descricao']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
              $resp_equipamento = $equipamento_filtro['id'];
              }
              }
              } */


            //filtrando por numero_os, modelo e defeito
            ?>



            <table width="100%" class="ls-table ls-no-hover ls-table-striped">
                <tr>
                    <td class="hidden-xs">    
                        <span class="ls-list-label">Equipamento:</span>
                        <?php
                        if (count($equipamentos) > 0) {
                            foreach ($equipamentos as $equipamento) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                                if ($os['equipamento_id'] == $equipamento['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                                    ?>
                                    <?php echo $equipamento['descricao'] ?>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </td>
                    <td class="hidden-xs">
                        <span class="ls-list-label">Data de cadastro:</span>
                        <?php
                        //DATA:
                        $apenasData = explode(" ", $os['data_cadastro']);
                        $dt_novaData = explode("-", $apenasData[0]);
                        $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];

                        echo $dt_final . " as " . $apenasData[1];
                        ?>
                    </td>
                    <td class="hidden-xs">
                        <span class="ls-list-label">Útima modificação:</span>
                        <?php
                        $apenasData = explode(" ", $os['ultima_modificacao']);
                        $dt_novaData = explode("-", $apenasData[0]);
                        $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];
                        echo $dt_final;
                        ?>
                    </td>
                    <td class="hidden-xs">
                        <span class="ls-list-label">Status:</span>
                        <?php echo $os->os_status['descricao'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="hidden-xs">
                        <span class="ls-list-label">Numero de série:</span>
                        <?php echo $os['numero_serie'] ?>
                    </td>
                    <td class="hidden-xs">
                        <span class="ls-list-label">Modelo:</span>
                        <?php echo $os['modelo'] ?>
                    </td>
                    <td class="hidden-xs">
                        <span class="ls-list-label">Defeito:</span>
                        <?php echo $os['defeito'] ?>
                    </td>
                </tr>
            </table>



            <span class="ls-list-label">Observações:</span>
            <?php echo $os['observacoes'] ?>
            <br><br>

            <hr>
            
            <h3>Atividades realizadas</h3>

            <?php
            foreach ($servicos_realizados as $servico_realizado) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                if ($servico_realizado['os_id'] == $os['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                    ?>
                    <table width="100%" class="ls-table ls-no-hover ls-table-striped margem-table">
                        <tr>
                            <td class="hidden-xs"><?php
                                $dt_novaData = explode("-", $servico_realizado['data']);
                                $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];

                                echo $dt_final
                                ?></td>
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


            <hr>

            <h3>Lista de componentes substituidos</h3>

            <?php
            foreach ($componentes_substituidos as $componentes_substituido) {//percorrer o array inteiro e a $origem recevbe o valor atual!
                if ($componentes_substituido['os_id'] == $os['id']) {//verificando o ID da OS e acessando a descrição na tabela do equipamento
                    ?>
                    <table width="100%" class="ls-table ls-no-hover ls-table-striped margem-table">
                        <tr>
                            <td class="hidden-xs"><?php
                                $dt_novaData = explode("-", $componentes_substituido['data']);
                                $dt_final = $dt_novaData[2] . "/" . $dt_novaData[1] . "/" . $dt_novaData[0];

                                echo $dt_final
                                ?></td>
                            <td class="hidden-xs"><?php echo $componentes_substituido['nome'] ?></td>
                            <td class="hidden-xs"><?php echo $componentes_substituido['quantidade'] ?></td>
                        </tr>
                    </table>
                    <?php
                }
            }
            ?>


            <?php
        }
        ?>


    </div>


</main>


<?php include(VIEW . "footer.php") ?>
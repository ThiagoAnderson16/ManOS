<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OS
 *
 * @author xOS
 */
class OS implements Paizao {

    public static function view_add() {

        $db = new NotORM(PDOConfig::getInstance());

        $origens = $db->origem->order("descricao"); //acessa todas as origens cadastradas

        $equipamentos = $db->equipamento->order("descricao");

        $marcas = $db->marca->order("descricao");

        include VIEW . "os/add.php";
    }

    public static function del($id = null) {
        // caso nao seja nulo, irá excluir

        if (!is_null($id)) {
            // método para excluir do banco de dados
            // msg - A exclusão da OS foi realizada com sucesso.
        } else {
            // msg - A OS procurada não encontrada.
        }

        // Flight::redirect(ROOT. '/os');
    }

    public static function view_edit($id = null) {

        if (!is_null($id)) {
            $db = new NotORM(PDOConfig::getInstance());
            $os = $db->os->where("numero_os", $id)->fetch();
            $equipamentos = $db->equipamento;
        }
        include VIEW . "os/edit.php";
    }

    public static function view_add_atividade($num_os = null) {
        if (!is_null($num_os)) {
            $db = new NotORM(PDOConfig::getInstance());
            $os = $db->os->where("numero_os", $num_os)->fetch();
            $servicos_realizados = $db->servicos_realizados;
            /* if($os["id"] != null){
              $servicos = $db->servicos_realizados->where("os_id", $os["id"]);
              } */
        }
        include VIEW . "os/add_atividade.php";
    }

    public static function view_detalhes($num_os = null) {
        if (!is_null($num_os)) {
            $db = new NotORM(PDOConfig::getInstance());
            $os = $db->os->where("numero_os", $num_os)->fetch();
            $equipamentos = $db->equipamento;
            $origens = $db->origem;
            $usuarios = $db->usuario;
            $componentes_substituidos = $db->componentes_substituidos;
            $servicos_realizados = $db->servicos_realizados;
            include VIEW . "os/detalhes.php";
        }
    }

    public static function add_atividade() {

        $db = new NotORM(PDOConfig::getInstance());

        $dt_novaData = explode("/", $_POST["data"]);
        $dt_final = $dt_novaData[2] . "-" . $dt_novaData[1] . "-" . $dt_novaData[0];

        $valores = array(
            "data" => $dt_final,
            "descricao" => $_POST["descricao_atividade"],
            "os_id" => $_POST["id_os"],
            "usuario_id" => $_SESSION['USER']["ID"],
        );

        if ($db->servicos_realizados->insert($valores)) {

            $os = $db->os->where("id", $_POST["id_os"])->fetch();
            $os['ultima_modificacao'] = date("Y-m-d");
            $os['ultima_modificacao_user_id'] = $_SESSION['USER']["ID"];
            $os->update();

            Flight::redirect(ROOT . "os/add-atividade/" . $_POST["numero_os"]);
        }
        //$num_os = $db->os->where("numero_os", $_POST["numero_os"]);                
    }

    public static function view_add_componentes_substituidos($num_os = null) {
        if (!is_null($num_os)) {
            $db = new NotORM(PDOConfig::getInstance());
            $os = $db->os->where("numero_os", $num_os)->fetch();
            $componentes_substituidos = $db->componentes_substituidos;
            //fazer a listagem dos componentes da os
        }
        include VIEW . "os/add_componentes.php";
    }

    public static function add_componentes_substituidos() {
        $db = new NotORM(PDOConfig::getInstance());

        $dt_novaData = explode("/", $_POST["data"]);
        $dt_final = $dt_novaData[2] . "-" . $dt_novaData[1] . "-" . $dt_novaData[0];

        $valores = array(
            "data" => $dt_final,
            "nome" => $_POST["componente"],
            "quantidade" => $_POST["quantidade"],
            "os_id" => $_POST["id_os"],
            "usuario_id" => $_SESSION['USER']['ID'],
                //"servicos_realizados_id"  
        );

        if ($db->componentes_substituidos->insert($valores)) {
            $os = $db->os->where("id", $_POST["id_os"])->fetch();
            $os['ultima_modificacao'] = date("Y-m-d");
            $os->update();

            Flight::redirect(ROOT . "os/add-componentes/" . $_POST["numero_os"]);
        }
    }

    public static function view_finalizada_filtrar() {
        if (Util::permissao(Util::$GESTOR)) {
            include VIEW . "os/finalizada/telaSearch.php";
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function index() {
        $db = new NotORM(PDOConfig::getInstance());
        $list_os = $db->os->where("os_status_id", 1)->order("id DESC")->limit(50);

        if (!isset($_GET['pagina'])) {
            $num_pag = 1;
        } else {
            $num_pag = $_GET['pagina'] - 1; //subtrantindo para começar do 0
        }

        $max_por_pag = 5;
        $qtd_rows = count($list_os);

        $list_os->limit($max_por_pag, ($num_pag * $max_por_pag));

        $equipamentos = $db->equipamento;
        include VIEW . "os/list.php";
    }

    public static function insert($id = null) {
        if (is_null($_POST))
            return false;

        // criar conexao com banco de dados
        $db = new NotORM(PDOConfig::getInstance());
        //populando o banco de dados via array   

        if (isset($_POST["cliente"])) {
            $cliente = $_POST["cliente"];
        } else {
            $cliente = null;
        }

        $valores = array(
            //terá q pegar esses valores por $_POST

            "numero_os" => $_POST["numero_os"],
            "cliente" => $cliente,
            "origem_id" => $_POST["origem"],
            "equipamento_id" => $_POST["equipamento"],
            "numero_serie" => $_POST["numero_serie"],
            "marca_id" => $_POST["marca"],
            "modelo" => $_POST["modelo"],
            "defeito" => $_POST["defeito"],
            "observacoes" => $_POST["observacoes"]
        );

        //Não ta cadastrando
        try {
            if ($db->os->insert($valores)) {
                Flight::redirect(ROOT . "os/list?pagina=1");
            }
        } catch (Exception $ex) {
            include VIEW . "erroSql.php";
        }

        return false;
    }

    public static function update($id = null) {
        
    }

    public static function search() {
        $db = new NotORM(PDOConfig::getInstance());
        $list_os = $db->os->where("os_status_id", 1);
        $equipamentos = $db->equipamento;
        $usuarios = $db->usuario;
        $palavra_filtro = $_POST["palavra_filtro"];
        include VIEW . "os/search.php";
    }

    public static function finalizada_search() {
        $db = new NotORM(PDOConfig::getInstance());
        $list_os = $db->os->where("os_status_id", 2);
        $equipamentos = $db->equipamento;
        $usuarios = $db->usuario;
        $palavra_filtro = $_POST["palavra_filtro_finalizada"];
        $componentes_substituidos = $db->componentes_substituidos;
        $servicos_realizados = $db->servicos_realizados;
        include VIEW . "os/search.php";
    }

    public static function view_finalizada_list() {
        $db = new NotORM(PDOConfig::getInstance());
        $list_os = $db->os->where("os_status_id", 2)->order("id DESC")->limit(50);

        if (!isset($_GET['pagina'])) {
            $num_pag = 1;
        } else {
            $num_pag = $_GET['pagina'] - 1; //subtrantindo para começar do 0
        }

        $max_por_pag = 5;
        $qtd_rows = count($list_os);

        $list_os->limit($max_por_pag, ($num_pag * $max_por_pag));

        $equipamentos = $db->equipamento;
        include VIEW . "os/finalizada/list.php";
    }

    public static function view_finalizar($id = null) {
        $db = new NotORM(PDOConfig::getInstance());

        $destinos = $db->destino->order("descricao"); //acessa todas as origens cadastradas
        $situacoes = $db->situacao_final->order("descricao"); //acessa todas as origens cadastradas

        include VIEW . "os/view_finalizar.php";
    }

    public static function finalizar($id = null) {
        if (!is_null($id)) {
            $db = new NotORM(PDOConfig::getInstance());
            $os = $db->os->where("numero_os", $id)->fetch();
            if (isset($os['id'])) {
                $os->update(array(
                    "os_status_id" => 2,
                    "destino_id" => $_POST["destino"],
                    "situacao_final" => $_POST["situacao_final"]
                ));
                Flight::redirect(ROOT . "os/list?pagina=1");
            }
        }
    }

    public static function view_print($num_os = null) {
        if (!is_null($num_os)) {
            $db = new NotORM(PDOConfig::getInstance());
            $os = $db->os->where("numero_os", $num_os)->fetch();
            $equipamentos = $db->equipamento;
            $componentes_substituidos = $db->componentes_substituidos;
            $servicos_realizados = $db->servicos_realizados;
            include VIEW . "os/print.php";
        }
    }

    public static function view_add_outro_atributo($acao = null) {
        include VIEW . "os/addOutroAtributo.php";
    }

    public static function add_outro_atributo() {
        $db = new NotORM(PDOConfig::getInstance());
        $atributo = $_GET['atributo'];
        if ($_GET['tabela'] == "equipamento") {
            $valor = array(
                "descricao" => $atributo
            );
            $db->equipamento->insert($valor);
        } else if ($_GET['tabela'] == "marca") {
            $valor = array(
                "descricao" => $atributo
            );
            $db->marca->insert($valor);
        } else if ($_GET['tabela'] == "origem") {
            $valor = array(
                "descricao" => $atributo
            );
            $db->origem->insert($valor);
        }
        Flight::redirect(ROOT . "os/add");
    }

}

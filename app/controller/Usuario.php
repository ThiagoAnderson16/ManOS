<?php

/**
 * Description of Usuario
 *
 * @author cesimar
 */
class Usuario implements Paizao {

    //put your code here

    public static function senha() {
        include VIEW . "usuario/senha.php";
    }

    public static function login() {
        $db = new NotORM(PDOConfig::getInstance());

        $objeto = $db->usuario->where("matricula = ?", $_POST['matricula'])->and("senha = ?", sha1($_POST['senha']))->fetch();

        if (isset($objeto['id'])) {
            $_SESSION['USER']['ID'] = $objeto['id'];
            $_SESSION['USER']['NOME'] = $objeto['nome'];
            $_SESSION['USER']['EMAIL'] = $objeto['email'];
            $_SESSION['USER']['MATRICULA'] = $objeto['matricula'];
            $_SESSION['USER']['PAPEL']['ID'] = $objeto->papel['id'];
            $_SESSION['USER']['PAPEL']['NOME'] = $objeto->papel['descricao'];
        } else {

            Util::set_msg("Usuário ou senha não cadastrado", Util::$ERRO);
            //Quando for sucesso utiliza só isso: Util::set_msg();
        }


        Flight::redirect(ROOT);
    }

    public static function painel() {
        include VIEW . "painel.php";
    }

    public static function index() {
        if (Util::permissao(Util::$GESTOR)) {
            // criar conexao com banco de dados
            $db = new NotORM(PDOConfig::getInstance());
            //procurar no banco de dados se existe
            // e retornar apenas uma instancia
            $list = $db->usuario->where(array("bloqueado" => 0, "desativado" => 0));
            include VIEW . "usuario/list.php";
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function view_add() {
        if (Util::permissao(Util::$GESTOR)) {
            include VIEW . "usuario/add.php";
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function view_edit($id = null) {

        $db = new NotORM(PDOConfig::getInstance());
        $usuario = $db->usuario->where("matricula", $id)->fetch();
        $matricula = $id;
        $papeis = $db->papel;
        if (isset($usuario['id'])) {
            include VIEW . "usuario/edit.php";
        }

    }

    /**
     * funcoes para atualização no banco de dados
     */
    public static function del($id = null) {
        if (!is_null($id)) {
            $db = new NotORM(PDOConfig::getInstance());
            $usuario = $db->usuario->where("matricula", $id)->fetch();
            if (isset($usuario['matricula'])) {
                $usuario->update(array("desativado" => 1));
                self::index();
            }
        }
    }

    public static function bloquear($id = null) {

        if (Util::permissao(Util::$COORDENADOR)) {
            if (!is_null($id)) {
                $db = new NotORM(PDOConfig::getInstance());
                $usuario = $db->usuario->where("matricula", $id)->fetch();
                if (isset($usuario['matricula'])) {
                    $usuario->update(array("bloqueado" => 1));
                    self::index();
                }
            }
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function desbloquear($id = null) {

        if (Util::permissao(Util::$COORDENADOR)) {
            if (!is_null($id)) {
                $db = new NotORM(PDOConfig::getInstance());
                $usuario = $db->usuario->where("matricula", $id)->fetch();
                if (isset($usuario['matricula'])) {
                    $usuario->update(array("bloqueado" => 0));
                    self::index();
                }
            }
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function insert() {

        if (Util::permissao(Util::$GESTOR)) {
            if (is_null($_POST))
                return false;

            // criar conexao com banco de dados
            $db = new NotORM(PDOConfig::getInstance());
            //populando o banco de dados via array
            $valores = array(
                //terá q pegar esses valores por $_POST

                "nome" => $_POST["nome"],
                "matricula" => $_POST["matricula"],
                "email" => $_POST["email"],
                "senha" => sha1($_POST["senha"]),
                "papel_id" => $_POST["tipo"]
            );
            
            if($_POST['senha'] != null && $_POST['senha'] == $_POST['confirma_senha']){
                
                try {
                    $db->usuario->insert($valores);
                    $_SESSION['DADOS']['INSERIDOS'] = "Usuário cadastrado com sucesso!";
                    Flight::redirect(ROOT . "usuario/add");
                } catch (Exception $e) {
                    $_SESSION['DADOS']['EXISTENTE'] = "Matrícula ou email existente!";
                    Flight::redirect(ROOT . "usuario/add");
                }
                
            } else {
                $_SESSION['DADOS']['ERRO'] = "Senhas não conferem!";
                Flight::redirect(ROOT . "usuario/add");
            }


            return false;
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function update($matricula = null) {

        $db = new NotORM(PDOConfig::getInstance());
        $objeto = $db->usuario->where("matricula", $_POST['matricula'])->fetch();

        if (isset($objeto['id']) && $_POST['senha'] != null && $_POST['senha'] == $_POST['nova_senha']) {
            $valores = array(
                "nome" => $_POST['nome'],
                "email" => $_POST['email'],
                "senha" => sha1($_POST['senha']),
            );

            $objeto->update($valores);
            $_SESSION['SENHA']['TROCADA'] = "Dados alterado com sucesso!";
            Flight::redirect(ROOT . "usuario/edit/" . $_POST['matricula']);
            //Flight::redirect(ROOT . "sair");

            return true;
        } else {
            $_SESSION['SENHA']['ERRO'] = "Senhas não conferem!";
            Flight::redirect(ROOT . "usuario/edit/" . $_POST['matricula']);
        }
    }

    public static function search($id = null) {
        if (Util::permissao(Util::$GESTOR)) {
            if (is_null($id))
                return false;
            // criar conexao com banco de dados
            $db = new NotORM(PDOConfig::getInstance());
            //procurar no banco de dados se existe
            // e retornar apenas uma instancia
            $objeto = $db->usuario->where("id = ?", $id)->fetch();

            if (isset($objeto['id'])) {
                return $objeto;
            }

            return false;
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

    public static function view_bloqueado() {
        if (Util::permissao(Util::$GESTOR)) {
            $db = new NotORM(PDOConfig::getInstance());
            //procurar no banco de dados se existe
            // e retornar apenas uma instancia
            $list = $db->usuario->where(array("bloqueado" => 1, "desativado" => 0));
            include VIEW . "usuario/bloqueado/list.php";
        } else {
            include VIEW . "acessoNegado.php";
        }
    }

}
				
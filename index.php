<?php
@session_start();
/**
 * Carregando a página de configurações
 */
require './init.php';
/* * *
 * Criando rotas
 * 
 * As rotas servem para direcionar as chamadas vindas do navegador
 * O método abaixo tratar a requisição como sendo via Controller
 * Controller -> Metodo
 *  */

// exemplo de requisição simples    
Flight::route('/', array('Home', 'login'));
Flight::route('/sair', function(){
    unset($_SESSION['USER']['ID']);
    Flight::redirect(ROOT);
});
//rota temporária para login
//Flight::route('/home', array('Home','inicial_para_telas'));
//rota temporária para login
Flight::route('/home', array('OS', 'index'));


//para tela de login:
Flight::route('POST /login', array('Usuario', 'login'));
Flight::route('/erro', array('Home', 'erro'));

//requisição valores via url
Flight::route('/ex/@nome', array('Home', 'imprimir_nome'));

//rotas para os
Flight::route('/os', array('OS', 'index'));
Flight::route('GET /os/add', array('OS', 'view_add'));
Flight::route('POST /os/add', array('OS', 'insert'));
flight::route('/os/edit/@numero_os', array('OS', 'view_edit'));
Flight::route('/os/abrir', array('OS', 'abrir'));
Flight::route('GET /os/imprimir/@numero_os', array('OS', 'view_print'));
Flight::route('GET /os/list', array('OS','index'));
Flight::route('/os/search', array('OS','search'));
Flight::route('GET /os/view-add-outro', array('OS','view_add_outro_atributo'));
Flight::route('GET /os/add-outro-atributo', array('OS','add_outro_atributo'));
Flight::route('/os/finalizar/@numero_os', array('OS','finalizar'));
Flight::route('/os/view-finalizar/@numero_os', array('OS','view_finalizar'));
Flight::route('GET /os/finalizada/list', array('OS', 'view_finalizada_list'));
Flight::route('/os/finalizada/finalizada-filtrar', array('OS', 'view_finalizada_filtrar'));
Flight::route('/os/finalizada/finalizada_search', array('OS','finalizada_search'));
Flight::route('GET /os/detalhes/@numero_os', array('OS', 'view_detalhes'));
Flight::route('GET /os/add-atividade/@numero_os', array('OS', 'view_add_atividade'));
Flight::route('POST /os/add-atividade/', array('OS', 'add_atividade'));
Flight::route('GET /os/add-componentes/@numero_os', array('OS', 'view_add_componentes_substituidos'));
Flight::route('POST /os/add-componentes/', array('OS', 'add_componentes_substituidos'));

Flight::route('GET /usuario/add', array('Usuario','view_add'));
Flight::route('POST /usuario/add', array('Usuario','insert'));
Flight::route('/usuario/list', array('Usuario','index'));
Flight::route('POST /usuario/edit', array('Usuario','view_edit'));
Flight::route('GET /usuario/edit/@user_matricula', array('Usuario','view_edit'));
Flight::route('POST /usuario/update', array('Usuario','update'));

Flight::route('/usuario/senha', array('Usuario','senha'));
Flight::route('/usuario/confirmar_senha', array('Usuario','confirmar_senha'));
Flight::route('/usuario/del', array('Usuario','view_del'));
Flight::route('GET /usuario/desativar/@user_matricula', array('Usuario', 'del'));
Flight::route('GET /usuario/bloquear/@user_matricula', array('Usuario', 'bloquear'));
Flight::route('GET /usuario/desbloquear/@user_matricula', array('Usuario', 'desbloquear'));
Flight::route('/usuario/bloqueado', array('Usuario','view_bloqueado'));




/**
 * Esse método é chamado toda vez que o servidor recebe
 * uma solicitação.
 * Dessa forma é possível verificar por exemplo, se no momento
 * da solicitação o usuário está logado.
 */
Flight::before('start', function(&$params, &$output) {
    /**
     * Criando a verificação de sessão
     * e atribuindo as exceções 
     *      */    
    if (Flight::request()->url != '/' && Flight::request()->url != '/login' && Flight::request()->url != '/recuperar-senha' && Flight::request()->url != '/sair' && !isset($_SESSION['USER']['ID'])) {
        include VIEW . "login.php";
        exit; //interromper o fluxo
    }
     
});

/**
 * Método é disparado toda vez que algum recurso solicitado
 * não for encontrado.
 * Serve para páginas não encontradas ou arquivos solicitados que não 
 * foram achados no servidor.
 */
Flight::map('notFound', function() {
    include VIEW. '404.php';
});


/**
 * Iniciando o framework
 */
Flight::start();

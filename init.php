<?php
/**
 * Carregando o framework
 */
require 'core/flight/Flight.php';
require 'app/controller/Paizao.php';
require 'app/controller/Home.php';
require 'app/controller/OS.php';
require 'app/controller/Usuario.php';
require 'app/controller/Util.php';

/**
 * Pegando os dados do SERVER
 */
$server = $_SERVER['SERVER_NAME'];
/**
 * Endereço do server
 */
$root = "http://$server/";

/**
 * Endereço relativo
 */

$root .= "manos/";

/** na escola: $root .= "webos/";
 * Webos2/webos/
 * Definindo a constante ROOT, link principal
 */
define("ROOT", $root);

/**
 * Constantes internas
 */
//constante para pasta IMG
define("IMG", ROOT . "public/img/");
//constante para pasta CSS
define("CSS", ROOT . "public/css/");
//constante para pasta JS
define("JS", ROOT . "public/js/");
//constante para pasta VIEW
define("VIEW", "app/view/");

/** **************************************************************************
 * Importando lib de banco de dados
 * -------------------------- */

//notORM para consultas
require './lib/notorm/PDOConfig.php';
require './lib/notorm/NotORM.php';
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author cesimar
 */
class Home {

    static function login() {
                    
        if (isset($_SESSION['USER']['ID'])) {
            $db = new NotORM(PDOConfig::getInstance());
            $list_os_abertas = $db->os->where("os_status_id", 1);
            $list_os_finalizadas = $db->os->where("os_status_id", 2);
            include VIEW . "painel.php";
        } else {
            include VIEW . "login.php";
        }
    }
        
    static function imprimir_nome($nome = "") {
        echo "Hello: " . $nome;
    }

}

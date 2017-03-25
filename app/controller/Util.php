<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author 20131044010112
 */
class Util {

    static $DEV = 1;
    static $COORDENADOR = 2;
    static $GESTOR = 3;
    static $EXTENCIONISTA = 4;
    static $SUCESSO = 1;
    static $ERRO = 2;

    /**
     * Medir o nível de permissão do usuário
     * @param int $nivel recebe o nivel de permissão necessário para acessar o recurso
     */
    public static function permissao($nivel) {
        return $_SESSION['USER']['PAPEL']['ID'] <= $nivel ? true : false;
        echo "<script>alert('ok')</script>";
    }
    
    public static function msg(){
        if (isset($_SESSION['MSG'])) {
            echo $_SESSION['MSG'];
            unset($_SESSION['MSG']);
        }
    }
        

    public static function set_msg($msg = "Operação realizada com sucesso.", $tipo = 1) {
        if ($tipo == self::$SUCESSO) {
            $_SESSION['MSG'] = '<div class="ls-alert-danger ls-dismissable">' . $msg . '</div>';
            
        } else if($tipo == self::$ERRO){
            $_SESSION['MSG'] = '<div class="ls-alert-danger ls-dismissable">' . $msg . '</div>';
        }
         
    }

}

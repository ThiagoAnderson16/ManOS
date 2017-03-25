<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe com responsabilidade de definir os métodos obrigatórios
 * a serem implementados
 * @author xOS
 */
interface Paizao {
    //--------------------------------------------
    //métodos de renderização
    //--------------------------------------------
    
    
    /**
     * Visualização de página padrão
     * Requisição GET
     */
    static function index();
    /**
     * Visualização de página de cadastro
     * Requisição GET
     */
    static function view_add();
    /**
     * Visualização de página de edição
     * Requisição GET
     * @param int - id do registro a ser editado
     */
    static function view_edit($id);
    
    //--------------------------------------------
    //métodos de crud
    //--------------------------------------------
    
    
    /**
     * Método para inserir no banco de dados o registro
     * Requisição POST
     */
    static function insert();
    /**
     * Método que atualiza registro no banco de dados
     * Requisição POST
     */
    static function update($id);
    /**
     * Método que excluir registro
     * Requisição GET
     * @param int - id do registro a ser excluido
     */
    static function del($id);
    /**
     * Funcao para procurar um registro no banco de dados
     * @param int - id do registro a ser procurado
     * @return objeto - caso seja encontrado retornará um registro, caso contrario
     * retorna false
     */
    static function search();
}
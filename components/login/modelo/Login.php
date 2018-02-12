<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
class Login{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    public function Login($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        $array = array();
         
        return $array;
    }
}

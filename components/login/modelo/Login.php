<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 * $k = base64_encode(mktime()); 
 * $pass = "c0n7r453n4";
 * echo md5($pass.$k)."::".$k;
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

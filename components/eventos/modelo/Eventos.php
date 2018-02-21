<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
require_once (PATH_SITE."/entidad/Evento.php");
class Eventos{
    /**
     * @type adodb Object
     * @access private
     */
    private $db; 
    
    public function Eventos($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        $array = array(); 
        $array['Eventos'] = Evento::getList();
        
        //d($_SESSION);
        //d($array);
        return $array;
    }
}

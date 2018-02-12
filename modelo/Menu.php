<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
class Menu{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    public function Menu($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        $array = array();
        //require_once (PATH_ROOT.'/vacoef/entidad/Banco.php');
        
        //$Banco = new Banco($this->db);
        //$array['listaBancos'] = $Banco->getListaBancos(100);
        
        return $array;
    }
}

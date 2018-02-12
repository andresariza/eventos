<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
class MainMenu{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    public function MainMenu($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        $array = array();
        
        require_once (PATH_SITE.'/lib/ModMainMenuHelper.php');
        $array['menu'] = ModMainMenuHelper::getMenu($this->db);
        
        /*require_once (PATH_SITE.'/modelo/Menu.php');
        $Modelo = new Menu($this->db);
        $array = $Modelo->getVariables($variables);  /**/
         
        return $array;
    }
}

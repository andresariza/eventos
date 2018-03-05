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
        if(empty($variables->layout) || $variables->layout!=="createEdit"){
            $array['Eventos'] = Evento::getList();
        }else{
            $array['Evento'] = new Evento();
            if(!empty($variables->id)){
                $array['Evento']->setDb();
                $array['Evento']->setId($variables->id);
                $array['Evento']->getById();
            }
        }
        //d($variables);
        return $array;
    }
}

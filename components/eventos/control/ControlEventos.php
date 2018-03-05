<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package control
 */
defined('_EXEC') or die;
require_once (PATH_SITE."/entidad/Evento.php");
class ControlEventos  { 
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    /**
     * @type stdObject
     * @access private
     */
    private $variables;
    
    public function ControlEventos($variables) {
        $this->db = Factory::createDbo();
        $this->variables = $variables; 
    }
    
    public function createEdit(){
        $Evento = new Evento();
        $Evento->setDb();
        $Evento->setName($this->variables->name);
        $Evento->setGionEvento($this->variables->gionEvento);
        $Evento->setFechaEvento($this->variables->fechaEvento);
        $Evento->setStatus($this->variables->status);
        $Evento->save();
        
        echo json_encode(array("s"=>true, "msj"=>"Registro guardado correctamente"));
        exit;
    }
}
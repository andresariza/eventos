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
    public static function printInconEstado($estado, $id){
        $class = '';
        $title = '';
        if($estado == "1"){
            $action = "despublicar";
            $icon = '<span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fa fa-check fa-stack-1x"></i>
                    </span> ';
            $class = "text-success";
            $title = 'Clic para '.$action;
        }elseif($estado == "0"){
            $action = "publicar";
            $icon = '<span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                </span>  ';
            $class = "text-danger";
            $title = 'Clic para '.$action;
        }
        
        $return='<a class="accion '.$class.'" href="#" data-id="'.$id.'" data-action="'.$action.'"  data-toggle="tooltip" title="'.$title.'" >'.$icon.'</a>';
        
        return $return;
    }
    
    public function publicarDespublicar(){
        
        $Evento = new Evento();
        $Evento->setDb(); 
        $Evento->setId($this->variables->id);
        $Evento->getById();
        $nuevoEstado = ($Evento->getStatus()=="1")?"0":"1"; 
        //d($nuevoEstado);
        $Evento->setStatus($nuevoEstado);
        $Evento->save();
        
        $boton = ControlEventos::printInconEstado($nuevoEstado, $this->variables->id);
        //ddd($boton);
        echo json_encode(array("s"=>true, "boton"=>$boton));
        exit();
    }
    
    public static function printInconEditar($id){
        $class = 'text-warning';        
        $action = "editar";
        $icon = '<span class="fa-stack fa-lg">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-pencil fa-stack-1x"></i> 
                </span> ';
        $title = 'Clic para editar';
        
        $return='<a class="accion '.$class.'" href="#" id="edit-icon-'.$id.'" data-id="'.$id.'" data-action="'.$action.'" data-toggle="tooltip" title="'.$title.'" >'.$icon.'</a>';
        
        return $return;
    }
    
    public static function printInconDB($id){
        $class = 'text-warning';        
        $action = "cargarDB";
        $icon = '<span class="fa-stack fa-lg">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-database fa-stack-1x"></i> 
                </span> ';
        $title = 'Clic para ver/cargar DB';
        
        $return='<a class="accion '.$class.'" href="#" id="edit-icon-'.$id.'" data-id="'.$id.'" data-action="'.$action.'" data-toggle="tooltip" title="'.$title.'" >'.$icon.'</a>';
        
        return $return;
    }
}
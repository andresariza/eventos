<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package control
 */
defined('_EXEC') or die;
class ControlEjecucionTareas{
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
    
    /**
     * @type Configuracion Object
     * @access private
     */
    private $Configuracion;
    
    function ControlEjecucionTareas($variables, $Configuracion) {        
        $this->db = Factory::createDbo();
        $this->variables = $variables;
        $this->Configuracion = $Configuracion;
    }
    
    public function execute($action){
        $option = @$this->variables->option;
        //ddd($option);
        if(!empty($option)){
            $controlClass = "Control".ucfirst($option);
            //d(PATH_SITE.'/components/'.$option.'/control/'.$controlClass.'.php');
            if(!empty($action) && is_file(PATH_SITE.'/components/'.$option.'/control/'.$controlClass.'.php')){
                require_once (PATH_SITE.'/components/'.$option.'/control/'.$controlClass.'.php');
                $Control = new $controlClass($this->variables);
                $Control->$action();
            }elseif(!empty($action)){
                $this->$action();
            }
        }elseif(!empty($action)){
            $this->$action();
        }
    }
    
    public function go($option, $layout, $task){
        $return = false;
        if(empty($layout)){
            $layout = 'default';
        }
        $path = null;
        if(!empty($this->variables->json)){
            $this->variables->tmpl = "json";
            $return = true;            
        }
        
        require_once (PATH_SITE.'/modelo/Defecto.php');
        
        $ModeloDefault = new Defecto($this->db);
        
        $arrayTemplate = array();
        $arrayTemplate['tituloSeccion'] = $ModeloDefault->getTituloSeccion($option);
        
        $arrayTemplate['breadCrumb'] = Factory::getBreadCrumbs($option,$this->variables);
        
        $array = array();
        $array = $ModeloDefault->getVariables($this->variables);
        $array['task'] = $task;
        $array['option'] = $option;
        $array['variables'] = $this->variables; 
        
        $arrayTemplate = array_merge($arrayTemplate,$array);
        
        $arrayTemplate['component'] = null;
        
        if(!empty($option)){ 
            //d($option);
            $modeloClass = ucfirst($option);
            if(!is_file(PATH_SITE.'/components/'.$option.'/modelo/'.$modeloClass.'.php')){
                $modeloClass = "Defecto";
            }
            require_once (PATH_SITE.'/components/'.$option.'/modelo/'.$modeloClass.'.php');
            
            $Modelo = new $modeloClass($this->db);
        
            $array = array();
            $array['task'] = $task;
            $array['variables'] = $this->variables;
            
            $variablesModelo = $Modelo->getVariables($this->variables);
            
            $array = array_merge($array,$variablesModelo); 
            
            $controlClass = "Control".ucfirst($option);
            if(is_file(PATH_SITE.'/components/'.$option.'/control/'.$controlClass.'.php')){
                require_once (PATH_SITE.'/components/'.$option.'/control/'.$controlClass.'.php');

                $Control = new $controlClass($this->variables);
                if(!empty($task)){
                    $Control->$task();
                }
            }
            if(!empty($this->variables->layout) && $layout!=$this->variables->layout){
                $layout = $this->variables->layout;
            }
            //d($layout);
            $componentRender = Factory::getRenderInstance();
            $arrayTemplate['component'] = $componentRender->render($layout,"/components/".$option,$array, true);
            
        }
        
        $template = $this->Configuracion->getTemplate();
        if(empty($this->variables->tmpl)){
            $layout = "default";
        }else{
            $layout = $this->variables->tmpl;
        }
        $controlRender = Factory::getRenderInstance();
        $template = $controlRender->render($template."/".$layout,$path,$arrayTemplate, $return);
        if(!empty($this->variables->json)){
            echo json_encode(array('s'=>true,'msj'=>$template));
            exit(); 
        }
    }
    
    public function validarNombreCarrera(){
        require_once (PATH_SITE."/entidad/Carrera.php");
        
        $response = array("s"=>false);
        $idCarrera = Factory::getSessionVar('codigofacultad');
        if($this->variables->idCarrera != $idCarrera){
            $Carrera = new Carrera();
            $Carrera->setDb();
            $Carrera->setCodigocarrera($idCarrera);
            $Carrera->getByCodigo();
            
            $response["s"] = true;
            $response["idCarrera"] = $Carrera->getCodigocarrera();
            $response["nombreCarrera"] = $Carrera->getNombrecarrera();            
        }
        echo json_encode($response);
    }
     
}
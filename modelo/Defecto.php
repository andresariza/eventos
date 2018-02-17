<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
require_once(PATH_SITE."/entidad/ModulosMenu.php");
class Defecto{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    public function Defecto($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        $array = array();
        $renderModulos = $this->getRenderModulos($variables);
        if(!empty($renderModulos)){
            $array = array_merge($array,$renderModulos);
        }
        return $array;
    }
    
    public function getTituloSeccion($option){
        if($option=="dashBoard"){
            return "Dashboard";
        }
    }
    
    public function getRenderModulos($variables){
        $arrayTemplate = array();
        $array = array();
        $option = $variables->option;
        $task = @$variables->task;
        $array['variables'] = $variables;
        
        $array['task'] = $task;
        $array['option'] = $option;
        
        $modeloRender = Factory::getRenderInstance();
        
        $ModulosMenu = ModulosMenu::getListModulosMenu(0,$variables->itemId);
        if(!empty($ModulosMenu)){
            foreach($ModulosMenu as $m){
                //d($m);
                $moduloName = $m->getModulo();
                $modeloClass = ucfirst($moduloName);
                if(!is_file(PATH_SITE.'/components/'.$moduloName.'/modelo/'.$modeloClass.'.php')){
                    $modeloClass = "Defecto";
                }
                require_once (PATH_SITE.'/components/'.$moduloName.'/modelo/'.$modeloClass.'.php');

                $Modelo = new $modeloClass($this->db);
                $variablesModelo = $Modelo->getVariables($variables);
                $array1 = array_merge($array,$variablesModelo);
                
                $arrayTemplate[$moduloName] = $modeloRender->render('default',"/components/".$moduloName,$array1, true);
                unset($array1,$variablesModelo,$Modelo);/**/
            }
        }
        return $arrayTemplate;
    }
}

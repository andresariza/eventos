<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package control
 */
defined('_EXEC') or die;
require_once(PATH_SITE.'/control/ControlMenu.php');
class ControlMainMenu extends ControlMenu { 
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
    
    public function ControlMainMenu($variables) {
        parent::setDb(Factory::createDbo());
        $this->db = Factory::createDbo();
        $usuario= Factory::getSessionVar('MM_Username');
        parent::setUsuario($usuario);
        parent::setQueryBase();
        $this->variables = $variables; 
    }
    
    public function getTituloSeccion(){
         
        $return = array();
        $return['s'] = false;
        $menuId = $this->variables->menuId;
        $menuId = explode("_",$menuId);
        $menuId = @$menuId[1];
        
        if((!empty($menuId) || $menuId=="0") && is_numeric($menuId) ){
            $menu = parent::getCurrentMenu($menuId); 
            $breadCrumbs = Factory::renderBreadCrumbs($menu);
            $currentTitle = Factory::getCurrenTitle($menu);
            $return['s'] = true;
            $return['breadCrumbs'] = $breadCrumbs;
            $return['title'] = $currentTitle;
        }
        
        echo json_encode($return);
        exit();
    }
    
    public function buscarMenu(){
        $textoBusqueda = $this->variables->textoBusqueda;
        $query = $this->queryBase;
        if(!empty($textoBusqueda)){
                $query .="
                   AND (mu.nombremenuopcion LIKE '%".$textoBusqueda."%') 
                   AND mu.linkmenuopcion <> '' ";

        }
        $query .="
          GROUP BY mu.idmenuopcion
          ORDER BY mu.codigotipomenuopcion, mu.idpadremenuopcion, mu.posicionmenuopcion, mu.nombremenuopcion
        ";
        //d($query);
        $datos = $this->db->Execute($query);
        while($d = $datos->fetchRow()){
            echo $d["id"]."###".$d["text"]."|";
	}
        exit();
    }
}
<?php
/**
 * Clase encargada del control de procesos globales relacionados con el menu
 * @author Andres Ariza <arizaandres@unbosque.edu.do>
 * @copyright Universidad el Bosque - Dirección de Tecnología
 * @since January 2, 2017
 * @package Menu
*/
defined('_EXEC') or die;
require_once(PATH_SITE."/entidad/Menu.php");
class ControlMenu{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    /**
     * @type String
     * @access private
     */
    private $textoBusqueda;

    /**
     * @type Array
     * @access private
     */
    private $menu;
    
    function ControlMenu($db) {
        $this->db = $db;
    }
    
    public function setDb($db) {
        $this->db = $db;
    }
    
    /**
     * Consulta las y retorna el listado items de menu relacionados a un id padre 
     * @access public
     * @param Int $parent_id
     * @param String $textoBusqueda
     * @return Array <menu>
     * @author Andres Alberto Ariza <arizaandres@unbosque.edu.do>
     * @since January 3, 2017
    */
    public function getMenu($parent_id=0, $textoBusqueda=null) {		
        $query = "SELECT m.id mid, mp.id mpid "
                . " FROM menu m "
                . " INNER JOIN menuPerfil mp ON (m.id = mp.idMenu) "
                . " WHERE m.idParent = ".$this->db->qstr($parent_id)
                . " ORDER BY m.order";

        if(!empty($textoBusqueda)){
                $query .=" AND (m.name LIKE '%".$textoBusqueda."%') ";
        }
        //ddd($query);
        $datos = $this->db->Execute($query);
        //d($query);
        $nRows = $datos->NumRows(); 
        //$db->setQuery($query);
        $this->menu = $datos;
        //var_dump($menu );
        $temp=array();
        while($d = $datos->FetchRow()){
            $Menu = new Menu();
            $Menu->setDb();
            $Menu->setId($d["mid"]);
            $Menu->getById();
            $status = $Menu->getStatus();
            if($status == 1){
                $m = new stdClass();
                $m->text = $Menu->getName();
                $m->link = $Menu->getLink();
                $m->id = $Menu->getId();
                
                $temp[] = $m;
            }
            unset($Menu);
        }
        $this->menu = $temp;
        unset( $temp );
        //var_dump($menu );
        $temp=array();
        foreach($this->menu as $m){
            $m->child = $this->getMenu($m->id, $textoBusqueda);
            $temp[] = $m;
        }

        $this->menu =  $temp;
        unset( $temp );

        if( empty($this->menu) ){
                return null;
        }else{
                return ($this->menu);
        } 
    }
    
    
	
    /**
     * Estructura el html de los items del menu
     * @access public
     * @param Array $menu
	 * @param Boolean $child
     * @return Array <menu>
     * @author Andres Alberto Ariza <arizaandres@unbosque.edu.do>
     * @since January 3, 2017
    */
    public function printMenuItem( $menu, $child=false ){
        //d($menu);
    	$uriBase=HTTP_ROOT;
    	if(!empty($menu->fa_icon)){
            $icon = $menu->fa_icon;
    	}else{
            $icon = 'fa-archive';
            if($child){
                    $icon="fa-clone";
            } 
    	}
    	
    	if($child){
            $menu->text = mb_strtolower($menu->text,"UTF-8");
    	}else{
            $menu->text = strtoupper($menu->text);
    	}
    	//ddd($menu);
    	/*$link = $menu->link;
    	$reliframe = ' rel="" ';
    	if(empty($link)){
    		$link = "#";
    	}else{
            $link = $uriBase.'/serviciosacademicos/consulta/facultades/'.$link;
            $t = explode('../',$link);

            if(count($t)>0){
                $reliframe = ' rel="iframe" ';
            }
    	}/**/
        $link = $menu->linkAbsoluto;
        $t = explode("/",$link);
    	$reliframe = ' rel="" ';
    	if(empty($link)||($link=="#")){
    		$link = "#";
    	}else{
            $link = $uriBase.'/'.$link; 

            if($t[0]=="sala"){
                $reliframe = ' rel="" ';
            }else{
                $reliframe = ' rel="iframe" ';
            }
    	}
		
    	$li = '
				<li >
					<a href="'.$link.'" id="menuId_'.$menu->id.'" class="menuItem" '.$reliframe.'>';
					
		if(!$child){
    		$li .= '
						<i class="fa '.$icon.'"></i>';
		}
		
    	$li .= '
						<span class="menu-title">
							<strong>'.ucwords($menu->text).'</strong>
						</span>
			';
		if(!empty($menu->child)){
			$li.='
						<i class="arrow"></i>
					</a>
					<!--Submenu-->
					<ul class="collapse" aria-expanded="true" style="">
				';
			foreach($menu->child as $c){
				$li.= $this->printMenuItem( $c , true);
			}
			$li.='
					</ul>
				';
						
		}else{
			$li.='
					</a>
				';
			
		}
		$li.='
		
				</li>
			';
		//if(!empty($menu->child)){
			$li.='
			<li class="list-divider"></li>
				';
			
		//}
		return $li;
    }
    /**
     * Consulta las y retorna el listado items de menu padres relacionados a un id
     * @access public
     * @param Int $id
     * @return Array <menu>
     * @author Andres Alberto Ariza <arizaandres@unbosque.edu.do>
     * @since January 3, 2017
    */
    public function getCurrentMenu($id=0, $child = null) {
        $m = new stdClass();
        if($id>0){
            $query = $this->queryBase;

            if(!empty($id)){
                    $query .="
                       AND mu.idmenuopcion = ".$id;
            }

            $query .="
              GROUP BY mu.idmenuopcion
              ORDER BY mu.codigotipomenuopcion, mu.idpadremenuopcion, mu.posicionmenuopcion, mu.nombremenuopcion
            ";

            $datos = $this->db->Execute($query);
            //d($query);
            //$db->setQuery($query);
            //$this->menu = $datos;
            $temp=array();
            $d = $datos->FetchRow();
            //d($d);
            if(!empty($d)){
                foreach($d as $k=>$v){
                    if(!is_numeric($k)){
                        $m->$k = $v;
                    }
                }
                $m->child = $child;
            }
            //d($m);
            return $this->getCurrentMenu(@$m->parent_id, $m);
            
        }else{
            $m->id = 0;
            $m->parent_id = null;
            $m->text = "Inicio";
            $m->link = HTTP_SITE;
            $m->linkAbsoluto = "sala/index.php";
            $m->child = $child;
            return $m;
        }
    }
 }
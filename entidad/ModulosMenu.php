<?php
/**
 * @author Andres Ariza <arizaandres@unbosque.edu.do>
 * @copyright Universidad el Bosque - Dirección de Tecnología
 * @package entidad
 * `id`  int(11) NOT NULL AUTO_INCREMENT ,
 * `itemId`  int(11) NULL DEFAULT 0 ,
 * `modulo`  varchar(255) NULL ,
 * `estado`  int(3) NULL DEFAULT 0 ,
*/
defined('_EXEC') or die;
class ModulosMenu{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    /**
     * @type int
     * @access private
     */
    private $id;
    
    /**
     * @type int
     * @access private
     */
    private $itemId;
    
    /**
     * @type int
     * @access private
     */
    private $modulo;
    
    /**
     * @type int
     * @access private
     */
    private $estado;
    
    public function ModulosMenu(){}
    
    public function setDb(){
        $this->db = Factory::createDbo();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getItemId() {
        return $this->itemId;
    }

    public function getModulo() {
        return $this->modulo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setItemId($itemId) {
        $this->itemId = $itemId;
    }

    public function setModulo($modulo) {
        $this->modulo = $modulo;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getById(){
        
        if(!empty($this->id)){
            $query = "SELECT * FROM ModulosMenu "
                    ." WHERE id = ".$this->db->qstr($this->id);
            
            $datos = $this->db->Execute($query);
            $d = $datos->FetchRow();
            
            if(!empty($d)){
                $this->itemId = $d['itemId'];
                $this->modulo = $d['modulo'];
                $this->estado = $d['estado'];
            }
        }
    }
    
    public function saveModulosMenu(){
        $query = "";
        $where = array();
        
        if(empty($this->id)){
            $query .= "INSERT INTO ";
        }else{
            $query .= "UPDATE ";
            $where[] = " id = ".$this->db->qstr($this->id);
        }
        
        $query .= " ModulosMenu SET "
               . " itemId = ".$this->db->qstr($this->itemId).", "
               . " modulo = ".$this->db->qstr($this->modulo).", "
               . " estado = ".$this->db->qstr($this->estado);
        
        if(!empty($where)){
            $query .= " WHERE ".implode(" AND ",$where);
        }
        //d($query);
        $rs = $this->db->Execute($query);
        
        if(empty($this->id)){
            $this->id = $this->db->insert_Id();
        }
        
        if(!$rs){
            return false;
        }else{
            return true;
        }
    }
    
    public static function getListModulosMenu(){
        $option = @$_REQUEST['option'];
        //ddd($option);
        $return = array();
        if($option!="login"){
            $db = Factory::createDbo();
            $where = array();
            $where[] = " estado = ".$db->qstr(1);

            $args = func_get_args();
            if(!empty($args)){
                $where[] = " itemId IN (".implode(", ", $args).") ";
            }

            $query = "SELECT * "
                    . " FROM ModulosMenu";

            if(!empty($where)){
                $query .= " WHERE ".implode(" AND ", $where);
            }
            
            $datos = $db->Execute($query);
            while($d = $datos->FetchRow()){
                $ModulosMenu = new ModulosMenu();
                $ModulosMenu->id = $d['id'];
                $ModulosMenu->itemId = $d['itemId'];
                $ModulosMenu->modulo = $d['modulo'];
                $ModulosMenu->estado = $d['estado'];
                $return[] = $ModulosMenu;
                unset($ModulosMenu);
            }
        }
        //ddd($return);
        return $return;
    }
}
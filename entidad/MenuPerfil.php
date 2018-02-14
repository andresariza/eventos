<?php
/**
 * @author Andres Ariza <arizaandres@unbosque.edu.do>
 * @copyright Universidad el Bosque - Dirección de Tecnología
 * @package entidad
*/
defined('_EXEC') or die;
class MenuPerfil{
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
    private $idMenu;
    
    /**
     * @type int
     * @access private
     */
    private $idPerfil;

    /**
     * @type int
     * @access private
     */
    private $status;
    
    public function MenuPerfil() {
    }
    
    public function setDb(){
        $this->db = Factory::createDbo();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdMenu() {
        return $this->idMenu;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    
    public function getById(){
        if(!empty($this->id)){
            $query = "SELECT * FROM menuPerfil "
                    . "WHERE id = ".$this->db->qstr($this->id);
            
            $datos = $this->db->Execute($query);
            $d = $datos->FetchRow();
            
            if(!empty($d)){
                $this->idMenu = $d['idMenu'];
                $this->idPerfil = $d['idPerfil'];
                $this->status = $d['status'];
            }
        }
    }
    
    public function save(){
        $query = "";
        $where = array();
        
        if(empty($this->idmenuopcion)){
            $query .= "INSERT INTO ";
        }else{
            $query .= "UPDATE ";
            $where[] = " id = ".$this->db->qstr($this->id);
        }
        
        $query .= " menu SET "
               . " idMenu = ".$this->db->qstr($this->idMenu).", "
               . " idPerfil = ".$this->db->qstr($this->idPerfil).", "
               . " status = ".$this->db->qstr($this->status);
        
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
    
    public static function getList($where = null, $order=null){
        $db = Factory::createDbo();
        
        $return = array();
        
        $query = "SELECT * "
                . " FROM menu "
                . " WHERE 1 ";
        if(!empty($where)){
            $query .= " AND ".$where;
        }
        if(!empty($order)){
            $query .= " ORDER BY ".$order;
        }
        $datos = $db->Execute($query);
        while($d = $datos->FetchRow()){
            $MenuPerfil = new MenuPerfil();
            $MenuPerfil->id = $d['id'];
            $MenuPerfil->idParent = $d['idMenu'];
            $MenuPerfil->name = $d['idPerfil'];
            $MenuPerfil->status = $d['status'];
            $return[] = $MenuPerfil;
            unset($MenuPerfil);
        }
        return $return;
    } 
}
/*/
id	int
idMenu	int
idPerfil	int
status	int
/**/
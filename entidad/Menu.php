<?php
/**
 * @author Andres Ariza <arizaandres@unbosque.edu.do>
 * @copyright Universidad el Bosque - Dirección de Tecnología
 * @package entidad
*/
defined('_EXEC') or die;
class Menu{
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
    private $idParent;
    
    /**
     * @type varchar
     * @access private
     */
    private $name;
    
    /**
     * @type varchar
     * @access private
     */
    private $link;
    
    /**
     * @type varchar
     * @access private
     */
    private $dataRel;
    
    /**
     * @type int
     * @access private
     */
    private $order;
    
    /**
     * @type int
     * @access private
     */
    private $status;
    
    public function Menu() {
    }
    
    public function setDb(){
        $this->db = Factory::createDbo();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdParent() {
        return $this->idParent;
    }

    public function getName() {
        return $this->name;
    }

    public function getLink() {
        return $this->link;
    }

    public function getDataRel() {
        return $this->dataRel;
    }

    public function getOrder() {
        return $this->order;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdParent($idParent) {
        $this->idParent = $idParent;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function setDataRel($dataRel) {
        $this->dataRel = $dataRel;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getById(){
        if(!empty($this->id)){
            $query = "SELECT * FROM Menu "
                    . "WHERE id = ".$this->db->qstr($this->id);
            
            $datos = $this->db->Execute($query);
            $d = $datos->FetchRow();
            
            if(!empty($d)){
                $this->idParent = $d['idParent'];
                $this->name = $d['name'];
                $this->link = $d['link'];
                $this->dataRel = $d['dataRel'];
                $this->order = $d['order'];
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
        
        $query .= " Menu SET "
               . " idParent = ".$this->db->qstr($this->idParent).", "
               . " name = ".$this->db->qstr($this->name).", "
               . " link = ".$this->db->qstr($this->link).", "
               . " dataRel = ".$this->db->qstr($this->dataRel).", "
               . " order = ".$this->db->qstr($this->order).", "
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
                . " FROM Menu "
                . " WHERE 1 ";
        if(!empty($where)){
            $query .= " AND ".$where;
        }
        if(!empty($order)){
            $query .= " ORDER BY ".$order;
        }
        $datos = $db->Execute($query);
        while($d = $datos->FetchRow()){
            $MenuOpcion = new Menu();
            $MenuOpcion->id = $d['id'];
            $MenuOpcion->idParent = $d['idParent'];
            $MenuOpcion->name = $d['name'];
            $MenuOpcion->link = $d['link'];
            $MenuOpcion->dataRel = $d['dataRel'];
            $MenuOpcion->order = $d['order'];
            $MenuOpcion->status = $d['status'];
            $return[] = $MenuOpcion;
            unset($MenuOpcion);
        }
        return $return;
    } 
}
/*/
id	int
idParent	int
name	varchar
link	varchar
dataRel	varchar
order	int
status	int
/**/
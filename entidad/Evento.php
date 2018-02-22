<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package entidad
 */ 
defined('_EXEC') or die;
class Evento{
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
     * @type varchar
     * @access private
     */
    private $name;
    
    /**
     * @type text
     * @access private
     */
    private $gionEvento	;
    
    /**
     * @type varchar
     * @access private
     */
    private $imagePath;
    
    /**
     * @type date
     * @access private
     */
    private $fechaEvento;
    
    /**
     * @type int
     * @access private
     */
    private $status;
     
    public function Evento(){
    } 
    
    public function setDb(){
        $this->db = Factory::createDbo();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getGionEvento() {
        return $this->gionEvento;
    }

    public function getImagePath() {
        return $this->imagePath;
    }

    public function getFechaEvento() {
        return $this->fechaEvento;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setGionEvento($gionEvento) {
        $this->gionEvento = $gionEvento;
    }

    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }

    public function setFechaEvento($fechaEvento) {
        $this->fechaEvento = $fechaEvento;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getById(){
        if(!empty($this->id)){
            $query = "SELECT * "
                    . "FROM Evento "
                    . "WHERE id = ".$this->db->qstr($this->id);
            $datos = $this->db->Execute($query);
            //ddd($query);
            if(!empty($datos)){
                $d = $datos->FetchRow();
                
                $this->name = $d['name'];
                $this->gionEvento = $d['gionEvento'];
                $this->imagePath = $d['imagePath'];
                $this->fechaEvento = $d['fechaEvento'];
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
        
        $query .= " Evento SET "
               . " name = ".$this->db->qstr($this->name).", "
               . " gionEvento = ".$this->db->qstr($this->gionEvento).", "
               . " imagePath = ".$this->db->qstr($this->imagePath).", "
               . " fechaEvento = ".$this->db->qstr($this->fechaEvento).", " 
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
                . " FROM Evento "
                . " WHERE 1 ";
        if(!empty($where)){
            $query .= " AND ".$where;
        }
        if(!empty($order)){
            $query .= " ORDER BY ".$order;
        }
        //d($query);
        $datos = $db->Execute($query);
        while($d = $datos->FetchRow()){
            $Evento = new Evento();
            $Evento->id = $d['id'];
            $Evento->name = $d['name'];
            $Evento->gionEvento = $d['gionEvento'];
            $Evento->imagePath = $d['imagePath'];
            $Evento->fechaEvento = $d['fechaEvento'];
            $Evento->status = $d['status'];
            $return[] = $Evento;
            unset($Evento);
        }
        return $return;
    } 
}

/*/
id	int
name	varchar
gionEvento	text
imagePath	varchar
fechaEvento	date
status	int
/**/
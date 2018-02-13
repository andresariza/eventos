<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package entidad
 */ 
defined('_EXEC') or die;
class Perfil{
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
     * @type varchar
     * @access private
     */
    private $description;
    
    /**
     * @type int
     * @access private
     */
    private $status;

     
    public function Perfil(){
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

    public function getDescription() {
        return $this->description;
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

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getById(){
        if(!empty($this->id)){
            $query = "SELECT * "
                    . "FROM Perfil "
                    . "WHERE id = ".$this->db->qstr($this->id);
            $datos = $this->db->Execute($query);
            //ddd($query);
            if(!empty($datos)){
                $d = $datos->FetchRow();
                
                $this->name = $d['name'];
                $this->description = $d['description'];
                $this->status = $d['status'];
            }
        }
    }

    public static function getList($where = null){
        $return = array();
        $db = Factory::createDbo();
        
        $query = "SELECT * "
                . "FROM Perfil "
                . "WHERE 1 ";
        if(!empty($where)){
            $query .= " AND ".$where;
        }
        
        $datos = $db->Execute($query);
        //ddd($query);
        while($d = $datos->FetchRow()){
            $Perfil = new Perfil();
            $Perfil->id = $d['id'];
            $Perfil->name = $d['name'];
            $Perfil->description = $d['description'];
            $Perfil->status = $d['status'];
            $return[] = $Perfil;
            unset($Perfil);
        }
        
        return $return;
    }
}
/*/
id	int
name	varchar
description	varchar
status	int
/**/
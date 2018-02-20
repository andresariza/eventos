<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package entidad
 */ 
defined('_EXEC') or die;
class Usuario{
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
    private $user;
    
    /**
     * @type varchar
     * @access private
     */
    private $password;
    
    /**
     * @type varchar
     * @access private
     */
    private $name;
    
    /**
     * @type varchar
     * @access private
     */
    private $email;
    
    /**
     * @type int
     * @access private
     */
    private $status;
     
    public function Usuario(){
    } 
    
    public function setDb(){
        $this->db = Factory::createDbo();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getById(){
        if(!empty($this->id)){
            $query = "SELECT * "
                    . "FROM User "
                    . "WHERE id = ".$this->db->qstr($this->id);
            $datos = $this->db->Execute($query);
            //ddd($query);
            if(!empty($datos)){
                $d = $datos->FetchRow();
                
                $this->user = $d['user'];
                $this->password = $d['password'];
                $this->name = $d['name'];
                $this->email = $d['email'];
                $this->status = $d['status'];
            }
        }
    }

    public function getByUser(){
        if(!empty($this->user)){
            $query = "SELECT * "
                    . "FROM User "
                    . "WHERE user = ".$this->db->qstr($this->user);
            $datos = $this->db->Execute($query);
            //ddd($query);
            if(!empty($datos)){
                $d = $datos->FetchRow();
                
                $this->id = $d['id'];
                $this->password = $d['password'];
                $this->name = $d['name'];
                $this->email = $d['email'];
                $this->status = $d['status'];
            }
        }
    }
    
    public function validatePassword($pswd){
        if(!empty($this->password)){
            $t = explode("::",$this->password);
            $md5Pass = $t[0];
            $key = $t[1];
            
            $validate = md5($pswd.$key);
            return ($md5Pass===$validate);
        }else{
            return false;
        }
    }
 }
 /*/
 id	int(11)
user	varchar(255)
password	varchar(255)
name	varchar(255)
email	varchar(255)
status	int(1)
 /**/
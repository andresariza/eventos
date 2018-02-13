<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package control
 */
defined('_EXEC') or die;
require_once (PATH_SITE.'/entidad/Usuario.php');
require_once (PATH_SITE.'/entidad/Perfil.php');
class ControlLogin { 
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
    
    public function ControlLogin($variables) {        
        $this->db = Factory::createDbo(); 
        $this->variables = $variables; 
    }
    
    public function logout(){
        Factory::destroySession();
        echo json_encode(array("s"=>true));exit;
    }
    
    public function ingresar(){
        $user = strip_tags($this->variables->login);
        $pswd = strip_tags($this->variables->password);
        $Usuario = new Usuario();
        $Usuario->setDb();
        $Usuario->setUser($user);
        $Usuario->getByUser();
        
        $userId = $Usuario->getId();
        
        if(empty($userId)){
            echo json_encode(array("s"=>false, "mensaje" => "Error, el usuario no existe"));
        }else{
            $return = $Usuario->validatePassword($pswd);

            if($return){
                $query = "SELECT perfilId "
                        . " FROM userPerfil "
                        . " WHERE userid = ".$this->db->qstr($Usuario->getId());
                $datos = $this->db->Execute($query);
                //d($query);
                $perfilList = array();
                while($d = $datos->FetchRow()){
                    $Perfil = new Perfil();
                    $Perfil->setDb();
                    $Perfil->setId($d['perfilId']);
                    $Perfil->getById();
                    $perfilList[] = $Perfil;
                    unset($Perfil);
                } 
                Factory::setSessionVar("Usuario", $Usuario);
                Factory::setSessionVar("Perfiles", $perfilList);

                //ddd($_SESSION);
                echo json_encode(array("s"=>true, "mensaje" => "Bienvenido ".$Usuario->getName() ));
            }else{
                echo json_encode(array("s"=>false, "mensaje" => "Error, el usuario y clave no coindicen"));
            }
        }
        exit();
    }
    
    function validarVidaSesion(){
        $curTime = mktime(); 
        $lastActivity = Factory::getSessionVar('lastActivity');
        //d(date('m/d/Y H:i:s', $lastActivity));
        
        $diferencia = $curTime - $lastActivity;
        //d($diferencia);
        if(empty($lastActivity) || $diferencia>=600){
            Factory::destroySession();
            echo json_encode(array("s"=>false));
        }else{
            echo json_encode(array("s"=>true));
        }
        exit;
    }
}
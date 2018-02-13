<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package lib
 */
defined('_EXEC') or die;
require(PATH_SITE.'/lib/adodb5/adodb.inc.php');
require_once (PATH_SITE.'/entidad/Usuario.php');
require_once (PATH_SITE.'/entidad/Perfil.php');
abstract class Factory{
    /**
     * @type adodb Object
     * @access protected static
     */
    protected static $db;
    
    /**
     * @type ControlRender Object
     * @access protected static
     */
    protected static $ControlRender;
    
    /**
     * @type String dias de la semana
     * @access protected static
     */
    protected static $diasDeLaSemana = array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");
    
    /**
     * @type String meses del año
     * @access protected static
     */
    protected static $mesesDelAgno = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
    
    public static function createDbo(){
        $conf = new Configuration();

        try{
                $db = Factory::getDbInstance($conf);
        }catch (RuntimeException $e){
                if (!headers_sent()){
                        header('HTTP/1.1 500 Internal Server Error');
                }
                die('Database Error: ' . $e->getMessage());
        }

        return $db;
    }
    
    private static function getDbInstance($conf) {
        if (empty(self::$db)){
            self::$db = ADONewConnection('mysql');
            self::$db->Connect($conf->getHostName(), $conf->getDbUserName(), $conf->getDbUserPasswd(), $conf->getDbName());
        }
        return self::$db;
    }
    
    public static function getRenderInstance() {
        require_once (PATH_SITE.'/control/ControlRender.php');
        if (empty(self::$ControlRender)){
            self::$ControlRender = new ControlRender();
        }
        return self::$ControlRender;
    }
    
    public static function getBreadCrumbs($option, $variables){
        require_once(PATH_SITE.'/control/ControlMenu.php');
        if($option == "dashBoard"){
            $usuario = Factory::getSessionVar("MM_Username");
            $ControlMenu = new ControlMenu($usuario,Factory::createDbo());
            $menu = $ControlMenu->getCurrentMenu();
            
            $return = Factory::renderBreadCrumbs($menu);
            
            return $return;
        }
    }
    
    public static function renderBreadCrumbs($menu, $showHref = true){
        $return = "";
        $class = "";
        $reliframe = ' rel="" ';
        $uriBase=HTTP_ROOT;
        
        if(empty($menu->child)){
           $class = " active "; 
        }
        //d($menu);
        
        $link = @$menu->linkAbsoluto;
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
        
        //$link = @$menu->link;
                
        if(@$menu->id == 0){
            $return = '<ol class="breadcrumb">';
        }
        
        if($showHref){
            $return .= '<li><a href="'.$link.'" id="menuId_'.@$menu->id.'" class="menuItem '.$class.'" '.$reliframe.'>'.ucwords(mb_strtolower(@$menu->text,"UTF-8")).'</a></li>';
        }else{
            $return .= '<li>'.ucwords(mb_strtolower(@$menu->text,"UTF-8")).'</li>';
        }
        if(!empty($menu->child)){
            $return .= self::renderBreadCrumbs($menu->child,$showHref);
        }else{
            $return .= '</ol>';
        }
        //ddd($return);
        return $return;
    }
    
    public static function renderParentPath($menu){ 
        $return = "";
        
        $return .= ucwords(mb_strtolower(@$menu->text,"UTF-8")).'/';
        
        if(!empty($menu->child)){
            $return .= self::renderParentPath(@$menu->child);
        }
        //ddd($return);
        return $return;
    }
    
    public static function getCurrenTitle($menu){
        //d($menu);
        $return = ""; 
        $child = @$menu->child;
        if(empty($child)){
            //d($menu);
            $parenId = @$menu->parent_id;
            if(empty($parenId) && $parenId!=0 ){
                $return = "Servicio al Usuario"; 
            }else{
                $return = ucwords(mb_strtolower(@$menu->text,"UTF-8")); 
            }
        }else{
            $return = self::getCurrenTitle(@$menu->child);
        } 
        
        return $return;
    }
    
    public static function validateSession($variables){
        session_start();
        $userId = null;
        $Usuario = self::getSessionVar('Usuario');
        //ddd($Usuario);
        if( !empty($Usuario) ){
            $userId = $Usuario->getId();
        }
        
        if( !empty($Usuario) && empty($userId) ){
            if($variables->option!="login"){
                header("Location: ".HTTP_SITE."?tmpl=login&option=login");
            }
        }elseif(@$variables->option!="login" && @$variables->task!="validarVidaSesion"){
            $curTime = mktime();
            self::setSessionVar("lastActivity",$curTime);
        }
    }
    
    public static function getSessionVar($variable){
        if(!empty($_SESSION) && !empty($_SESSION["System"]) && !empty($_SESSION["System"]->$variable)){
            return @$_SESSION["System"]->$variable;
        }else{
            return null;
        }
    }
    
    public static function setSessionVar($variable, $value){
        //if(!empty($_SESSION)){
            $_SESSION["System"]->$variable = $value;
        //}
    }
    
    public static function createSession(){
        if(!empty($_SESSION)){
            session_destroy();
        }
    }
    public static function destroySession(){
        if(!empty($_SESSION) && !empty($_SESSION["System"])){
            $_SESSION["System"] = new stdClass();
        }
    }
    
    public static function printImportJsCss($type="js",$path=null){
        $conf = new Configuration();        
        $return = "";
        if(!empty($path)){
            $path .= "?v=".$conf->getVersionSistema();
            switch($type){
                case "js":
                    $return = '
                        <script type="text/javascript" src="'.$path.'"></script>';
                    break;
                case "css":
                    $return = '
                        <link type="text/css" rel="stylesheet" href="'.$path.'"> ';
                    break;
            }
        }
        
        return $return;
    }
    
    public static function printDateString($dia,$mes,$agno=null,$diaDeLaSemana=null){
        $return = "";
        
        if(!empty($diaDeLaSemana)){
            $return .= self::$diasDeLaSemana[$diaDeLaSemana]." ";
        }
        
        if(!empty($dia)){
            $return .= $dia." ";
            if(!empty($mes)||!empty($mes)){
                $return .= "de ";
            }
        }
        
        if(!empty($mes)){
            $return .= self::$mesesDelAgno[$mes]." ";
            if(!empty($agno)){
                $return .= "de ";
            }
        }
        
        if(!empty($agno)){
            $return .= $agno;
        }
        
        return $return;
    }
}
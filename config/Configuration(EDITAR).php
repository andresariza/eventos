<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package config
 */

class Configuration {
    
    /**
     * @type String
     * @access private
     */
    private $template;
    
    /**
     * @type String
     * @access private
     */
    private $entorno;
    
    /**
     * @type String
     * @access private
     */
    private $hostName;
    
    /**
     * @type String
     * @access private
     */
    private $dbName;
    
    /**
     * @type String
     * @access private
     */
    private $dbUserName;
    
    /**
     * @type String
     * @access private
     */
    private $dbUserPasswd;
    
    /**
     * @type String
     * @access private
     */
    private $versionSistema;
    
    /**
     * @type String
     * @access private
     */
    private $HTTP_SITE;
    
    /**
     * @type String
     * @access private
     */
    private $HTTP_ROOT;
    
    /**
     * @type String
     * @access private
     */
    private $PATH_ROOT; 
    
    /**
     * @type String
     * @access private
     */
    private $PATH_SITE; 
    
    public function Configuration(){
        if (!defined('_EXEC')){ //constante de seguridad, si no esta definida no se debe entrar a ninguna seccion
            define('_EXEC', 1);
        }
        $this->template = "default";
        if(strcmp($_SERVER['SERVER_NAME'], "localhost")==0){
            $versionGit = self::getGitVersion();
            $this->versionSistema = $versionGit['number'];
            $this->entorno = "local";
            $this->hostName = "localhost";//local 
            $this->dbName = "eventos";
            $this->dbUserName = "root";
            $this->dbUserPasswd = "123456";
            $this->HTTP_SITE = "http://localhost/eventos";
            $this->HTTP_ROOT = "http://localhost/eventos";
            $this->PATH_SITE = "/var/www/html/eventos";            
            $this->PATH_ROOT = "/var/www/html/eventos";            
        }
        
        // construye sala constantes
        if(!defined("HTTP_ROOT")){
            define("HTTP_ROOT", $this->getHTTP_ROOT());
        }
        if(!defined("HTTP_SITE")){
            define("HTTP_SITE", $this->getHTTP_SITE());
        }
        if(!defined("PATH_SITE")){ 
            define("PATH_SITE", $this->getPATH_SITE());
        }
        if(!defined("PATH_ROOT")){ 
            define("PATH_ROOT", $this->getPATH_ROOT());
        }
    }

    public function getTemplate() {
        return $this->template;
    }

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function getHostName() {
        return $this->hostName;
    }

    public function getDbName() {
        return $this->dbName;
    }

    public function getDbUserName() {
        return $this->dbUserName;
    }

    public function getDbUserPasswd() {
        return $this->dbUserPasswd;
    }
    
    public function getEntorno() {
        return $this->entorno;
    }
    
    public function getVersionSistema() {
        return $this->versionSistema;
    }
    
    function getHTTP_SITE() {
        return $this->HTTP_SITE;
    }
    
    function getHTTP_ROOT() {
        return $this->HTTP_ROOT;
    }

    function getPATH_SITE() {
        return $this->PATH_SITE;
    }

    function getPATH_ROOT() {
        return $this->PATH_ROOT;
    }
    
    public static function getGitVersion() {
        exec('git describe --always',$version_mini_hash);
        exec('git rev-list HEAD | wc -l',$version_number);
        exec('git log -1',$line);
        $version['number'] = $version_number[0];
        $version['hash'] = $version_mini_hash[0];
        $version['short'] = "v1.".trim($version_number[0]).".".$version_mini_hash[0];
        $version['full'] = "v1.".trim($version_number[0]).".$version_mini_hash[0] (".str_replace('commit ','',$line[0]).")";
        return $version;
    }

}
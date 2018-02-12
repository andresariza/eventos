<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
class UserMenu{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    /**
     * @type Usuario Object
     * @access private
     */
    private $Usuario;
    
    public function UserMenu($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        require_once (PATH_SITE."/entidad/Usuario.php");
        require_once (PATH_SITE."/entidad/Carrera.php");
        //d($_SESSION);//43359
        $Usuario = new Usuario();
        $Usuario->setIdusuario(Factory::getSessionVar('idusuario'));
        $Usuario->getUsuarioByIdUsuario();
        
        $this->Usuario = $Usuario;
               
        $array = array();
        $array['Usuario'] = $Usuario;
        //d($Usuario);
        
        $linkimagen = HTTP_SITE."/assets/img/av1.png";
        
        $imagenjpg = $Usuario->getNumerodocumento().".jpg";
        $imagenJPG = $Usuario->getNumerodocumento().".JPG";
        //d(PATH_ROOT."/imagenes/estudiantes/".$imagenjpg);
        if(is_file(PATH_ROOT."/imagenes/estudiantes/".$imagenjpg)){
            $linkimagen = HTTP_ROOT."/imagenes/estudiantes/".$imagenjpg;
        }elseif(is_file(PATH_ROOT."/imagenes/estudiantes/".$imagenJPG)){
            $linkimagen = HTTP_ROOT."/imagenes/estudiantes/".$imagenJPG;
        }
        $array['imgUsuario'] = $linkimagen;
        
        $array['menuItems'] = $this->getMenuItems();
        
        $rolesmuliple = Factory::getSessionVar("rolesmuliple");  
        $curRol = Factory::getSessionVar('idPerfil');  
         
        $codigofacultad = Factory::getSessionVar('codigofacultad');
        $idCarrera = Factory::getSessionVar('codigofacultad');
        
        $rol = Factory::getSessionVar('rol');
        
        if((empty($codigofacultad) && $rol==1) || ($codigofacultad==1 && !empty($idCarrera))){
            $idCarrera = Factory::getSessionVar('idCarrera');
        }else{
            $idCarrera = $codigofacultad;
        }
        
        $Carrera = new Carrera();
        $Carrera->setDb();
        $Carrera->setCodigocarrera($idCarrera);
        $Carrera->getByCodigo();
        //d($Carrera);
        $array['curCarrera'] = '<div class="pad-all bord-btm">'
                    . '<p class="text-lg text-muted text-thin mar-btm" id="nombreCarrera" data-idCarrera="'.$Carrera->getCodigocarrera().'" >'
                    . $Carrera->getNombrecarrera()
                    . '</p>'
                    . '</div>';
        //d($array['curCarrera']);
        
        //d($rolesmuliple);
        if(!empty($curRol)){ 
            $selectPerfil = '';
            /*$selectPerfil = '<li class=""> '
                    . '<a class="btn-link" >'
                    . 'Perfil:'
                    . '</a>'
                    . '</li>'; /**/
            
            $selectPerfil .= '<li class="dropdown">'; 

            //$selectPerfil .= '</li>'; 
            $selectPerfil .= '<a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-rol-id="'.$curRol.'" data-toggle="dropdown">'
                    .'<span class="lang-selected">Perfil: '
                    .$this->getPerfilName($curRol)
                    .'</span>'
                    .'</a>';
            if(!empty($rolesmuliple) && (COUNT($rolesmuliple)>1)){
                //d($rolesmuliple);
                $selectPerfil .= '<ul class="head-list dropdown-menu with-arrow">';
                foreach($rolesmuliple as $r){
                    $active = "";
                    if($this->allowPrint($curRol,$r)){
                        if($curRol==$r){
                            $active = ' active ';
                        }
                        $selectPerfil .= '<li>'
                                        . '<a href="#" data-rol-id="'.$r.'" class="changeRol '.$active.'" >'
                                        . $this->getPerfilName($r)
                                        . '</a>'
                                        . '</li>';
                    }
                }
                $selectPerfil .= '</ul>';
            }
            $selectPerfil .= '</li>'; 
            //d($selectPerfil);
            $array['selectPerfil'] = $selectPerfil;
        }
        
        //d($_SESSION);
        //d($array);
        return $array;
    }
    
    private function allowPrint($curRol, $newRol){
        $return = true;
        if($curRol==1 && $newRol==4){
            $return = false;
        }
        
        if($curRol==4 && $newRol==1){
            $return = false;
        }
        return $return;
    }
    
    private function getPerfilName($id){
        //d($id);
        $nameRolPerfil = '';
        $ico = "";
        switch($id){
            case '1':
                $nameRolPerfil = 'Estudiante';
                $ico = "fa-child";
                break;
            case '2':
                $nameRolPerfil = 'Docente';
                $ico = "fa-graduation-cap";
                break;
            case '3':
            //case '13':
                $nameRolPerfil = 'Administrativo';
                $ico = "fa-cogs";
                break;
            case '4':
                $nameRolPerfil = 'Padre';
                $ico = "fa-male";
                break;    
        }
        $return = '
                <i class="fa '.$ico.' lang-flag" aria-hidden="true"></i>
                <span class="lang-name">'.$nameRolPerfil.'</span>
                ';
        
        return $return;
    }
    
    private function getMenuItems(){
        $items = array();
        $codigotipousuario = $this->Usuario->getCodigotipousuario();
        //d($codigotipousuario);
        //ddd($items);
        switch($codigotipousuario){
            case 500: //docente
                $items[] = '
                <li>
                    <a href="'.HTTP_ROOT.'/serviciosacademicos/consulta/sic/aplicaciones/docente/formularios/index.php" id="menuId_285" class="menuItem" rel="iframe">
                        <i class="fa fa-id-card fa-fw fa-lg"></i> Hoja de vida
                    </a>
                </li>';
                $items[] = '
                <li>
                    <a href="'.HTTP_ROOT.'/serviciosacademicos/consulta/facultades/seleccionaCarreraAjax.php" id="menuId_220" class="menuItem" rel="iframe">
                        <i class="fa fa-university fa-fw fa-lg"></i> Mis carreras
                    </a>
                </li>';
                //d($this->Usuario);
                break;
            case 600: //estudiante
                $items[] = '
                <li>
                    <a href="'.HTTP_SITE.'/index.php?option=dashBoard&layout=carrerasEstudiante" id="menuId_0" class="menuItem" rel="">
                        <i class="fa fa-university fa-fw fa-lg"></i> Seleccionar carrera
                    </a>
                </li>';
                
                $items[] = '
                <li>
                    <a href="'.HTTP_ROOT.'/serviciosacademicos/consulta/facultades/planestudioestudiante/planestudioestudiante.php?codigoestudiante='.Factory::getSessionVar('codigo').'" id="menuId_636" class="menuItem" rel="iframe">
                        <i class="fa fa-road fa-fw fa-lg"></i> Ver plan de estudio
                    </a>
                </li>';
                $items[] = '
                <li>
                    <a href="'.HTTP_ROOT.'/serviciosacademicos/mgi/tablero_siq/Creacion_Docuemto/Hoja_Vida.html.php?actionID=Dirrecto" id="menuId_271" class="menuItem" rel="iframe">
                        <i class="fa fa-id-card fa-fw fa-lg"></i> Hoja de vida
                    </a>
                </li>';
                $items[] = '
                <li>
                    <a href="'.HTTP_ROOT.'/serviciosacademicos/consulta/ordenpagovarias/ordenpagovarias.php" id="menuId_170" class="menuItem" rel="iframe">
                        <i class="fa fa-money fa-fw fa-lg"></i> Pagos
                    </a>
                </li>';
                break;
            case 400: //administrativo
                $idusuario = Factory::getSessionVar('idusuario');
                if($idusuario == 66913){// Solo para el usuario coordinadorsisinfo
                    $items[] = '
                    <li>
                        <a href="'.HTTP_SITE.'/templates/default/nifty" target="_blank">
                            <i class="fa fa-laptop fa-fw fa-lg"></i> Template demo
                        </a>
                    </li>';
                    $items[] = '
                    <li>
                        <a href="'.HTTP_SITE.'/?option=adminMenu" id="menuId_0" class="menuItem adm_menu" rel="">
                            <i class="fa fa-list fa-fw fa-lg"></i> Administrar menú
                        </a>
                    </li>';
                }
                $items[] = '
                <li>
                    <a href="'.HTTP_ROOT.'/serviciosacademicos/consulta/facultades/seleccionaCarreraAjax.php" id="menuId_220" class="menuItem" rel="iframe">
                        <i class="fa fa-university fa-fw fa-lg"></i> Mis carreras
                    </a>
                </li>';
                break;
        }
        return $items;
    }
}

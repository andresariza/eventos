<?php
/**
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active
 * @package model
 */
defined('_EXEC') or die;
class DashBoard{
    /**
     * @type adodb Object
     * @access private
     */
    private $db;
    
    public function DashBoard($db) {
        $this->db = $db;
    }
    
    public function getVariables($variables){
        /*
         * perfil 1 = Estudiante
         * perfil 2 = Profesor
         * perfil 3 = Administrativo
         * perfil 4 = Padre
         */
        require_once (PATH_SITE."/entidad/Usuario.php");
        require_once (PATH_SITE."/components/moduloCalendarioInstitucional/modelo/ModuloCalendarioInstitucional.php");
        $modeloRender = Factory::getRenderInstance();
        
        $array = array();
        $Usuario = new Usuario();
        $Usuario->setIdusuario(Factory::getSessionVar('idusuario'));
        $Usuario->getUsuarioByIdUsuario();
        
        $idPerfil = Factory::getSessionVar('idPerfil');
        $codigo = Factory::getSessionVar('codigo');
        $documento = $Usuario->getNumerodocumento();
        //d($idPerfil);
        if(($idPerfil == 1 && ($codigo == $documento)) || (@$variables->layout=="carrerasEstudiante" )){
            $variables->layout = "carrerasEstudiante";
            $array["carrerasEstudiante"] = $this->getCarrerasEstudiante();
        }
        $tipoHorario = "";
        if($idPerfil == 1){
            $tipoHorario = 'estudiante';
        }elseif($idPerfil == 2){
            $tipoHorario = 'docente';
        }
        $array["horario"] = $this->getHorario($tipoHorario,$Usuario,$variables);
        
        $moduloCalendarioInstitucional = new ModuloCalendarioInstitucional($this->db);
        $arrayCaledario = $moduloCalendarioInstitucional->getVariables($variables);
        
        $moduloName = "moduloCalendarioInstitucional"; 
        //ddd($fecha); 

        $calendario = $modeloRender->render('default',"/components/".$moduloName,$arrayCaledario, true);
        
        $array["calendario"] = $calendario;
        
        //d($idPerfil);
        /*if($idPerfil){
            $Votacion = $this->getVotacionDocente();
            $array["Votacion"] = $Votacion;
        }/**/
        //$Modelo = new Menu($this->db);
        //$array = $Modelo->getVariables($variables);  
        //d($array);
        /*$controlRender = new ControlRender();
        $menu = $controlRender->render("menu",$array, true);
        $array["menu"] = $menu;/**/
        
        //d($array);
        return $array;
    }
    
    private function getVotacionDocente(){
        require_once (PATH_SITE."/entidad/Votacion.php");
        require_once (PATH_SITE."/entidad/DocentesVoto.php");
        
        //'codigodocente';
        $codigodocente = Factory::getSessionVar('codigodocente');
        $Votacion = new Votacion();
        $DocentesVoto = new DocentesVoto();
        $Votacion->setDb();
        $Votacion->getVotacionVigente();
        
        $idVotacion = $Votacion->getIdvotacion();
        if(!empty($idVotacion)){
            $DocentesVoto->setDb();
            $DocentesVoto->setNumerodocumento($codigodocente);
            $DocentesVoto->getByDocumento();
            $codigoCarrera = $DocentesVoto->getCodigocarrera();
            if(empty($codigoCarrera)){
                //$Votacion = null;
            }
            
            if(!empty($numerodocumento)){
		 $query_votacion_vigente="SELECT COUNT(vv.numerodocumentovotantesvotacion) as votos FROM
		votacion v, votantesvotacion vv
		WHERE
		v.codigoestado='100'
		AND vv.codigoestado='100'
		AND now() BETWEEN v.fechainiciovotacion AND v.fechafinalvotacion
		AND v.idvotacion=vv.idvotacion
		and v.idvotacion='".$idVotacion."'
		AND vv.numerodocumentovotantesvotacion='$codigodocente'
		";
		$operacion_votacion_vigente=$this->db->Execute($query_votacion_vigente);
		$row_operacion_votacion_vigente=$operacion_votacion_vigente->fetchRow();
		$cantVotos=$row_operacion_votacion_vigente['votos'];
		if($cantVotos==0){
                    $datosvotante=array('codigoestudiante'=> Factory::getSessionVar('codigo'),'numerodocumento'=>$codigodocente,'codigocarrera'=>$codigoCarrera,'tipovotante'=>'docente','cantVotos'=>$cantVotos,'idvotacion'=>$idVotacion,'modalidadacademica'=>null);
                    Factory::setSessionVar('datosvotante', $datosvotante);
		}
            }
            
        }
        return $Votacion;
    }
    
    private function getCarrerasEstudiante(){
        $codigoestudiante = Factory::getSessionVar('codigo');
        
        $Usuario = new Usuario();
        $Usuario->setIdusuario(Factory::getSessionVar('idusuario'));
        $Usuario->getUsuarioByIdUsuario();
         
        $documento = $Usuario->getNumerodocumento();
        unset($Usuario);
        
        if($documento!=$codigoestudiante){
            $codigoestudiante = $documento;
        }
        //d($codigoestudiante);
        $query = "SELECT distinct c.nombrecarrera, c.codigocarrera, eg.apellidosestudiantegeneral,
            eg.nombresestudiantegeneral, d.nombredocumento, d.tipodocumento,e.codigoestudiante,
            eg.numerodocumento, eg.fechanacimientoestudiantegeneral,eg.expedidodocumento,
            eg.idestudiantegeneral,gr.nombregenero,p.codigoperiodo, p.codigoestadoperiodo,
            eg.celularestudiantegeneral,eg.emailestudiantegeneral, eg.codigogenero,s.nombresituacioncarreraestudiante,
            eg.direccionresidenciaestudiantegeneral, eg.telefonoresidenciaestudiantegeneral,eg.ciudadresidenciaestudiantegeneral,
            eg.direccioncorrespondenciaestudiantegeneral, eg.telefonocorrespondenciaestudiantegeneral,eg.ciudadcorrespondenciaestudiantegeneral,e.codigocarrera
            FROM estudiante e
            INNER JOIN estudiantegeneral eg ON (e.idestudiantegeneral = eg.idestudiantegeneral)
            INNER JOIN estudiantedocumento ed ON (e.idestudiantegeneral = ed.idestudiantegeneral AND ed.idestudiantegeneral = eg.idestudiantegeneral)
            INNER JOIN carrera c ON (e.codigocarrera = c.codigocarrera)
            INNER JOIN documento d ON (eg.tipodocumento = d.tipodocumento)
            INNER JOIN situacioncarreraestudiante s ON (e.codigosituacioncarreraestudiante = s.codigosituacioncarreraestudiante)
            INNER JOIN genero gr ON (gr.codigogenero = eg.codigogenero)
            INNER JOIN carreraperiodo cp ON (cp.codigocarrera = c.codigocarrera)
            INNER JOIN periodo p ON (p.codigoperiodo = cp.codigoperiodo)
            WHERE ed.numerodocumento = '$codigoestudiante' 
                AND p.codigoestadoperiodo = '1' 
            ORDER BY e.codigosituacioncarreraestudiante desc";
        //d($query);
        $datos = $this->db->Execute($query);
        
        $data = $datos->GetArray();
        
        return $data;
    }
    
    private function getHorario($tipo,$Usuario,$variables){
        require_once (PATH_SITE."/components/horario/modelo/Horario.php");
        $horario = null;
        $modeloRender = Factory::getRenderInstance();
        $variables->Usuario = $Usuario;
        $variables->periodo = Factory::getSessionVar('codigoperiodosesion');
        $variables->FechaFutura_1 = date("Y-m-d");
        $variables->FechaFutura_2 = date("Y-m-d");
        $variables->diaDeLaSemana = date('N');
        $variables->tipo = $tipo;
        //d($variables);
        
        $Horario = new Horario($this->db);
        $array = $Horario->getVariables($variables);
        
        $moduloName = "horario"; 
        if(!empty($tipo)){
            $horario = $modeloRender->render('default',"/components/".$moduloName,$array, true);
        }
        return $horario;
    }
}

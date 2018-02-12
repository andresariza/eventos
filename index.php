<?php 
/* 
 * @author Andres Alberto Ariza <andresgudlu@gmail.com>
 * @copyright Dirección de Tecnología Branding Active 
 */
set_time_limit(30000);
ini_set('memory_limit', '64M');

require('config/Configuration.php');
$Configuration = new Configuration();

if($Configuration->getEntorno()=="local"||$Configuration->getEntorno()=="pruebas"){
    @error_reporting(1023); // NOT FOR PRODUCTION SERVERS!
    @ini_set('display_errors', '1'); // NOT FOR PRODUCTION SERVERS!
    require (PATH_ROOT.'/lib/kint/Kint.class.php');
}

require (PATH_SITE.'/lib/Factory.php');

$variables = new stdClass();
$option = "";
$tastk = "";
$action = "";
if(!empty($_REQUEST)){
    $keys_post = array_keys($_REQUEST);
    foreach ($keys_post as $key_post) {
        $variables->$key_post = strip_tags(trim($_REQUEST[$key_post]));
        //d($key_post);
        switch($key_post){
            case 'option':
                @$option = $_REQUEST[$key_post];
                break;
            case 'task':
                @$task = $_REQUEST[$key_post];
                break;
            case 'action':
                @$action = $_REQUEST[$key_post];
                break;
            case 'layout':
                @$layout = $_REQUEST[$key_post];
                break;
                break;
            case 'itemId':
                @$itemId = $_REQUEST[$key_post];
                break;
        }
    }
}
//d($variables);
if(empty($action) && empty($option)){
    $option = "dashBoard";
    $variables->option = $option;
}
if(empty($itemId)){
    $variables->itemId = 0;
}


Factory::validateSession($variables);

require_once (PATH_SITE.'/control/ControlEjecucionTareas.php');

$ControlEjecucionTareas = new ControlEjecucionTareas($variables, $Configuration);

//ejecuta las orden del action
$ControlEjecucionTareas->execute($action);

//redirige a la seccion indicada en el option (esto es para pintar secciones html) y el task se utiliza para ira  una subseccion 
//especifica de la opcion
$ControlEjecucionTareas->go(@$option, @$layout, @$task);/**/
<?php 
require_once "Config/Config.php";
   $ruta = !empty($_GET['_url']) ? $_GET['_url'] : 'index/index';
   $array = explode('/', $ruta) ;
   $controller = $array[0];
   $action = 'index';
   $params = "";
   if(!empty($array[1])){
        if(!empty($array[1]) != ""){
            $action = $array[1];
        }
   }

   if(!empty($array[2])){
        if(!empty($array[2]) != ""){
            for($i = 2; $i<count($array); $i++){
                $params .= $array[$i].",";
            }
            $params = rtrim($params, ",");
        }
   }

   require_once "Config/App/autoload.php";
   $dirController = "Controllers/{$controller}.php";
   if( file_exists($dirController)){
    require_once $dirController;
    $controller = new $controller();
    if (method_exists( $controller, $action)) {
        $controller->$action($params);
    }else{
        header('location: '.base_url.'Errores');
    }
   }else{
        header('location: '.base_url.'Errores');
   }
?>

<?php 
    //Metodo magico de PHP para obtener rutas automatica
    spl_autoload_register( function($class){
       if(file_exists("Config/App/{$class}.php")){
        require_once "Config/App/{$class}.php";
       }else{
        die("Class $class not found");
       }

    })
?>
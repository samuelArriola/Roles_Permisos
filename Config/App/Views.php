<?php 
    class Views {
        public function __construct(){
        
        }

        public function cargarView( $controllador, $vista, $data=""){
            $controllador = get_class($controllador);
            if( $controllador == "index"){
                $vista = "Views/{$vista}.php";
            }else{
                $vista = "Views/{$controllador}/{$vista}.php";
            }

            require_once $vista;
        }


    }
?>
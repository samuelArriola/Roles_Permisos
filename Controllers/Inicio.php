<?php 
    class Inicio extends Controller {
        public function __construct(){
             session_start();
            // if(!empty($_SESSION['SessionOn'])){
            //     header('Location:'.base_url);
            // }
             parent::__construct();
        }

        public function index(){
            $this->views->cargarView($this,"index" );
         }


    }
?>
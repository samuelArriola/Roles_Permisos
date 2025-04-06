<?php 
    class Errores extends Controller{
        public function __construct(){
            session_start();
            if (empty($_SESSION['SessionOn'])) {
                header('Location:'.base_url);
            }
            parent::__construct();
        }

        public function index(){
            $this->views->cargarView($this, "index" );
        }

        public function Permiso(){
            $this->views->cargarView($this, "SinPermiso" );
        }
    }

?>
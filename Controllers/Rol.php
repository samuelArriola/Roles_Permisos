<?php 
    class Rol extends Controller {
        public function __construct(){
            session_start();
            parent::__construct();
        }

        public function index(){
            if (empty($_SESSION['SessionOn'])) {
                header('Location:'.base_url);
            }

            $id_user = $_SESSION['id'];
            $verificarPermiso =  $this->model->verificarPermiso($id_user, 'Rol');
            $data['js'] = 'Rol.js';
            if (!empty($verificarPermiso) || $id_user ==1 ) {
                $this->views->cargarView($this, 'index', $data);
            } else {
                header('Location:'.base_url.'Errores/Permiso');
            }
        }

    }
?>
<?php 
    class Rol extends Controller {

        private $id_user, $idRol;
        public function __construct(){
            session_start();
            parent::__construct();
            $this->id_user = $_SESSION['id'];
            $this->idRol = $_SESSION['Rol'];
        }

        public function index(){
            if (empty($_SESSION['SessionOn'])) {
                header('Location:'.base_url);
            }

            
            $verificarPermiso =  $this->model->verificarPermiso($this->idRol, 'Rol');
            $data['js'] = 'Rol.js'; //Da ruta dinamica al Js
            if (!empty($verificarPermiso) || $this->id_user ==1 ) {
                $this->views->cargarView($this, 'index', $data);
            } else {
                header('Location:'.base_url.'Errores/Permiso');
            }
        }

        public function RegistrarRol(){
            $GeNomRol = $_POST['GeNomRol'];
            $GeRolId = $_POST['GeRolId'];
            if( empty($GeNomRol)){
                $msg = array(
                    "status" => "Error",
                    "message" =>"Todos los campos som obligatorios"
                );
            }else {
                if ( !empty($GeRolId)) {
                    $verificarPermiso =  $this->model->verificarPermiso($this->idRol, 'Rol', 'AND detalle_permisos.u = 1');
                    if (!empty($verificarPermiso) || $this->id_user ==1 ) {
                        $data = $this->model->ActulizarRol($GeNomRol, $GeRolId);
                        if ($data == 'Actualizado') {
                            $msg = array(
                                "status"=> "Actualizado",
                                "message" => "Rol Actualizado"  
                            );
                        }else{
                            $msg = array(
                                "status"=> "Error",
                                "message" => "Error al Actualizar Rol"  
                            );
                        }
                    }else {
                        $msg = array(
                            "status"=> "ErrorPermisoActualizar",
                            "message" => "No tiene permiso para actualizar"  
                        );
                    }
                }else {
                    $verificarPermiso =  $this->model->verificarPermiso($this->idRol, 'Rol', 'AND detalle_permisos.c = 1');
                    if (!empty($verificarPermiso) || $this->id_user ==1 ) {
                        $data = $this->model->registrarRol( $GeNomRol);
                        if ($data == 'Ok') {
                            $msg = array(
                                "status"=> "Ok",
                                "message" => "Rol registrado con exito"
                            );
                        }else if($data == "Existe"){
                            $msg = array(
                                "status"=> "Existe",
                                "message" => "Rol ya Registrado"
                            );
                        }else{
                            $msg = array(
                                "status"=> "Error",
                                "message" => "Error al registrar Rol", $data
                            );
                        }
                    }else {
                        $msg = array(
                            "status"=> "ErrorPermisoRegistrar",
                            "message" => "No tiene permiso para registrar"  
                        );
                    }
                }
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE );
            die();
        }

        public function GetRol(){
            $data = $this->model->GetRoles();
            for ($i=0; $i < count($data); $i++) { 
                if ($data[$i]['Estado'] == 1) {
                    if ($data[$i]['id_rol'] == 1) {
                        $data[$i]['Estado'] = '<span class="badge bg-success">Activo</span>';
                        $data[$i]['Opciones'] = '
                        <div>                
                          <span class="badge text-bg-primary">Administrador</span>
                        </div>
                        '; 
                    }else {
                        $data[$i]['Estado'] = '<span class="badge bg-success">Activo</span>';
                        $data[$i]['Opciones'] = '
                                                 <a href="'.base_url.'Usuario/Permiso/'.$data[$i]['id_rol'].'" class="btn btn-dark"><i class="bi bi-key"></i></a>
                                                <button class="btn btn-primary" type="button"  onclick="BtnEditarRol('.$data[$i]['id_rol'].')"><i class="bi bi-pencil-square"></i></button>
                                                <button class="btn btn-danger" type="button"  onclick="DesactivarRol('.$data[$i]['id_rol'].')"><i class="bi bi-trash"></i></button>';
                    }
                   
                }else{
                    $data[$i]['Estado'] = '<span class="badge bg-danger">Inactivo</span>';
                    $data[$i]['Opciones'] = '
                     <div>                
                        <button type="button" class="btn btn-success" onclick= "ActivarRol('.$data[$i]['id_rol'].')"><i class="bi bi-arrow-left-right"></i></button>
                    </div>
                ';
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE );
            die();
        }

        public function EditarRol(int $id){
            $data = $this->model->GetRolesId($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE );
            die();
        }
    
        public function Activar(int $param){
            $data = $this->model->EliminarRol(1, $param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function Desactivar( int $param){
            $verificarPermiso =  $this->model->verificarPermiso($this->idRol, 'Rol', 'AND detalle_permisos.d = 1');
            if (!empty($verificarPermiso) || $this->id_user ==1 ) {
                $data = $this->model->EliminarRol(0,$param);
                if ($data == 1) {
                    $msg = array(
                        "status"=> "Ok",
                        "message" => "Rol Desactivado"
                    );
                }else{
                    $msg = array(
                        "status"=> "Error",
                        "message" => "Error al Desactivar Rol"
                    );
                }
            }else {
                $msg = array(
                    "status"=> "ErrorPermisoEliminar",
                    "message" => "No tiene permiso para Eliminar"
                );
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }


    }
?>
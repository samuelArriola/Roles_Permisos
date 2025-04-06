<?php 
    class Cliente extends Controller{
        public function __construct(){
            session_start();
            if (empty($_SESSION['SessionOn'])) {
                header('Location:'.base_url);
            }
            parent::__construct();
        }

        public function index(){
            $id_user = $_SESSION['id'];
            $verificarPermiso =  $this->model->verificarPermiso($id_user, 'Cliente');
            if (!empty($verificarPermiso) || $id_user ==1 ) {
                $this->views->cargarView($this, 'index');
            } else {
                header('Location:'.base_url.'Errores/Permiso');
            }
        }

        public function GetClientes(){
            $data = $this->model->GetUClientes();
            for ( $i = 0; $i < count($data); $i++) {
                if($data[$i]['GeEstadocli'] == 1){
                    $data[$i]['Estado'] = '<span class="badge text-bg-success">Activo</span>';
                    $data[$i]['Opciones'] = '
                    <div>                
                        <button type="button" class="btn btn-primary" onclick="btnEdiCli('.$data[$i]['id'].')"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" onclick= "DesactivarCliente('.$data[$i]['id'].')"><i class="bi bi-trash"></i></button>
                    </div>
                ';
                }else{
                    $data[$i]['Estado'] = '<span class="badge text-bg-danger">Inactivo</span>';
                    $data[$i]['Opciones'] = '
                        <div>                
                            <button type="button" class="btn btn-success" onclick= "ActivarCliente('.$data[$i]['id'].')"><i class="bi bi-arrow-left-right"></i></button>
                        </div>
                    ';
                }

            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function RegistrarCli(){
            $id_user = $_SESSION['id'];
            $GeCliId = $_POST['GeCliId'];
            $GeNumDniCli = $_POST['GeNumDniCli'];
            $GePriNomCli = $_POST['GePriNomCli'];
            $GeTelefonoCli = $_POST['GeTelefonoCli'];
            
            if ( empty($GeNumDniCli) || empty($GePriNomCli) || empty($GeTelefonoCli)) {
                $msg = array(
                    "status"=> "Error",
                    "message" => "Todos los campos son obligatorios"
                );
            }else{
                // Actualizar cliente
                if( !empty($GeCliId) ){
                    $data = $this->model->ActulizarCliente($GeNumDniCli, $GePriNomCli, $GeTelefonoCli,$GeCliId);
                    if ($data == 'Actualizado') {
                        $msg = array(
                            "status"=> "Actualizado",
                            "message" => "Cliente Actualizado"  
                        );
                    }else{
                        $msg = array(
                            "status"=> "Error",
                            "message" => "Error al Actualizar Cliente"
                            
                        );
                    }
                }else{

                   
                    $verificarPermiso =  $this->model->verificarPermiso($id_user, 'Cliente_crear');
                    if (!empty($verificarPermiso) || $id_user ==1 ) {
                        $data = $this->model->registrarCliente($GeNumDniCli, $GePriNomCli, $GeTelefonoCli);
                        if ($data == 'Ok') {
                            $msg = array(
                                "status"=> "Ok",
                                "message" => "Cliente registrado con exito"
                                );
                        }else if($data == "Existe"){
                            $msg = array(
                                "status"=> "Existe",
                                "message" => "Cliente ya Registrado"
                            );
                        }else{
                            $msg = array(
                                "status"=> "Error",
                                "message" => "Error al registrar Cliente"                            
                            );
                        }
                    } else {
                        $msg = array(
                            "status"=> "ErroPerCreCli",
                            "message" => "No Tiene permiso para registrar Clientes"                            
                        );
                    }
                  
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function DesactivarCli( int $param){
            $data = $this->model->EliminarCli(0,$param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function ActivarCli(int $param){
            $data = $this->model->EliminarCli(1, $param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function EditarCli(int $param){
            $data = $this->model->EditarCli($param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }

    }
?>
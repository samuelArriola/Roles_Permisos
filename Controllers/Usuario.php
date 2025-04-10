<?php 
    class Usuario extends Controller {
        public function __construct(){
            session_start();
            parent::__construct();
        }
       
        public function index(){
            if (empty($_SESSION['SessionOn'])) {
                header('Location:'.base_url);
            }

            $id_user = $_SESSION['id'];
            $id_Rol = $_SESSION['Rol'];
            $verificarPermiso =  $this->model->verificarPermiso($id_Rol, 'Usuario');
            if (!empty($verificarPermiso) || $id_user == 1) {
                $data = $this->model->GetRol();
                $this->views->cargarView($this, 'index', $data);
            } else {
                header('Location:'.base_url.'Errores/Permiso');
            }
          
        }

        public function Permiso($id){
            $data['id_usuario'] = $id;
            if (empty($_SESSION['SessionOn']) ) {
                header('Location:'.base_url);
            }

            $data['datos'] = $this->model->GetPermiso();
            $PermisoUsuAll = $this->model->GetPermisoUsuario($id);
            $data['PermisoUsu'] = array();
            //Marcar Permisos selecionados
           foreach ($PermisoUsuAll as $permiso) {
                $data['PermisoUsu'][$permiso['id_permiso']] = [
                    'c' => $permiso['c'],
                    'r' => $permiso['r'],
                    'u' => $permiso['u'],
                    'd' => $permiso['d']
                ];
            }
            $MenuAll = $this->model->GetMenuAll();
            $SubMenuAll = $this->model->GetSubMenuAll();
            $data['MenuAll'] =  $MenuAll;
            $data['SubMenuAll'] = $SubMenuAll;
            $this->views->cargarView($this, 'Permiso', $data);
        }
       
        public function Validar(){
            if( empty($_POST['usuario']) || empty($_POST['clave'])){
                echo "Error: Debe llenar todos los campos";
            }else{
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];
                $hasCalve = hash('SHA256',  $clave);
                $data = $this->model->ValidarUsuario($usuario, $hasCalve);
                if($data){
                    $Menu = $this->model->GetMenu($data['Rol']);
                    $SubMenu = $this->model->GetSubMenu($data['Rol']);
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['Numdoc'] = $data['Numdoc'];
                    $_SESSION['Correo'] = $data['Correo'];
                    $_SESSION['Nombre'] = $data['Nombre'];
                    $_SESSION['Apellido'] = $data['Apellido'];
                    $_SESSION['Apellido2'] = $data['Apellido2'];
                    $_SESSION['Rol'] = $data['Rol'];
                    $_SESSION['SessionOn'] = true;
                    $_SESSION['Menu'] = $Menu;
                    $_SESSION['SubMenu'] = $SubMenu;
                    $msg= array(
                        "status" => "Ok",
                        "mensaje" =>'Credenciales Correctas'
                    );
                }else{
                    $msg = array(
                        "status" => "Error",
                        "mensaje" => "Usuario o contraseña incorrectos"
                    );
                };
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }
            // <a href="'.base_url.'Usuario/Permiso/'.$data[$i]['id'].'" class="btn btn-dark" ><i class="bi bi-key"></i></a>
        public function GetUsuario(){
            $data = $this->model->GetUsuarios();
            for ( $i = 0; $i < count($data); $i++) {
                if($data[$i]['Usuestado'] == 1){
                    //Quitar Opciones si el usuario es Administrador
                    if($data[$i]['id'] == 1){ 
                        $data[$i]['Estado'] = '<span class="badge text-bg-success">Activo</span>';
                        $data[$i]['Opciones'] = '
                        <div>                
                          <span class="badge text-bg-primary">Administrador</span>
                        </div>
                        ';
                    }else {
                        $data[$i]['Estado'] = '<span class="badge text-bg-success">Activo</span>';
                        $data[$i]['Opciones'] = '
                            <div>                
                                <button type="button" class="btn btn-primary" onclick="btnEdiUsu('.$data[$i]['id'].')"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger" onclick= "DesactivarUsuario('.$data[$i]['id'].')"><i class="bi bi-trash"></i></button>
                            </div>
                        ';
                    }
                }else{
                    $data[$i]['Estado'] = '<span class="badge text-bg-danger">Inactivo</span>';
                    $data[$i]['Opciones'] = '
                    <div>                
                        <button type="button" class="btn btn-success" onclick= "ActivarUsuario('.$data[$i]['id'].')"><i class="bi bi-arrow-left-right"></i></button>
                    </div>
                    ';
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function RegistrarUsuario(){
            $GeUsuId = $_POST['GeUsuId'];
            $GePriNom = $_POST['GePriNom'];
            $GeSegNom = $_POST['GeSegNom'];
            $GePriApe = $_POST['GePriApe'];
            $GeSegApe = $_POST['GeSegApe'];
            $GeTipDoc = $_POST['GeTipDoc'];
            $GeNumDoc = $_POST['GeNumDoc'];
            $GeTelefono = $_POST['GeTelefono'];
            $GeCorreo = $_POST['GeCorreo'];
            $GeUsuario = $_POST['GeUsuario'];
            $GeClave = $_POST['GeClave'];
            $hasGenClave = hash('SHA256', $GeClave );
            $GeConClave = $_POST['GeConClave'];
            $GeSexo = $_POST['GeSexo'];
            $GeRol = $_POST['GeRol'];
            $GeEstado = $_POST['GeEstado'];
            if (
                empty($GePriNom) || empty($GePriApe) || empty($GeSegApe) ||
                empty($GeTipDoc) || empty($GeNumDoc) || empty($GeTelefono) || empty($GeCorreo) ||
                empty($GeUsuario) || empty($GeSexo) ||  empty($GeRol) || empty($GeEstado)
            ) {
                $msg = array(
                    "status"=> "Error",
                    "message" => "Todos los campos son obligatorios"
                );
            }else{
                // Actualizar usuario
                if( !empty($GeUsuId) ){
                    $data = $this->model->ActulizarUsuarios($GePriNom , $GeSegNom, $GePriApe, $GeSegApe, $GeTipDoc, $GeNumDoc, $GeTelefono, $GeUsuario, $GeSexo, $GeRol, $GeCorreo, $GeEstado, $GeUsuId);
                    if ($data == 'Actualizado') {
                        $msg = array(
                            "status"=> "Actualizado",
                            "message" => "Usuario Actualizado"  
                        );
                    }else{
                        $msg = array(
                            "status"=> "Error",
                            "message" => "Error al Actualizar usuario"
                            
                        );
                    }
                    
                }else{
                    // Registrar Usuario
                   if( $GeClave !=  $GeConClave){
                    $msg = array(
                        "status"=> "ErrorClave",
                        "mensaje" => "Las contraseñas no coinciden");
                    }else {
                        $data = $this->model->RegistrarUsuarios($GePriNom , $GeSegNom, $GePriApe, $GeSegApe, $GeTipDoc, $GeNumDoc, $GeTelefono, $GeUsuario, $hasGenClave, $GeSexo, $GeRol, $GeCorreo, $GeEstado);
                        if ($data == 'Ok') {
                            $msg = array(
                                "status"=> "Ok",
                                "message" => "Usuario registrado con exito"
                            );
                        }else if($data == "Existe"){
                            $msg = array(
                                "status"=> "Existe",
                                "message" => "Usuario ya Registrado"
                            );
                        }else{
                            $msg = array(
                                "status"=> "Error",
                                "message" => "Error al registrar usuario "
                                
                            );
                        }
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function RegistrarPermiso(){
            // Decodificar JSON recibido
            $json = file_get_contents("php://input");
            $data = json_decode($json, true);

            if (!$data) {
                echo json_encode(["status" => "Error", "message" => "Datos no válidos"]);
                die();
            }

            $IdUser = $data['id_usuario'] ?? null;
            $permisos = $data['permisos'] ?? [];


            if (!$IdUser || empty($permisos)) {
                echo json_encode(["status" => "Error", "message" => "Usuario o permisos no válidos"]);
                die();
            }

            
             $msg = '';
              $eliminar = $this->model->EliminarPermisos($IdUser);
              if ($eliminar == 'Ok') {
                  foreach ($permisos as $permiso) {
                     $id_permiso = $permiso['id_permiso'];
                     $c = $permiso['c'];
                     $r = $permiso['r'];
                     $u = $permiso['u'];
                     $d = $permiso['d'];
                
                      $msg = $this->model->RegistrarPermisos($IdUser, $id_permiso, $c, $r, $u, $d);
                  }
                  if($msg == 'Ok'){
                      $msg= array(
                          "status" => "Ok",
                          "mensaje" =>'Permisos cargado exitosamente'
                      );
                  }else{
                      $msg = array(
                          "status"=> "Error",
                          "message" => "Error al cargar permisos"      
                      );
                  }

              }else{
                  $msg = array(
                      "status"=> "Error",
                      "message" => "Error actualizar usuarios"
                    
                  );
              }

             echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
       
        public function Desactivar( int $param){
            $data = $this->model->EliminarUsu(0,$param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function Activar(int $param){
            $data = $this->model->EliminarUsu(1, $param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function Editar(int $param){
            $data = $this->model->EditarUsu($param);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function salir(){
            session_destroy();
            header('Location:'.base_url);
        }

        
    } 
?>




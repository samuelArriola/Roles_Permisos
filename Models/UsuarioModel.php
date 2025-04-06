<?php 
    class UsuarioModel extends Query {
        private $GePriNom, $GeSegNom, $GePriApe, $GeSegApe, $GeTipDoc, $GeNumDoc, $GeTelefono,
                 $GeCorreo, $GeUsuario, $hasGenClave, $GeSexo, $GeCaja, $GeEstado, $GeUsuId, $id, $estado, $IdUser, $Permiso , $c,  $r,  $u,  $d;
        public function __construct(){
            parent::__construct();
        }

        public function ValidarUsuario(string $usuario, string $clave){
            $sql = "SELECT * FROM genusuario WHERE Usuario = '$usuario' AND Clave ='$clave' ";
            $data = $this->select($sql);
            return $data;
        }

        public function GetUsuarios(){
            $sql = "SELECT genusuario.id, genusuario.Rol, genusuario.Nombre, genusuario.Usuestado Usuestado , Gencaja.caja GenCaja FROM genusuario INNER JOIN Gencaja ON genusuario.Gencaja = Gencaja.id ";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function GetCajas(){
            $sql = "SELECT * FROM Gencaja WHERE Estado = 1";
            $data = $this->selectAll($sql);
            return $data;
        }

        //Obtener todos los permisos
        public function GetPermiso(){
            $sql = "SELECT * FROM genpermiso";
            $data = $this->selectAll($sql);
            return $data;
        }

        //Obtner todos los permisos que tiene asignado el usuario
        public function GetPermisoUsuario(int $IdUser){
            $sql = "SELECT detalle_permisos.* 
                    FROM detalle_permisos 
                        INNER JOIN genpermiso ON detalle_permisos.id_permiso = genpermiso.id
                    WHERE detalle_permisos.id_usuario = $IdUser ";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function RegistrarPermisos(int $IdUser, int $Permiso, int $c, int $r, int $u, int $d){
            $this->IdUser = $IdUser;
            $this->Permiso = $Permiso;
            $this->c = $c;
            $this->r = $r;
            $this->u = $u;
            $this->d = $d;

            $sql = "INSERT INTO detalle_permisos (id_usuario, id_permiso, c, r, u, d) VALUES (?,?,?,?,?,?)";
            $data = $this->save($sql, array($this->IdUser, $this->Permiso, $this->c, $this->r, $this->u, $this->d));
            if ($data == 1) {
                $res = 'Ok';
            } else {
                $res = 'Error';
            }
            
            return $res;
        }

        public function EliminarPermisos(int $IdUser){
            $this->IdUser = $IdUser;
            $sql = "DELETE FROM detalle_permisos WHERE id_usuario  = ?";
            $datos = array( $this->IdUser);
            $data = $this->save($sql,$datos);
            if ($data == 1) {
                $res = 'Ok';
            } else {
                $res = 'Error';
            }
            
            return $res;
        }

        public function verificarPermiso(int $id_user, string $permiso){
            $sql = "SELECT detalle_permisos.id_permiso, detalle_permisos.id_usuario, genpermiso.permiso 
                    FROM `detalle_permisos` 
                        INNER JOIN genpermiso ON detalle_permisos.id_permiso = genpermiso.id
                    WHERE detalle_permisos.id_usuario = $id_user AND genpermiso.permiso = '$permiso'";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function RegistrarUsuarios( string $GePriNom, string $GeSegNom, string $GePriApe, string $GeSegApe, int $GeTipDoc, string $GeNumDoc, string $GeTelefono, string $GeUsuario, string $hasGenClave, string $GeSexo, int $GeCaja, string $GeCorreo, int $GeEstado, ){
            $this->GePriNom = $GePriNom;
            $this->GeSegNom = $GeSegNom;
            $this->GePriApe = $GePriApe;
            $this->GeSegApe = $GeSegApe;
            $this->GeTipDoc = $GeTipDoc;
            $this->GeNumDoc = $GeNumDoc;
            $this->GeTelefono = $GeTelefono;
            $this->GeUsuario = $GeUsuario;
            $this->hasGenClave = $hasGenClave;
            $this->GeSexo = $GeSexo;
            $this->GeCaja = $GeCaja;
            $this->GeCorreo = $GeCorreo;
            $this->GeEstado = $GeEstado;

            $verificar = "SELECT * FROM genusuario WHERE Numdoc = ".$this->GeNumDoc." ";
            $verificardo = $this->select($verificar);
            if(empty($verificardo)){
                $sql = "INSERT INTO genusuario(Nombre, Nombre2, Apellido, Apellido2, Tipdoc, Numdoc, Sexo, Usuario, Clave, Telefono, Rol, Gencaja, Correo)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $datos = array($this->GePriNom, $this->GeSegNom, $this->GePriApe, $this->GeSegApe, $this->GeTipDoc, $this->GeNumDoc, $this->GeSexo, $this->GeUsuario, $this->hasGenClave, $this->GeTelefono, $this->GeEstado, $this->GeCaja, $this->GeCorreo);
                $data = $this->save($sql,$datos);
                if ( $data == 1) {
                    $res = 'Ok';
                }else{
                    $res = 'Error';
                }
            }else{
                $res = 'Existe';
            }
            return $res;
        }

        public function ActulizarUsuarios( string $GePriNom, string $GeSegNom, string $GePriApe, string $GeSegApe, int $GeTipDoc, string $GeNumDoc, string $GeTelefono, string $GeUsuario, string $GeSexo, int $GeCaja, string $GeCorreo, int $GeEstado, int $GeUsuId ){
            $this->GePriNom = $GePriNom;
            $this->GeSegNom = $GeSegNom;
            $this->GePriApe = $GePriApe;
            $this->GeSegApe = $GeSegApe;
            $this->GeTipDoc = $GeTipDoc;
            $this->GeNumDoc = $GeNumDoc;
            $this->GeTelefono = $GeTelefono;
            $this->GeUsuario = $GeUsuario;
            $this->GeSexo = $GeSexo;
            $this->GeCaja = $GeCaja;
            $this->GeCorreo = $GeCorreo;
            $this->GeEstado = $GeEstado;
            $this->$GeUsuId = $GeUsuId;

            $sql = "UPDATE genusuario SET Nombre=?,Nombre2=?,Apellido=?,Apellido2=?,Tipdoc=?,Numdoc=?,Sexo=?,Usuario=?,Telefono=?,Rol=?,Gencaja=?,Correo=?, Actualizado= now() WHERE id = ?";
            $datos = array($this->GePriNom, $this->GeSegNom, $this->GePriApe, $this->GeSegApe, $this->GeTipDoc, $this->GeNumDoc, $this->GeSexo, $this->GeUsuario, $this->GeTelefono, $this->GeEstado, $this->GeCaja, $this->GeCorreo, $this->$GeUsuId);
            $data = $this->save($sql,$datos);
            if ( $data == 1) {
                $res = 'Actualizado';
            }else{
                $res = 'ErrorActualizado';
            }
            return $res;
        }

        public function EliminarUsu(int $estado ,int $id){
            $this->id = $id;
            $this->estado = $estado;
            $sql = "UPDATE genusuario Set Usuestado = ? WHERE id = ?";
            $datos = array( $this->estado,$this->id);
            $data = $this->save($sql,$datos);
            return $data;
        }

        public function EditarUsu(int $id){
            $sql = "SELECT * FROM genusuario WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }

        public function GetMenu(int $id_user){
            $sql = "SELECT genpermiso.id, menu_id, permiso, icono , genpermiso.ruta
                    FROM `detalle_permisos` 
                        INNER JOIN genpermiso ON detalle_permisos.id_permiso = genpermiso.id
                    WHERE detalle_permisos.id_usuario = $id_user and genpermiso.menu_id is null";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function GetMenuAll(){
            $sql = "SELECT *
                    FROM `genpermiso` 
                    WHERE genpermiso.menu_id is null";
            $data = $this->selectAll($sql);
            return $data;
        }
    
        public function GetSubMenu(int $id_user){
            $sql = "SELECT genpermiso.id, menu_id, permiso, icono, genpermiso.ruta
                    FROM `detalle_permisos` 
                        INNER JOIN genpermiso ON detalle_permisos.id_permiso = genpermiso.id
                    WHERE detalle_permisos.id_usuario = $id_user and genpermiso.menu_id <> 0";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function GetSubMenuAll(){
            $sql = "SELECT *
                    FROM `genpermiso` 
                    WHERE genpermiso.menu_id <> 0";
            $data = $this->selectAll($sql);
            return $data;
        }

    }
?>
<?php 
    class RolModel extends Query{
        private  $IdUser, $Permiso, $GeNomRol, $GeRolId, $estado, $id, $crud;
        public function __construct(){
            parent::__construct();
        }

        public function GetRoles(){
            $sql = "SELECT * FROM genrol";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function GetRolesId(int $id){
            $sql = "SELECT * FROM genrol WHERE id_rol = $id";
            $data = $this->select($sql);
            return $data;
        }

        public  function registrarRol(string $GeNomRol){
            $this->GeNomRol = $GeNomRol;
            $verificar = "SELECT * FROM genrol WHERE Nombre_rol = '".$this->GeNomRol."'";
            $verificardo = $this->select($verificar);
                if (empty($verificardo)) {
                    $sql = "INSERT INTO genrol(Nombre_rol) VALUES(?)";
                    $datos = array($this->GeNomRol);
                    $data = $this->save($sql,$datos);
                    if ( $data == 1) {
                        $res = 'Ok';
                    }else{
                        $res = 'Error';
                    }
                }else{
                    $res = 'Existe';
                }
            return  $res;
        }

        public function ActulizarRol(string $GeNomRol , int $GeRolId){
            $this->GeNomRol = $GeNomRol;
            $this->GeRolId = $GeRolId;
            $sql = "UPDATE genrol SET Nombre_rol = ? WHERE id_rol = ?";
            $datos = array($this->GeNomRol, $this->GeRolId);
            $data = $this->save($sql,$datos);
            if ( $data == 1) {
                $res = 'Actualizado';
            }else{
                $res = 'ErrorActualizado';
            }
            return $res;
        }
       
        
        public function EliminarRol(int $estado ,int $id){
            $this->id = $id;
            $this->estado = $estado;
            $sql = "UPDATE genrol Set Estado = ? WHERE id_rol = ?";
            $datos = array( $this->estado,$this->id);
            $data = $this->save($sql,$datos);
            return $data;
        }

        public function verificarPermiso(int $IdUser ,string $Permiso, string $crud = ''){
            $this->IdUser = $IdUser;
            $this->Permiso = $Permiso;
            $this->crud = $crud;
            $sql = "SELECT detalle_permisos.id_permiso, detalle_permisos.id_rol, genpermiso.permiso 
                    FROM `detalle_permisos` 
                        INNER JOIN genpermiso ON detalle_permisos.id_permiso = genpermiso.id
                    WHERE detalle_permisos.id_rol = $this->IdUser  AND genpermiso.permiso = '$this->Permiso' $crud ";
            $data = $this->selectAll($sql);
            return $data;
        }

   

    }
?>
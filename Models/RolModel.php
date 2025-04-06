<?php 
    class RolModel extends Query{
        private  $IdUser, $Permiso;
        public function __construct(){
            parent::__construct();
        }

        public function verificarPermiso(int $IdUser, string $Permiso){
            $this->IdUser = $IdUser;
            $this->Permiso = $Permiso;
            $sql = "SELECT detalle_permisos.id_permiso, detalle_permisos.id_usuario, genpermiso.permiso 
                    FROM `detalle_permisos` 
                        INNER JOIN genpermiso ON detalle_permisos.id_permiso = genpermiso.id
                    WHERE detalle_permisos.id_usuario = $this->IdUser  AND genpermiso.permiso = '$this->Permiso'";
            $data = $this->selectAll($sql);
            return $data;
        }
    }
?>
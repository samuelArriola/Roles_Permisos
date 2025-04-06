<?php 
    class ClienteModel extends Query{
        private $GeNumDniCli, $GeNomCli, $GeTelefonoCli, $GeCliId, $IdUser, $Permiso;
        public function __construct(){
            parent::__construct();
        }
        
        public function GetUClientes(){
            $sql = "SELECT * FROM cliente";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrarCliente(string $GeNumDniCli, string $GeNomCli, string $GeTelefonoCli){
            $this->GeNumDniCli = $GeNumDniCli;
            $this->GeNomCli = $GeNomCli;
            $this->GeTelefonoCli = $GeTelefonoCli;
            
            $verificar = "SELECT * FROM cliente WHERE GeNumDniCli = ".$this->GeNumDniCli." ";
            $verificardo = $this->select($verificar);
            if (empty($verificardo)) {
                $sql = "INSERT INTO cliente(GeNumDniCli, GeNomCli, GeTelefonoCli)
                    VALUES(?,?,?)";
                $datos = array($this->GeNumDniCli, $this->GeNomCli, $this->GeTelefonoCli);
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

        //validar que cduando se edite el id del cliente, ese id no exista en LA BD
        public function ActulizarCliente( string $GeNumDniCli, string $GeNomCli, string $GeTelefonoCli, int $GeCliId ){
            
            $this->GeCliId = $GeCliId;
            $this->GeNumDniCli = $GeNumDniCli;
            $this->GeNomCli = $GeNomCli;
            $this->GeTelefonoCli = $GeTelefonoCli;

            $sql = "UPDATE cliente SET GeNumDniCli=?,GeNomCli=?,GeTelefonoCli=? WHERE id = ?";
            $datos = array($this->GeNumDniCli, $this->GeNomCli, $this->GeTelefonoCli, $this->GeCliId);
            $data = $this->save($sql,$datos);
            if ( $data == 1) {
                $res = 'Actualizado';
            }else{
                $res = 'ErrorActualizado';
            }
            return $res;
        }

        public function EliminarCli(int $estado ,int $id){
            $this->id = $id;
            $this->estado = $estado;
            $sql = "UPDATE cliente Set GeEstadocli = ? WHERE id = ?";
            $datos = array( $this->estado,$this->id);
            $data = $this->save($sql,$datos);
            return $data;
        }

        public function EditarCli(int $id){
            $sql = "SELECT * FROM cliente WHERE id = $id";
            $data = $this->select($sql);
            return $data;
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
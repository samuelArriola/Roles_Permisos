<?php 
    class ProductoModel extends Query{
        private $GeCodPro, $GeNomPro, $GeProStock, $GePreCom, $GePreVen, $GeMedPro, $GeCatePro, $GeProCant, $GeProId;
        public function __construct(){
            parent::__construct();            
        }
        
        public function GetMedidas(){
            $sql= "SELECT * FROM genmedpro WHERE GeMedestado = 1";
            $data = $this->SelectAll($sql);
            return $data;
        }

        public function GetCategoria(){
            $sql = "SELECT * FROM genprocateg WHERE GeCatEstado = 1";
            $data = $this->SelectAll($sql);
            return $data;
        }

        public function GetProducto(){
            $sql = "SELECT
                        genproducto.id genproductoId, GeProCod, GeProDesc, GeProPreCom, GeProPreven, GeProStock, genmedpro.GeMedDes, GeProCan, genprocateg.GeCatDes, GeProEstado
                    FROM genproducto
                    inner join genprocateg on GeCatID = genprocateg.id
                    inner join genmedpro on GeMedId = genmedpro.id;";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrarProducto( string $GeCodPro, string $GeNomPro, string $GeProStock, string $GePreCom, string $GePreVen, int $GeMedPro, int $GeCatePro, int $GeProCant){
            $this->GeCodPro = $GeCodPro;
            $this->GeNomPro = $GeNomPro;
            $this->GeProStock = $GeProStock;
            $this->GePreCom = $GePreCom;
            $this->GePreVen = $GePreVen;
            $this->GeMedPro = $GeMedPro;
            $this->GeCatePro = $GeCatePro;
            $this->GeProCant = $GeProCant;


            $verificar = "SELECT * FROM genproducto WHERE GeProCod = '".$this->GeCodPro."' OR  GeProDesc = '".$this->GeNomPro."' ";
            $verificardo = $this->select($verificar);
                if (empty($verificardo)) {
                    $sql = "INSERT INTO genproducto(GeProCod, GeProDesc, GeProPreCom, GeProPreven, GeProStock, GeMedId, GeProCan, GeCatID)
                         VALUES(?,?,?,?,?,?,?,?)";
                    $datos = array($this->GeCodPro, $this->GeNomPro, $this->GePreCom, $this->GePreVen, $this->GeProStock, $this->GeMedPro, $this->GeProCant ,$this->GeCatePro );
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

        public function EditarPro(int $id){
            $sql = "SELECT * FROM genproducto WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
    }
?>



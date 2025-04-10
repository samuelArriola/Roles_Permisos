<?php 

class Producto extends Controller {

    public function __construct() {
        session_start();
        parent::__construct();
    }

    public function index(){
        if (empty($_SESSION['SessionOn'])) {
            header('Location:'.base_url);
        }
        $data['Medidas'] = $this->model->GetMedidas();
        $data['Categoria'] =  $this->model->GetCategoria(); 
        $this->views->cargarView($this,'index', $data);
    }

    public function GetProductos(){
        $data = $this->model->GetProducto();
        for ( $i = 0; $i < count($data); $i++) {
            if($data[$i]['GeProEstado'] == 1){
                $data[$i]['Estado'] = '<span class="badge text-bg-success">Activo</span>';
                $data[$i]['Opciones'] = '
                <div>                               
                    <button type="button" class="btn btn-primary" onclick="btnEdiPro('.$data[$i]['genproductoId'].')"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-danger" onclick= "DesactivarProducto('.$data[$i]['genproductoId'].')"><i class="bi bi-trash"></i></button>
                </div>
            ';
            }else{
                $data[$i]['Estado'] = '<span class="badge text-bg-danger">Inactivo</span>';
                $data[$i]['Opciones'] = '
                <div>                
                    <button type="button" class="btn btn-success" onclick= "ActivarProducto('.$data[$i]['genproductoId'].')"><i class="bi bi-arrow-left-right"></i></button>
                </div>
                ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function RegistrarPro(){  
        $GeProId = $_POST['GeProId'];
        $GeCodPro = $_POST['GeCodPro'];
        $GeNomPro = $_POST['GeNomPro'];
        $GeProStock = $_POST['GeProStock'];
        $GePreCom = $_POST['GePreCom'];
        $GePreVen = $_POST['GePreVen'];
        $GeMedPro = $_POST['GeMedPro'];
        $GeCatePro = $_POST['GeCatePro'];
        $GeProCant = $_POST['GeProCant'];
        if ( empty($GeCodPro) || empty($GeNomPro) || empty($GeProStock) || empty($GePreCom) || empty($GePreVen)  || empty($GeMedPro) || empty($GeCatePro) || empty($GeProCant) ) {
            $msg = array(
                "status"=> "Error",
                "message" => "Todos los campos son obligatorios"
            );
        }else{
             //Actualizar Producto
           if( !empty($GeProId) ){
               $data = $this->model->ActulizarProducto( $GeCodPro, $GeNomPro, $GeProStock, $GePreVen, $GePreCom, $GeMedPro, $GeCatePro, $GeProCant, $GeProId);
               if ($data == 'Actualizado') {
                   $msg = array(
                       "status"=> "Actualizado",
                       "message" => "Producto Actualizado"  
                   );
               }else{
                   $msg = array(
                       "status"=> "Error",
                       "message" => "Error al Actualizar Producto"  
                   );
               }
            }else{
                $data = $this->model->registrarProducto( $GeCodPro, $GeNomPro, $GeProStock, $GePreCom, $GePreVen, $GeMedPro, $GeCatePro, $GeProCant);
                if ($data == 'Ok') {
                    $msg = array(
                        "status"=> "Ok",
                        "message" => "Producto registrado con exito"
                        );
                }else if($data == "Existe"){
                    $msg = array(
                        "status"=> "Existe",
                        "message" => "Producto ya Registrado"
                    );
                }else{
                    $msg = array(
                        "status"=> "Error",
                        "message" => "Error al registrar Producto", $data
                    );
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function DesactivarPro( int $param){
        $data = $this->model->EliminarUsu(0,$param);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function ActivarPro(int $param){
        $data = $this->model->EliminarUsu(1, $param);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function EditarPro(int $param){
        $data = $this->model->EditarPro($param);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
    }



}


?>
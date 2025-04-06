<?php 
    class Conexion{
        private $con;
        Public function __construct(){
            $pdo = "mysql:host =".host."; dbname=".database."; charset =".charset ;
            try {
                $this->con = new PDO($pdo, "root", "");
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $th) { 
                echo "Error de Conexión: " . $th->getMessage();
            }
        }

        public function conect(){
            return $this->con;
        }
        
    }
?>
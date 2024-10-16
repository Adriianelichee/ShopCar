<?php
$dr = $_SERVER["DOCUMENT_ROOT"];


include_once "$dr/Repositorios/RepoCRUD.php";
include_once "$dr/Repositorios/Conexion.php";
include_once "$dr/Modelo/Marca.php";




class RepoMarca implements RepoCRUD{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    //METODOS CRUD
    public function create($marca){
        $this->conexion = Conexion::getConection();
        $brand = $marca->getMarca();
        $stmt = $this->conexion->prepare("SELECT * FROM marcas WHERE nombre = :marca");
        $stmt->bindParam(":marca", $brand);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return false;
            echo "La marca ya existe";
        } else {
            $stmt = $this->conexion->prepare("INSERT INTO marcas (nombre) VALUES (:marca)");
            $stmt->bindParam(":marca", $brand);
            return $stmt->execute();
       }
    }
    
    public function update($id,$obj){
    }

    
    public function delete($id){
    }
    public function getById($nombre){
        $this->conexion = Conexion::getConection();
        $stmt = $this->conexion->prepare("SELECT * FROM marcas WHERE nombre = :marca");
        $stmt->bindParam(":marca", $nombre);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            return new Marca($fila['nombre']);
        } else {
            return null; // Return null if no user is found
        }
    }
    
    public function getAll(){
        $this->conexion = Conexion::getConection();
        $stmt = $this->conexion->prepare("SELECT * FROM marcas"); //Prepara un statement para su ejecución y devuelve un objeto statement
        $stmt->execute(); //ejecuta el statement preparado
        
        $marcas = [];

        if ($stmt->rowCount() > 0) {
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $marcas[] = new Marca($fila['nombre']);
            }
            return $marcas;
        } else {
            return array(); 
        }
    }
    
    public function find($criterio){

    }
    public function count(){

    }
}
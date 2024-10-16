<?php
$dr = $_SERVER["DOCUMENT_ROOT"];

include_once "$dr/Repositorios/RepoCRUD.php";

class RepoUser implements RepoCRUD{

    private $conexion;

    public function __construct(){
    }
    //METODOS CRUD
    public function create($user){
        $this->conexion = Conexion::getConection();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $stmt = $this->conexion->prepare("SELECT * FROM users WHERE user = :user");
        $stmt->bindParam(":user", $username,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return false;
            echo "El usuario ya existe";
        } else {
            $stmt = $this->conexion->prepare("INSERT INTO users (user, password) VALUES (:user, :password)");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(":user", $username);
            $stmt->bindParam(":password", $hashedPassword);
            return $stmt->execute();
       }
    }
    
    public function update($id,$obj){
    }

    
    public function delete($id){
    }
    public function getById($username){        
        $this->conexion = Conexion::getConection();
        $stmt = $this->conexion->prepare("SELECT * FROM users WHERE user = :user");
        $stmt->bindParam(":user", $username);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($fila['user'], $fila['password']);
        } else {
            return null; // Return null if no user is found
        }
    }
    
    public function getAll(){
    }
    
    public function find($criterio){

    }
    public function count(){

    }


}
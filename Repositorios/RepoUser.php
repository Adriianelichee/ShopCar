<?php
$dr = $_SERVER["DOCUMENT_ROOT"];

include_once "$dr/Repositorios/RepoCRUD.php";

class RepoUser implements RepoCRUD{

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    //METODOS CRUD
    public function create($user){
        $username = $user->getUsername();
        $password = $user->getPassword();
        $stmt = $this->conexion->prepare("SELECT * FROM users WHERE user = :user");
        $stmt->execute(["user" => $username]);
        
        if($stmt->rowCount() > 0){
            return false;
            echo "El usuario ya existe";
        } else {
            $stmt = $this->conexion->prepare("INSERT INTO users (user, password) VALUES (:user, :password)");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            return $stmt->execute(["user" => $username, "password" => $hashedPassword]);
       }
    }
    
    public function update($id,$obj){
    }

    
    public function delete($id){
    }
    public function getById($username){        
        $stmt = $this->conexion->prepare("SELECT * FROM users WHERE user = :user");
        $stmt->execute(["user" => $username]);
    
        if ($stmt->rowCount() > 0) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($fila['user'], $fila['password']);
        } else {
            return null; 
        }
    }
    
    public function getAll(){
    }
    
    public function find($criterio){

    }
    public function count(){

    }


}
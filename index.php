<?php
$dr = $_SERVER["DOCUMENT_ROOT"];


require_once "$dr/Repositorios/RepoUser.php";
require_once "$dr/modelo/User.php";
require_once "$dr/Repositorios/Conexion.php";


 $username = $_POST["user"];
 $contraseña = $_POST["contra"];
 $conexion = Conexion::getConection();
 $repoUser = new RepoUser($conexion);

//  $user = new User($username, $contraseña);

//  if ($repoUser->create($user)){
//      echo "Usuario creado correctamente";
//  } else {
//      echo "Error al crear el usuario";
//  }
$user = $repoUser->getById($username);
var_dump($user);



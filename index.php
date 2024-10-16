<?php

require_once "micargador.php";

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



<?php
$dr = $_SERVER["DOCUMENT_ROOT"];


include_once "$dr/Repositorios/RepoUser.php";
include_once "$dr/modelo/User.php";
include_once "$dr/Repositorios/Conexion.php";


 $username = $_POST["user"];
 $contraseña = $_POST["contra"];

 $repoUser = new RepoUser();

//  $user = new User($username, $contraseña);

//  if ($repoUser->create($user)){
//      echo "Usuario creado correctamente";
//  } else {
//      echo "Error al crear el usuario";
//  }
$user = $repoUser->getById($username);


if ($user) {
    if (password_verify($contraseña, $user->getPassword())) {
        header("Location: Control/listamarcas.php");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "El usuario no existe";
}
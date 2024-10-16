<?php
//Comprobamos si esta logueado, tiene autorización para entrar y datos validos
//Obtencion de datos o realizar operacion
//Actualizo vista
/*Ejemplo: Pintor.pinta($array)*/

$dr = $_SERVER["DOCUMENT_ROOT"];

include_once "$dr/Repositorios/RepoMarca.php";
include_once "$dr/Vista/ClasePintor.php";

$repoMarca = new RepoMarca();


$marcas = $repoMarca->getAll();

Pintor::listamarcas($marcas);


<?php
spl_autoload_register(function($clase)
{
    $directorios = ["modelo","Repositorios","Helpers", "Control", "Vista"];
    $baseDIR=$_SERVER['DOCUMENT_ROOT'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/'));

    foreach ($directorios as $directorio) {
        $fichero = $baseDIR . "/" . $directorio . "/" . $clase . ".php";
        if(file_exists($fichero)){
            require_once $fichero;
        }
    }
});

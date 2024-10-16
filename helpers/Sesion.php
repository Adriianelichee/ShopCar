<?php
class Sesion {
    public static function iniciaSesion(){
        session_start();
    }
    
    public static function cerrarSesion(){
        session_destroy();
    }
    
    public static function leerSesion($user){
        if (isset($_SESSION[$user])){
            return $_SESSION[$user];
        } else{
            return "error";
        }
    }
    
    public static function escribirSesion($clave, $valor){
        $_SESSION[$clave] = $valor;
    }
    
    public static function Login($user){
        self::iniciaSesion();
        $_SESSION['user'] = $user;
    }
    
    public static function logout(){
        session_unset();
        self::cerrarSesion();
    }
    
    public static function estaLogeado(){
        return isset($_SESSION['user']);
    }
}

<?php
//TERMINADO
class Conexion{
    private static $con = null;
    public static function getConection():PDO{
        if (self::$con == null) {
            try {
                $username = "root"; 
                $password = "1234"; 
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                self::$con = new PDO("mysql:host=localhost;dbname=TiendaCoches", $username, $password, $opciones);
            } catch (PDOException $e) {
                die("Could not connect to the database TiendaCoches: " . $e->getMessage());
            }
        }
        return self::$con;
    }
}

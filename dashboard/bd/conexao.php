<?php 
class Conexao{	  
    public static function Conectar() {        
        define('servidor','remotemysql.com');
         define('nombre_bd','w4zimpQNrp');
         define('usuario','w4zimpQNrp');
         define('password','PGG4UgZ9vS');  				        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}
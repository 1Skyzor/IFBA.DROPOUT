<?php 
class Conexao{	  
    public static function Conectar() {        
         define('servidor','remotemysql.com');
         define('nome_db','w4zimpQNrp');
         define('usuario','w4zimpQNrp');
         define('password','PGG4UgZ9vS');  				        
        $op = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nome_db, usuario, password, $op);			
            return $conexion;
        }catch (Exception $e){
            die("O erro de conexão: ". $e->getMessage());
        }
    }
}
?>
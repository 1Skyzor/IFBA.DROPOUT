<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Início</h1>   
 <?php
define('PROJECT_ROOT_PATH', __DIR__);

include_once (PROJECT_ROOT_PATH . '/bd/conexao.php');
//include_once '/bd/conexion.php';
$objeto = new Conexao();
$conexao = $objeto->Conectar();

$consulta = "SELECT id, nome, usuario, email FROM usuarios";
$resultado = $conexao->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>  
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
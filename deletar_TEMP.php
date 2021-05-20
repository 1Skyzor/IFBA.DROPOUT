<?php
include_once ('bd/conexao.php');
$objeto = new Conexao();
$conexao = $objeto->Conectar();
$consulta = "DELETE FROM usuarios WHERE usuario = 'emerson'";
$resultado = $conexao->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
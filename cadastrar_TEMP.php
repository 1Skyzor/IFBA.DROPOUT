<?php
include_once ('bd/conexao.php');
$objeto = new Conexao();
$conexao = $objeto->Conectar();
$consulta = "INSERT INTO usuarios (usuario, senha, tipo, status) VALUES ('emerson', 'emerson', 'Admin', 'Ativo')";
$resultado = $conexao->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
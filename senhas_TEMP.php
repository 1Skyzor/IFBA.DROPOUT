<?php
include_once ('bd/conexao.php');
$objeto = new Conexao();
$conexao = $objeto->Conectar();

$consulta = "SELECT usuario, senha FROM usuarios";
$resultado = $conexao->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $dado){
    echo "usuario: ".$dado["usuario"];
    echo "<br>";
    echo "senha: ".$dado["senha"];
    echo "<br>";
}
?>  
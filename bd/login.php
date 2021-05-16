<?php
session_start();

include_once 'conexao.php';
$objeto = new Conexao();
$conexao = $objeto->Conectar();

//Recebendo dados enviados via POST do ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['senha'])) ? $_POST['senha'] : '';

//$senha = md5($password); //Encriptando a senha informada pelo usuário para compara-lá com a senha encriptada salva no BD

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha ' ";
$resultado = $conexao->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row) {
            $tipo =   $row['tipo'];
            $status =   $row['status'];
        
    }

    $_SESSION["s_usuario"] = $usuario;
    $_SESSION['s_tipo'] =   $tipo;
    $_SESSION['s_status'] = $status;

   
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexao=null;

//usuarios de pruebaen la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo
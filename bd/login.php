<?php
session_start();

include_once 'conexao.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $objeto = new Conexao();
    $conexao = $objeto->Conectar();

    //Recebendo dados enviados via POST do ajax
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $password = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    $retorno = [];


    //$senha = md5($password); //Encriptando a senha informada pelo usuário para compara-lá com a senha encriptada salva no BD

    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$password' LIMIT 1";
    $resultado = $conexao->prepare($consulta);
    $resultado->execute();

        if($resultado->rowCount() >= 1){
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $row) {
                $usuario =   $row['usuario'];
                $tipo =   $row['tipo'];
                $status =   $row['status'];
                       
            }

            $_SESSION["s_usuario"] = $usuario;
            $_SESSION["s_tipo"] =   $tipo;
            $_SESSION["s_status"] = $status;

            $retorno['usuario'] =   $usuario;
            $retorno['tipo'] =   $tipo;
            $retorno['status'] = $status;
               

        
        }else{
            $_SESSION["s_usuario"] = null;
            $_SESSION["s_tipo"] =  null;
            $_SESSION["s_status"] = null;
        }

    echo json_encode($retorno);
    $conexao=null;
    }else{

    exit("Fuera de aquí");
}
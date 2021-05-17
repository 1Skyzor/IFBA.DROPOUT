<?php
include_once '../bd/conexao.php';
$objeto = new Conexao();
$conexao = $objeto->Conectar();
// Recebendo os dados enviados via POST do JS

$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$senha = (isset($_POST['senha'])) ? md5($_POST['senha']) : ''; 
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$status = (isset($_POST['status'])) ? $_POST['status'] : '';
$opcao = (isset($_POST['opcao'])) ? $_POST['opcao'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcao){
    case 1: //Cadastrar
        $consulta = "INSERT INTO usuarios (nome, usuario, senha, email, tipo, status) VALUES('$nome', '$usuario', '$$senha','$email', '$tipo', '$status') ";		
        $resultado = $conexao->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT  id, nome, usuario, email, tipo, status, senha  FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $conexao->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
    case 2: //Atualizar
       
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha' ";
        $resultado = $conexao->prepare($consulta);
        $resultado->execute();

        if($resultado->rowCount() >= 1){
            $consulta = "UPDATE usuarios SET nome='$nome', usuario='$usuario', email='$email', tipo = '$tipo ', status = '$status' WHERE id='$id' ";		
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();  
        }else{
            $consulta = "UPDATE usuarios SET nome='$nome', usuario='$usuario', senha = '$senhaE', email='$email', tipo = '$tipo ', status = '$status' WHERE id='$id' ";		
            $resultado = $conexao->prepare($consulta);
            $resultado->execute(); 
            
        }      
        
        $consulta = "SELECT id, nome, usuario, email, tipo, status, senha FROM usuarios WHERE id='$id' ";       
        $resultado = $conexao->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;    

    case 3://Deletar
        $consulta = "DELETE FROM usuarios WHERE id='$id' ";		
        $resultado = $conexao->prepare($consulta);
        $resultado->execute();                           
        break; 
         
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //Envia o array final em formato json para JS
$conexao = NULL;

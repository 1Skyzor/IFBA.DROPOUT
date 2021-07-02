<?php
session_start();
include_once '../bd/conexao.php';
include_once 'conexao.php';
//usuario atual
$usuarioAtual = (isset($_SESSION["s_usuario"])) ? $_SESSION["s_usuario"] : '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $objeto = new Conexao();
    $conexao = $objeto->Conectar();
    // Recebendo os dados enviados via POST do JS
    
   
    //senha atual
    $senhaAtual = (isset($_POST['senhaAtual'])) ? $_POST['senhaAtual'] : '';

    $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    //$senha = (isset($_POST['senha'])) ? md5($_POST['senha']) : ''; 
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
    $status = (isset($_POST['status'])) ? $_POST['status'] : '';
    $opcao = (isset($_POST['opcao'])) ? $_POST['opcao'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $retorno = [];
    $retorno['id'] = 'ddd';

    switch ($opcao) {
        case 1: //Cadastrar

            $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();   
            if ($resultado->rowCount() >= 1) {
                $retorno['usuario'] = 'em_uso';
                break;

            }

            $consulta = "SELECT * FROM usuarios WHERE email='$email'";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();   
            if ($resultado->rowCount() >= 1) {
                $retorno['email'] = 'em_uso';
                break;

            }
           
           
            //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $consulta = "INSERT INTO usuarios (nome, usuario, senha, email, tipo, status) VALUES('$nome', '$usuario', '$senha','$email', '$tipo', '$status') ";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();

            $consulta = "SELECT id FROM usuarios WHERE usuario ='$usuario' AND senha='$senha'";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount() >= 1){
                $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($data as $row) {
                    $res_id =   $row['id'];
                    $retorno['id'] = $res_id;
                           
                }
            }

            
            $retorno['usuario'] = 'cadastrado';
            break;

        case 2: //Atualizar
            
            $consulta = "SELECT * FROM usuarios WHERE id='$id' ";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount() >= 1){
                $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($data as $row) {
                    $res_user =   $row['usuario'];
                    $res_email =   $row['email'];
                           
                }
            }
            if($res_email != $email){
                $consulta = "SELECT * FROM usuarios WHERE email='$email' ";
                $resultado = $conexao->prepare($consulta);
                $resultado->execute();
    
                if ($resultado->rowCount() >= 1) {
                    $retorno['email'] = 'em_uso';
                    break;
                    
                }
            }

            if($res_user != $usuario){
                $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
                $resultado = $conexao->prepare($consulta);
                $resultado->execute();
    
                if ($resultado->rowCount() >= 1) {
                    $retorno['usuario'] = 'em_uso';
                    break;
                    
                }
            }
             
            $consulta = "UPDATE usuarios SET nome='$nome', usuario='$usuario', senha = '$senha', email='$email', tipo = '$tipo ', status = '$status' WHERE id='$id' ";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();
            

            $retorno['usuario'] = 'atualizado';
            break;

        case 3: //Deletar
            $consulta = "DELETE FROM usuarios WHERE id='$id' ";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();
            $retorno['usuario'] = 'deletado';
            break;

        case 4: //Altualizar senha
            $consulta = "SELECT * FROM usuarios WHERE usuario='$usuarioAtual' ";
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount() >= 1){
                $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($data as $row) {
                    $res_senha =  $row['senha'];          
                }
            }
            if($res_senha != $senhaAtual){
                
                    $retorno['senha'] = 'nao_confere';
                    break;   
            }

            $consulta = "UPDATE usuarios SET senha = '$senha' WHERE usuario='$usuarioAtual' ";    
            $resultado = $conexao->prepare($consulta);
            $resultado->execute();
            $retorno['senha'] = 'atualizada';
            break;
    }

    echo json_encode($retorno); //Envia o array final em formato json para JS
    $conexao = NULL;
}else{
    echo $usuarioAtual;
    exit("OPS! DÁ O FORA ");
}

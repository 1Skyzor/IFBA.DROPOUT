<?php 
    include_once "bd/conexao.php"; 
    ini_set('display_errors', 0 );
    error_reporting(0);
    session_start();
?>
<head>

    <script src="jquery/jquery-3.3.1.min.js"></script>    
    <script src="bootstrap/js/bootstrap.min.js"></script>    
    <script src="popper/popper.min.js"></script>    
        
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php
        function checkToken($email, $token){
        $objeto = new Conexao();
        $conexao = $objeto->Conectar();
        
        $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE usuarios.email = :email");
        $consulta->bindValue(":email", $email);
        $consulta->execute();
        $data=$consulta->fetch(PDO::FETCH_ASSOC);
        
        if($data){
            $tokenCorreto = md5($data['email'].$data['senha']);
                if($token == $tokenCorreto){
                    return $data['usuario'];
                }
            }
        }

        function setNovaSenha($novasenha, $usuario){
            $objeto = new Conexao();
            $conexao = $objeto->Conectar();
            
            $consulta = $conexao->prepare("UPDATE usuarios SET senha = :novasenha WHERE usuario = :usuario");
            $consulta->bindValue(":novasenha", $novasenha);
            $consulta->bindValue(":usuario", $usuario);
            $consulta->execute();
        }

        $conexao = new Conexao();
        $email = $_POST['email'];
        $novasenha = $_POST['nova-senha'];
        $token = $_POST['token'];

        $token = preg_replace('/[^[:alnum:]]/','',$token);
        $email = preg_replace('/[^[:alnum:]_.-@]/','',$email);
        $senha = addslashes($novasenha);

        $result = checkToken($email, $token);

        if($result){
            $alterasenha = setNovaSenha($novasenha, $result);
            echo "<script>Swal.fire({type:'success',title:'Senha alterada'});</script>";
        }else{
            echo "<script>Swal.fire({type:'error',title:'Usuário não encontrado'});</script>";
        }
    ?>
</body>
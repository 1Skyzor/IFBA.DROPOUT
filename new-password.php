<?php 
    include_once "bd/conexao.php"; 
    include_once "bd/pass-recovery.php"; 
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
        $recovery = new Recovery();

        $conexao = new Conexao();
        $email = $_POST['email'];
        $novasenha = $_POST['nova-senha'];
        $token = $_POST['token'];

        $token = preg_replace('/[^[:alnum:]]/','',$token);
        $email = preg_replace('/[^[:alnum:]_.-@]/','',$email);
        $senha = addslashes($novasenha);

        $result = $recovery->checkToken($email, $token);

        if($result){
            $alterasenha = $recovery->setNovaSenha($novasenha, $result);
            echo "<script>Swal.fire({type:'success',title:'Senha alterada'});</script>";
        }else{
            echo "<script>Swal.fire({type:'error',title:'Usuário não encontrado'});</script>";
        }
    ?>
</body>
<?php include_once "bd/conexao.php"; ?>
<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Redefinir senha</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
       <!-- <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">-->
        
    </head>
    
    <body>
     
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">Redefinir Senha</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Enviar</button>
                    </div>
                </div>
            </form>
    </div>   
    
    <?php
        function gerarToken($email){
            $objeto = new Conexao();
            $conexao = $objeto->Conectar();

            $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE usuarios.email = :email");
            $consulta->bindValue(":email", $email);
            $consulta->execute();
            $data=$consulta->fetch(PDO::FETCH_ASSOC);

            if($data){
                $token = md5($data['email'].$data['senha']);
                return $token;
            }
        }
        

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $token = gerarToken($email);

            if($token){
                echo '<a href="http://localhost/change-password.php?token='.$token.'">http://127.0.0.1/change-password.php?token='.$token.'</a>';
            }else{
                echo "<script>alert('Usuário não encontrado');</script>";
            }
        }
        
    ?>
        
        
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="codigo.js"></script>    
    </body>
</html>
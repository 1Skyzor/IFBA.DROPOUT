<?php 
    include_once "bd/conexao.php"; 
    include("mailer/class.phpmailer.php");
    include("mailer/class.smtp.php");
    include("mailer/class.pop3.php");
    session_start();
?>
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

        <script src="jquery/jquery-3.3.1.min.js"></script>    
        <script src="bootstrap/js/bootstrap.min.js"></script>    
        <script src="popper/popper.min.js"></script>    
        
        <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
        
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
                $_SESSION["usuario"] = $data['usuario'];
                return $token;
            }
        }

        function email($para_email, $para_nome, $assunto, $html){
            $mail = new PHPMailer;
            $mail->IsSMTP();

            $mail->From = "ifba.dropout@gmail.com";
            $mail->FromName = "IFBA Dropout";

            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = "ifba.dropout@gmail.com";
            $mail->Password = "engsoftmAchinele%arning";

            $mail->AddAddress($para_email, $para_nome);

            $mail->Subject = $assunto;

            $mail->AltBody = "Para ver essa mensagem, use um software compatível com HTML!";

            $mail->MsgHTML($html);
            if($mail->Send()){
                return "1";
            }else{
                return $mail->ErrorInfo;
            }
        }

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $token = gerarToken($email);

            if($token){
                $link = 'Link para recuperação de senha: <a href="http://localhost/change-password.php?token='.$token.'">http://127.0.0.1/change-password.php?token='.$token.'</a>';
                $assunto = 'Redefinição de senha';
                $usuario = $_SESSION['usuario'];
                $controle = email($email, $usuario, $assunto, $link);
                var_dump($_GET);
                
                if($controle == "1"){
                    echo "<script>Swal.fire({type:'success',title:'Email de recuperação enviado'});</script>";
                }else{
                    echo "<script>Swal.fire({type:'error',title:'Ocorreu um erro'});</script>";
                }
            }else{
                echo "<script>Swal.fire({type:'error',title:'Usuário não encontrado'});</script>";
            }
        }
        session_destroy();
        
    ?>
        
        
 
    </body>
</html>
<?php
session_start();
?>
<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login - DROPOUT IFBA</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
       <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>
     
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">LOGIN</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuário">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="senha" name="senha" placeholder="Senha">
                    <input type="hidden"  display = "none" id="passa_status" value='<?php echo $_SESSION['s_status'] ?>'>
                    <input type="hidden"  display = "none" id="passa_tipo" value='<?php echo $_SESSION['s_tipo'] ?>'>

                    <span class="focus-efecto"></span>
                </div>            
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Entrar</button>    
                    </div>
                </div>
            </form>
            <hr>
            <div class="text-center">
                 <a class="small" href="forgot-password.php">Esqueceu sua senha?</a>
            </div>
        </div>

        <!-- Footer -->
        
    </div>     
    <div class="copyright text-center my-auto">
            <span> Copyright <?php echo date('Y'); ?>
             &copy; DROPOUT IFBA - Desenvolvido por Aviário Dev      - Todos os direitos reservados. </span>
            
          </div>
        
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="codigo.js"></script>    
    </body>
</html>

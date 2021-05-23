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
    <?php
        $token = "";

        if(isset($_GET['token'])){
            $token = preg_replace('/[^[:alnum:]]/','',$_GET['token']);
    ?>

    <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formAlterarSenha" action="new-password.php" method="post">
                
                <div class="wrap-input100">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="password" id="nova-senha" name="nova-senha" placeholder="Digite a nova senha">
                </div>
                <input type="hidden" name="token" value = "<?php echo $token; ?>">
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Alterar senha</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
    
    <?php
        }else{
            echo 'Página não encontrada';
        }
    ?>

    <script src="jquery/jquery-3.3.1.min.js"></script>    
    <script src="bootstrap/js/bootstrap.min.js"></script>    
    <script src="popper/popper.min.js"></script>    
        
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
    <script src="codigo.js"></script> 
    </body>
</html>
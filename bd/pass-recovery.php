<head>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<?php
include_once "conexao.php"; 
ini_set('display_errors', 0 );
error_reporting(0);
session_start();

class Recovery{
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
    
    public static function gerarToken($email){
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

    function ConfigurarEmail($para_email, $para_nome, $assunto, $html){
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
    function EnviarLink(){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $token = $this->gerarToken($email);

            if($token){
                $link = 'Link para recuperação de senha: <a href="http://localhost/change-password.php?token='.$token.'">http://127.0.0.1/change-password.php?token='.$token.'</a>';
                $assunto = 'Redefinição de senha';
                $usuario = $_SESSION['usuario'];
                $controle = $this->ConfigurarEmail($email, $usuario, $assunto, $link);
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
    }
}
?>
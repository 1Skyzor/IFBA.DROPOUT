---
id: doc6
title: Redefinir Senha
sidebar_label: Redefinir Senha
---

# Formulário de Redefinição
```
1  <div class="container-login">
2    <div class="wrap-login">
3        <form class="login-form validate-form" id="formLogin" action="" method="post">
4            <span class="login-form-title">Redefinir Senha</span>
5                
6            <div class="wrap-input100" data-validate = "Usuario incorrecto">
7                <input class="input100" type="text" id="email" name="email" placeholder="Email">
8                <span class="focus-efecto"></span>
9            </div>
10            
11            <div class="container-login-form-btn">
12                <div class="wrap-login-form-btn">
13                    <div class="login-form-bgbtn"></div>
14                    <button type="submit" name="submit" class="login-form-btn">Enviar</button>
16                </div>
16            </div>
17        </form>
18  </div>
```

Na linha 7 é recebido o email do usuário, que é enviado via Post ao submeter o formulário.

# Classe Redefinição
```
1 class Recovery{
2     function checkToken($email, $token){
3         $objeto = new Conexao();
4         $conexao = $objeto->Conectar();
5        
6         $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE usuarios.email = :email");
7         $consulta->bindValue(":email", $email);
8         $consulta->execute();
9         $data=$consulta->fetch(PDO::FETCH_ASSOC);
10        
11         if($data){
12            $tokenCorreto = md5($data['email'].$data['senha']);
13                 if($token == $tokenCorreto){
14                     return $data['usuario'];
15                 }
16             }
17     }
18     function setNovaSenha($novasenha, $usuario){
19         $objeto = new Conexao();
20         $conexao = $objeto->Conectar();
21        
22         $consulta = $conexao->prepare("UPDATE usuarios SET senha = :novasenha WHERE usuario = :usuario");
23         $consulta->bindValue(":novasenha", $novasenha);
24         $consulta->bindValue(":usuario", $usuario);
25         $consulta->execute();
26     }
27    
28     public static function gerarToken($email){
29         $objeto = new Conexao();
30         $conexao = $objeto->Conectar();
31
32         $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE usuarios.email = :email");
33         $consulta->bindValue(":email", $email);
34         $consulta->execute();
35         $data=$consulta->fetch(PDO::FETCH_ASSOC);
36
37         if($data){
38             $token = md5($data['email'].$data['senha']);
39             $_SESSION["usuario"] = $data['usuario'];
40             return $token;
41         }
42     }
43
44     function ConfigurarEmail($para_email, $para_nome, $assunto, $html){
45         $mail = new PHPMailer;
46         $mail->IsSMTP();
47
48         $mail->From = "xxxxx.xxxxx@xxxxxx.xxx";
49         $mail->FromName = "IFBA Dropout";
50
51         $mail->Host = "smtp.xxxxx.com";
52         $mail->Port = 999;
53         $mail->SMTPAuth = true;
54         $mail->Username = "xxxxx.xxxxx@xxxxxx.xxx";
55         $mail->Password = "xxxxxxxxxxxxxxxxxxxxxx";
56
57         $mail->AddAddress($para_email, $para_nome);
58
59         $mail->Subject = $assunto;
60
61         $mail->AltBody = "Para ver essa mensagem, use um software compatível com HTML!";
62
63         $mail->MsgHTML($html);
64         if($mail->Send()){
65             return "1";
66         }else{
67             return $mail->ErrorInfo;
68         }
69     }
70     function EnviarLink(){
71         if(isset($_POST['email'])){
72             $email = $_POST['email'];
73             $token = $this->gerarToken($email);
74
75             if($token){
76                 $link = 'Link para recuperação de senha: <a href="http://localhost/change-password.php?token='.$token.'">http://127.0.0.1/change-password.php?token='.$token.'</a>';
77                 $assunto = 'Redefinição de senha';
78                 $usuario = $_SESSION['usuario'];
79                 $controle = $this->ConfigurarEmail($email, $usuario, $assunto, $link);
80                 var_dump($_GET);
81                 
82                 if($controle == "1"){
83                     echo "<script>Swal.fire({type:'success',title:'Email de recuperação enviado'});</script>";
84                 }else{
85                     echo "<script>Swal.fire({type:'error',title:'Ocorreu um erro'});</script>";
86                 }
87             }else{
88                 echo "<script>Swal.fire({type:'error',title:'Usuário não encontrado'});</script>";
89             }
90         }
91         session_destroy();
92     }
93 }
```
A classe <em>Recovery</em> possui todos as funções utilizados no processo de recuperação senha, que envolve: 1) gerar token de recuperação  2) verificar token de recuperação 3) setar nova senha 3) configurar email para envio de token 4) envio de token.

A função <em>gerarToken</em> é responsável por gerar um token a partir do email do usuário, que é recebido como parâmetro. Primeiramente é realizada uma conexão com o banco de dados (linha 30). Depois é feita uma consulta buscando pelo email recebido como parâmetro (linha 34), e o resultado é armazenado na variável <em>$data</em> variável (linha 35). Caso a variável <em>$data</em> não esteja vazia (linha 37), é gerado o token através da concatenação do email e a senha do usuário criptografados utilizando o algoritmo md5 (linha 38).

A função <em>checkToken</em> recebe um email e um token como parâmetro e realiza uma conexão com o banco de dados (linha 4), logo após, realiza uma consulta no banco buscando pelo email recebido como parâmetro (linha 8). Na linha 9, é armazenado o resultado da consulta, que caso não seja vazio (linha 11), é verificado se o token recebido é corresponde aos pârametros recebidos pela função.

A função <em>ConfigurarEmail</em>, é responsável por realizar a configuração de envio de email do PHPMailer ([<strong><font color = "blue">ver documentação</font></strong>](https://phpmailer.github.io/PHPMailer/classes/PHPMailer.PHPMailer.PHPMailer.html)), é responsável por realizar as configurações de envio de email.

A função <em>Enviar Link</em> é responsável por enviar o token de recuperação por meio de um link para o email do usuário. Primeiramente ela verifica se o email foi submetido através do formulário (linha 71) e gera um token chamando a função <em>gerarToken</em> passando o email como parâmetro (linha 73), armazenando na variácel <em>$token</em>. Caso a variável <em>$token</em> não esteja vazia, é gerado o link de redefinição (linha 76), depois é feita a configuração do email de destino (linha 79), armazenando na variável <em>$controle</em>. Caso a variável <em>$controle</em> seja == 1, significa que o email foi enviado, do contrário, não foi enviado. Caso a variável token esteja vazia, significa que o usuário não existe no sistema.
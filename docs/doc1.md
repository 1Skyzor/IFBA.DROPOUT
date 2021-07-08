---
id: doc1
title: Efetuar Login
sidebar_label: Efetuar Login
---

## Formulário de Login

```
1    <form class="formLogin" id="formLogin" action="" method="POST">
2        <span class="login-form-title">LOGIN</span>
3        <div class="wrap-input100" data-validate = "Usuario incorrecto">
4            <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuário">
5            <span class="focus-efecto"></span>
6        </div>
7                
8        <div class="wrap-input100" data-validate="Password incorrecto">
9            <input class="input100" type="password" id="senha" name="senha" placeholder="Senha">
10            <input type="hidden"   id="passa_status" value='<?php echo $_SESSION['s_status']; ?>'>
11            <input type="hidden"  id="passa_tipo" value='<?php echo $_SESSION['s_tipo']; ?>'>
12
13            <span class="focus-efecto"></span>
14        </div>            
15        <div class="container-login-form-btn">
16            <div class="wrap-login-form-btn">
17                <div class="login-form-bgbtn"></div>
18                <button type="submit" name="submit" class="login-form-btn">Entrar</button>    
19            </div>
20        </div>
21    </form>
```
O formulário <em>formLogin</em> é responsável por receber as informações de login do usuário.

O id do usuário é recebido na linha 4 e a senha na linha 9. As linhas 10 e 11 são responsáveis por verificar o status e o tipo do usuário respectivamente.

Após submetido (linha 18), o formulário envia os dados via POST para serem validados.

Após a validação, é informado na linha 3 através do data-validate que o usuário está incorreto, caso os dados fornecidos não passem na validação. De maneira semelhante é apresentado uma mensagem na linha 8 informando que a senha está incorreta, caso não passe na validação.

## Validação de Login

```
1 $(document).on("submit", ".formLogin", function(e){
2  
3    e.preventDefault();
4    var $form = $(this);
5    var data_form = {
6    usuario : $("input[id='usuario']",$form).val(),    
7    senha : $("input[id='senha']", $form).val() 
8    } 
9    //confirm("USER "+data_form.usuario);  
10    if(data_form.usuario.length == "" || data_form.senha == ""){
11       Swal.fire({
12           type:'warning',
13           title:'O usuário e a senha devem ser informados.',
14       });
15       return false; 
16     }else{
17         //var url_php = 'bd/login.php';
18         $.ajax({
19            url:'bd/login.php',
20            type:"POST",
21            datatype: "json",
22            data: data_form, 
23            async: true,
24            
25         })
26         .done(function ajaxDone(res){   
27               //confirm("USER "+res.usuario);  
28                     
29                if(res.status == undefined){ 
30                    Swal.fire({
31                        type:'error',
32                        title:'Usuário e/ou senha inválido(s)',
33                    });
34 
35                }
36                else{
37                 //confirm("STATUS"+res.status);            
38                 if(res.status == "Inativo"){
39                     Swal.fire({
40                         type:'warning',
41                         title:'Sua conta está desativada, recomendamos que entre em contato com a admistratação.',
42                     });
43                     return false;   
44                  }else{
45                   //confirm("TIPO "+res.tipo);
46                    
47                     if(res.tipo == "Admin" || res.tipo == "Simples"){
48                         Swal.fire({
49                             type:'success',
50                             title:'Bem-vindo(a) '+res.usuario+'!',
51                             confirmButtonColor:'#3085d6',
52                             confirmButtonText:'Entrar'
53                             }).then((result) => {
54                             if(result.value){
55                                 //window.location.href = "vistas/pag_inicio.php";
56                                 window.location.href = "dashboard/index.php";
57                             }
58                             })
59 
60                         }
74                   }
75                 }
76                
77         })
78     }     
79 });
```
Para a validação é feita assim que o formuário é submetido. Primeiramente é feita uma validação na linha 10, onde  é verificado se o campo de usuário está vazio, em caso afirmativo um alerta é apresentado ao usuáio.

Caso o campo usuário não esteja vazio, é feita uma requisição assíncrona com Ajax (linha 18), onde é feita uma requisição do arquivo <em>login.php</em> que é responsável pelas consultas ao banco de dados.

Na linha 29 é feita uma verificação do status do usuário, onde caso seja inexistente significa que o usuário não existe.

Na linha 38 é verificado se o status é <em>Inativo</em>, caso positivo, é emitido um alerta informando ao usuário que a conta está desativada.

Caso o status do usuário não seja <em>Inativo</em>, é verificado se o tipo do usuário é <em>Admin</em> ou <em>Simples</em> (linha 47), sendo estas as únicas opções possíveis. Caso passe na validação, é emitido um alerta ao usuário informando que o login foi bem sucedido, apresentando a mensagem <em>"Bem-vindo(a) + nome do usuário"</em>, além do botão <em>Entrar</em>, então o usuário é redirecionado para a página inicial do site (linha 56).
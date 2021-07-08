---
id: doc11
title: CRUD
sidebar_label: CRUD
---
O <em>crud.php</em> é responsárvel por realizar as operação básicas envolvendo o banco de dados (Create, Read, Delete, Update). Nele é feito o cadastro de usuários, atualização de dados do usuário, deleção de usuários e, alteração de senha do usuário.
```
1
2 session_start();
3 include_once '../bd/conexao.php';
4 include_once 'conexao.php';
5 //usuario atual
6 $usuarioAtual = (isset($_SESSION["s_usuario"])) ? $_SESSION["s_usuario"] : '';
7
8 if($_SERVER['REQUEST_METHOD'] == 'POST'){
9     $objeto = new Conexao();
10     $conexao = $objeto->Conectar();
11     // Recebendo os dados enviados via POST do JS
12    
13   
14     //senha atual
15     $senhaAtual = (isset($_POST['senhaAtual'])) ? $_POST['senhaAtual'] : '';
16
17     $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
18     $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
19     $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
20     //$senha = (isset($_POST['senha'])) ? md5($_POST['senha']) : ''; 
21     $email = (isset($_POST['email'])) ? $_POST['email'] : '';
22     $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
23     $status = (isset($_POST['status'])) ? $_POST['status'] : '';
24     $opcao = (isset($_POST['opcao'])) ? $_POST['opcao'] : '';
25     $id = (isset($_POST['id'])) ? $_POST['id'] : '';
26     $retorno = [];
27     $retorno['id'] = 'ddd';
28
29     switch ($opcao) {
30         case 1: //Cadastrar
31
32             $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
33             $resultado = $conexao->prepare($consulta);
34             $resultado->execute();   
34             if ($resultado->rowCount() >= 1) {
35                 $retorno['usuario'] = 'em_uso';
36                 break;
37
38             }
39
40             $consulta = "SELECT * FROM usuarios WHERE email='$email'";
41             $resultado = $conexao->prepare($consulta);
42             $resultado->execute();   
43             if ($resultado->rowCount() >= 1) {
44                 $retorno['email'] = 'em_uso';
45                 break;
46
47            }
48           
49           
50             //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
51             $consulta = "INSERT INTO usuarios (nome, usuario, senha, email, tipo, status) VALUES('$nome', '$usuario', '$senha','$email', '$tipo', '$status') ";
52             $resultado = $conexao->prepare($consulta);
53             $resultado->execute();
54
55             $consulta = "SELECT id FROM usuarios WHERE usuario ='$usuario' AND senha='$senha'";
56             $resultado = $conexao->prepare($consulta);
57             $resultado->execute();
58             if($resultado->rowCount() >= 1){
59                 $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
60    
61                 foreach ($data as $row) {
62                     $res_id =   $row['id'];
63                     $retorno['id'] = $res_id;
64                           
65                 }
66             }
67
68            
69             $retorno['usuario'] = 'cadastrado';
70             break;
71
72         case 2: //Atualizar
73            
74             $consulta = "SELECT * FROM usuarios WHERE id='$id' ";
75             $resultado = $conexao->prepare($consulta);
76             $resultado->execute();
77             if($resultado->rowCount() >= 1){
78                 $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
79    
80                 foreach ($data as $row) {
81                     $res_user =   $row['usuario'];
82                     $res_email =   $row['email'];
83                           
84                 }
85             }
86             if($res_email != $email){
87                 $consulta = "SELECT * FROM usuarios WHERE email='$email' ";
88                 $resultado = $conexao->prepare($consulta);
89                 $resultado->execute();
90    
91                 if ($resultado->rowCount() >= 1) {
92                     $retorno['email'] = 'em_uso';
93                     break;
94                    
95                 }
96             }
97
98             if($res_user != $usuario){
99                 $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
100                 $resultado = $conexao->prepare($consulta);
101                 $resultado->execute();
102    
103                 if ($resultado->rowCount() >= 1) {
104                     $retorno['usuario'] = 'em_uso';
105                     break;
106                    
107                 }
108             }
109             
110             $consulta = "UPDATE usuarios SET nome='$nome', usuario='$usuario', senha = '$senha', email='$email', tipo = '$tipo ', status = '$status' WHERE id='$id' ";
111             $resultado = $conexao->prepare($consulta);
112             $resultado->execute();
113            
114
115             $retorno['usuario'] = 'atualizado';
116             break;
117
118         case 3: //Deletar
119             $consulta = "DELETE FROM usuarios WHERE id='$id' ";
120             $resultado = $conexao->prepare($consulta);
121             $resultado->execute();
122             $retorno['usuario'] = 'deletado';
123             break;
124
125         case 4: //Altualizar senha
126             $consulta = "SELECT * FROM usuarios WHERE usuario='$usuarioAtual' ";
127             $resultado = $conexao->prepare($consulta);
128             $resultado->execute();
129             if($resultado->rowCount() >= 1){
130                 $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
131    
132                 foreach ($data as $row) {
133                     $res_senha =  $row['senha'];          
134                 }
135             }
136             if($res_senha != $senhaAtual){
137                
138                     $retorno['senha'] = 'nao_confere';
139                     break;   
140             }
141
142             $consulta = "UPDATE usuarios SET senha = '$senha' WHERE usuario='$usuarioAtual' ";    
143             $resultado = $conexao->prepare($consulta);
144             $resultado->execute();
145             $retorno['senha'] = 'atualizada';
146             break;
147     }
148
```
O CRUD foi estruturado em um <em>switch</em> (linha 29), onde o <em>case 1</em> (linha 30) é responsável pelo cadastro, o <em>case 2</em> (linha 72) é responsável por atualizar, o <em>case 3</em> (linha 118) é responsável por deletar e, o case <em>case 4</em> (linha 125) é responsável por atualizar senha.

- <em>case 1</em>
   
    Este case só está disponível no front-end para usuários Administradores.

    Primeiramente é realizada uma consulta no banco de dados (linha 34), buscando se o usuário que deseja cadastar já existe, depois é feito o mesmo processo com o email (linhas 40 à 47). Caso exista o fluxo é interrompido (linha 36 para usuário, linha 45 para email). Caso não existam, é inserido no banco de dados, o nome, usuário, senha, email, tipo e o status, que são passados pelo administrador ao realizar um cadastro, além do id, que é autoincremento (linha 53). Depois, é verificado se o usuário foi devidamente cadastrado (linhas 55 à 65). E por fim, é atribuído à variável <em>$retorno</em> o valor 'cadastrado', para indicar que o usuário foi cadastrado com sucesso (linha 69), e o fluxo se encerra na linha 70. 

- <em>case 2</em>

    Este case só está disponível no front-end para usuários Administradores.

    Primeiramente é realizada uma consulta no banco de dados (linha 76), buscando o usuário que se deseja atualizar, caso a consulta retorne algum valor (linha 77), é armazenado na variável <em>$data</em> (linha 78). O email e senha atuais são armazenados em variáveis (linhas 81 e 82). Depois, é realizada uma verificação se o novo email é diferente do email atual (linha 86), caso positivo, é verificado se o novo email já existe no banco de dados (linha 89), caso positivo, é armazenado na variável <em>$retorno</em> (linha 92) um sinal indicando que o email já está em uso. Todo o processo é repetido para <em>usuário</em> (linhas 98 à 108). Caso nem o novo email e nem o novo usuário já estejam cadastrados, é feita a devida atualização de seus dados (linha 112), e atribuída à variável <em>$retorno</em> a mensagem 'atualizado' (linha 115), indicando que os dados foram atualizados com sucesso, finalizando o fluxo na linha 116.
- <em>case 3</em>
    Este case só está disponível no front-end para usuários Administradores.

    Neste case é feita a remoção de um usuário do banco de dados, onde o id no banco seja igual ao id do usuário que se deseja deletar (linhas 119 à 121). Por fim, é atribuído um sinal à variável <em>$retorno</em>, indicando que o usuário foi deletado com sucesso.
- <em>case 4</em>
    Este case está disponível no front-end para todos os tipos de usuário.

    Primeiramente é realizada uma consulta no banco de dados, buscando pelo usuário atual (linhas 126 à 128). Caso haja retorno (linha 129), a senha atual é armazenada em variável (linha 133). Caso a senha atual seja diferente da senha encontrada (linha 136), o fluxo é interrompido (linha 139). Caso passe nas verificações anteriores, a senha é substituida pela nova senha (linhas 142 à 144), e por fim, é armazenado um sinal na variável <em>$retorno</em>, indicando que a senha foi atualizada com sucesso (linha 145), finalizando o <em>case</em> na linha 146.
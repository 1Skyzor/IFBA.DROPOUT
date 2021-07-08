---
id: doc10
title: Alterar Senha
sidebar_label: Alterar Senha
---

# Teste

```
    $objeto = new Conexao();
    $conexao = $objeto->Conectar();
    // Recebendo os dados enviados via POST do JS
    
   
    //senha atual
    $senhaAtual = (isset($_POST['senhaAtual'])) ? $_POST['senhaAtual'] : '';

    $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    //$senha = (isset($_POST['senha'])) ? md5($_POST['senha']) : ''; 
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
    $status = (isset($_POST['status'])) ? $_POST['status'] : '';
    $opcao = (isset($_POST['opcao'])) ? $_POST['opcao'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $retorno = [];
    $retorno['id'] = 'ddd';
    
1    case 4: //Altualizar senha
2        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuarioAtual' ";
3        $resultado = $conexao->prepare($consulta);
4        $resultado->execute();
5        if($resultado->rowCount() >= 1){
6            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
7    
8            foreach ($data as $row) {
9                    $res_senha =  $row['senha'];          
10            }
11        }
12        if($res_senha != $senhaAtual){
13                
14                $retorno['senha'] = 'nao_confere';
15                break;   
16        }
17
18        $consulta = "UPDATE usuarios SET senha = '$senha' WHERE usuario='$usuarioAtual' ";    
19        $resultado = $conexao->prepare($consulta);
20        $resultado->execute();
21        $retorno['senha'] = 'atualizada';
22        break;
23    }
```
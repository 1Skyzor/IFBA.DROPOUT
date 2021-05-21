<?php 
ini_set('display_errors', 0 );
error_reporting(0);
session_start();
if($_SESSION["s_tipo"] != "Admin"){
    header('Location: index.php');
	exit();
}

require_once "vistas/parte_superior.php"
?>

<!--INICIO del cont principal-->
<div class="container">
        <h1>Gerenciamento de Usuários</h1>
        
    <?php
    define('PROJECT_ROOT_PATH', __DIR__);

    include_once (PROJECT_ROOT_PATH . '/bd/conexao.php');
    $objeto = new Conexao();
    $conexao = $objeto->Conectar();

    $consulta = "SELECT id, nome, usuario, email, tipo, status, senha FROM usuarios";
    $resultado = $conexao->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <div class="container">
            <div class="row">
                <div class="col-lg-12">            
                <button id="btnCadastrar" type="button" class="btn btn-success" data-toggle="modal">Cadastrar</button>    
                </div>    
            </div>    
        </div>    
        <br>  
    <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table id="tabelaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Usuário</th>                                 
                                    <th>Email</th>
                                    <th>Tipo</th> 
                                    <th>Status</th> 
                                   <!--  <th style="display:none;"  >Senha</th> -->
                                    <th>Acões</th>
                                    
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                            
                                foreach($data as $dat) { 
                                 
                                ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['nome'] ?></td>
                                    <td><?php echo $dat['usuario'] ?></td>
                                    <td><?php echo $dat['email'] ?></td> 
                                    <td><?php echo $dat['tipo'] ?></td>
                                    <td><?php echo $dat['status'] ?></td> 
                                   <!--  <td style="display:none;" ><?php echo $dat['senha'] ?></td>    -->
                                    <td></td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                        </table>                    
                        </div>
                    </div>
            </div>  
        </div>    
        
    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form id="formUsuarios">    
                <div class="modal-body">
                    <div class="form-group">
                    <label for="nome" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                    <label for="usuario" class="col-form-label">Usuário:</label>
                    <input type="text" class="form-control" id="usuario">
                    </div> 
                    <div class="form-group">
                    <label for="senha" class="col-form-label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="conf-senha" class="col-form-label">Confirmar Senha:</label>
                    <input type="password" id="conf-senha" name="conf-senha" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="email">
                    </div>                  
                    <div class="form-group">
                    <input type="checkbox" value="on" name="cb-adm" id="cb-adm"> Administrador(a)
                    </div> 
                    <div class="form-group">
                    <input type="checkbox" value="on" name="cb-ativo" id="cb-ativo" checked> Ativo(a)
                    </div>   

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnSalvar" class="btn btn-success">Salvar</button>
                </div>
            </form>    
            </div>
        </div>
    </div>

</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>
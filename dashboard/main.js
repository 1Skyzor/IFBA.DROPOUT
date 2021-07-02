$(document).ready(function(){
    tabelaUsuarios = $("#tabelaUsuarios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnDeletar'>Deletar</button></div></div>"  
       }],

       "order": [[ 0, "desc" ]],
    "language": {
            "lengthMenu": "Número de registros exibidos:_MENU_",
            "zeroRecords": "Nenhum registro encontrado!",
            "info": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
            "infoFiltered": "(filtrado de um total de _MAX_ registros)",
            "sSearch": "Pesquisar:",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sLast":"Último",
                "sNext":"Próximo",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Carregando...",
        }
    });
    
$("#btnCadastrar").click(function(){
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Cadastrar Usuário");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcao = '1'; //alta
    
}); 

$("#editSenha").click(function(){
    $("#formAltDados").trigger("reset");
    $(".modal-header").css("background-color", "#224abe");
    $(".modal-header").css("color", "white");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Alterar Senha");            
    $("#modalAlter").modal("show");        
    id=null;
    opcao = '4'; //alta
    
}); 

var fila; //Captura a linha para editar ou deletar o registro
  
//Botão Editar    
$(document).on("click", ".btnEditar", function(){
 
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nome = fila.find('td:eq(1)').text();
    usuario = fila.find('td:eq(2)').text();
    email = fila.find('td:eq(3)').text();
    tipoOriginal = fila.find('td:eq(4)').text();
    statusOriginal =  fila.find('td:eq(5)').text();
    senha = fila.find('td:eq(6)').text();
    
    

    $("#nome").val(nome);
    $("#usuario").val(usuario);
    $("#senha").val(senha);
    $("#conf-senha").val(senha);
    $("#email").val(email);
  
   
    if (tipoOriginal == "Admin") {
       
        document.getElementById("cb-adm").checked = true;
     }else{
        
        document.getElementById("cb-adm").checked = false;
     }

     if (statusOriginal == "Ativo") {

        document.getElementById("cb-ativo").checked = true;
     }else{

        document.getElementById("cb-ativo").checked = false;
     }
    
    opcao = '2'; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Atualizar Usuário");            
    $("#modalCRUD").modal("show"); 
      
    
});
 

//Botão Deletar
$(document).on("click", ".btnDeletar", function(){    
    fila = $(this);
    id = $(this).closest("tr").find('td:eq(0)').text();
    user = $(this).closest("tr").find('td:eq(1)').text();
    opcao = 3; //Deletar 
    var respuesta =  false;   
    Swal.fire({
        title: 'Tem certeza?',
        text: "Realmente deseja deletar o usuário \""+user+"\" ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00a000',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deletar',
        cancelButtonText: 'Cancelar'
        
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                datatype:"json",    
                data:  {opcao:opcao, id:id},    
                success: function() {
                  tabelaUsuarios.row(fila.parents('tr')).remove().draw(); 
                  Swal.fire('Deletado!','O usuário foi deletado.','success')                   
                 }
              });	
            
                       
        }  
    }); 
    
      
});

$.fn.myFunction = function(data_form) { 
    /* confirm("Entrou ");  */
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data:data_form,
        async: true,
        })
       .done(function ajaxDone(res){

       
            console.log(res.usuario);
            console.log(res.email);
            console.log(res.senha); 
            console.log(res.nome); 
            console.log(res.opcao); 
            console.log(res.id);
            if(res.usuario == "em_uso"){

                Swal.fire({
                    icon:'warning',
                    title:'O usuário informado já esta em uso, por favor, tente outro.',
                });
                return false;  
            }else {
                if(res.email == "em_uso"){

                    Swal.fire({
                        icon:'warning',
                        title:'O email informado já esta em uso, por favor, tente outro.',
                    });
                 
                   return false; 
                }else{
                    
                    id = data_form.id;            
                    nome = data_form.nome;
                    usuario = data_form.usuario;
                    email = data_form.email;
                    tipo = data_form.tipo;            
                    status = data_form.status;
                    senha = data_form.senha; 
                    opcao = data_form.opcao; 
                    $("#modalCRUD").modal("hide");
                    if(res.usuario == "atualizado"){
                 
                    tabelaUsuarios.row(fila).data([id,nome,usuario,email,tipo,status,senha]).draw();
                    Swal.fire({
                        icon:'success',
                        title:'Informações atualizadas com sucesso!',
                    });

                    }else{
                    id = res.id;
                    tabelaUsuarios.row.add([id,nome,usuario,email,tipo,status,senha]).draw();
                    var table = $('#tabelaUsuarios').DataTable();
                    
                    // Esconde a coluna das senhas
                    table.columns( [6] ).visible( false );
                   
                    Swal.fire({
                        icon:'success',
                        title:'Usuário cadastrado com sucesso!',
                    });

                     }

                }
                
            }
 
        })


  };

// Salvando dados
$(document).on("submit", ".formUsuarios", function(e){
    e.preventDefault(); 
    var $form = $(this);


    cbADM = document.getElementById("cb-adm");
    cbATV = document.getElementById("cb-ativo");

    if (cbADM.checked) {
       tipo = 'Admin';
    } else {
        tipo = 'Simples';
    }  
    
    if (cbATV.checked) {
        status = 'Ativo';
     } else {
        status = 'Inativo';
     }
    
    var data_form = { 
        id:id,
        opcao:opcao,
        nome: $.trim($("#nome").val()),
        usuario: $.trim($("#usuario").val()),
        senha: $.trim($("#senha").val()),
        tipo: tipo,
        status: status, 
        confSenha: $.trim($("#conf-senha").val()),
        email: $.trim($("#email").val())
    }
    //confirm("OPCAO "+data_form.opcao);  
    //confirm("ID "+data_form.id);  
    if(data_form.usuario.length == "" || data_form.senha == "" ||data_form.confSenha == "" || data_form.nome == "" || data_form.email == ""){
        Swal.fire({
            icon:'warning',
            title:'Todos campos devem ser preenchidos, tente novamente.',
        });
        return false; 
    }else{
        if(data_form.senha != data_form.confSenha){
            Swal.fire({
                icon:'warning',
                title:'A confirmação de senha não confere, tente novamente.',
            });
            return false; 
        }else{
            var foiAlterado = false;
            var alter = "";

            if(opcao == '2' && (nome != data_form.nome || email != data_form.email ||
                 senha != data_form.senha || usuario != data_form.usuario || statusOriginal != data_form.status || tipoOriginal != data_form.tipo) ){
                   var foiAlterado = true;
                   alter = nome != data_form.nome ? alter + '<br>→ Nome' : alter + '';
                   alter = usuario != data_form.usuario ? alter + '<br>→ Usuário' : alter + '';
                   alter = email != data_form.email ? alter + ' <br>→ Email' : alter + '';
                   alter = senha != data_form.senha ? alter + '<br> → Senha' : alter + '';
                   alter = statusOriginal != data_form.status ? alter + '<br>→ Status' : alter + '';
                   alter = tipoOriginal != data_form.tipo ? alter + '<br>→ Tipo de Usuário' : alter +'';

                 }
            //confirm("FOI ALTERADO "+ foiAlterado);
            if(foiAlterado){
               
                Swal.fire({
                    title: 'Tem certeza?',
                    html: 'Realmente deseja alterar o(s) o seguintes campos: '+ alter,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00a000',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar'

                }).then((result) => {
                    if (result.isConfirmed){
                       /*  confirm("OK!");  */
                         $(document).ready(function(){
                        $(this).myFunction(data_form);
                        });
                        return false; 
                                   
                    }  
                });
               

            }else{
                if (opcao == '1') { 
                    $(document).ready(function(){
                    $(this).myFunction(data_form);
                    });
                }
                else{
                    Swal.fire({
                        title: 'Nenhuma alteração encontrada',
                        text: "Deseja tentar novamente?",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#00a000',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Não',
                        cancelButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            
                            $("#modalCRUD").modal("hide");            
                        }  
                    });  
                }

            }
    

        }
    }
}); 
 
// Alterando a senha
$(document).on("submit", ".formAltDados", function(e){
    e.preventDefault(); 
    var $form = $(this);

    confSenha = $.trim($("#conf-senha").val());
    

    var data_form = { 
        opcao:opcao,
        senha: $.trim($("#senha").val()),
        senhaAtual:  $.trim($("#senhaAtual").val())
    } 
    if(data_form.senhaAtual.length == "" || data_form.senha == "" || confSenha == ""){
        Swal.fire({
            icon:'warning',
            title:'Todos campos devem ser preenchidos, tente novamente.',
        });
        return false; 
    }else{
        if(data_form.senha != confSenha){
            Swal.fire({
                icon:'warning',
                title:'A confirmação de senha não confere, tente novamente.',
            });
            return false; 
        }else{
              
                Swal.fire({
                    title: 'Tem certeza?',
                    html: 'Realmente deseja alterar sua senha?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00a000',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar'

                }).then((result) => {
                    if (result.isConfirmed){
                        $.ajax({
                            url: "bd/crud.php",
                            type: "POST",
                            dataType: "json",
                            data:data_form,
                            async: true,
                            })
                           .done(function ajaxDone(res){

                            console.log(res.senha); 
                            if(res.senha == "nao_confere"){
                                Swal.fire({
                                    icon:'warning',
                                    title:'A senha atual informada não confere, por favor, tente novamente.',
                                });
                                return false;

                            }else{

                                Swal.fire({
                                    icon:'success',
                                    title:'Senha atualizada com sucesso!',
                                });

                                $("#modalAlter").modal("hide");
                            }

                           })	
                        
                    }  
                });
               
        }
    }
}); 
    
});
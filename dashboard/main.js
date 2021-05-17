$(document).ready(function(){
    tabelaUsuarios = $("#tabelaUsuarios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnDeletar'>Deletar</button></div></div>"  
       }],
        
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
    opcao = 1; //alta
});    
    
var fila; //Captura a linha para editar ou deletar o registro
  
//Botão Editar    
$(document).on("click", ".btnEditar", function(){
 
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nome = fila.find('td:eq(1)').text();
    usuario = fila.find('td:eq(2)').text();
    email = fila.find('td:eq(3)').text();
    tipo = fila.find('td:eq(4)').text();
    status = fila.find('td:eq(5)').text();
    //senha = fila.find('td:eq(6)').text();
    
    //var senha = document.getElementById('passa_senha').value;
    //edad = parseInt(fila.find('td:eq(3)').text());
    
    $("#nome").val(nome);
    $("#usuario").val(usuario);
   /*  $("#senha").val(senha); */
    $("#conf-senha").val(senha);
    $("#email").val(email);
    
    /* var respuesta = confirm("testeeeeee "+senha); */
    if (tipo == 'Admin') {
       
        document.getElementById("cb-adm").checked = true;
     }
     if (status == 'Ativo') {
        document.getElementById("cb-ativo").checked = true;
     }
    
    opcao = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Atualizar Usuário");            
    $("#modalCRUD").modal("show"); 
      
    
});

//Botão Deletar
$(document).on("click", ".btnDeletar", function(){    
    fila = $(this);
    id = $(this).closest("tr").find('td:eq(0)').text();
    user = fila.find('td:eq(1)').text();
    opcao = 3 //Deletar    
      
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
        if (result.isConfirmed) {
          Swal.fire(
            'Deletado!',
            'O usuário foi deletado.',
            'success'
          )
        }
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcao:opcao, id:id},
            success: function(){
                tabelaUsuarios.row(fila.parents('tr')).remove().draw();
            }
        });
      }) 
      
});


$("#formUsuarios").submit(function(e){
    e.preventDefault();    
    cbADM = document.getElementById("cb-adm");
    cbATV = document.getElementById("cb-ativo");
    nome = $.trim($("#nome").val());
    usuario = $.trim($("#usuario").val());
    senha = $.trim($("#senha").val());  
    confSenha = $.trim($("#conf-senha").val());
    email = $.trim($("#email").val());
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
    if(usuario.length == "" || senha == "" ||confSenha == "" || nome == "" || email == ""){
        Swal.fire({
            icon:'warning',
            title:'Todos campos devem ser preenchidos, tente novamente.',
        });
        return false; 
    }else{
        if(senha != confSenha){
            Swal.fire({
                icon:'warning',
                title:'A confirmação de senha não confere, tente novamente.',
            });
            return false; 
        }else{
            Swal.fire({
                icon:'success',
                title:'Dados salvos com sucesso!',
            });
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: {nome:nome, usuario:usuario, email:email, tipo:tipo, status:status, id:id, opcao:opcao},
                success: function(data){  
                    console.log(data);
                    id = data[0].id;            
                    nome = data[0].nome;
                    usuario = data[0].usuario;
                    email = data[0].email;
                    tipo = data[0].tipo;            
                    status = data[0].status;
                    /* senha = data[0].senha; */

             
                    if(opcao == 1){tabelaUsuarios.row.add([id,nome,usuario,email,tipo,status]).draw();}
                    else{tabelaUsuarios.row(fila).data([id,nome,usuario,email,tipo,status]).draw();}
                    
                }        
            });
            $("#modalCRUD").modal("hide");    
            }
    }
}); 
 
    
});
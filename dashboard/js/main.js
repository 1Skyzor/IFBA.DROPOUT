$(document).ready(function(){
    tabelaUsuarios = $("#tabelaUsuarios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Deletar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de um total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
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
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Cadastrar Usuário");   
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    

$("#btnCadastrar").click(function(){          
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Cadastrar Usuário");   
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});  
var fila; //capturar a linha para editar ou deletar o registro

//Botão Editar    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nome = fila.find('td:eq(1)').text();
    pais = fila.find('td:eq(2)').text();
    edad = parseInt(fila.find('td:eq(3)').text());
    
    $("#nome").val(nome);
    $("#pais").val(pais);
    $("#edad").val(edad);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Atualizar Usuário");            
    $("#modalCRUD").modal("show");  
    
});

//Botão Deletar
$(document).on("click", ".btnDeletar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //Deletar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tabelaUsuarios.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formUsuarios").submit(function(e){
    e.preventDefault();    
    nome = $.trim($("#nome").val());
    usuario = $.trim($("#usuario").val());
    senha = $.trim($("#senha").val());    
    email = $.trim($("#email").val());   
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nome:nome, pais:pais, edad:edad, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nome = data[0].nome;
            pais = data[0].pais;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas.row.add([id,nome,pais,edad]).draw();}
            else{tablaPersonas.row(fila).data([id,nome,pais,edad]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});
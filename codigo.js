$('#formLogin').submit(function(e){
    var dados=$(this).serialize();
   e.preventDefault();
   var usuario = $.trim($("#usuario").val());    
   var senha = $.trim($("#senha").val());  
    
   if(usuario.length == "" || senha == ""){
      Swal.fire({
          type:'warning',
          title:'O usuário e a senha devem ser informados.',
      });
      return false; 
    }else{
        $.ajax({
           url:"bd/login.php",
           type:"POST",
           datatype: "json",
           data: {usuario:usuario, senha:senha,status }, 
           success:function(data){               
               if(data == "null"){
                   
                   Swal.fire({
                       type:'error',
                       title:'Usuário e/ou senha inválido(s)',
                   });

               }
               else{

                
               
                $.ajax({
                    
                        url:"bd/login.php",
                        type:"POST",
                        datatype: "json",
                        data: dados,
                        
                    success: function(response){
                        $('.resultadoForm table tbody').empty();
                        $.each(response,function(key,value){
                            
                            if(value.status == "Ativo"){
                                
                                Swal.fire({
                                    type:'error',
                                    title:'ativo',
                                });
            
                            }   
                        });
                    }
                                                     
                } );
/* 
                status = document.getElementById('passa_status').value; */
             
                if(status == "Inativo"){
                    Swal.fire({
                        type:'warning',
                        title:'Sua conta está desativada, recomendamos que entre em contato com a admistratação.',
                    });
                    return false;   
                 }else{
                    tipo = document.getElementById('passa_tipo').value;
                    var respuesta = confirm("teste "+tipo);
                   
                    if(tipo == "Admin"){
                        Swal.fire({
                            type:'success',
                            title:'Bem-vindo(a) '+usuario+'!',
                            confirmButtonColor:'#3085d6',
                            confirmButtonText:'Entrar'
                            }).then((result) => {
                            if(result.value){
                                //window.location.href = "vistas/pag_inicio.php";
                                window.location.href = "dashboard/index.php";
                            }
                            })

                        } else{  
                            var respuesta = confirm("teste 2 "+tipo);
                            Swal.fire({
                            type:'warning',
                            title:'Módulo Usuários Simples Ainda Não Está Pronto!',
                            confirmButtonColor:'#3085d6',
                            confirmButtonText:'Entrar'
                            }).then((result) => {
                            if(result.value){
                                //window.location.href = "vistas/pag_inicio.php";
                                window.location.href = "dashboard/index.php";
                            }
                            })
                        }
                  }
                }
           }    
        });
    }     
});
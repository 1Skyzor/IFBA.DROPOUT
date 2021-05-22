$(document).on("submit", ".formLogin", function(e){
 
   e.preventDefault();
   var $form = $(this);
   var data_form = {
   usuario : $("input[id='usuario']",$form).val(),    
   senha : $("input[id='senha']", $form).val() 
   } 
   //confirm("USER "+data_form.usuario);  
   if(data_form.usuario.length == "" || data_form.senha == ""){
      Swal.fire({
          type:'warning',
          title:'O usuário e a senha devem ser informados.',
      });
      return false; 
    }else{
        var url_php = 'bd/login.php';
        $.ajax({
           url:url_php,
           type:"POST",
           datatype: "json",
           data: data_form, 
           async: true,
           
        })
        .done(function ajaxDone(res){   
              //confirm("USER "+res.usuario);  
              console.log(res.usuario);      
               if(res.status == undefined){ 
                   Swal.fire({
                       type:'error',
                       title:'Usuário e/ou senha inválido(s)',
                   });

               }
               else{
                //confirm("STATUS"+res.status);            
                if(res.status == "Inativo"){
                    Swal.fire({
                        type:'warning',
                        title:'Sua conta está desativada, recomendamos que entre em contato com a admistratação.',
                    });
                    return false;   
                 }else{
                  //confirm("TIPO "+res.tipo);
                   
                    if(res.tipo == "Admin"){
                        Swal.fire({
                            type:'success',
                            title:'Bem-vindo(a) '+res.usuario+'!',
                            confirmButtonColor:'#3085d6',
                            confirmButtonText:'Entrar'
                            }).then((result) => {
                            if(result.value){
                                //window.location.href = "vistas/pag_inicio.php";
                                window.location.href = "dashboard/index.php";
                            }
                            })

                        } else{  
                            //confirm("TIPO "+res.tipo);
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
               
        }) /* .fail(function ajaxError(e){
            console.log(e);
        })
        .always(function ajaxSiempre(){
            console.log('Final de la llamada ajax.');
        })
        return false; */
    }     
});
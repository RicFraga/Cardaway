$(document).ready(function(){
    const myswal = Swal.mixin({
        onClose: () => {
            location.href ="./../../";
        }
      })
    
    $("#formulario").validetta({
        display:'bubble',
        bubblePosition: 'bottom',
        realTime: false,
        onValid:function(e){
            e.preventDefault();
            $.ajax({

                method: "POST",
                url:"./../functions/registrar.php",
                data: $("#formulario").serialize(),
                cache:false,
                success:function(respAX){
                    var AX = JSON.parse(respAX);
                    
                    if(AX.msj == 1){
                        myswal.fire(
                            'Cardaway!',
                             'Bienvenido a nuestra comunidad',
                            'success'
                            
                          )
                    }
                    else{
    
                        Swal.fire(
                            'Cardaway!',
                            'Ocurrio un Error',
                            'error'
                            
                          )
                    }
    
                    
                }
    
    
              });
            
        }
    });

    /*$("#formulario").on("submit",function(e){


        e.preventDefault();

        
        $.ajax({

            method: "POST",
            url:"./php/usuarios.php",
            data: $("#formulario").serialize(),
            cache:false,
            success:function(respAX){

                var AX = JSON.parse(respAX);

                if(AX.msj == 1){
                    alert("Registro Exitoso!");
                }
                else{

                    alert("Fallo en Registro : Usuario Existente!");
                }

                
            }


          });


       


       

        
        

    });*/


  
});





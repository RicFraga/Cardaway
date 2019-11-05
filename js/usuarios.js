$(document).ready(function(){

    $("#formulario").on("submit",function(e){


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


       


       

        
        

    });


  
});





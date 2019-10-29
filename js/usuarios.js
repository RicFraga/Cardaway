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
                alert(AX.msj);
            }


          });


       


       

        
        

    });


  
});





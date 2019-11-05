$(document).ready(function(){
    
   

    $("#datos").on("submit",function(e){

    

        e.preventDefault();


        $.ajax({

            method:"POST",
            url:"./php/logeo.php",
            data: $("#datos").serialize(),
            cache:false,
            success:function(respAX){

                var AX = JSON.parse(respAX);

               

                if(AX.resp == 0){
                    alert("Usuario no existente!");
                }
                else{

                    alert("Bienvenido"+AX.resp);
                }
            }
        })

     
     

    });




});
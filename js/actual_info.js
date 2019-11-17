    $.ajax({

        method:"GET",
        url:"./php/actual_info.php",
        cache:false,
        success:function(respAX){
            var AX = JSON.parse(respAX);
            if(AX.sesion){
                alert("Bienvenido");
            }
            else{
                window.location.replace("./inicio.html");
            }
             
          
        }

      
    })






$(document).ready(function(){

    $("#datos").validetta({
        display:'bubble',
        bubblePosition: 'bottom',
        realTime: false,
        onValid:function(e){

            e.preventDefault();
            $.ajax({

            method:"POST",
            url:"./php/logeo.php",
            data: $("#datos").serialize(),
            cache:false,
            success:function(respAX){

                var AX = JSON.parse(respAX);

                if(AX.resp != 0){

                    Swal.fire(
                        'Bienvenido!',
                         AX.resp,
                        'success'
                        
                      ).then(function(){

                        window.location.replace("./php/user.php");
                

                      })
                }

                else{

                    Swal.fire(
                        'Cardaway',
                        'Usuario o contraseña incorrectos',
                        'warning'
                    )

                }

                  
              
            }

          
        })
            
        }
    
    });

   
     
});
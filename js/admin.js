$(document).ready(function(){
    $(document).ready(function(){
        $('select').formSelect();
      });

    $("#cambios").validetta({
        display:'bubble',
        bubblePosition: 'bottom',
        realTime: false,
        onValid:function(e){
            e.preventDefault();

            $.ajax({

                method:"POST",
                url:"./../functions/modificarDatos.php",
                data: $("#cambios").serialize(),
                cache:false,
                success:function(respAX){


                var AX = JSON.parse(respAX);

                
                
                if(AX.resp != 0){
                    Swal.fire(
                        'Eliminacion Exitosa!',
                        'success'
                    ).then(function(){
                        location.reload();
                    })
                    
                }

                else{
                    Swal.fire(
                        'Alerta!',
                        'Correo invalido!',
                        'warning',
                        
                    )

                        

                    
                    
                }

                

                }


            })
            
           
        }
    });

     







});
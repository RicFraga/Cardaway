$(document).ready(function(){

    $("#imagenes").validetta({
        display:'bubble',
        bubblePosition: 'bottom',
        realTime: false,
        onValid:function(e){
            e.preventDefault();
            //alert("detecto el submit!!");

            $.ajax({

                method:"POST",
                url:"./../functions/borraPostales.php",
                data: $("#imagenes").serialize(),
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
                        'imagen no existente!',
                        'warning',
                        
                    )
                    
                }

                

                }


            })
            
           
        }
    });

     







});
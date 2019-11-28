
$(document).ready(function(){
    $(document).ready(function(){
        $('select').formSelect();
      });
      const myswal = Swal.mixin({
        onClose: () => {
            location.href ="./admin.php";
        }
      })

      $("#form_postal").submit(function(e) {
        e.preventDefault();
        var formData=new FormData($("#form_postal")[0]);
        var nombre_cat=$('select').formSelect('getSelectedValues');
        formData.append("categoria",nombre_cat);
        $.ajax({

            method: "POST",
            url:"./../functions/agrega_postal.php",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(respAX){
                alert(respAX);
                var AX = JSON.parse(respAX);
                if(AX.msj == 1){
                    myswal.fire(
                        'Cardaway!',
                         'Postal Agregada Correctamente',
                        'success'
                      )
                }
                else if(AX.msj==-1){
                    Swal.fire(
                        'Cardaway!',
                        'Formato de imagen no soportado',
                        'error'
   
                      )
                }
                else if(AX.msj==-2){
                    Swal.fire(
                        'Cardaway!',
                        'Error al cargar archivo',
                        'error'
   
                      )
                }
                else{
                    Swal.fire(
                        'Cardaway!',
                        'Postal ya existente',
                        'error'
                      )

                }   
            }
          });     
   
        
        
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

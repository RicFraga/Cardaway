$(document).ready(function(){
    const myswal = Swal.mixin({
        onClose: () => {
            location.href ="./user_page.php";
        }
      })
      //
    
     
        
    $("#formulario").validetta({
        display:'bubble',
        bubblePosition: 'bottom',
        realTime: false,
        onValid:function(e){
            e.preventDefault();
            var formData=new FormData($("#formulario")[0]);
            //var formData=new FormData();
            $.ajax({

                method: "POST",
                url:"./../functions/actual_info.php",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(respAX){
                    var AX = JSON.parse(respAX);
                    if(AX.msj == 1){
                        myswal.fire(
                            'Cardaway!',
                             'Datos Actualizados Coorectamente',
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
                            'Correo ya registrado',
                            'error'
                          )

                    }   
                }
              });     
        }
    });
//setInterval(actualiza_postales, 5000); 
actualiza_postales();
        

});
function actualiza_postales(){
    $.ajax({
        url:"./../functions/actual_postales.php",
        cache:false,
        success:function(respAX){
            //alert(respAX);
            var AX = JSON.parse(respAX);
            AX.enviadas.forEach(element => {
                    $("#enviadas")[0].insertRow(-1).innerHTML = `<td><img 
                    src="`+element.postal +`" class="thumbnail"></td>
                    <td>`+element.destinatario+`</td>
                    <td>`+element.fecha +`</td>'`;
            });
            AX.recibidas.forEach(element => {
                $("#recibidas")[0].insertRow(-1).innerHTML = `<td><img 
                src="`+element.postal +`" class="thumbnail"></td>
                <td>`+element.remitente+`</td>
                <td>`+element.fecha +`</td>'`;
        });
            
        }
        
      });
      
    }





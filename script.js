$(document).ready(function(){
    
    $('#btnSend').click(function(){
        
        var errores ='';

        //Validando formulario***********************************
        if($('#name').val()==''){
            errores+='<p>Escriba un correo electronico</p>';
            $('#name').css('border-bottom-color', "#F14B4B")
        }else{
            $('#name').css('border-bottom-color', "#D1D1D1")
        }
        
        if($('#eMail').val()==''){
            errores+='<p>Escriba un correo electronico</p>';
            $('#eMail').css('border-bottom-color', "#F14B4B")
        }else{
            $('#name').css('border-bottom-color', "#D1D1D1")
        }
        
        if($('#Msj').val()==''){
            errores+='<p>Agregue un mensaje</p>';
            $('#Msj').css('border-bottom-color', "#F14B4B")
        }else{
            $('#name').css('border-bottom-color', "#D1D1D1")
        }

        //Enviando mensaje***********************************
        if(errores==''==false){
            var mensajeModal = '<div class="modalWrap">'+
                                    '<div class="msjModal">'+
                                        '<h3>Errores encontrados</h3>'+
                                            errores+
                                            '<span id="btnClose">cerrar</span>'+
                                        '</div>'+
                                    '</div>'

            $('body').append(mensajeModal);
        }
        //Cerrando modal******************

        $('#btnClose').click(function(){
            $('.modalWrap').remove();
        });
    });
});
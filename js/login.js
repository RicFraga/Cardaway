
$(document).ready(function(){

    $("#datos").validetta({
        display:'bubble',
        bubblePosition: 'bottom',
        realTime: false,
        onValid:function(e){

            e.preventDefault();
            $.ajax({

            method:"POST",
            url:"./php/functions/login.php",
            data: $("#datos").serialize(),
            cache:false,
            success:function(respAX){

                var AX = JSON.parse(respAX);

                if(AX.resp != 0){

                    Swal.fire(
                        'Bienvenid@!',
                         AX.resp,
                        'success'
                        
                      ).then(function(){

                        window.location.replace("./php/pages/user_page.php");
                

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
var post_ini=6;
    carga_postales(post_ini);
var limite=6;
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() == $(document).height()){

        carga_postales(limite);
        
      }
    });

   
     
});

var offset=0;

function carga_postales(limit){       
$.ajax({
  method:"POST",
  url:"./php/functions/cargar_postales.php",
  cache:false,
  data:{
      offset : offset,
      limit : limit
  },
  success:function(respAX){
      console.log(respAX);
      //alert(respAX);
      var i=0;
      var AX = JSON.parse(respAX);
      AX.postales.forEach(element => {
              offset+=1;
              $("#cargador"+String(i%3))[0].innerHTML += 
              '<img src="'+element+'" class="gal-img" alt="">';
              i+=1;
      });

      
  }
  
});
}
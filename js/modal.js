
var modal=document.getElementsByClassName("myModal")[0];
var span=document.getElementById("close");

var img = document.getElementsByClassName('gal-img');
var modalImg = document.getElementById("modal-test");
try{
$("#enviar")[0].addEventListener("click",postal_session);

}
catch{
  //No hay un usuario registrado
}
document.addEventListener('click', function (event) {

	if (event.target.matches('.gal-img')) {
    modal.style.display = "block";
    modalImg.src = event.target.src;
    if(modalImg.height > modalImg.width){
      modalImg.style.width="50%";
    }
    else {
      modalImg.style.width="100%";
      modalImg.style.height="auto";
    }
    
	}


}, false);

span.addEventListener("click",()=>{
  modal.style.display="none";
  
});

function postal_session(){
    var cadena=modalImg.src;
    var re=/\.*postales/;
    cadenas=cadena.split(re);
    var postal="./../../postales"+cadenas[1];
    $.ajax({
      method:"POST",
      url:"./php/functions/session_postal.php",
      cache:false,
      data:{
          postal : postal
      },
      success:function(respAX){
          //console.log(respAX);
          //alert(respAX);
          //pagina de Aldo 
          window.location.replace("./php/pages/envio.php");
          }
});
}
$(document).ready(function(){


  var modal=document.getElementsByClassName("myModal")[0];
var span=document.getElementById("close");

var img = document.getElementsByClassName('gal-img');
var modalImg = document.getElementById("modal-test");

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
})
































});



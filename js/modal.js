var modal=document.getElementsByClassName("myModal")[0];
var span=document.getElementById("close");

var img = document.getElementsByClassName('gal-img');
var modalImg = document.getElementById("modal-test");
img[0].onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

document.addEventListener('click', function (event) {

	if (event.target.matches('.gal-img')) {
    modal.style.display = "block";
    modalImg.src = event.target.src;
	}


}, false);



span.addEventListener("click",()=>{
  modal.style.display="none";
})
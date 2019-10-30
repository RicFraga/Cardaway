
const mySlider = document.querySelector(".mySlider-slides");
const mySliderImg = document.querySelectorAll(".mySlider-slides img");

const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");

let counter = 1;
const size = mySliderImg[0].clientWidth;

mySlider.style.transform = "translateX(" + -size * counter + "px)";

nextBtn.addEventListener("click", () => {
  if (counter >= mySliderImg.length - 1) {
    return;
  }
  mySlider.style.transition = "transform 0.4s ease-in-out";
  counter++;
  mySlider.style.transform = "translateX(" + -size * counter + "px)";
});

prevBtn.addEventListener("click", () => {
  if (counter <= 0) {
    return;
  }
  mySlider.style.transition = "transform 0.4s ease-in-out";
  counter--;
  mySlider.style.transform = "translateX(" + -size * counter + "px)";
});


mySlider.addEventListener("transitionend", () => {
  if (mySliderImg[counter].id === "lastClone") {
    mySlider.style.transition = "none";
    counter = mySliderImg.length - 2;
    mySlider.style.transform = "translateX(" + -size * counter + "px)";
  }
  if (mySliderImg[counter].id === "firstClone") {
    mySlider.style.transition = "none";
    counter = mySliderImg.length - counter;
    mySlider.style.transform = "translateX(" + -size * counter + "px)";
  }


});







import './bootstrap';

let Index = 1;
displaySlides(Index);

// Next& previous controls
function plusSlides(n) {
  displaySlides(Index += n);
}



function displaySlides(n) {
  let slides = document.getElementsByClassName("Products");
  if (n > slides.length) {Index = 1}
  if (n < 1) {Index = slides.length}
  for (let index = 0; index < slides.length; index++) {
    slides[index].style.display = "none";
  }
  slides[Index-1].style.display = "block";
  
}
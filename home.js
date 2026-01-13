let slideIndex = 1;
let slideTimer;
document.addEventListener("DOMContentLoaded", function() {
    showSlides(slideIndex);
    startAutoSlide();
});



function plusSlides(n) {
  clearTimeout(slideTimer); 
  showSlides(slideIndex += n);
  startAutoSlide(); 
}


function currentSlide(n) {
  clearTimeout(slideTimer); 
  showSlides(slideIndex = n);
  startAutoSlide(); 
}




function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");


  if (n > slides.length) {
    slideIndex = 1; 
  }    
  if (n < 1) {
    slideIndex = slides.length; 
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active-dot", "");
  }

  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active-dot";
}



function startAutoSlide() {
    let slides = document.getElementsByClassName("mySlides");
    if (slides.length === 0) return; 

    slideTimer = setTimeout(function() {
        showSlides(slideIndex += 1);
        startAutoSlide(); 
    }, 4000); 
}

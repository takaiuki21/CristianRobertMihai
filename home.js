//variala pentru a stoca indexul slide-ului curent
let slideIndex = 1;
// variabila pentru a stoca timer-ul de derulare automata
let slideTimer;

// asteapta pana cand tot continutul paginii este incarcat
document.addEventListener("DOMContentLoaded", function() {
    
    showSlides(slideIndex);
    startAutoSlide();
});


// functie apelata cand dai click pe sageata stanga/dreapta
function plusSlides(n) {
  // opreste timer-ul automat
  clearTimeout(slideTimer); 
  // adauga n la indexul curent si afiseaza slide-ul
  showSlides(slideIndex += n);
  startAutoSlide(); 
}


function currentSlide(n) {
 
  clearTimeout(slideTimer); 
  showSlides(slideIndex = n);
  startAutoSlide(); 
}



// functia care afiseaza slide-ul curent
function showSlides(n) {
  let i;
  // preia toate elementele cu clasa "mySlides"
  let slides = document.getElementsByClassName("mySlides");
  // preia toate elementele cu clasa "dot"
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

  //afiseaza slide-ul curent
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active-dot";
}


// functia care porneste derularea automata a slide-urilor
function startAutoSlide() {
    // verifica daca exista slide-uri
    let slides = document.getElementsByClassName("mySlides");
    if (slides.length === 0) return; 

    slideTimer = setTimeout(function() {
        showSlides(slideIndex += 1);
        startAutoSlide(); 
    }, 4000); 
}
//SLIDESHOW ::::::::::::::::::::::::::::::::::::::::::::::::::

// déclarations des variables :

var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide, 2500);


// création du slideshow automatique avec une fonction

function nextSlide() {
  slides[currentSlide].className = 'slide';
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].className = 'slide showing';
}

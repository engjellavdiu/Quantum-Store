/*Slideshow*/
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
}

// login-register
function changeForm(number){
  var divElements = document.getElementsByClassName('forms');
  console.log(divElements)
  if (number == 0){
    //show Login
    divElements[0].classList.remove('hidden')
    divElements[0].classList.add('form-style')
    //hide Register
    divElements[1].classList.add('hidden')
    divElements[1].classList.remove('form-style')
  }  
  else if (number == 1){
    //show register
    divElements[1].classList.remove('hidden')
    divElements[1].classList.add('form-style')
    //hide login
    divElements[0].classList.add('hidden')
    divElements[0].classList.remove('form-style')
  } 
}
function validate(number){
var inputList = document.getElementsByClassName("input");
if (number == 0){
//login side
  if(inputList[0].value == "" || inputList[1].value == ""){
    alert("please fill your data")
    }
}
else if(number == 1){
    //register side
  }
}   


// Back to top

var mybutton = document.getElementById("back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
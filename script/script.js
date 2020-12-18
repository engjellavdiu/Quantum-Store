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

/*Login/register form exchange*/
function changeForm(number) {
  var llogariaDiv = document.getElementsByClassName('llogaria-main');
  var divs = document.getElementsByClassName('form');
  if (number == 0) {
    //decrease area height
    for (var i = 0; i < llogariaDiv.length; i++){
      llogariaDiv[i].style.height="80vh";
    }
    //show login
    //hide register
    divs[0].classList.add('form-style');
    divs[0].classList.remove('hidden');

    divs[1].classList.add('hidden');
    divs[1].classList.remove('form-style');
  }
  else if (number == 1) {
    //increase area height
    for (var i = 0; i < llogariaDiv.length; i++){
      llogariaDiv[i].style.height="90vh";
    }
    //show register
    //hide login
    divs[1].classList.add('form-style');
    divs[1].classList.remove('hidden');

    divs[0].classList.add('hidden');
    divs[0].classList.remove('form-style');
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

//validate
function validate(number){
  var inputList = document.getElementsByClassName("input");
  if (number == 0){
  //login side
    if(inputList[0].value == "" || inputList[1].value == ""){
      alert("Ju lutem mbushni te dhenat!")
      }
  }
}


























//          *                                Easter Egg
           //\
          //\\\
         ///\\\\
        ////\\\\\
       /////\\\\\\
      ///////\\\\\\
     //           \\
    //             \\
   // Zhemape Kidda \\
  //   /          /  \\
 //   ( ^ )~( ^ )/    \\
////////////\\\\\\\\\\\\\

//Urime Festat e Fundevitit stafit te UBT nga:
//                                            Engjëll Avdiu
//                                                  &
//                                            Erjon Januzi
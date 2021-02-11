//valido formen e regjistrimit
const submitbtn = document.getElementById('submit-btn');

if(submitbtn){
  submitbtn.addEventListener('click', (e)=> {
    const name = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const email = document.getElementById('reg-email');
    const pw = document.getElementById('reg-pw');
    const confpw = document.getElementById('conf-pw');
    const error = document.getElementById('log-error');
    let message = "";

    message = validateRegForm(name, lname, email, pw, confpw);
    
    if (message.length > 0){
        e.preventDefault();
        document.getElementById('msg').textContent = message;
        error.classList.remove('hidden');
    }
});
}

function validateRegForm(name, lname, email, pw, confpw) {
  if (name.value === "" && lname.value === "" && email.value === "" && pw.value === ""
    && confpw.value === "") //Nese jane te gjitha empty atehere shfaq mesazhin se te gjitha fushat duhet te plotesohen
    return "Të gjitha fushat duhet të plotësohen";
  else if (name.value === "" || name.value == null) { //perndryshe verifiko secilen nje nga nje
    return "Emri duhet të plotësohet";
  }
  else if (!onlyLetters(name)){
    return "Emri duhet të ketë vetëm shkronja dhe të ketë min. 2 shkronja";
  }
  else if (lname.value === "" || lname == null) {
    return "Mbiemri duhet të plotësohet";
  }
  else if (!onlyLetters(lname)){
    return "Mbiemri duhet të ketë vetëm shkronja dhe të ketë min. 2 shkronja";
  }
  else if (email.value === "" || email == null) {
    return 'Email duhet të plotësohet';
  }
  else if (!validateEmail(email)){
    return 'Email-i juaj nuk është valid';
  }
  else if (pw.value === "" || pw == null) {
    return 'Fjalëkalimi duhet të plotësohet';
  }
  else if (!validatePassword(pw)){
    return 'Fjalëkalimi duhet të ketë min. 8 karaktere, min. 1 shkronjë të madhe dhe min. 1 numër';
  }
  else if (confpw.value === "" || pw.value !== confpw.value) {
    return 'Sigurohuni që fjalëkalimet të jenë të njëjta';
  }
}

// valido formen e loginit
const loginsubmit = document.getElementById('login-submit-btn');

if(loginsubmit){
  loginsubmit.addEventListener('click', (e)=> {
    const email = document.getElementById('login-email');
    const pw = document.getElementById('login-pw');
    const error = document.getElementById('log-error');
    let message = "";
  
    message = validateLoginForm(email, pw);
    
    if (message.length > 0){
        e.preventDefault();
        document.getElementById('msg').textContent = message;
        error.classList.remove('hidden');
    }
  });
}

function validateLoginForm(email, pw){
  if(email.value === "" && pw.value === "")
    return "Të gjitha fushat duhet të plotësohen";
  else if (email.value === "" || email == null)
    return "Email duhet të plotësohet";
  else if (!validateEmail(email))
    return "Email-i nuk është valid";
  else if (pw.value === "" || pw == null)
    return "Fjalëkalimi duhet të plotësohet";
}

// valido se a ka vetem shkronja
function onlyLetters(string){
  const regex = /^[A-Za-z]{2,}$/;
  return string.value.match(regex);
}

function validateEmail(email){
  const regex = /^[\w-\.]+@([\w-]+)+.[\w-]{2,4}$/; //valido emailin
  return email.value.match(regex);
}

function validatePassword(pw){
  const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/; //valido passwordin se a ka min 8 karaktere, min 1 numer dhe
  return pw.value.match(regex);                         // min 1 karakter uppercase
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

//Valido kontakt formen//
const sendMessageBtn = document.getElementById('dergo');

if (sendMessageBtn) {
  sendMessageBtn.addEventListener('click', (e) => {
    const emri = document.getElementById('emriPlote');
    const mbiemri = document.getElementById('mbiemri');
    const email = document.getElementById('emaili');
    const msg = document.getElementById('mesazhi');
    const error = document.getElementById('log-error');
    let message = "";

    message = validateContactForm(emri, mbiemri, email, msg);

    if (message.length > 0) {
      e.preventDefault();
      document.getElementById('msg').textContent = message;
      error.classList.remove('hidden');
    }
  });
}

function validateContactForm(emri, mbiemri, email, msg) {
  if(emri.value === "" && mbiemri.value === "" && email.value === "" && msg.value === "")
    return "Të gjitha fushat duhet të plotësohen";
  else if (emri.value === "" || emri == null)
    return "Emri duhet të plotësohet";
  else if (!onlyLetters(emri))
    return "Emri duhet të ketë vetëm shkronja";
  else if (mbiemri.value === "" || mbiemri == null)
    return "Mbiemri duhet të plotësohet";
  else if (!onlyLetters(mbiemri))
    return "Mbiemri duhet të ketë vetëm shkronja";
  else if (email.value === "" || email == null)
    return "Email duhet të plotësohet";
  else if (!validateEmail(email))
    return "Email-i nuk është valid";
  else if (msg.value === "" || msg == null)
    return "Ju lutem shkruani mesazhin tuaj";
}

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

// Back to top

/*var mybutton = document.getElementById("back-to-top");

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
*/

// document.addEventListener("DOMContentLoaded",
//     function (ngjarje) {
//         const BtnSubmit = document.getElementById('Btn-submit');
//         const validoFormen = (ngjarja) => {
//             ngjarja.preventDefault();
//             const emri = document.getElementById('emri');
//             const mbiemri = document.getElementById('mbiemri');
//             const emaili = document.getElementById('emaili');
//             const fjalkalimi1 = document.getElementById('fjalekalimi1');
//             const fjalkalimi2 = document.getElementById('fjalekalimi2');

//             if (emri.value === "") {
//                 alert('Ju lutem shtoni Emrin');
//                 emri.focus();
//                 return false;
//             }
//             if (mbiemri.value === "") {
//                 alert('Ju lutem shtoni Mbiemrin');
//                 mbiemri.focus();
//                 return false;
//             }
//             if (emaili.value === "") {
//                 alert('Ju lutem shtoni Emailin');
//                 emaili.focus();
//                 return false;
//             }
//             if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emaili.value))) {
//                 alert('Email-i nuk eshte valid');
//                 emaili.focus();
//                 return false;
//             }
//             if (fjalkalimi1.value === "") {
//                 alert('Ju lutem shtoni Fjalkalimin');
//                 fjalkalimi1.focus();
//                 return false;
//             }
//             if (fjalkalimi1.value.length < 8) {
//                 alert('Fjalekalimi duhet te kete se paku 8 karaktere.');
//                 fjalkalimi1.focus();
//                 return false;
//             }
//             if (fjalkalimi2.value === "") {
//                 alert('Ju lutem Konfirmoni Fjalkalimin');
//                 fjalkalimi2.focus();
//                 return false;
//             }
//             if (fjalkalimi1.value != fjalkalimi2.value) {
//                 alert('Sigurohuni qe keni konfirmuar fjalkalimin');
//                 fjalkalimi2.focus();
//                 return false;
//             }
//         }
//         BtnSubmit.addEventListener('click', validoFormen);
//     });

//valido kontaktin
/*document.addEventListener("DOMContentLoaded",
    function (kontakti) {
        const dergo = document.getElementById('dergo');
        const validoKontakti = (ngjarja) => {
            ngjarja.preventDefault();
            const emriPlote = document.getElementById('emriPlote');
            const emaili1 = document.getElementById('emaili1');
            const mesazhi = document.getElementById('mesazhi');


            if (emriPlote.value === "") {
                alert('Ju lutem shtoni Emrin');
                emriPlote.focus();
                return false;
            }
            if (emaili1.value === "") {
                alert('Ju lutem shtoni Email-in')
                emaili1.focus();
                return false;
            }
            if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emaili1.value))) {
                alert('Email-i nuk eshte valid');
                emaili.focus();
                return false;
            }
            if (mesazhi.value === "") {
                alert('Ju lutem shtoni Mesazhin');
                emaili.focus();
                return false;
            }
        }
        dergo.addEventListener('click', validoKontakti);
        return false;
    });*/

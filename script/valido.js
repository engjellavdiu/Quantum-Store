//valido formen
document.addEventListener("DOMContentLoaded",
    function (ngjarje) {
        const BtnSubmit = document.getElementById('Btn-submit');
        const validoFormen = (ngjarja) => {
            ngjarja.preventDefault();
            const emri = document.getElementById('emri');
            const mbiemri = document.getElementById('mbiemri');
            const emaili = document.getElementById('emaili');
            const fjalkalimi1 = document.getElementById('fjalekalimi1');
            const fjalkalimi2 = document.getElementById('fjalekalimi2');

            if (emri.value === "") {
                alert('Ju lutem shtoni Emrin');
                emri.focus();
                return false;
            }
            if (mbiemri.value === "") {
                alert('Ju lutem shtoni Mbiemrin');
                mbiemri.focus();
                return false;
            }
            if (emaili.value === "") {
                alert('Ju lutem shtoni Emailin');
                emaili.focus();
                return false;
            }
            if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emaili.value))) {
                alert('Email-i nuk eshte valid');
                emaili.focus();
                return false;
            }
            if (fjalkalimi1.value === "") {
                alert('Ju lutem shtoni Fjalkalimin');
                fjalkalimi1.focus();
                return false;
            }
            if (fjalkalimi1.value.length <8) {
                alert('Fjalekalimi duhet te kete se paku 8 karaktere.');
                fjalkalimi1.focus();
                return false;
            }
            if (fjalkalimi2.value === "") {
                alert('Ju lutem Konfirmoni Fjalkalimin');
                fjalkalimi2.focus();
                return false;
            }
            if (fjalkalimi1.value != fjalkalimi2.value) {
                alert('Sigurohuni qe keni konfirmuar fjalkalimin');
                fjalkalimi2.focus();
                return false;
            }
            else {
                alert("Llogaria u krijua me Sukses");
                return false;
            }
        }
        BtnSubmit.addEventListener('click', validoFormen);
        return false;
    });

//valido kontaktin
document.addEventListener("DOMContentLoaded",
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
            if(emaili1.value === ""){
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
    });

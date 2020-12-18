//valido formen
document.addEventListener("DOMContentLoaded",
  function(ngjarje){
    const BtnSubmit = document.getElementById('Btn-submit');
    const validoFormen = (ngjarja) =>{
        ngjarja.preventDefault();
        const emri = document.getElementById('emri');
        const mbiemri = document.getElementById('mbiemri');
        const emaili = document.getElementById('emaili');
        const fjalkalimi1 = document.getElementById('fjalkalimi1');
        const fjalkalimi2 = document.getElementById('fjalkalimi2');

        if(emri.value === ""){
            alert('Ju lutem shtoni Emrin');
            emri.focus();       
            return false;
        }
        else if(mbiemri.value === ""){
            alert('Ju lutem shtoni Mbiemrin');
            mbiemri.focus();
            return false;
        }
        else if(emaili.value === ""){
            alert('Ju lutem shtoni Emailin');
            emaili.focus();
            return false;
        }
        else if(fjalkalimi1.value === ""){
            alert('Ju lutem shtoni Fjalkalimin');
            fjalkalimi1.focus();
            return false;
        }
        else if(fjalkalimi2.value === ""){
            alert('Ju lutem Konfirmoni Fjalkalimin');
            fjalkalimi2.focus();
            return false;
        }
        else if(fjalkalimi1 != fjalkalimi2){
            alert('Sigurohuni qe keni konfirmuar fjalkalimin');
            fjalkalimi2.focus();
            return false;
        }
        else{
            alert("Llogaria u krijua me Sukses"); 
            return false;
        }
        return false;
    }
    BtnSubmit.addEventListener('click', validoFormen);
    return false;
});
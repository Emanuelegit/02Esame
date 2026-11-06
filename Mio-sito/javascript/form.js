const textarea = document.querySelector('textarea');
const contatore = document.getElementById('contatore');

textarea.addEventListener('input', function() {
    contatore.textContent = textarea.value.length + " /1000";
});

const form = document.querySelector('.form-contatto');

form.addEventListener('submit', function(e) {
    e.preventDefault();

    let nome = document.getElementById('nome').value.trim();
    let cognome = document.getElementById('cognome').value.trim();
    let email = document.getElementById('email').value.trim();
    let oggetto = document.getElementById('oggetto').value.trim();
    let servizio = document.getElementById('servizio').value; 
    let messaggio = document.getElementById('messaggio').value.trim();

   
    if (nome === "" || cognome === "" || email === "" || servizio === "" || messaggio === "" || oggetto === "") {
        alert("Attenzione: compila tutti i campi obbligatori e seleziona un servizio!");
    } else {
        
        form.submit();
    }
});
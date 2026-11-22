const textarea = document.querySelector('textarea');
const contatore = document.getElementById('contatore');
const form = document.querySelector('.form-contatto') || document.querySelector('form');

function aggiornaContatore() {
    if (textarea && contatore) {
        contatore.textContent = textarea.value.length + "/1000";
    }
}

aggiornaContatore();

if (textarea) {
    textarea.addEventListener('input', aggiornaContatore);
}

if (form) {
    form.addEventListener('submit', function(e) {
        const nome = document.getElementById('nome')?.value.trim() ?? '';
        const cognome = document.getElementById('cognome')?.value.trim() ?? '';
        const telefono = document.getElementById('telefono')?.value.trim() ?? '';
        const email = document.getElementById('email')?.value.trim() ?? '';
        const oggetto = document.getElementById('oggetto')?.value.trim() ?? '';
        const servizio = document.getElementById('servizio')?.value ?? '';
        const messaggio = document.getElementById('messaggio')?.value.trim() ?? '';
        const privacy = form.querySelector('input[name="Spunta"]')?.checked ?? false;

        if (!nome || !cognome || !telefono || !email || !oggetto || !servizio || !messaggio || !privacy) {
            e.preventDefault();
            alert("Attenzione: compila tutti i campi obbligatori e accetta la Privacy Policy!");
        }
    });
}

if (document.body.textContent.includes("Richiesta inviata con successo!") && window.history.replaceState) {
    window.history.replaceState(null, '', window.location.pathname + window.location.search);
}
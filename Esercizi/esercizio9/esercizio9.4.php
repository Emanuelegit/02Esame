<?php

//controllo dati inseriti 
if (empty($_GET['numero'])) {
    echo "Attenzione: numero mancante! Ne genero uno casuale.<br>";
    $numero = rand(1, 100);
} else {
    $numero = $_GET['numero'];
}

//svolgimento funzione 
function numeroparidispari($numero) {

    if ($numero % 2 == 0) {

        echo("il numero $numero, è pari");
    } else {
        echo("il numero $numero, è dispari");
    }
}

numeroparidispari($numero);



?>
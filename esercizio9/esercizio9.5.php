<?php

//controllo dati inseriti 
if (empty($_GET['N'])) {
    echo "Attenzione: numero mancante! Ne genero uno casuale.<br>";
    $N = rand(1, 100);
} else {
    $N = $_GET['N'];
}

//svolgimento funzione 
function calcolasomma($N) {
    $somma = 0;

    for ($i=0; $i<$N; $i++) {



        $somma = $somma += $i;

    }

    return $somma;

}
$numerofinale = calcolasomma($N);

echo("La somma dei numeri è di $numerofinale");



?>
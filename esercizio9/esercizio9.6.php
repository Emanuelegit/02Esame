<?php

//controllo dati inseriti 
if (empty($_GET['N'])) {
    echo "Attenzione: numero mancante! Ne genero uno casuale.<br>";
    $N = rand(1, 100);
} else {
    $N = $_GET['N'];
}

//svolgimento funzione 
function calcolasommadispari($N) {

    $sommatotale = 0;

    if ($N % 2 != 0) {

        for ($i=0; $i<$N; $i++) {


            if ($i % 2 != 0 ) {

                $sommatotale = $sommatotale + $i ;

            }


        } 
    } else {

        echo ("Il numero è pari e non posso fare calcoli!!!!");

    }

    return $sommatotale;

}

$sommatotale = calcolasommadispari($N);

echo("<br>La somma dei numeri dispari è di $sommatotale ");



?>
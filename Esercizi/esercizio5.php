<?php


function calcolasomma($N) {
    $somma = 0;

    for ($i=0; $i<$N; $i++) {



        $somma = $somma += $i;

    }

    return $somma;

}


$N = 20;
$numerofinale = calcolasomma($N);

echo("La somma dei numeri è di $numerofinale");




?>
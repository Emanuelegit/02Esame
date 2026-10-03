<?php

function ilminimo($N) {

    $minimoProvvisorio = $N[0];

    for ($i=0; $i<count($N); $i++ ) {
        if ($N[$i] < $minimoProvvisorio) {
             $minimoProvvisorio = $N[$i];
        }
    }

    return $minimoProvvisorio;

}


$N = [10, 30, 61, 89, 5];
$minimoProvvisorio = null;
$risultato = ilminimo($N);

echo ("Il numero minimo tra quelli scelti è di $risultato");

?>
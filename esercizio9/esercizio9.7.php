<?php

// 1. Controllo dati inseriti 
if (empty($_GET['numeri'])) {
    echo "Attenzione: lista numeri mancante! Ne genero alcuni casuali.<br>";


    $listaNumeri = [];
    for ($j = 0; $j < 5; $j++) {
        $listaNumeri[] = rand(1, 100);
    }
} else {
    $listaNumeri = $_GET['numeri']; 
}

//funzione da svolgere
function ilminimo($N) {
    $minimoProvvisorio = $N[0];

    for ($i = 0; $i < count($N); $i++ ) {
        if ($N[$i] < $minimoProvvisorio) {
             $minimoProvvisorio = $N[$i];
        }
    }

    return $minimoProvvisorio;
}


$risultato = ilminimo($listaNumeri);


echo ("<br>I numeri analizzati sono: " . implode(", ", $listaNumeri) . "<br>");
echo ("Il numero minimo tra quelli scelti è di $risultato");

?>
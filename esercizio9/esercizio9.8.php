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


function ordinarray($N) {
    $lunghezza = count($N);

    for ($i = 0; $i < $lunghezza; $i++) {
        $indiceMinimo = $i;
        
        for ($j = $i + 1; $j < $lunghezza; $j++) {
            if ($N[$j] < $N[$indiceMinimo]) {
                $indiceMinimo = $j;
            }
        }

        $temp = $N[$i];            
        $N[$i] = $N[$indiceMinimo]; 
        $N[$indiceMinimo] = $temp;  
    }

    return $N; 
}

$risultato = ordinarray($listaNumeri);

echo "<br>Array ordinato: ";
print_r($risultato);

?>
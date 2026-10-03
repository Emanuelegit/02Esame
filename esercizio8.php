<?php

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


$N = [10, 30, 61, 89, 5];
$risultato = ordinarray($N);

print_r($risultato);

?>
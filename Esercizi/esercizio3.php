<?php


function arearettangolo($base, $altezza){
    $area = $base * $altezza;

    return $area;
}

function perimetrorettangolo($base, $altezza) {

    $perimetro = ($base + $altezza) * 2;

    return $perimetro;

}


$base=20;
$altezza=50;
$scelta=false;

if ($scelta === true) {

    $perimetro = perimetrorettangolo($base, $altezza);
    echo ("Visto che hai scelto true, il perimetro del rettangolo sarà di $perimetro");

} else {

    $area = arearettangolo($base, $altezza);
    echo ("Visto che hai scelto false, l'area del rettangolo sarà di $area");
}



?>
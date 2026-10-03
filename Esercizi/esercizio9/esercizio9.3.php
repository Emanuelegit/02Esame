<?php

if (empty($_GET['base'])) {
    echo "Attenzione: base mancante! Ne genero una casuale.<br>";
    $base = rand(1, 100);
} else {
    $base = $_GET['base'];
}

if (empty($_GET['altezza'])) {
    echo "Attenzione: altezza mancante! Ne genero una casuale.<br>";
    $altezza = rand(1, 100);
} else {
    $altezza = $_GET['altezza'];
}

function arearettangolo($base, $altezza){
    $area = $base * $altezza;

    return $area;
}

function perimetrorettangolo($base, $altezza) {

    $perimetro = ($base + $altezza) * 2;

    return $perimetro;

}

$scelta=false;

if ($scelta === true) {

    $perimetro = perimetrorettangolo($base, $altezza);
    echo ("Visto che hai scelto true, il perimetro del rettangolo sarà di $perimetro");

} else {

    $area = arearettangolo($base, $altezza);
    echo ("Visto che hai scelto false, l'area del rettangolo sarà di $area");
}

?>
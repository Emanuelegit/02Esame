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

$area = areaRettangolo($base, $altezza);

echo ( "l'area sarà di $area");

?>
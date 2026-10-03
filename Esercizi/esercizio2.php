<?php


function perimetrorettangolo($base, $altezza) {

    $perimetro = ($base + $altezza) * 2;

    return $perimetro;

}

$base=20;
$altezza=50;

$perimetro = perimetrorettangolo($base, $altezza);

echo ("La base fornita è di $base e l'altezza è di $altezza; perciò il perimetro sarà di $perimetro");


?>
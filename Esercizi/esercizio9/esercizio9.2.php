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

function perimetrorettangolo($base, $altezza) {

    $perimetro = ($base + $altezza) * 2;

    return $perimetro;

}

$perimetro = perimetrorettangolo($base, $altezza);

echo ("La base fornita è di $base e l'altezza è di $altezza; perciò il perimetro sarà di $perimetro");

?>
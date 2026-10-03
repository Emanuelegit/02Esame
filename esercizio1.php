<?php



function arearettangolo($base, $altezza){
    $area = $base * $altezza;

    return $area;
}

$base=20;
$altezza=50;

$area = areaRettangolo($base, $altezza);

echo ("La base fornita è di $base e l'altezza è di $altezza; perciò l'area sarà di $area");

?>
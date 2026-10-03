<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Array</title>
</head>
<body>

<h1>Lavorare con gli array</h1>

<h2>Dimensione Array</h2>
<code>
$dim = count($mioArray);
</code>
<p>
<?php
$mioArray = ["rosso", "verde", "blue"];
$dim = count($mioArray);
echo ("Il mio array ha <strong>" . $dim . "</strong> elementi");
?>
</p>
<hr>

<h2>Elemento contenuto in array</h2>
<code>
in_array("valore",$mioArray);
</code>
<p>
<?php
$mioArray = ["rosso", "verde", "blue"];
print_r($mioArray);
if (in_array("rosso", $mioArray)) {
    echo ("<br>È presente<br>");
} else {
    echo ("<br>Non è presente<br>");
}
?>
</p>
<hr>

<h2>Unire 2 array</h2>
<code>
$arrayFinale = array_merge($array_1,$array_2);
</code>
<p>
<?php
echo ("<br>Array 1:<br>");
$array_1 = ["rosso" => 1, "verde" => 2, "blue" => 3];
print_r($array_1);
echo ("<br>Array 2:<br>");
$array_2 = ["giallo" => 4, "viola" => 5, "rosso" => 6];
print_r($array_2);
echo ("<br>L'unione degli array:<br>");
$mioArray = array_merge($array_1, $array_2);
print_r($mioArray);
echo ("La chiave rosso del primo array è stata sovrascritta dal secondo");
?>
</p>
<hr>

<h2>Estrarre chiavi da array associativo</h2>
<code>
$chiavi = array_keys($mioArray);
</code>
<p>
<?php
$mioArray = ["rosso" => 1, "verde" => 2, "blue" => 3];
print_r($mioArray);
$chiavi = array_keys($mioArray);
echo ("<br>Le chiavi sono:<br>");
print_r($chiavi);
?>
</p>
<hr>

<h2>Inserire elemento in array</h2>
<code>
array_push($mioArray,"viola");
</code>
<p>
<?php
$mioArray = ["rosso", "verde", "blue"];
print_r($mioArray);
echo ("<br>Inserisco l'elemento viola<br>");
array_push($mioArray, "viola");
print_r($mioArray);
?>
</p>
<hr>
<h2>Eseguire operazione su ogni valore dell'array</h2>
<code>
$arrayFinale = array_map($callback,$mioArray);
</code>
<p>
<?php
echo ("<br>Calcola il quadrato di ogni elemento dell'array<br>");
$mioArray = [1, 2, 3];
print_r($mioArray);
$callback = function ($n) {
    return $n * $n;
};
$arrayFinale = array_map($callback, $mioArray);
echo ("<br>Array finale:<br>");
print_r($arrayFinale);
?>
</p>
<hr>
</body>
</html>

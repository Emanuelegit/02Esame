<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Array</title>
</head>
<body>

<h1>Gli array</h1>

<h2>Array vuoto</h2>
<code>
$mioArray = array(); // metodo storico<br>
$mioArray = []; // metodo nuovo
</code>
<p>
<?php
$mioArray = [];
print_r($mioArray);
?>
</p>
<hr>

<h2>Array con valori</h2>
<code>
$mioArray = array("rosso","verde","blue"); // metodo storico<br>
$mioArray = ["rosso","verde","blue"]; // metodo nuovo
</code>
<p>
<?php
$mioArray = ["rosso", "verde", "blue"];
print_r($mioArray);
?>
</p>
<hr>

<h2>Selezionare un valore dell'array</h2>
<code>
$mioArray[indice] // seleziona l'elemento dell'array con indice indicato
</code>
<p>
<?php
$mioArray = ["rosso", "verde", "blue"];
print_r($mioArray);
echo ("<br>Elemento di indice 1 = " . $mioArray[1]);
?>
</p>
<hr>

<h2>Cambiare un valore dell'array</h2>
<code>
$mioArray[indice] = "giallo" // cambia l'elemento dell'array con indice indicato
</code>
<p>
<?php
$mioArray = ["rosso", "verde", "blue"];
print_r($mioArray);
echo ("<br>Cambio l'elemento di indice 1 in giallo.<br>");
$mioArray[1] = "giallo";
print_r($mioArray);
?>
</p>
<hr>
<h2>Array associativo con valori</h2>
<code>
$mioArray = array("rosso"=>1,"verde"=>2,"blue"=>3); // metodo storico<br>
$mioArray = ["rosso"=>1,"verde"=>2,"blue"=>3]; // metodo nuovo
</code>
<p>
<?php
$mioArray = ["rosso" => 1, "verde" => 2, "blue" => 3];
print_r($mioArray);
?>
</p>
<hr>
<h2>Selezionare un valore dell'array associativo</h2>
<code>
$mioArray["chiave"] // seleziona l'elemento dell'array con chiave indicata
</code>
<p>
<?php
$mioArray = ["rosso" => 1, "verde" => 2, "blue" => 3];
print_r($mioArray);
echo ("<br>Elemento di chiave verde = " . $mioArray["verde"]);
?>
</p>
<hr>

<h2>Cambiare un valore dell'array associativo</h2>
<code>
$mioArray["chiave"] = valore // cambiare l'elemento dell'array con chiave indicata
</code>
<p>
<?php
$mioArray = [ "rosso" => 1, "verde" => 2, "blue" => 3 ];
print_r($mioArray);
echo ("<br>Cambiare l'elemento di chiave verde in valore 5<br>");
$mioArray["verde"] = 5;
print_r($mioArray);
?>
</p>
<hr>
<h2>Array multidimensionali</h2>
<code>
$mioArray = [ "rosso" => 1, "verde" => 2, "blue" => [ "chiaro", "scuro" ] ]
</code>
<p>
<?php
$mioArray = [ "rosso" => 1, "verde" => 2, "blue" => [ "chiaro", "scuro" ] ];
print_r($mioArray);
?>
</p>
<hr>
</body>
</html>
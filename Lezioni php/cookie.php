<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>I cookies</title>
</head>
<body>

<h1>I Cookies</h1>

<h2>Settare un cookies</h2>
<code>
    setcookie("chiave", "valore", $scadenza, $opzioni);
</code>
<p>
<?php
$chiave = "UserID";
$valore = "10";
$scadenza = strtotime("+1 day");
setcookie($chiave, $valore, $scadenza);
echo ("<br>Ho settato un cookie con chiave $chiave e valore $valore");
?>
</p>
<hr>

<h2>Recuperare un cookie</h2>
<code>
    $variabile=$_COOKIE["chiave"];
</code>
<p>
<?php
$a = $_COOKIE[$chiave];
echo ("Il mio UserID è $a<br>");
?>
</p>
<hr>

<h2>Eliminare un cookie</h2>
<code>
    unset($_COOKIE["chiave"]);
</code>
<p>
<?php
//unset($_COOKIE[$chiave]);
?>
</p>
<hr>

</body>
</html>
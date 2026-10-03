<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Le sessioni</title>
</head>
<body>

<h1>Le sessioni</h1>

<h2>Settare un valore in sessione</h2>
<code>
    $_SESSION["chiave"]="valore";
</code>
<p>
<?php
$chiave = "UserID";
$valore = "10";
$_SESSION[$chiave] = $valore;
echo ("<br>Ho settato una proprietà con chiave $chiave e valore $valore");
?>
</p>
<hr>

<h2>Recuperare un dato in sessione</h2>
<code>
    $variabile=$_SESSION["chiave"];
</code>
<p>
<?php
print_r($_SESSION);
$a = $_SESSION[$chiave];
echo ("<br>Il mio UserID è $a<br>");
?>
</p>
<hr>

<h2>Eliminare un dato in sessione</h2>
<code>
    unset($_SESSION["chiave"]);
</code>

<p>
    <?php
    session_unset();
    $a = $_SESSION[$chiave];
    echo ("<br>Il mio UserID è $a<br>");
    ?>
</p>
<hr>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php

/**
 * 
 * Timestamp indica il numero di secondi trascorsi dalla Unix Epoch
 * quindi i secondi che ci dividono dalle 00:00:00 del 1 gennaio 1970
 * all'istante della chiamata della funzione.
 * Si fa riferimento alla data del Server
 * 
 */
?>
<h2>Timestamp o UnixTime</h2>
<code> time();</code>
<p>
<?php
$a = time();
echo ("Sono passati $a secondi dalle 00:00:00 del 1 gennaio 1970");
?>
</p>
<hr>
<?php
/**
 * 
 * date() serve a trasformare uno unixtime in data in formato leggibile
 *   d   Indica il giorno con lo 0 iniziale (cioè con lo 0 anche per i...)
 *   m   Indica il mese con lo 0 iniziale.
 *   Y   Indica l'anno nel formato a 4 cifre.
 *   H   Indica le ore con 0 iniziale.
 *   i   Indica i minuti con 0 iniziale.
 *   s   Indica i secondi con 0 iniziale.
 *   D   Per indicare i primi tre caratteri del giorno (es. Mon, Tue,...)
 *   j   Equivalente di d ma senza lo 0 (es. 1, 2, 3).
 *   F   Il nome del mese completo (es. January, February, ...).
 *   y   Equivalente di Y ma con le ultime due cifre (es. 21).
 * 
 */
?>
<h2>Formattare date</h2>
<code> date("stringa",data);</code>
<p>
<?php
$a = time();
$today = date("F j, Y, g:i a");
echo ($today . "<br>");
$today = date("m.d.y");
echo ($today . "<br>");
$today = date("j, n, Y");
echo ($today . "<br>");
$today = date("Ymd");
echo ($today . "<br>");
$today = date("h-i-s, j-m-y, it is w Day");
echo ($today . "<br>");
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');
echo ($today . "<br>");
$today = date("D M j G:i:s T Y");
echo ($today . "<br>");
$today = date("H:m:s \m \i\s \m\o\n\t\h");
echo ($today . "<br>");
$today = date("H:i:s");
echo ($today . "<br>");
$today = date("Y-m-d H:i:s"); // the MySQL DATETIME format
echo ($today . "<br>");
$today = date("Y-m-d H:i:s"); // the MySQL DATETIME format
echo ($today . "<br>");
?>
</p>
<hr>
<?php
/**
 * 
 * strtotime() ritorna il timestamp di una data qualsiasi
 * 
 */
?>
<h2>Lavorare con le date</h2>
<code> strtotime("stringa");</code>
<p>
<?php
echo strtotime("now"), "<br>";
echo strtotime("10 September 2000"), "<br>";
echo strtotime("+1 day"), "<br>";
echo strtotime("+1 week"), "<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo strtotime("next Thursday"), "<br>";
echo strtotime("last Monday"), "<br>";
?>
</p>
<hr>
<?php
/**
 * 
 * DateTime() è una classe per lavorare con le date
 * 
 */
?>
<h2>Lavorare con le date Orientato agli oggetti</h2>
<code> class DateTime();</code>
<p>
<?php
$d = new DateTime();
echo "Data odierna: ";
echo ($d->format('Y-m-d\TH:i:s.u') . "<br>");
echo "Data odierna più 10 giorni: ";
$d->add(new DateInterval('P10D'));
echo ($d->format('Y-m-d\TH:i:s.u') . "<br>");
?>
</p>
<hr>
</body>
</html>
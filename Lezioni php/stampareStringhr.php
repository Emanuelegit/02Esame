<?php

function dividi() {
    echo ("<br>" . str_repeat("-", 20) . "<br>");
}
/**
 * 
 * COSTRUTTO ECHO
 * Essendo costrutto non necessita di parentesi tonde
 * Metterle non genera errore di sintassi bisogna fare attenzione
 * che le parentesi faranno parte dell'espressione in uscita.
 * 
 */

// versione corretta
echo "ciao"; // output "ciao"
dividi();

// versione accettata perché ("ciao") è una espressione valida
echo ("ciao"); // output "ciao"
dividi();
// Le operazioni in parentesi vengono eseguite prima della moltiplicazione
echo (2 + 2) * 2; // output 8
dividi();
// versione corretta. La virgola concatena come il punto
echo "ciao ", "mondo"; // output "ciao mondo"
dividi();
echo ("ciao mondo"); // output "ciao mondo"
// versione accettata vengono eseguite prima le espressioni in parentesi.
// La virgola concatena come il punto
echo ("ciao "), ("mondo"); // output "ciao mondo"
dividi();
echo ("ciao ") . ("mondo"); // output "ciao mondo"
// versione errata
//echo ("ciao ", "mondo"); // genera errore

// versione corretta
echo ("ciao " . "mondo"); // output "ciao mondo"
dividi();

$a = "ciao";
$b = "mondo";
echo $a, " ", $b;
dividi();
//echo ($a, " ", $b); // genera errore
echo ($a . " " . $b);
dividi();
echo ("ciao $b");
dividi();

/**
 * 
 * COSTRUTTO PRINT
 * Essendo costrutto non necessita di parentesi tonde
 * Meno performante di echo non accetta le virgole come concatenazione
 * perché accetta un solo argomento e ritorna sempre 1
 * 
 */

$ritorno = print "ciao"; // output "ciao"
dividi();

print "Valore ritorno: " . $ritorno; // output "Valore di ritorno: 1"
dividi();

exit();

if (print "ciao ") {
    print "mondo";
}                       // output "ciao mondo"
dividi();

print 4 * 3; // output 12

/**
 * 
 * COSTRUTTO PRINT_R
 * E' una funzione che permette di visualizzare in modo leggibile
 * array ed oggetti
 * 
 */

$a = array('a' => 'mela', 'b' => 'pera', 'c' => array(1, 2, 3));

echo ($a); //genera un errore di tipo Notice perché vogliamo visualizzare
exit();
dividi();
print_r($a);
dividi();


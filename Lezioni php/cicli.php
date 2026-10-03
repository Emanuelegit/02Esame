<?php

/**
 * 
 * ISTRUZIONE FOR
 * 
 * for(variabile; condizione; incremento){
 *      // fai qualcosa
 * }
 * 
 */

echo ("<br>RISULTATO ISTRUZIONE FOR<br>");
$a = 5;

for ($i = 0; $i < $a; $i++) {
    // faccio qualcosa
    echo ("Sono al ciclo numero: $i<br>");
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");

exit();
/**
 * 
 * ISTRUZIONE WHILE
 * 
 * while(espressione){
 *      // fai qualcosa
 * }
 * 
 */
echo ("<br>RISULTATO ISTRUZIONE WHILE<br>");
$a = 5;
$i = 0;
while ($i < $a) {
    // faccio qualcosa
    echo ("Sono al ciclo numero: $i<br>");
    $i++;
}
// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");

/**
 * 
 * ISTRUZIONE DO... WHILE
 * 
 * do{
 *      // fai qualcosa
 * }while(espressione)
 * 
 */

echo ("<br>RISULTATO ISTRUZIONE DO...WHILE<br>");

$a = 5;
$i = 0;

do {
    echo ("Sono al ciclo numero: $i<br>");
    $i++;
} while ($i < $a);

// continuo il programma

echo (str_repeat("#", 20) . "<br><br>");
exit();


/**
 * 
 * ISTRUZIONE FOREACH
 * 
 * Esegue iterazione su array
 * 
 * foreach(elementi as elemento){
 *      // fai qualcosa
 * }
 * 
 */

echo ("<br>RISULTATO ISTRUZIONE FOREACH<br>");

$a = ['a', 'b', 'c', 'd'];

foreach ($a as $item) {
    echo ("Ciclo l'elemento: $item<br>");
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");

$a = array('prop1' => 'a', 'prop2' => 'b', 'prop3' => 'c', 'prop4' => 'd');

foreach ($a as $chiave => $valore) {
    echo ("Ciclo l'elemento: $chiave con valore: $valore<br>");
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");

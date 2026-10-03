<?php

/**
 * 
 * ISTRUZIONE IF
 * 
 * Fa un confronto che se risulta vero
 * esegue le istruzioni racchiuse tra parentesi graffe
 * 
 * if(espressione){
 *      // fai qualcosa
 * }
 * 
 */

echo ("<br>RISULTATO ISTRUZIONE IF<br>");
$a = 11;

if ($a == 10) {
    // faccio qualcosa
    echo ("I valori sono uguali.<br>");
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");

/**
 * 
 * ISTRUZIONE IF ELSE
 * 
 * Fa un confronto che se risulta vero
 * esegue le istruzioni racchiuse tra parentesi graffe vicine all'IF
 * altrimenti esegue le istruzioni tra le parentesi dopo l'ELSE
 * 
 * if(espressione){
 *      // fai qualcosa
 * }else{
 *      // fai qualcos'altro
 * }
 * 
 */

echo ("<br>RISULTATO ISTRUZIONE IF ELSE<br>");

if ($a == 10) {
    // faccio qualcosa
    echo ("I valori sono uguali.<br>");
} else {
    // faccio qualcos'altro
    echo ("I valori non sono uguali.<br>");
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");

/**
 * 
 * ISTRUZIONE ELSEIF
 * 
 * Concatena l'istruzione ELSE all'IF subito dopo
 * 
 * if(espressione){
 *      // fai qualcosa
 * }elseif(espressione2){
 *      // fai qualcos'altro
 * }else{
 *      // fai ancora altro
 * }
 * 
 */
echo ("<br>RISULTATO ISTRUZIONE ELSE IF<br>");

function valore()
{
    return 11;
}

if ($a == 10) {
    echo ("Entro nel ramo 1<br>");
} else if ($a == valore()) {
    echo ("Entro nel ramo 2<br>");
} else {
    echo ("Entro nel ramo 3<br>");
}

// continuo il programma

echo ("<br>STESSO RISULTATO ISTRUZIONE ELSEIF<br>");

if ($a == 10) {
    echo ("Entro nel ramo 1<br>");
} elseif ($a == valore()) {
    echo ("Entro nel ramo 2<br>");
} else {
    echo ("Entro nel ramo 3<br>");
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");
/**
 * 
 * ISTRUZIONE SWITCH CASE
 * 
 * Esegue il codice del primo blocco CASE che rispetta l'espressione
 * 
 * switch(espressione){
 *      case <caso_1>: // fai qualcosa
 *           break;
 *      case <caso_2>: // fai qualcosa
 *           break;
 *      case <caso_N>: // fai qualcosa
 *           break;
 *      default: // fai qualcosa
 *           break;
 * }
 */

echo ("<br>RISULTATO ISTRUZIONE SWITCH CASE<br>");

switch ($a) {
    case 10:
        echo ("Entro nel ramo 1<br>");
        break;
    case valore():
        echo ("Entro nel ramo 2<br>");
        break;
    default:
        echo ("Entro nel ramo 3<br>");
        break;
}

// continuo il programma
echo (str_repeat("#", 20) . "<br><br>");
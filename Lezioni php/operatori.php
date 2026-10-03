<?php

/**
 * 
 * OPERATORI ARITMETICI
 * Gli operatori aritmetici sono le 4 operazioni fondamentali più il modulo
 * 
 */

$a = 10 + 1; // assegna a $a -> 11[cite: 4]
$a = 10 - 1; // assegna a $a -> 9[cite: 4]
$a = 10 * 2; // assegna a $a -> 20[cite: 4]
$a = 10 / 2; // assegna a $a -> 5[cite: 4]
$a = 10 % 2; // assegna a $a -> 0[cite: 4]

//----------------------------------------

$a = 10;
$b = 2;

$c = $a + $b; // assegna a $c -> 12[cite: 4]
$c = $a - $b; // assegna a $c -> 8[cite: 4]
$c = $a * $b; // assegna a $c -> 20[cite: 4]
$c = $a / $b; // assegna a $c -> 5[cite: 4]
$c = $a % $b; // assegna a $c -> 0[cite: 4]

//----------------------------------------

function val_A()
{
    return 10;
}

function val_B()
{
    return 2;
}

$c = val_A() + val_B(); // assegna a $c -> 12[cite: 4]
$c = val_A() - val_B(); // assegna a $c -> 8[cite: 4]
$c = val_A() * val_B(); // assegna a $c -> 20[cite: 4]
$c = val_A() / val_B(); // assegna a $c -> 5[cite: 4]
$c = val_A() % val_B(); // assegna a $c -> 0[cite: 4]

/**[cite: 5]
 * 
 * OPERATORI DI ASSEGNAMENTO[cite: 5]
 * Gli operatori di assegnamento sono operatori binari e servono[cite: 5]
 * ad assegnare un valore ad una variabile[cite: 5]
 * 
 */

$a = 1; // assegna alla variabile $a il valore 1[cite: 5]
$a += 1; // è come scrivere $a = $a + 1;[cite: 5]
$a -= 1; // è come scrivere $a = $a - 1;[cite: 5]
$a *= 1; // è come scrivere $a = $a * 1;[cite: 5]
$a /= 1; // è come scrivere $a = $a / 1;[cite: 5]

function valore()
{
    return 10;
}

$a = valore(); // assegna alla variabile $a il valore di ritorno della funzione -> 10[cite: 5]

$a = "stringa ";
$a .= "valida"; // è come scrivere $a = $a . "valida";[cite: 5]

/**
 * 
 * OPERATORI BOOLEANI[cite: 5]
 * 
 */

$a = true;
$b = false;

!$a; // il risultato di NOT $a che vale true è false[cite: 5]
$a && $b; // il risultato di $a AND $b che valgono a true AND false che vale false[cite: 5]
$a || $b; // il risultato di $a OR $b che valgono a true OR false che vale true[cite: 5]

/**[cite: 6]
 * 
 * un valore diverso da 0 o da array vuoto viene trattato come true[cite: 6]
 * 
 */

10 && true; // ritorna true[cite: 6]
"string" && true; // ritorna true[cite: 6]
0 && true; // ritorna false[cite: 6]
array() && true; // ritorna false[cite: 6]
array(1, 2, 3) && true; // ritorna true[cite: 6]

/**[cite: 6]
 * 
 * OPERATORI CONDIZIONALE[cite: 6]
 * L'operatore condizionale è un operatore ternario che consente[cite: 6]
 * di valorizzare una espressione in funzione di una condizione.[cite: 6]
 * 
 * (espressione) ? seVera : seFalse;[cite: 6]
 */

$a = (10 && true) ? "vero" : "falso"; // assegna alla variabile $a il valore di "vero"[cite: 6]
$a = (0 && true) ? "vero" : "falso"; // assegna alla variabile $a il valore di "falso"[cite: 6]

/**[cite: 7]
 * 
 * OPERATORI DI RELAZIONE[cite: 7]
 * 
 * ==    Uguale            3 == 3     Vera se entrambi i valori sono uguali[cite: 7]
 * ===   Identico          3 === 3    Vera se entrambi i valori sono uguali e dello stesso tipo[cite: 7]
 * !=    Non uguale        2 != 3     Vera se i due valori non sono uguali[cite: 7]
 * !==   Non identico      2 !== "2"  Vera se i due valori sono diversi o se i tipi sono diversi[cite: 7]
 * >     Maggiore          3 > 2      Vera se il valore di sinistra è maggiore di quello di destra[cite: 7]
 * <     Minore            2 < 3      Vera se il valore di sinistra è minore di quello di destra[cite: 7]
 * >=    Maggiore o uguale 3 >= 2     Vera se il valore di sinistra è maggiore o uguale di quello di destra[cite: 7]
 * <=    Minore o uguale   2 <= 3     Vera se il valore di sinistra è minore o uguale a quello di destra[cite: 7]
 * 
 */

3 == 3; //true[cite: 7]
3 === '3'; //false[cite: 7]
3 !== '3'; //true[cite: 7]
'11' > 5; //true[cite: 7]
3 > '1'; //true[cite: 7]

/**[cite: 7]
 * 
 * Posso confrontare anche le stringhe seguendo il seguente ordine:[cite: 7]
 * 
 * 1. Caratteri Maiuscoli[cite: 7]
 * 2. Caratteri minuscoli[cite: 7]
 * 3. Cifre[cite: 7]
 * 
 */

$a = 'MAIUSCOLO';
$b = 'minuscolo';
$c = '10 cifra';cite: 7
$a > $b; //vero perché la stringa inizia per un carattere maiuscolo[cite: 7]
$b > $c; //vero perché un carattere minuscolo ha priorità su una cifra[cite: 7]
$c > $a; //falso perché un carattere maiuscolo ha priorità[cite: 7]
'B' > 'A'; //vero perché la A viene prima della B[cite: 7]
'm' > 'N'; //falso perché una lettera maiuscola ha priorità rispetto ad una minuscola[cite: 7]
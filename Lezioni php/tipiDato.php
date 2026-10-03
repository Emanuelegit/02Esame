<?php

/**
 * 
 * Tipo booleano - Boolean
 * 
 */

$variabile = true; // assegna vero
$variabile = false; // assegna falso
$variabile = 1 && 1; // assegna vero
$variabile = 1 && 0; // assegna falso
$variabile = 1 || 0; // assegna vero
$variabile = 0 || 0; // assegna falso

/**
 * 
 * Tipo intero - Integer
 * Intervallo definito nella costante PHP_INT_MAX in base all'architettura a 32 o 64bit
 * 
 */

$variabile = 10;
$variabile = 10 + 1;
$variabile = 10 * 2;
$variabile = 10 / 2;
$variabile = 10 - 2;
$variabile = -10;

/**
 * 
 * Tipo numero a virgola mobile - Float o Double
 * Non adatti per calcoli precisi come le valute
 * 
 */

$variabile = 10.4;
$variabile = -10.4;
$variabile = 2.3E6; // 2.3 * 10^6
$variabile = 2.3E-7; // 2.3 * 10^-7


/**
 * 
 * Tipo testo o caratteri - String
 * 
 */

$variabile = "ciao"; // assegna a $variabile -> ciao
$variabile = 'ciao'; // assegna a$variabile -> ciao

$nome = "Rino";
$variabile = "Ciao $nome, dove vai?"; // assegna a $variabile -> "Ciao Rino, dove vai?"
$variabile = 'Ciao$nome, dove vai?'; // assegna a $variabile -> "Ciao $nome, dove vai?"
$variabile = 'Ciao ' . $nome . ', dove vai?'; // assegna a$variabile -> "Ciao Rino, dove vai?" usando il . per concatenare

$variabile = "Ciao";
$variabile =$variabile . " " . $nome; // assegna a$variabile -> Ciao Rino

$variabile = "Piero dice: 'ciao'"; // assegna a $variabile -> Piero dice: 'ciao'$variabile = 'Piero dice: "ciao"'; // assegna a $variabile -> Piero dice: "ciao"

// $variabile='Piero dice: 'ciao'';   // genera errore
// $variabile="Piero dice: "ciao"";   // genera errore

$variabile = 'Piero dice: \'ciao\''; // bisogna usare backslash$variabile = "Piero dice: \"ciao\""; // bisognaIl codice illustra la gestione dei tipi di dato **String** e **Array** in PHP:

/**
 * Tipo testo o caratteri - String
 */

// Stringhe semplici con doppi o singoli apici
$variabile = "ciao"; // assegna a $variabile -> ciao
$variabile = 'ciao'; // assegna a $variabile -> ciao

$nome = "Rino";

// Differenza tra doppi apici (interpolazione variabili) e singoli apici (letterali)
$variabile = "Ciao $nome, dove vai?"; // assegna a $variabile -> "Ciao Rino, dove vai?"
$variabile = 'Ciao $nome, dove vai?'; // assegna a $variabile -> "Ciao $nome, dove vai?"

// Concatenazione mediante l'operatore punto (.)
$variabile = 'Ciao ' . $nome . ', dove vai?'; // assegna a $variabile -> "Ciao Rino, dove vai?" usando il . per concatenare

$variabile = "Ciao";
$variabile = $variabile . " " . $nome; // assegna a $variabile -> Ciao Rino

// Gestione delle virgolette annidate
$variabile = "Piero dice: 'ciao'"; // assegna a $variabile -> Piero dice: 'ciao'
$variabile = 'Piero dice: "ciao"'; // assegna a $variabile -> Piero dice: "ciao"

// Sintassi errata che genera errore di parsing:
// $variabile = 'Piero dice: 'ciao''; // genera errore
// $variabile = "Piero dice: "ciao""; // genera errore

// Escape dei caratteri speciali tramite backslash (\)
$variabile = 'Piero dice: \'ciao\''; // bisogna usare backslash
$variabile = "Piero dice: \"ciao\""; // bisogna usare backslash

// Sintassi Heredoc (<<<EOD) $nome $variabile - // Ciao EOD; a assegna con interpolazione multilinea per testi> Ciao Rino


/**
 * Tipo Array
 */

// Inizializzazione di un array vuoto (sintassi classica vs sintassi breve)
$variabile = array(); // array vuoto
$variabile = []; // array vuoto

// Array indicizzati con tipi omogenei e misti
$variabile = array(1, 2, 3); // array di numeri
$variabile = array("a", "b", "c"); // array di stringhe
$variabile = array(1, "b", false); // array misto
$variabile = [1, "b", false]; // array misto (sintassi breve)

// Array associativi (coppie chiave => valore)
// $variabile = array("prop_1" => 1, "prop_2" => 'ciao'); // array associativo
$variabile = ["prop_1" => 1, "prop_2" => 'ciao']; // array associativo

/**
 * 
 * Tipo Array
 * 
 */

$variabile = array(); //array vuoto
$variabile = []; //array vuoto
$variabile = array(1, 2, 3); //array di numeri
$variabile = array("a", "b", "c"); //array di stringhe
$variabile = array(1, "b", false); // array misto
$variabile = [1, "b", false]; // array misto
$variabile = array("prop_1" => 1, "prop_2" => 'ciao'); //array associativo
$variabile = ["prop_1" => 1, "prop_2" => 'ciao']; //array associativo

/**
 * 
 * Tipo Null
 * 
 */

$variabile = null; //assegna alla variabile -> null
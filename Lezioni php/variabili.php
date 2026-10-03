<?php

/**
 * 
 * 
 * definizioni valide di variabili
 * 
 */
    $miaVariabile="ciao";
    $_miaVariabile="ciao";
    $miaVariabile1="ciao";
    $miaVariabile_2="ciao";
    $_3miaVariabile="ciao";
    $miaVariabile="ciao";

/**
 * 
 * Definizioni non valide di variabili
 * 
 * 
 */

$1234="ciao";
$3miavariabile="ciao";

/**
 * 
 * Assegnazione di valore alla variabile
 * 
 */
$miaVariabile=2;
$miaVariabile=2+1; //assume il valore 3

$b=10
$miaVariabile=2*$b; //assume il valore 20
$miaVariabile=str_repeat("ciao", 2);//assume il valore ciao ciao

/**
 *
 * Lo scope o ambito di una variabile può essere:
 * - globale, quando dichiarata al di fuori di una classe o funzione
 * - locale, quando dichiarata all'interno di una funzione o metodo
 * - statico, qunado non vogliamo che al temine dell'utilizzo la variabile
 *   col suo valore vengano cancellate dala memoria
 * - superglobali, sono le variabili fornite dal PHP stesso e quindi valide ovunque
 *
 */

/**
 *
 * ESEMPIO GLOBALE
 *
 */

$a = "ciao"; // variabile globale

function visualizzaGlobale(){
    echo($a); // genera errore perchè in php una variabile globale non è accessibile da dentro una funzione
}

function visualizzaGlobaleSenzaErrore(){
    global $a;
    echo($a); // stamperà ciao
}

/**
 *
 * ESEMPIO LOCALE
 *
 */

function visualizzaLocale(){
    $a="ciao";
    echo($a); // stamperà ciao
}

echo($a); // genera errore perche $a non esiste fuori dalla funzione


/**
 *
 * ESEMPIO STATICO
 *
 */

function visualizzaStatico(){
    static $a = 0;
    $a = $a + 1;
    echo $a;
}

visualizzaStatico(); //stamperà 1
visualizzaStatico(); //stamperà 2
visualizzaStatico(); //stamperà 3

/**
 *
 * ESEMPIO SUPERGLOBALI
 *
 */

//    $GLOBALS     Contiene le variabili definite come globali attraverso la keyword global.
//    $_SERVER      Contiene gli header e le informazioni relative al server e allo script.
//    $_GET         Contiene i parametri passati tramite URL (es http://miosito.it/?param1=ciao&param2=bello).
//    $_POST        Contiene i parametri passati come POST allo script (es.: dopo il submit di una form).
//    $_FILES       Contiene le informazioni relative ai file uploadati dallo script corrente attraverso il metodo POST.
//    $_COOKIE      Contiene i cookie.
//    $_SESSION     Contiene le informazioni relative alla sessione corrente.
//    $_REQUEST     Contiene tutti i parametri contenuti anche in $_GET, $_POST e $_COOKIE.
//    $_ENV         Contiene tutti i parametri passati all'ambiente.

//#################################################################################################################

/**
 *
 * Definizioni valide di costanti come quelle delle variabili per ciò che riguarda i nomi
 *
 */

define("MIACOSTANTE","ciao");

echo(MIACOSTANTE); // stamperà ciao

/**
 *
 * Costanti predefinite dal PHP
 *
 */

//    __FILE__         Contiene il percorso (path) del file su cui ci troviamo.
//    __DIR__          Contiene il percorso della directory in cui è contenuto il file corrente.
//    __FUNCTION__     Contiene il nome della funzione che stiamo utilizzando.
//    __LINE__         Contiene il numero di riga corrente.
//    __CLASS__        Contiene il nome della classe corrente.
//    __METHOD__       Contiene il nome del metodo corrente.
//    __NAMESPACE__    Contiene il nome del namespace corrente.
//    __TRAIT__        Contiene il nome del trait corrente.
<?php
/**
 * 
 * Una funzione è un insieme di istruzioni che consentono
 * di eseguire una determinata operazione raggruppate in un
 * blocco richiamabile da più punti del programma.
 * 
 * nomefunzione(parametri){
 *      // fai qualcosa
 * }
 * 
 */

// funzione senza ritorno
function scriviCiao()
{
    echo ("ciao!<br>");
}

echo (str_repeat("#", 20) . "<br>");
scriviCiao();
echo (str_repeat("#", 20) . "<br><br>");

//----------------------------------------
// funzione senza ritorno con parametro
function scriviCiaoConParametro($nome)
{
    echo ("ciao $nome!<br>");
}

echo (str_repeat("#", 20) . "<br>");
scriviCiaoConParametro("Pippo");
echo (str_repeat("#", 20) . "<br>");
exit();

//----------------------------------------
// funzione con ritorno
function creaCiao()
{
    return "ciao!<br>";
}

echo (str_repeat("#", 20) . "<br>");
echo (creaCiao());
echo (str_repeat("#", 20) . "<br><br>");

//----------------------------------------
// funzione con ritorno con parametro
function creaCiaoConParametro($nome, $cognome = "")
{
    $str = "ciao $nome $cognome!<br>";
    return $str;
}

echo (str_repeat("#", 20) . "<br>");
$cogn = "Franco";
$str = creaCiaoConParametro("Pippo", $cogn);
echo ($str);
$str = creaCiaoConParametro("Gianni");
echo ($str);
echo (str_repeat("#", 20) . "<br>");

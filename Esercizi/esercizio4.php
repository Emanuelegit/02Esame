<?php

function numeroparidispari($numero) {

    if ($numero % 2 == 0) {

        echo("il numero $numero, è pari");
    } else {
        echo("il numero $numero, è dispari");
    }
}





$numero=6545168;
numeroparidispari($numero);

?>
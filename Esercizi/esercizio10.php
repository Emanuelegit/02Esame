<?php

class Esercizi {

    // Variabili 
    public $base;
    public $altezza;
    public $numero;
    public $N;
    public $minimoProvvisorio;
    //$indiceminimo, $lunghezza e $j devono essere private nelle loro rispettive funzioni (vedere es 8)
    //$somma e $sommatotale devono essere private nelle loro rispettive funzioni (vedere es 5-6)

    // Costruttore
    public function __construct($baseIn = null, $altezzaIn = null, $NIn = null, $minimoProvvisorioIn = null) 
    {
        $this->base = $baseIn;
        $this->altezza = $altezzaIn;
        $this->N = $NIn;
        $this->minimoProvvisorio = $minimoProvvisorioIn;
    }


    public function arearettangolo() {

        $area = $this->base * $this->altezza;
        return $area;
    }


    public function perimetrorettangolo() {
        $perimetro = ($this->base + $this->altezza) * 2;
        return $perimetro;
    }

    public function numeroparidispari($numero) {

        if ($numero % 2 == 0) {

            echo("<br>il numero $numero, è pari");
        } else {
            echo("<br>il numero $numero, è dispari");
        }
    }

    public function calcolasomma($N) {

        $somma = 0;

        for ($i=0; $i<$N; $i++) {

        $somma = $somma += $i;

        }

        return $somma;

    }

    public function calcolasommadispari($N) {

        $sommatotale = 0;

        if ($N % 2 != 0) {

            for ($i=0; $i<$N; $i++) {


                if ($i % 2 != 0 ) {

                    $sommatotale = $sommatotale + $i ;

                }


            } 
        } else {

            echo ("<br><br>Il numero è pari e non posso fare calcoli!!!!");

        }

        return $sommatotale;

    }

    public function ilminimo($N) {

        $minimoProvvisorio = $N[0];

        for ($i=0; $i<count($N); $i++ ) {
            if ($N[$i] < $minimoProvvisorio) {
                $minimoProvvisorio = $N[$i];
            }
        }

        return $minimoProvvisorio;

    }

    public function ordinarray($N) {
    $lunghezza = count($N);

        for ($i = 0; $i < $lunghezza; $i++) {
            
            
            $indiceMinimo = $i;

            
            for ($j = $i + 1; $j < $lunghezza; $j++) {
                
                
                if ($N[$j] < $N[$indiceMinimo]) {
                    
                    $indiceMinimo = $j;
                }
            }

            
            $temp = $N[$i];             
            $N[$i] = $N[$indiceMinimo]; 
            $N[$indiceMinimo] = $temp;  
        }

        return $N; 
    }

}

$area = new Esercizi(20, 50);
echo "Area: " . $area->arearettangolo() . "<br>";


$perimetro = new Esercizi(40, 60);
echo "Perimetro: " . $perimetro->perimetrorettangolo();

$controllonum = new Esercizi();
$controllonum->numeroparidispari(79);

$sommaintervallo = new Esercizi();
echo "<br>La somma è di " . $sommaintervallo->calcolasomma(99);

$sommatotaledispari = new Esercizi();
echo "<br> La somma totale dei numeri dispari è di " . $sommatotaledispari->calcolasommadispari(59);

$risultatonumMin = new Esercizi();
echo "<br> Il numero minimo tra quelli scelti è di " . $risultatonumMin->ilminimo([51,59,6,12]);

$risultatofinale = new Esercizi();
echo ("<br> Ecco la lista dell'array ordinato ") . print_r( $risultatofinale->ordinarray([10, 30, 61, 89, 5]));

?>
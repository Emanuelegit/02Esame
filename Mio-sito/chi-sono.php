<?php

$file = file_get_contents('mio-sito.json');
$dati = json_decode($file, true);

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/chi-sono.min.css">
    <link rel="stylesheet" href="./css/elementi-comuni.min.css">
    <title>Chi sono</title>
</head>
<body>
    
        <header>
            <?php 
            
            $paginaCorrente = basename($_SERVER['PHP_SELF']); 
            ?>
            <nav>
                <ul>
                    <li><img src="./img/logo.jpg" width="150"></li>
                    <?php foreach ($dati[0] as $chiave => $valore) : ?>
                    <?php 
                        
                        if ($valore === 'Contatti') {
                            $url = '#contatti';
                        } else {
                            
                            $url = $chiave . '.php';
                        }
                    ?>
                    <li><a href="<?= $url ?>" title="<?= $valore ?>"><?= $valore ?></a></li>
                <?php endforeach; ?>
                </ul>
            </nav>
        </header>
    <div class="prima-parte">         
        <img src="./img/Mia_immagine.webp" width="120">
        <h1>Chi sono</h1>
        <p>Ciao, sono Emanuele Ippoliti, Full Stack Developer. La mia passione per lo sviluppo nasce dal desiderio di trasformare idee e concetti in soluzioni digitali concrete, funzionali e curate in ogni singolo dettaglio. Credo che un grande progetto web nasca dal perfetto equilibrio tra una solida logica backend — strutturata, pulita e orientata agli oggetti per garantire sicurezza ed efficienza — e un'interfaccia frontend moderna, intuitiva e piacevole da navigare, pensata per offrire un'esperienza utente fluida su qualsiasi dispositivo. Nel mio percorso di studio e pratica mi dedico con entusiasmo all'intero ciclo di vita di un'applicazione, dalla gestione dei dati lato server fino alla cura visiva dei layout, studiando costantemente nuove tecnologie per scrivere codice modulare, manutenibile e performante. Il mio obiettivo è collaborare su progetti stimolanti e dinamici, portando precisione, creatività e una visione d'insieme completa per dare vita a prodotti digitali di qualità</p>
        
    </div>

    <main>
        <div class="professioni">
            
           <h2>Informatico</h2>
            <p>Come professionista IT, interpreto lo sviluppo software non solo come scrittura di codice, ma come progettazione di un'architettura logica fondata su rigore metodologico e scalabilità. Il mio approccio tecnico si concentra sulla solidità strutturale dei sistemi, sull'efficienza dei flussi di dati e sull'adozione rigorosa degli standard di conformità e sicurezza. Affronto ogni progetto con una mentalità analitica orientata al problem-solving e alla manutenibilità a lungo termine: dalla gestione pulita della persistenza dei dati e della logica server-side fino all'organizzazione modulare dell'intero ecosistema applicativo. Credo che il valore di un informatico risieda nella capacità di tradurre requisiti complessi in infrastrutture stabili, performanti e pronte ad evolvere nel tempo, mantenendo sempre un perfetto equilibrio tra astrazione teorica e pragmatismo operativo.</p>             
        </div>

        <div class="contatto">
            <div id="contatti" class="testo-contatti">
                <h2>Contattami</h2>
                <p>Compila il form per raccontarmi la tua idea: ti ricontatterò a breve per definire insieme il progetto.</p>
            </div>

            <div class="form-contatti">
                <form action="" method="post">
                <!--Genero gli input richiamando la classe Contatti e faccio un controllo su di essi, in caso positivo salviamo tutto dentro dati-form.txt--> 
                    <?php 
                        include_once 'funzioni php/form-contatti.php';

                        $form = new Contatti();
                        
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            
                            $nome = trim($_POST['nome'] ?? '');
                            $cognome = trim($_POST['cognome'] ?? '');
                            $email = trim($_POST['email'] ?? '');
                            $servizio = trim($_POST['servizio'] ?? '');
                            $messaggio = trim($_POST['messaggio'] ?? '');
                            $telefono = trim($_POST['telefono'] ?? '');

                            
                            if (empty($nome) || empty($email) || empty($cognome) || empty($servizio) || empty($messaggio)) {
                                echo "<p style='color:red;'>Errore: compila tutti i campi obbligatori!</p>";
                            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "<p style='color:red;'>Errore: l'indirizzo email non è valido!</p>";
                            } else {
                                
                                $riga_dati = "Nome : $nome | Cognome : $cognome | Email : $email | Servizio : $servizio | Telefono : $telefono | Messaggio : $messaggio". PHP_EOL;

                                file_put_contents('dati-form.txt', $riga_dati, FILE_APPEND);

                                echo "<p style='color:green;'>Richiesta inviata con successo!</p>";
                                
                            }
                        }

                        
                        $form->generaInput(); 
                    ?>
                    <label>Servizio:
                        <select name="servizio" id="servizio">
                            <option value="" disabled selected>Seleziona un servizio...</option>
                            <option value="web">Sviluppo Web</option>
                            <option value="grafica">Grafica & UI</option>
                            <option value="altro">Altro</option>
                        </select>
                    </label>
                    <label>Ho letto e accetto la <a href="Privacy-policy.php" title="Pagina Privacy Policy">Privacy Policy</a><input type="checkbox" name="Spunta"></label>
                    <label>Messaggio : <textarea rows="10" cols="40" placeholder="Descrivi la tua richiesta di ricontatto" name="messaggio" maxlength="1000">
                    </textarea><span id="contatore">0/1000</span></label>
                    <script src="./javascript/form.js"></script>

                    <div class="bottone">
                        <input type="submit" value="Invia">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>    
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Emanuele Ippoliti - Tutti i diritti riservati - Leggi anche la <a href="Cookie-policy.php" title="Pagina Cookie Policy">Cookie Policy</a></p>
    </footer>
</body>
</html>
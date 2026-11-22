<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once './funzioni_php/layout.php';
require_once './funzioni_php/form-contatti.php';

$file = file_get_contents('mio-sito.json');
$dati = json_decode($file, true);

$form = new Contatti();
$daRipopolare = [];$errore = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {$valori = [
        'nome'      => trim($_POST['nome'] ?? ''),
        'cognome'   => trim($_POST['cognome'] ?? ''),
        'email'     => trim($_POST['email'] ?? ''),
        'telefono'  => trim($_POST['telefono'] ?? ''),
        'oggetto'   => trim($_POST['oggetto'] ?? ''),
        'servizio'  => trim($_POST['servizio'] ?? ''),
        'messaggio' => trim($_POST['messaggio'] ?? '')
    ];

    $privacyAccettata = isset($_POST['Spunta']);
    $controllo_telefono = preg_replace('/[\s\-\.]/', '',$valori['telefono']);

    if (
        empty($valori['nome']) ||
        empty($valori['cognome']) ||
        empty($valori['email']) ||
        empty($valori['telefono']) ||
        empty($valori['servizio']) ||
        empty($valori['messaggio']) ||
        !$privacyAccettata
    ) {
        $errore = "Errore: compila tutti i campi obbligatori e accetta la Privacy Policy!";
        $daRipopolare =$valori;
    } elseif (!filter_var($valori['email'], FILTER_VALIDATE_EMAIL)) {$errore = "Errore: l'indirizzo email non è valido!";
        $daRipopolare =$valori;
    } elseif (!preg_match('/^\+?[0-9]{6,15}$/', $controllo_telefono)) {$errore = "Errore: il numero di telefono non è valido!";
        $daRipopolare =$valori;
    } else {
        $riga_dati = "Nome : {$valori['nome']} | Cognome : {$valori['cognome']} \vert{} Email : {$valori['email']} | Telefono : {$valori['telefono']} \vert{} Oggetto : {$valori['oggetto']} | Servizio : {$valori['servizio']} \vert{} Messaggio : {$valori['messaggio']}" . PHP_EOL;

        file_put_contents('dati-form.txt', $riga_dati, FILE_APPEND);

        $_SESSION['flash_successo'] = "Richiesta inviata con successo!";
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '#contatti');
        exit;
    }
}

$messaggioSuccesso =$_SESSION['flash_successo'] ?? '';
unset($_SESSION['flash_successo']);
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
        <?php menuNav(); ?>
    </header>

    <div class="prima-parte">
        <img src="./img/Mia_immagine.webp" alt="Foto di Emanuele Ippoliti" width="120">
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
                <form action="" method="post" class="form-contatto" novalidate>
                    <?php if ($errore !== ''): ?>
                        <p style="color:red;"><?= htmlspecialchars($errore) ?></p>
                    <?php endif; ?>

                    <?php if ($messaggioSuccesso !== ''): ?>
                        <p style="color:green;"><?= htmlspecialchars($messaggioSuccesso) ?></p>
                    <?php endif; ?>

                    <?php
                    $form->generaInput($daRipopolare);
                    $servizioSelezionato =$daRipopolare['servizio'] ?? '';
                    ?>

                    <label>Servizio:
                        <select name="servizio" id="servizio">
                            <option value="" disabled <?= $servizioSelezionato === '' ? 'selected' : '' ?>>Seleziona un servizio...</option>
                            <option value="web" <?= $servizioSelezionato === 'web' ? 'selected' : '' ?>>Sviluppo Web</option>
                            <option value="grafica" <?= $servizioSelezionato === 'grafica' ? 'selected' : '' ?>>Grafica & UI</option>
                            <option value="altro" <?= $servizioSelezionato === 'altro' ? 'selected' : '' ?>>Altro</option>
                        </select>
                    </label>

                    <label>
                        Ho letto e accetto la <a href="Privacy-policy.php" title="Pagina Privacy Policy">Privacy Policy</a>
                        <input type="checkbox" name="Spunta" <?= isset($_POST['Spunta']) && !empty($daRipopolare) ? 'checked' : '' ?>>
                    </label>

                    <label>
                        Messaggio :
                        <textarea id="messaggio" rows="10" cols="40" placeholder="Descrivi la tua richiesta di ricontatto" name="messaggio" maxlength="1000"><?= htmlspecialchars($daRipopolare['messaggio'] ?? '') ?></textarea>
                        <span id="contatore">0/1000</span>
                    </label>

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
        <?php footer(); ?>
    </footer>
</body>
</html>
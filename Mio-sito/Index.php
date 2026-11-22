<?php
// 1. Avvia la sessione SUBITO in cima, prima di qualsiasi output HTML o echo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once './funzioni_php/layout.php';
require_once './funzioni_php/form-contatti.php';

$file = file_get_contents('mio-sito.json');
$dati = json_decode($file, true);

$form = new Contatti();
$daRipopolare = []; // contiene i valori da rimettere nei campi SOLO in caso di errore
$errore = '';       // Messaggio di errore 

// 2. Gestione dell'invio del form quando arriva una richiesta POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupero e ripulisco dagli spazi esterni tutti i campi inviati
    $valori = [
        'nome'      => trim($_POST['nome'] ?? ''),
        'cognome'   => trim($_POST['cognome'] ?? ''),
        'email'     => trim($_POST['email'] ?? ''),
        'telefono'  => trim($_POST['telefono'] ?? ''),
        'oggetto'   => trim($_POST['oggetto'] ?? ''),
        'servizio'  => trim($_POST['servizio'] ?? ''),
        'messaggio' => trim($_POST['messaggio'] ?? '')
    ];

    // Controllo se la checkbox della Privacy Policy è stata spuntata
    $privacyAccettata = isset($_POST['Spunta']);

    // Controllo su telefono per evitare punti e/o caratteri indesiderati
    $controllo_telefono = preg_replace('/[\s\-\.]/', '', $valori['telefono']);

    // Se c'è un errore, salva i dati in $daRipopolare
    if (
        empty($valori['nome']) ||
        empty($valori['cognome']) ||
        empty($valori['email']) ||
        empty($valori['telefono']) ||
        empty($valori['oggetto']) ||
        empty($valori['servizio']) ||
        empty($valori['messaggio']) ||
        !$privacyAccettata
    ) {
        $errore = "Errore: compila tutti i campi obbligatori e accetta la Privacy Policy!";
        $daRipopolare = $valori;
    } elseif (!filter_var($valori['email'], FILTER_VALIDATE_EMAIL)) {
        $errore = "Errore: l'indirizzo email non è valido!";
        $daRipopolare = $valori;
    } elseif (!preg_match('/^\+?[0-9]{6,15}$/', $controllo_telefono)) {
        $errore = "Errore: il numero di telefono non è valido!";
        $daRipopolare = $valori;
    } else {
        // Messaggio di successo
        $riga_dati = "Nome : {$valori['nome']} | Cognome : {$valori['cognome']} | Email : {$valori['email']} | Telefono : {$valori['telefono']} | Oggetto : {$valori['oggetto']} | Servizio : {$valori['servizio']} | Messaggio : {$valori['messaggio']}" . PHP_EOL;

        file_put_contents('dati-form.txt', $riga_dati, FILE_APPEND);

        //Funzione per evitare che premendo F5 si rimandi il form 
        $_SESSION['flash_successo'] = "Richiesta inviata con successo!";
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '#contatti');
        exit;
    }
}

// Recupera l'eventuale messaggio di successo dopo il redirect e lo cancella subito, così al prossimo refresh non comparirà più
$messaggioSuccesso = $_SESSION['flash_successo'] ?? '';
unset($_SESSION['flash_successo']);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/elementi-comuni.min.css" rel="stylesheet">
    <link href="./css/index.min.css" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    <header>
        <?php menuNav(); ?>
        <div class="immagine">
            <img src="./img/Sfondo3.png" alt="Sfondo homepage">
        </div>
        <div class="prima-parte">
            <div class="testo">
                <h1>Benvenuto sul mio sito</h1>
                <p>Sono un Full Stack Developer appassionato della progettazione e dello sviluppo di soluzioni web complete, curate in ogni dettaglio: dalla solida logica backend all'interfaccia utente moderna e pulita.</p>
            </div>
            <div class="bottone">
                <form action="./chi-sono.php">
                    <input type="submit" value="Leggi di più">
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="titolo">
            <h2>Le mie collaborazioni</h2>
        </div>

        <div class="collaborazioni">
            <?php
            $immagini = [
                [
                    "url" => "./img/Collab1.png",
                    "descrizione" => "Moze"
                ],
                [
                    "url" => "./img/Collab2.png",
                    "descrizione" => "Caffeina"
                ],
                [
                    "url" => "./img/Collab3.png",
                    "descrizione" => "WWG"
                ],
                [
                    "url" => "./img/Collab4.png",
                    "descrizione" => "Aquest"
                ]
            ];

            foreach ($immagini as $valore): ?>
                <img src="<?= htmlspecialchars($valore['url']) ?>" alt="<?= htmlspecialchars($valore['descrizione']) ?>" width="200">
            <?php endforeach; ?>
        </div>

        <div class="bottone">
            <form action="./portfolio.php">
                <input type="submit" value="Guarda i miei lavori">
            </form>
        </div>

        <div class="contatto">
            <div id="contatti" class="testo-contatti">
                <h2>Contattami</h2>
                <p>Compila il form per raccontarmi la tua idea: ti ricontatterò a breve per definire insieme il progetto.</p>
            </div>

            <div class="form-contatti">
                <form action="" method="post" class="form-contatto" novalidate>
                    <!-- Controlla errori di validazione -->
                    <?php if ($errore !== ''): ?>
                        <p style="color:red;"><?= htmlspecialchars($errore) ?></p>
                    <?php endif; ?>

                    <!-- Mostra messaggio di successo (solo una volta dopo il redirect) -->
                    <?php if ($messaggioSuccesso !== ''): ?>
                        <p style="color:green;"><?= htmlspecialchars($messaggioSuccesso) ?></p>
                    <?php endif; ?>

                    <?php
                    // Se c'è stato un errore, $daRipopolare ha i valori inseriti;
                    // se è la prima apertura o l'invio è riuscito, è vuoto []
                    $form->generaInput($daRipopolare);
                    $servizioSelezionato = $daRipopolare['servizio'] ?? '';
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
                        <!-- Mantiene la spunta solo se c'è stato un errore di validazione -->
                        <input type="checkbox" name="Spunta" <?= isset($_POST['Spunta']) && !empty($daRipopolare) ? 'checked' : '' ?>>
                    </label>

                    <label>
                        Messaggio :
                        <!-- Niente spazi o a capo inutili tra i tag per non aggiungere righe vuote -->
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
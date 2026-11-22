<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once './funzioni_php/layout.php';
require_once './funzioni_php/form-contatti.php';

$file = file_get_contents('mio-sito.json');
$dati = json_decode($file, true);

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$lavoroTrovato = null;

foreach ($dati[2]['portfolio'] ?? [] as $macroarea) {
    foreach ($macroarea['lavori'] ?? [] as $lavoro) {
        if ((int) $lavoro['id'] === $id) {
            $lavoroTrovato = $lavoro;
            break 2;
        }
    }
}

$form = new Contatti();
$daRipopolare = [];
$errore = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valori = [
        'nome'      => trim($_POST['nome'] ?? ''),
        'cognome'   => trim($_POST['cognome'] ?? ''),
        'email'     => trim($_POST['email'] ?? ''),
        'telefono'  => trim($_POST['telefono'] ?? ''),
        'oggetto'   => trim($_POST['oggetto'] ?? ''),
        'servizio'  => trim($_POST['servizio'] ?? ''),
        'messaggio' => trim($_POST['messaggio'] ?? '')
    ];

    $privacyAccettata = isset($_POST['Spunta']);
    $controllo_telefono = preg_replace('/[\s\-\.]/', '', $valori['telefono']);

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
        $daRipopolare = $valori;
    } elseif (!filter_var($valori['email'], FILTER_VALIDATE_EMAIL)) {
        $errore = "Errore: l'indirizzo email non è valido!";
        $daRipopolare = $valori;
    } elseif (!preg_match('/^\+?[0-9]{6,15}$/', $controllo_telefono)) {
        $errore = "Errore: il numero di telefono non è valido!";
        $daRipopolare = $valori;
    } else {
        $riga_dati = "Nome : {$valori['nome']} | Cognome : {$valori['cognome']} | Email : {$valori['email']} | Telefono : {$valori['telefono']} | Oggetto : {$valori['oggetto']} | Servizio : {$valori['servizio']} | Messaggio : {$valori['messaggio']}" . PHP_EOL;

        file_put_contents('dati-form.txt', $riga_dati, FILE_APPEND);

        $_SESSION['flash_successo'] = "Richiesta inviata con successo!";
        $redirectUrl = strtok($_SERVER['REQUEST_URI'], '?') . ($id > 0 ? '?id=' . $id : '') . '#contatti';
        header('Location: ' . $redirectUrl);
        exit;
    }
}

$messaggioSuccesso = $_SESSION['flash_successo'] ?? '';
unset($_SESSION['flash_successo']);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/lavoro.min.css">
    <link rel="stylesheet" href="./css/elementi-comuni.min.css">
    <title>Lavoro</title>
</head>
<body>
    <header>
        <?php menuNav(); ?>
    </header>

    <main>
        <?php if ($lavoroTrovato !== null): ?>
            <fieldset>
                <h1><?= htmlspecialchars($lavoroTrovato['titolo']); ?></h1>
                <ul>
                    <li><?= htmlspecialchars($lavoroTrovato['descrizione']); ?></li>
                    <li><?= htmlspecialchars($lavoroTrovato['tecnologie']); ?></li>
                </ul>
            </fieldset>
            <fieldset>
                <img src="./img/Logo-lavoro.jpg" alt="Logo del progetto" width="120">
                <input type="button" value="Vai al sito">
            </fieldset>
        <?php else: ?>
            <p>Lavoro non trovato.</p>
            <a href="portfolio.php">Torna al portfolio</a>
        <?php endif; ?>

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
<?php

$file = file_get_contents('mio-sito.json');
$dati = json_decode($file, true);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/elementi-comuni.min.css" rel="stylesheet" >
    <link href="./css/index.min.css" rel="stylesheet" >
    <title>Homepage</title>
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
                                
                        $url = ($paginaCorrente === 'index.php') ? '#contatti' : 'index.php#contatti';
                    } else {
                                
                            $url = $chiave . '.php';
                    }
                ?>
                <li><a href="<?= $url ?>" title="<?= $valore ?>"><?= $valore ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="immagine">
            <img src="./img/Sfondo3.png" />
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

            foreach ($immagini as $chiave => $valore): ?>
                <img src="<?php echo $valore['url']; ?>" alt="<?php echo $valore['descrizione']; ?>" width="200">
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
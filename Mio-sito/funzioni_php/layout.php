<?php 

function menuNav(): void {
    $file = file_get_contents('mio-sito.json');
    $dati = json_decode($file, true);
    $paginaCorrente = basename($_SERVER['PHP_SELF']); ?>
    <nav>
        <div class="nav-top">
            <button type="button" class="hamburger" aria-label="Apri menu" aria-expanded="false">&#9776;</button>
        </div>
        <ul class="menu-voci">
            <img src="./img/logo.jpg" width="150" alt="logo">
            <?php foreach ($dati[0] as $chiave => $valore) :
                if ($valore === 'Contatti') {
                    $url = ($paginaCorrente === 'index.php') ? '#contatti' : 'index.php#contatti';
                } else {
                    $url = $chiave . '.php';
                } ?>
                <li><a href="<?= htmlspecialchars($url) ?>" title="<?= htmlspecialchars($valore) ?>"><?= htmlspecialchars($valore) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <script>
        (function () {
            const btn = document.querySelector('header .hamburger');
            const menu = document.querySelector('header .menu-voci');
            if (!btn || !menu) return;
            btn.addEventListener('click', function () {
                const aperto = menu.classList.toggle('aperto');
                btn.setAttribute('aria-expanded', aperto ? 'true' : 'false');
            });
        })();
    </script>
<?php
}

function footer(): void { ?>
    <p>&copy; 2026 Emanuele Ippoliti - Tutti i diritti riservati - Leggi anche la <a href="Cookie-policy.php" title="Pagina Cookie Policy">Cookie Policy</a></p>
<?php
}
?>
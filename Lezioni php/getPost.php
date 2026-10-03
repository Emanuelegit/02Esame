<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>I cookies</title>
</head>
<body>
<h1>Richieste HTTP</h1>

<h2>Richiesta di tipo GET</h2>
<code>
    $valore = $_GET["chiave"];
</code>
<p>
    <a href="getPost.php?chiave=valore&chiave2=valore2" title="clicca q">
    <a href="getPost.php" title="clicca qui">Clicca qui per non passare
    <br><br>
    Oppure compila il form<br>
    <form action="getPost.php" method="GET">
        <label for="txt_01">Nome</label>
        <input type="text" name="nome" id="txt_01">
        <label for="txt_02">Cognome</label>
        <input type="text" name="cognome" id="txt_02">
        <br><br>
        <button type="submit">Invia</button>
    </form>
</p>
<code>
    $_GET:<br>
    <?php
    if (count($_GET) > 0) {
        print_r($_GET);
    }
    ?>
</code>
<hr>

<h2>Richiesta di tipo POST</h2>
<code>
    $valore = $_POST["chiave"];
</code>
<p>
    <form action="getPost.php" method="POST">
        <label for="txt_01">Nome</label>
        <input type="text" name="nome" id="txt_01">
        <label for="txt_02">Cognome</label>
        <input type="text" name="cognome" id="txt_02">
        <br><br>
        <button type="submit">Invia</button>
    </form>
</p>
<code>
    $_POST:<br>
    <?php
    if (count($_POST) > 0) {
        print_r($_POST);
    }
    ?>
</code>
<hr>
</body>
</html>
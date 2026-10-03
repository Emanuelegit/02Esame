<?php
require_once("head.php");
$titulo = "Prima pagina";
$testo = "Lorem Ipsum";
$numeroParagrafi = 3;
$flag = true;
?>
<!DOCTYPE html>
<html lang="en">

<?php echo headPHP($titulo, $flag) ?>

<body>
    <h1><?php echo $titulo; ?></h1>
    <?php for ($i = 0; $i < $numeroParagrafi; $i++) { ?>
        <p>
            <?php echo $testo; ?>
        </p>
    <?php } ?>
    <hr>

    <?php if ($flag) { ?>
        <h2>Titolo ramo vero</h2>
    <?php } else { ?>
        <h2>Titolo ramo false</h2>
    <?php } ?>

    <hr>

    <?php require("footer.php"); ?>

</body>
</html>
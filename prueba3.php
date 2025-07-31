<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//PHP embebido
$nombre = "Mati";
$edad = 25;
$valor = 100;

$aNombres = array("Mati", "Julio", "Matt", "Joule");
$aNombres1 = ["Mati", "Julio", "Matt", "Joule"]; //sintaxis corta
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP</title>
</head>
<body>
    <p>Resultado es = <?php echo $valor; ?></p>
    <?php if ($edad > 18): ?>
        Hola <?php echo $nombre ?>, sos mayor de edad. <br>
    <?php else: ?>
        Hola <?php echo $nombre ?>, sos menor de edad.
    <?php endif; ?>
    <table class="table table-hover border">
        <?php foreach ($aNombres as $nombre) { ?>
            <tr><td>Hola <?php echo $nombre ?></td></tr>
        <?php } ?>
    </table>
    <?php /*sintaxis corta*/ foreach ($aNombres1 as $nombre) : ?>
        Hola <?php echo $nombre; ?> <br>
        <?php endforeach; ?>
</body>
</html>
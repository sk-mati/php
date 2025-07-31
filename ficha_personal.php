<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("America/Argentina/Buenos_Aires");

$nombre = "Matías Sidoti Knap";
$edad = 25; 
$aPeliculas = array("Before Sunrise", "Paterson", "Before Sunset");

//print_r
//var_dump
//Analizan el contenido de las variables

// $aPeliculas = ["Before Sunrise", "Paterson", "Before Sunset"]; Otra forma
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table border table-hover">
                        <tr>
                            <th>Fecha:</th>
                            <td><?php echo date("d/m/Y"); ?></td>
                        </tr>
                        <tr>
                            <th>Nombre y Apellido:</th>
                            <td><?php echo $nombre; ?></td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td><?php echo $edad; ?></td>
                        </tr>
                        <tr>
                            <th>Películas favoritas:</th>
                            <td><?php echo $aPeliculas[0]; ?><br>
                                <?php echo $aPeliculas[1]; ?><br>
                                <?php echo $aPeliculas[2]; ?>
                                </td>
                        </tr>
                </table>
            </div>
        </div>
    </main>
<?php

ini_set('display', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$archivo1 = fopen('datos.txt', 'a'); //abre el archivo en modo append
$archivo2 = fopen('datos_personales.txt', 'a+');
$persona = "Mati Sidoti27\n";
fwrite($archivo2, 'Hasta luego.');
file_put_contents('datos.txt', $persona);
file_put_contents('datos_personales.txt', $persona);
fclose($archivo1); //cierra el archivo
fclose($archivo2);
echo "Actualizado";

//recuperar el contenido
$contenido = file_get_contents("datos.txt");

//concatenar
$contenido .= "Mati Sidoti\n";

//almacenar
file_put_contents("datos.txt", $contenido);

"<br>";

$archivo1 = fopen("datos.txt", "r");
if ($archivo1) {
    while (($fila = fgets($archivo1)) == true) {
        echo $fila;
    }
}
fclose($archivo1);

if (file_exists("datos.txt")) {
    echo "El archivo existe";
} else {
    echo "El archivo NO existe";
}
?>
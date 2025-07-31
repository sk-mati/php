<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//definición
function print_f($variable) {
    if(is_array($variable)) {
        $archivo = fopen('datos.txt', 'a+');
        //si es un array, lo recorro y guardo el contenido en el archivo "datos.txt"
        fwrite($archivo, "\nDatos del array ==>\n");

        foreach($variable as $item) {
            fwrite($archivo, $item . "\n");
        }
        fclose($archivo);
    } else {
        //entonces es string, guardo el contenido en el archivo "datos.txt"
        $contenido = "Datos de la variable ==>\n" . $variable;
        file_put_contents("datos.txt", $contenido);
    }
    echo "Archivo generado.";
}
//uso
$aNotas = array(8,5,7,9,10);
$msg = "Este es un mensaje!";
print_f($aNotas);
//print_f($msg);
?>
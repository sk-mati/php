<?php

//definición
function promediar($aNumeros) {
    $suma = 0;
    foreach ($aNumeros as $numero) {
        $suma += $numero;
    }
    return $suma / count($aNumeros);
}

//uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);
echo "El promedio de notas es: " . promediar($aNotas) . "<br>";
echo "El promedio de sueldos es: " . promediar($aSueldos) . "<br>";
?>
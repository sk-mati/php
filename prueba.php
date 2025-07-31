<?php
$stock = 10;

while ($stock > 0) {
    echo "El stock es $stock <br>";
    $stock--;
}
echo "stock agotado";
?>

<br>

<?php 
$contador = 5;

while ($contador > 0) {
    echo "$contador <br>";
    $contador--;
}
echo "fin del programa";
?>

<?php
/*while (1==1) {
    echo "error lógico";
}*/
?>

<br>

<?php
$cantidad = 0;

do {
    echo $cantidad;
    $cantidad--;
} while ($cantidad > 0);
echo "fin del programa";
?>

<br>

<?php
$aProductos = array("TV Samsung", "Cafetera Oster", "Notebook HP");

$contador = 0;
echo "<table>";
while($contador < 3) {
    echo "<tr><td>" . $aProductos[$contador] . "<td><tr>";
    $contador++;
}
echo "<table>";
?>

<br><br>

<?php 
//for (inicio; condicion; paso) {
    //código a ejecutar
//}
?>

<br>

<?php 
for($i = 0; $i < 10; $i++) {
    echo $i;
}
?>

<br>

<?php 
$aProductos = array("Tv Samsung", "Cafetera Oster", "Notebook HP");

echo "<table>";
for($i = 0; $i < count($aProductos); $i++) {
    echo "<tr><td>" . $aProductos[$i] . "</td></tr>";
}
echo "</table>";
?>

<br>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
"marca" => "Hitachi",
"modelo" => "554KS20",
"stock" => 60,
"precio" => 58000,
);
$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
"marca" => "Samsung",
"modelo" => "Galaxy A30",
"stock" => 0,
"precio" => 22000,
);
$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frio/Calor Surrey 2900F",
"marca" => "Surrey",
"modelo" => "553AIQ1201E",
"stock" => 5,
"precio" => 45000,
);

for($i = 0; $i < count($aProductos); $i++) {
    echo $aProductos[$i]["nombre"];
    echo "<br>";
    echo $aProductos[$i]["precio"];
    echo "<br>";
}
?>

<br>

<?php
for ($i = 0; $i < 15; $i+=5) {
    echo $i . "<br>";
}
?>

<br>

<?php 
for ( $i = 0; $i <= 100; $i+=2) {
    echo $i . "<br>";
}
?>

<br>

<?php 
for ($i = 0; $i <= 100 && $i != 60; $i+=2) {
    echo $i . "<br>";
}
?>

<br>

<?php
/*for ($i = 0; $i <= 100 || $i != 60; $i+=2) {
    echo $i . "<br>";
}
error lógico*/
?>

<br>

<?php
//break interrumpe el bucle
//continue salta una condición
//exit corta la ejecución del código
//return devuelve un valor o sale de la ejecución
?>

<?php
$aNombres = array("María", "Juana", "Miguel", "Andrés");
for ($i = 0; $i < count($aNombres); $i++) {
    if($aNombres[$i] == "Miguel") {
        break;
    }
    echo "$aNombres[$i] <br>";
}
?>

<br>

<?php
$aNombres = array("Maria", "Juana", "Miguel", "Andrés");
for ($i = 0; $i < count($aNombres); $i++) {
    if($aNombres[$i] == "Miguel") {
        continue;
    }
    echo "$aNombres[$i] <br>";
}
?>

<br>

<?php
$var = "Un texto";
print_r($var); //esto se imprime

exit;

$numero = 1;
echo $numero; //esto no llega a imprimirse
?>
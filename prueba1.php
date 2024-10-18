<?php
$aClientes=array("Juan", "María", "Miguel", "Andrés");
?>

<?php
for ($i=0; $i < count($aClientes); $i++) {
    echo $aClientes[$i];
}
?>

<br>

<?php
foreach ($aClientes as $cliente) {
    echo $cliente . "<br>";
}
?>

<br>

<?php 
$aNotas = array(9, 8, 9.5, 4, 7, 8);
$contador = 0;
foreach ($aNotas as $nota) {
    echo $nota . "<br>";
    $contador++;
}

echo "la cantidad es: $contador";
?>

<br>

<?php 
$aAnimales = array("Perro", "Gato", "Ratón");
foreach ($aAnimales as $animal) {
        echo $animal . "<br>";
}
for ($i=0; $i < count($aAnimales); $i++) {
    echo $aAnimales[$i] . "<br>";
}
?>

<br>

<?php
$miAuto = array(
    "patente" => "AA123HB",
    "marca" => "Ford"
);
echo $miAuto["marca"] . "<br>";
foreach ($miAuto as $valor) {
    echo $valor;
}
?>

<br>

<?php
$miAuto = array(
    "patente" => "AA123HB",
    "marca" => "Ford"
);
foreach ($miAuto as $clave => $valor) {
    echo "la $clave es: $valor <br>";
}
?>

<br>

<?php
$aClientes = array(
    array("dni" => "33300012", "nombre" => "Ana Valle"),
    array("dni" => "33300013", "nombre" => "Bernabe")
);
foreach ($aClientes as $pos => $cliente) {
    echo $cliente["dni"];
}
?>
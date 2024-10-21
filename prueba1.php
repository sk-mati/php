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

<br>

<?php
//Definición
function sumar($num1, $num2) {
    $resultado = $num1 + $num2;
    return $resultado;
}
//Uso
echo "La suma es " . sumar(5000, 800);
echo "La suma es " . sumar(100, 20);
?>

<br>

<?php
//Definición
function sumar1($num1, $num2) {
    return $num1 + $num2;
}
//Uso
echo "La suma es " . sumar(5000, 800);
echo "La suma es " . sumar(100, 20);
?>

<br>

<?php
//Definición
function sumar2($num1, $num2) {
    return $num1 + $num2;
}
//Uso
$resultado = sumar2(2, 8);
echo $resultado;
?>

<br>

<?php
//Definición
function sumar3($num1, $num2) {
    return $num1 + $num2;
}
//Uso
echo sumar3(2, 8);
?>

<br>

<?php
//Definición
function sumar4($num1, $num2) {
    return $num1 + $num2;
}
//Uso
echo "La suma es " . sumar4(2, 8);
echo "La suma es " . sumar4(3, 5);
?>

<br>

<?php
//Definición
function concatenar($cadena1, $cadena2) {
    return $cadena1 . "" . $cadena2;
}
//Uso
$resultado = concatenar("El libro ", "de la selva");
echo $resultado;
?>

<?php
//Definición
function sumar5($num1, $num2) {
    return $num1 + $num2;
}
function alcuadrado($num) {
    return $num * $num;
}
//Uso
$resultado = alcuadrado(sumar5(2, 8));
echo $resultado;
?>

<br>

<?php
//Definición
function saludar($nombre, $apellido = "") {
    return "Hola $nombre $apellido";
}
//Uso
$saludo = saludar("Ana", "Pérez");
echo $saludo;
?>

<br>

<?php
//Definición
function saludar1($nombre, $apellido = "") {
    return "Hola $nombre $apellido";
}
//Uso
echo saludar1("Ana", "Pérez");
?>

<?php
function saludar2($nombre, $apellido = "") {
    return "Hola $nombre $apellido";
}
$saludo = saludar2("Ana", "Pérez");
echo $saludo;
echo (saludar2("Ricardo"));
?>

<br>

<?php
function saludar3($nombre, $apellido = "") {
    return "Hola $nombre $apellido";
}
echo saludar3("Juan");
echo saludar3("");
?>

<br>

<?php
function saludar4($nombre = "", $apellido = "") {
    $resultado = "Hola";
    if($nombre != ""){
        $resultado .= " $nombre";
    }
    if($apellido != "") {
        $resultado .= " $apellido";
    }
    return $resultado;
}
echo saludar4("Juan") . "<br>";
echo saludar4("Ana", "Valle") . "<br>";
echo saludar4("");
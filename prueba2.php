<?php
$bruto = 50000; //ámbito global

function calcularNeto() {
    global $bruto; //no es buena práctica de programación
    return $bruto - $bruto*0.17; //ámbito local
}
echo (calcularNeto());
?>

<br>

<?php 
$bruto = 50000;

function calcularNeto1($bruto) {
    return $bruto - $bruto*0.17;
}
echo (calcularNeto1($bruto));

?>

<br>

<?php
//number_format(NUMERO, CANT_DECIMALES, SEPARADOR_DECIMAL, SEPARADOR_MILES);
$importe = 1050.95;
echo "$" . number_format($importe, 2, ",", ".");
?>

<br>

<?php
//formateo de fechas
$strFecha = "2024-10-24";
echo date_format(date_create($strFecha), 'd/m/Y');
?>

<br>

<?php
$fecha = strtotime("2022-12-31");
$mes_proximo = date("Y-m-d", strtotime("+1 month", $fecha));
echo $mes_proximo;
?>

<br>

<?php include_once("clinica.php"); ?>

<?php include_once("hola.php"); ?>

<br>
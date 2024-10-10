<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$stock = 800;

//si stock es mayor que 0, entonces;
if ($stock > 0) {
    //imprime "hay stock"
    echo "Hay stock";
}
//sino
else {
    //imprime "no hay stock"
    echo "No hay stock";
}

?>
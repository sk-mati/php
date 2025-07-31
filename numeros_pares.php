<?php 

ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

for ($i=0; $i <= 100; $i+=1) {
    echo $i . "<br>";
}

for ($i=2; $i <= 100; $i+=2) {
    echo $i . "<br>";
}

for ($i=2; $i <= 100; $i+=2) {
    if ($i == 62) {
        break;
    }
    echo $i . "<br>";
}

?>
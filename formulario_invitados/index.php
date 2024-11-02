<?php

ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//si existe el archivo "invitados.txt", lo abro y cargo en una variable del tipo array los DNI permitidos
if(file_exists("invitados.txt")) {
    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");

//si no, el array queda como un array vacío
} else {
    $aDocumentos = array();
}


if($_POST) {

    if(isset($_POST["btnProcesar"])) {
        $dni = $_REQUEST["txtDni"];
        //si el DNI ingresado se encuentra en la lista se mostrará un mensaje de bienvenida
        if(in_array($dni, $aDocumentos)) {
            echo $mensaje = "¡Bienvenid@!";
        //si no, un mensaje de que no se encuentra en la lista de invitados.    
        } else {
            echo $mensaje = "No se encuentra en la lista de invitados.";
        }
    }

    if(isset($_POST["btnVip"])) {
        $codigo = $_REQUEST["txtCodigo"];
        //si el código es "verde" entonces mostrará "su código de acceso es ...."
        if($codigo == "verde") {
            echo $mensaje = "Su código de acceso es " . rand(1000, 9999);
        //si no, "ud. no tiene pase VIP"
        } else {
            echo $mensaje = "Ud. no tiene pase VIP.";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lista de invitados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Lista de invitados</h1>
                <p>Complete el siguiente formulario:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtDni" class="pb-3">Ingrese el DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                        <button type="submit" name="btnProcesar" class="btn btn-primary">Verificar invitado</button>
                    </div>
                    <div>
                        <label for="txtCodigo" class="pb-3">Ingrese el código secreto para el pase VIP:</label>
                        <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                        <button type="submit" name="btnVip" class="btn btn-primary">Verficar código</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
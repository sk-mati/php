<?php

ini_set('display_errors', 1);
ini_set('display_stratup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoClientes"])) {
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}

if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
    $eliminar = $_POST["btnEliminar"];

$aClientes[] = array( "nombre" => $nombre,
"dni" => $dni,
"telefono" => $telefono,
"edad" => $edad
);

$_SESSION["listadoClientes"] = $aClientes;

session_destroy();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Listado de clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ingrese su nombre y su apellido">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI: </label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Teléfono: </label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad: </label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">Enviar</button>
                            <button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 offset-2">
                <table class="table table-hover border shadow">
                    <thead>
                        <th>Nombre:</th>
                        <th>DNI:</th>
                        <th>Teléfono:</th>
                        <th>Edad:</th>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>
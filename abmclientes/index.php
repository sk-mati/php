<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Pregunto si existe el archivo
if(file_exists("archivo.txt")) {
    //Lo leo y almaceno el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //Convierto jsonClientes en aClientes
    $aClientes = json_decode($jsonClientes, true);

} else {
//Si no existe el archivo
    //Creo un aClientes inicializado como un array vacío
    $aClientes = array();
}

if($_POST) {

    $documento = trim($_POST["txtDocumento"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);

    $aClientes[] = array("documento" => $documento,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $correo);

    //Convierto el array aClientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almaceno el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
}

if(isset($_GET["do"]) && $_GET["do"] == "editar") {
    $pos = isset($_GET["pos"]) && $_GET["pos"] >= 0? $_GET[$pos]:"";

}
if(isset($_GET["do"]) && $_GET["do"] == "eliminar") {

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <title>ABM clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="txtDocumento">Documento: *</label>
                        <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" >
                    </div>
                    <div>
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div>
                        <label for="txtTelefono">Teléfono: *</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div>
                        <label for="txtCorreo">Correo: *</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control">
                    </div>
                    <div>
                        <p>Archivo adjunto <input type="file" name="archivo1" id="archivo1" accept=".jpg, .jpeg, .png"></p>
                        <p>Archivos admitidos: .jpg, .jpeg, .png</p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a href="index.php" class="btn btn-danger">NUEVO</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td></td>
                            <td><?php echo $cliente["documento"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="fa-solid fa-pencil"></i></a>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>
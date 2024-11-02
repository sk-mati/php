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

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if($_POST) {

    $documento = trim($_POST["txtDocumento"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if ($pos >= 0) {

        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }

            //Elimino la imagen anterior
            if ($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/" . $aClientes[$pos]["imagen"])) {
                unlink("imagenes/" . $aClientes[$pos]["imagen"]);
        }
        } else {
            //Mantengo el nombreImagen que tenía anteriormente
            $nombreImagen = $aClientes[$pos]["imagen"];
        }

        //actualizar
        $aClientes[$pos] = array("documento" => $documento,
                                "nombre" => $nombre,
                                "telefono" => $telefono,
                                "correo" => $correo,
                                "imagen" => $nombreImagen);

    } else {

        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";    
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }

        //insertar
        $aClientes[] = array("documento" => $documento,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $nombreImagen);
    }

    //Convierto el array aClientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almaceno el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
}

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    //Elimino del array aClientes la posición a borrar con unset()
    unset($aClientes[$pos]);
    //Convierto el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);
    //Almaceno el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
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
                        <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["documento"]: ""; ?>">
                    </div>
                    <div>
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>
                    <div>
                        <label for="txtTelefono">Teléfono: *</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>
                    <div>
                        <label for="txtCorreo">Correo: *</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]: ""; ?>">
                    </div>
                    <div>
                        <p>Archivo adjunto <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png"></p>
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
                        <?php foreach ($aClientes as $pos => $cliente): ?>
                            <tr>
                                <td>
                                    <?php if ($cliente["imagen"] != ""): ?>
                                        <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail">
                                    <?php endif; ?> 
                                </td>
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
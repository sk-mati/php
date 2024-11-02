<?php

ini_set('dispaly_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


date_default_timezone_set("America/Argentina/Buenos_Aires");

if(file_exists("archivo.txt")) {
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    $aTareas = array();
}

if(isset($_GET["id"]) && $_GET["id"] >= 0) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if($_POST) {
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];

    if($id >= 0) {

    //actualizar
    $aTareas[$id] = array(
                             "fecha" => $aTareas[$id]["fecha"],
                             "titulo" => $titulo,
                             "prioridad" => $prioridad,
                             "usuario" => $usuario,
                             "estado" => $estado,
                             "descripcion" => $descripcion
                             ); 
    
    } else {
    //insertar
    $aTareas[] = array(  
                         "fecha" => date("d/m/Y"),
                         "titulo" => $titulo,
                         "prioridad" => $prioridad,
                         "usuario" => $usuario,
                         "estado" => $estado,
                         "descripcion" => $descripcion
                         ); 
    
    }

    $strJson = json_encode($aTareas);

    file_put_contents("archivo.txt", $strJson);
}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aTareas[$id]);

    $strJson = json_encode($aTareas);

    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Gestor de tareas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-4 pb-2">
                            <label for="lstPrioridad">Prioridad</label>
                                <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                                        <option disabled selected>Seleccionar</option>
                                        <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta"? "selected" : ""; ?> >Alta</option>
                                        <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media"? "selected" : ""; ?> >Media</option>
                                        <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja"? "selected" : ""; ?> >Baja</option>
                                </select>
                        </div>
                        <div class="col-4 pb-2">
                            <label for="lstUsuario">Usuario</label>
                                <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                                    <option disabled selected>Seleccionar</option>
                                    <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana"? "selected" : ""; ?> >Ana</option>
                                    <option value="Bernabé" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabé"? "selected" : ""; ?> >Bernabé</option>
                                    <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela"? "selected" : ""; ?> >Daniela</option>
                                </select>
                        </div>
                        <div class="col-4 pb-2">
                            <label for="lstEstado">Estado</label>
                                <select name="lstEstado" id="lstEstado" class="form-control" required>
                                    <option disabled selected>Seleccionar</option>
                                    <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar"? "selected" : ""; ?> >Sin asignar</option>
                                    <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado"? "selected" : ""; ?> >Asignado</option>
                                    <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso"? "selected" : ""; ?> >En proceso</option>
                                    <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado"? "selected" : ""; ?> >Terminado</option>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="txtTitulo">Título</label>
                            <input type="text" name="txtTitulo" id="txtTitulo" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="txtDescripcion">Descripción</label>
                            <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center pt-2">
                            <button type="submit" class="btn btn-primary">ENVIAR</button>
                            <a href="index.php" class="btn btn-secondary">CANCELAR</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if(count($aTareas)): ?>
        <div class="row">
            <div class="col-12 py-5">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aTareas as $pos => $tarea): ?>
                            <tr>
                                <td><?php echo $pos; ?></td>
                                <td><?php echo $tarea["fecha"]; ?></td>
                                <td><?php echo $tarea["titulo"]; ?></td>
                                <td><?php echo $tarea["prioridad"]; ?></td>
                                <td><?php echo $tarea["usuario"]; ?></td>
                                <td><?php echo $tarea["estado"]; ?></td>
                                <td>
                                    <a href="?id=<?php echo $pos ?>&do=editar" class="btn btn-secondary"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
            <?php else: ?>
            <div class="row">
                <div class="col-12 pt-3">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
            <?php endif; ?>
    </main>
</body>
</html>
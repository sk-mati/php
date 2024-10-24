<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array();

$aEmpleados[] = array(
    "dni" => "33300123",
    "nombre" => "David García",
    "bruto" => calcularNeto(85000.30)
);
$aEmpleados[] = array(
    "dni" => "40874456",
    "nombre" => "Ana Del Valle",
    "bruto" => calcularNeto(90000)
);
$aEmpleados[] = array(
    "dni" => "67567565",
    "nombre" => "Andrés Perez",
    "bruto" => calcularNeto(100000)
);
$aEmpleados[] = array(
    "dni" => "75744545",
    "nombre" => "Victoria Luz",
    "bruto" => calcularNeto(70000) ,
);

function calcularNeto($bruto) {
    $neto = $bruto - ($bruto * 0.17);
    return number_format($neto, 2, ",", ".");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Listado de empleados</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $aEmpleados as $empleado) {
                            echo "<tr>";
                            echo "<td>" . $empleado["dni"] . "</td>";
                            echo "<td>" . mb_strtoupper($empleado["nombre"]) . "</td>";
                            echo "<td>" . "$" . $empleado["bruto"] . "</td>";
                            /*<td>$ <?php echo number_format (calcularNeto($empleado["bruto"], 2, ",", "."); ?> </td>*/ //Otra forma
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Cantidad de empleados en total: <?php echo count($aEmpleados); ?></p>
            </div>
        </div>
    </main>

</body>

</html>
<?php

ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frio/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);
$aProductos[] = array("nombre" => "Impresora HP Láser",
    "marca" => "HP",
    "modelo" => "P1102w",
    "stock" => 30,
    "precio" => 30000,
);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sumar el total</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table border table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        <?php
                            $subtotal = 0;
                            for ($contador = 0; $contador < count($aProductos); $contador++) {
                                $subtotal += $aProductos[$contador]["precio"];
                        ?>
                            <tr>
                                <td><?php echo $aProductos[$contador]["nombre"]; ?></td>
                                <td><?php echo $aProductos[$contador]["marca"]; ?></td>
                                <td><?php echo $aProductos[$contador]["modelo"]; ?></td>
                                <td><?php echo $aProductos[$contador]["stock"] > 10 ? "Hay stock" : ($aProductos[$contador]["stock"] > 0 && $aProductos[$contador]["stock"] <= 10 ? "Hay poco stock" : "No hay stock");  ?></td>
                                <td><?php echo $aProductos[$contador]["precio"]; ?></td>
                                <td><button class="btn btn-primary">Comprar</button></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>El subtotal es: <?php echo $subtotal ?></p>
            </div>
        </div>
    </main>

</body>

</html>
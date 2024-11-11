<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/venta.php";
include_once "entidades/provincia.php";
include_once "entidades/localidad.php";

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

$pg = "Listado de clientes";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $cliente->actualizar();
        } else {
            //Es nuevo
            $cliente->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        //Si existen ventas asociadas al cliente que se intenta eliminar, muestra mensaje de alerta
        $venta = new Venta();
        if ($venta->obtenerVentasPorCliente($cliente->idcliente)) {
            $msg["texto"] = "No se puede eliminar un cliente con ventas asociadas.";
            $msg["codigo"] = "alert-danger";
        } else {
            $cliente->eliminar();
            header("Location: cliente-listado.php");
        }
    }
}

if (isset($_GET["do"]) && $_GET["do"] == "buscarLocalidad" && $_GET["id"] && $_GET["id"] > 0) {
    $idProvincia = $_GET["id"];
    $localidad = new Localidad();
    $aLocalidad = $localidad->obtenerPorProvincia($idProvincia);
    echo json_encode($aLocalidad);
    exit;
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $cliente->obtenerPorId();
}

$provincia = new Provincia();
$aProvincias = $provincia->obtenerTodos();

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Venta</h1>
          <?php if (isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
                <div class="col-12 mb-3">
                    <a href="ventas.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
        </div>
        <div class="row px-3">
                <div class="col-12 form-group">
                    <label for="txtFechaNac" class="d-block">Fecha y hora:</label>
                    <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                        <option selected="" disabled="">DD</option>
                    </select>
                    <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                        <option selected="" disabled="">MM</option>
                    </select>
                    <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                        <option selected="" disabled="">YYYY</option>
                    </select>
                    <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora">
                </div>
                <div class="col-6 form-group">
                    <label for="lstCliente">Cliente:</label>
                    <select required="" class="form-control selectpicker" name="lstCliente" id="lstCliente">
                        <option selected disabled>Seleccionar</option>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="lstProducto">Producto:</label>
                    <select class="form-control selectpicker" name="lstProducto" id="lstProducto">
                        <option selected disabled>Seleccionar</option>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio unitario:</label>
                    <input type="number" class="form-control" name="txtPrecio" id="txtPrecio">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="txtCantidad" id="txtCantidad">
                </div>
                <div class="col-6 form-group">
                    <label for="txtTotal">Total:</label>
                    <input type="number" class="form-control" name="txtTotal" id="txtTotal">
                </div>
        </div>
<script>
</script>
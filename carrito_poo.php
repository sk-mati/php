<?php

ini_set('display errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("America/Argentina/Buenos_Aires");

class Cliente {
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __construct() {
        $this->descuento = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir()
    {
        echo "Documento: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br><br>";
    }
}

class Producto {
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __construct() {
        $this->precio = 0.0;
        $this->iva = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir() 
    {
        echo "Código: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripción: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br><br>";
    }
}

class Carrito {
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;

    public function __construct() {
        $this->aProductos = array();
        $this->subtotal = 0.0;
        $this->total = 0.0;
    }

    public function cargarProducto($producto) {
        $this->aProductos[] = $producto;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimirTicket(){
        echo "<table class='table table-hover border'>";
        echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
                <tr>
                   <th>Fecha</th>
                   <td>" . date("d/m/Y H:i:s") . "</td>
                </tr>
                <tr>
                   <th>DNI</th>
                   <td>" . $this->cliente->dni . "</td>
                </tr>
                <tr>
                   <th>Nombre</th>
                   <td>" . $this->cliente->nombre . "</td>
                </tr>
                <tr>
                   <th colspan='2'>Productos:</th>
                </tr>";
             foreach($this->aProductos as $producto) {
                echo "<tr>
                        <td>" . $producto->nombre . "</td>
                        <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                     </tr>";
                $this->subtotal += $producto->precio;
                $this->total += $producto->precio * (($producto->iva/100)+1);
             }

        echo "<tr>
                <th>Subtotal s/IVA:</th>
                    <td>$ " . number_format($this->subtotal, 2, ",", ".") . "</td>
              </tr>
              <tr>
                <th>TOTAL:</th>
                    <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
              </tr>
        </table>";
    }
}

//Programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.1;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 10.5;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto2->iva = 21;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
//$carrito->imprimirTicket();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Carrito</title>
</head>
<body>
    <main class="container">
        <div class="row pt-3">
            <div class="col-4">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </main>
</body>
</html>
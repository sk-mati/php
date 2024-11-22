
<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$producto = new Producto();

if($_POST){

    if(isset($_POST["btnGuardar"])){
        $producto->cargarFormulario($_REQUEST);

        if(isset($_GET["id"]) && $_GET["id"] > 0){
            $producto->actualizar();
            $msg["texto"] = "Actualizado correctamente";
            $msg["codigo"] = "alert-success";
        } else {
            $producto->insertar();
            $msg["texto"] = "Insertado correctamente";
            $msg["codigo"] = "alert-success";
        }
    } else if(isset($_POST["btnBorrar"])) {
        $producto->cargarFormulario($_REQUEST);
        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0){
    $producto->cargarFormulario($_REQUEST);
    $producto->obtenerPorId();
}

$tipoProducto = new TipoProducto ();
$aTipoProductos = $tipoProducto -> obtenerTodos();

include_once "header.php";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CKEditor 5 - Quick start CDN</title>
		<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
		<style>
			.main-container {
				width: 795px;
				margin-left: auto;
				margin-right: auto;
			}
		</style>
	</head>
	<body>
		<div class="main-container">
			<div id="editor">
				<p></p>
			</div>
		</div>
		<script type="importmap">
			{
				"imports": {
					"ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
					"ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
				}
			}
		</script>
		<script type="module">
			import {
				ClassicEditor,
				Essentials,
				Paragraph,
				Bold,
				Italic,
				Font
			} from 'ckeditor5';
			ClassicEditor
				.create( document.querySelector( '#editor' ), {
					plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
					toolbar: [
						'undo', 'redo', '|', 'bold', 'italic', '|',
						'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
					]
				} )
				.then( editor => {
					window.editor = editor;
				} )
				.catch( error => {
					console.error( error );
				} );
		</script>
		<!-- A friendly reminder to run on a server, remove this during the integration. -->
		<script>
			window.onload = function() {
				if ( window.location.protocol === 'file:' ) {
					alert( 'This sample requires an HTTP server. Please serve this file with a web server.' );
				}
			};
		</script>
	</body>
</html>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Productos</h1>
          <?php if (isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtNombre">Tipo de producto:</label>
                    <select name="lstTipoProducto" id="lstTipoProducto" class="form-control" >
                        <option value="" disabled selected>Seleccionar</option>
                        <?php foreach($aTipoProductos as $tipoProducto): ?>
                            <option value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" required value="<?php echo $producto->cantidad; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio; ?>">
                </div>
                <div class="col-12 form-group">
                    <label for="txtCorreo">Descripción:</label>
                    <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
                </div>
                <div class="col-6 form-group">
                    <label for="fileImagen">Imagen:</label>
                    <input type="file" class="form-control-file" name="imagen" id="imagen">
                    <img src="files/" class="img-thumbnail">
                </div>
            </div>
<script>
    ClassicEditor
        .create( document.querySelector( '#txtDescripcion' ) )
        .catch( error => {
        console.error( error );
        } );
</script>
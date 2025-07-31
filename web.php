<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Escritos</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#nombre">Nombre</a></li>
                <li>Sobre mí</li>
                <li>Contacto</li>
            </ul>
            <ol>
                <li>Sí</li>
                <li>No</li>
            </ol>
        </nav>
    </header>
    <main>
        <fieldset>
            <h4>Song To Sing When I'm Lonely</h4>
            <?php 
            $autor = "Hola";
            echo $autor;
            ?>
            <br>
            <?php 
            $numero = 2;
            echo $numero;
            ?>
        </fieldset>
        <form>
            <label id="nombre">
                Nombre:
                <input type="text" placeholder="<?php echo $autor ?>"></input>
            </label>
            <img src="https://s3-mspro.nyc3.cdn.digitaloceanspaces.com/tenant/5f4534bd9d9a9e5e37ecdd8a/mediaLibrary/photo/8a23ad90-15b5-48de-8ae2-1e8a0e779b53-extra-large-standard-q100.webp" alt="">
        </form>
        <table>
            <div class="row">
                <div class="col-12">
                    <hr>Hola</hr>
                    <div>Chau</div>
                </div>
                <div class="col-12">
                    <hr>Hola</hr>
                </div>
            </div>
        </table>
    </main>
    <footer>
        <div>
            2025 Todos los derechos reservados
        </div>
    </footer>
</body>
</html>
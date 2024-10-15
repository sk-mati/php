<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Contacto</h1>
        <form action="" method="POST">
            <div>
                <label for="txtNombre">Nombre: *</label>
                <input type="text" name="txtNombre" id="txtNombre" required>
            </div>
            <div>
                <label for="txtCorreo">Correo: *</label>
                <input type="email" name="txtCorreo" id="txtCorreo" required>
            </div>
            <div>
                <label for="txtTelefono">Teléfono:</label>
                <input type="tel" name="txtTelefono" id="txtTelefono" placeholder="cod (011) 9999-9999">
            </div>
            <div>
                <label for="txtFechaNac">Fecha de nacimiento:</label>
                <input type="date" name="txtFechaNac" id="txtFechaNac">
            </div>
            <div>
                <label for="lstPais">País de origen:</label>
                <select name="lstPais" id="lstPais">
                    <optgroup label="Sudamérica">
                        <option value="54">Argentina</option>
                        <option value="55">Brasil</option>
                        <option value="57">Colombia</option>
                        <option value="52">México</option>
                        <option value="58">Venezuela</option>
                    </optgroup>
                    <optgroup label="Europa">
                        <option value=""></option>
                    </optgroup>
                </select>
                </label>
            </div>
            <div>
                <label for="lstAsunto">Asunto: *</label>
                <select name="lstAsunto" id="lstAsunto" required>
                    <option disabled selected>Seleccionar</option>
                    <option value="ventas">Ventas</option>
                    <option value="soporte">Soporte</option>
                    <option value="webmaster">Webmaster</option>
                </select>
            </div>
            <div>
                <label for="txtMensaje">Mensaje:</label>
                <textarea name="txtMensaje" id="txtMensaje"></textarea>
            </div>
            <div>
                <input type="checkbox" name="chkNewsletter" id="chkNewsletter" checked>
                <label for="chkNewsletter">Deseo recibir mensajes sobre novedades</label>
            </div>
            <div>
                <input type="checkbox" name="chkCondiciones" id="chkCondiciones">
                <label for="chkCondiciones">Acepto los términos y las condiciones</label>
            </div>
            <div>
                <label>¿Sos mayor de edad?</label>

                <label for="optMayorSi">Sí</label>
                <input type="radio" name="optMayorEdad" id="optMayorSi">

                <label for="optMayorNo">No</label>
                <input type="radio" name="optMayorEdad" id="optMayorNo">
            </div>
            <div>
                <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
            </div>
        </form>
    </main>
    <footer>
        <div>
            <a href="https://web.whatsapp.com" target="_blank" title="Envianos un mensaje por WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
            <a href="https://ar.linkedin.com" target="_blank" title="Seguinos en LinkedIn">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://www.youtube.com" target="_blank" title="Seguinos en YouTube">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </div>
    </footer>
</body>

</html>
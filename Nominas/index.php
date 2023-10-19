<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio de Nómina en Linea | NóminaCloud</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/botones.css">
    <link rel="stylesheet" href="css/estilos2.css">
</head>
<body>
    <header class="cabecera">
        <img src="view/logo2R.png" class="" alt=""/>
        <a href="login.php" class="login-button">Iniciar Sesión</a>
        <a href="atencion.php" class="help-button">Atención al cliente</a>
    </header>
    
    <div class="container">
        <div class="welcome-message">
            Bienvenido a la Plataforma de NóminaCloud 
            <a class="ades" href="#descripcion">Descripción general</a>
            <a class="ades" href="#descripcion2">Contacto</a>
        </div>
        <img src="view/interfaz.png" class="img-responsive" alt=""/>
        <br>
        <br>
    </div>
    <div id="descripcion"></div>
    <br>
    <div class="container">
    <section>
        <br>
    <div>
        <h1 class="titulo1">Diseñado pensando en</h1>
        <h1 class="titulo1">los pequeños negocios.</h1>
        <h2 class="titulo1c">Paga a tu equipo con nuestro software de nómina para pequeños negocios.</h2>
        <div class="ofrece-img-container">
    <img src="view/ofrece1.jpg" class="ofrece-img" alt="Ofrece imagen" />
</div>

        <h2 class="titulo1c">Todos los servicios de nómina que</h2>
        <h2 class="titulo1c">los propietarios de pequeños negocios</h2>
        <h2 class="titulo1c"> necesitan para hacer la nómina.</h2>
    </div>
</section>
    </div>
    <div id="descripcion2"></div>
    <br>
    <div class="container">
    <section>
        <section>
            <div>
                <h1 class="titulo1">Contacto</h1>
                <div class="contacto">
                    <p>Ubicación:</p>
                    <p>J. María Arteaga 72, La Magdalena, 60080 Uruapan, Mich.</p>
                    <p>Correo Electrónico:</p>
                    <p>soporte@nominacloud.com.mx</p>
                    <p>WhatsApp:</p>
                    <p>524521345130</p>
                </div>

                <div class="contacto">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>

                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>

                    <label for="comoConociste">¿Cómo conociste NominaCloud?</label>
                    <select id="comoConociste" name="comoConociste" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="trabajo">Porque es trabajo</option>
                        <option value="redesSociales">Redes Sociales</option>
                    </select>

                    <button type="submit" class="boton-enviar">Enviar</button>
                </div>
            </div>
        </section>
        </div>
    <footer>
        <p>&copy; 2023 - NominaCloud</p>
    </footer>
</body>
</html>

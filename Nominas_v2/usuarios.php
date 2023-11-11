<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/usuarios.css">
</head>
<body>
<header class="cabecera">
        <a href="index.php">
            <img src="view/logo2R.png" class="" alt=""/>
            <a href="login.php" class="login-button">Iniciar Sesión</a>
            <a href="atencion.php" class="help-button">Atención al cliente</a>
        </a>
    </header>
    <div class="container">
        <h2>Datos de Registro</h2>
        <br>
        <form action="procesar_registro.php" method="post" onsubmit="return validarRegistro()">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="confirmarCorreo">Confirmar Correo:</label>
            <input type="email" id="confirmarCorreo" name="confirmarCorreo" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit" class="registro-button">Regístrate</button>
        </form>
    </div>

    <script>
        function validarRegistro() {
            // Aquí puedes agregar lógica de validación si es necesario
            return true;
        }
    </script>
</body>
</html>
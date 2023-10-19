<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/loginestilo.css">
    <link rel="stylesheet" href="css/botones.css">
</head>
<body>
    <header>
        <a href="index.php">
        <img src="view/logo2R.png" class="" alt=""/>
        </a>
    </header>
    <img src="" class="" alt=""/>
    <div class="container">
        <h2>Inicia sesión</h2>
        <form action="inside/inicio.php" method="post" onsubmit="return validarFormulario()">
            <br>
            <label for="username">Correo electrónico:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <br>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
    </div>

    <script>
        function validarFormulario() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username === '' || password === '') {
                alert('Por favor, completa todos los campos.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

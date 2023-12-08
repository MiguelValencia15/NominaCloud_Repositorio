<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="view/logo2R.png" class="" alt=""/>
        </a>
    </header>
    <div class="container">
        <form action="controller/controller.php" method="post" onsubmit="return validarFormulario()">
            <h2>Inicia tu sesión</h2>
            <h2>NóminasCloud aquí</h2>
            <a class="a" href="usuarios.php">Si no estás registrado da click aquí.</a>

            <label for="Username">Correo electrónico:</label>
            <input type="text" id="Username" name="User" required>

            <label for="Password">Contraseña:</label>
            <input type="password" id="Password" name="Password" required>

            <button type="submit" class="login-button" name="btnLogin" value="Ingresar">Iniciar Sesión</button>
        </form>

        <form action="">
            <img src="view/IniciaR.png" class="img-responsive" alt=""/>
        </form>
    </div>

    <script>
        function validarFormulario() {
            var username = document.getElementById("Username").value;
            var password = document.getElementById("Password").value;

            if (username === '' || password === '') {
                alert('Por favor, completa todos los campos.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

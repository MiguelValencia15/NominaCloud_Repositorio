<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - NóminaCloud</title>
    <link rel="stylesheet" href="../css/estilosI.css">
    <link rel="stylesheet" href="../css/botones.css">
</head>
<body>
    <header>
        <div class="dropdown" onclick="toggleDropdown()">
            <img src="../view/logo.jpg" alt="Logo NóminaCloud" class="logo">
            <h1 class="nom">NóminaCloud</h1>
            <div class="dropdown-content" id="dropdownContent">
                <a href="registros.php">Registros</a>
                <a href="empresas.php">Empresas</a>
            </div>
        </div>

        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>

    <div class="container">
        <h2>Registro de Empleado</h2>
        <form action="#" method="post">
            <label for="nombre">Empresa:</label>
            <input type="text" id="empresa" name="empresa" required>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="nombre">Cargo/Puesto:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="rfc">RFC:</label>
            <input type="text" id="rfc" name="rfc" required>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" required>

            <label for="curp">CURP:</label>
            <input type="text" id="curp" name="curp" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" required>

            <label for="horas_semana">Semana:</label>
            <input type="number" id="horas_semana" name="horas_semana" required>

            <label for="horas_semana">Horas laboradas:</label>
            <input type="number" id="horas_semana" name="horas_semana" required>
            <br>
            <button type="submit" class="form button">Generar Nómina</button>
        </form>
        <a href="inicio.php" class="logout-button">Volver</a>
    </div>

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("active");
        }
    </script>
</body>
</html>

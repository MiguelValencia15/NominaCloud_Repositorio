<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - NóminaCloud</title>
    <link rel="stylesheet" href="../css/registros.css">
</head>
<body>
    <header>
            <h1 class="nom">NóminaCloud</h1>
        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>

    <div class="container">
        <h2>Registro de Empleado</h2>
        <form action="#" method="post">
            <label for="nombre">Empresa:</label>
        <select id="selectEmpresa" onchange="mostrarEmpresas)">
            <option value="" disabled selected>Selecciona una empresa</option>
            <option value="JBR">Chicos TEC</option>
        </select>

            <label for="nombre">Nombre:</label>
        <select id="selectEmpresa" onchange="mostrarEmpleado()">
            <option value="" disabled selected>Selecciona una empresa</option>
            <option value="JBR">Jesús Antonio Villanueva León</option>
            <option value="JBR">Michael Edith Rayas Cervantes</option>
            <option value="JBR">Miguel Ángel Valencia López</option>
            <option value="JBR">Juan Pablo Arellano Villa</option>
        </select>

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
            <br>
            <button type="submit" class="form button">Crear Empleado</button>
        </form>
    </div>
    <div class="container">
        <label for="selectEmpresa">Selecciona una empresa:</label>
        <select id="selectEmpresa" onchange="mostrarEmpleado()">
            <option value="" disabled selected>Selecciona una empresa</option>
            <option value="JBR">Chicos TEC</option>
        </select>
        <div id="empleadoAgregado"></div>
    </div>
    <a href="nominas.php" class="logout-button">Volver</a>
    
    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("active");
        }
    </script>
</body>
</html>

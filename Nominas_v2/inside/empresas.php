<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas | Empleados - NóminaCloud</title>
    <link rel="stylesheet" href="../css/empresas.css">
</head>
<body>
    <header>
        <h1 class="nom">NóminaCloud</h1>
        <a href="../index.php" class="logout-button">Recibo electrónico</a>
        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>

    <div class="container">
    <h2>Registro de Empresa</h2>
    <form id="empresaForm">
        <!-- Campos para la empresa -->
        <label for="nombreEmpresa">Nombre de la empresa:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="ejercicioVigente">Ejercicio vigente:</label>
        <input type="text" id="nombreEmpresa" required>
        
        <label for="baseDatos">Base de datos:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="localidadEmpresa">Localidad:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="direccionEmpresa">Dirección:</label>
        <input type="text" id="direccionEmpresa" required>

        <label for="telefonoEmpresa">Teléfono:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="codigoPostal">Código postal:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="apellidoPaterno">Apellido Paterno del representante:</label>
        <input type="text" id="apellidoPaterno" required>

        <label for="apellidoMaterno">Apellido Materno del representante:</label>
        <input type="text" id="apellidoMaterno" required>

        <label for="nombresRepresentante">Nombres del representante:</label>
        <input type="text" id="nombresRepresentante" required>

        <label for="regimenFiscal">Régimen fiscal:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="registroPatronal">Registro patronal del IMMS:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="rfcEmpresa">RFC de la empresa:</label>
        <input type="text" id="rfcEmpresa" required>

        <button type="submit" class="logout-button" onclick="agregarEmpresa(event)">Agregar Empresa</button>
    </form>
</div>
    <a href="inicio.php" class="logout-button">Volver</a>
    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("active");
        }
    </script>
</body>
</html>

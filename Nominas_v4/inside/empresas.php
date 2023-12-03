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
        <!-- <a href="../index.php" class="logout-button">Recibo electrónico</a> -->
        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>

    <div class="container">
    <h2>Registro de Empresa</h2>
    <form id="empresaForm" action="../model/agregar_empresa.php" method="post">
        <!-- Campos para la empresa -->
        <label for="nombreEmpresa">Nombre de la empresa:</label>
        <input type="text" id="Nombre" name="Nombre" required>

        <label for="ejercicioVigente">Ejercicio vigente:</label>
        <input type="text" id="Ejercicio_Vigente" name="Ejercicio_Vigente" required>
        
        <label for="baseDatos">Base de datos:</label>
        <input type="text" id="Base_de_Datos" name="Base_de_Datos" required>

        <label for="localidadEmpresa">Localidad:</label>
        <input type="text" id="Localidad" name="Localidad" required>

        <label for="direccionEmpresa">Dirección:</label>
        <input type="text" id="Direccion" name="Direccion" required>

        <label for="telefonoEmpresa">Teléfono:</label>
        <input type="text" id="Telefono" name="Telefono" required>

        <label for="codigoPostal">Código postal:</label>
        <input type="text" id="Codigo_Postal" name="Codigo_Postal" required>

        <label for="apellidoPaterno">Apellido Paterno del representante:</label>
        <input type="text" id="Apellido_Paterno" name="Apellido_Paterno" required>

        <label for="apellidoMaterno">Apellido Materno del representante:</label>
        <input type="text" id="Apellido_Naterno" name="Apellido_Materno" required>

        <label for="nombresRepresentante">Nombres del representante:</label>
        <input type="text" id="Nombres" name="Nombres" required>

        <label for="regimenFiscal">Régimen fiscal:</label>
        <input type="text" id="Regimen_Fiscal" name="Regimen_Fiscal" required>

        <label for="registroPatronal">Registro patronal del IMMS:</label>
        <input type="text" id="Registro_IMSS" name="Registro_IMSS" required>

        <label for="rfcEmpresa">RFC de la empresa:</label>
        <input type="text" id="RFC" name="RFC" required>

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

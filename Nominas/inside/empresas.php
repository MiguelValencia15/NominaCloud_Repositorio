<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas | Empleados - NóminaCloud</title>
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
    <h2>Registro de Empresa</h2>
    <form id="empresaForm">
        <!-- Campos para la empresa -->
        <label for="nombreEmpresa">Nombre de la empresa:</label>
        <input type="text" id="nombreEmpresa" required>

        <label for="direccionEmpresa">Dirección de la empresa:</label>
        <input type="text" id="direccionEmpresa" required>

        <label for="rfcEmpresa">RFC de la empresa:</label>
        <input type="text" id="rfcEmpresa" required>

        <button type="submit" class="logout-button" onclick="agregarEmpresa(event)">Agregar Empresa</button>
    </form>

    <h2>Registro de Empleado</h2>
    <form id="empleadoForm">
        <!-- Campos para el empleado -->
        <label for="nombre">Empresa:</label>
        <input type="text" id="empresa" name="empresa" required>

        <label for="nombreEmpleado">Nombre del empleado:</label>
        <input type="text" id="nombreEmpleado" required>

        <label for="cargoEmpleado">Cargo/Puesto:</label>
        <input type="text" id="cargoEmpleado" required>

        <label for="rfcEmpleado">RFC del empleado:</label>
        <input type="text" id="rfcEmpleado" required>

        <label for="domicilioEmpleado">Domicilio del empleado:</label>
        <input type="text" id="domicilioEmpleado" required>

        <label for="curpEmpleado">CURP del empleado:</label>
        <input type="text" id="curpEmpleado" required>

        <label for="fechaNacimientoEmpleado">Fecha de Nacimiento del empleado:</label>
        <input type="date" id="fechaNacimientoEmpleado" required>

        <label for="fechaIngresoEmpleado">Fecha de Ingreso del empleado:</label>
        <input type="date" id="fechaIngresoEmpleado" required>

        <button type="submit" class="logout-button" onclick="agregarEmpleado(event)">Agregar Empleado</button>
    </form>
</div>

<div class="container">
        <h2>Empresas - Empleados</h2>
        <label for="selectEmpresa">Selecciona una empresa:</label>
        <select id="selectEmpresa" onchange="mostrarEmpleado()">
            <option value="" disabled selected>Selecciona una empresa</option>
            <option value="JBR">Aguacates Seleccionados JBR</option>
            <!-- Puedes agregar más opciones aquí -->
        </select>
        <div id="empleadoAgregado"></div>
        <a href="inicio.php" class="logout-button">Volver</a>
    </div>

    <script>
        function mostrarEmpleado() {
            var selectEmpresa = document.getElementById("selectEmpresa");
            var empleadoAgregado = document.getElementById("empleadoAgregado");
            var selectedValue = selectEmpresa.value;

            // Limpiar el contenido anterior
            empleadoAgregado.innerHTML = "";

            if (selectedValue === "JBR") {
                var empleado = document.createElement("div");
                empleado.innerHTML = "<strong>Nombre:</strong> Miguel Ángel Valencia López<br>" +
                                     "<strong>Puesto:</strong> Encargado de sistemas UPN<br>" +
                                     "<strong>Cuánto se paga:</strong> $4,500.00<br>" +
                                     "<strong>Días laborales a pagar:</strong> Lunes a Sábado (semanal)";
                empleadoAgregado.appendChild(empleado);
            } else {
                empleadoAgregado.textContent = "Selecciona una empresa válida.";
            }
        }

        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("active");
        }
    </script>
</body>
</html>

<?php
session_start();

// Verifica si se envió el formulario con el ID de la empresa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empresa = $_POST['id_empresa'];

    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'nominascloud';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realiza la consulta para obtener los datos de la empresa
    $sql_empresa = "SELECT * FROM empresas WHERE ID_Empresa = $id_empresa";
    $result_empresa = $conn->query($sql_empresa);

    if ($result_empresa->num_rows > 0) {
        // Almacena los datos de la empresa en la sesión
        $_SESSION['empresa'] = $result_empresa->fetch_assoc();
    } else {
        echo "<p>No se encontró la empresa seleccionada.</p>";
        // Limpia la variable de sesión si no se encuentra la empresa
        unset($_SESSION['empresa']);
    }

    // Realiza la consulta para obtener los empleados de la empresa
    $sql_empleados = "SELECT * FROM empleados WHERE ID_Empresa = $id_empresa";
    $result_empleados = $conn->query($sql_empleados);

    if ($result_empleados->num_rows > 0) {
        // Almacena los datos de los empleados en la sesión
        $_SESSION['empleados'] = $result_empleados->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "<p>No se encontraron empleados para la empresa seleccionada.</p>";
        // Limpia la variable de sesión si no hay empleados
        unset($_SESSION['empleados']);
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timbrar - NóminaCloud</title>
    <link rel="stylesheet" href="../css/registros.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="nom">NóminaCloud</h1>
        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>

    <div class="container">
        <h2>Seleccionar Empresa</h2>
        <form action="" method="post">
            <label for="id_empresa">ID de Empresa:</label>
            <input type="text" id="id_empresa" name="id_empresa" required>
            <button type="submit" class="form button">Consultar Empleados</button>
        </form>
    </div>

    <!-- Muestra los empleados de la empresa actual -->
    <?php
    if (isset($_SESSION['empleados']) && isset($_SESSION['empresa'])) {
        $empleados = $_SESSION['empleados'];
        $empresa = $_SESSION['empresa'];

        // Muestra los datos de la empresa
        echo "<h2>Datos de la Empresa</h2>";
        echo "<p>Nombre de la Empresa: " . $empresa['Nombre'] . "</p>";
        echo "<p>Ejercicio Vigente: " . $empresa['Ejercicio_Vigente'] . "</p>";
        echo "<p>Base de Datos: " . $empresa['Base_de_Datos'] . "</p>";
        echo "<p>Localidad: " . $empresa['Localidad'] . "</p>";
        echo "<p>Dirección: " . $empresa['Direccion'] . "</p>";
        echo "<p>Teléfono: " . $empresa['Telefono'] . "</p>";
        echo "<p>Código Postal: " . $empresa['Codigo_Postal'] . "</p>";
        echo "<p>Apellido Paterno Representante: " . $empresa['Apellido_Paterno_Representante'] . "</p>";
        echo "<p>Apellido Materno Representante: " . $empresa['Apellido_Materno_Representante'] . "</p>";
        echo "<p>Nombres Representante: " . $empresa['Nombres_Representante'] . "</p>";
        echo "<p>Regimen Fiscal: " . $empresa['Regimen_Fiscal'] . "</p>";
        echo "<p>Regimen Patronal IMSS: " . $empresa['Regimen_Patronal_IMSS'] . "</p>";
        echo "<p>RFC Empresa: " . $empresa['RFC_Empresa'] . "</p>";
        echo "<p>ID Usuario: " . $empresa['ID_USUARIO'] . "</p>";

        echo "<h2>Empleados de la Empresa</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Puesto</th><th>RFC</th><th>Domicilio</th><th>CURP</th><th>Salario</th><th>Fecha de Nacimiento</th><th>Fecha de Ingreso</th></tr>";
        foreach ($empleados as $empleado) {
            echo "<tr>";
            echo "<td>" . $empleado["Nombre"] . "</td>";
            echo "<td>" . $empleado["Puesto"] . "</td>";
            echo "<td>" . $empleado["RFC"] . "</td>";
            echo "<td>" . $empleado["Domicilio"] . "</td>";
            echo "<td>" . $empleado["CURP"] . "</td>";
            echo "<td>" . $empleado["Salario"] . "</td>";
            echo "<td>" . $empleado["Fecha_Nacimiento"] . "</td>";
            echo "<td>" . $empleado["Fecha_Ingreso"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    <br>
    <br>
    <a href="../inside/nominas.php" class="logout-button">Volver</a>
    <br>
    <br>
    <br>
    <br>

    <a href="../formulario.php" class="logout-button">formato</a>
</body>

</html>

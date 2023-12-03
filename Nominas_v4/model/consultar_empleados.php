<?php
session_start();

if (isset($_SESSION['empresas_ids']) && isset($_GET['id'])) {
    $empresa_seleccionada_id = $_GET['id'];

    if (in_array($empresa_seleccionada_id, $_SESSION['empresas_ids'])) {
        $_SESSION['ID_Empresa'] = $empresa_seleccionada_id;
    }
}

if (isset($_SESSION['ID_Empresa'])) {
    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'nominascloud';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql_empleados = "SELECT ID_Empleado, Nombre, Salario, 7 AS Dias, Salario * 7 AS Total FROM empleados WHERE ID_Empresa = ?";
    $stmt = $conn->prepare($sql_empleados);
    $stmt->bind_param("i", $_SESSION['ID_Empresa']);
    $stmt->execute();
    $result_empleados = $stmt->get_result();

    if ($result_empleados->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>No. Empleado</th><th>Nombre</th><th>Salario</th><th>Días</th><th>Total</th></tr></thead>";
        echo "<tbody>";

        while ($row = $result_empleados->fetch_assoc()) {
            echo "<tr><td>" . $row["ID_Empleado"] . "</td><td><a href='../model/modificar_empleado.php?id_empleado=" . $row["ID_Empleado"] . "'>" . $row["Nombre"] . "</a></td><td>" . $row["Salario"] . "</td><td>" . $row["Dias"] . "</td><td>" . $row["Total"] . "</td></tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "0 resultados";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de empresa no proporcionado.";
}
?>

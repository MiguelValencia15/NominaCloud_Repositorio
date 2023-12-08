<?php
session_start();

// Verifica si se proporcionó un ID de empleado en la solicitud POST
if (isset($_POST['id_empleado'])) {
    $id_empleado = $_POST['id_empleado'];

    // Conéctate a la base de datos
    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'nominascloud';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Prevenir inyección de SQL utilizando sentencias preparadas
    $sql = "UPDATE empleados SET Estado = 0 WHERE ID_Empleado = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_empleado);
     

    // Ejecutar la sentencia preparada
    if ($stmt->execute()) {
        echo "Empleado eliminado correctamente.";
    } else {
        echo "Error al eliminar el empleado: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "ID de empleado no proporcionado.";
}
?>
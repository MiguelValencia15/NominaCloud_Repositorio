<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si todos los campos del formulario están presentes
    if (isset($_POST['id_empleado'],$_POST['nombre'], $_POST['cargo'], $_POST['rfc'], $_POST['domicilio'], $_POST['curp'], $_POST['salario'], $_POST['fecha_nacimiento'], $_POST['fecha_ingreso'])) {

        $servername = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbname = 'nominascloud';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Escapa las variables para prevenir la inyección de SQL
        $id_empleado = mysqli_real_escape_string($conn, $_POST['id_empleado']);
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
        $rfc = mysqli_real_escape_string($conn, $_POST['rfc']);
        $domicilio = mysqli_real_escape_string($conn, $_POST['domicilio']);
        $curp = mysqli_real_escape_string($conn, $_POST['curp']);
        $salario = mysqli_real_escape_string($conn, $_POST['salario']);
        $fecha_nacimiento = mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']);
        $fecha_ingreso = mysqli_real_escape_string($conn, $_POST['fecha_ingreso']);

        // Realiza la actualización en la base de datos
        $sql_actualizar = "UPDATE empleados SET Nombre='$nombre', Puesto='$cargo', RFC='$rfc', Domicilio='$domicilio', CURP='$curp', Salario='$salario', Fecha_Nacimiento='$fecha_nacimiento', Fecha_Ingreso='$fecha_ingreso' WHERE ID_Empleado=$id_empleado";

        if ($conn->query($sql_actualizar) === TRUE) {
            echo "Empleado modificado con éxito";
        } else {
            echo "Error al modificar el empleado: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Todos los campos del formulario son obligatorios.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
<?php
session_start();

// Verifica si se proporcionó un ID de empleado en la URL
if (isset($_GET['id_empleado'])) {
    $id_empleado = $_GET['id_empleado'];

    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'nominascloud';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realiza la consulta para obtener los datos del empleado
    $sql_empleado = "SELECT * FROM empleados WHERE ID_Empleado = $id_empleado";
    $result_empleado = $conn->query($sql_empleado);

    if ($result_empleado->num_rows > 0) {
        $row = $result_empleado->fetch_assoc();
        // Asigna los valores a las variables para llenar el formulario
        $nombre = $row["Nombre"];
        $cargo = $row["Puesto"];
        $rfc = $row["RFC"];
        $domicilio = $row["Domicilio"];
        $curp = $row["CURP"];
        $salario = $row["Salario"];
        $fecha_nacimiento = $row["Fecha_Nacimiento"];
        $fecha_ingreso = $row["Fecha_Ingreso"];
    } else {
        echo "Empleado no encontrado.";
        exit; // Termina el script si no se encuentra el empleado
    }

    $conn->close();
} else {
    echo "ID de empleado no proporcionado.";
    exit; // Termina el script si no se proporciona el ID del empleado
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Empleado - NóminaCloud</title>
    <link rel="stylesheet" href="../css/registros.css">
</head>

<body>
    <header>
        <h1 class="nom">NóminaCloud</h1>
        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>

    <div class="container">
        <h2>Modificar Empleado</h2>
        <form action="../model/modificar_empleado.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>

            <label for="CARGO">Cargo/Puesto:</label>
            <input type="text" id="CARGO" name="cargo" value="<?php echo $cargo; ?>" required>

            <label for="rfc">RFC:</label>
            <input type="text" id="rfc" name="rfc" value="<?php echo $rfc; ?>" required>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?php echo $domicilio; ?>" required>

            <label for="curp">CURP:</label>
            <input type="text" id="curp" name="curp" value="<?php echo $curp; ?>" required>

            <label for="salario">Salario:</label>
            <input type="text" id="salario" name="salario" value="<?php echo $salario; ?>" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>"
                required>

            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>" required>
            <br>
            <button type="button" class="form button" onclick="modificarEmpleado()">Modificar Empleado</button>
            <br>
            <button type="button" class="form button" onclick="eliminarEmpleado()">Eliminar Empleado</button>
        </form>
    </div>
    <a href="../inside/nominas.php" class="logout-button">Volver</a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> 

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("active");
        }
        function modificarEmpleado() {
            // Obtener el ID del empleado
            var id_empleado = obtenerId();

            // Obtener los valores del formulario
            var nombre = document.getElementById("nombre").value;
            var cargo = document.getElementById("CARGO").value;
            var rfc = document.getElementById("rfc").value;
            var domicilio = document.getElementById("domicilio").value;
            var curp = document.getElementById("curp").value;
            var salario = document.getElementById("salario").value;
            var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
            var fecha_ingreso = document.getElementById("fecha_ingreso").value;

            // Enviar los datos al archivo PHP
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../model/update_empleado.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Mostrar la respuesta del servidor (puedes manejar la respuesta según tus necesidades)
                    console.log(xhr.responseText);
                    window.location.href = "../inside/nominas.php";
                }
            };

            var datos = "id_empleado=" + id_empleado + "&nombre=" + nombre + "&cargo=" + cargo + "&rfc=" + rfc + "&domicilio=" + domicilio + "&curp=" + curp + "&salario=" + salario + "&fecha_nacimiento=" + fecha_nacimiento + "&fecha_ingreso=" + fecha_ingreso;

            xhr.send(datos);
        }

        function eliminarEmpleado() {
            // Obtener el ID del empleado desde la URL
            var id_empleado = obtenerId();

            // Confirmar con el usuario antes de eliminar
            var confirmacion = confirm("¿Estás seguro de que quieres eliminar a este empleado?");
            if (!confirmacion) {
                return; // El usuario canceló la eliminación
            }

            // Enviar la solicitud para eliminar al empleado al archivo PHP
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "eliminar_empleado.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        // Mostrar la respuesta del servidor (puedes manejar la respuesta según tus necesidades)
                        console.log(xhr.responseText);
                        window.location.href = "../inside/nominas.php";
                    } else {
                        // Manejar el error si la solicitud no fue exitosa
                        console.error("Error al intentar eliminar al empleado.");
                    }
                }
            };

            // Enviar el ID del empleado para que el archivo PHP pueda realizar la eliminación
            xhr.send("id_empleado=" + id_empleado);
        }

        function generarPDF() {
            // Obtener los datos del formulario
            var nombre = document.getElementById("nombre").value;
            var cargo = document.getElementById("CARGO").value;
            var rfc = document.getElementById("rfc").value;
            var domicilio = document.getElementById("domicilio").value;
            var curp = document.getElementById("curp").value;
            var salario = document.getElementById("salario").value;
            var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
            var fecha_ingreso = document.getElementById("fecha_ingreso").value;

            // Crear una instancia de jsPDF
            var pdf = new jsPDF();

            // Agregar el contenido al PDF
            pdf.text(10, 10, 'Información del Empleado');
            pdf.text(10, 20, 'Nombre: ' + nombre);
            pdf.text(10, 30, 'Cargo/Puesto: ' + cargo);
            pdf.text(10, 40, 'RFC: ' + rfc);
            pdf.text(10, 50, 'Domicilio: ' + domicilio);
            pdf.text(10, 60, 'CURP: ' + curp);
            pdf.text(10, 70, 'Salario: ' + salario);
            pdf.text(10, 80, 'Fecha de Nacimiento: ' + fecha_nacimiento);
            pdf.text(10, 90, 'Fecha de Ingreso: ' + fecha_ingreso);

            // Guardar el PDF (puedes ajustar la ruta según tus necesidades)
            pdf.save('informacion_empleado.pdf');
        }

        function obtenerId() {
            // Obtener la URL actual
            var url = window.location.href;

            // Buscar el parámetro "id_empleado" en la URL
            var match = url.match(/[?&]id_empleado=([^&]*)/);

            // Si se encuentra el parámetro, devolver su valor; de lo contrario, devolver null
            return match ? match[1] : null;
        }

    </script>
</body>

</html> 
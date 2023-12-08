<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $contrasena = $_POST["contrasena"];

    // Cifrar la contraseña
    $contrasenaCifrada = password_hash($contrasena, PASSWORD_DEFAULT);

   $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'nominascloud';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (Nombres, Apellidos, CorreoElectronico, Telefono, Contrasena) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellidos, $correo, $telefono, $contrasenaCifrada);

    if ($stmt->execute()) {
    echo "Registro exitoso. Los datos se han guardado en la base de datos.";

    // Redirigir a login.php después del registro exitoso
    header("Location: login.php");
    exit();
} else {
    echo "Error al registrar: " . $stmt->error;
}

    $stmt->close();
    $conn->close();
}
?>

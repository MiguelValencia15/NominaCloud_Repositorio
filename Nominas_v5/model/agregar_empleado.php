<?php
session_start();

if (isset($_SESSION['ID_Empresa'])) {
    $id_empresa = $_SESSION['ID_Empresa'];

        $servername = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbname = 'nominascloud';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $nombre = $_POST["nombre"];
        $cargo = $_POST["cargo"];
        $rfc = $_POST["rfc"];
        $domicilio = $_POST["domicilio"];
        $curp = $_POST["curp"];
        $salario = $_POST["salario"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $fecha_ingreso = $_POST["fecha_ingreso"];

        $sql_insert = "INSERT INTO empleados (ID_Empresa, Nombre, Puesto, RFC, Domicilio, CURP, Salario, Fecha_Nacimiento, Fecha_Ingreso, Estado) VALUES ('$id_empresa', '$nombre', '$cargo', '$rfc', '$domicilio', '$curp', '$salario', '$fecha_nacimiento', '$fecha_ingreso',1)";

        if ($conn->query($sql_insert) === TRUE) {
            header("Location: ../inside/nominas.php");  
          } else {
            echo "Error al insertar registro: " . $conn->error;
          }

        $conn->close();
    
} else {
    echo "ID de empresa no proporcionado.";
}
?>
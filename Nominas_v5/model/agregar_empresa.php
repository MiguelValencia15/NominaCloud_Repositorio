<?php
session_start();

    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'nominascloud';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre_empresa = $_POST["Nombre"];
    $ejercicio_vigente = $_POST["Ejercicio_Vigente"];
    $base_de_datos = $_POST["Base_de_Datos"];
    $localidad = $_POST["Localidad"];
    $direccion = $_POST["Direccion"];
    $telefono = $_POST["Telefono"];
    $codigo_postal = $_POST["Codigo_Postal"];
    $apellido_paterno = $_POST["Apellido_Paterno"];
    $apellido_materno = $_POST["Apellido_Materno"];
    $nombres = $_POST["Nombres"];
    $regimen_fiscal = $_POST["Regimen_Fiscal"];
    $registro_imss = $_POST["Registro_IMSS"];
    $rfc_empresa = $_POST["RFC"];
    $id_usuario = $_SESSION["Username"];

    $sql_usuario = "SELECT ID_Usuario FROM usuarios WHERE CorreoElectronico = '$id_usuario'";
    $result_usuario = $conn->query($sql_usuario);

    $row_usuario = $result_usuario->fetch_assoc();

    $id_usuario = $row_usuario["ID_Usuario"];

    $sql_insert = "INSERT INTO empresas (Nombre, Ejercicio_Vigente, Base_de_Datos, Localidad, Direccion, Telefono, Codigo_Postal, Apellido_Paterno_Representante, Apellido_Materno_Representante , Nombres_Representante, Regimen_Fiscal, Registro_Patronal_IMSS, RFC_Empresa, ID_Usuario, Estado) VALUES ('$nombre_empresa', '$ejercicio_vigente', '$base_de_datos', '$localidad', '$direccion', '$telefono', '$codigo_postal', '$apellido_paterno', '$apellido_materno', '$nombres', '$regimen_fiscal', '$registro_imss', '$rfc_empresa', '$id_usuario',1)";

    if ($conn->query($sql_insert) === TRUE) {
        header("Location: ../inside/inicio.php");
    } else {
        echo "Error al insertar registro: " . $conn->error;
    }

    $conn->close();

?>
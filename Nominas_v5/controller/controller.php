<?php

session_start();

include_once("../model/bd.php");

switch ($_REQUEST['btnLogin']) {
    case "Ingresar":
        $username = $_REQUEST['User'];
        $modelValidate = new ModelDB();

        // Supongo que getValidate devuelve el nombre en caso de éxito
        if ($name = $modelValidate->getValidate($_REQUEST)) {
            $_SESSION['Username'] = $username;
            $_SESSION['Name'] = $name;
            header("Location: ../inside/inicio.php");
            exit();  // Asegúrate de salir después de redirigir
        } else {
            header("Location: ../login.php");
            exit();  // Asegúrate de salir después de redirigir
        }
        break;

    case "Cerrar Sesion":
        session_destroy();
        header("Location: ../login.php");
        exit();  // Asegúrate de salir después de redirigir
        break;
}
?>

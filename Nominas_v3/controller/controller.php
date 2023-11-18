<?php

session_start();

include_once("../model/bd.php");

switch ($_REQUEST['btnLogin']) {
    case "Ingresar":
        $username = $_REQUEST['User'];
        $modelValidate = new ModelDB();
        $modelValidate->getValidate($_REQUEST);
     if(!$name=$modelValidate->getValidate($_REQUEST)){
         header("location: ../login.php");

     } else {
        $_SESSION['Username'] = $username;
         header("location: ../inside/inicio.php?vname=$name");
     }
    break;

    case "Cerrar Sesion":
        session_destroy();
        header("location:../login.php");
        break; 
            
}
?>
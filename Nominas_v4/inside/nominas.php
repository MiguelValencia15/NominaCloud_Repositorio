<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elaborar Nómina - NóminaCloud</title>
    <link rel="stylesheet" href="../css/nominas.css">
</head>
<body>
    <header>
        <div class="">
            <h1 class="nom">NóminaCloud</h1>
        </div>

        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>
    <div class="container">
    <table>
            <thead>
                <tr>
                    <th class="tht" colspan="5">Nombre de la Empresa</th>
                </tr>
                <tr>
                <th class="th1" colspan="5">
                <!-- SEMANAL -->
                <a href="" class="boton">
                    <img src="../view/semanal2.jpg" alt="Ayuda">
                </a>
                <!-- EMPLEADOS -->
                <a href="registros.php" class="boton">
                    <img src="../view/empleados.jpg" alt="Ayuda">
                </a>
                <!-- TIMBRAR -->
                <a href="" class="boton">
                    <img src="../view/timbrar.jpg" alt="Ayuda">
                </a>
                <!-- IMPRIMIR -->
                <a href="" class="boton1">
                    <img src="../view/imprimir.jpg" alt="Ayuda">
                </a>
                <!-- SOPORTE -->
                <a href="" class="boton">
                    <img src="../view/soporte.jpg" alt="Ayuda">
                </a>
                <!-- AYUDA -->
                <a href="" class="boton">
                    <img src="../view/ayuda.jpg" alt="Ayuda">
                </a>
                </th>
                </tr>
                <?php
        // Incluir el archivo PHP con la lógica de consulta
        include("../model/consultar_empleados.php");
        ?>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="inicio.php" class="logout-button">Volver</a>
</body>
</html>

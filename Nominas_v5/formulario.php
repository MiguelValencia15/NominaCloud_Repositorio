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
    $sql_empleado = "SELECT Nombre, CURP, Salario, ID_Empresa FROM empleados WHERE ID_Empleado = $id_empleado";
    $result_empleado = $conn->query($sql_empleado);

    if ($result_empleado->num_rows > 0) {
        $row = $result_empleado->fetch_assoc();
        // Asigna los valores a las variables para llenar el formulario
        $nombre = $row["Nombre"];
        $curp = $row["CURP"];
        $salario = $row["Salario"];
        $id_empresa = $row["ID_Empresa"];
    } else {
        echo "Empleado no encontrado.";
        exit; // Termina el script si no se encuentra el empleado
    }

    // Realiza la consulta para obtener los datos de la empresa
    $sql_empresa = "SELECT Nombre, Direccion, RFC_Empresa FROM empresas WHERE ID_Empresa = $id_empresa";
    $result_empresa = $conn->query($sql_empresa);

    if ($result_empresa->num_rows > 0) {
        $row2 = $result_empresa->fetch_assoc();
        // Asigna los valores a las variables para llenar el formulario
        $nombreE = $row2["Nombre"];
        $direccionE = $row2["Direccion"];
        $rfc_empresa = $row2["RFC_Empresa"];
    } else {
        echo "Empresa no encontrada.";
        exit; // Termina el script si no se encuentra la empresa
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Nómina</title>
    <link rel="stylesheet" href="css/formato.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <form action="" method="post">
    <table>
            <thead>
                <tr>
                    <th class="tht" colspan="2">Nombre de la Empresa</th>
                    <th class="tht" colspan="3">Trabajador</th>
                </tr>
                </tr>
                <?php
                ?>
            </thead>
            <tbody>
            <tr>
                    <td colspan="2">Nombre: <label id="nombreE" name="nombreE" ><?php echo $nombreE; ?></label></td>
                    <td colspan="3">Nombre: <label id="nombre" name="nombre" ><?php echo $nombre; ?></label></td>
                </tr>
                <tr>
                    <td colspan="2">Domicilio: <label id="domicilio" name="domicilio" ><?php echo $direccionE; ?></label></td>
                    <td colspan="3">CURP: <label id="CURP" name="CURP" ><?php echo $curp; ?></label></td>
                </tr>
                <tr>
                    <td colspan="2">RFC: <label id="RFC" name="RFC" ><?php echo $rfc_empresa; ?></label></td>
                    <td colspan="3">Número afiliación al S.S:</td>
                </tr>
                <tr>
                    <td colspan="2">Código Cuenta cotización S.S:</td>
                    <td colspan="3">Categoría o grupo profesional:</td>
                <tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3">Fecha de antigüedad:</td>
                <tr>
                    <td class="th1">Periodo de liquidación:</td>
                    <td class="th1">Fecha inicial:</td>
                    <td class="th1">Fecha final:</td>
                    <td class="th1" colspan="2">Total días:</td>
                </tr>
                <tr>
                    <td class="th1" colspan="2">Percepciones</td>
                    <td class="th1" >Cantidad</td>
                    <td class="th1" >Precio</td>
                    <td class="th1" >Totales</td>
                </tr>
                <tr>
                    <td colspan="5">Percepciones salariales:</td>
                </tr>
                <tr>
                    <td colspan="2">Salario base</td>
                    <td><?php echo $hrs=30; ?></td>
                    <td><?php echo '$'.$salario; ?></td>
                    <td><?php echo '$'.$tsb=$hrs*$salario; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Horas extras</td>
                    <td><?php echo $hrsext=5; ?></td>
                    <td><?php echo '$'.$salarioext=50; ?></td>
                    <td><?php echo '$'.$the=$hrsext*$salarioext; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Comisiones</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Aguinaldo</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Prima vacacional</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Reparto de utilidades</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <td colspan="5">Otros:</td>
                <tr>
                    <td colspan="2">Bono de productividad</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Bono de puntualidad</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <th class="th1" colspan="5">Total devengado: <?php echo '$'.$td=$tsb+$the; ?></th>
                <tr>
                    <td class="th1" colspan="4">Deducciones</td>
                    <td class="th1" >Totales</td>
                </tr>
                <td colspan="5">Retención a cuenta de impuestos:</td>
                <tr>
                    <td colspan="3">Retención del seguro social</td>
                    <td>6.2%</td>
                    <td><?php echo '$'.$rss=$td*0.062; ?></td>
                </tr>
                <tr>
                    <td colspan="3">Fondo de ahorro a vivienda</td>
                    <td>7.0%</td>
                    <td><?php echo '$'.$fav=$td*0.07; ?></td>
                </tr>
                <tr>
                    <td colspan="3">Caja de ahorro</td>
                    <td>7.0%</td>
                    <td><?php echo '$'.$ca=$td*0.07; ?></td>
                </tr>
                <tr>
                    <td colspan="3">Retención por ISR</td>
                    <td>1.9%</td>
                    <td><?php echo '$'.$rISR=$td*0.019; ?></td>
                </tr>
                <th class="th1" colspan="5">Total a deducir: <?php echo '$'.$tad=$rss+$fav+$ca+$rISR; ?></th>
                <tr>
                    <td class="th1" colspan="4">Sueldo bruto</td>
                    <td class="th1" ><?php echo '$'.$sb=$td-$tad; ?></td>
                </tr>
                <tr>
                    <td colspan="3">Fecha de ingreso de la nómina:</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3">Entidad financiera (banco):</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3">Número de cuenta:</td>
                    <td colspan="2">Firma del trabajador</td>
                </tr>
            </tbody>            
        </table>
        <br>       
    </form>
    </div>
    <button type="button" onclick="generarPDF()" class="logout-button">Generar PDF</button>
        <a href="inside/nominas.php" class="logout-button">Volver</a>
</body>
<script>
function generarPDF() {
  // Obtener el contenido HTML de la tabla
  var tableContent = document.querySelector('table');

  html2pdf(tableContent);
}
</script>

</html>
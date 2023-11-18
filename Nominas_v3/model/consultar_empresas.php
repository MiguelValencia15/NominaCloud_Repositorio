<?php

session_start();

if (isset($_SESSION['ID_Empresa'])) {
    unset($_SESSION['ID_Empresa']);
}

if (isset($_SESSION['empresas_ids']) && isset($_GET['id'])) {
    $empresa_seleccionada_id = $_GET['id'];

    if (in_array($empresa_seleccionada_id, $_SESSION['empresas_ids'])) {
        $_SESSION['ID_Empresa'] = $empresa_seleccionada_id;

    }}

$servername = '127.0.0.1';
$username = 'root';
$password = "";
$dbname = "nominascloud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT ID_Empresa, nombre, RFC_Empresa FROM empresas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead><tr><th>Nombre de la empresa</th><th>RFC de la empresa</th></tr></thead>";
    echo "<tbody>";

    // Inicia un array para almacenar los IDs de las empresas
    $empresas_ids = array();

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='nominas.php?id=" . $row["ID_Empresa"] . "'>" . $row["nombre"] . "</a></td>";
        echo "<td>" . $row["RFC_Empresa"] . "</td>";

        // Almacena el ID de la empresa en el array
        $empresas_ids[] = $row['ID_Empresa'];

        echo "</tr>";
    }

    // Almacena el array de IDs de empresas en la sesión
    $_SESSION['empresas_ids'] = $empresas_ids;

    echo "</tbody></table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
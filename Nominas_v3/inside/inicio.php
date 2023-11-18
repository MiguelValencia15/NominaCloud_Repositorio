<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NóminasCloud - Menu</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
    <header>
        <div class="dropdown">
            <h1 class="nom">NóminasCloud</h1>
        </div>
        <a href="../index.php" class="logout-button">Cerrar sesión</a>
    </header>
    
    <div class="container">
        <div class="header-content">
            <h2>Empresas</h2>
            <a href="empresas.php" class="boton">
                <img src="../view/add.jpg" alt="Agregar">
            </a>
            <a href="" class="boton1">
                <img src="../view/ayu.jpg" alt="Ayuda">
            </a>
            <a href="nominas.php" class="boton2">
                <img src="../view/logo2R.png" alt="Nómina">
            </a>
        </div>

        <?php
        // Incluir el archivo PHP con la lógica de consulta
        include("../model/consultar_empresas.php");
        ?>

    </div>
</body>
</html>

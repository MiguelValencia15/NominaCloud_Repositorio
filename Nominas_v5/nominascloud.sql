-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 11:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nominascloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `deducciones`
--

CREATE TABLE `deducciones` (
  `ID_Deduccion` int(11) NOT NULL,
  `Tipo_Deduccion` varchar(50) NOT NULL,
  `Monto_Deduccion` decimal(10,2) NOT NULL,
  `Descripción_Deduccion` text DEFAULT NULL,
  `Fecha_Inicio_Deduccion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `ID_Empleado` int(11) NOT NULL,
  `ID_Empresa` int(11) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Puesto` varchar(50) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Domicilio` varchar(255) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `Salario` double DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Fecha_Ingreso` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`ID_Empleado`, `ID_Empresa`, `Nombre`, `Puesto`, `RFC`, `Domicilio`, `CURP`, `Salario`, `Fecha_Nacimiento`, `Fecha_Ingreso`, `Estado`) VALUES
(1, 1, 'Miguel', 'Director', '4524545', 'Quiri', '454545', 1, '2001-12-11', '2023-09-07', 1),
(4, 3, 'Miguel', 'Contador', '4545654', 'Quiri', '545455', 0.025, '2001-11-11', '2023-11-11', 1),
(5, 3, 'Miguel3', 'Fenix', '4545', '45454', '45545', 0.57, '2001-11-11', '2023-11-11', 0),
(6, 3, 'Miguel4', '454', '5454', '545', '45', 454, '1111-11-11', '1111-11-11', 1),
(7, 3, 'Hola', '123', '123', 'llol', 'lasla', 123, '1111-11-11', '1111-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `ID_Empresa` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Ejercicio_Vigente` int(11) DEFAULT NULL,
  `Base_de_Datos` varchar(255) DEFAULT NULL,
  `Localidad` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Codigo_Postal` varchar(10) DEFAULT NULL,
  `Apellido_Paterno_Representante` varchar(50) DEFAULT NULL,
  `Apellido_Materno_Representante` varchar(50) DEFAULT NULL,
  `Nombres_Representante` varchar(100) DEFAULT NULL,
  `Regimen_Fiscal` varchar(50) DEFAULT NULL,
  `Registro_Patronal_IMSS` varchar(20) DEFAULT NULL,
  `RFC_Empresa` varchar(13) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`ID_Empresa`, `Nombre`, `Ejercicio_Vigente`, `Base_de_Datos`, `Localidad`, `Direccion`, `Telefono`, `Codigo_Postal`, `Apellido_Paterno_Representante`, `Apellido_Materno_Representante`, `Nombres_Representante`, `Regimen_Fiscal`, `Registro_Patronal_IMSS`, `RFC_Empresa`, `Estado`, `ID_USUARIO`) VALUES
(1, 'Sony', 1212, 'asdada', 'Uruapan', 'UPN 27', '4545454545', '60030', 'Valencia', 'Lopez', 'Miguel Angel', 'Idk', '12345', '45456456', 1, 1),
(2, 'Hola', 1212, '1212', 'Uruapan', 'Quiri', '4545', '45454', 'Valencia', 'Lopez', 'Miguel Angel', '545', '454545', '4545', 1, 1),
(3, 'Valencia', 0, 'Valencia', 'Valencia', 'Valencia', '4524545', '454545', 'Valencia', 'Valencia', 'Valencia', 'Valencia', 'Valencia', '45465', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `impuestos`
--

CREATE TABLE `impuestos` (
  `ID_Impuesto` int(11) NOT NULL,
  `Tipo_Impuesto` varchar(50) NOT NULL,
  `Tasa_Impuesto` decimal(5,2) NOT NULL,
  `Descripción_Impuesto` text DEFAULT NULL,
  `Fecha_Vigencia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nominas`
--

CREATE TABLE `nominas` (
  `ID_Nomina` int(11) NOT NULL,
  `ID_Empleado` int(11) DEFAULT NULL,
  `Fecha_Nomina` date DEFAULT NULL,
  `Salario_Neto` decimal(10,2) DEFAULT NULL,
  `Deducciones` decimal(10,2) DEFAULT NULL,
  `Salario_Bruto` decimal(10,2) DEFAULT NULL,
  `Método_Pago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilegios`
--

CREATE TABLE `privilegios` (
  `ID_Privilegio` int(11) NOT NULL,
  `Rol` enum('Admin','Empleado') NOT NULL,
  `Accion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(255) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombres`, `Apellidos`, `CorreoElectronico`, `Telefono`, `Contrasena`) VALUES
(1, 'Miguel Angel', 'Valencia Lopez', 'miguelangelvalencia615@gmail.com', '4521345130', 'ArribaChecoPerez'),
(5, 'Antonio', 'Villanueva', 'antonio50901@gmail.com', '4522260070', '$2y$10$qshiTuBeEBAMn9zOCSlNJ.s2YXA7MxsaBb.WANL9/SnHSazHdwgzW'),
(6, 'Michelle ', 'Rayas', 'mclovineslaonda@gmail.com', '4525185209', '$2y$10$.lc78odrR9MHa6sgJS7PaOP2FxCzuANV8NVKL4lsEiwBGfhN9WcJa');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_privilegios`
--

CREATE TABLE `usuarios_privilegios` (
  `ID_Usuario_Privilegio` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `ID_Privilegio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`ID_Deduccion`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_Empleado`),
  ADD KEY `ID_Empresa` (`ID_Empresa`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`ID_Empresa`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indexes for table `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`ID_Impuesto`);

--
-- Indexes for table `nominas`
--
ALTER TABLE `nominas`
  ADD PRIMARY KEY (`ID_Nomina`),
  ADD KEY `ID_Empleado` (`ID_Empleado`);

--
-- Indexes for table `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`ID_Privilegio`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indexes for table `usuarios_privilegios`
--
ALTER TABLE `usuarios_privilegios`
  ADD PRIMARY KEY (`ID_Usuario_Privilegio`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Privilegio` (`ID_Privilegio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `ID_Deduccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `ID_Empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `ID_Impuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominas`
--
ALTER TABLE `nominas`
  MODIFY `ID_Nomina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `ID_Privilegio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios_privilegios`
--
ALTER TABLE `usuarios_privilegios`
  MODIFY `ID_Usuario_Privilegio` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresas` (`ID_Empresa`);

--
-- Constraints for table `nominas`
--
ALTER TABLE `nominas`
  ADD CONSTRAINT `nominas_ibfk_1` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleados` (`ID_Empleado`);

--
-- Constraints for table `usuarios_privilegios`
--
ALTER TABLE `usuarios_privilegios`
  ADD CONSTRAINT `usuarios_privilegios_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`),
  ADD CONSTRAINT `usuarios_privilegios_ibfk_2` FOREIGN KEY (`ID_Privilegio`) REFERENCES `privilegios` (`ID_Privilegio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

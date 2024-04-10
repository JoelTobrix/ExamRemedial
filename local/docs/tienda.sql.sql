-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 06:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_Pedido` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(100) NOT NULL,
  `Precio` double NOT NULL,
  `ID_Proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`ID_Producto`, `Nombre_Producto`, `Precio`, `ID_Proveedor`) VALUES
(37, 'Doritos', 1, 5),
(38, 'Barrillete', 1, 6),
(39, 'Fideos oriental', 3.25, 6),
(40, 'caramelos', 1, 6),
(41, 'Atun Real', 4.5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`ID_Producto`, `Nombre_Producto`, `Precio`) VALUES
(37, 'Doritos', 1.00),
(39, 'Fideos oriental', 3.25),
(41, 'Atun Real', 4.50);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `ID_Proveedor` int(11) NOT NULL,
  `Nombre_Proveedor` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`ID_Proveedor`, `Nombre_Proveedor`, `Direccion`, `Telefono`, `Email`) VALUES
(5, 'Alberto', 'Quito', 987654345, 'Franchesco123@gmail.com'),
(6, 'Fabian', 'Ambato', 987654345, ''),
(7, 'Maria', 'Ambato', 987653, 'AdrianaRacher@gmail.com'),
(8, 'Maria', 'Ambato', 987653, 'AdrianaRacher@gmail.com'),
(9, 'Camila', 'Latacunga', 987654, 'Brigitte123@gmail.com'),
(10, 'Fabian', 'Guayaquil', 12234324, 'elbabo@gmail.com'),
(11, 'Maria', 'Latacunga', 9876665, 'Franchesco123@gmail.com'),
(12, 'Mariana', 'Tulcan', 987635421, 'Mariachunchun@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedido`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indexes for table `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID_Proveedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2025 a las 15:20:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `informe_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`) VALUES
(1, 'Laworatory');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `numero_factura` varchar(50) NOT NULL,
  `fecha_venta` date NOT NULL,
  `comprador` varchar(255) NOT NULL,
  `articulos_vendidos` text NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `empresa_id`, `numero_factura`, `fecha_venta`, `comprador`, `articulos_vendidos`, `valor_total`) VALUES
(1, 1, 'F2024-001', '2024-10-01', 'Juan Pérez', 'Laptop, Mouse', 1250.50),
(39, 1, 'F2024-021', '2024-10-03', 'Carlos Ramírez', 'Monitor, Teclado', 650.00),
(40, 1, 'F2024-022', '2024-10-07', 'Ana Pérez', 'Laptop, Ratón', 1200.00),
(41, 1, 'F2024-023', '2024-10-11', 'Luis Gómez', 'Celular, Funda', 850.50),
(42, 1, 'F2024-024', '2024-10-14', 'Marta Sánchez', 'Silla Gamer', 320.00),
(43, 1, 'F2024-025', '2024-10-18', 'Juan López', 'Impresora, Cartuchos', 400.75),
(44, 1, 'F2024-026', '2024-10-22', 'Clara Fernández', 'Smart TV 50 pulgadas', 900.00),
(45, 1, 'F2024-027', '2024-10-25', 'David Herrera', 'Auriculares Bluetooth', 120.00),
(46, 1, 'F2024-028', '2024-10-29', 'Paula Medina', 'Cámara digital', 750.30),
(47, 1, 'F2024-029', '2024-11-02', 'Fernando Díaz', 'Refrigerador', 1200.99),
(48, 1, 'F2024-030', '2024-11-05', 'Lucía Ríos', 'Cafetera eléctrica', 200.50),
(49, 1, 'F2024-031', '2024-11-10', 'Pedro Castro', 'Escritorio de oficina', 350.00),
(50, 1, 'F2024-032', '2024-11-15', 'Raquel Vargas', 'Bicicleta de montaña', 550.00),
(51, 1, 'F2024-033', '2024-11-20', 'Esteban Roldán', 'Robot aspirador', 250.75),
(52, 1, 'F2024-034', '2024-11-24', 'Verónica Cruz', 'Consola de videojuegos', 499.99),
(53, 1, 'F2024-035', '2024-11-28', 'Hugo Ortega', 'Juego de maletas', 320.00),
(54, 1, 'F2024-036', '2024-12-02', 'Natalia Fuentes', 'Reloj inteligente', 180.00),
(55, 1, 'F2024-037', '2024-12-06', 'Sergio Jiménez', 'Cinta de correr', 750.00),
(56, 1, 'F2024-038', '2024-12-10', 'Andrea Márquez', 'Telescopio', 599.99),
(57, 1, 'F2024-039', '2024-12-14', 'Diego Molina', 'Aire acondicionado portátil', 1100.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

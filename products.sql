-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2023 a las 01:28:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_sneakers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `descripcion`, `precio`, `id_categoria`, `activo`) VALUES
(2, 'Jordan 1 Retro High Silver Toe (W)', 'Jordan 1 Retro High Silver Toe (W)', 385, 1, 1),
(3, 'Jordan 3 Retro White Cement Reimagined', 'Jordan 3 Retro White Cement Reimagined', 350, 1, 1),
(4, 'Jordan 4 Retro Seafoam (Women\'s)', 'Jordan 4 Retro Seafoam (Women\'s)', 385, 1, 1),
(5, 'Nike Dunk LowActive Fuchsia', 'Nike Dunk LowActive Fuchsia', 127, 1, 1),
(6, 'Jordan 81 Short Blue', 'Jordan 81 Short Blue', 120, 1, 1),
(7, 'Nike Dunk Low Citron Pulse', 'Nike Dunk Low Citron Pulse', 128, 1, 1),
(8, 'Jordan Dri-FIT Air Fleece Pullover Hoodie', 'Jordan Dri-FIT Air Fleece Pullover Hoodie', 152, 1, 1),
(9, 'Adidas Yeezy Boost 350 V2 Beluga Reflective', 'Adidas Yeezy Boost 350 V2 Beluga Reflective', 300, 1, 1),
(10, ' Jordan 1 Low SE Concord (GS)', ' Jordan 1 Low SE Concord (GS)', 250, 1, 1),
(11, 'Adidas Yeezy Boost 700 Wave Runner', 'Adidas Yeezy Boost 700 Wave Runner', 600, 1, 1),
(12, 'Jordan 1 Retro High OG Lucky Green', 'Jordan 1 Retro High OG Lucky Green', 450, 1, 1),
(13, 'Air Jordan 4 SB', 'The Air Jordan 4 SB “Pine Green” is an alternate version of the retro basketball shoe that’s updated with a performance skateboarding focus. A collaboration between Nike SB and Jordan Brand on Michael Jordan’s fourth signature shoe, the Jordan 4 SB is designed in a smooth white leather upper with a light grey suede overlay on the toe and forefoot. Contrasting Pine Green detailing appears on the heel counter with “Nike SB” branding and on the plastic eyelets. Tonal mesh is found on the mid-panel and tongue', 680, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

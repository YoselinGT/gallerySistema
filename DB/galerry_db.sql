-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2020 a las 05:54:14
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `galerry_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(5, 7, 'Yoselin', 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `alternate_text` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`) VALUES
(9, 'Prueba 2', '', '', 'cORBIN JAMES.png', '', 'image/png', 582647),
(11, 'Prueba 3', '', '', 'flores-de-bach-e1433872683188-640x480.jpg', '', 'image/jpeg', 38730),
(13, 'weq', '', '', 'WhatsApp Image 2020-01-20 at 9.37.03 PM.jpeg', '', 'image/jpeg', 28059),
(14, '', '', '', 'igor5-16071715152915_12.jpg', '', 'image/jpeg', 53821),
(15, '', '', '', 'Willow-Acupuncture-New-York-24.jpg', '', 'image/jpeg', 302598);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `firs_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firs_name`, `last_name`, `user_image`) VALUES
(1, 'Yoselin', 'qwerty', 'Yoselin', 'Galvan', 'WhatsApp%20Image%202020-01-20%20at%209.35.34%20PM.jpeg'),
(2, 'update2', '123456', 'Luis', 'Vazquez', ''),
(3, 'Alejandro', 'qwerty123', 'Alejandro', 'Galvan', ''),
(6, 'updated11:28', '', '', '', ''),
(7, 'update2', '', '', '', ''),
(8, 'Ivan', 'pass', 'Ivan', 'Millan', ''),
(9, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(10, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(11, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(12, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(13, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(14, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(15, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(16, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(17, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(18, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(19, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(20, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(21, 'Ivannnn', 'passssss', 'Ivannnnnn', 'Millannnnn', ''),
(23, 'New user', '', '', '', ''),
(25, '', '', '', '', ''),
(26, 'Yoselin', '123456', 'qwerty', 'qwerty', ''),
(27, 'Yoselin', '123456', 'qwerty', 'qwerty', ''),
(31, 'Yoselin', 'qwerty', 'Yoselin', 'Galvan', 'flores-de-bach-e1433872683188-640x480.jpg'),
(32, 'Prueba', 'qwerty', 'Prueba', 'Prueba', 'cORBIN JAMES.png'),
(36, 'p', 'p', 'p', 'p', 'WhatsApp%20Image%202020-01-20%20at%209.35.34%20PM.jpeg'),
(37, 'we', 'qw', 'qw', 'qw', 'descarga.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

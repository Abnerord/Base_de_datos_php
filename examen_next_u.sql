-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2019 a las 05:08:10
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_next_u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `dia_completo` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_final`, `hora_final`, `dia_completo`, `email`) VALUES
(1, 'boda', '2019-01-01', '00:00:00', '2019-01-03', '00:00:12', 1, 'abner@nextu.com'),
(3, 'Entrevista', '2019-02-04', '09:00:00', '2019-02-11', '18:00:00', 1, 'edgar@nextu.com'),
(4, 'Trabajo', '2019-02-18', '08:00:00', '2019-02-26', '17:00:00', 1, 'rafa@nextu.com'),
(5, 'Actividad Universidad', '2019-03-08', '08:00:00', '2019-03-08', '10:00:00', 0, 'abner@nextu.com'),
(12, 'actividad 1', '2019-03-07', '07:00:00', '2019-03-08', '07:00:00', 0, 'abner@nextu.com'),
(13, 'actividad 2', '2019-03-13', '05:00:00', '2019-03-14', '06:00:00', 0, 'abner@nextu.com'),
(14, 'actividad 3', '2019-01-10', '00:00:00', '2019-01-11', '22:30:00', 0, 'abner@nextu.com'),
(15, 'actividad 4', '2019-03-06', '00:00:00', '0000-00-00', '00:00:00', 0, 'abner@nextu.com'),
(16, 'actividad 5', '2019-03-19', '07:00:00', '2019-03-19', '19:00:00', 0, 'abner@nextu.com'),
(18, 'actividad 1', '2019-01-05', '00:00:00', '0000-00-00', '00:00:00', 0, 'rafa@nextu.com'),
(19, 'actividad 2', '2019-01-02', '07:00:00', '2019-01-05', '07:00:00', 0, 'edgar@nextu.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombre`, `apellido`, `password`, `fecha_nacimiento`) VALUES
('abner@nextu.com', 'abner', 'rodriguez', '$2y$10$9xQR8AXKZB0H/YNiDNlnCOF.zcJIzU4WGD0FnQaE1G4nriiGZLi76', '1992-09-06'),
('edgar@nextu.com', 'edgar', 'rodriguez', '$2y$10$jpH4FTSRStApG33HNQfpsuyhRJLvxZjJtJ6VjKcC.MTRkfKfWEioK', '1984-05-19'),
('rafa@nextu.com', 'rafa', 'rodriguez', '$2y$10$xrMjPlfUQNeIprDep34oYOdZY7OifuWGjoU/gf9LwfIXIvZv5tB8C', '1988-12-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

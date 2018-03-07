-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2016 a las 16:27:55
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academicos`
--

CREATE TABLE `academicos` (
  `id` int(10) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `academicos`
--

INSERT INTO `academicos` (`id`, `pregunta`, `tipo`) VALUES
(1, '¿Cual es tu nombre?', 'Abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(10) NOT NULL,
  `user` varchar(10) DEFAULT NULL,
  `pass` varchar(10) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `user`, `pass`, `nombre`) VALUES
(1, 'admin', '123456', 'Miguel Angel Merino Martinez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `id` int(10) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id`, `pregunta`, `tipo`) VALUES
(1, 'tienes internet en tu casa?', 'Si,No'),
(2, 'cuantas horas estudias en tu casa?', 'Abierta'),
(3, 'tienes computadora e internet en tu casa?', 'Si,No'),
(4, '¿tiene redes sociales?', 'Si,No'),
(5, 'casa propia', 'Si,No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `id` int(10) NOT NULL,
  `ncontrol` varchar(8) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ap` varchar(20) NOT NULL,
  `am` varchar(20) NOT NULL,
  `fecha` varchar(18) NOT NULL,
  `semestre` varchar(4) NOT NULL,
  `carrera` varchar(35) NOT NULL,
  `email` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`id`, `ncontrol`, `password`, `nombre`, `ap`, `am`, `fecha`, `semestre`, `carrera`, `email`) VALUES
(1, '10011255', '12345', 'MIGUEL ANGEL', 'MERINO', 'MARTINEZ', '09-OCTUBRE-1989', '10', 'Ing. Sistemas Computacionales', 'ing.miguela.merinomtz@gmail.co'),
(2, '10011234', '1234', 'paul', 'lopez', 'gutierrez', '280492', '8', 'Ing. Sistemas Computacionales', 'gerardo@gmail.com'),
(3, '10011253', '123456', 'JUAN GABRIEL', 'LOPEZ', 'RUEDA', '09-OCTUBRE-1989', '4', 'Gestion Empresarial', 'juangabriel@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `economicos`
--

CREATE TABLE `economicos` (
  `id` int(10) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares`
--

CREATE TABLE `familiares` (
  `id` int(10) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitos`
--

CREATE TABLE `habitos` (
  `id` int(10) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personales`
--

CREATE TABLE `personales` (
  `id` int(10) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personales`
--

INSERT INTO `personales` (`id`, `pregunta`, `tipo`) VALUES
(1, 'ï¿½Numero de habitantes en su domicilio?', ''),
(2, 'Actualizacion nueva', 'Si,No'),
(3, 'ï¿½Que tiempo estudia fuera de clases?', ''),
(4, 'te la pelas', ''),
(5, 'eres puto', ''),
(6, 'vales verga merino', 'Si,No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesta`
--

CREATE TABLE `repuesta` (
  `id` int(11) NOT NULL,
  `repuesta` varchar(255) NOT NULL,
  `tabla` varchar(20) NOT NULL,
  `id_pregunta` int(10) NOT NULL,
  `nocontrol` int(10) NOT NULL,
  `calificacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repuesta`
--

INSERT INTO `repuesta` (`id`, `repuesta`, `tabla`, `id_pregunta`, `nocontrol`, `calificacion`) VALUES
(1, '9', 'personales', 1, 10011255, 4),
(2, 'SI', 'personales', 2, 10011255, 10),
(3, 'MIGUEL ANGEL MERINO MARTINEZ', 'academicos', 1, 10011255, 10),
(6, 'SI', 'casa', 1, 10011255, 0),
(7, '9', 'casa', 2, 10011255, 0),
(8, 'SI', 'casa', 3, 10011255, 0),
(9, 'SI', 'casa', 4, 10011255, 0),
(10, 'NO', 'personales', 3, 10011255, 5),
(11, 'SI', 'personales', 4, 10011255, 9),
(12, 'NO', 'personales', 5, 10011255, 10),
(13, 'NO', 'personales', 6, 10011255, 10),
(14, 'SI', 'casa', 5, 10011255, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academicos`
--
ALTER TABLE `academicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `economicos`
--
ALTER TABLE `economicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familiares`
--
ALTER TABLE `familiares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitos`
--
ALTER TABLE `habitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personales`
--
ALTER TABLE `personales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repuesta`
--
ALTER TABLE `repuesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academicos`
--
ALTER TABLE `academicos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `casa`
--
ALTER TABLE `casa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `economicos`
--
ALTER TABLE `economicos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `familiares`
--
ALTER TABLE `familiares`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `habitos`
--
ALTER TABLE `habitos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personales`
--
ALTER TABLE `personales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `repuesta`
--
ALTER TABLE `repuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

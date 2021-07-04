-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2021 a las 20:26:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supportit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `cve_departamento` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`cve_departamento`, `nombre`) VALUES
(1, 'Departamento de soporte tecnico'),
(2, 'Departamento de finanzas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `cve_evento` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha` date NOT NULL,
  `detalles` text NOT NULL,
  `cve_laptop` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`cve_evento`, `nombre`, `fecha`, `detalles`, `cve_laptop`, `foto`) VALUES
(1, 'Mantenimiento preventivo', '2021-02-16', 'Se realizará todo el procedimiento de mantenimiento preventivo', 1, 'web-technologies-4k-wallpaper.png'),
(2, 'Mantenimiento correctivo', '2021-02-09', 'Se realizaran todos los procedimientos del mantenimiento correctivo', 2, '13685.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laptop`
--

CREATE TABLE `laptop` (
  `cve_laptop` int(11) NOT NULL,
  `marca` text NOT NULL,
  `serie` text NOT NULL,
  `ram` int(11) NOT NULL,
  `disco` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cve_operador` int(11) NOT NULL,
  `fotografia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laptop`
--

INSERT INTO `laptop` (`cve_laptop`, `marca`, `serie`, `ram`, `disco`, `tipo`, `cve_operador`, `fotografia`) VALUES
(1, 'HP PAVILION 15', 'CW0009LA', 16, 1024, 1, 1, 'Fondo 3.jpg'),
(2, 'MacBook Air 17 inch', '45164SDFASD45', 8, 120, 1, 2, 'WallPaper-Minimalista3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `cve_persona` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `curp` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` text NOT NULL,
  `cve_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`cve_persona`, `nombre`, `apellido`, `curp`, `telefono`, `correo`, `cve_departamento`) VALUES
(1, 'Pedro Miguel', 'Perez Torres', 'PETP990216HTCRRD06', 2147483647, 'pmpedrotorres@gmail.com', 1),
(2, 'Jose Angel', 'Perez Torres', 'PETP990216HTCRRD06', 2147483647, 'pmpedrotorres@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `cve.user` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `contraseña` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`cve.user`, `usuario`, `contraseña`) VALUES
(1, 'pmpedrotorres@gmail.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`cve_departamento`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`cve_evento`);

--
-- Indices de la tabla `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`cve_laptop`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`cve_persona`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cve.user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `cve_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `cve_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `laptop`
--
ALTER TABLE `laptop`
  MODIFY `cve_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `cve_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `cve.user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2019 a las 18:42:58
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `titulo`, `fecha`, `hora`) VALUES
(1, 'Visita Guiada', '2019-10-10', '15:30:00'),
(2, 'Da Vinci Tour', '2019-10-26', '10:30:00'),
(3, 'ExposiciÃ³n Rupestre', '2019-10-18', '17:00:00'),
(4, 'Muestra SalÃ³n Arte Moderna', '2019-10-22', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_vistantes`
--

CREATE TABLE `actividades_vistantes` (
  `id_actividad` int(10) UNSIGNED NOT NULL,
  `id_visitantes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_salon`
--

CREATE TABLE `actividad_salon` (
  `id_actividad` int(10) UNSIGNED NOT NULL,
  `id_salon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleados` int(10) UNSIGNED NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleados`, `dni`, `nombre`, `apellido`) VALUES
(1, '43180949', 'Gabriel', 'Niz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_actividades`
--

CREATE TABLE `empleados_actividades` (
  `id_empleados` int(10) UNSIGNED NOT NULL,
  `id_actividad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_idiomas`
--

CREATE TABLE `empleados_idiomas` (
  `id_empleados` int(10) UNSIGNED NOT NULL,
  `id_idiomas` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id_idiomas` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma_vistantes`
--

CREATE TABLE `idioma_vistantes` (
  `id_idiomas` int(10) UNSIGNED NOT NULL,
  `id_visitantes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras`
--

CREATE TABLE `muestras` (
  `id_muestra` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `muestras`
--

INSERT INTO `muestras` (`id_muestra`, `fecha`, `direccion`) VALUES
(1, '2019-10-09', 'Cavassa 3944'),
(3, '2019-10-10', 'JosÃ© HÃ©rnandez 278');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras_obras`
--

CREATE TABLE `muestras_obras` (
  `id_obras` int(10) UNSIGNED NOT NULL,
  `id_muestra` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `id_obras` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id_puesto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `fecha_nac` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto_empleados`
--

CREATE TABLE `puesto_empleados` (
  `id_puesto` int(10) UNSIGNED NOT NULL,
  `id_empleados` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id_salon` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `plano` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones_muestras`
--

CREATE TABLE `salones_muestras` (
  `id_salon` int(10) UNSIGNED NOT NULL,
  `id_muestra` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon_obr`
--

CREATE TABLE `salon_obr` (
  `id_salon` int(10) UNSIGNED NOT NULL,
  `id_obras` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE `visitantes` (
  `id_visitantes` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitantes`
--

INSERT INTO `visitantes` (`id_visitantes`, `nombre`, `apellido`, `dni`, `telefono`, `fecha_nac`) VALUES
(4, 'Fernando', 'Vera Rojas', '45967825', '1184901638', '2000-01-10'),
(6, 'Fernando', 'Niz', '43180949', '1125456800', '2000-12-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `actividades_vistantes`
--
ALTER TABLE `actividades_vistantes`
  ADD KEY `id_actividad` (`id_actividad`,`id_visitantes`),
  ADD KEY `id_visitantes` (`id_visitantes`);

--
-- Indices de la tabla `actividad_salon`
--
ALTER TABLE `actividad_salon`
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_salon` (`id_salon`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleados`);

--
-- Indices de la tabla `empleados_actividades`
--
ALTER TABLE `empleados_actividades`
  ADD KEY `id_empleados` (`id_empleados`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `empleados_idiomas`
--
ALTER TABLE `empleados_idiomas`
  ADD KEY `id_empleados` (`id_empleados`),
  ADD KEY `id_idiomas` (`id_idiomas`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id_idiomas`);

--
-- Indices de la tabla `idioma_vistantes`
--
ALTER TABLE `idioma_vistantes`
  ADD KEY `id_idiomas` (`id_idiomas`),
  ADD KEY `id_visitantes` (`id_visitantes`);

--
-- Indices de la tabla `muestras`
--
ALTER TABLE `muestras`
  ADD PRIMARY KEY (`id_muestra`);

--
-- Indices de la tabla `muestras_obras`
--
ALTER TABLE `muestras_obras`
  ADD KEY `id_obras` (`id_obras`),
  ADD KEY `id_muestra` (`id_muestra`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id_obras`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `puesto_empleados`
--
ALTER TABLE `puesto_empleados`
  ADD KEY `id_puesto` (`id_puesto`),
  ADD KEY `id_empleados` (`id_empleados`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id_salon`);

--
-- Indices de la tabla `salones_muestras`
--
ALTER TABLE `salones_muestras`
  ADD KEY `id_salon` (`id_salon`),
  ADD KEY `id_muestra` (`id_muestra`);

--
-- Indices de la tabla `salon_obr`
--
ALTER TABLE `salon_obr`
  ADD KEY `id_salon` (`id_salon`),
  ADD KEY `id_obras` (`id_obras`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`id_visitantes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleados` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id_idiomas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `muestras`
--
ALTER TABLE `muestras`
  MODIFY `id_muestra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id_obras` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id_puesto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id_salon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `id_visitantes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades_vistantes`
--
ALTER TABLE `actividades_vistantes`
  ADD CONSTRAINT `actividades_vistantes_ibfk_1` FOREIGN KEY (`id_visitantes`) REFERENCES `visitantes` (`id_visitantes`),
  ADD CONSTRAINT `actividades_vistantes_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`);

--
-- Filtros para la tabla `actividad_salon`
--
ALTER TABLE `actividad_salon`
  ADD CONSTRAINT `actividad_salon_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`),
  ADD CONSTRAINT `actividad_salon_ibfk_2` FOREIGN KEY (`id_salon`) REFERENCES `salones` (`id_salon`);

--
-- Filtros para la tabla `empleados_actividades`
--
ALTER TABLE `empleados_actividades`
  ADD CONSTRAINT `empleados_actividades_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`),
  ADD CONSTRAINT `empleados_actividades_ibfk_2` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`);

--
-- Filtros para la tabla `empleados_idiomas`
--
ALTER TABLE `empleados_idiomas`
  ADD CONSTRAINT `empleados_idiomas_ibfk_1` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`),
  ADD CONSTRAINT `empleados_idiomas_ibfk_2` FOREIGN KEY (`id_idiomas`) REFERENCES `idiomas` (`id_idiomas`);

--
-- Filtros para la tabla `idioma_vistantes`
--
ALTER TABLE `idioma_vistantes`
  ADD CONSTRAINT `idioma_vistantes_ibfk_1` FOREIGN KEY (`id_idiomas`) REFERENCES `idiomas` (`id_idiomas`),
  ADD CONSTRAINT `idioma_vistantes_ibfk_2` FOREIGN KEY (`id_visitantes`) REFERENCES `visitantes` (`id_visitantes`);

--
-- Filtros para la tabla `muestras_obras`
--
ALTER TABLE `muestras_obras`
  ADD CONSTRAINT `muestras_obras_ibfk_1` FOREIGN KEY (`id_obras`) REFERENCES `obras` (`id_obras`),
  ADD CONSTRAINT `muestras_obras_ibfk_2` FOREIGN KEY (`id_muestra`) REFERENCES `muestras` (`id_muestra`);

--
-- Filtros para la tabla `puesto_empleados`
--
ALTER TABLE `puesto_empleados`
  ADD CONSTRAINT `puesto_empleados_ibfk_1` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`),
  ADD CONSTRAINT `puesto_empleados_ibfk_2` FOREIGN KEY (`id_puesto`) REFERENCES `puestos` (`id_puesto`);

--
-- Filtros para la tabla `salones_muestras`
--
ALTER TABLE `salones_muestras`
  ADD CONSTRAINT `salones_muestras_ibfk_1` FOREIGN KEY (`id_salon`) REFERENCES `salones` (`id_salon`),
  ADD CONSTRAINT `salones_muestras_ibfk_2` FOREIGN KEY (`id_muestra`) REFERENCES `muestras` (`id_muestra`);

--
-- Filtros para la tabla `salon_obr`
--
ALTER TABLE `salon_obr`
  ADD CONSTRAINT `salon_obr_ibfk_1` FOREIGN KEY (`id_obras`) REFERENCES `obras` (`id_obras`),
  ADD CONSTRAINT `salon_obr_ibfk_2` FOREIGN KEY (`id_salon`) REFERENCES `salones` (`id_salon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

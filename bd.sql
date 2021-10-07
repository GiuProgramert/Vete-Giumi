-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 10:28:40
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hobi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `num_factura` int(11) NOT NULL,
  `cod_paciente` int(11) NOT NULL,
  `cod_servicio` int(11) NOT NULL,
  `costo_servicio` varchar(45) DEFAULT NULL,
  `cod_vet` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`num_factura`, `cod_paciente`, `cod_servicio`, `costo_servicio`, `cod_vet`, `cantidad`) VALUES
(918, 4, 4, '', 5, '2'),
(325, 4, 4, '', 5, '2'),
(397, 4, 3, '', 5, '8'),
(56, 4, 4, '', 5, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueno`
--

CREATE TABLE `dueno` (
  `id_dueno` int(11) NOT NULL,
  `nomb_dueno` varchar(45) DEFAULT NULL,
  `ape_dueno` varchar(45) DEFAULT NULL,
  `dir_dueno` varchar(45) DEFAULT NULL,
  `ruc_dueno` varchar(45) DEFAULT NULL,
  `telef_dueno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dueno`
--

INSERT INTO `dueno` (`id_dueno`, `nomb_dueno`, `ape_dueno`, `dir_dueno`, `ruc_dueno`, `telef_dueno`) VALUES
(2, 'Hola', 'Diaz', 'pilocarpo caÃ±ete 674', 'max', '0983858997');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `num_factura` int(11) NOT NULL,
  `tipo_pago` varchar(45) DEFAULT NULL,
  `fecha_emicion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`num_factura`, `tipo_pago`, `fecha_emicion`) VALUES
(56, 'Cheque', '2019-11-13'),
(58, 'Efectivo', '2018-07-22'),
(325, 'Cheque', '2019-11-11'),
(397, 'Tarjeta', '2019-06-05'),
(669, 'Efectivo', '2018-07-22'),
(918, 'Cheque', '2019-11-11'),
(985, 'Efectivo', '2018-07-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `cod_paciente` int(11) NOT NULL,
  `edad_paciente` int(11) DEFAULT NULL,
  `nomb_paciente` varchar(45) DEFAULT NULL,
  `id_dueno` int(11) NOT NULL,
  `raza` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`cod_paciente`, `edad_paciente`, `nomb_paciente`, `id_dueno`, `raza`, `especie`, `sexo`) VALUES
(4, 10, 'Cami', 2, 'gg', 'Hola', 'Hembra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `cod_servicio` int(11) NOT NULL,
  `nomb_servicio` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `especificacion_serv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`cod_servicio`, `nomb_servicio`, `observacion`, `especificacion_serv`) VALUES
(3, 'Vacuna contra la rabia', 'maxi pt', 150000),
(4, 'Chequeo Mensual', 'Chequeo del cuerpo y analisis', 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `cod_vet` int(11) NOT NULL,
  `nom_vet` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`cod_vet`, `nom_vet`) VALUES
(3, 'Mario Diaz'),
(5, 'Evangelina Perez Duarte');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `num_factura` (`num_factura`),
  ADD KEY `cod_paciente` (`cod_paciente`),
  ADD KEY `cod_servicio` (`cod_servicio`),
  ADD KEY `cod_vet` (`cod_vet`);

--
-- Indices de la tabla `dueno`
--
ALTER TABLE `dueno`
  ADD PRIMARY KEY (`id_dueno`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`num_factura`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cod_paciente`),
  ADD KEY `id_dueño` (`id_dueno`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`cod_servicio`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`cod_vet`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`num_factura`) REFERENCES `factura` (`num_factura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`cod_paciente`) REFERENCES `paciente` (`cod_paciente`),
  ADD CONSTRAINT `detalle_factura_ibfk_3` FOREIGN KEY (`cod_servicio`) REFERENCES `servicio` (`cod_servicio`),
  ADD CONSTRAINT `detalle_factura_ibfk_4` FOREIGN KEY (`cod_vet`) REFERENCES `veterinario` (`cod_vet`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_dueno`) REFERENCES `dueno` (`id_dueno`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

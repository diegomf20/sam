-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 19:06:15
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_administrador`
--

CREATE TABLE `tb_administrador` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `contrasenia` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_administrador`
--

INSERT INTO `tb_administrador` (`idusuario`, `nombres`, `apellidos`, `usuario`, `contrasenia`) VALUES
(1, 'diego', 'mendoza', 'diegomf', 'stunsd18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_afiliacion`
--

CREATE TABLE `tb_afiliacion` (
  `idinversionista` int(11) NOT NULL,
  `idafiliado` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT '0-inactivo,1:activo',
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_afiliacion`
--

INSERT INTO `tb_afiliacion` (`idinversionista`, `idafiliado`, `nivel`, `estado`, `fecha`) VALUES
(69, 70, 1, 1, '2018-01-31'),
(70, 71, 1, 1, '2018-01-31'),
(69, 71, 2, 1, '2018-01-31'),
(70, 72, 1, 1, '2018-01-31'),
(69, 72, 2, 1, '2018-01-31'),
(72, 73, 1, 1, '2018-01-31'),
(70, 73, 2, 1, '2018-01-31'),
(69, 73, 3, 1, '2018-01-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inicial`
--

CREATE TABLE `tb_inicial` (
  `idinversionista` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_inicial`
--

INSERT INTO `tb_inicial` (`idinversionista`, `fecha`) VALUES
(69, '2018-01-31'),
(70, '2018-01-31'),
(71, '2018-01-31'),
(72, '2018-01-31'),
(73, '2018-01-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inversion`
--

CREATE TABLE `tb_inversion` (
  `idinversion` int(11) NOT NULL,
  `idinversionista` int(11) NOT NULL,
  `paquete` decimal(10,0) NOT NULL,
  `numerooperacion` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` int(11) NOT NULL COMMENT '1:inicial,2:renovacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_inversion`
--

INSERT INTO `tb_inversion` (`idinversion`, `idinversionista`, `paquete`, `numerooperacion`, `fecha`, `tipo`) VALUES
(36, 69, '600', 'n5146789yu512', '2018-01-31', 1),
(47, 69, '600', 'adsdas', '2018-01-31', 2),
(50, 70, '1000', '4', '2018-01-31', 1),
(51, 71, '500', '1010', '2018-01-31', 1),
(52, 72, '1000', 'shjbfs', '2018-01-31', 1),
(53, 73, '500', 'qqq', '2018-01-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inversionista`
--

CREATE TABLE `tb_inversionista` (
  `idinversionista` int(11) NOT NULL,
  `nombres` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `dni` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ciudad` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `contrasenia` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `banco` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numerocuenta` int(11) DEFAULT NULL,
  `rango` int(11) DEFAULT '0' COMMENT '0-nuevo,1-ejecutivo, 2-platino,3-Master,4-Elite',
  `diapago` int(11) DEFAULT NULL,
  `cuotaretirada` int(11) NOT NULL DEFAULT '0',
  `numeroafiliados` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_inversionista`
--

INSERT INTO `tb_inversionista` (`idinversionista`, `nombres`, `apellidos`, `dni`, `direccion`, `ciudad`, `celular`, `imagen`, `email`, `contrasenia`, `banco`, `numerocuenta`, `rango`, `diapago`, `cuotaretirada`, `numeroafiliados`) VALUES
(69, 'Diego Francisco', 'Mendoza Frias', 77382978, NULL, NULL, '959864720', 'usuario.jpg', 'diegomf.mendoza@gmail.com', 'inversionista', NULL, NULL, 0, 1, 5, 0),
(70, 'Cristian ', 'Palomino Vega', 7898454, NULL, NULL, '551', 'usuario.jpg', 'paloomino@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(71, 'Luis ', 'tucunango carrasco', 78454221, NULL, NULL, '88521', 'usuario.jpg', 'lucho', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(72, 'Luisa Liseth', 'Medina Julca', 84759623, NULL, NULL, '554654', 'usuario.jpg', 'ilove@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(73, 'Damaris', 'Medina Julca', 7556541, NULL, NULL, '4456', 'usuario.jpg', 'damaris.lalechuza@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_retiros`
--

CREATE TABLE `tb_retiros` (
  `idinversion` int(11) NOT NULL,
  `cuota` int(11) NOT NULL,
  `fechaasignada` date NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT '0:procesando, 1 retirado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_retiros`
--

INSERT INTO `tb_retiros` (`idinversion`, `cuota`, `fechaasignada`, `descripcion`, `monto`, `estado`) VALUES
(36, 1, '2018-01-20', '', NULL, 0),
(36, 2, '2018-04-01', '', NULL, 0),
(36, 3, '2018-05-01', '', NULL, 0),
(36, 4, '2018-06-01', '', NULL, 0),
(36, 5, '2018-07-01', '', NULL, 0),
(36, 6, '2018-08-01', '', NULL, 0),
(47, 1, '2018-03-01', '', NULL, 0),
(47, 2, '2018-04-01', '', NULL, 0),
(47, 3, '2018-05-01', '', NULL, 0),
(50, 1, '2018-03-01', '', NULL, 0),
(50, 2, '2018-04-01', '', NULL, 0),
(50, 3, '2018-05-01', '', NULL, 0),
(50, 4, '2018-06-01', '', NULL, 0),
(50, 5, '2018-07-01', '', NULL, 0),
(50, 6, '2018-08-01', '', NULL, 0),
(51, 1, '2018-03-01', '', NULL, 0),
(51, 2, '2018-04-01', '', NULL, 0),
(51, 3, '2018-05-01', '', NULL, 0),
(51, 4, '2018-06-01', '', NULL, 0),
(51, 5, '2018-07-01', '', NULL, 0),
(51, 6, '2018-08-01', '', NULL, 0),
(52, 1, '2018-03-01', '', NULL, 0),
(52, 2, '2018-04-01', '', NULL, 0),
(52, 3, '2018-05-01', '', NULL, 0),
(52, 4, '2018-06-01', '', NULL, 0),
(52, 5, '2018-07-01', '', NULL, 0),
(52, 6, '2018-08-01', '', NULL, 0),
(53, 1, '2018-03-01', '', NULL, 0),
(53, 2, '2018-04-01', '', NULL, 0),
(53, 3, '2018-05-01', '', NULL, 0),
(53, 4, '2018-06-01', '', NULL, 0),
(53, 5, '2018-07-01', '', NULL, 0),
(53, 6, '2018-08-01', '', NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `tb_afiliacion`
--
ALTER TABLE `tb_afiliacion`
  ADD KEY `idinversionista` (`idinversionista`),
  ADD KEY `idafiliado` (`idafiliado`);

--
-- Indices de la tabla `tb_inicial`
--
ALTER TABLE `tb_inicial`
  ADD UNIQUE KEY `idinversionista_2` (`idinversionista`),
  ADD KEY `idinversionista` (`idinversionista`);

--
-- Indices de la tabla `tb_inversion`
--
ALTER TABLE `tb_inversion`
  ADD PRIMARY KEY (`idinversion`),
  ADD KEY `idinversionista` (`idinversionista`);

--
-- Indices de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  ADD PRIMARY KEY (`idinversionista`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tb_retiros`
--
ALTER TABLE `tb_retiros`
  ADD UNIQUE KEY `idinversion` (`idinversion`,`cuota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_inversion`
--
ALTER TABLE `tb_inversion`
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_afiliacion`
--
ALTER TABLE `tb_afiliacion`
  ADD CONSTRAINT `tb_afiliacion_ibfk_1` FOREIGN KEY (`idinversionista`) REFERENCES `tb_inversionista` (`idinversionista`),
  ADD CONSTRAINT `tb_afiliacion_ibfk_2` FOREIGN KEY (`idafiliado`) REFERENCES `tb_inversionista` (`idinversionista`);

--
-- Filtros para la tabla `tb_inicial`
--
ALTER TABLE `tb_inicial`
  ADD CONSTRAINT `tb_inicial_ibfk_1` FOREIGN KEY (`idinversionista`) REFERENCES `tb_inversionista` (`idinversionista`);

--
-- Filtros para la tabla `tb_inversion`
--
ALTER TABLE `tb_inversion`
  ADD CONSTRAINT `tb_inversion_ibfk_1` FOREIGN KEY (`idinversionista`) REFERENCES `tb_inversionista` (`idinversionista`);

--
-- Filtros para la tabla `tb_retiros`
--
ALTER TABLE `tb_retiros`
  ADD CONSTRAINT `tb_retiros_ibfk_1` FOREIGN KEY (`idinversion`) REFERENCES `tb_inversion` (`idinversion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

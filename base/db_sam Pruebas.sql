-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2018 a las 14:53:40
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
-- Estructura de tabla para la tabla `tb_actualizar`
--

CREATE TABLE `tb_actualizar` (
  `idactualizar` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_actualizar`
--

INSERT INTO `tb_actualizar` (`idactualizar`, `fecha`) VALUES
(1, '2017-07-10'),
(2, '2017-07-20'),
(3, '2017-08-01'),
(4, '2017-08-10'),
(5, '2017-08-20'),
(6, '2017-09-01'),
(7, '2017-09-10'),
(8, '2017-10-01'),
(9, '2017-10-10'),
(10, '2017-10-20'),
(11, '2017-11-01'),
(12, '2017-11-10');

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
(1, 'ADMINISTRADOR', 'GENERAL', 'jefesam', '@rootsam');

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
(1, 2, 1, 1, '2017-06-12'),
(1, 3, 1, 1, '2017-06-26'),
(1, 4, 1, 1, '2017-06-21'),
(1, 5, 1, 1, '2017-07-04'),
(1, 6, 1, 1, '2017-08-01'),
(1, 7, 1, 1, '2017-08-17'),
(5, 8, 1, 1, '2017-08-20'),
(1, 9, 1, 1, '2017-08-20'),
(1, 8, 2, 1, '2017-08-20'),
(5, 10, 1, 1, '2017-09-20'),
(1, 10, 2, 1, '2017-09-20'),
(1, 11, 1, 1, '2017-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bono_afiliacion`
--

CREATE TABLE `tb_bono_afiliacion` (
  `idbonoafiliacion` int(11) NOT NULL,
  `idinversionista` int(11) NOT NULL,
  `numerooperacion` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_bono_afiliacion`
--

INSERT INTO `tb_bono_afiliacion` (`idbonoafiliacion`, `idinversionista`, `numerooperacion`, `fecha`, `descripcion`, `monto`, `estado`) VALUES
(1, 1, 'PAG000001', '2017-07-10', 'Bono de afiliacion nivel 1 (PRESLEY  ROMERO DE LA CRUZ )', '24', 1),
(2, 1, 'PAG000001', '2017-07-10', 'Bono de afiliacion nivel 1 (LUIS JUAREZ )', '80', 1),
(3, 1, 'PAG000001', '2017-07-10', 'Bono de afiliacion nivel 1 (JUAN TAPIA )', '40', 1),
(4, 1, 'PAG000001', '2017-07-10', 'Bono de afiliacion nivel 1 (LUISA LISETH MEDINA JULCA )', '40', 1),
(5, 1, 'PAG000005', '2017-08-10', 'Bono de afiliacion nivel 1 (JESUS  FERNANDEZ HERRERA )', '30', 1),
(6, 1, 'PAG000011', '2017-09-10', 'Bono de afiliacion nivel 1 (YESSICA BOCANEGRA HUAMAN )', '50', 1),
(7, 1, 'PAG000011', '2017-09-10', 'Bono de afiliacion nivel 2 (ISRAEL MONTENEGRO CHORE )', '25', 1),
(8, 1, 'PAG000011', '2017-09-10', 'Bono de afiliacion nivel 1 (CARLOS LOCONI )', '30', 1),
(9, 1, 'PAG000017', '2017-10-10', 'Bono de afiliacion nivel 2 (DANIELA JANA LEIVA )', '50', 1),
(10, 5, 'PAG000018', '2017-10-10', 'Bono de afiliacion nivel 1 (DANIELA JANA LEIVA )', '80', 1);

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
(1, '2017-06-09'),
(2, '2017-06-12'),
(3, '2017-06-26'),
(4, '2017-06-21'),
(5, '2017-07-04'),
(6, '2017-08-01'),
(7, '2017-08-17'),
(8, '2017-08-20'),
(9, '2017-08-20'),
(10, '2017-09-20'),
(11, '2017-11-10');

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
(1, 1, '1000', 'INV000001', '2017-06-09', 1),
(2, 2, '300', 'INV000002', '2017-06-12', 1),
(3, 4, '1000', 'INV000003', '2017-06-21', 1),
(4, 3, '500', 'INV000004', '2017-06-26', 1),
(5, 5, '500', 'INV000005', '2017-07-04', 1),
(6, 6, '300', 'INV000006', '2017-08-01', 1),
(7, 7, '500', 'INV000007', '2017-08-17', 1),
(8, 8, '500', 'INV000008', '2017-08-20', 1),
(9, 9, '300', 'INV000009', '2017-08-20', 1),
(10, 10, '1000', 'INV000010', '2017-09-20', 1),
(11, 11, '300', 'INV000011', '2017-11-10', 1);

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
  `numerocuenta` varchar(11) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rango` int(11) DEFAULT '0' COMMENT '0-nuevo,1-ejecutivo, 2-platino,3-Master,4-Elite',
  `diapago` int(11) DEFAULT NULL,
  `cuotaretirada` int(11) NOT NULL DEFAULT '0',
  `numeroafiliados` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_inversionista`
--

INSERT INTO `tb_inversionista` (`idinversionista`, `nombres`, `apellidos`, `dni`, `direccion`, `ciudad`, `celular`, `imagen`, `email`, `contrasenia`, `banco`, `numerocuenta`, `rango`, `diapago`, `cuotaretirada`, `numeroafiliados`) VALUES
(1, 'CHRISTIAN ', 'PALOMINO VEGA', 77382971, 'Emiliano niÃ±o', 'lambayeque/ lambayeque /lambayeque', '964231245', '77382971.png', 'paloominounprg@gmail.com', 'inversionista', 'Banco de la Nacion', '2147483647', 3, 10, 5, 8),
(2, 'PRESLEY ', 'ROMERO DE LA CRUZ', 77653412, NULL, NULL, '968745352', '77653412.png', 'presley@gmail.com', 'inversionista', 'Banco de Jaen', '66765261298', 0, 20, 4, 0),
(3, 'JUAN', 'TAPIA', 77452531, NULL, NULL, '973425143', '77452531.png', 'juan@gmail.com', 'inversionista', 'BCP', '2147483647', 0, 1, 4, 0),
(4, 'LUIS', 'JUAREZ', 73454626, NULL, NULL, '973425142', '73454626.png', 'luisjuarez@gmail.com', 'inversionista', 'BANCO CONTINENTAL', '76353422738', 0, 1, 4, 0),
(5, 'LUISA LISETH', 'MEDINA JULCA', 77542314, NULL, NULL, '984563214', '77542314.png', 'ilove@gmail.com', 'inversionista', 'BAnco de la nacion', '2147483647', 1, 10, 4, 2),
(6, 'JESUS ', 'FERNANDEZ HERRERA', 71243562, NULL, NULL, '987654324', '71243562.png', 'jesus@gmail.com', 'inversionista', 'Banco de la nación', '12413252637', 0, 1, 3, 0),
(7, 'YESSICA', 'BOCANEGRA HUAMAN', 75625342, NULL, NULL, '987644524', '75625342.png', 'bocanegra@gmail.com', 'inversionista', 'Banco de la  nación', '87352637483', 0, 20, 2, 0),
(8, 'ISRAEL', 'MONTENEGRO CHORE', 76543247, NULL, NULL, '9873635241', '76543247.png', 'israelperu@gmail.com', 'inversionista', 'BCP', '12351427894', 0, 20, 2, 0),
(9, 'CARLOS', 'LOCONI', 77554254, NULL, NULL, '986352415', '77554254.png', 'loconi@gmail.com', 'inversionista', 'BCP', '12536273786', 0, 20, 2, 0),
(10, 'DANIELA JANA', 'LEIVA', 98876544, NULL, NULL, '988765435', '98876544.png', 'daniela@gmail.com', 'inversionista', 'BANCO DE LA NACION', '35267888263', 0, 20, 1, 0),
(11, 'JUDITH', 'JUAREZ CORONADO', 78123412, NULL, NULL, '987656745', 'usuario.jpg', 'judix@gmail.com', 'inversionista', 'BCP', '12354263789', 0, 10, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_retiros`
--

CREATE TABLE `tb_retiros` (
  `idinversion` int(11) NOT NULL,
  `cuota` int(11) NOT NULL,
  `fechaasignada` date NOT NULL,
  `numerooperacion` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT '0:procesando, 1 retirado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_retiros`
--

INSERT INTO `tb_retiros` (`idinversion`, `cuota`, `fechaasignada`, `numerooperacion`, `descripcion`, `monto`, `estado`) VALUES
(1, 1, '2017-07-10', 'PAG000001', 'Bono de Regalia N - 1', '200', 1),
(1, 2, '2017-08-10', 'PAG000005', 'Bono de Regalia N - 2', '200', 1),
(1, 3, '2017-09-10', 'PAG000011', 'Bono de Regalia N - 3', '200', 1),
(1, 4, '2017-10-10', 'PAG000017', 'Bono de Regalia N - 4', '200', 1),
(1, 5, '2017-11-10', 'PAG000027', 'Bono de Regalia N - 5', '200', 1),
(1, 6, '2017-12-10', NULL, '', NULL, 0),
(2, 1, '2017-07-20', 'PAG000002', 'Bono de Regalia N - 1', '60', 1),
(2, 2, '2017-08-20', 'PAG000007', 'Bono de Regalia N - 2', '60', 1),
(2, 3, '2017-09-20', NULL, '', NULL, 0),
(2, 4, '2017-10-20', 'PAG000019', 'Bono de Regalia N - 4', '60', 1),
(2, 5, '2017-11-20', NULL, '', NULL, 0),
(2, 6, '2017-12-20', NULL, '', NULL, 0),
(3, 1, '2017-08-01', 'PAG000004', 'Bono de Regalia N - 1', '200', 1),
(3, 2, '2017-09-01', 'PAG000009', 'Bono de Regalia N - 2', '200', 1),
(3, 3, '2017-10-01', 'PAG000015', 'Bono de Regalia N - 3', '200', 1),
(3, 4, '2017-11-01', 'PAG00026', 'Bono de Regalia N - 4', '200', 1),
(3, 5, '2017-12-01', NULL, '', NULL, 0),
(3, 6, '2018-01-01', NULL, '', NULL, 0),
(4, 1, '2017-08-01', 'PAG000003', 'Bono de Regalia N - 1', '100', 1),
(4, 2, '2017-09-01', 'PAG000008', 'Bono de Regalia N - 2', '100', 1),
(4, 3, '2017-10-01', 'PAG000014', 'Bono de Regalia N - 3', '100', 1),
(4, 4, '2017-11-01', 'PAG000025', 'Bono de Regalia N - 4', '100', 1),
(4, 5, '2017-12-01', NULL, '', NULL, 0),
(4, 6, '2018-01-01', NULL, '', NULL, 0),
(5, 1, '2017-08-10', 'PAG000006', 'Bono de Regalia N - 1', '100', 1),
(5, 2, '2017-09-10', 'PAG000012', 'Bono de Regalia N - 2', '100', 1),
(5, 3, '2017-10-10', 'PAG000018', 'Bono de Regalia N - 3', '100', 1),
(5, 4, '2017-11-10', 'PAG000028', 'Bono de Regalia N - 4', '100', 1),
(5, 5, '2017-12-10', NULL, '', NULL, 0),
(5, 6, '2018-01-10', NULL, '', NULL, 0),
(6, 1, '2017-09-01', 'PAG000010', 'Bono de Regalia N - 1', '60', 1),
(6, 2, '2017-10-01', 'PAG000016', 'Bono de Regalia N - 2', '60', 1),
(6, 3, '2017-11-01', 'PAG000027', 'Bono de Regalia N - 3', '60', 1),
(6, 4, '2017-12-01', NULL, '', NULL, 0),
(6, 5, '2018-01-01', NULL, '', NULL, 0),
(6, 6, '2018-02-01', NULL, '', NULL, 0),
(7, 1, '2017-09-20', NULL, '', NULL, 0),
(7, 2, '2017-10-20', 'PAG000020', 'Bono de Regalia N - 2', '100', 1),
(7, 3, '2017-11-20', NULL, '', NULL, 0),
(7, 4, '2017-12-20', NULL, '', NULL, 0),
(7, 5, '2018-01-20', NULL, '', NULL, 0),
(7, 6, '2018-02-20', NULL, '', NULL, 0),
(8, 1, '2017-09-20', NULL, '', NULL, 0),
(8, 2, '2017-10-20', 'PAG000021', 'Bono de Regalia N - 2', '100', 1),
(8, 3, '2017-11-20', NULL, '', NULL, 0),
(8, 4, '2017-12-20', NULL, '', NULL, 0),
(8, 5, '2018-01-20', NULL, '', NULL, 0),
(8, 6, '2018-02-20', NULL, '', NULL, 0),
(9, 1, '2017-09-20', NULL, '', NULL, 0),
(9, 2, '2017-10-20', 'PAG000022', 'Bono de Regalia N - 2', '60', 1),
(9, 3, '2017-11-20', NULL, '', NULL, 0),
(9, 4, '2017-12-20', NULL, '', NULL, 0),
(9, 5, '2018-01-20', NULL, '', NULL, 0),
(9, 6, '2018-02-20', NULL, '', NULL, 0),
(10, 1, '2017-10-20', 'PAG000023', 'Bono de Regalia N - 1', '200', 1),
(10, 2, '2017-11-20', NULL, '', NULL, 0),
(10, 3, '2017-12-20', NULL, '', NULL, 0),
(10, 4, '2018-01-20', NULL, '', NULL, 0),
(10, 5, '2018-02-20', NULL, '', NULL, 0),
(10, 6, '2018-03-20', NULL, '', NULL, 0),
(11, 1, '2017-12-10', NULL, '', NULL, 0),
(11, 2, '2018-01-10', NULL, '', NULL, 0),
(11, 3, '2018-02-10', NULL, '', NULL, 0),
(11, 4, '2018-03-10', NULL, '', NULL, 0),
(11, 5, '2018-04-10', NULL, '', NULL, 0),
(11, 6, '2018-05-10', NULL, '', NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_actualizar`
--
ALTER TABLE `tb_actualizar`
  ADD PRIMARY KEY (`idactualizar`);

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
-- Indices de la tabla `tb_bono_afiliacion`
--
ALTER TABLE `tb_bono_afiliacion`
  ADD PRIMARY KEY (`idbonoafiliacion`);

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
-- AUTO_INCREMENT de la tabla `tb_actualizar`
--
ALTER TABLE `tb_actualizar`
  MODIFY `idactualizar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_bono_afiliacion`
--
ALTER TABLE `tb_bono_afiliacion`
  MODIFY `idbonoafiliacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_inversion`
--
ALTER TABLE `tb_inversion`
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

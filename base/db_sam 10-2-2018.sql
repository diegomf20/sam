-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2018 a las 18:27:44
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
(3, '2017-07-10'),
(6, '2017-08-10'),
(7, '2017-09-10'),
(8, '2017-09-01'),
(9, '2017-09-20'),
(10, '2017-10-01'),
(11, '2017-10-10'),
(12, '2017-10-20'),
(13, '2017-11-01'),
(14, '2017-11-10'),
(15, '2017-11-20'),
(16, '2017-12-01'),
(21, '2017-12-10'),
(22, '2017-12-20'),
(23, '2018-01-01'),
(24, '2018-01-20'),
(25, '2018-02-01'),
(40, '2018-02-10');

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
(1, 'LARRI', 'PUENTE', 'larri', 'admin');

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
(2, 3, 1, 1, '2017-07-21'),
(2, 4, 1, 1, '2017-08-15'),
(2, 5, 1, 1, '2017-10-20'),
(2, 6, 1, 1, '2017-12-11'),
(2, 7, 1, 1, '2018-01-10');

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
(3, 2, 'PAG000004', '2017-09-10', 'Bono de afiliacion nivel 1 (JUAN  TAPIA )', '24', 1),
(4, 2, 'PAG000009', '2017-11-10', 'Bono de afiliacion nivel 1 (LUISA LISETH  MEDINA JULCA )', '40', 1),
(5, 2, 'PAG0000024', '2018-02-10', 'Bono de afiliacion por RenovaciÃ³n nivel 1 (PRESLEY EDGAR ROMERO DE LA CRUZ )', '25', 1),
(6, 2, 'PAG0000024', '2018-02-10', 'Bono de afiliacion nivel 1 (JUAN FLORES AGIRRE )', '100', 1);

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
(2, '2017-06-09'),
(3, '2017-07-21'),
(4, '2017-08-15'),
(5, '2017-10-20'),
(6, '2017-12-11'),
(7, '2018-01-10');

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
(3, 2, '1000', 'TRS000001I', '2017-06-09', 1),
(4, 3, '500', 'TRS000002I', '2017-07-21', 1),
(5, 4, '300', 'TRS0000003I', '2017-08-15', 1),
(6, 5, '500', 'TRS0000004', '2017-10-20', 1),
(7, 6, '300', 'TRS00005', '2017-12-11', 1),
(8, 2, '1000', 'REN0000001', '2018-01-20', 2),
(10, 3, '500', 'REN000002', '2018-01-10', 2),
(11, 7, '1000', 'TRS000005I', '2018-01-10', 1);

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
(2, 'Cristhian', 'Palomino vega', 7654890, NULL, NULL, '965434566', 'usuario.jpg', 'paloominounprg@gmail.com', 'inversionista', 'Banco Azteca', 2147483647, 2, 10, 1, 5),
(3, 'PRESLEY EDGAR', 'ROMERO DE LA CRUZ', 18237364, NULL, NULL, '987647364', 'usuario.jpg', 'presley11', 'inversionista', 'Banco Lurin', 2147483647, 0, 1, 6, 0),
(4, 'JUAN ', 'TAPIA', 12345345, NULL, NULL, '987564722', 'usuario.jpg', 'juan1234@gmail.com', 'inversionista', NULL, NULL, 0, 20, 5, 0),
(5, 'LUISA LISETH ', 'MEDINA JULCA', 7634523, NULL, NULL, '9763224356', 'usuario.jpg', 'ilove@gmail.com', 'inversionista', NULL, NULL, 0, 20, 3, 0),
(6, 'YESSICA ', 'BOCANEGRA HUAMAN', 7263434, NULL, NULL, '99878675', 'usuario.jpg', 'yess@gmail.com', 'inversionista', NULL, NULL, 0, 20, 1, 0),
(7, 'JUAN', 'FLORES AGIRRE', 8725736, NULL, NULL, '987675658', 'usuario.jpg', 'juanes@gmail.com', 'inversionista', NULL, NULL, 0, 10, 1, 0);

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
(3, 1, '2017-07-10', 'PAG000001', 'Bono de Regalia N - 1', '200', 1),
(3, 2, '2017-08-10', 'PAG000002', 'Bono de Regalia N - 2', '200', 1),
(3, 3, '2017-09-10', 'PAG000004', 'Bono de Regalia N - 3', '200', 1),
(3, 4, '2017-10-10', 'PAG0000003', 'Bono de Regalia N - 4', '200', 1),
(3, 5, '2017-11-10', 'PAG000009', 'Bono de Regalia N - 5', '200', 1),
(3, 6, '2017-12-10', 'jkhjhhgchgh', 'Bono de Regalia N - 6', '200', 1),
(4, 1, '2017-09-01', 'PAG00003', 'Bono de Regalia N - 1', '100', 1),
(4, 2, '2017-10-01', 'PAG000006', 'Bono de Regalia N - 2', '100', 1),
(4, 3, '2017-11-01', 'PAG00008', 'Bono de Regalia N - 3', '100', 1),
(4, 4, '2017-12-01', 'PAG0000012', 'Bono de Regalia N - 4', '100', 1),
(4, 5, '2018-01-01', 'PAG000004', 'Bono de Regalia N - 5', '100', 1),
(4, 6, '2018-02-01', 'PAG0000020', 'Bono de Regalia N - 6', '100', 1),
(5, 1, '2017-09-20', 'PAG00005', 'Bono de Regalia N - 1', '60', 1),
(5, 2, '2017-10-20', 'PAG000007', 'Bono de Regalia N - 2', '60', 1),
(5, 3, '2017-11-20', 'PAG000010', 'Bono de Regalia N - 3', '60', 1),
(5, 4, '2017-12-20', 'PAG00014', 'Bono de Regalia N - 4', '60', 1),
(5, 5, '2018-01-20', 'PAG000019', 'Bono de Regalia N - 5', '60', 1),
(5, 6, '2018-02-20', NULL, '', NULL, 0),
(6, 1, '2017-11-20', 'PAG000011', 'Bono de Regalia N - 1', '100', 1),
(6, 2, '2017-12-20', 'PAG000015', 'Bono de Regalia N - 2', '100', 1),
(6, 3, '2018-01-20', 'PAGO000020', 'Bono de Regalia N - 3', '100', 1),
(6, 4, '2018-02-20', NULL, '', NULL, 0),
(6, 5, '2018-03-20', NULL, '', NULL, 0),
(6, 6, '2018-04-20', NULL, '', NULL, 0),
(7, 1, '2018-01-20', 'PAG000002', 'Bono de Regalia N - 1', '60', 1),
(7, 2, '2018-02-20', NULL, '', NULL, 0),
(7, 3, '2018-03-20', NULL, '', NULL, 0),
(7, 4, '2018-04-20', NULL, '', NULL, 0),
(7, 5, '2018-05-20', NULL, '', NULL, 0),
(7, 6, '2018-06-20', NULL, '', NULL, 0),
(8, 1, '2018-02-10', 'PAG0000024', 'Bono de Regalia N - 1', '200', 1),
(8, 2, '2018-03-10', NULL, '', NULL, 0),
(8, 3, '2018-04-10', NULL, '', NULL, 0),
(8, 4, '2018-05-10', NULL, '', NULL, 0),
(8, 5, '2018-06-10', NULL, '', NULL, 0),
(8, 6, '2018-07-10', NULL, '', NULL, 0),
(10, 2, '2018-03-01', NULL, '', NULL, 0),
(10, 3, '2018-04-01', NULL, '', NULL, 0),
(10, 4, '2018-05-01', NULL, '', NULL, 0),
(10, 5, '2018-06-01', NULL, '', NULL, 0),
(10, 6, '2018-07-01', NULL, '', NULL, 0),
(10, 7, '2018-08-01', NULL, '', NULL, 0),
(11, 1, '2018-02-10', 'PAG0000025', 'Bono de Regalia N - 1', '200', 1),
(11, 2, '2018-03-10', NULL, '', NULL, 0),
(11, 3, '2018-04-10', NULL, '', NULL, 0),
(11, 4, '2018-05-10', NULL, '', NULL, 0),
(11, 5, '2018-06-10', NULL, '', NULL, 0),
(11, 6, '2018-07-10', NULL, '', NULL, 0);

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
  MODIFY `idactualizar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_bono_afiliacion`
--
ALTER TABLE `tb_bono_afiliacion`
  MODIFY `idbonoafiliacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_inversion`
--
ALTER TABLE `tb_inversion`
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

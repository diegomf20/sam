-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2018 a las 17:55:11
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inicial`
--

CREATE TABLE `tb_inicial` (
  `idinversionista` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
(1, 59, '200', NULL, NULL, 1),
(2, 43, '200', NULL, NULL, 1),
(3, 43, '200', NULL, NULL, 1),
(4, 43, '200', NULL, NULL, 1),
(5, 41, '200', NULL, NULL, 1),
(6, 41, '200', NULL, NULL, 1),
(7, 41, '200', NULL, NULL, 1),
(8, 41, '200', NULL, NULL, 1),
(9, 41, '200', NULL, NULL, 1),
(10, 41, '200', NULL, NULL, 1),
(11, 41, '200', NULL, NULL, 1),
(12, 48, '200', NULL, NULL, 1),
(13, 48, '200', NULL, NULL, 1),
(14, 48, '200', NULL, NULL, 1),
(15, 48, '200', NULL, NULL, 1),
(16, 48, '200', NULL, NULL, 1),
(17, 48, '200', NULL, NULL, 1),
(18, 58, '200', NULL, NULL, 1),
(19, 44, '200', NULL, NULL, 1),
(20, 46, '600', NULL, NULL, 1),
(21, 66, '600', NULL, NULL, 1),
(22, 63, '0', NULL, NULL, 1),
(23, 65, '0', NULL, NULL, 1),
(24, 64, '0', NULL, NULL, 1),
(25, 60, '0', NULL, NULL, 1),
(26, 62, '0', NULL, NULL, 1),
(27, 61, '0', NULL, NULL, 1),
(28, 49, '0', NULL, NULL, 1),
(29, 54, '200', NULL, NULL, 1),
(30, 57, '200', NULL, NULL, 1),
(31, 51, '100', NULL, NULL, 1),
(32, 56, '200', NULL, NULL, 1),
(33, 53, '200', '789654123365', '2018-01-30', 1),
(34, 67, '600', 'T014557', '2018-01-30', 1);

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
  `numeroafiliados` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_inversionista`
--

INSERT INTO `tb_inversionista` (`idinversionista`, `nombres`, `apellidos`, `dni`, `direccion`, `ciudad`, `celular`, `imagen`, `email`, `contrasenia`, `banco`, `numerocuenta`, `rango`, `diapago`, `numeroafiliados`) VALUES
(41, 'Diego', 'Mendoza', 77382978, NULL, NULL, '95994785', 'usuario.jpg', 'diego@gmail.com', 'inversionista', NULL, NULL, 0, 29, 0),
(43, 'Larri', 'Mendoza', 77382978, NULL, NULL, '95994785', 'usuario.jpg', 'larri@gmail.com', 'inversionista', NULL, NULL, 0, NULL, 0),
(44, 'diego', 'francisco', 7895, NULL, NULL, '5656', 'usuario.jpg', 'diegomef@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0),
(46, 'dieog', 'jkjn', 6656, NULL, NULL, 'jkn', 'usuario.jpg', 'jnjkn', 'inversionista', NULL, NULL, 0, 1, 0),
(48, '', '', 0, NULL, NULL, '', 'usuario.jpg', '', 'inversionista', NULL, NULL, 0, 1, 0),
(49, 'jjkn', 'jnjkn', 555, NULL, NULL, '', 'usuario.jpg', 'jnjknjn', 'inversionista', NULL, NULL, 0, 1, 0),
(51, 'jjkn', 'jnjkn', 555, NULL, NULL, '', 'usuario.jpg', '55551', 'inversionista', NULL, NULL, 0, 1, 0),
(53, 'jjkn', 'jnjkn', 555, NULL, NULL, '', 'usuario.jpg', 'die', 'inversionista', NULL, NULL, 0, 1, 0),
(54, 'ajhsjk', 'jkhjk', 7755, NULL, NULL, '', 'usuario.jpg', 'ppp', 'inversionista', NULL, NULL, 0, 1, 0),
(55, 'ajhsjk', 'jkhjk', 7755, NULL, NULL, '', 'usuario.jpg', 'asas', 'inversionista', NULL, NULL, 0, NULL, 0),
(56, 'ajhsjk', 'jkhjk', 7755, NULL, NULL, '', 'usuario.jpg', 'locas', 'inversionista', NULL, NULL, 0, 1, 0),
(57, 'ajhsjk', 'jkhjk', 7755, NULL, NULL, '', 'usuario.jpg', 'locos', 'inversionista', NULL, NULL, 0, 1, 0),
(58, 'Diego Francisco', 'Mendoza Frias', 77382978, '', '', '949864720', 'usuario2.jpg', 'diegomf.mendoza@gmail.com', 'diegomf', 'Banco del Credito', 78974, 1, 1, 2),
(59, 'Diego Francisco', 'Mendoza Frias', 77382978, NULL, NULL, '949865557', 'usuario.jpg', 'diegomf.mndoza@gmail.com', 'inversionista', NULL, NULL, 1, NULL, 0),
(60, 'Larri', 'Medianero', 78845, NULL, NULL, '54654', 'usuario.jpg', 'larrim@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0),
(61, 'hpohhl', 'lhljhlkhlh', 33541351, NULL, NULL, '515135', 'usuario.jpg', 'kljhlkjhlk', 'inversionista', NULL, NULL, 0, 1, 0),
(62, 'Luisa Liseth', 'Medina Julca', 7784521, NULL, NULL, '5554', 'usuario.jpg', 'ilove@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0),
(63, 'gjg', 'jhgjkhg', 58544, NULL, NULL, '55', 'usuario.jpg', 'kjhgkjhg', 'inversionista', NULL, NULL, 0, 1, 0),
(64, 'jyhjjhhj', 'hhjkhjk', 561451, NULL, NULL, '9532', 'usuario.jpg', 'ahjhjs', 'inversionista', NULL, NULL, 0, 1, 0),
(65, 'hola', 'hola2', 9855, NULL, NULL, '4551', 'usuario.jpg', 'hola@', 'inversionista', NULL, NULL, 0, 1, 0),
(66, 'sadsad', 'sadsad', 5451, NULL, NULL, '55', 'usuario.jpg', 'asdas', 'inversionista', NULL, NULL, 0, 1, 0),
(67, 'Luis tucunango', 'Carrasco', 77845, NULL, NULL, '565', 'usuario.jpg', 'luis@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0),
(68, 'Presley', 'Romero de la cruz', 842354, NULL, NULL, '845454', 'usuario.jpg', 'edgar@gmail.com', 'inversionista', NULL, NULL, 0, NULL, 0);

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
(1, 1, '2018-03-01', '', NULL, 0),
(1, 2, '2018-04-01', '', NULL, 0),
(1, 3, '2018-05-01', '', NULL, 0),
(1, 4, '2018-06-01', '', NULL, 0),
(1, 5, '2018-07-01', '', NULL, 0),
(1, 6, '2018-08-01', '', NULL, 0),
(3, 1, '2018-03-01', '', NULL, 0),
(3, 2, '2018-04-01', '', NULL, 0),
(3, 3, '2018-05-01', '', NULL, 0),
(3, 4, '2018-06-01', '', NULL, 0),
(3, 5, '2018-07-01', '', NULL, 0),
(3, 6, '2018-08-01', '', NULL, 0),
(4, 1, '2018-03-01', '', NULL, 0),
(4, 2, '2018-04-01', '', NULL, 0),
(4, 3, '2018-05-01', '', NULL, 0),
(4, 4, '2018-06-01', '', NULL, 0),
(4, 5, '2018-07-01', '', NULL, 0),
(4, 6, '2018-08-01', '', NULL, 0),
(5, 1, '2018-03-01', '', NULL, 0),
(5, 2, '2018-04-01', '', NULL, 0),
(5, 3, '2018-05-01', '', NULL, 0),
(5, 4, '2018-06-01', '', NULL, 0),
(5, 5, '2018-07-01', '', NULL, 0),
(5, 6, '2018-08-01', '', NULL, 0),
(6, 1, '2018-03-01', '', NULL, 0),
(6, 2, '2018-04-01', '', NULL, 0),
(6, 3, '2018-05-01', '', NULL, 0),
(6, 4, '2018-06-01', '', NULL, 0),
(6, 5, '2018-07-01', '', NULL, 0),
(6, 6, '2018-08-01', '', NULL, 0),
(7, 1, '2018-03-01', '', NULL, 0),
(7, 2, '2018-04-01', '', NULL, 0),
(7, 3, '2018-05-01', '', NULL, 0),
(7, 4, '2018-06-01', '', NULL, 0),
(7, 5, '2018-07-01', '', NULL, 0),
(7, 6, '2018-08-01', '', NULL, 0),
(8, 1, '2018-03-01', '', NULL, 0),
(8, 2, '2018-04-01', '', NULL, 0),
(8, 3, '2018-05-01', '', NULL, 0),
(8, 4, '2018-06-01', '', NULL, 0),
(8, 5, '2018-07-01', '', NULL, 0),
(8, 6, '2018-08-01', '', NULL, 0),
(9, 1, '2018-03-01', '', NULL, 0),
(9, 2, '2018-04-01', '', NULL, 0),
(9, 3, '2018-05-01', '', NULL, 0),
(9, 4, '2018-06-01', '', NULL, 0),
(9, 5, '2018-07-01', '', NULL, 0),
(9, 6, '2018-08-01', '', NULL, 0),
(10, 1, '2018-03-01', '', NULL, 0),
(10, 2, '2018-04-01', '', NULL, 0),
(10, 3, '2018-05-01', '', NULL, 0),
(10, 4, '2018-06-01', '', NULL, 0),
(10, 5, '2018-07-01', '', NULL, 0),
(10, 6, '2018-08-01', '', NULL, 0),
(11, 1, '2018-03-01', '', NULL, 0),
(11, 2, '2018-04-01', '', NULL, 0),
(11, 3, '2018-05-01', '', NULL, 0),
(11, 4, '2018-06-01', '', NULL, 0),
(11, 5, '2018-07-01', '', NULL, 0),
(11, 6, '2018-08-01', '', NULL, 0),
(12, 1, '2018-03-01', '', NULL, 0),
(12, 2, '2018-04-01', '', NULL, 0),
(12, 3, '2018-05-01', '', NULL, 0),
(12, 4, '2018-06-01', '', NULL, 0),
(12, 5, '2018-07-01', '', NULL, 0),
(12, 6, '2018-08-01', '', NULL, 0),
(13, 1, '2018-03-01', '', NULL, 0),
(13, 2, '2018-04-01', '', NULL, 0),
(13, 3, '2018-05-01', '', NULL, 0),
(13, 4, '2018-06-01', '', NULL, 0),
(13, 5, '2018-07-01', '', NULL, 0),
(13, 6, '2018-08-01', '', NULL, 0),
(14, 1, '2018-03-01', '', NULL, 0),
(14, 2, '2018-04-01', '', NULL, 0),
(14, 3, '2018-05-01', '', NULL, 0),
(14, 4, '2018-06-01', '', NULL, 0),
(14, 5, '2018-07-01', '', NULL, 0),
(14, 6, '2018-08-01', '', NULL, 0),
(15, 1, '2018-03-01', '', NULL, 0),
(15, 2, '2018-04-01', '', NULL, 0),
(15, 3, '2018-05-01', '', NULL, 0),
(15, 4, '2018-06-01', '', NULL, 0),
(15, 5, '2018-07-01', '', NULL, 0),
(15, 6, '2018-08-01', '', NULL, 0),
(16, 1, '2018-03-01', '', NULL, 0),
(16, 2, '2018-04-01', '', NULL, 0),
(16, 3, '2018-05-01', '', NULL, 0),
(16, 4, '2018-06-01', '', NULL, 0),
(16, 5, '2018-07-01', '', NULL, 0),
(16, 6, '2018-08-01', '', NULL, 0),
(17, 1, '2018-03-01', '', NULL, 0),
(17, 2, '2018-04-01', '', NULL, 0),
(17, 3, '2018-05-01', '', NULL, 0),
(17, 4, '2018-06-01', '', NULL, 0),
(17, 5, '2018-07-01', '', NULL, 0),
(17, 6, '2018-08-01', '', NULL, 0),
(18, 1, '2018-03-01', '', NULL, 0),
(18, 2, '2018-04-01', '', NULL, 0),
(18, 3, '2018-05-01', '', NULL, 0),
(18, 4, '2018-06-01', '', NULL, 0),
(18, 5, '2018-07-01', '', NULL, 0),
(18, 6, '2018-08-01', '', NULL, 0),
(19, 1, '2018-03-01', '', NULL, 0),
(19, 2, '2018-04-01', '', NULL, 0),
(19, 3, '2018-05-01', '', NULL, 0),
(19, 4, '2018-06-01', '', NULL, 0),
(19, 5, '2018-07-01', '', NULL, 0),
(19, 6, '2018-08-01', '', NULL, 0),
(20, 1, '2018-03-01', '', NULL, 0),
(20, 2, '2018-04-01', '', NULL, 0),
(20, 3, '2018-05-01', '', NULL, 0),
(20, 4, '2018-06-01', '', NULL, 0),
(20, 5, '2018-07-01', '', NULL, 0),
(20, 6, '2018-08-01', '', NULL, 0),
(21, 1, '2018-03-01', '', NULL, 0),
(21, 2, '2018-04-01', '', NULL, 0),
(21, 3, '2018-05-01', '', NULL, 0),
(21, 4, '2018-06-01', '', NULL, 0),
(21, 5, '2018-07-01', '', NULL, 0),
(21, 6, '2018-08-01', '', NULL, 0),
(22, 1, '2018-03-01', '', NULL, 0),
(22, 2, '2018-04-01', '', NULL, 0),
(22, 3, '2018-05-01', '', NULL, 0),
(22, 4, '2018-06-01', '', NULL, 0),
(22, 5, '2018-07-01', '', NULL, 0),
(22, 6, '2018-08-01', '', NULL, 0),
(23, 1, '2018-03-01', '', NULL, 0),
(23, 2, '2018-04-01', '', NULL, 0),
(23, 3, '2018-05-01', '', NULL, 0),
(23, 4, '2018-06-01', '', NULL, 0),
(23, 5, '2018-07-01', '', NULL, 0),
(23, 6, '2018-08-01', '', NULL, 0),
(24, 1, '2018-03-01', '', NULL, 0),
(24, 2, '2018-04-01', '', NULL, 0),
(24, 3, '2018-05-01', '', NULL, 0),
(24, 4, '2018-06-01', '', NULL, 0),
(24, 5, '2018-07-01', '', NULL, 0),
(24, 6, '2018-08-01', '', NULL, 0),
(25, 1, '2018-03-01', '', NULL, 0),
(25, 2, '2018-04-01', '', NULL, 0),
(25, 3, '2018-05-01', '', NULL, 0),
(25, 4, '2018-06-01', '', NULL, 0),
(25, 5, '2018-07-01', '', NULL, 0),
(25, 6, '2018-08-01', '', NULL, 0),
(26, 1, '2018-03-01', '', NULL, 0),
(26, 2, '2018-04-01', '', NULL, 0),
(26, 3, '2018-05-01', '', NULL, 0),
(26, 4, '2018-06-01', '', NULL, 0),
(26, 5, '2018-07-01', '', NULL, 0),
(26, 6, '2018-08-01', '', NULL, 0),
(27, 1, '2018-03-01', '', NULL, 0),
(27, 2, '2018-04-01', '', NULL, 0),
(27, 3, '2018-05-01', '', NULL, 0),
(27, 4, '2018-06-01', '', NULL, 0),
(27, 5, '2018-07-01', '', NULL, 0),
(27, 6, '2018-08-01', '', NULL, 0),
(28, 1, '2018-03-01', '', NULL, 0),
(28, 2, '2018-04-01', '', NULL, 0),
(28, 3, '2018-05-01', '', NULL, 0),
(28, 4, '2018-06-01', '', NULL, 0),
(28, 5, '2018-07-01', '', NULL, 0),
(28, 6, '2018-08-01', '', NULL, 0),
(29, 1, '2018-03-01', '', NULL, 0),
(29, 2, '2018-04-01', '', NULL, 0),
(29, 3, '2018-05-01', '', NULL, 0),
(29, 4, '2018-06-01', '', NULL, 0),
(29, 5, '2018-07-01', '', NULL, 0),
(29, 6, '2018-08-01', '', NULL, 0),
(30, 1, '2018-03-01', '', NULL, 0),
(30, 2, '2018-04-01', '', NULL, 0),
(30, 3, '2018-05-01', '', NULL, 0),
(30, 4, '2018-06-01', '', NULL, 0),
(30, 5, '2018-07-01', '', NULL, 0),
(30, 6, '2018-08-01', '', NULL, 0),
(31, 1, '2018-03-01', '', NULL, 0),
(31, 2, '2018-04-01', '', NULL, 0),
(31, 3, '2018-05-01', '', NULL, 0),
(31, 4, '2018-06-01', '', NULL, 0),
(31, 5, '2018-07-01', '', NULL, 0),
(31, 6, '2018-08-01', '', NULL, 0),
(32, 1, '2018-03-01', '', NULL, 0),
(32, 2, '2018-04-01', '', NULL, 0),
(32, 3, '2018-05-01', '', NULL, 0),
(32, 4, '2018-06-01', '', NULL, 0),
(32, 5, '2018-07-01', '', NULL, 0),
(32, 6, '2018-08-01', '', NULL, 0),
(33, 1, '2018-03-01', '', NULL, 0),
(33, 2, '2018-04-01', '', NULL, 0),
(33, 3, '2018-05-01', '', NULL, 0),
(33, 4, '2018-06-01', '', NULL, 0),
(33, 5, '2018-07-01', '', NULL, 0),
(33, 6, '2018-08-01', '', NULL, 0),
(34, 1, '2018-03-01', '', NULL, 0),
(34, 2, '2018-04-01', '', NULL, 0),
(34, 3, '2018-05-01', '', NULL, 0),
(34, 4, '2018-06-01', '', NULL, 0),
(34, 5, '2018-07-01', '', NULL, 0),
(34, 6, '2018-08-01', '', NULL, 0);

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
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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

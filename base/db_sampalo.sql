-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2018 a las 17:48:38
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.1.13

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
(69, 73, 3, 1, '2018-01-31'),
(73, 86, 1, 1, '2018-02-01'),
(73, 87, 1, 1, '2018-02-01'),
(73, 88, 1, 1, '2018-02-01'),
(74, 89, 1, 1, '2018-02-01'),
(74, 90, 1, 1, '2018-02-01'),
(74, 91, 1, 1, '2018-02-01'),
(74, 92, 1, 1, '2018-02-01'),
(74, 93, 1, 1, '2018-02-01'),
(75, 94, 1, 1, '2018-02-01'),
(75, 95, 1, 1, '2018-02-01'),
(95, 96, 1, 1, '2018-02-01'),
(95, 97, 1, 1, '2018-02-01'),
(96, 98, 1, 1, '2018-02-01'),
(96, 99, 1, 1, '2018-02-01'),
(99, 100, 1, 1, '2018-02-01'),
(99, 101, 1, 1, '2018-02-01'),
(101, 102, 1, 1, '2018-02-01'),
(102, 103, 1, 1, '2018-02-01'),
(101, 103, 2, 1, '2018-02-01'),
(99, 103, 3, 1, '2018-02-01'),
(99, 102, 2, 1, '2018-02-01'),
(96, 102, 3, 1, '2018-02-01'),
(96, 101, 2, 1, '2018-02-01'),
(95, 101, 3, 1, '2018-02-01'),
(96, 100, 2, 1, '2018-02-01'),
(95, 100, 3, 1, '2018-02-01'),
(95, 99, 2, 1, '2018-02-01'),
(75, 99, 3, 1, '2018-02-01'),
(95, 98, 2, 1, '2018-02-01'),
(75, 98, 3, 1, '2018-02-01'),
(75, 97, 2, 1, '2018-02-01'),
(75, 96, 2, 1, '2018-02-01'),
(72, 88, 2, 1, '2018-02-01'),
(70, 88, 3, 1, '2018-02-01'),
(72, 87, 2, 1, '2018-02-01'),
(70, 87, 3, 1, '2018-02-01'),
(72, 86, 2, 1, '2018-02-01'),
(70, 86, 3, 1, '2018-02-01'),
(69, 104, 1, 0, NULL);

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
(73, '2018-01-31'),
(74, '2018-02-01'),
(75, '2018-02-01'),
(76, '2018-02-01'),
(77, '2018-02-01'),
(78, '2018-02-01'),
(80, '2018-02-01'),
(86, '2018-02-01'),
(87, '2018-02-01'),
(88, '2018-02-01'),
(89, '2018-02-01'),
(90, '2018-02-01'),
(91, '2018-02-01'),
(92, '2018-02-01'),
(93, '2018-02-01'),
(94, '2018-02-01'),
(95, '2018-02-01'),
(96, '2018-02-01'),
(97, '2018-02-01'),
(98, '2018-02-01'),
(99, '2018-02-01'),
(100, '2018-02-01'),
(101, '2018-02-01'),
(102, '2018-02-01'),
(103, '2018-02-01');

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
(53, 73, '500', 'qqq', '2018-01-31', 1),
(54, 103, '500', '1212', '2018-02-01', 1),
(55, 102, '500', 'asdf', '2018-02-01', 1),
(56, 101, '500', 'asdf', '2018-02-01', 1),
(57, 100, '1000', '12', '2018-02-01', 1),
(58, 99, '5000', '12', '2018-02-01', 1),
(59, 98, '2000', '23', '2018-02-01', 1),
(60, 97, '800', '12', '2018-02-01', 1),
(61, 96, '3000', '23', '2018-02-01', 1),
(62, 95, '2500', '23', '2018-02-01', 1),
(63, 94, '5000', '234', '2018-02-01', 1),
(64, 93, '6000', '34', '2018-02-01', 1),
(65, 92, '8000', '23', '2018-02-01', 1),
(66, 91, '6000', '23', '2018-02-01', 1),
(67, 90, '1500', 'kj', '2018-02-01', 1),
(68, 89, '6000', '', '2018-02-01', 1),
(69, 88, '6500', '12', '2018-02-01', 1),
(70, 87, '1000', '', '2018-02-01', 1),
(71, 86, '2000', 'jg', '2018-02-01', 1),
(72, 80, '6000', 'hag', '2018-02-01', 1),
(73, 78, '8000', '12', '2018-02-01', 1),
(74, 77, '600', '', '2018-02-01', 1),
(75, 76, '0', '', '2018-02-01', 1),
(76, 75, '100', '2', '2018-02-01', 1),
(77, 74, '4500', 'uty', '2018-02-01', 1);

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
(73, 'Damaris', 'Medina Julca', 7556541, NULL, NULL, '4456', 'usuario.jpg', 'damaris.lalechuza@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(74, 'lechuza ', 'medina julca', 123123, NULL, NULL, '123122413', 'usuario.jpg', 'medicina@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(75, 'lisha', 'montoya dias ', 0, NULL, NULL, '', 'usuario.jpg', 'quinta@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(76, 'romero ', 'homero ', 0, NULL, NULL, '', 'usuario.jpg', 'quinta_q_rayos@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(77, 'lucho ', 'tuqui tuqui', 12, NULL, NULL, '', 'usuario.jpg', 'hola ', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(78, 'quinta', 'rayos ', 121212, NULL, NULL, '', 'usuario.jpg', '1', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(80, 'pancho ', 'medina julca', 12, NULL, NULL, '1', 'usuario.jpg', '12', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(86, 'mama', 'mdeina julca', 123, NULL, NULL, '', 'usuario.jpg', 'mama', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(87, 'papa', 'medina julca', 1231234, NULL, NULL, '', 'usuario.jpg', '123', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(88, 'hermana ', 'medina julca', 12, NULL, NULL, '', 'usuario.jpg', 'hermana', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(89, 'abuelos', 'medina ', 12, NULL, NULL, '', 'usuario.jpg', 'julca', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(90, 'jirafa ', 'muuu', 123123123, NULL, NULL, '', 'usuario.jpg', '1234567', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(91, 'juan ', 'alcalde ', 123787, NULL, NULL, '', 'usuario.jpg', 'juan', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(92, 'jose ', 'rojas', 1298, NULL, NULL, '', 'usuario.jpg', 'jose', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(93, 'carito ', 'salirosas', 987, NULL, NULL, '', 'usuario.jpg', 'caro', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(94, 'lesli ', 'quinta ', 2323, NULL, NULL, '', 'usuario.jpg', 'lesli', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(95, 'sandra ', 'malca', 12131, NULL, NULL, '', 'usuario.jpg', 'sandra', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(96, 'cody ', 'malca', 8787, NULL, NULL, '', 'usuario.jpg', 'cody', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(97, 'carlos ', 'alcantara ', 12676, NULL, NULL, '', 'usuario.jpg', 'carlos ', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(98, 'daniel ', 'dias ', 12, NULL, NULL, '', 'usuario.jpg', 'daniel ', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(99, 'jon', 'jodido ', 7876, NULL, NULL, '', 'usuario.jpg', 'jon ', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(100, 'karen ', 'ferre', 12, NULL, NULL, '', 'usuario.jpg', 'karen ', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(101, 'karla', 'de romero ', 1, NULL, NULL, '', 'usuario.jpg', 'karla', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(102, 'policia ', 'xd ', 0, NULL, NULL, '', 'usuario.jpg', 'policia', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(103, 'lazaro ', 'levnatate ', 0, NULL, NULL, '', 'usuario.jpg', 'lazaro', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(104, 'enana', ' jifara ', 12313, NULL, NULL, '', 'usuario.jpg', 'enana', 'inversionista', NULL, NULL, 0, NULL, 0, 0);

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
(36, 1, '2018-01-20', '', '120', 1),
(36, 2, '2018-04-01', '', NULL, 0),
(36, 3, '2018-05-01', '', NULL, 0),
(36, 4, '2018-06-01', '', NULL, 0),
(36, 5, '2018-07-01', '', NULL, 0),
(36, 6, '2018-08-01', '', NULL, 0),
(47, 1, '2018-03-01', '', NULL, 0),
(47, 2, '2018-04-01', '', NULL, 0),
(47, 3, '2018-05-01', '', NULL, 0),
(50, 1, '2018-03-01', '', '1000', 1),
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
(53, 6, '2018-08-01', '', NULL, 0),
(54, 1, '2018-03-01', '', NULL, 0),
(54, 2, '2018-04-01', '', NULL, 0),
(54, 3, '2018-05-01', '', NULL, 0),
(54, 4, '2018-06-01', '', NULL, 0),
(54, 5, '2018-07-01', '', NULL, 0),
(54, 6, '2018-08-01', '', NULL, 0),
(55, 1, '2018-03-01', '', NULL, 0),
(55, 2, '2018-04-01', '', NULL, 0),
(55, 3, '2018-05-01', '', NULL, 0),
(55, 4, '2018-06-01', '', NULL, 0),
(55, 5, '2018-07-01', '', NULL, 0),
(55, 6, '2018-08-01', '', NULL, 0),
(56, 1, '2018-03-01', '', NULL, 0),
(56, 2, '2018-04-01', '', NULL, 0),
(56, 3, '2018-05-01', '', NULL, 0),
(56, 4, '2018-06-01', '', NULL, 0),
(56, 5, '2018-07-01', '', NULL, 0),
(56, 6, '2018-08-01', '', NULL, 0),
(57, 1, '2018-03-01', '', NULL, 0),
(57, 2, '2018-04-01', '', NULL, 0),
(57, 3, '2018-05-01', '', NULL, 0),
(57, 4, '2018-06-01', '', NULL, 0),
(57, 5, '2018-07-01', '', NULL, 0),
(57, 6, '2018-08-01', '', NULL, 0),
(58, 1, '2018-03-01', 'hola', '200', 0),
(58, 2, '2018-04-01', '', NULL, 0),
(58, 3, '2018-05-01', '', NULL, 0),
(58, 4, '2018-06-01', '', NULL, 0),
(58, 5, '2018-07-01', '', NULL, 0),
(58, 6, '2018-08-01', '', NULL, 0),
(59, 1, '2018-03-01', '', NULL, 0),
(59, 2, '2018-04-01', '', NULL, 0),
(59, 3, '2018-05-01', '', NULL, 0),
(59, 4, '2018-06-01', '', NULL, 0),
(59, 5, '2018-07-01', '', NULL, 0),
(59, 6, '2018-08-01', '', NULL, 0),
(60, 1, '2018-03-01', '', NULL, 0),
(60, 2, '2018-04-01', '', NULL, 0),
(60, 3, '2018-05-01', '', NULL, 0),
(60, 4, '2018-06-01', '', NULL, 0),
(60, 5, '2018-07-01', '', NULL, 0),
(60, 6, '2018-08-01', '', NULL, 0),
(61, 1, '2018-03-01', '', NULL, 0),
(61, 2, '2018-04-01', '', NULL, 0),
(61, 3, '2018-05-01', '', NULL, 0),
(61, 4, '2018-06-01', '', NULL, 0),
(61, 5, '2018-07-01', '', NULL, 0),
(61, 6, '2018-08-01', '', NULL, 0),
(62, 1, '2018-03-01', '', NULL, 0),
(62, 2, '2018-04-01', '', NULL, 0),
(62, 3, '2018-05-01', '', NULL, 0),
(62, 4, '2018-06-01', '', NULL, 0),
(62, 5, '2018-07-01', '', NULL, 0),
(62, 6, '2018-08-01', '', NULL, 0),
(63, 1, '2018-03-01', '', NULL, 0),
(63, 2, '2018-04-01', '', NULL, 0),
(63, 3, '2018-05-01', '', NULL, 0),
(63, 4, '2018-06-01', '', NULL, 0),
(63, 5, '2018-07-01', '', NULL, 0),
(63, 6, '2018-08-01', '', NULL, 0),
(64, 1, '2018-03-01', '', NULL, 0),
(64, 2, '2018-04-01', '', NULL, 0),
(64, 3, '2018-05-01', '', NULL, 0),
(64, 4, '2018-06-01', '', NULL, 0),
(64, 5, '2018-07-01', '', NULL, 0),
(64, 6, '2018-08-01', '', NULL, 0),
(65, 1, '2018-03-01', '', NULL, 0),
(65, 2, '2018-04-01', '', NULL, 0),
(65, 3, '2018-05-01', '', NULL, 0),
(65, 4, '2018-06-01', '', NULL, 0),
(65, 5, '2018-07-01', '', NULL, 0),
(65, 6, '2018-08-01', '', NULL, 0),
(66, 1, '2018-03-01', '', NULL, 0),
(66, 2, '2018-04-01', '', NULL, 0),
(66, 3, '2018-05-01', '', NULL, 0),
(66, 4, '2018-06-01', '', NULL, 0),
(66, 5, '2018-07-01', '', NULL, 0),
(66, 6, '2018-08-01', '', NULL, 0),
(67, 1, '2018-03-01', '', NULL, 0),
(67, 2, '2018-04-01', '', NULL, 0),
(67, 3, '2018-05-01', '', NULL, 0),
(67, 4, '2018-06-01', '', NULL, 0),
(67, 5, '2018-07-01', '', NULL, 0),
(67, 6, '2018-08-01', '', NULL, 0),
(68, 1, '2018-03-01', '', NULL, 0),
(68, 2, '2018-04-01', '', NULL, 0),
(68, 3, '2018-05-01', '', NULL, 0),
(68, 4, '2018-06-01', '', NULL, 0),
(68, 5, '2018-07-01', '', NULL, 0),
(68, 6, '2018-08-01', '', NULL, 0),
(69, 1, '2018-03-01', '', NULL, 0),
(69, 2, '2018-04-01', '', NULL, 0),
(69, 3, '2018-05-01', '', NULL, 0),
(69, 4, '2018-06-01', '', NULL, 0),
(69, 5, '2018-07-01', '', NULL, 0),
(69, 6, '2018-08-01', '', NULL, 0),
(70, 1, '2018-03-01', '', NULL, 0),
(70, 2, '2018-04-01', '', NULL, 0),
(70, 3, '2018-05-01', '', NULL, 0),
(70, 4, '2018-06-01', '', NULL, 0),
(70, 5, '2018-07-01', '', NULL, 0),
(70, 6, '2018-08-01', '', NULL, 0),
(71, 1, '2018-03-01', '', NULL, 0),
(71, 2, '2018-04-01', '', NULL, 0),
(71, 3, '2018-05-01', '', NULL, 0),
(71, 4, '2018-06-01', '', NULL, 0),
(71, 5, '2018-07-01', '', NULL, 0),
(71, 6, '2018-08-01', '', NULL, 0),
(72, 1, '2018-03-01', '', NULL, 0),
(72, 2, '2018-04-01', '', NULL, 0),
(72, 3, '2018-05-01', '', NULL, 0),
(72, 4, '2018-06-01', '', NULL, 0),
(72, 5, '2018-07-01', '', NULL, 0),
(72, 6, '2018-08-01', '', NULL, 0),
(73, 1, '2018-03-01', '', NULL, 0),
(73, 2, '2018-04-01', '', NULL, 0),
(73, 3, '2018-05-01', '', NULL, 0),
(73, 4, '2018-06-01', '', NULL, 0),
(73, 5, '2018-07-01', '', NULL, 0),
(73, 6, '2018-08-01', '', NULL, 0),
(74, 1, '2018-03-01', '', NULL, 0),
(74, 2, '2018-04-01', '', NULL, 0),
(74, 3, '2018-05-01', '', NULL, 0),
(74, 4, '2018-06-01', '', NULL, 0),
(74, 5, '2018-07-01', '', NULL, 0),
(74, 6, '2018-08-01', '', NULL, 0),
(75, 1, '2018-03-01', '', NULL, 0),
(75, 2, '2018-04-01', '', NULL, 0),
(75, 3, '2018-05-01', '', NULL, 0),
(75, 4, '2018-06-01', '', NULL, 0),
(75, 5, '2018-07-01', '', NULL, 0),
(75, 6, '2018-08-01', '', NULL, 0),
(76, 1, '2018-03-01', '', NULL, 0),
(76, 2, '2018-04-01', '', NULL, 0),
(76, 3, '2018-05-01', '', NULL, 0),
(76, 4, '2018-06-01', '', NULL, 0),
(76, 5, '2018-07-01', '', NULL, 0),
(76, 6, '2018-08-01', '', NULL, 0),
(77, 1, '2018-03-01', '', NULL, 0),
(77, 2, '2018-04-01', '', NULL, 0),
(77, 3, '2018-05-01', '', NULL, 0),
(77, 4, '2018-06-01', '', NULL, 0),
(77, 5, '2018-07-01', '', NULL, 0),
(77, 6, '2018-08-01', '', NULL, 0);

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
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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

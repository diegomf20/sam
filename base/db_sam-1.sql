-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2018 a las 16:16:39
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
(1, 3, 1, 1, '2017-08-23'),
(1, 4, 1, 1, '2017-09-04'),
(1, 5, 1, 1, '2017-09-01'),
(1, 6, 1, 1, '2017-08-23'),
(1, 7, 1, 1, '2017-09-04'),
(1, 8, 1, 1, '2017-09-12'),
(1, 9, 1, 1, '2017-09-04'),
(1, 10, 1, 1, '2017-09-12'),
(1, 11, 1, 1, '2017-10-21'),
(1, 12, 1, 1, '2017-10-22'),
(1, 13, 1, 1, '2017-10-22'),
(3, 14, 1, 1, '2017-09-06'),
(3, 15, 1, 1, '2017-09-08'),
(3, 16, 1, 1, '2017-11-07'),
(3, 17, 1, 1, '2017-11-12'),
(3, 18, 1, 1, '2017-11-22'),
(3, 19, 1, 1, '2018-01-02'),
(3, 20, 1, 1, '2018-01-18'),
(14, 21, 1, 0, NULL),
(21, 22, 1, 0, NULL),
(21, 23, 1, 0, NULL),
(22, 24, 1, 0, NULL),
(24, 25, 1, 0, NULL),
(26, 27, 1, 1, '2017-09-21'),
(26, 28, 1, 1, '2017-09-25'),
(26, 29, 1, 1, '2017-10-03'),
(26, 30, 1, 1, '2017-10-17'),
(26, 31, 1, 1, '2017-12-20'),
(6, 32, 1, 0, NULL),
(6, 33, 1, 0, NULL),
(1, 33, 2, 0, NULL),
(1, 32, 2, 0, NULL),
(22, 25, 2, 0, NULL),
(21, 25, 3, 0, NULL),
(21, 24, 2, 0, NULL),
(14, 24, 3, 0, NULL),
(14, 23, 2, 0, NULL),
(3, 23, 3, 0, NULL),
(14, 22, 2, 0, NULL),
(3, 22, 3, 0, NULL),
(3, 21, 2, 0, NULL),
(1, 21, 3, 0, NULL),
(1, 20, 2, 1, '2018-01-18'),
(1, 19, 2, 1, '2018-01-02'),
(1, 18, 2, 1, '2017-11-22'),
(1, 17, 2, 1, '2017-11-12'),
(1, 16, 2, 1, '2017-11-07'),
(1, 15, 2, 1, '2017-09-08'),
(1, 14, 2, 1, '2017-09-06'),
(15, 36, 1, 0, NULL),
(1, 14, 2, 1, '2017-09-06'),
(1, 15, 2, 1, '2017-09-08'),
(1, 16, 2, 1, '2017-11-07'),
(1, 17, 2, 1, '2017-11-12'),
(1, 18, 2, 1, '2017-11-22'),
(1, 19, 2, 1, '2018-01-02'),
(1, 20, 2, 1, '2018-01-18');

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
(1, '2017-08-21'),
(3, '2017-08-23'),
(4, '2017-09-01'),
(5, '2017-09-01'),
(6, '2017-08-23'),
(7, '2017-09-04'),
(8, '2017-09-04'),
(9, '2017-09-04'),
(10, '2017-09-04'),
(11, '2017-10-21'),
(12, '2017-10-21'),
(13, '2017-10-21'),
(14, '2017-09-05'),
(15, '2017-09-05'),
(16, '2017-11-07'),
(17, '2017-11-12'),
(18, '2017-11-12'),
(19, '2018-01-02'),
(20, '2018-01-18'),
(26, '2017-09-11'),
(27, '2017-09-21'),
(28, '2017-09-21'),
(29, '2017-09-25'),
(30, '2017-10-15'),
(31, '2017-12-15');

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
(3, 1, '1000', 't-nÂ° 1', '2017-08-21', 1),
(4, 3, '500', 't-nÂ° 2', '2017-08-23', 1),
(5, 6, '300', 't-nÂ° 3', '2017-08-23', 1),
(6, 5, '500', 't-nÂ° 5', '2017-09-01', 1),
(7, 4, '300', 't-nÂ° 6', '2017-09-04', 1),
(8, 7, '200', 't-nÂ° 7 ', '2017-09-04', 1),
(9, 9, '200', 't-nÂ° 8', '2017-09-04', 1),
(10, 8, '300', 't-nÂ° 9', '2017-09-12', 1),
(11, 10, '200', 't-nÂ° 10', '2017-09-12', 1),
(12, 11, '500', '	t-nÂ° 11', '2017-10-21', 1),
(13, 12, '1000', '	t-nÂ° 12', '2017-10-22', 1),
(14, 13, '1000', '	t-nÂ° 12', '2017-10-22', 1),
(15, 14, '500', '	t-nÂ° 14', '2017-09-06', 1),
(16, 15, '300', '	t-nÂ° 15', '2017-09-08', 1),
(17, 26, '1000', '	t-nÂ° 1n', '2017-09-14', 1),
(18, 27, '200', '	t-nÂ° 1j', '2017-09-21', 1),
(19, 28, '500', '	t-nÂ° 1k', '2017-09-25', 1),
(20, 29, '200', '	t-nÂ° 1g', '2017-10-03', 1),
(21, 30, '500', '	t-nÂ° 1hj', '2017-10-17', 1),
(22, 31, '300', '	t-nÂ° 1h', '2017-12-20', 1),
(23, 16, '300', '	t-nÂ° 2hk', '2017-11-07', 1),
(24, 17, '200', '	t-nÂ° 2f', '2017-11-12', 1),
(25, 18, '1000', '	t-nÂ° 2u', '2017-11-22', 1),
(26, 19, '200', '	t-nÂ° 2yt', '2018-01-02', 1),
(27, 20, '300', '', '2018-01-18', 1);

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
(1, 'Luisa Liseth ', 'Medina Julca ', 12312312, NULL, NULL, '', 'usuario.jpg', 'ilove@gmail.com', 'inversionista', NULL, NULL, 4, 1, 0, 11),
(3, 'Damaris ', 'Medina Julca', 12121313, NULL, NULL, '', 'usuario.jpg', 'damaris.medicina@gmail.com', 'inversionista', NULL, NULL, 3, 1, 0, 7),
(4, 'Maria ', 'Rojas Vega', 12121214, NULL, NULL, '', 'usuario.jpg', 'maria_love@hotmail.com', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(5, 'Diego ', 'Mendoza Frias', 12121234, NULL, NULL, '', 'usuario.jpg', 'diegomf.mendoza@gmail.com', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(6, 'Yessica ', 'Montenegro Huaman', 12121213, NULL, NULL, '', 'usuario.jpg', 'peque_quimica@gmail.com', 'inversionista', NULL, NULL, 1, 1, 0, 0),
(7, 'manuel ', 'Damian  Guitieres ', 12121234, NULL, NULL, '', 'usuario.jpg', 'quimica@gmail.com', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(8, 'Jesus', 'Riojas Baca', 12121234, NULL, NULL, '', 'usuario.jpg', 'jesus', 'inversionista', NULL, NULL, 0, 20, 0, 0),
(9, 'carito', 'salirrosas vilches', 12121235, NULL, NULL, '', 'usuario.jpg', 'carito ', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(10, 'Almendra', 'Perez Romero ', 12121236, NULL, NULL, '', 'usuario.jpg', 'almendra ', 'inversionista', NULL, NULL, 0, 20, 0, 0),
(11, 'Gustavo ', 'Vega Correa', 12121236, NULL, NULL, '', 'usuario.jpg', 'gustabo', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(12, 'Romina ', 'Yovera Valdivia', 12121237, NULL, NULL, '', 'usuario.jpg', 'romina', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(13, 'Cesar ', 'Tucunango carrasco ', 12121238, NULL, NULL, '', 'usuario.jpg', 'cesar', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(14, 'Yadira ', 'Barboza Guevaron ', 12121241, NULL, NULL, '', 'usuario.jpg', 'yadira', 'inversionista', NULL, NULL, 4, 10, 0, 0),
(15, 'Selene ', 'Yovera Valdivia', 12121242, NULL, NULL, '', 'usuario.jpg', 'selene', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(16, 'Presley ', 'Romero de la Cruz', 12121243, NULL, NULL, '', 'usuario.jpg', 'romero', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(17, 'Alex ', 'Flores Vega', 12121244, NULL, NULL, '', 'usuario.jpg', 'alex', 'inversionista', NULL, NULL, 0, 20, 0, 0),
(18, 'Robil ', 'Vallejos Delgado ', 12121245, NULL, NULL, '', 'usuario.jpg', 'robin', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(19, 'Jose ', 'Astonitas Perez', 12121246, NULL, NULL, '', 'usuario.jpg', 'jose', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(20, 'Carlos ', 'Baca Mejia', 12121247, NULL, NULL, '', 'usuario.jpg', 'carlos', 'inversionista', NULL, NULL, 0, 20, 0, 0),
(21, 'Lazaro', 'Acosta Iparaque', 12121248, NULL, NULL, '', 'usuario.jpg', 'lazaro', 'inversionista', NULL, NULL, 1, 10, 0, 0),
(22, 'Edgar ', 'Cercado Perez', 12121251, NULL, NULL, '', 'usuario.jpg', 'edgar', 'inversionista', NULL, NULL, 4, 10, 0, 0),
(23, 'Willian ', 'Garcia Ilatoma', 12121241, NULL, NULL, '', 'usuario.jpg', 'willian ', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(24, 'Romain ', 'Cercado Riojas', 12121231, NULL, NULL, '', 'usuario.jpg', 'romain', 'inversionista', NULL, NULL, 4, 10, 0, 0),
(25, 'Elsa ', 'Chaves Malca', 121212123, NULL, NULL, '', 'usuario.jpg', 'elsa', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(26, 'Paul', 'Bustamante', 12121234, NULL, NULL, '', 'usuario.jpg', 'paul', 'inversionista', NULL, NULL, 2, 20, 0, 5),
(27, 'Nilver ', 'Larios Huaman ', 12343423, NULL, NULL, '', 'usuario.jpg', 'nilver', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(28, 'Grabiela', 'Solis Bances ', 343432434, NULL, NULL, '', 'usuario.jpg', 'bruja', 'inversionista', NULL, NULL, 0, 1, 0, 0),
(29, 'Karla ', 'Santamaria Herrera', 12345678, NULL, NULL, '', 'usuario.jpg', 'karla ', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(30, 'Kevin ', 'Alverca Gonsales ', 12345679, NULL, NULL, '', 'usuario.jpg', 'kevin', 'inversionista', NULL, NULL, 0, 20, 0, 0),
(31, 'Lyly ', 'Carranza Perez', 12345679, NULL, NULL, '', 'usuario.jpg', 'lyly', 'inversionista', NULL, NULL, 0, 20, 0, 0),
(32, 'Jans ', 'Collantes Vargas', 123456709, NULL, NULL, '', 'usuario.jpg', 'jans', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(33, 'Noeli', 'Bocanegra Huaman ', 124578576, NULL, NULL, '', 'usuario.jpg', 'noeli', 'inversionista', NULL, NULL, 0, 10, 0, 0),
(36, 'rolando ', 'mendoza yovera ', 2147483647, NULL, NULL, '', 'usuario.jpg', 'rolando', 'inversionista', NULL, NULL, 0, NULL, 0, 0);

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
(3, 1, '2017-10-01', '', NULL, 0),
(3, 2, '2017-11-01', '', NULL, 0),
(3, 3, '2017-12-01', '', NULL, 0),
(3, 4, '2018-01-01', '', NULL, 0),
(3, 5, '2018-02-01', '', NULL, 0),
(3, 6, '2018-03-01', '', NULL, 0),
(4, 1, '2017-10-01', '', NULL, 0),
(4, 2, '2017-11-01', '', NULL, 0),
(4, 3, '2017-12-01', '', NULL, 0),
(4, 4, '2018-01-01', '', NULL, 0),
(4, 5, '2018-02-01', '', NULL, 0),
(4, 6, '2018-03-01', '', NULL, 0),
(5, 1, '2017-10-01', '', NULL, 0),
(5, 2, '2017-11-01', '', NULL, 0),
(5, 3, '2017-12-01', '', NULL, 0),
(5, 4, '2018-01-01', '', NULL, 0),
(5, 5, '2018-02-01', '', NULL, 0),
(5, 6, '2018-03-01', '', NULL, 0),
(6, 1, '2017-10-01', '', NULL, 0),
(6, 2, '2017-11-01', '', NULL, 0),
(6, 3, '2017-12-01', '', NULL, 0),
(6, 4, '2018-01-01', '', NULL, 0),
(6, 5, '2018-02-01', '', NULL, 0),
(6, 6, '2018-03-01', '', NULL, 0),
(7, 1, '2017-10-10', '', NULL, 0),
(7, 2, '2017-11-10', '', NULL, 0),
(7, 3, '2017-12-10', '', NULL, 0),
(7, 4, '2018-01-10', '', NULL, 0),
(7, 5, '2018-02-10', '', NULL, 0),
(7, 6, '2018-03-10', '', NULL, 0),
(8, 1, '2017-10-10', '', NULL, 0),
(8, 2, '2017-11-10', '', NULL, 0),
(8, 3, '2017-12-10', '', NULL, 0),
(8, 4, '2018-01-10', '', NULL, 0),
(8, 5, '2018-02-10', '', NULL, 0),
(8, 6, '2018-03-10', '', NULL, 0),
(9, 1, '2017-10-10', '', NULL, 0),
(9, 2, '2017-11-10', '', NULL, 0),
(9, 3, '2017-12-10', '', NULL, 0),
(9, 4, '2018-01-10', '', NULL, 0),
(9, 5, '2018-02-10', '', NULL, 0),
(9, 6, '2018-03-10', '', NULL, 0),
(10, 1, '2017-10-20', '', NULL, 0),
(10, 2, '2017-11-20', '', NULL, 0),
(10, 3, '2017-12-20', '', NULL, 0),
(10, 4, '2018-01-20', '', NULL, 0),
(10, 5, '2018-02-20', '', NULL, 0),
(10, 6, '2018-03-20', '', NULL, 0),
(11, 1, '2017-10-20', '', NULL, 0),
(11, 2, '2017-11-20', '', NULL, 0),
(11, 3, '2017-12-20', '', NULL, 0),
(11, 4, '2018-01-20', '', NULL, 0),
(11, 5, '2018-02-20', '', NULL, 0),
(11, 6, '2018-03-20', '', NULL, 0),
(12, 1, '2017-12-01', '', NULL, 0),
(12, 2, '2018-01-01', '', NULL, 0),
(12, 3, '2018-02-01', '', NULL, 0),
(12, 4, '2018-03-01', '', NULL, 0),
(12, 5, '2018-04-01', '', NULL, 0),
(12, 6, '2018-05-01', '', NULL, 0),
(13, 1, '2017-12-01', '', NULL, 0),
(13, 2, '2018-01-01', '', NULL, 0),
(13, 3, '2018-02-01', '', NULL, 0),
(13, 4, '2018-03-01', '', NULL, 0),
(13, 5, '2018-04-01', '', NULL, 0),
(13, 6, '2018-05-01', '', NULL, 0),
(14, 1, '2017-12-01', '', NULL, 0),
(14, 2, '2018-01-01', '', NULL, 0),
(14, 3, '2018-02-01', '', NULL, 0),
(14, 4, '2018-03-01', '', NULL, 0),
(14, 5, '2018-04-01', '', NULL, 0),
(14, 6, '2018-05-01', '', NULL, 0),
(15, 1, '2017-10-10', '', NULL, 0),
(15, 2, '2017-11-10', '', NULL, 0),
(15, 3, '2017-12-10', '', NULL, 0),
(15, 4, '2018-01-10', '', NULL, 0),
(15, 5, '2018-02-10', '', NULL, 0),
(15, 6, '2018-03-10', '', NULL, 0),
(16, 1, '2017-10-10', '', NULL, 0),
(16, 2, '2017-11-10', '', NULL, 0),
(16, 3, '2017-12-10', '', NULL, 0),
(16, 4, '2018-01-10', '', NULL, 0),
(16, 5, '2018-02-10', '', NULL, 0),
(16, 6, '2018-03-10', '', NULL, 0),
(17, 1, '2017-10-20', '', NULL, 0),
(17, 2, '2017-11-20', '', NULL, 0),
(17, 3, '2017-12-20', '', NULL, 0),
(17, 4, '2018-01-20', '', NULL, 0),
(17, 5, '2018-02-20', '', NULL, 0),
(17, 6, '2018-03-20', '', NULL, 0),
(18, 1, '2017-11-01', '', NULL, 0),
(18, 2, '2017-12-01', '', NULL, 0),
(18, 3, '2018-01-01', '', NULL, 0),
(18, 4, '2018-02-01', '', NULL, 0),
(18, 5, '2018-03-01', '', NULL, 0),
(18, 6, '2018-04-01', '', NULL, 0),
(19, 1, '2017-11-01', '', NULL, 0),
(19, 2, '2017-12-01', '', NULL, 0),
(19, 3, '2018-01-01', '', NULL, 0),
(19, 4, '2018-02-01', '', NULL, 0),
(19, 5, '2018-03-01', '', NULL, 0),
(19, 6, '2018-04-01', '', NULL, 0),
(20, 1, '2017-11-10', '', NULL, 0),
(20, 2, '2017-12-10', '', NULL, 0),
(20, 3, '2018-01-10', '', NULL, 0),
(20, 4, '2018-02-10', '', NULL, 0),
(20, 5, '2018-03-10', '', NULL, 0),
(20, 6, '2018-04-10', '', NULL, 0),
(21, 1, '2017-11-20', '', NULL, 0),
(21, 2, '2017-12-20', '', NULL, 0),
(21, 3, '2018-01-20', '', NULL, 0),
(21, 4, '2018-02-20', '', NULL, 0),
(21, 5, '2018-03-20', '', NULL, 0),
(21, 6, '2018-04-20', '', NULL, 0),
(22, 1, '2018-01-20', '', NULL, 0),
(22, 2, '2018-02-20', '', NULL, 0),
(22, 3, '2018-03-20', '', NULL, 0),
(22, 4, '2018-04-20', '', NULL, 0),
(22, 5, '2018-05-20', '', NULL, 0),
(22, 6, '2018-06-20', '', NULL, 0),
(23, 1, '2017-12-10', '', NULL, 0),
(23, 2, '2018-01-10', '', NULL, 0),
(23, 3, '2018-02-10', '', NULL, 0),
(23, 4, '2018-03-10', '', NULL, 0),
(23, 5, '2018-04-10', '', NULL, 0),
(23, 6, '2018-05-10', '', NULL, 0),
(24, 1, '2017-12-20', '', NULL, 0),
(24, 2, '2018-01-20', '', NULL, 0),
(24, 3, '2018-02-20', '', NULL, 0),
(24, 4, '2018-03-20', '', NULL, 0),
(24, 5, '2018-04-20', '', NULL, 0),
(24, 6, '2018-05-20', '', NULL, 0),
(25, 1, '2018-01-01', '', NULL, 0),
(25, 2, '2018-02-01', '', NULL, 0),
(25, 3, '2018-03-01', '', NULL, 0),
(25, 4, '2018-04-01', '', NULL, 0),
(25, 5, '2018-05-01', '', NULL, 0),
(25, 6, '2018-06-01', '', NULL, 0),
(26, 1, '2018-02-10', '', NULL, 0),
(26, 2, '2018-03-10', '', NULL, 0),
(26, 3, '2018-04-10', '', NULL, 0),
(26, 4, '2018-05-10', '', NULL, 0),
(26, 5, '2018-06-10', '', NULL, 0),
(26, 6, '2018-07-10', '', NULL, 0),
(27, 1, '2018-02-20', '', NULL, 0),
(27, 2, '2018-03-20', '', NULL, 0),
(27, 3, '2018-04-20', '', NULL, 0),
(27, 4, '2018-05-20', '', NULL, 0),
(27, 5, '2018-06-20', '', NULL, 0),
(27, 6, '2018-07-20', '', NULL, 0);

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
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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

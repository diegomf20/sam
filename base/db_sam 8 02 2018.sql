-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2018 a las 19:11:56
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
(2, '2018-02-01');

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
  `bono` decimal(10,0) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT '0:procesando, 1 retirado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
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
  MODIFY `idactualizar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tb_bono_afiliacion`
--
ALTER TABLE `tb_bono_afiliacion`
  MODIFY `idbonoafiliacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tb_inversion`
--
ALTER TABLE `tb_inversion`
  MODIFY `idinversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tb_inversionista`
--
ALTER TABLE `tb_inversionista`
  MODIFY `idinversionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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

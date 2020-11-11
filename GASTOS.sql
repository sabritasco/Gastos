-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-11-2020 a las 11:08:36
-- Versión del servidor: 8.0.22-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `GASTOS`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEUDAS`
--

CREATE TABLE `DEUDAS` (
  `ID_DEUDA` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `ID_DEUDOR` int NOT NULL,
  `ID_TARJETA` int NOT NULL,
  `FECHA_DEUDA` date NOT NULL,
  `FEHCA_PRIMER_PAGO` date DEFAULT NULL,
  `FECHA_ULTIMO_PAGO` date DEFAULT NULL,
  `MONTO_MENSUALIDAD` float NOT NULL,
  `TOTAL_DEUDA` float DEFAULT NULL,
  `TITULO_DEUDA` varchar(150) NOT NULL,
  `NUMERO_PAGOS` int NOT NULL,
  `PAGOS_RESTANTES` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEUDORES`
--

CREATE TABLE `DEUDORES` (
  `ID_DEUDOR` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(60) NOT NULL,
  `CELULAR` varchar(15) NOT NULL,
  `CREADO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GASTOS`
--

CREATE TABLE `GASTOS` (
  `ID_CARGO` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `ID_DEUDOR` int NOT NULL,
  `ID_TARJETA` int DEFAULT NULL,
  `TITULO_CARGO` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FECHA_CARGO` date NOT NULL,
  `VALOR_CARGO` float NOT NULL,
  `FECHA_LIQUIDACION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TARJETAS`
--

CREATE TABLE `TARJETAS` (
  `ID_TARJETA` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `TERMINACION` int NOT NULL,
  `IDENTIFICADOR` varchar(50) NOT NULL,
  `TIPO` varchar(7) NOT NULL,
  `LIMITE_CREDITO` int DEFAULT NULL,
  `FECHA_CORTE` int DEFAULT NULL,
  `SALDO` float DEFAULT NULL,
  `VENCIMIENTO` varchar(7) NOT NULL,
  `INSTITUCION` varchar(30) NOT NULL,
  `TEL_INSTITUCION` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `ID_USUARIO` int UNSIGNED NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(60) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `FOTO` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CREADO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DEUDAS`
--
ALTER TABLE `DEUDAS`
  ADD PRIMARY KEY (`ID_DEUDA`);

--
-- Indices de la tabla `DEUDORES`
--
ALTER TABLE `DEUDORES`
  ADD PRIMARY KEY (`ID_DEUDOR`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `CELULAR` (`CELULAR`);

--
-- Indices de la tabla `GASTOS`
--
ALTER TABLE `GASTOS`
  ADD PRIMARY KEY (`ID_CARGO`);

--
-- Indices de la tabla `TARJETAS`
--
ALTER TABLE `TARJETAS`
  ADD PRIMARY KEY (`ID_TARJETA`),
  ADD UNIQUE KEY `TERMINACION` (`TERMINACION`),
  ADD UNIQUE KEY `IDENTIFICADOR` (`IDENTIFICADOR`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `USUARIO` (`USUARIO`),
  ADD KEY `CORREO` (`CORREO`),
  ADD KEY `PASSWORD` (`PASSWORD`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `DEUDAS`
--
ALTER TABLE `DEUDAS`
  MODIFY `ID_DEUDA` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `DEUDORES`
--
ALTER TABLE `DEUDORES`
  MODIFY `ID_DEUDOR` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `GASTOS`
--
ALTER TABLE `GASTOS`
  MODIFY `ID_CARGO` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TARJETAS`
--
ALTER TABLE `TARJETAS`
  MODIFY `ID_TARJETA` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `ID_USUARIO` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

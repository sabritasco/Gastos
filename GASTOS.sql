-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-07-2020 a las 12:29:22
-- Versión del servidor: 8.0.20-0ubuntu0.20.04.1
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
-- Estructura de tabla para la tabla `DEUDORES`
--

CREATE TABLE `DEUDORES` (
  `DEUDOR_ID` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(60) NOT NULL,
  `CELULAR` varchar(15) NOT NULL,
  `CREADO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DEUDORES`
--

INSERT INTO `DEUDORES` (`DEUDOR_ID`, `ID_USUARIO`, `NOMBRE`, `CORREO`, `CELULAR`, `CREADO`) VALUES
(1, 1, 'González Díaz Emmanuel', 'cocacolapepsipopotecocacola@hotmail.com', '5527315705', '2020-07-02 17:01:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TARJETAS`
--

CREATE TABLE `TARJETAS` (
  `TARJETA_ID` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `TERMINACION` int NOT NULL,
  `IDENTIFICADOR` varchar(50) NOT NULL,
  `TIPO` varchar(7) NOT NULL,
  `LIMITE_CREDITO` int DEFAULT NULL,
  `FECHA_CORTE` int DEFAULT NULL,
  `SALDO` int DEFAULT NULL,
  `VENCIMIENTO` varchar(7) NOT NULL,
  `INSTITUCION` varchar(30) NOT NULL,
  `TEL_INSTITUCION` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TARJETAS`
--

INSERT INTO `TARJETAS` (`TARJETA_ID`, `ID_USUARIO`, `TERMINACION`, `IDENTIFICADOR`, `TIPO`, `LIMITE_CREDITO`, `FECHA_CORTE`, `SALDO`, `VENCIMIENTO`, `INSTITUCION`, `TEL_INSTITUCION`) VALUES
(1, 1, 9374, 'Principal', 'Credito', 115520, 24, NULL, '2/2022', 'Santander', '5551694300'),
(2, 1, 4416, 'Nomina', 'Debito', NULL, NULL, 2599, '3/2022', 'Banorte', '5551405600');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `USUARIO_ID` int UNSIGNED NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(60) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `FOTO` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CREADO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`USUARIO_ID`, `USUARIO`, `NOMBRE`, `CORREO`, `PASSWORD`, `FOTO`, `CREADO`) VALUES
(1, 'sabritasco', 'González Díaz Emmanuel', 'cocacolapepsipopotecocacola@hotmail.com', 'a3832f9662a980654bbbe368ce630b55', 'sabritasco.jpg', '2020-06-26 13:38:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DEUDORES`
--
ALTER TABLE `DEUDORES`
  ADD PRIMARY KEY (`DEUDOR_ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `CELULAR` (`CELULAR`);

--
-- Indices de la tabla `TARJETAS`
--
ALTER TABLE `TARJETAS`
  ADD PRIMARY KEY (`TARJETA_ID`),
  ADD UNIQUE KEY `TERMINACION` (`TERMINACION`),
  ADD UNIQUE KEY `IDENTIFICADOR` (`IDENTIFICADOR`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`USUARIO_ID`),
  ADD UNIQUE KEY `USUARIO` (`USUARIO`),
  ADD KEY `CORREO` (`CORREO`),
  ADD KEY `PASSWORD` (`PASSWORD`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `DEUDORES`
--
ALTER TABLE `DEUDORES`
  MODIFY `DEUDOR_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `TARJETAS`
--
ALTER TABLE `TARJETAS`
  MODIFY `TARJETA_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `USUARIO_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

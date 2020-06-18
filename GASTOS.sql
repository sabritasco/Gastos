-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-06-2020 a las 15:02:56
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
  `ID` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(60) NOT NULL,
  `CELULAR` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'sabritasco', 'Emmanuel González Díaz', 'cocacolapepsipopotecocacola@hotmail.com', 'a3832f9662a980654bbbe368ce630b55', 'sabritasco.jpg', '2020-06-13 19:16:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DEUDORES`
--
ALTER TABLE `DEUDORES`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `CELULAR` (`CELULAR`);

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `USUARIO_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

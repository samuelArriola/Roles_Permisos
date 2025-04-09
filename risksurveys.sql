-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2025 a las 03:19:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `risksurveys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `GeNumDniCli` varchar(100) NOT NULL,
  `GeNomCli` varchar(100) NOT NULL,
  `GeTelefonoCli` varchar(30) NOT NULL,
  `GeEstadocli` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `GeNumDniCli`, `GeNomCli`, `GeTelefonoCli`, `GeEstadocli`) VALUES
(1, '123', 'Arriola', '123321', 1),
(12, '123', 'david arriola', '302256980', 1),
(13, '3232', 'OISMER SEHUANES', '30256481', 1),
(14, '323255', 'oiemer', '3203526556', 1),
(15, '569', 'Cuidar salud', '3020026136', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_permisos`
--

CREATE TABLE `detalle_permisos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `c` int(11) NOT NULL DEFAULT 0,
  `r` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_permisos`
--

INSERT INTO `detalle_permisos` (`id`, `id_usuario`, `id_permiso`, `c`, `r`, `u`, `d`, `create_at`, `update_at`) VALUES
(115, 1, 3, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(116, 1, 4, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(117, 1, 5, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(118, 1, 6, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(119, 1, 7, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(120, 1, 8, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(121, 1, 9, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(122, 1, 10, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(123, 1, 11, 0, 0, 0, 0, '2025-03-30 18:22:29', '2025-03-30 23:22:29'),
(134, 2, 4, 0, 0, 0, 0, '2025-03-31 22:54:24', '2025-04-01 03:54:24'),
(135, 2, 5, 1, 1, 0, 0, '2025-03-31 22:54:24', '2025-04-01 03:54:24'),
(136, 2, 8, 0, 0, 0, 0, '2025-03-31 22:54:24', '2025-04-01 03:54:24'),
(137, 2, 9, 0, 0, 0, 0, '2025-03-31 22:54:24', '2025-04-01 03:54:24'),
(138, 2, 10, 0, 0, 0, 0, '2025-03-31 22:54:24', '2025-04-01 03:54:24'),
(139, 2, 11, 0, 0, 0, 0, '2025-03-31 22:54:24', '2025-04-01 03:54:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gencaja`
--

CREATE TABLE `gencaja` (
  `id` int(11) NOT NULL,
  `Caja` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gencaja`
--

INSERT INTO `gencaja` (`id`, `Caja`, `Estado`) VALUES
(1, 'Generales', '1'),
(2, 'Tableros', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genmedpro`
--

CREATE TABLE `genmedpro` (
  `id` int(11) NOT NULL,
  `GeMedCod` varchar(50) NOT NULL,
  `GeMedDes` varchar(200) NOT NULL,
  `GeMedestado` int(11) NOT NULL DEFAULT 1,
  `Create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genmedpro`
--

INSERT INTO `genmedpro` (`id`, `GeMedCod`, `GeMedDes`, `GeMedestado`, `Create_at`, `Update_at`) VALUES
(1, 'UNI', 'Unidad', 1, '2025-02-26 18:39:53', '2025-02-26 23:39:53'),
(2, 'PACK12', 'PACK * 12', 0, '2025-02-26 18:39:53', '2025-02-26 23:39:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genpermiso`
--

CREATE TABLE `genpermiso` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `permiso` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `ruta` varchar(150) NOT NULL DEFAULT '#',
  `icono` varchar(200) NOT NULL,
  `c` int(11) NOT NULL DEFAULT 0,
  `r` int(11) NOT NULL DEFAULT 0,
  `u` int(11) DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `activo` int(11) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genpermiso`
--

INSERT INTO `genpermiso` (`id`, `menu_id`, `permiso`, `descripcion`, `ruta`, `icono`, `c`, `r`, `u`, `d`, `activo`, `create_at`, `Update_at`) VALUES
(3, 9, 'Rol', '', 'Rol', '', 0, 0, 0, 0, 1, '2025-03-17 20:30:01', '2025-03-18 01:30:01'),
(4, 9, 'Usuario', '', 'Usuario', '', 0, 0, 0, 0, 1, '2025-03-17 20:30:01', '2025-03-18 01:30:01'),
(5, 9, 'Cliente', '', 'Cliente', '', 0, 0, 0, 0, 1, '2025-03-17 20:30:01', '2025-03-18 01:30:01'),
(6, 9, 'Producto', '', 'Producto', '', 0, 0, 0, 0, 1, '2025-03-17 20:30:01', '2025-03-18 01:30:01'),
(7, NULL, 'Informes', '', '#', '', 0, 0, 0, 0, 1, '2025-03-17 20:30:01', '2025-03-18 01:30:01'),
(8, 9, 'Cliente_crear', '', '#', '', 0, 0, 0, 0, 1, '2025-03-17 20:30:01', '2025-03-18 01:30:01'),
(9, NULL, 'Generales', 'Modulo Generales', '#', 'bi bi-gear', 0, 0, 0, 0, 1, '2025-03-17 21:06:04', '2025-03-18 02:06:04'),
(10, NULL, 'Tableros', 'Modulo tablero', '#', 'bi bi-bar-chart', 0, 0, 0, 0, 1, '2025-03-17 21:06:04', '2025-03-18 02:06:04'),
(11, 10, 'Migrantes', 'Table de control de integración Migrante ', 'Tablero/Migrante', '', 0, 0, 0, 0, 1, '2025-03-30 18:20:36', '2025-03-30 23:20:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genprocateg`
--

CREATE TABLE `genprocateg` (
  `id` int(11) NOT NULL,
  `GeCatCod` varchar(50) NOT NULL,
  `GeCatDes` varchar(200) NOT NULL,
  `GeCatEstado` int(11) NOT NULL DEFAULT 1,
  `Create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genprocateg`
--

INSERT INTO `genprocateg` (`id`, `GeCatCod`, `GeCatDes`, `GeCatEstado`, `Create_at`, `Update_at`) VALUES
(1, 'BEB', 'Bebidas', 1, '2025-02-26 18:47:14', '2025-02-26 23:47:14'),
(2, 'LAC', 'Lacteos', 1, '2025-02-26 18:47:14', '2025-02-26 23:47:14'),
(3, 'FRU', 'Frutas', 1, '2025-02-26 18:47:30', '2025-02-26 23:47:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genproducto`
--

CREATE TABLE `genproducto` (
  `id` int(11) NOT NULL,
  `GeProCod` varchar(25) NOT NULL,
  `GeProDesc` varchar(200) NOT NULL,
  `GeProPreCom` decimal(10,0) NOT NULL,
  `GeProPreven` decimal(10,0) NOT NULL,
  `GeProStock` int(11) NOT NULL,
  `GeMedId` int(11) NOT NULL,
  `GeProCan` int(11) NOT NULL DEFAULT 0,
  `GeCatID` int(11) NOT NULL,
  `GeProEstado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genproducto`
--

INSERT INTO `genproducto` (`id`, `GeProCod`, `GeProDesc`, `GeProPreCom`, `GeProPreven`, `GeProStock`, `GeMedId`, `GeProCan`, `GeCatID`, `GeProEstado`) VALUES
(1, 'MANG', 'Mango', 300, 540, 8, 1, 9, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genrol`
--

CREATE TABLE `genrol` (
  `id_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(200) NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genusuario`
--

CREATE TABLE `genusuario` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Nombre2` varchar(150) NOT NULL,
  `Apellido` varchar(150) DEFAULT NULL,
  `Apellido2` varchar(150) NOT NULL,
  `Tipdoc` int(11) NOT NULL,
  `Numdoc` varchar(25) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Clave` varchar(250) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Gencaja` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Usuestado` int(11) NOT NULL DEFAULT 1,
  `Creado` datetime NOT NULL DEFAULT current_timestamp(),
  `Actualizado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genusuario`
--

INSERT INTO `genusuario` (`id`, `Nombre`, `Nombre2`, `Apellido`, `Apellido2`, `Tipdoc`, `Numdoc`, `Sexo`, `Usuario`, `Clave`, `Telefono`, `Rol`, `Gencaja`, `Correo`, `Usuestado`, `Creado`, `Actualizado`) VALUES
(1, 'samuel edit', 'ENRRIQUE', 'ARRIOLA', 'ARRIOLA', 1, '2024', 'm', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '3002033941', 1, 1, 'admin22@gmail.com', 1, '2025-02-19 23:34:40', '2025-02-21 04:10:35'),
(2, 'Luisa', '', 'rodrigues', 'arriola', 2, '10024564', 'Femenino', 'luisa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '56322032102', 1, 1, 'admin22@gmail.com', 1, '2025-03-09 17:25:38', '2025-03-09 22:25:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_permiso`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `gencaja`
--
ALTER TABLE `gencaja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genmedpro`
--
ALTER TABLE `genmedpro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genpermiso`
--
ALTER TABLE `genpermiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_submenu` (`menu_id`);

--
-- Indices de la tabla `genprocateg`
--
ALTER TABLE `genprocateg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genproducto`
--
ALTER TABLE `genproducto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genrol`
--
ALTER TABLE `genrol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `genusuario`
--
ALTER TABLE `genusuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Gencaja` (`Gencaja`),
  ADD KEY `Rol` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `gencaja`
--
ALTER TABLE `gencaja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genmedpro`
--
ALTER TABLE `genmedpro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genpermiso`
--
ALTER TABLE `genpermiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `genprocateg`
--
ALTER TABLE `genprocateg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genproducto`
--
ALTER TABLE `genproducto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `genrol`
--
ALTER TABLE `genrol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genusuario`
--
ALTER TABLE `genusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  ADD CONSTRAINT `detalle_permisos_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `genpermiso` (`id`);

--
-- Filtros para la tabla `genpermiso`
--
ALTER TABLE `genpermiso`
  ADD CONSTRAINT `genpermiso_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `genpermiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `genusuario`
--
ALTER TABLE `genusuario`
  ADD CONSTRAINT `genusuario_ibfk_1` FOREIGN KEY (`Gencaja`) REFERENCES `gencaja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

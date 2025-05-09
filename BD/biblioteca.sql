-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2024 a las 02:59:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE `biblioteca` (
  `seccion` varchar(20) NOT NULL,
  `id_libro` varchar(10) NOT NULL,
  `disponibilidad` varchar(12) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `calificacion` char(1) DEFAULT NULL,
  `buzon_de_mensajes` varchar(200) NOT NULL,
  `fecha_de_mensaje` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_libro`
--

CREATE TABLE `datos_libro` (
  `nombre_libro` varchar(50) NOT NULL,
  `autor` varchar(64) NOT NULL,
  `editorial` varchar(20) NOT NULL,
  `año_publicacion` datetime NOT NULL,
  `id_libro` varchar(10) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre_genero` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre_genero`) VALUES
(1, 'literatura'),
(2, 'ficcion_y_fantasia'),
(3, 'infantil_y_juvenil'),
(4, 'arte'),
(5, 'gastronomia'),
(6, 'ciencias'),
(7, 'historia'),
(8, 'romance'),
(9, 'deporte'),
(10, 'educacion'),
(11, 'terror'),
(12, 'filosofia_y_religion'),
(13, 'tecnologia'),
(14, 'economia_y_politica'),
(15, 'literatura_clasica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `id_libro` char(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_de_prestamo` datetime NOT NULL,
  `fecha_de_devolucion` datetime NOT NULL,
  `estado_del_prestamo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_libro` varchar(10) DEFAULT NULL,
  `disponibilidad` varchar(12) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(40) NOT NULL,
  `apellidoUsuario` varchar(40) NOT NULL,
  `correoUsuario` varchar(60) NOT NULL,
  `telefonoUsuario` char(10) NOT NULL,
  `direccionUsuario` varchar(16) NOT NULL,
  `contrasenaUsuario` varchar(16) NOT NULL,
  `repetirContrasena` varchar(16) NOT NULL,
  `rolUsuario` varchar(7) DEFAULT NULL,
  `estadoUsuario` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `contrasenaUsuario`, `repetirContrasena`, `rolUsuario`, `estadoUsuario`) VALUES
(3, 'Juan', 'Juan Guerra', 'jdguerraa@sanmateo.edu.co', '', '', '291004', '291004', NULL, 'ACTIVO'),
(4, 'Maria', 'Maria', 'mfmoncadab@sanmateo.edu.co', '', '', '201004', '201004', NULL, 'ACTIVO'),
(5, 'Camila', 'Camila Avendano', 'clavendanoh@sanmateo.edu.co', '', '', 'Camila123', 'Camila123', NULL, 'ACTIVO'),
(6, 'Brayan', 'Brayan Lancheros', 'bdlancherosr@sanmateo.edu.co', '', '', '1111', '1111', NULL, 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD KEY `id_seccion` (`id_seccion`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `datos_libro`
--
ALTER TABLE `datos_libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`),
  ADD CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `datos_libro` (`id_libro`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `datos_libro`
--
ALTER TABLE `datos_libro`
  ADD CONSTRAINT `datos_libro_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `biblioteca` (`id_libro`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `seccion_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

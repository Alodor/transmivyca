-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2017 a las 20:13:14
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transmivyca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_chuto`
--

CREATE TABLE `asignar_chuto` (
  `id_asignar` int(11) NOT NULL,
  `id_chofer` int(11) NOT NULL,
  `id_chuto` int(11) NOT NULL,
  `id_batea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignar_chuto`
--

INSERT INTO `asignar_chuto` (`id_asignar`, `id_chofer`, `id_chuto`, `id_batea`) VALUES
(4, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_viaje`
--

CREATE TABLE `asignar_viaje` (
  `id_viaje` int(11) NOT NULL,
  `numero_guia` int(11) NOT NULL,
  `id_chofer` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignar_viaje`
--

INSERT INTO `asignar_viaje` (`id_viaje`, `numero_guia`, `id_chofer`, `id_destino`, `id_cliente`, `fecha`) VALUES
(4, 123456, 3, 1, 1, '01-06-2017'),
(5, 1234567, 1, 1, 1, '01-06-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batea`
--

CREATE TABLE `batea` (
  `id_batea` int(11) NOT NULL,
  `matricula_batea` varchar(10) NOT NULL,
  `serial` varchar(45) NOT NULL,
  `eje` varchar(1) NOT NULL,
  `fecha_registro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `batea`
--

INSERT INTO `batea` (`id_batea`, `matricula_batea`, `serial`, `eje`, `fecha_registro`) VALUES
(2, 'TYU-789', 'SREAZTDRSTR5487', '4', '31-05-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `id_chofer` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `fecha_vencimiento_licencia` date NOT NULL,
  `fecha_vencimiento_certificado_medico` date NOT NULL,
  `fecha_ingreso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`id_chofer`, `cedula`, `nombre`, `apellido`, `direccion`, `telefono`, `fecha_vencimiento_licencia`, `fecha_vencimiento_certificado_medico`, `fecha_ingreso`) VALUES
(1, '19316181', 'JOSÃ‰ ALEJANDRO', 'MÃ‰NDEZ SÃNCHEZ', 'BARCELONA', '04128352721', '2017-05-31', '2017-05-31', '29-05-2017'),
(2, '8215334', 'WILFREDO', 'MÃ‰NDEZ', 'BARCELONA', '12345678999', '2017-06-02', '2017-06-03', '31-05-2017'),
(3, '20156789', 'GUILLERMO', 'MENESES', 'PUERTO LA CRUZ', '123456', '2017-06-30', '2017-07-02', '01-06-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chuto`
--

CREATE TABLE `chuto` (
  `id_chuto` int(11) NOT NULL,
  `matricula_chuto` varchar(10) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `annio` varchar(4) NOT NULL,
  `serial_motor` varchar(45) NOT NULL,
  `serial_carroceria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chuto`
--

INSERT INTO `chuto` (`id_chuto`, `matricula_chuto`, `marca`, `modelo`, `color`, `annio`, `serial_motor`, `serial_carroceria`) VALUES
(1, 'ABC-123', 'INTERNATIONAL', 'TRANSTAR', 'NEGRO', '2015', 'ABC123', 'ABC123'),
(2, 'GHT-789', 'MERCEDES-BENZ', 'ZETROS', 'PLATEADO', '2000', 'ASDFG123456', 'LOIUY7894568');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `rif` varchar(20) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `responsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `rif`, `razon_social`, `direccion`, `telefono`, `responsable`) VALUES
(1, 'J-656623652', 'SERVICE COMPUTEK', 'BARCELONA', '04128352721', 'JOSE MENDEZ'),
(3, 'J-489865265', 'POLAR', 'BOLIVAR', '123456', 'MERIDA SANCHEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `origen` varchar(45) NOT NULL,
  `destino` varchar(45) NOT NULL,
  `distancia` varchar(10) NOT NULL,
  `peaje` double NOT NULL,
  `comida` double NOT NULL,
  `combustible` double NOT NULL,
  `otros` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `origen`, `destino`, `distancia`, `peaje`, `comida`, `combustible`, `otros`, `total`) VALUES
(1, 'BARCELONA', 'CARACAS', '300', 200, 300, 500, 500, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_chuto`
--

CREATE TABLE `mantenimiento_chuto` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_chuto` int(11) NOT NULL,
  `kilometraje` varchar(45) NOT NULL,
  `falla` varchar(200) NOT NULL,
  `tipo_mantenimiento` varchar(200) NOT NULL,
  `fecha_ingreso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantenimiento_chuto`
--

INSERT INTO `mantenimiento_chuto` (`id_mantenimiento`, `id_chuto`, `kilometraje`, `falla`, `tipo_mantenimiento`, `fecha_ingreso`) VALUES
(2, 1, '10000', 'MOTOR', 'PREDICTIVO', '03-06-2017'),
(3, 2, '100000', 'TRANSMISION', 'CORRECTIVO', '03-06-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sistema`
--

CREATE TABLE `usuario_sistema` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` blob NOT NULL,
  `privilegio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_sistema`
--

INSERT INTO `usuario_sistema` (`id_usuario`, `usuario`, `password`, `privilegio`) VALUES
(1, 'administrador', 0x243279243130245538355238505531437065524c5a6a52734a76422e4f476b436a6c723569544d792e53494b5a6d4a6373576e356a4d6e5059395a4b, 'administrador'),
(2, 'alodor', 0x2432792431302465686e476b557a534c7836456d3459596b697a57544f546c36327930345258663358574a34544978564a4436453830334f506d4e32, 'OPERADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignar_chuto`
--
ALTER TABLE `asignar_chuto`
  ADD PRIMARY KEY (`id_asignar`),
  ADD KEY `fk_asignar_chuto_chofer_idx` (`id_chofer`),
  ADD KEY `fk_asignar_chuto_chuto1_idx` (`id_chuto`),
  ADD KEY `fk_asignar_chuto_batea1_idx` (`id_batea`);

--
-- Indices de la tabla `asignar_viaje`
--
ALTER TABLE `asignar_viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `fk_asignar_viaje_chofer1_idx` (`id_chofer`),
  ADD KEY `fk_asignar_viaje_destino1_idx` (`id_destino`),
  ADD KEY `fk_asignar_viaje_cliente1_idx` (`id_cliente`);

--
-- Indices de la tabla `batea`
--
ALTER TABLE `batea`
  ADD PRIMARY KEY (`id_batea`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`id_chofer`);

--
-- Indices de la tabla `chuto`
--
ALTER TABLE `chuto`
  ADD PRIMARY KEY (`id_chuto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `mantenimiento_chuto`
--
ALTER TABLE `mantenimiento_chuto`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `fk_mantenimiento_chuto_chuto1_idx` (`id_chuto`);

--
-- Indices de la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignar_chuto`
--
ALTER TABLE `asignar_chuto`
  MODIFY `id_asignar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `asignar_viaje`
--
ALTER TABLE `asignar_viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `batea`
--
ALTER TABLE `batea`
  MODIFY `id_batea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `id_chofer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `chuto`
--
ALTER TABLE `chuto`
  MODIFY `id_chuto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mantenimiento_chuto`
--
ALTER TABLE `mantenimiento_chuto`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignar_chuto`
--
ALTER TABLE `asignar_chuto`
  ADD CONSTRAINT `fk_asignar_chuto_batea1` FOREIGN KEY (`id_batea`) REFERENCES `batea` (`id_batea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignar_chuto_chofer` FOREIGN KEY (`id_chofer`) REFERENCES `chofer` (`id_chofer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignar_chuto_chuto1` FOREIGN KEY (`id_chuto`) REFERENCES `chuto` (`id_chuto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignar_viaje`
--
ALTER TABLE `asignar_viaje`
  ADD CONSTRAINT `fk_asignar_viaje_chofer1` FOREIGN KEY (`id_chofer`) REFERENCES `chofer` (`id_chofer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignar_viaje_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignar_viaje_destino1` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimiento_chuto`
--
ALTER TABLE `mantenimiento_chuto`
  ADD CONSTRAINT `fk_mantenimiento_chuto_chuto1` FOREIGN KEY (`id_chuto`) REFERENCES `chuto` (`id_chuto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

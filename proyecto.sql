-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2016 a las 15:46:11
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `edad` int(11) NOT NULL,
  `promedio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `id_seccion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `edad`, `promedio`, `imagen`, `fecha`, `id_seccion`) VALUES
(8, 'Roberto Musso', 41, 10, '1916musso.JPG', '2016-07-26', 1),
(9, 'Santiago Tavella', 39, 5, '2010tavella.jpg', '2016-07-26', 1),
(10, 'Matt Bellamy', 39, 10, '2043bellamy.jpg', '2016-07-26', 1),
(11, 'Dominic Howard', 35, 8, '2109dominic.jpg', '2016-07-26', 1),
(5, 'Tu vieja', 15, 10, '1046de nada.jpg', '2016-07-24', 1),
(6, 'elwn', 8, 8, '115211885171_10207363001455865_2905850678855681497_n.jpg', '2016-07-24', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_clientes`
--

CREATE TABLE `m_clientes` (
  `cod_clientes` int(11) NOT NULL,
  `apyn` text NOT NULL,
  `documento` int(12) NOT NULL,
  `fnac` date NOT NULL,
  `direccion` text NOT NULL,
  `cuit` text NOT NULL,
  `telefono` text NOT NULL,
  `iva` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_clientes`
--

INSERT INTO `m_clientes` (`cod_clientes`, `apyn`, `documento`, `fnac`, `direccion`, `cuit`, `telefono`, `iva`) VALUES
(6, 'Villar Santiago', 41616494, '2016-05-04', '151515', '151515', '15151', 'Consumidor Final'),
(7, 'Roberto Musso', 37885987, '2016-05-09', 'av asdasd 4141', '2188498421', '44598785', 'Consumidor Final'),
(11, 'Villar Luis', 17181818, '2016-05-06', 'av stacruz', '211787982', '44588965', 'Monotributista'),
(14, 'Muse', 478985, '2016-07-07', 'av.la wea', '789456', '494165', 'Responsable Inscripto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_costosfijos`
--

CREATE TABLE `m_costosfijos` (
  `cod_costosfijos` int(11) NOT NULL,
  `alquiler` float NOT NULL,
  `luz` float NOT NULL,
  `agua` float NOT NULL,
  `herramientas` float NOT NULL,
  `fecha` date NOT NULL COMMENT 'fecha de actualizacion',
  `porcentaje` float NOT NULL COMMENT 'Aca va el porcentaje del total que se agrega al costo del producto'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_costosfijos`
--

INSERT INTO `m_costosfijos` (`cod_costosfijos`, `alquiler`, `luz`, `agua`, `herramientas`, `fecha`, `porcentaje`) VALUES
(1, 2500, 200, 150, 200, '2016-08-07', 10),
(2, 1000, 250, 95, 90, '2016-08-06', 0),
(3, 2500, 200, 150, 200, '2016-08-18', 0),
(4, 2600, 200, 150, 200, '2016-08-18', 0),
(5, 2600, 500, 150, 200, '2016-08-18', 0),
(6, 2600, 500, 150, 200, '2016-08-18', 0),
(7, 2600, 500, 200, 200, '2016-08-19', 0),
(8, 2600, 500, 250, 200, '2016-08-20', 3),
(10, 1500, 120, 90, 200, '2016-08-21', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_costosgeneral`
--

CREATE TABLE `m_costosgeneral` (
  `cod_costos` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `cod_costosfijos` int(11) NOT NULL,
  `cod_costosvariables` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_detalle_factura`
--

CREATE TABLE `m_detalle_factura` (
  `cod_detalle` int(11) NOT NULL,
  `cod_factura` int(11) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_detalle_factura`
--

INSERT INTO `m_detalle_factura` (`cod_detalle`, `cod_factura`, `num_factura`, `cod_producto`, `cantidad`, `precio_venta`) VALUES
(10, 39, 12, 6, 1, 800),
(21, 42, 22, 6, 2, 800),
(18, 40, 20, 6, 1, 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_facturas`
--

CREATE TABLE `m_facturas` (
  `cod_factura` int(11) NOT NULL,
  `tipo_factura` varchar(2) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `cod_clientes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_facturas`
--

INSERT INTO `m_facturas` (`cod_factura`, `tipo_factura`, `num_factura`, `fecha_factura`, `cod_clientes`) VALUES
(1, 'A', 1, '2016-10-16 04:29:41', 14),
(4, 'B', 1, '2016-10-16 04:35:12', 7),
(3, 'A', 2, '2016-10-16 04:32:02', 14),
(5, 'B', 2, '2016-10-16 04:35:31', 6),
(6, 'A', 3, '2016-10-16 04:35:44', 14),
(7, 'C', 1, '2016-10-16 04:38:36', NULL),
(8, 'C', 2, '2016-10-16 04:38:39', NULL),
(9, 'C', 3, '2016-10-16 04:38:52', NULL),
(10, 'A', 4, '2016-10-16 04:39:05', 14),
(11, 'B', 3, '2016-10-16 04:49:45', 6),
(12, 'C', 4, '2016-10-16 04:51:42', NULL),
(13, 'C', 5, '2016-10-16 05:01:44', NULL),
(14, 'A', 5, '2016-10-16 05:01:48', 14),
(15, 'C', 6, '2016-10-16 05:02:17', NULL),
(16, 'A', 6, '2016-10-16 05:02:27', 14),
(17, 'A', 7, '2016-10-16 05:03:09', 14),
(18, 'A', 8, '2016-10-16 05:08:43', 14),
(19, 'A', 9, '2016-10-16 05:13:13', 14),
(20, 'A', 10, '2016-10-16 05:30:33', 14),
(21, 'B', 4, '2016-10-16 17:42:55', 11),
(22, 'B', 5, '2016-10-16 17:48:51', 6),
(23, 'A', 11, '2016-10-16 17:48:55', 14),
(24, 'A', 12, '2016-10-16 17:49:02', 14),
(25, 'A', 13, '2016-10-16 17:53:06', 14),
(26, 'A', 14, '2016-10-16 18:04:49', 14),
(27, 'B', 6, '2016-10-16 18:27:18', 6),
(28, 'A', 15, '2016-10-16 18:33:58', 14),
(29, 'B', 7, '2016-10-16 18:35:49', 6),
(30, 'A', 16, '2016-10-16 18:49:12', 14),
(31, 'B', 8, '2016-10-16 18:52:20', 6),
(32, 'B', 9, '2016-10-16 18:52:25', 6),
(33, 'A', 17, '2016-10-16 19:00:25', 14),
(34, 'C', 7, '2016-10-16 19:00:43', NULL),
(35, 'A', 18, '2016-10-16 19:00:47', 14),
(36, 'B', 10, '2016-10-16 19:02:07', 6),
(37, 'A', 19, '2016-10-16 19:35:17', 14),
(38, 'B', 11, '2016-10-16 21:01:29', 7),
(39, 'B', 12, '2016-10-16 21:06:04', 11),
(40, 'A', 20, '2016-10-16 21:30:34', 14),
(41, 'A', 21, '2016-10-16 21:58:42', 14),
(42, 'A', 22, '2016-10-16 22:03:08', 14),
(43, 'B', 13, '2016-10-16 22:37:00', 6),
(44, 'C', 8, '2016-10-17 01:46:12', NULL),
(45, 'C', 9, '2016-10-17 01:47:27', NULL),
(46, 'C', 10, '2016-10-17 01:52:12', NULL),
(47, 'C', 11, '2016-10-17 01:56:00', NULL),
(48, 'C', 12, '2016-10-17 02:00:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_materiales`
--

CREATE TABLE `m_materiales` (
  `cod_material` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `cod_unidad` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `fecha_stock` datetime NOT NULL,
  `cod_proveedor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_materiales`
--

INSERT INTO `m_materiales` (`cod_material`, `descripcion`, `cod_unidad`, `precio_unitario`, `stock`, `fecha_stock`, `cod_proveedor`) VALUES
(1, 'Pintura', 2, 250, 114, '2016-10-16 17:51:15', 7),
(2, 'Alfombra Punzonada', 4, 120, 29, '2016-10-14 22:16:53', 7),
(3, 'Barras de Silicona', 1, 2.5, 13, '2016-10-16 17:51:18', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_mercaderia`
--

CREATE TABLE `m_mercaderia` (
  `cod_mercaderia` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_mercaderia`
--

INSERT INTO `m_mercaderia` (`cod_mercaderia`, `descripcion`, `stock`, `precio`) VALUES
(1, 'Palet palet', 5, 200),
(4, 'Rascador de Gatos', 89, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_operaciones`
--

CREATE TABLE `m_operaciones` (
  `cod_operacion` int(11) NOT NULL,
  `cod_producto` int(11) DEFAULT NULL,
  `cod_material` int(11) DEFAULT NULL,
  `q` int(11) NOT NULL,
  `cod_tipo_operacion` int(11) NOT NULL,
  `cod_venta` int(11) DEFAULT NULL,
  `fecha_operacion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_operaciones`
--

INSERT INTO `m_operaciones` (`cod_operacion`, `cod_producto`, `cod_material`, `q`, `cod_tipo_operacion`, `cod_venta`, `fecha_operacion`) VALUES
(1, NULL, 1, 10, 1, NULL, '2016-08-29 02:58:23'),
(2, NULL, 1, 50, 1, NULL, '2016-08-29 02:58:36'),
(3, NULL, 1, 70, 1, NULL, '2016-08-29 03:06:35'),
(4, NULL, 2, 10, 1, NULL, '2016-10-14 20:59:10'),
(5, NULL, 3, 20, 1, NULL, '2016-10-14 20:59:44'),
(6, 3, NULL, 10, 1, NULL, '2016-10-14 21:49:24'),
(7, NULL, 2, 50, 1, NULL, '2016-10-14 22:16:53'),
(8, 1, NULL, 10, 1, NULL, '2016-10-14 22:22:48'),
(9, 1, NULL, 10, 1, NULL, '2016-10-14 22:22:52'),
(10, 1, NULL, 10, 1, NULL, '2016-10-14 22:24:13'),
(11, 1, NULL, 10, 1, NULL, '2016-10-14 22:24:29'),
(12, 1, NULL, 10, 1, NULL, '2016-10-14 22:25:52'),
(13, 1, NULL, 10, 1, NULL, '2016-10-14 22:26:22'),
(14, 1, NULL, 10, 1, NULL, '2016-10-14 22:26:55'),
(15, 1, NULL, 10, 1, NULL, '2016-10-14 22:27:04'),
(16, 1, NULL, 10, 1, NULL, '2016-10-14 22:27:23'),
(17, 1, NULL, 15, 1, NULL, '2016-10-14 22:27:37'),
(18, 1, NULL, 10, 1, NULL, '2016-10-14 22:28:16'),
(19, 1, NULL, 10, 1, NULL, '2016-10-14 22:29:31'),
(20, 1, NULL, 15, 1, NULL, '2016-10-14 22:30:11'),
(21, 2, NULL, 12, 1, NULL, '2016-10-14 22:30:31'),
(22, 1, NULL, 30, 1, NULL, '2016-10-15 01:04:55'),
(23, 4, NULL, 5, 1, NULL, '2016-10-15 13:56:29'),
(24, 6, NULL, 2, 1, NULL, '2016-10-16 17:51:31'),
(25, 1, NULL, 5, 1, NULL, '2016-10-16 17:52:08'),
(26, 4, NULL, 5, 1, NULL, '2016-10-16 17:52:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_productos`
--

CREATE TABLE `m_productos` (
  `cod_producto` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio_sugerido` float DEFAULT NULL,
  `precio_unitario` float DEFAULT '0',
  `fecha_alta` date DEFAULT NULL,
  `fecha_stock` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_productos`
--

INSERT INTO `m_productos` (`cod_producto`, `descripcion`, `stock`, `precio_sugerido`, `precio_unitario`, `fecha_alta`, `fecha_stock`) VALUES
(1, 'Tower Cat V.1', 60, NULL, 1822, NULL, '2016-10-16 17:52:08'),
(3, 'Tower Cat V.5', 10, 2826.9, 2920, '2016-10-14', NULL),
(4, 'Arenero Paw Paw xd', 10, 1067.8, 1200, '2016-10-15', '2016-10-16 17:52:17'),
(6, 'Rascador de Gatos', 2, 733.55, 800, '2016-10-16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_proveedores`
--

CREATE TABLE `m_proveedores` (
  `cod_proveedor` int(11) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `cuit` bigint(50) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_proveedores`
--

INSERT INTO `m_proveedores` (`cod_proveedor`, `razon_social`, `cuit`, `telefono`, `direccion`) VALUES
(5, 'Ferreteria Don Pedro', 21456654456, '0800888494', 'Av Santa Cruz y 115'),
(6, 'Maxiconsumo (?', 2126546987, '4489874985', 'Av Quaranta'),
(7, 'Ferreteria Dos puntos ve :v', 2222222222222, '4444444444444', 'av. :v entre :v y :v'),
(8, 'Don Pedro', 654684, '11888', 'av456'),
(9, 'Hipermercado Libertad S.A', 468462134, '4456845', 'av quaranta'),
(10, 'California S.A', 210056, '44882', 'av lavalle'),
(12, 'Prueba', 789, '7788999', 'av prue'),
(13, 'wea', 9988, '888', '88'),
(14, 'Carrefour', 4879, '5555', 'av55'),
(15, 'Hipermercado Mayorista Makro', 54684, '145645', 're lejos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_tipo_operacion`
--

CREATE TABLE `m_tipo_operacion` (
  `cod_tipo_operacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_tipo_operacion`
--

INSERT INTO `m_tipo_operacion` (`cod_tipo_operacion`, `nombre`) VALUES
(1, 'entrada'),
(2, 'salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_unidadesmedida`
--

CREATE TABLE `m_unidadesmedida` (
  `cod_unidad` int(11) NOT NULL,
  `nombre_unidad` varchar(200) NOT NULL,
  `abreviatura_unidad` varchar(50) NOT NULL,
  `cantidad_unidad` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_unidadesmedida`
--

INSERT INTO `m_unidadesmedida` (`cod_unidad`, `nombre_unidad`, `abreviatura_unidad`, `cantidad_unidad`) VALUES
(1, 'Unidad', 'u.', NULL),
(2, 'Litro', 'l', NULL),
(3, 'Docena', 'Doc.', 12),
(4, 'Metro Cuadrado', 'm&sup2;', NULL),
(5, 'Metro C&uacute;bico', 'm&sup3;', NULL),
(6, 'Kilogramos', 'Kg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`) VALUES
(1, 'wea'),
(2, 'wea2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_costostemp`
--

CREATE TABLE `t_costostemp` (
  `cod_producto` int(11) NOT NULL,
  `cod_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_costostemp`
--

INSERT INTO `t_costostemp` (`cod_producto`, `cod_material`, `cantidad`, `fecha`) VALUES
(3, 1, 5, '2016-10-14'),
(3, 2, 8, '2016-10-14'),
(4, 3, 5, '2016-10-15'),
(4, 1, 3, '2016-10-15'),
(6, 1, 2, '2016-10-16'),
(6, 3, 2, '2016-10-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_costosvariables`
--

CREATE TABLE `t_costosvariables` (
  `cod_costosvariables` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `mano_obra` float NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_costosvariables`
--

INSERT INTO `t_costosvariables` (`cod_costosvariables`, `cod_producto`, `mano_obra`, `total`, `fecha`) VALUES
(1, 3, 21, 2674.1, '2016-10-15'),
(2, 4, 20, 915, '2016-10-15'),
(3, 6, 15, 580.75, '2016-10-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_facturatemp`
--

CREATE TABLE `t_facturatemp` (
  `cod_tmp` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipofactura`
--

CREATE TABLE `t_tipofactura` (
  `cod_tipofactura` int(11) NOT NULL,
  `tipofactura` varchar(200) NOT NULL,
  `detalles` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_tipofactura`
--

INSERT INTO `t_tipofactura` (`cod_tipofactura`, `tipofactura`, `detalles`) VALUES
(1, 'Factura A', 'Si se trata de operaciones entre responsables inscriptos, existen 3 tipos de comprobantes que se pueden utilizar:\r\nTipo “A”\r\nTipo “A” con leyenda “pago en CBU informada”\r\nTipo “M”'),
(2, 'Factura B', 'Cuando se trate de una operación entre un Responsable Inscripto y Monotributista, Consumidor Final, o Exento, el Responsable Inscripto deberá emitir comprobantes tipo “B”.'),
(3, 'Factura C', 'En caso de que quien lo emita no sea un Responsable Inscripto (Monotributista; exento en el IVA), deberá operar con comprobantes tipo “C”.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m_clientes`
--
ALTER TABLE `m_clientes`
  ADD PRIMARY KEY (`cod_clientes`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- Indices de la tabla `m_costosfijos`
--
ALTER TABLE `m_costosfijos`
  ADD PRIMARY KEY (`cod_costosfijos`);

--
-- Indices de la tabla `m_costosgeneral`
--
ALTER TABLE `m_costosgeneral`
  ADD PRIMARY KEY (`cod_costos`);

--
-- Indices de la tabla `m_detalle_factura`
--
ALTER TABLE `m_detalle_factura`
  ADD PRIMARY KEY (`cod_detalle`);

--
-- Indices de la tabla `m_facturas`
--
ALTER TABLE `m_facturas`
  ADD PRIMARY KEY (`cod_factura`);

--
-- Indices de la tabla `m_materiales`
--
ALTER TABLE `m_materiales`
  ADD PRIMARY KEY (`cod_material`);

--
-- Indices de la tabla `m_mercaderia`
--
ALTER TABLE `m_mercaderia`
  ADD PRIMARY KEY (`cod_mercaderia`);

--
-- Indices de la tabla `m_operaciones`
--
ALTER TABLE `m_operaciones`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `m_productos`
--
ALTER TABLE `m_productos`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `m_proveedores`
--
ALTER TABLE `m_proveedores`
  ADD PRIMARY KEY (`cod_proveedor`),
  ADD UNIQUE KEY `cuit` (`cuit`);

--
-- Indices de la tabla `m_tipo_operacion`
--
ALTER TABLE `m_tipo_operacion`
  ADD PRIMARY KEY (`cod_tipo_operacion`);

--
-- Indices de la tabla `m_unidadesmedida`
--
ALTER TABLE `m_unidadesmedida`
  ADD PRIMARY KEY (`cod_unidad`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_costosvariables`
--
ALTER TABLE `t_costosvariables`
  ADD PRIMARY KEY (`cod_costosvariables`);

--
-- Indices de la tabla `t_facturatemp`
--
ALTER TABLE `t_facturatemp`
  ADD PRIMARY KEY (`cod_tmp`);

--
-- Indices de la tabla `t_tipofactura`
--
ALTER TABLE `t_tipofactura`
  ADD PRIMARY KEY (`cod_tipofactura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `m_clientes`
--
ALTER TABLE `m_clientes`
  MODIFY `cod_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `m_costosfijos`
--
ALTER TABLE `m_costosfijos`
  MODIFY `cod_costosfijos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `m_costosgeneral`
--
ALTER TABLE `m_costosgeneral`
  MODIFY `cod_costos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `m_detalle_factura`
--
ALTER TABLE `m_detalle_factura`
  MODIFY `cod_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `m_facturas`
--
ALTER TABLE `m_facturas`
  MODIFY `cod_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `m_materiales`
--
ALTER TABLE `m_materiales`
  MODIFY `cod_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `m_mercaderia`
--
ALTER TABLE `m_mercaderia`
  MODIFY `cod_mercaderia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `m_operaciones`
--
ALTER TABLE `m_operaciones`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `m_productos`
--
ALTER TABLE `m_productos`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `m_proveedores`
--
ALTER TABLE `m_proveedores`
  MODIFY `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `m_tipo_operacion`
--
ALTER TABLE `m_tipo_operacion`
  MODIFY `cod_tipo_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `m_unidadesmedida`
--
ALTER TABLE `m_unidadesmedida`
  MODIFY `cod_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_costosvariables`
--
ALTER TABLE `t_costosvariables`
  MODIFY `cod_costosvariables` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `t_facturatemp`
--
ALTER TABLE `t_facturatemp`
  MODIFY `cod_tmp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_tipofactura`
--
ALTER TABLE `t_tipofactura`
  MODIFY `cod_tipofactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

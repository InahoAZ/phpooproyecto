-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2016 a las 22:39:49
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
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `edad`, `curso`) VALUES
(1, 'asd', 1, 2),
(2, 'asdasd', 123, 123),
(3, 'lala', 23, 20),
(4, 'lalalalala', 123123, 123123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_asientoscontables`
--

CREATE TABLE `m_asientoscontables` (
  `cod_asiento` int(11) NOT NULL,
  `num_asiento` int(11) NOT NULL,
  `fecha_asiento` datetime NOT NULL,
  `concepto` varchar(150) NOT NULL,
  `cod_factura` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(7, 'Roberto Musso', 37885987, '2016-05-09', 'av asdasd 4141', '2188498421', '44598785', 'Responsable Inscripto'),
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
(10, 1500, 120, 90, 200, '2016-08-21', 8),
(11, 1500, 120, 90, 200, '2016-10-18', 3),
(12, 1500, 120, 90, 200, '2016-10-18', 3),
(13, 1500, 120, 90, 200, '2016-10-20', 3);

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
-- Estructura de tabla para la tabla `m_detalleasiento`
--

CREATE TABLE `m_detalleasiento` (
  `cod_detalleasiento` int(11) NOT NULL,
  `num_asiento` int(11) NOT NULL,
  `cod_cuenta` varchar(150) NOT NULL,
  `debe` double DEFAULT '0',
  `haber` double DEFAULT '0'
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_facturas`
--

CREATE TABLE `m_facturas` (
  `cod_factura` int(11) NOT NULL,
  `tipo_factura` varchar(2) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `cod_clientes` int(11) DEFAULT NULL,
  `finalizado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'Pintura', 2, 250, -93, '2016-10-19 14:16:43', 7),
(2, 'Alfombra Punzonada', 4, 120, 6, '2016-10-18 15:47:46', 7),
(3, 'Barras de Silicona', 1, 2.5, -33, '2016-10-18 15:48:04', 5);

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
  `cod_factura` int(11) DEFAULT NULL,
  `fecha_operacion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_operaciones`
--

INSERT INTO `m_operaciones` (`cod_operacion`, `cod_producto`, `cod_material`, `q`, `cod_tipo_operacion`, `cod_factura`, `fecha_operacion`) VALUES
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
(26, 4, NULL, 5, 1, NULL, '2016-10-16 17:52:16'),
(27, 6, NULL, 5, 1, NULL, '2016-10-18 13:44:34'),
(28, 7, NULL, 4, 1, NULL, '2016-10-18 15:44:22'),
(29, 8, NULL, 2, 1, NULL, '2016-10-18 15:45:26'),
(30, 1, NULL, 12, 1, NULL, '2016-10-18 17:48:35'),
(31, 15, NULL, 2, 1, NULL, '2016-10-18 17:52:29'),
(32, 15, NULL, 5, 1, NULL, '2016-10-18 17:52:40'),
(33, 6, NULL, 49, 1, NULL, '2016-10-18 23:45:25'),
(34, 1, NULL, 2, 1, NULL, '2016-10-18 23:45:38'),
(35, 15, NULL, 49, 1, NULL, '2016-10-18 23:45:48'),
(36, 1, NULL, 20, 1, NULL, '2016-10-18 23:52:04'),
(37, 3, NULL, 100, 1, NULL, '2016-10-18 23:52:17'),
(38, 4, NULL, 100, 1, NULL, '2016-10-18 23:52:27'),
(39, 15, NULL, 14, 2, 65, '2016-10-19 00:22:00'),
(40, 4, NULL, 5, 2, 65, '2016-10-19 00:22:00'),
(41, 3, NULL, 5, 2, 65, '2016-10-19 00:22:00'),
(42, 15, NULL, 14, 2, 65, '2016-10-19 00:22:30'),
(43, 4, NULL, 5, 2, 65, '2016-10-19 00:22:30'),
(44, 3, NULL, 5, 2, 65, '2016-10-19 00:22:30'),
(45, 15, NULL, 14, 2, 65, '2016-10-19 00:22:52'),
(46, 15, NULL, 20, 1, NULL, '2016-10-19 00:24:19'),
(47, 15, NULL, 8, 2, 66, '2016-10-19 00:25:07'),
(48, 1, NULL, 3, 2, 67, '2016-10-19 01:00:40'),
(49, 3, NULL, 10, 2, 68, '2016-10-19 01:01:15'),
(50, 1, NULL, 5, 2, 68, '2016-10-19 01:01:15'),
(51, 3, NULL, 10, 2, 68, '2016-10-19 01:02:19'),
(52, 1, NULL, 5, 2, 68, '2016-10-19 01:02:19'),
(53, 1, NULL, 2, 2, 69, '2016-10-19 01:04:46'),
(54, 1, NULL, 2, 2, 69, '2016-10-19 01:05:09'),
(55, 3, NULL, 2, 2, 70, '2016-10-19 01:06:01'),
(56, 3, NULL, 2, 2, 70, '2016-10-19 01:06:12'),
(57, 3, NULL, 2, 2, 71, '2016-10-19 01:06:54'),
(58, 6, NULL, 7, 2, 72, '2016-10-19 01:09:21'),
(59, 15, NULL, 20, 1, NULL, '2016-10-19 01:09:43'),
(60, 1, NULL, 2, 2, 73, '2016-10-19 14:12:29'),
(61, NULL, 1, 2, 1, NULL, '2016-10-19 14:16:43'),
(62, 4, NULL, 2, 2, 74, '2016-10-19 14:21:23'),
(63, 1, NULL, 8, 2, 75, '2016-10-19 16:06:23'),
(64, 1, NULL, 8, 2, 80, '2016-10-20 08:18:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_plandecuentas`
--

CREATE TABLE `m_plandecuentas` (
  `cod_cuenta` varchar(11) NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m_plandecuentas`
--

INSERT INTO `m_plandecuentas` (`cod_cuenta`, `detalle`, `tipo`) VALUES
('1', 'Caja y Bancos', 'Activo'),
('1.1.1', 'Caja', 'Activo'),
('1.1.2 ', 'Banco', 'Activo'),
('1.1.3', 'Valores a Depositar', 'Activo'),
('1.2 ', 'Creditos', 'Activo'),
('1.2.1', 'Deudores por Venta', 'Activo'),
('1.2.2', 'Documentos a Cobrar', 'Activo'),
('1.3', 'Bienes de Cambio', 'Activo'),
('1.3.1', 'Mercaderias', 'Activo'),
('1.3.2', 'Materias Primas', 'Activo'),
('1.4', 'Bienes de Uso', 'Activo'),
('1.4.1', 'Muebles y Utiles', 'Activo'),
('1.4.2', 'Instalaciones', 'Activo'),
('1.4.3', 'Rodados', 'Activo'),
('1.4.4', 'Inmuebles', 'Activo'),
('1.4.5', 'Terrenos', 'Activo'),
('1.4.6', 'Equipos de Computacion', 'Activo'),
('2.1', 'Deudas', 'Pasivo'),
('2.1.1', 'Proveedores', 'Pasivo'),
('2.1.2', 'Acreedores Varios', 'Pasivo'),
('2.1.3', 'Documentos a Pagar', 'Pasivo'),
('3.1', 'Capital', 'Patrimonio Neto'),
('3.2', 'Reserva Legal', 'Patrimonio Neto'),
('3.3', 'Resultado del Ejercicio', 'Patrimonio Neto'),
('4.1', 'Costo de Mercaderias Vendidas', 'Gastos'),
('4.2', 'Gastos Generales', 'Gastos'),
('4.3', 'Alquileres Pagados', 'Gastos'),
('4.4', 'Sueldos y Jornales', 'Gastos'),
('4.5', 'Seguros', 'Gastos'),
('4.6', 'Fletes y Acarreos', 'Gastos'),
('4.7', 'Gastos de Libreria', 'Gastos'),
('5.1', 'Ventas', 'Ingresos'),
('5.2', 'Alquileres Cobrados', 'Ingresos'),
('5.3', 'Seguros Cobrados', 'Ingresos'),
('0', '', '');

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
(1, 'Tower Cat V.1', 55, NULL, 1822, NULL, '2016-10-20 08:18:06'),
(3, 'Tower Cat V.5', 64, 2826.9, 2920, '2016-10-14', '2016-10-19 01:06:54'),
(4, 'Arenero Paw Paw xd', 88, 1067.8, 1200, '2016-10-15', '2016-10-19 14:21:23'),
(6, 'Rascador de Gatos', 40, 733.55, 800, '2016-10-16', '2016-10-19 01:09:21'),
(15, 'Wea', 20, 657.3, 600, '2016-10-18', '2016-10-19 01:09:43');

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
(12, 'Prueba', 789, '7788999', 'av prue'),
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
(6, 3, 2, '2016-10-16'),
(7, 1, 3, '2016-10-18'),
(8, 2, 1, '2016-10-18'),
(9, 1, 2, '2016-10-18'),
(10, 1, 202, '2016-10-18'),
(11, 2, 22, '2016-10-18'),
(12, 3, 2, '2016-10-18'),
(13, 3, 44, '2016-10-18'),
(15, 1, 2, '2016-10-18');

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
(3, 6, 15, 580.75, '2016-10-16'),
(4, 7, 2, 765, '2016-10-18'),
(5, 8, 0, 120, '2016-10-18'),
(6, 9, 0, 500, '2016-10-18'),
(7, 10, 20, 60600, '2016-10-18'),
(8, 11, 12, 2956.8, '2016-10-18'),
(9, 12, 2, 5.1, '2016-10-18'),
(10, 13, 20, 132, '2016-10-18'),
(11, 15, 20, 600, '2016-10-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m_asientoscontables`
--
ALTER TABLE `m_asientoscontables`
  ADD PRIMARY KEY (`cod_asiento`),
  ADD UNIQUE KEY `num_asiento` (`num_asiento`);

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
-- Indices de la tabla `m_detalleasiento`
--
ALTER TABLE `m_detalleasiento`
  ADD PRIMARY KEY (`cod_detalleasiento`);

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
-- Indices de la tabla `m_operaciones`
--
ALTER TABLE `m_operaciones`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `m_plandecuentas`
--
ALTER TABLE `m_plandecuentas`
  ADD UNIQUE KEY `cod_cuenta` (`cod_cuenta`);

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
-- Indices de la tabla `t_costosvariables`
--
ALTER TABLE `t_costosvariables`
  ADD PRIMARY KEY (`cod_costosvariables`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `m_asientoscontables`
--
ALTER TABLE `m_asientoscontables`
  MODIFY `cod_asiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `m_clientes`
--
ALTER TABLE `m_clientes`
  MODIFY `cod_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `m_costosfijos`
--
ALTER TABLE `m_costosfijos`
  MODIFY `cod_costosfijos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `m_costosgeneral`
--
ALTER TABLE `m_costosgeneral`
  MODIFY `cod_costos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `m_detalleasiento`
--
ALTER TABLE `m_detalleasiento`
  MODIFY `cod_detalleasiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `m_detalle_factura`
--
ALTER TABLE `m_detalle_factura`
  MODIFY `cod_detalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `m_facturas`
--
ALTER TABLE `m_facturas`
  MODIFY `cod_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `m_materiales`
--
ALTER TABLE `m_materiales`
  MODIFY `cod_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `m_operaciones`
--
ALTER TABLE `m_operaciones`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `m_productos`
--
ALTER TABLE `m_productos`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
-- AUTO_INCREMENT de la tabla `t_costosvariables`
--
ALTER TABLE `t_costosvariables`
  MODIFY `cod_costosvariables` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

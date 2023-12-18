-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 02:29:40
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
-- Base de datos: `senatech`
--
DROP DATABASE IF EXISTS `senatech`;
CREATE DATABASE `senatech`;
USE `senatech`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `adm_id` int(11) NOT NULL,
  `adm_nombre1` varchar(50) NOT NULL,
  `adm_nombre2` varchar(50) DEFAULT NULL,
  `adm_apellido1` varchar(50) NOT NULL,
  `adm_apellido2` varchar(50) DEFAULT NULL,
  `adm_correo` varchar(100) NOT NULL,
  `adm_telefono` varchar(20) DEFAULT NULL,
  `adm_direccion` varchar(100) DEFAULT NULL,
  `adm_foto` varchar(300) DEFAULT NULL,
  `adm_contrasena` varchar(100) NOT NULL,
  `adm_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`adm_id`, `adm_nombre1`, `adm_nombre2`, `adm_apellido1`, `adm_apellido2`, `adm_correo`, `adm_telefono`, `adm_direccion`, `adm_foto`, `adm_contrasena`, `adm_registro`) VALUES
(1, 'Super', '', 'Administrador', '', 'superadmin@gmail.com', '3006188395', 'z', 'sakuna-de-jujutsu-kaisen_3840x2160_xtrafondos.com.jpg', '395df8f7c51f007019cb30201c49e884b46b92fa', '2023-12-11 01:27:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `dep_id` int(2) NOT NULL,
  `dep_nombre` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`dep_id`, `dep_nombre`) VALUES
(5, 'ANTIOQUIA'),
(8, 'ATLÁNTICO'),
(11, 'BOGOTÁ D.C.'),
(13, 'BOLÍVAR'),
(15, 'BOYACÁ'),
(17, 'CALDAS'),
(18, 'CAQUETÁ'),
(19, 'CAUCA'),
(20, 'CESAR'),
(23, 'CÓRDOBA'),
(25, 'CUNDINAMARCA'),
(27, 'CHOCÓ'),
(41, 'HUILA'),
(44, 'LA GUAJIRA'),
(47, 'MAGDALENA'),
(50, 'META'),
(52, 'NARIÑO'),
(54, 'NORTE DE SANTANDER'),
(63, 'QUINDIO'),
(66, 'RISARALDA'),
(68, 'SANTANDER'),
(70, 'SUCRE'),
(73, 'TOLIMA'),
(76, 'VALLE DEL CAUCA'),
(81, 'ARAUCA'),
(85, 'CASANARE'),
(86, 'PUTUMAYO'),
(88, 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA'),
(91, 'AMAZONAS'),
(94, 'GUAINÍA'),
(95, 'GUAVIARE'),
(97, 'VAUPÉS'),
(99, 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `emp_id` int(11) NOT NULL,
  `emp_nombre` varchar(100) NOT NULL,
  `emp_correo` varchar(100) NOT NULL,
  `emp_telefono` varchar(20) DEFAULT NULL,
  `emp_direccion` varchar(200) NOT NULL,
  `emp_contrasena` varchar(200) DEFAULT NULL,
  `emp_logo` varchar(300) DEFAULT NULL,
  `emp_sitio_web` varchar(100) DEFAULT NULL,
  `emp_municipioFK` int(11) DEFAULT NULL,
  `emp_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`emp_id`, `emp_nombre`, `emp_correo`, `emp_telefono`, `emp_direccion`, `emp_contrasena`, `emp_logo`, `emp_sitio_web`, `emp_municipioFK`, `emp_registro`) VALUES
(2, 'POSTOBON SAS', 'postobon@gmail.com', '87405981', 'calle 44 # 34 - 52', '$argon2i$v=19$m=65536,t=4,p=1$OUVwRy56cWdpSzJuR21wMg$OC1uWHYRNzvWCeWXAeey6z7F/5KISb8IPACFAzNC9d4', NULL, NULL, 527, '2023-10-20 20:45:25'),
(3, 'ENVIA', 'envia@gmail.com', '86978502', 'calle 30', '$argon2i$v=19$m=65536,t=4,p=1$ekEyZjlxYllnNjBiWmZYbQ$BRAmOIOruu1cHxy2RPT4uokQgCCPKG1XxYJkk2dneGY', NULL, NULL, 88, '2023-10-20 20:56:02'),
(4, 'COORDINADORA', 'coordinadora@gmail.com', '3457659451', 'calle 30', '$argon2i$v=19$m=65536,t=4,p=1$LlhzOGZDL0dtanZhZHRvZg$2WiUwe7ALYWtA/HalCDnJw6YpqHSjwvOw9Ze4C/xISI', NULL, NULL, 88, '2023-11-17 15:54:47'),
(5, 'HOMECENTER', 'homecenter@gmail.com', '86357645', 'calle 30', '$argon2i$v=19$m=65536,t=4,p=1$eXhMaEZxOTQveW1oTGN5NA$bQBnCob54ygcBcIm+QLyvdMh83M01+pv9NJqaDYf5RQ', NULL, NULL, 88, '2023-10-27 01:52:52'),
(6, 'COLCHONES', 'colchones@gmail.com', '3006758897', 'calle 30', '$argon2i$v=19$m=65536,t=4,p=1$bkxyNndIeElWaU1yYVRsNg$Bw42ldRQG1+5MGd99kzZ5aTqwjaJmvimpF6Cun+7vPg', NULL, NULL, 88, '2023-12-04 15:28:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`est_id`, `est_nombre`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_captura`
--

CREATE TABLE `motor_captura` (
  `capmot_id` int(11) NOT NULL COMMENT 'identificador',
  `capmot_serie` varchar(20) NOT NULL COMMENT 'serie',
  `capmot_temperatura` varchar(10) NOT NULL COMMENT 'temperatura',
  `capmot_vibracion` varchar(10) NOT NULL COMMENT 'vibración',
  `capmot_fecha` varchar(10) NOT NULL DEFAULT date_format(current_timestamp(),'%d/%m/%Y') COMMENT 'fecha',
  `capmot_hora` time DEFAULT curtime() COMMENT 'hora'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_captura`
--

INSERT INTO `motor_captura` (`capmot_id`, `capmot_serie`, `capmot_temperatura`, `capmot_vibracion`, `capmot_fecha`, `capmot_hora`) VALUES
(1, 'IEC44', '34', '26.7', '09/10/2023', '12:09:06'),
(2, 'IEC44', '37', '23.4', '09/10/2023', '15:51:30'),
(3, 'IEC44', '33', '27.4', '09/10/2023', '15:52:17'),
(4, 'IEC44', '30', '25.3', '09/10/2023', '16:22:43'),
(5, 'IEC44', '30', '26.3', '10/10/2023', '11:11:05'),
(6, 'IEC44', '28', '24.7', '10/10/2023', '11:12:42'),
(7, 'IEC44', '28', '24.6', '10/10/2023', '11:14:22'),
(8, 'IEC45', '30', '27.6', '14/10/2023', '08:49:28'),
(9, 'IEC45', '35', '29.3', '14/10/2023', '08:49:44'),
(10, 'IEC45', '33', '27.3', '14/10/2023', '08:51:03'),
(11, 'IEC45', '35', '28.3', '19/10/2023', '09:02:42'),
(12, 'IEC45', '34', '27.3', '19/10/2023', '09:03:06'),
(13, 'IEC45', '33', '26.3', '19/10/2023', '09:03:19'),
(14, 'IEC45', '34', '27.3', '19/10/2023', '09:03:29'),
(18, 'IEC45', '32', '29.3', '19/10/2023', '10:27:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_carcasa`
--

CREATE TABLE `motor_carcasa` (
  `carmot_id` int(11) NOT NULL,
  `carmot_valor` int(10) NOT NULL,
  `carmot_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_carcasa`
--

INSERT INTO `motor_carcasa` (`carmot_id`, `carmot_valor`, `carmot_nombre`) VALUES
(1, 63, 'carcasa estandar'),
(2, 63, 'carcasa estandar'),
(3, 63, 'carcasa estandar'),
(4, 71, 'carcasa estandar'),
(5, 71, 'carcasa estandar'),
(6, 61, 'carcasa estandar'),
(7, 61, 'carcasa estandar'),
(8, 71, 'carcasa estandar'),
(9, 71, 'carcasa estandar'),
(10, 71, 'carcasa estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_eficiencia`
--

CREATE TABLE `motor_eficiencia` (
  `efimot_id` int(11) NOT NULL,
  `efimot_porcentajeFK` int(11) NOT NULL COMMENT '%',
  `efimot_valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_eficiencia`
--

INSERT INTO `motor_eficiencia` (`efimot_id`, `efimot_porcentajeFK`, `efimot_valor`) VALUES
(1, 1, 54),
(2, 2, 61),
(3, 3, 64),
(4, 1, 60),
(5, 1, 60),
(6, 1, 64),
(7, 1, 64),
(8, 2, 60),
(9, 2, 60),
(10, 1, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_factor_potencia`
--

CREATE TABLE `motor_factor_potencia` (
  `facpotmot_id` int(11) NOT NULL,
  `facpotmot_porcentajeFK` int(10) NOT NULL,
  `facpotmot_valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_factor_potencia`
--

INSERT INTO `motor_factor_potencia` (`facpotmot_id`, `facpotmot_porcentajeFK`, `facpotmot_valor`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 3, 1),
(4, 2, 1),
(5, 2, 2),
(6, 2, 2),
(7, 2, 0),
(8, 1, 0),
(9, 1, 0),
(10, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_informacion`
--

CREATE TABLE `motor_informacion` (
  `infmot_id` int(11) NOT NULL,
  `infmot_serie` varchar(20) NOT NULL,
  `infmot_normaFK` int(11) NOT NULL,
  `infmot_frecuencia` varchar(10) NOT NULL DEFAULT '60' COMMENT 'Hz',
  `infmot_vol_nominal` varchar(10) NOT NULL DEFAULT '220/440' COMMENT 'V',
  `infmot_polos` int(10) NOT NULL,
  `infmot_potencia` varchar(10) NOT NULL COMMENT 'kW',
  `infmot_IpIn` varchar(10) NOT NULL,
  `infmot_par_arranque` int(10) NOT NULL COMMENT '%',
  `infmot_par_maxima` int(10) NOT NULL COMMENT '%',
  `infmot_mom_inercia` varchar(10) NOT NULL COMMENT 'kgm2',
  `infmot_tiempo_rotor_bloq` int(10) NOT NULL COMMENT 's',
  `infmot_peso` varchar(10) NOT NULL COMMENT 'kg',
  `infmot_niv_ruido` int(10) NOT NULL COMMENT 'dB(A)',
  `infmot_factor_servicio` varchar(10) NOT NULL,
  `infmot_rotacion_nominal` int(10) NOT NULL COMMENT 'rpm',
  `infmot_corriente_nominal` varchar(20) NOT NULL COMMENT 'A',
  `infmot_altitud` int(10) NOT NULL COMMENT 'm',
  `infmot_temp_ambiente` varchar(20) NOT NULL COMMENT '°C',
  `infmot_proteccion` varchar(10) NOT NULL,
  `infmot_carcasaFK` int(11) NOT NULL,
  `infmot_eficienciaFK` int(11) NOT NULL,
  `infmot_fac_potenciaFK` int(11) NOT NULL,
  `infmot_empresaFK` int(11) DEFAULT NULL COMMENT 'usuario encargado',
  `infmot_tecnicoFK` int(11) DEFAULT NULL COMMENT 'tecnico encargado',
  `infmot_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `infmot_estadoFK` int(1) DEFAULT 1,
  `infmot_ubicacionFK` int(11) DEFAULT NULL,
  `infmot_tipoFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_informacion`
--

INSERT INTO `motor_informacion` (`infmot_id`, `infmot_serie`, `infmot_normaFK`, `infmot_frecuencia`, `infmot_vol_nominal`, `infmot_polos`, `infmot_potencia`, `infmot_IpIn`, `infmot_par_arranque`, `infmot_par_maxima`, `infmot_mom_inercia`, `infmot_tiempo_rotor_bloq`, `infmot_peso`, `infmot_niv_ruido`, `infmot_factor_servicio`, `infmot_rotacion_nominal`, `infmot_corriente_nominal`, `infmot_altitud`, `infmot_temp_ambiente`, `infmot_proteccion`, `infmot_carcasaFK`, `infmot_eficienciaFK`, `infmot_fac_potenciaFK`, `infmot_empresaFK`, `infmot_tecnicoFK`, `infmot_registro`, `infmot_estadoFK`, `infmot_ubicacionFK`, `infmot_tipoFK`) VALUES
(1, 'IEC44', 1, '60', '220/440', 2, '0.12', '6.3', 330, 320, '0.00010', 30, '5.7', 56, '1.25', 3410, '0.660', 1000, '-20 - +40', 'IPW55', 1, 1, 1, 2, 1, '2023-11-07 20:01:04', 1, 1, 1),
(2, 'IEC45', 1, '60', '220/440', 4, '0.12', '5', 270, 330, '0.00049', 48, '6.7', 48, '1.25', 1725, '0.734', 1000, '-20 - +40', 'IPW55', 2, 2, 2, 3, 2, '2023-11-07 20:01:16', 2, 2, 2),
(3, 'IEC46', 1, '60', '220/440', 3, '0.12', '5.7', 300, 330, '0.00030', 35, '4.7', 52, '1.25', 2520, '0.700', 1000, '-20 - +40', 'IPW55', 5, 5, 5, 4, 1043584983, '2023-11-15 20:16:54', 1, 3, 3),
(4, 'IEC47', 1, '60', '220/440', 4, '0.15', '5.9', 310, 320, '0.00025', 30, '5', 59, '1.3', 2620, '0.645', 1000, '-20 - +40', 'IPW55', 6, 6, 6, 4, 1043667042, '2023-11-16 14:17:49', 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_norma`
--

CREATE TABLE `motor_norma` (
  `normot_id` int(11) NOT NULL,
  `normot_nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_norma`
--

INSERT INTO `motor_norma` (`normot_id`, `normot_nombre`) VALUES
(1, 'IEC'),
(2, 'NEMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_tipo`
--

CREATE TABLE `motor_tipo` (
  `tipmot_id` int(11) NOT NULL,
  `tipmot_nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_tipo`
--

INSERT INTO `motor_tipo` (`tipmot_id`, `tipmot_nombre`) VALUES
(1, 'Tipo 1'),
(2, 'Tipo 2'),
(3, 'Tipo 3'),
(4, 'Tipo 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motor_ubicacion`
--

CREATE TABLE `motor_ubicacion` (
  `ubimot_id` int(11) NOT NULL,
  `ubimot_area` varchar(200) NOT NULL,
  `ubimot_empresaFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motor_ubicacion`
--

INSERT INTO `motor_ubicacion` (`ubimot_id`, `ubimot_area`, `ubimot_empresaFK`) VALUES
(1, 'a', 4),
(2, 'b', 4),
(3, 'c', 4),
(4, 'ab', 6),
(5, 'bb', 6),
(6, 'cb', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `mun_id` int(11) NOT NULL,
  `mun_nombre` varchar(255) NOT NULL DEFAULT '',
  `mun_departamentoFK` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`mun_id`, `mun_nombre`, `mun_departamentoFK`) VALUES
(1, 'Abriaquí', 5),
(2, 'Acacías', 50),
(3, 'Acandí', 27),
(4, 'Acevedo', 41),
(5, 'Achí', 13),
(6, 'Agrado', 41),
(7, 'Agua de Dios', 25),
(8, 'Aguachica', 20),
(9, 'Aguada', 68),
(10, 'Aguadas', 17),
(11, 'Aguazul', 85),
(12, 'Agustín Codazzi', 20),
(13, 'Aipe', 41),
(14, 'Albania', 18),
(15, 'Albania', 44),
(16, 'Albania', 68),
(17, 'Albán', 25),
(18, 'Albán (San José)', 52),
(19, 'Alcalá', 76),
(20, 'Alejandria', 5),
(21, 'Algarrobo', 47),
(22, 'Algeciras', 41),
(23, 'Almaguer', 19),
(24, 'Almeida', 15),
(25, 'Alpujarra', 73),
(26, 'Altamira', 41),
(27, 'Alto Baudó (Pie de Pato)', 27),
(28, 'Altos del Rosario', 13),
(29, 'Alvarado', 73),
(30, 'Amagá', 5),
(31, 'Amalfi', 5),
(32, 'Ambalema', 73),
(33, 'Anapoima', 25),
(34, 'Ancuya', 52),
(35, 'Andalucía', 76),
(36, 'Andes', 5),
(37, 'Angelópolis', 5),
(38, 'Angostura', 5),
(39, 'Anolaima', 25),
(40, 'Anorí', 5),
(41, 'Anserma', 17),
(42, 'Ansermanuevo', 76),
(43, 'Anzoátegui', 73),
(44, 'Anzá', 5),
(45, 'Apartadó', 5),
(46, 'Apulo', 25),
(47, 'Apía', 66),
(48, 'Aquitania', 15),
(49, 'Aracataca', 47),
(50, 'Aranzazu', 17),
(51, 'Aratoca', 68),
(52, 'Arauca', 81),
(53, 'Arauquita', 81),
(54, 'Arbeláez', 25),
(55, 'Arboleda (Berruecos)', 52),
(56, 'Arboledas', 54),
(57, 'Arboletes', 5),
(58, 'Arcabuco', 15),
(59, 'Arenal', 13),
(60, 'Argelia', 5),
(61, 'Argelia', 19),
(62, 'Argelia', 76),
(63, 'Ariguaní (El Difícil)', 47),
(64, 'Arjona', 13),
(65, 'Armenia', 5),
(66, 'Armenia', 63),
(67, 'Armero (Guayabal)', 73),
(68, 'Arroyohondo', 13),
(69, 'Astrea', 20),
(70, 'Ataco', 73),
(71, 'Atrato (Yuto)', 27),
(72, 'Ayapel', 23),
(73, 'Bagadó', 27),
(74, 'Bahía Solano (Mútis)', 27),
(75, 'Bajo Baudó (Pizarro)', 27),
(76, 'Balboa', 19),
(77, 'Balboa', 66),
(78, 'Baranoa', 8),
(79, 'Baraya', 41),
(80, 'Barbacoas', 52),
(81, 'Barbosa', 5),
(82, 'Barbosa', 68),
(83, 'Barichara', 68),
(84, 'Barranca de Upía', 50),
(85, 'Barrancabermeja', 68),
(86, 'Barrancas', 44),
(87, 'Barranco de Loba', 13),
(88, 'Barranquilla', 8),
(89, 'Becerríl', 20),
(90, 'Belalcázar', 17),
(91, 'Bello', 5),
(92, 'Belmira', 5),
(93, 'Beltrán', 25),
(94, 'Belén', 15),
(95, 'Belén', 52),
(96, 'Belén de Bajirá', 27),
(97, 'Belén de Umbría', 66),
(98, 'Belén de los Andaquíes', 18),
(99, 'Berbeo', 15),
(100, 'Betania', 5),
(101, 'Beteitiva', 15),
(102, 'Betulia', 5),
(103, 'Betulia', 68),
(104, 'Bituima', 25),
(105, 'Boavita', 15),
(106, 'Bochalema', 54),
(107, 'Bogotá D.C.', 11),
(108, 'Bojacá', 25),
(109, 'Bojayá (Bellavista)', 27),
(110, 'Bolívar', 5),
(111, 'Bolívar', 19),
(112, 'Bolívar', 68),
(113, 'Bolívar', 76),
(114, 'Bosconia', 20),
(115, 'Boyacá', 15),
(116, 'Briceño', 5),
(117, 'Briceño', 15),
(118, 'Bucaramanga', 68),
(119, 'Bucarasica', 54),
(120, 'Buenaventura', 76),
(121, 'Buenavista', 15),
(122, 'Buenavista', 23),
(123, 'Buenavista', 63),
(124, 'Buenavista', 70),
(125, 'Buenos Aires', 19),
(126, 'Buesaco', 52),
(127, 'Buga', 76),
(128, 'Bugalagrande', 76),
(129, 'Burítica', 5),
(130, 'Busbanza', 15),
(131, 'Cabrera', 25),
(132, 'Cabrera', 68),
(133, 'Cabuyaro', 50),
(134, 'Cachipay', 25),
(135, 'Caicedo', 5),
(136, 'Caicedonia', 76),
(137, 'Caimito', 70),
(138, 'Cajamarca', 73),
(139, 'Cajibío', 19),
(140, 'Cajicá', 25),
(141, 'Calamar', 13),
(142, 'Calamar', 95),
(143, 'Calarcá', 63),
(144, 'Caldas', 5),
(145, 'Caldas', 15),
(146, 'Caldono', 19),
(147, 'California', 68),
(148, 'Calima (Darién)', 76),
(149, 'Caloto', 19),
(150, 'Calí', 76),
(151, 'Campamento', 5),
(152, 'Campo de la Cruz', 8),
(153, 'Campoalegre', 41),
(154, 'Campohermoso', 15),
(155, 'Canalete', 23),
(156, 'Candelaria', 8),
(157, 'Candelaria', 76),
(158, 'Cantagallo', 13),
(159, 'Cantón de San Pablo', 27),
(160, 'Caparrapí', 25),
(161, 'Capitanejo', 68),
(162, 'Caracolí', 5),
(163, 'Caramanta', 5),
(164, 'Carcasí', 68),
(165, 'Carepa', 5),
(166, 'Carmen de Apicalá', 73),
(167, 'Carmen de Carupa', 25),
(168, 'Carmen de Viboral', 5),
(169, 'Carmen del Darién (CURBARADÓ)', 27),
(170, 'Carolina', 5),
(171, 'Cartagena', 13),
(172, 'Cartagena del Chairá', 18),
(173, 'Cartago', 76),
(174, 'Carurú', 97),
(175, 'Casabianca', 73),
(176, 'Castilla la Nueva', 50),
(177, 'Caucasia', 5),
(178, 'Cañasgordas', 5),
(179, 'Cepita', 68),
(180, 'Cereté', 23),
(181, 'Cerinza', 15),
(182, 'Cerrito', 68),
(183, 'Cerro San Antonio', 47),
(184, 'Chachaguí', 52),
(185, 'Chaguaní', 25),
(186, 'Chalán', 70),
(187, 'Chaparral', 73),
(188, 'Charalá', 68),
(189, 'Charta', 68),
(190, 'Chigorodó', 5),
(191, 'Chima', 68),
(192, 'Chimichagua', 20),
(193, 'Chimá', 23),
(194, 'Chinavita', 15),
(195, 'Chinchiná', 17),
(196, 'Chinácota', 54),
(197, 'Chinú', 23),
(198, 'Chipaque', 25),
(199, 'Chipatá', 68),
(200, 'Chiquinquirá', 15),
(201, 'Chiriguaná', 20),
(202, 'Chiscas', 15),
(203, 'Chita', 15),
(204, 'Chitagá', 54),
(205, 'Chitaraque', 15),
(206, 'Chivatá', 15),
(207, 'Chivolo', 47),
(208, 'Choachí', 25),
(209, 'Chocontá', 25),
(210, 'Chámeza', 85),
(211, 'Chía', 25),
(212, 'Chíquiza', 15),
(213, 'Chívor', 15),
(214, 'Cicuco', 13),
(215, 'Cimitarra', 68),
(216, 'Circasia', 63),
(217, 'Cisneros', 5),
(218, 'Ciénaga', 15),
(219, 'Ciénaga', 47),
(220, 'Ciénaga de Oro', 23),
(221, 'Clemencia', 13),
(222, 'Cocorná', 5),
(223, 'Coello', 73),
(224, 'Cogua', 25),
(225, 'Colombia', 41),
(226, 'Colosó (Ricaurte)', 70),
(227, 'Colón', 86),
(228, 'Colón (Génova)', 52),
(229, 'Concepción', 5),
(230, 'Concepción', 68),
(231, 'Concordia', 5),
(232, 'Concordia', 47),
(233, 'Condoto', 27),
(234, 'Confines', 68),
(235, 'Consaca', 52),
(236, 'Contadero', 52),
(237, 'Contratación', 68),
(238, 'Convención', 54),
(239, 'Copacabana', 5),
(240, 'Coper', 15),
(241, 'Cordobá', 63),
(242, 'Corinto', 19),
(243, 'Coromoro', 68),
(244, 'Corozal', 70),
(245, 'Corrales', 15),
(246, 'Cota', 25),
(247, 'Cotorra', 23),
(248, 'Covarachía', 15),
(249, 'Coveñas', 70),
(250, 'Coyaima', 73),
(251, 'Cravo Norte', 81),
(252, 'Cuaspud (Carlosama)', 52),
(253, 'Cubarral', 50),
(254, 'Cubará', 15),
(255, 'Cucaita', 15),
(256, 'Cucunubá', 25),
(257, 'Cucutilla', 54),
(258, 'Cuitiva', 15),
(259, 'Cumaral', 50),
(260, 'Cumaribo', 99),
(261, 'Cumbal', 52),
(262, 'Cumbitara', 52),
(263, 'Cunday', 73),
(264, 'Curillo', 18),
(265, 'Curití', 68),
(266, 'Curumaní', 20),
(267, 'Cáceres', 5),
(268, 'Cáchira', 54),
(269, 'Cácota', 54),
(270, 'Cáqueza', 25),
(271, 'Cértegui', 27),
(272, 'Cómbita', 15),
(273, 'Córdoba', 13),
(274, 'Córdoba', 52),
(275, 'Cúcuta', 54),
(276, 'Dabeiba', 5),
(277, 'Dagua', 76),
(278, 'Dibulla', 44),
(279, 'Distracción', 44),
(280, 'Dolores', 73),
(281, 'Don Matías', 5),
(282, 'Dos Quebradas', 66),
(283, 'Duitama', 15),
(284, 'Durania', 54),
(285, 'Ebéjico', 5),
(286, 'El Bagre', 5),
(287, 'El Banco', 47),
(288, 'El Cairo', 76),
(289, 'El Calvario', 50),
(290, 'El Carmen', 54),
(291, 'El Carmen', 68),
(292, 'El Carmen de Atrato', 27),
(293, 'El Carmen de Bolívar', 13),
(294, 'El Castillo', 50),
(295, 'El Cerrito', 76),
(296, 'El Charco', 52),
(297, 'El Cocuy', 15),
(298, 'El Colegio', 25),
(299, 'El Copey', 20),
(300, 'El Doncello', 18),
(301, 'El Dorado', 50),
(302, 'El Dovio', 76),
(303, 'El Espino', 15),
(304, 'El Guacamayo', 68),
(305, 'El Guamo', 13),
(306, 'El Molino', 44),
(307, 'El Paso', 20),
(308, 'El Paujil', 18),
(309, 'El Peñol', 52),
(310, 'El Peñon', 13),
(311, 'El Peñon', 68),
(312, 'El Peñón', 25),
(313, 'El Piñon', 47),
(314, 'El Playón', 68),
(315, 'El Retorno', 95),
(316, 'El Retén', 47),
(317, 'El Roble', 70),
(318, 'El Rosal', 25),
(319, 'El Rosario', 52),
(320, 'El Tablón de Gómez', 52),
(321, 'El Tambo', 19),
(322, 'El Tambo', 52),
(323, 'El Tarra', 54),
(324, 'El Zulia', 54),
(325, 'El Águila', 76),
(326, 'Elías', 41),
(327, 'Encino', 68),
(328, 'Enciso', 68),
(329, 'Entrerríos', 5),
(330, 'Envigado', 5),
(331, 'Espinal', 73),
(332, 'Facatativá', 25),
(333, 'Falan', 73),
(334, 'Filadelfia', 17),
(335, 'Filandia', 63),
(336, 'Firavitoba', 15),
(337, 'Flandes', 73),
(338, 'Florencia', 18),
(339, 'Florencia', 19),
(340, 'Floresta', 15),
(341, 'Florida', 76),
(342, 'Floridablanca', 68),
(343, 'Florián', 68),
(344, 'Fonseca', 44),
(345, 'Fortúl', 81),
(346, 'Fosca', 25),
(347, 'Francisco Pizarro', 52),
(348, 'Fredonia', 5),
(349, 'Fresno', 73),
(350, 'Frontino', 5),
(351, 'Fuente de Oro', 50),
(352, 'Fundación', 47),
(353, 'Funes', 52),
(354, 'Funza', 25),
(355, 'Fusagasugá', 25),
(356, 'Fómeque', 25),
(357, 'Fúquene', 25),
(358, 'Gachalá', 25),
(359, 'Gachancipá', 25),
(360, 'Gachantivá', 15),
(361, 'Gachetá', 25),
(362, 'Galapa', 8),
(363, 'Galeras (Nueva Granada)', 70),
(364, 'Galán', 68),
(365, 'Gama', 25),
(366, 'Gamarra', 20),
(367, 'Garagoa', 15),
(368, 'Garzón', 41),
(369, 'Gigante', 41),
(370, 'Ginebra', 76),
(371, 'Giraldo', 5),
(372, 'Girardot', 25),
(373, 'Girardota', 5),
(374, 'Girón', 68),
(375, 'Gonzalez', 20),
(376, 'Gramalote', 54),
(377, 'Granada', 5),
(378, 'Granada', 25),
(379, 'Granada', 50),
(380, 'Guaca', 68),
(381, 'Guacamayas', 15),
(382, 'Guacarí', 76),
(383, 'Guachavés', 52),
(384, 'Guachené', 19),
(385, 'Guachetá', 25),
(386, 'Guachucal', 52),
(387, 'Guadalupe', 5),
(388, 'Guadalupe', 41),
(389, 'Guadalupe', 68),
(390, 'Guaduas', 25),
(391, 'Guaitarilla', 52),
(392, 'Gualmatán', 52),
(393, 'Guamal', 47),
(394, 'Guamal', 50),
(395, 'Guamo', 73),
(396, 'Guapota', 68),
(397, 'Guapí', 19),
(398, 'Guaranda', 70),
(399, 'Guarne', 5),
(400, 'Guasca', 25),
(401, 'Guatapé', 5),
(402, 'Guataquí', 25),
(403, 'Guatavita', 25),
(404, 'Guateque', 15),
(405, 'Guavatá', 68),
(406, 'Guayabal de Siquima', 25),
(407, 'Guayabetal', 25),
(408, 'Guayatá', 15),
(409, 'Guepsa', 68),
(410, 'Guicán', 15),
(411, 'Gutiérrez', 25),
(412, 'Guática', 66),
(413, 'Gámbita', 68),
(414, 'Gámeza', 15),
(415, 'Génova', 63),
(416, 'Gómez Plata', 5),
(417, 'Hacarí', 54),
(418, 'Hatillo de Loba', 13),
(419, 'Hato', 68),
(420, 'Hato Corozal', 85),
(421, 'Hatonuevo', 44),
(422, 'Heliconia', 5),
(423, 'Herrán', 54),
(424, 'Herveo', 73),
(425, 'Hispania', 5),
(426, 'Hobo', 41),
(427, 'Honda', 73),
(428, 'Ibagué', 73),
(429, 'Icononzo', 73),
(430, 'Iles', 52),
(431, 'Imúes', 52),
(432, 'Inzá', 19),
(433, 'Inírida', 94),
(434, 'Ipiales', 52),
(435, 'Isnos', 41),
(436, 'Istmina', 27),
(437, 'Itagüí', 5),
(438, 'Ituango', 5),
(439, 'Izá', 15),
(440, 'Jambaló', 19),
(441, 'Jamundí', 76),
(442, 'Jardín', 5),
(443, 'Jenesano', 15),
(444, 'Jericó', 5),
(445, 'Jericó', 15),
(446, 'Jerusalén', 25),
(447, 'Jesús María', 68),
(448, 'Jordán', 68),
(449, 'Juan de Acosta', 8),
(450, 'Junín', 25),
(451, 'Juradó', 27),
(452, 'La Apartada y La Frontera', 23),
(453, 'La Argentina', 41),
(454, 'La Belleza', 68),
(455, 'La Calera', 25),
(456, 'La Capilla', 15),
(457, 'La Ceja', 5),
(458, 'La Celia', 66),
(459, 'La Cruz', 52),
(460, 'La Cumbre', 76),
(461, 'La Dorada', 17),
(462, 'La Esperanza', 54),
(463, 'La Estrella', 5),
(464, 'La Florida', 52),
(465, 'La Gloria', 20),
(466, 'La Jagua de Ibirico', 20),
(467, 'La Jagua del Pilar', 44),
(468, 'La Llanada', 52),
(469, 'La Macarena', 50),
(470, 'La Merced', 17),
(471, 'La Mesa', 25),
(472, 'La Montañita', 18),
(473, 'La Palma', 25),
(474, 'La Paz', 68),
(475, 'La Paz (Robles)', 20),
(476, 'La Peña', 25),
(477, 'La Pintada', 5),
(478, 'La Plata', 41),
(479, 'La Playa', 54),
(480, 'La Primavera', 99),
(481, 'La Salina', 85),
(482, 'La Sierra', 19),
(483, 'La Tebaida', 63),
(484, 'La Tola', 52),
(485, 'La Unión', 5),
(486, 'La Unión', 52),
(487, 'La Unión', 70),
(488, 'La Unión', 76),
(489, 'La Uvita', 15),
(490, 'La Vega', 19),
(491, 'La Vega', 25),
(492, 'La Victoria', 15),
(493, 'La Victoria', 17),
(494, 'La Victoria', 76),
(495, 'La Virginia', 66),
(496, 'Labateca', 54),
(497, 'Labranzagrande', 15),
(498, 'Landázuri', 68),
(499, 'Lebrija', 68),
(500, 'Leiva', 52),
(501, 'Lejanías', 50),
(502, 'Lenguazaque', 25),
(503, 'Leticia', 91),
(504, 'Liborina', 5),
(505, 'Linares', 52),
(506, 'Lloró', 27),
(507, 'Lorica', 23),
(508, 'Los Córdobas', 23),
(509, 'Los Palmitos', 70),
(510, 'Los Patios', 54),
(511, 'Los Santos', 68),
(512, 'Lourdes', 54),
(513, 'Luruaco', 8),
(514, 'Lérida', 73),
(515, 'Líbano', 73),
(516, 'López (Micay)', 19),
(517, 'Macanal', 15),
(518, 'Macaravita', 68),
(519, 'Maceo', 5),
(520, 'Machetá', 25),
(521, 'Madrid', 25),
(522, 'Magangué', 13),
(523, 'Magüi (Payán)', 52),
(524, 'Mahates', 13),
(525, 'Maicao', 44),
(526, 'Majagual', 70),
(527, 'Malambo', 8),
(528, 'Mallama (Piedrancha)', 52),
(529, 'Manatí', 8),
(530, 'Manaure', 44),
(531, 'Manaure Balcón del Cesar', 20),
(532, 'Manizales', 17),
(533, 'Manta', 25),
(534, 'Manzanares', 17),
(535, 'Maní', 85),
(536, 'Mapiripan', 50),
(537, 'Margarita', 13),
(538, 'Marinilla', 5),
(539, 'Maripí', 15),
(540, 'Mariquita', 73),
(541, 'Marmato', 17),
(542, 'Marquetalia', 17),
(543, 'Marsella', 66),
(544, 'Marulanda', 17),
(545, 'María la Baja', 13),
(546, 'Matanza', 68),
(547, 'Medellín', 5),
(548, 'Medina', 25),
(549, 'Medio Atrato', 27),
(550, 'Medio Baudó', 27),
(551, 'Medio San Juan (ANDAGOYA)', 27),
(552, 'Melgar', 73),
(553, 'Mercaderes', 19),
(554, 'Mesetas', 50),
(555, 'Milán', 18),
(556, 'Miraflores', 15),
(557, 'Miraflores', 95),
(558, 'Miranda', 19),
(559, 'Mistrató', 66),
(560, 'Mitú', 97),
(561, 'Mocoa', 86),
(562, 'Mogotes', 68),
(563, 'Molagavita', 68),
(564, 'Momil', 23),
(565, 'Mompós', 13),
(566, 'Mongua', 15),
(567, 'Monguí', 15),
(568, 'Moniquirá', 15),
(569, 'Montebello', 5),
(570, 'Montecristo', 13),
(571, 'Montelíbano', 23),
(572, 'Montenegro', 63),
(573, 'Monteria', 23),
(574, 'Monterrey', 85),
(575, 'Morales', 13),
(576, 'Morales', 19),
(577, 'Morelia', 18),
(578, 'Morroa', 70),
(579, 'Mosquera', 25),
(580, 'Mosquera', 52),
(581, 'Motavita', 15),
(582, 'Moñitos', 23),
(583, 'Murillo', 73),
(584, 'Murindó', 5),
(585, 'Mutatá', 5),
(586, 'Mutiscua', 54),
(587, 'Muzo', 15),
(588, 'Málaga', 68),
(589, 'Nariño', 5),
(590, 'Nariño', 25),
(591, 'Nariño', 52),
(592, 'Natagaima', 73),
(593, 'Nechí', 5),
(594, 'Necoclí', 5),
(595, 'Neira', 17),
(596, 'Neiva', 41),
(597, 'Nemocón', 25),
(598, 'Nilo', 25),
(599, 'Nimaima', 25),
(600, 'Nobsa', 15),
(601, 'Nocaima', 25),
(602, 'Norcasia', 17),
(603, 'Norosí', 13),
(604, 'Novita', 27),
(605, 'Nueva Granada', 47),
(606, 'Nuevo Colón', 15),
(607, 'Nunchía', 85),
(608, 'Nuquí', 27),
(609, 'Nátaga', 41),
(610, 'Obando', 76),
(611, 'Ocamonte', 68),
(612, 'Ocaña', 54),
(613, 'Oiba', 68),
(614, 'Oicatá', 15),
(615, 'Olaya', 5),
(616, 'Olaya Herrera', 52),
(617, 'Onzaga', 68),
(618, 'Oporapa', 41),
(619, 'Orito', 86),
(620, 'Orocué', 85),
(621, 'Ortega', 73),
(622, 'Ospina', 52),
(623, 'Otanche', 15),
(624, 'Ovejas', 70),
(625, 'Pachavita', 15),
(626, 'Pacho', 25),
(627, 'Padilla', 19),
(628, 'Paicol', 41),
(629, 'Pailitas', 20),
(630, 'Paime', 25),
(631, 'Paipa', 15),
(632, 'Pajarito', 15),
(633, 'Palermo', 41),
(634, 'Palestina', 17),
(635, 'Palestina', 41),
(636, 'Palmar', 68),
(637, 'Palmar de Varela', 8),
(638, 'Palmas del Socorro', 68),
(639, 'Palmira', 76),
(640, 'Palmito', 70),
(641, 'Palocabildo', 73),
(642, 'Pamplona', 54),
(643, 'Pamplonita', 54),
(644, 'Pandi', 25),
(645, 'Panqueba', 15),
(646, 'Paratebueno', 25),
(647, 'Pasca', 25),
(648, 'Patía (El Bordo)', 19),
(649, 'Pauna', 15),
(650, 'Paya', 15),
(651, 'Paz de Ariporo', 85),
(652, 'Paz de Río', 15),
(653, 'Pedraza', 47),
(654, 'Pelaya', 20),
(655, 'Pensilvania', 17),
(656, 'Peque', 5),
(657, 'Pereira', 66),
(658, 'Pesca', 15),
(659, 'Peñol', 5),
(660, 'Piamonte', 19),
(661, 'Pie de Cuesta', 68),
(662, 'Piedras', 73),
(663, 'Piendamó', 19),
(664, 'Pijao', 63),
(665, 'Pijiño', 47),
(666, 'Pinchote', 68),
(667, 'Pinillos', 13),
(668, 'Piojo', 8),
(669, 'Pisva', 15),
(670, 'Pital', 41),
(671, 'Pitalito', 41),
(672, 'Pivijay', 47),
(673, 'Planadas', 73),
(674, 'Planeta Rica', 23),
(675, 'Plato', 47),
(676, 'Policarpa', 52),
(677, 'Polonuevo', 8),
(678, 'Ponedera', 8),
(679, 'Popayán', 19),
(680, 'Pore', 85),
(681, 'Potosí', 52),
(682, 'Pradera', 76),
(683, 'Prado', 73),
(684, 'Providencia', 52),
(685, 'Providencia', 88),
(686, 'Pueblo Bello', 20),
(687, 'Pueblo Nuevo', 23),
(688, 'Pueblo Rico', 66),
(689, 'Pueblorrico', 5),
(690, 'Puebloviejo', 47),
(691, 'Puente Nacional', 68),
(692, 'Puerres', 52),
(693, 'Puerto Asís', 86),
(694, 'Puerto Berrío', 5),
(695, 'Puerto Boyacá', 15),
(696, 'Puerto Caicedo', 86),
(697, 'Puerto Carreño', 99),
(698, 'Puerto Colombia', 8),
(699, 'Puerto Concordia', 50),
(700, 'Puerto Escondido', 23),
(701, 'Puerto Gaitán', 50),
(702, 'Puerto Guzmán', 86),
(703, 'Puerto Leguízamo', 86),
(704, 'Puerto Libertador', 23),
(705, 'Puerto Lleras', 50),
(706, 'Puerto López', 50),
(707, 'Puerto Nare', 5),
(708, 'Puerto Nariño', 91),
(709, 'Puerto Parra', 68),
(710, 'Puerto Rico', 18),
(711, 'Puerto Rico', 50),
(712, 'Puerto Rondón', 81),
(713, 'Puerto Salgar', 25),
(714, 'Puerto Santander', 54),
(715, 'Puerto Tejada', 19),
(716, 'Puerto Triunfo', 5),
(717, 'Puerto Wilches', 68),
(718, 'Pulí', 25),
(719, 'Pupiales', 52),
(720, 'Puracé (Coconuco)', 19),
(721, 'Purificación', 73),
(722, 'Purísima', 23),
(723, 'Pácora', 17),
(724, 'Páez', 15),
(725, 'Páez (Belalcazar)', 19),
(726, 'Páramo', 68),
(727, 'Quebradanegra', 25),
(728, 'Quetame', 25),
(729, 'Quibdó', 27),
(730, 'Quimbaya', 63),
(731, 'Quinchía', 66),
(732, 'Quipama', 15),
(733, 'Quipile', 25),
(734, 'Ragonvalia', 54),
(735, 'Ramiriquí', 15),
(736, 'Recetor', 85),
(737, 'Regidor', 13),
(738, 'Remedios', 5),
(739, 'Remolino', 47),
(740, 'Repelón', 8),
(741, 'Restrepo', 50),
(742, 'Restrepo', 76),
(743, 'Retiro', 5),
(744, 'Ricaurte', 25),
(745, 'Ricaurte', 52),
(746, 'Rio Negro', 68),
(747, 'Rioblanco', 73),
(748, 'Riofrío', 76),
(749, 'Riohacha', 44),
(750, 'Risaralda', 17),
(751, 'Rivera', 41),
(752, 'Roberto Payán (San José)', 52),
(753, 'Roldanillo', 76),
(754, 'Roncesvalles', 73),
(755, 'Rondón', 15),
(756, 'Rosas', 19),
(757, 'Rovira', 73),
(758, 'Ráquira', 15),
(759, 'Río Iró', 27),
(760, 'Río Quito', 27),
(761, 'Río Sucio', 17),
(762, 'Río Viejo', 13),
(763, 'Río de oro', 20),
(764, 'Ríonegro', 5),
(765, 'Ríosucio', 27),
(766, 'Sabana de Torres', 68),
(767, 'Sabanagrande', 8),
(768, 'Sabanalarga', 5),
(769, 'Sabanalarga', 8),
(770, 'Sabanalarga', 85),
(771, 'Sabanas de San Angel (SAN ANGEL)', 47),
(772, 'Sabaneta', 5),
(773, 'Saboyá', 15),
(774, 'Sahagún', 23),
(775, 'Saladoblanco', 41),
(776, 'Salamina', 17),
(777, 'Salamina', 47),
(778, 'Salazar', 54),
(779, 'Saldaña', 73),
(780, 'Salento', 63),
(781, 'Salgar', 5),
(782, 'Samacá', 15),
(783, 'Samaniego', 52),
(784, 'Samaná', 17),
(785, 'Sampués', 70),
(786, 'San Agustín', 41),
(787, 'San Alberto', 20),
(788, 'San Andrés', 68),
(789, 'San Andrés Sotavento', 23),
(790, 'San Andrés de Cuerquía', 5),
(791, 'San Antero', 23),
(792, 'San Antonio', 73),
(793, 'San Antonio de Tequendama', 25),
(794, 'San Benito', 68),
(795, 'San Benito Abad', 70),
(796, 'San Bernardo', 25),
(797, 'San Bernardo', 52),
(798, 'San Bernardo del Viento', 23),
(799, 'San Calixto', 54),
(800, 'San Carlos', 5),
(801, 'San Carlos', 23),
(802, 'San Carlos de Guaroa', 50),
(803, 'San Cayetano', 25),
(804, 'San Cayetano', 54),
(805, 'San Cristobal', 13),
(806, 'San Diego', 20),
(807, 'San Eduardo', 15),
(808, 'San Estanislao', 13),
(809, 'San Fernando', 13),
(810, 'San Francisco', 5),
(811, 'San Francisco', 25),
(812, 'San Francisco', 86),
(813, 'San Gíl', 68),
(814, 'San Jacinto', 13),
(815, 'San Jacinto del Cauca', 13),
(816, 'San Jerónimo', 5),
(817, 'San Joaquín', 68),
(818, 'San José', 17),
(819, 'San José de Miranda', 68),
(820, 'San José de Montaña', 5),
(821, 'San José de Pare', 15),
(822, 'San José de Uré', 23),
(823, 'San José del Fragua', 18),
(824, 'San José del Guaviare', 95),
(825, 'San José del Palmar', 27),
(826, 'San Juan de Arama', 50),
(827, 'San Juan de Betulia', 70),
(828, 'San Juan de Nepomuceno', 13),
(829, 'San Juan de Pasto', 52),
(830, 'San Juan de Río Seco', 25),
(831, 'San Juan de Urabá', 5),
(832, 'San Juan del Cesar', 44),
(833, 'San Juanito', 50),
(834, 'San Lorenzo', 52),
(835, 'San Luis', 73),
(836, 'San Luís', 5),
(837, 'San Luís de Gaceno', 15),
(838, 'San Luís de Palenque', 85),
(839, 'San Marcos', 70),
(840, 'San Martín', 20),
(841, 'San Martín', 50),
(842, 'San Martín de Loba', 13),
(843, 'San Mateo', 15),
(844, 'San Miguel', 68),
(845, 'San Miguel', 86),
(846, 'San Miguel de Sema', 15),
(847, 'San Onofre', 70),
(848, 'San Pablo', 13),
(849, 'San Pablo', 52),
(850, 'San Pablo de Borbur', 15),
(851, 'San Pedro', 5),
(852, 'San Pedro', 70),
(853, 'San Pedro', 76),
(854, 'San Pedro de Cartago', 52),
(855, 'San Pedro de Urabá', 5),
(856, 'San Pelayo', 23),
(857, 'San Rafael', 5),
(858, 'San Roque', 5),
(859, 'San Sebastián', 19),
(860, 'San Sebastián de Buenavista', 47),
(861, 'San Vicente', 5),
(862, 'San Vicente del Caguán', 18),
(863, 'San Vicente del Chucurí', 68),
(864, 'San Zenón', 47),
(865, 'Sandoná', 52),
(866, 'Santa Ana', 47),
(867, 'Santa Bárbara', 5),
(868, 'Santa Bárbara', 68),
(869, 'Santa Bárbara (Iscuandé)', 52),
(870, 'Santa Bárbara de Pinto', 47),
(871, 'Santa Catalina', 13),
(872, 'Santa Fé de Antioquia', 5),
(873, 'Santa Genoveva de Docorodó', 27),
(874, 'Santa Helena del Opón', 68),
(875, 'Santa Isabel', 73),
(876, 'Santa Lucía', 8),
(877, 'Santa Marta', 47),
(878, 'Santa María', 15),
(879, 'Santa María', 41),
(880, 'Santa Rosa', 13),
(881, 'Santa Rosa', 19),
(882, 'Santa Rosa de Cabal', 66),
(883, 'Santa Rosa de Osos', 5),
(884, 'Santa Rosa de Viterbo', 15),
(885, 'Santa Rosa del Sur', 13),
(886, 'Santa Rosalía', 99),
(887, 'Santa Sofía', 15),
(888, 'Santana', 15),
(889, 'Santander de Quilichao', 19),
(890, 'Santiago', 54),
(891, 'Santiago', 86),
(892, 'Santo Domingo', 5),
(893, 'Santo Tomás', 8),
(894, 'Santuario', 5),
(895, 'Santuario', 66),
(896, 'Sapuyes', 52),
(897, 'Saravena', 81),
(898, 'Sardinata', 54),
(899, 'Sasaima', 25),
(900, 'Sativanorte', 15),
(901, 'Sativasur', 15),
(902, 'Segovia', 5),
(903, 'Sesquilé', 25),
(904, 'Sevilla', 76),
(905, 'Siachoque', 15),
(906, 'Sibaté', 25),
(907, 'Sibundoy', 86),
(908, 'Silos', 54),
(909, 'Silvania', 25),
(910, 'Silvia', 19),
(911, 'Simacota', 68),
(912, 'Simijaca', 25),
(913, 'Simití', 13),
(914, 'Sincelejo', 70),
(915, 'Sincé', 70),
(916, 'Sipí', 27),
(917, 'Sitionuevo', 47),
(918, 'Soacha', 25),
(919, 'Soatá', 15),
(920, 'Socha', 15),
(921, 'Socorro', 68),
(922, 'Socotá', 15),
(923, 'Sogamoso', 15),
(924, 'Solano', 18),
(925, 'Soledad', 8),
(926, 'Solita', 18),
(927, 'Somondoco', 15),
(928, 'Sonsón', 5),
(929, 'Sopetrán', 5),
(930, 'Soplaviento', 13),
(931, 'Sopó', 25),
(932, 'Sora', 15),
(933, 'Soracá', 15),
(934, 'Sotaquirá', 15),
(935, 'Sotara (Paispamba)', 19),
(936, 'Sotomayor (Los Andes)', 52),
(937, 'Suaita', 68),
(938, 'Suan', 8),
(939, 'Suaza', 41),
(940, 'Subachoque', 25),
(941, 'Sucre', 19),
(942, 'Sucre', 68),
(943, 'Sucre', 70),
(944, 'Suesca', 25),
(945, 'Supatá', 25),
(946, 'Supía', 17),
(947, 'Suratá', 68),
(948, 'Susa', 25),
(949, 'Susacón', 15),
(950, 'Sutamarchán', 15),
(951, 'Sutatausa', 25),
(952, 'Sutatenza', 15),
(953, 'Suárez', 19),
(954, 'Suárez', 73),
(955, 'Sácama', 85),
(956, 'Sáchica', 15),
(957, 'Tabio', 25),
(958, 'Tadó', 27),
(959, 'Talaigua Nuevo', 13),
(960, 'Tamalameque', 20),
(961, 'Tame', 81),
(962, 'Taminango', 52),
(963, 'Tangua', 52),
(964, 'Taraira', 97),
(965, 'Tarazá', 5),
(966, 'Tarqui', 41),
(967, 'Tarso', 5),
(968, 'Tasco', 15),
(969, 'Tauramena', 85),
(970, 'Tausa', 25),
(971, 'Tello', 41),
(972, 'Tena', 25),
(973, 'Tenerife', 47),
(974, 'Tenjo', 25),
(975, 'Tenza', 15),
(976, 'Teorama', 54),
(977, 'Teruel', 41),
(978, 'Tesalia', 41),
(979, 'Tibacuy', 25),
(980, 'Tibaná', 15),
(981, 'Tibasosa', 15),
(982, 'Tibirita', 25),
(983, 'Tibú', 54),
(984, 'Tierralta', 23),
(985, 'Timaná', 41),
(986, 'Timbiquí', 19),
(987, 'Timbío', 19),
(988, 'Tinjacá', 15),
(989, 'Tipacoque', 15),
(990, 'Tiquisio (Puerto Rico)', 13),
(991, 'Titiribí', 5),
(992, 'Toca', 15),
(993, 'Tocaima', 25),
(994, 'Tocancipá', 25),
(995, 'Toguí', 15),
(996, 'Toledo', 5),
(997, 'Toledo', 54),
(998, 'Tolú', 70),
(999, 'Tolú Viejo', 70),
(1000, 'Tona', 68),
(1001, 'Topagá', 15),
(1002, 'Topaipí', 25),
(1003, 'Toribío', 19),
(1004, 'Toro', 76),
(1005, 'Tota', 15),
(1006, 'Totoró', 19),
(1007, 'Trinidad', 85),
(1008, 'Trujillo', 76),
(1009, 'Tubará', 8),
(1010, 'Tuchín', 23),
(1011, 'Tulúa', 76),
(1012, 'Tumaco', 52),
(1013, 'Tunja', 15),
(1014, 'Tunungua', 15),
(1015, 'Turbaco', 13),
(1016, 'Turbaná', 13),
(1017, 'Turbo', 5),
(1018, 'Turmequé', 15),
(1019, 'Tuta', 15),
(1020, 'Tutasá', 15),
(1021, 'Támara', 85),
(1022, 'Támesis', 5),
(1023, 'Túquerres', 52),
(1024, 'Ubalá', 25),
(1025, 'Ubaque', 25),
(1026, 'Ubaté', 25),
(1027, 'Ulloa', 76),
(1028, 'Une', 25),
(1029, 'Unguía', 27),
(1030, 'Unión Panamericana (ÁNIMAS)', 27),
(1031, 'Uramita', 5),
(1032, 'Uribe', 50),
(1033, 'Uribia', 44),
(1034, 'Urrao', 5),
(1035, 'Urumita', 44),
(1036, 'Usiacuri', 8),
(1037, 'Valdivia', 5),
(1038, 'Valencia', 23),
(1039, 'Valle de San José', 68),
(1040, 'Valle de San Juan', 73),
(1041, 'Valle del Guamuez', 86),
(1042, 'Valledupar', 20),
(1043, 'Valparaiso', 5),
(1044, 'Valparaiso', 18),
(1045, 'Vegachí', 5),
(1046, 'Venadillo', 73),
(1047, 'Venecia', 5),
(1048, 'Venecia (Ospina Pérez)', 25),
(1049, 'Ventaquemada', 15),
(1050, 'Vergara', 25),
(1051, 'Versalles', 76),
(1052, 'Vetas', 68),
(1053, 'Viani', 25),
(1054, 'Vigía del Fuerte', 5),
(1055, 'Vijes', 76),
(1056, 'Villa Caro', 54),
(1057, 'Villa Rica', 19),
(1058, 'Villa de Leiva', 15),
(1059, 'Villa del Rosario', 54),
(1060, 'Villagarzón', 86),
(1061, 'Villagómez', 25),
(1062, 'Villahermosa', 73),
(1063, 'Villamaría', 17),
(1064, 'Villanueva', 13),
(1065, 'Villanueva', 44),
(1066, 'Villanueva', 68),
(1067, 'Villanueva', 85),
(1068, 'Villapinzón', 25),
(1069, 'Villarrica', 73),
(1070, 'Villavicencio', 50),
(1071, 'Villavieja', 41),
(1072, 'Villeta', 25),
(1073, 'Viotá', 25),
(1074, 'Viracachá', 15),
(1075, 'Vista Hermosa', 50),
(1076, 'Viterbo', 17),
(1077, 'Vélez', 68),
(1078, 'Yacopí', 25),
(1079, 'Yacuanquer', 52),
(1080, 'Yaguará', 41),
(1081, 'Yalí', 5),
(1082, 'Yarumal', 5),
(1083, 'Yolombó', 5),
(1084, 'Yondó (Casabe)', 5),
(1085, 'Yopal', 85),
(1086, 'Yotoco', 76),
(1087, 'Yumbo', 76),
(1088, 'Zambrano', 13),
(1089, 'Zapatoca', 68),
(1090, 'Zapayán (PUNTA DE PIEDRAS)', 47),
(1091, 'Zaragoza', 5),
(1092, 'Zarzal', 76),
(1093, 'Zetaquirá', 15),
(1094, 'Zipacón', 25),
(1095, 'Zipaquirá', 25),
(1096, 'Zona Bananera (PRADO - SEVILLA)', 47),
(1097, 'Ábrego', 54),
(1098, 'Íquira', 41),
(1099, 'Úmbita', 15),
(1100, 'Útica', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentaje`
--

CREATE TABLE `porcentaje` (
  `por_id` int(11) NOT NULL,
  `por_nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `porcentaje`
--

INSERT INTO `porcentaje` (`por_id`, `por_nombre`) VALUES
(1, '50%'),
(2, '75%'),
(3, '100%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `tec_id` int(11) NOT NULL,
  `tec_nombre1` varchar(50) NOT NULL,
  `tec_nombre2` varchar(50) DEFAULT NULL,
  `tec_apellido1` varchar(50) NOT NULL,
  `tec_apellido2` varchar(50) DEFAULT NULL,
  `tec_correo` varchar(100) NOT NULL,
  `tec_telefono` varchar(20) DEFAULT NULL,
  `tec_direccion` varchar(100) DEFAULT NULL,
  `tec_foto` varchar(300) DEFAULT NULL,
  `tec_contrasena` varchar(100) NOT NULL,
  `tec_empresaFK` int(11) NOT NULL,
  `tec_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`tec_id`, `tec_nombre1`, `tec_nombre2`, `tec_apellido1`, `tec_apellido2`, `tec_correo`, `tec_telefono`, `tec_direccion`, `tec_foto`, `tec_contrasena`, `tec_empresaFK`, `tec_registro`) VALUES
(1, 'Pedro', 'Luis', 'Sanchez', 'Mendoza', 'pedrosanchez@gmail.com', '3003457621', 'calle 30 # 24 - 54', NULL, '1', 2, '2023-10-23 18:39:52'),
(2, 'Juan', 'Antonio', 'de la Hoz', 'Pacheco', 'juandelahoz@gmail.com', '3027457621', 'calle 55 # 21 - 23', NULL, '2', 3, '2023-10-23 18:42:52'),
(1043, 'Stevin', 'Junior', 'Vargas', 'Badillo', 'stevinvargas@gmail.com', '3002859457', 'calle 30', NULL, '$argon2i$v=19$m=65536,t=4,p=1$NjNPcGR1ZUphclNGUXk5Ug$9VstnKVg99PnL86tpeSfimYT5KRMu/upl7+qyXOaKQ8', 5, '2023-10-27 16:30:25'),
(1002468975, 'Abelardo', '', 'Badillo', 'Badillo', 'abelardobadillo@gmail.com', '3004859652', 'calle 30', NULL, '$argon2i$v=19$m=65536,t=4,p=1$Si5lb2ZrMEZhWTdNTUx5NQ$wDS3Cm5E1+4X+UmD0VzrRIvRsJ8lJ99o9xU/jlyJJ/o', 2, '2023-10-25 19:18:29'),
(1043584983, 'Daniel', '', 'Galvis', '', 'djgz2004@gmail.com', '3006188395', 'calle 32A #21B - 15', NULL, '$argon2i$v=19$m=65536,t=4,p=1$TXhSQmRKeEdKSkhvNGNncg$ZX3v0vDsQ9Yolf8m++aFBmQVNjhx/RjMMYzTYzzM8cQ', 4, '2023-11-17 16:00:40'),
(1043667042, 'Sebastian', '', 'Cantor', 'Gomez', 'sebastian.insedomau@gmail.com', '3044419585', 'calle 17 #16A - 46', NULL, '$argon2i$v=19$m=65536,t=4,p=1$eUZFT056ZWtXVDMzMzA4bg$ZYSlZVdQwgpNXSS93fBsXXRaXltcVQ/qY1Y3E3egc2Q', 4, '2023-11-03 16:09:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_municipioFK` (`emp_municipioFK`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `motor_captura`
--
ALTER TABLE `motor_captura`
  ADD PRIMARY KEY (`capmot_id`),
  ADD KEY `serie_motor` (`capmot_serie`),
  ADD KEY `capmot_id` (`capmot_id`);

--
-- Indices de la tabla `motor_carcasa`
--
ALTER TABLE `motor_carcasa`
  ADD PRIMARY KEY (`carmot_id`);

--
-- Indices de la tabla `motor_eficiencia`
--
ALTER TABLE `motor_eficiencia`
  ADD PRIMARY KEY (`efimot_id`),
  ADD KEY `efimot_porcentajeFK` (`efimot_porcentajeFK`);

--
-- Indices de la tabla `motor_factor_potencia`
--
ALTER TABLE `motor_factor_potencia`
  ADD PRIMARY KEY (`facpotmot_id`),
  ADD KEY `facpotmot_porcentajeFK` (`facpotmot_porcentajeFK`);

--
-- Indices de la tabla `motor_informacion`
--
ALTER TABLE `motor_informacion`
  ADD PRIMARY KEY (`infmot_serie`),
  ADD KEY `id_usuario` (`infmot_empresaFK`),
  ADD KEY `infmot_id` (`infmot_id`),
  ADD KEY `infmot_fac_potenciaFK` (`infmot_fac_potenciaFK`),
  ADD KEY `infmot_eficienciaFK` (`infmot_eficienciaFK`),
  ADD KEY `infmot_estadoFK` (`infmot_estadoFK`),
  ADD KEY `infmot_carcasaFK` (`infmot_carcasaFK`),
  ADD KEY `infmot_norma` (`infmot_normaFK`),
  ADD KEY `infomot_ubicacionFK` (`infmot_ubicacionFK`),
  ADD KEY `motor_informacion_ibfk_1` (`infmot_tecnicoFK`),
  ADD KEY `infmot_tipoFK` (`infmot_tipoFK`);

--
-- Indices de la tabla `motor_norma`
--
ALTER TABLE `motor_norma`
  ADD PRIMARY KEY (`normot_id`);

--
-- Indices de la tabla `motor_tipo`
--
ALTER TABLE `motor_tipo`
  ADD PRIMARY KEY (`tipmot_id`);

--
-- Indices de la tabla `motor_ubicacion`
--
ALTER TABLE `motor_ubicacion`
  ADD PRIMARY KEY (`ubimot_id`),
  ADD KEY `ubimot_empresaFK` (`ubimot_empresaFK`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`mun_id`),
  ADD KEY `departamento_id` (`mun_departamentoFK`);

--
-- Indices de la tabla `porcentaje`
--
ALTER TABLE `porcentaje`
  ADD PRIMARY KEY (`por_id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`tec_id`),
  ADD KEY `tec_empresaFK` (`tec_empresaFK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `dep_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `motor_captura`
--
ALTER TABLE `motor_captura`
  MODIFY `capmot_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `motor_carcasa`
--
ALTER TABLE `motor_carcasa`
  MODIFY `carmot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `motor_eficiencia`
--
ALTER TABLE `motor_eficiencia`
  MODIFY `efimot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `motor_factor_potencia`
--
ALTER TABLE `motor_factor_potencia`
  MODIFY `facpotmot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `motor_informacion`
--
ALTER TABLE `motor_informacion`
  MODIFY `infmot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `motor_norma`
--
ALTER TABLE `motor_norma`
  MODIFY `normot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `motor_tipo`
--
ALTER TABLE `motor_tipo`
  MODIFY `tipmot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `motor_ubicacion`
--
ALTER TABLE `motor_ubicacion`
  MODIFY `ubimot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `mun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT de la tabla `porcentaje`
--
ALTER TABLE `porcentaje`
  MODIFY `por_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_2` FOREIGN KEY (`emp_municipioFK`) REFERENCES `municipios` (`mun_id`);

--
-- Filtros para la tabla `motor_captura`
--
ALTER TABLE `motor_captura`
  ADD CONSTRAINT `motor_captura_ibfk_1` FOREIGN KEY (`capmot_serie`) REFERENCES `motor_informacion` (`infmot_serie`);

--
-- Filtros para la tabla `motor_eficiencia`
--
ALTER TABLE `motor_eficiencia`
  ADD CONSTRAINT `motor_eficiencia_ibfk_1` FOREIGN KEY (`efimot_porcentajeFK`) REFERENCES `porcentaje` (`por_id`);

--
-- Filtros para la tabla `motor_factor_potencia`
--
ALTER TABLE `motor_factor_potencia`
  ADD CONSTRAINT `motor_factor_potencia_ibfk_1` FOREIGN KEY (`facpotmot_porcentajeFK`) REFERENCES `porcentaje` (`por_id`);

--
-- Filtros para la tabla `motor_informacion`
--
ALTER TABLE `motor_informacion`
  ADD CONSTRAINT `infmot_tecnicoFK` FOREIGN KEY (`infmot_tecnicoFK`) REFERENCES `tecnicos` (`tec_id`),
  ADD CONSTRAINT `infmot_tipoFK` FOREIGN KEY (`infmot_tipoFK`) REFERENCES `motor_tipo` (`tipmot_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_10` FOREIGN KEY (`infmot_normaFK`) REFERENCES `motor_norma` (`normot_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_11` FOREIGN KEY (`infmot_empresaFK`) REFERENCES `empresas` (`emp_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_12` FOREIGN KEY (`infmot_ubicacionFK`) REFERENCES `motor_ubicacion` (`ubimot_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_3` FOREIGN KEY (`infmot_fac_potenciaFK`) REFERENCES `motor_factor_potencia` (`facpotmot_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_4` FOREIGN KEY (`infmot_eficienciaFK`) REFERENCES `motor_eficiencia` (`efimot_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_6` FOREIGN KEY (`infmot_estadoFK`) REFERENCES `estado` (`est_id`),
  ADD CONSTRAINT `motor_informacion_ibfk_8` FOREIGN KEY (`infmot_carcasaFK`) REFERENCES `motor_carcasa` (`carmot_id`);

--
-- Filtros para la tabla `motor_ubicacion`
--
ALTER TABLE `motor_ubicacion`
  ADD CONSTRAINT `motor_ubicacion_ibfk_1` FOREIGN KEY (`ubimot_empresaFK`) REFERENCES `empresas` (`emp_id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`mun_departamentoFK`) REFERENCES `departamentos` (`dep_id`);

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `tecnicos_ibfk_1` FOREIGN KEY (`tec_empresaFK`) REFERENCES `empresas` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

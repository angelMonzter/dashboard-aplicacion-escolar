-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2023 a las 03:39:25
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_dashboard_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `privilegios` char(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`, `correo`, `contrasena`, `privilegios`) VALUES
('odtuf', 'Angel', 'Velazquez', 'angelmonztr2000@hotmail.com', '$2y$10$99dtEMOBmNR1yFTyUob8P.yp9qzsB9TqUh1I1ePpyHrBBIHipLkYO', 'A'),
('bp26v', 'sergio', 'ram', 'sergio@gmail.com', '$2y$10$rAShWcObFV36pf9Fpi.iFugrIWjb290RBU3p7Sg9YhUUXWTKPqjtu', 'A'),
('jast3', 'admin', 'admin', 'admin', '$2y$10$5jKY7XX3ztGLBCGKQ84bEuxl4/oNdXrakOVNnMFBMFm7y.PiGgzcS', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `matricula` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_nivel` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_grado` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_grupo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_padre` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` char(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellido`, `matricula`, `sexo`, `sid_nivel`, `sid_grado`, `sid_grupo`, `sid_padre`, `sid_instituto`, `foto`) VALUES
('yqwfk', 'a3', '3da', 'das22', 'Hombre', 'Secundaria', '2', '2', '2', '1', 'fot.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_extracurricular`
--

CREATE TABLE `alumno_extracurricular` (
  `id_alumno_extracurricular` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_extracurricular` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_adjunto`
--

CREATE TABLE `archivo_adjunto` (
  `id_archivo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_mensaje`
--

CREATE TABLE `archivo_mensaje` (
  `id_archivo_mensaje` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_mensaje` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `archivo_mensaje`
--

INSERT INTO `archivo_mensaje` (`id_archivo_mensaje`, `sid_mensaje`, `url`) VALUES
('e8hyt', '8i58y', 'Salon_Condado_icono_excelencia.png'),
('q54ig', '8i58y', 'Salon_Condado_icono_instalaciones.png'),
('r529b', 'aecv6', 'Salon_Condado_icono_instalaciones.png'),
('pcvrc', 'aecv6', 'SourceSansPro-ExtraLightIt.otf'),
('rihrw', 'iqtwu', 'Salon_Condado_icono_excelencia.png'),
('4n5ih', 'fqgzb', '1.svg'),
('ceqgt', 'fqgzb', '2.svg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_atributo`
--

CREATE TABLE `asignar_atributo` (
  `id_asignar_atributo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_atributo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `sid_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_clase`
--

CREATE TABLE `asignar_clase` (
  `id_asignar_clase` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_materia` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_profesor` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_materia`
--

CREATE TABLE `asignar_materia` (
  `id_asignar_materia` varchar(20) COLLATE utf8_bin NOT NULL,
  `sid_profesor` varchar(20) COLLATE utf8_bin NOT NULL,
  `sid_materia` varchar(20) COLLATE utf8_bin NOT NULL,
  `sid_grupo` varchar(20) COLLATE utf8_bin NOT NULL,
  `sid_usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_tutor`
--

CREATE TABLE `asignar_tutor` (
  `id_asignar_tutor` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_padre` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `sid_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo`
--

CREATE TABLE `atributo` (
  `id_atributo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `icono` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `sid_instituto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `atributo`
--

INSERT INTO `atributo` (`id_atributo`, `icono`, `nombre`, `valor`, `sid_instituto`, `sid_usuario`) VALUES
('15192', 'https://api.aplicacionescolar.net/general/general-file-1611278016288.svg', 'Excelente', 10, '1', ''),
('17870', 'https://api.aplicacionescolar.net/general/general-file-1611278016288.svg', 'Excelente', 12, '1', ''),
('10645', 'https://api.aplicacionescolar.net/general/general-file-1611278016288.svg', 'Mal', 6, '1', ''),
('7725', 'https://api.aplicacionescolar.net/general/general-file-1611278016288.svg', 'Perfil', 11, '1', ''),
('66296', 'https://api.aplicacionescolar.net/general/general-file-1611278016288.svg', 'campo', 13, '1', ''),
('59534', 'https://api.aplicacionescolar.net/general/general-file-1611278016288.svg', 'CAmpo', 100, '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_materia` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_profesor` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calificacion` decimal(10,0) NOT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `id_ciclo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`id_ciclo`, `nombre`, `sid_instituto`) VALUES
('t7mnq', '1231123', '4jmal'),
('rfuia', '2131', '4jmal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo_grado`
--

CREATE TABLE `ciclo_grado` (
  `id_ciclo_grado` varchar(20) COLLATE utf8_bin NOT NULL,
  `sid_ciclo` varchar(20) COLLATE utf8_bin NOT NULL,
  `sid_grado` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `todos` tinyint(1) DEFAULT NULL,
  `nivel` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grupo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `nombre`, `fecha`, `todos`, `nivel`, `grado`, `grupo`, `sid_instituto`) VALUES
('mya75', 'evento 1', '2023-06-13', 0, 'Primaria', '1', 'B', '4jmal'),
('d7cxk', 'el checo se la come toda', '2023-06-30', 0, 'Primaria', '1', 'B', '4jmal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extracurricular`
--

CREATE TABLE `extracurricular` (
  `id_extracurricular` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `extracurricular`
--

INSERT INTO `extracurricular` (`id_extracurricular`, `nombre`, `sid_instituto`) VALUES
('knirl', 'aaaa222', '1'),
('elmu9', 'dddd', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_nivel` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `sid_nivel`, `nombre`) VALUES
('67586', '1', '6to');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_grado` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `sid_grado`, `nombre`) VALUES
('94250', '2', 'A'),
('bgch4', '2', 'aaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `id_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `logo` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `banco` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuenta_banco` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_inicio_licencia` date DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `politicas` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_beneficiario` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  `pago` tinyint(1) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `sid_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`id_instituto`, `nombre`, `logo`, `correo`, `banco`, `cuenta_banco`, `descripcion`, `fecha_inicio_licencia`, `fecha_limite`, `politicas`, `nombre_beneficiario`, `asistencia`, `pago`, `fecha_creacion`, `sid_usuario`) VALUES
('pstyi', 'aa', 'logo.jpg', 'dasd', 'dasas', '', 'dasasdasd', '2023-05-31', '2023-06-06', 'logo.jpg', 'adsasd', 0, 0, '2023-06-13 15:41:09', '1'),
('w9zet', 'asd', 'l.jpk', 'an@a.com', 'asda', '1231', 'asd', '2023-06-03', '2023-06-22', 'l.jpk', 'asd', 0, 0, '2023-06-16 01:07:09', '1'),
('ixe7x', '', 'for_solito.png', 'an@a.com', '', '', '', '0000-00-00', '0000-00-00', 'l.jpk', '', 0, 0, '2023-06-16 06:42:34', '1'),
('8427d', 'asdasda', 'ICONE_slogan.png', 'an2@a.com', '', '', '', '2023-06-08', '0000-00-00', 'l.jpk', '', 0, 0, '2023-06-19 19:32:48', ''),
('aqmry', '', 'whatsapp_white.png', 'a2n@a.coma', '', '', '', '0000-00-00', '0000-00-00', 'l.jpk', '', 0, 0, '2023-06-19 19:33:18', ''),
('3uudd', '', 'whatsapp_white.png', 'an2@a.coma', '', '', '', '0000-00-00', '0000-00-00', 'l.jpk', '', 0, 0, '2023-06-19 19:44:45', 'jast3'),
('9jvoi', '', 'equipaje.png', 'ejemplo@correo.com', '', '', '', '0000-00-00', '0000-00-00', 'codigo_qr_cws.png', '', 0, 0, '2023-06-19 19:47:41', 'jast3'),
('4jmal', 'UPVT2', 'logo.png', 'contacto@uptv.com', 'BANCOMER', '012313131231', 'descripcion de la escuela a la que se da de alta2', '2023-06-23', '2023-06-15', 'Errores.docx', 'escuela universidad', 0, 0, '2023-06-19 23:40:00', 'jast3'),
('133rb', '', 'URGEMEDICA_escolta1.png', 'an@a.coma', '', '', '', '0000-00-00', '0000-00-00', 'HijosAusentes_footer_fondo.png', '', 0, 0, '2023-06-19 23:46:55', 'jast3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_grado` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci NOT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `sid_grado`, `nombre`, `sid_instituto`) VALUES
('24244', '234', 'Matematicas', NULL),
('8syb4', 's', 's', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `receptor` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_tipo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `sid_nivel` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `sid_grado` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `sid_grupo` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `sid_extracurricular` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `destinatarios` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `asunto` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mensaje` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `respuesta_rapida` tinyint(1) DEFAULT NULL,
  `mensaje_programado` tinyint(1) DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL,
  `hora_envio` time DEFAULT NULL,
  `repetir` tinyint(1) DEFAULT NULL,
  `periodo` char(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `receptor`, `sid_tipo`, `sid_alumno`, `sid_nivel`, `sid_grado`, `sid_grupo`, `sid_extracurricular`, `destinatarios`, `asunto`, `mensaje`, `respuesta_rapida`, `mensaje_programado`, `fecha_envio`, `hora_envio`, `repetir`, `periodo`, `fecha_fin`, `sid_instituto`) VALUES
('8i58y', '1', '1', '1', '0', '0', '0', '0', '0', 'dasda', '<p>asdasdasda</p>', 0, 0, '2023-06-16', '01:01:00', 0, '1', '2023-06-21', '4jmal'),
('aecv6', '0', '0', '0', '0', '0', '0', '0', '0', '', '', 0, 0, '0000-00-00', '00:00:00', 0, 'Selecciona una opción', '0000-00-00', '4jmal'),
('iqtwu', '1', '1', '1', '0', '0', '0', '0', '0', 'asda', '<p>asdasd</p>', 0, 0, '2023-06-18', '01:01:00', 0, '1', '2023-06-13', '4jmal'),
('fqgzb', '2', '1', '0', '1', '1', '1', '0', '0', 'ejemplo', '<p>este es un mensaje de ejemplo&nbsp;</p>', 0, 0, '2023-06-29', '01:01:00', 0, '1', '2023-06-22', '4jmal'),
('w3s1l', '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '00:00:00', 0, '', '0000-00-00', '4jmal'),
('vnqer', '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '00:00:00', 0, '', '0000-00-00', '4jmal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `sid_instituto`, `nombre`) VALUES
('1054', '2', 'Secundaria'),
('81440', '2', 'Preparatoria'),
('50077', '2', 'Primaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `id_padre` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creacion` datetime DEFAULT NULL,
  `contrasena` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`id_padre`, `nombre`, `apellido`, `correo`, `creacion`, `contrasena`, `sid_instituto`) VALUES
('l2rx5', 'aa', 'aa', 'asasda', '2023-06-30 20:13:47', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modo` char(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concepto` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `sid_penalidad` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `sid_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `sid_alumno`, `modo`, `concepto`, `monto`, `sid_penalidad`, `status`, `fecha_pago`, `sid_usuario`) VALUES
('55774', '7A8D9ASD0F', 'Efectivo', 'Semestre', '21320', '2', 1, '2023-05-29', NULL),
('77993', '099IMIFASDE', 'Efectivo', 'Cuatrimestre', '2341', '2', 1, '2023-05-29', NULL),
('28350', '01293123', 'Efectivo', 'semestre', '234', '2', 1, '2023-05-30', NULL),
('3ltvs', 'a2233', 'a23', 'a233', '233', '2', 1, '2023-06-12', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `penalidad`
--

CREATE TABLE `penalidad` (
  `id_penalidad` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `privilegios_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_privilegio` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`privilegios_id`, `nombre_privilegio`) VALUES
('wz3ix', 'Estadisticas'),
('xas32', 'Usuarios y padres'),
('asd24', 'Mensajes'),
('gf534', 'Calendario'),
('fgsd5', 'Extracurriculares'),
('sdf77', 'Seguimientos'),
('xas32', 'Calificaciones'),
('sdf74', 'Materias'),
('sdf31', 'Asistencias'),
('sdf67', 'Cobranza'),
('sdf43', 'Tareas'),
('sdf65', 'Configuraciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios_rol`
--

CREATE TABLE `privilegios_rol` (
  `privilegios_rol_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `sid_rol` varchar(10) COLLATE utf8_bin NOT NULL,
  `sid_privilegios` varchar(10) COLLATE utf8_bin NOT NULL,
  `activo` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `privilegios_rol`
--

INSERT INTO `privilegios_rol` (`privilegios_rol_id`, `sid_rol`, `sid_privilegios`, `activo`) VALUES
('w6afq', '9il8s', 'wz3ix', 'si'),
('723ib', '9il8s', 'xas32', 'si'),
('3rz5o', '9il8s', 'asd24', 'no'),
('iv8qw', '9il8s', 'gf534', 'no'),
('9k73w', '9il8s', 'fgsd5', 'no'),
('zb9eq', '9il8s', 'sdf77', 'no'),
('xirq1', '9il8s', 'xas32', 'si'),
('lu82e', '9il8s', 'sdf74', 'no'),
('ajig4', '9il8s', 'sdf31', 'no'),
('64hyl', '9il8s', 'sdf67', 'no'),
('3fphc', '9il8s', 'sdf43', 'no'),
('z3m95', '9il8s', 'sdf65', 'no'),
('6cm3l', 'v55kz', 'wz3ix', 'si'),
('4usd2', 'v55kz', 'xas32', 'no'),
('jclin', 'v55kz', 'asd24', 'no'),
('1foie', 'v55kz', 'gf534', 'no'),
('vl87x', 'v55kz', 'fgsd5', 'no'),
('slb59', 'v55kz', 'sdf77', 'no'),
('2xaog', 'v55kz', 'xas32', 'no'),
('gomhz', 'v55kz', 'sdf74', 'no'),
('unkm7', 'v55kz', 'sdf31', 'no'),
('k94g2', 'v55kz', 'sdf67', 'no'),
('ixswp', 'v55kz', 'sdf43', 'no'),
('eriuv', 'v55kz', 'sdf65', 'no'),
('14ucf', 'ymzde', 'wz3ix', 'si'),
('jzifw', 'ymzde', 'xas32', 'no'),
('trdc6', 'ymzde', 'asd24', 'no'),
('ug84n', 'ymzde', 'gf534', 'no'),
('gtryl', 'ymzde', 'fgsd5', 'no'),
('go7t9', 'ymzde', 'sdf77', 'no'),
('g1kkz', 'ymzde', 'xas32', 'no'),
('3xoin', 'ymzde', 'sdf74', 'no'),
('gs3e4', 'ymzde', 'sdf31', 'no'),
('l69xg', 'ymzde', 'sdf67', 'no'),
('5rqpe', 'ymzde', 'sdf43', 'si'),
('3o2jd', 'ymzde', 'sdf65', 'si'),
('9qbkg', 'o58v1', 'wz3ix', 'si'),
('j1mig', 'o58v1', 'xas32', 'no'),
('1a1aw', 'o58v1', 'asd24', 'no'),
('oimh1', 'o58v1', 'gf534', 'no'),
('r5bdu', 'o58v1', 'fgsd5', 'no'),
('pk491', 'o58v1', 'sdf77', 'no'),
('u7kga', 'o58v1', 'xas32', 'no'),
('ddq2p', 'o58v1', 'sdf74', 'no'),
('2v9gx', 'o58v1', 'sdf31', 'no'),
('3ytsh', 'o58v1', 'sdf67', 'no'),
('w4pjs', 'o58v1', 'sdf43', 'no'),
('p8qke', 'o58v1', 'sdf65', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `sid_instituto`, `nombre`, `fecha_registro`) VALUES
('9il8s', '4jmal', 'nuevo rol', '2023-06-22'),
('v55kz', '4jmal', 'dd', '2023-06-23'),
('ymzde', '4jmal', 'Director', '2023-06-23'),
('o58v1', '4jmal', 'Profesor', '2023-06-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scanner`
--

CREATE TABLE `scanner` (
  `id_scanner` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `scanner`
--

INSERT INTO `scanner` (`id_scanner`, `nombre`, `apellido`, `correo`, `usuario`, `contrasena`, `sid_instituto`) VALUES
('88623', 'Sergio', 'Ramirez', 'chec@gmail.com', 'Checo', 'asdasdasdasd', '2'),
('81175', 'Campo', 'Campo', 'campo@gmail.com', 'campo', 'asdasdasd', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id_seguimiento` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_atributo` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_evaluacion` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tareas` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_alumno` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_materia` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_profesor` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `link` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mensaje`
--

CREATE TABLE `tipo_mensaje` (
  `id_tipo_mensaje` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `icono` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_instituto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_mensaje`
--

INSERT INTO `tipo_mensaje` (`id_tipo_mensaje`, `icono`, `nombre`, `sid_instituto`) VALUES
('w9dcx', '1', 'asdasd', '1'),
('xyx2v', 'http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/002.svg', 'sadasda', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `url_mensaje`
--

CREATE TABLE `url_mensaje` (
  `id_url` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_mensaje` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `url_mensaje`
--

INSERT INTO `url_mensaje` (`id_url`, `sid_mensaje`, `url`) VALUES
('fceyr', '8i58y', 'asdad'),
('2i95f', '8i58y', 'asdasdas'),
('933bi', 'aecv6', 'asdasd'),
('15jb2', 'aecv6', 'asdsadasd'),
('tps9d', 'aecv6', 'asdasdadasdas'),
('drh1i', 'iqtwu', 'asdasdasd'),
('fnh7f', 'fqgzb', 'https://www.w3schools.com/tags/att_input_checked.asp'),
('75d7w', 'fqgzb', 'https://www.w3schools.com/tags/att_input_checked.asp1'),
('qw8sh', 'fqgzb', 'https://www.w3schools.com/tags/att_input_checked.asp2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` char(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sid_rol` char(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` char(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creacion` datetime NOT NULL,
  `modificacion` datetime NOT NULL,
  `sid_instituto` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `sid_rol`, `contrasena`, `creacion`, `modificacion`, `sid_instituto`) VALUES
('das3', 'dsada', 'ads', 'das', '1', '$2y$10$ozCIfsD5MVFftdmoPRLqeeYiKjoZYuNSeaJ4EZOn6Q.KPNqzLQJty', '2023-06-11 19:25:27', '2023-06-11 19:25:27', '1'),
('82685', 'nombre', 'apellido', 'email', '1', 'adasdadasd', '2023-05-31 02:32:09', '2023-05-31 02:32:09', '3'),
('uskwh', 'Luis2', 'Salinas2', 'paus.impala21@gmail.com', '1', '$2y$10$V56JWg40s0i5cPzjjsk8heTbV2Vx/BAmz4cSCIfKpQVcwaWS.eNSm', '2023-06-13 16:04:23', '2023-06-13 16:04:23', '1'),
('wpx7n', 'r', 'r', 'r', '1', '$2y$10$sLWA1VKDvJbXESIqjBYiHuyRx7DC26rECLUUF.pE..zt1RYmsPbr2', '2023-06-11 19:26:06', '2023-06-11 19:26:06', '1'),
('wxb7u', 'ejemplo', 'ejemeplo', '', '', '$2y$10$s73gJyCvyuvCs2UTB43wWuIBaTZX.a2i0mkVH5.dS8bPX.HbsiqZq', '2023-06-13 15:53:48', '2023-06-13 15:53:48', '1'),
('afsbs', 'a', 'a', 'a', '1', '$2y$10$z8lQ.SvxCCqOg0TfcAM6.umTaf3/8EWjPYYd.pBx6DX/jmsrl5f5G', '2023-06-13 15:58:17', '2023-06-13 15:58:17', '2'),
('123da', 'angel', 'velazquez', 'angelmonztr2000@hotmail.com', '2', '$2y$10$yodRpnZJZpm7w061oGVvmuCFDEIqph2DmSRid1.NRj8sWSXBkAB9.', '2023-06-21 21:57:21', '2023-06-22 21:57:21', '4jmal'),
('rf585', 'prueba', 'prueba', 'angelmonztr2000@hotmail.com', 'o58v1', '$2y$10$YHT98FeTrsaTyUwTmhs1iugYVlVOCj4pZnUPBCu9nUAXmWLXiDHDq', '2023-06-30 23:04:35', '2023-06-30 23:04:35', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

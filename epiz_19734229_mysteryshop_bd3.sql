-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql309.epizy.com
-- Tiempo de generación: 01-06-2017 a las 23:06:21
-- Versión del servidor: 5.6.35-81.0
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `epiz_19734229_mysteryshop_bd3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departament`
--

CREATE TABLE IF NOT EXISTS `tb_departament` (
  `id_dpto` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_market` int(11) NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dpto`),
  KEY `id_market` (`id_market`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `tb_departament`
--

INSERT INTO `tb_departament` (`id_dpto`, `name`, `id_market`, `removed`) VALUES
(3, 'Produce', 1, 0),
(4, 'Hot food', 1, 0),
(5, 'Meat', 1, 0),
(6, 'Deli', 1, 0),
(7, 'Fish', 1, 0),
(8, 'Stock', 1, 0),
(9, 'Dairy', 1, 0),
(10, 'Customer Service', 1, 0),
(11, 'General Checkout', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluation`
--

CREATE TABLE IF NOT EXISTS `tb_evaluation` (
  `id_evaluation` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_market` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluation`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `tb_evaluation`
--

INSERT INTO `tb_evaluation` (`id_evaluation`, `date`, `time`, `id_user`, `id_market`) VALUES
(19, '2017-05-16', '19:28:00', 3, 1),
(22, '2017-05-22', '19:39:00', 3, 1),
(23, '2017-05-22', '19:44:00', 3, 1),
(24, '2017-05-22', '19:47:00', 3, 1),
(25, '2017-05-22', '19:48:00', 3, 1),
(26, '2017-05-22', '19:49:00', 3, 1),
(27, '2017-05-22', '19:51:00', 3, 1),
(28, '2017-05-22', '19:57:00', 3, 1),
(29, '2017-05-22', '20:03:00', 3, 1),
(30, '2017-05-24', '17:13:00', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluation_departament_indicator`
--

CREATE TABLE IF NOT EXISTS `tb_evaluation_departament_indicator` (
  `id_evaluation` int(11) NOT NULL,
  `id_dpto` int(11) NOT NULL,
  `id_indicator` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `employee_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_evaluation`,`id_dpto`,`id_indicator`),
  KEY `id_indicator` (`id_indicator`),
  KEY `id_evaluation` (`id_evaluation`),
  KEY `id_dpto` (`id_dpto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_evaluation_departament_indicator`
--

INSERT INTO `tb_evaluation_departament_indicator` (`id_evaluation`, `id_dpto`, `id_indicator`, `points`, `employee_name`, `description`) VALUES
(19, 10, 2, 3, 'Pepe', NULL),
(19, 10, 3, 3, 'Pepe', NULL),
(19, 10, 4, 5, 'Pepe', NULL),
(19, 10, 5, 3, 'Pepe', NULL),
(19, 10, 6, 2, 'Pepe', NULL),
(19, 10, 7, 2, 'Pepe', NULL),
(19, 10, 8, 1, 'Pepe', NULL),
(19, 10, 9, 4, 'Pepe', NULL),
(19, 10, 10, 4, 'Pepe', NULL),
(22, 3, 3, 3, '', NULL),
(22, 3, 4, 1, '', NULL),
(22, 3, 6, 4, '', NULL),
(22, 3, 7, 3, '', NULL),
(22, 3, 14, 3, '', NULL),
(22, 3, 20, 1, '', NULL),
(22, 3, 27, 3, '', NULL),
(22, 3, 33, 3, '', NULL),
(22, 5, 2, 1, '', NULL),
(22, 5, 3, 1, '', NULL),
(22, 5, 4, 1, '', NULL),
(22, 5, 6, 1, '', NULL),
(22, 5, 7, 1, '', NULL),
(22, 5, 10, 1, '', NULL),
(22, 5, 14, 1, '', NULL),
(22, 5, 17, 1, '', NULL),
(22, 5, 28, 1, '', NULL),
(22, 5, 29, 1, '', NULL),
(22, 5, 32, 1, '', NULL),
(22, 6, 21, 1, '', NULL),
(22, 6, 22, 1, '', NULL),
(22, 6, 23, 1, '', NULL),
(22, 6, 24, 1, '', NULL),
(22, 6, 25, 1, '', NULL),
(22, 6, 26, 1, '', NULL),
(22, 6, 27, 1, '', NULL),
(22, 6, 28, 1, '', NULL),
(22, 6, 29, 1, '', NULL),
(22, 6, 30, 1, '', NULL),
(22, 6, 31, 1, '', NULL),
(22, 6, 32, 1, '', NULL),
(22, 7, 2, 1, '', NULL),
(22, 7, 3, 1, '', NULL),
(22, 7, 4, 1, '', NULL),
(22, 7, 6, 1, '', NULL),
(22, 7, 7, 1, '', NULL),
(22, 7, 10, 1, '', NULL),
(22, 7, 14, 1, '', NULL),
(22, 7, 17, 1, '', NULL),
(22, 7, 28, 1, '', NULL),
(22, 7, 29, 1, '', NULL),
(22, 7, 32, 1, '', NULL),
(22, 8, 3, 1, '', NULL),
(22, 8, 4, 1, '', NULL),
(22, 8, 6, 1, '', NULL),
(22, 8, 7, 1, '', NULL),
(22, 8, 10, 1, '', NULL),
(22, 8, 12, 1, '', NULL),
(22, 8, 13, 1, '', NULL),
(22, 8, 14, 1, '', NULL),
(22, 8, 18, 1, '', NULL),
(22, 9, 11, 1, '', NULL),
(22, 9, 12, 1, '', NULL),
(22, 9, 13, 1, '', NULL),
(22, 9, 14, 1, '', NULL),
(22, 9, 15, 1, '', NULL),
(22, 9, 16, 1, '', NULL),
(22, 9, 17, 1, '', NULL),
(22, 9, 18, 1, '', NULL),
(22, 9, 19, 1, '', NULL),
(22, 9, 20, 1, '', NULL),
(22, 10, 2, 1, '', NULL),
(22, 10, 3, 1, '', NULL),
(22, 10, 4, 1, '', NULL),
(22, 10, 5, 1, '', NULL),
(22, 10, 6, 1, '', NULL),
(22, 10, 7, 1, '', NULL),
(22, 10, 8, 1, '', NULL),
(22, 10, 9, 1, '', NULL),
(22, 10, 10, 1, '', NULL),
(22, 11, 2, 1, '', NULL),
(22, 11, 3, 1, '', NULL),
(22, 11, 4, 1, '', NULL),
(22, 11, 6, 1, '', NULL),
(22, 11, 7, 1, '', NULL),
(22, 11, 8, 1, '', NULL),
(22, 11, 9, 1, '', NULL),
(22, 11, 10, 1, '', NULL),
(22, 11, 14, 1, '', NULL),
(23, 3, 3, 3, '', NULL),
(23, 3, 4, 1, '', NULL),
(23, 3, 6, 4, '', NULL),
(23, 3, 7, 3, '', NULL),
(23, 3, 14, 3, '', NULL),
(23, 3, 20, 1, '', NULL),
(23, 3, 27, 3, '', NULL),
(23, 3, 33, 3, '', NULL),
(24, 3, 3, 1, '', NULL),
(24, 3, 4, 1, '', NULL),
(24, 3, 6, 1, '', NULL),
(24, 3, 7, 1, '', NULL),
(24, 3, 14, 1, '', NULL),
(24, 3, 20, 1, '', NULL),
(24, 3, 27, 1, '', NULL),
(24, 3, 33, 1, '', NULL),
(24, 5, 2, 3, 'pepe', NULL),
(24, 5, 3, 2, 'pepe', NULL),
(24, 5, 4, 2, 'pepe', NULL),
(24, 5, 6, 3, 'pepe', NULL),
(24, 5, 7, 3, 'pepe', NULL),
(24, 5, 10, 3, 'pepe', NULL),
(24, 5, 14, 3, 'pepe', NULL),
(24, 5, 17, 1, 'pepe', NULL),
(24, 5, 28, 4, 'pepe', NULL),
(24, 5, 29, 5, 'pepe', NULL),
(24, 5, 32, 2, 'pepe', NULL),
(24, 6, 21, 1, '', NULL),
(24, 6, 22, 1, '', NULL),
(24, 6, 23, 1, '', NULL),
(24, 6, 24, 1, '', NULL),
(24, 6, 25, 1, '', NULL),
(24, 6, 26, 1, '', NULL),
(24, 6, 27, 1, '', NULL),
(24, 6, 28, 1, '', NULL),
(24, 6, 29, 1, '', NULL),
(24, 6, 30, 1, '', NULL),
(24, 6, 31, 1, '', NULL),
(24, 6, 32, 1, '', NULL),
(24, 7, 2, 1, '', NULL),
(24, 7, 3, 1, '', NULL),
(24, 7, 4, 1, '', NULL),
(24, 7, 6, 1, '', NULL),
(24, 7, 7, 1, '', NULL),
(24, 7, 10, 1, '', NULL),
(24, 7, 14, 1, '', NULL),
(24, 7, 17, 1, '', NULL),
(24, 7, 28, 1, '', NULL),
(24, 7, 29, 1, '', NULL),
(24, 7, 32, 1, '', NULL),
(24, 8, 3, 1, '', NULL),
(24, 8, 4, 1, '', NULL),
(24, 8, 6, 1, '', NULL),
(24, 8, 7, 1, '', NULL),
(24, 8, 10, 1, '', NULL),
(24, 8, 12, 1, '', NULL),
(24, 8, 13, 1, '', NULL),
(24, 8, 14, 1, '', NULL),
(24, 8, 18, 1, '', NULL),
(24, 9, 11, 1, '', NULL),
(24, 9, 12, 1, '', NULL),
(24, 9, 13, 1, '', NULL),
(24, 9, 14, 1, '', NULL),
(24, 9, 15, 1, '', NULL),
(24, 9, 16, 1, '', NULL),
(24, 9, 17, 1, '', NULL),
(24, 9, 18, 1, '', NULL),
(24, 9, 19, 1, '', NULL),
(24, 9, 20, 1, '', NULL),
(24, 10, 2, 1, '', NULL),
(24, 10, 3, 1, '', NULL),
(24, 10, 4, 1, '', NULL),
(24, 10, 5, 1, '', NULL),
(24, 10, 6, 1, '', NULL),
(24, 10, 7, 1, '', NULL),
(24, 10, 8, 1, '', NULL),
(24, 10, 9, 1, '', NULL),
(24, 10, 10, 1, '', NULL),
(24, 11, 2, 1, '', NULL),
(24, 11, 3, 1, '', NULL),
(24, 11, 4, 1, '', NULL),
(24, 11, 6, 1, '', NULL),
(24, 11, 7, 1, '', NULL),
(24, 11, 8, 1, '', NULL),
(24, 11, 9, 1, '', NULL),
(24, 11, 10, 1, '', NULL),
(24, 11, 14, 1, '', NULL),
(25, 3, 3, 1, '', NULL),
(25, 3, 4, 1, '', NULL),
(25, 3, 6, 1, '', NULL),
(25, 3, 7, 1, '', NULL),
(25, 3, 14, 1, '', NULL),
(25, 3, 20, 1, '', NULL),
(25, 3, 27, 1, '', NULL),
(25, 3, 33, 1, '', NULL),
(25, 5, 2, 3, '', NULL),
(25, 5, 3, 3, '', NULL),
(25, 5, 4, 2, '', NULL),
(25, 5, 6, 3, '', NULL),
(25, 5, 7, 3, '', NULL),
(25, 5, 10, 3, '', NULL),
(25, 5, 14, 3, '', NULL),
(25, 5, 17, 1, '', NULL),
(25, 5, 28, 4, '', NULL),
(25, 5, 29, 5, '', NULL),
(25, 5, 32, 2, '', NULL),
(25, 6, 21, 1, '', NULL),
(25, 6, 22, 1, '', NULL),
(25, 6, 23, 1, '', NULL),
(25, 6, 24, 1, '', NULL),
(25, 6, 25, 1, '', NULL),
(25, 6, 26, 1, '', NULL),
(25, 6, 27, 1, '', NULL),
(25, 6, 28, 1, '', NULL),
(25, 6, 29, 1, '', NULL),
(25, 6, 30, 1, '', NULL),
(25, 6, 31, 1, '', NULL),
(25, 6, 32, 1, '', NULL),
(25, 7, 2, 1, '', NULL),
(25, 7, 3, 1, '', NULL),
(25, 7, 4, 1, '', NULL),
(25, 7, 6, 1, '', NULL),
(25, 7, 7, 1, '', NULL),
(25, 7, 10, 1, '', NULL),
(25, 7, 14, 1, '', NULL),
(25, 7, 17, 1, '', NULL),
(25, 7, 28, 1, '', NULL),
(25, 7, 29, 1, '', NULL),
(25, 7, 32, 1, '', NULL),
(25, 8, 3, 1, '', NULL),
(25, 8, 4, 1, '', NULL),
(25, 8, 6, 1, '', NULL),
(25, 8, 7, 1, '', NULL),
(25, 8, 10, 1, '', NULL),
(25, 8, 12, 1, '', NULL),
(25, 8, 13, 1, '', NULL),
(25, 8, 14, 1, '', NULL),
(25, 8, 18, 1, '', NULL),
(25, 9, 11, 1, '', NULL),
(25, 9, 12, 1, '', NULL),
(25, 9, 13, 1, '', NULL),
(25, 9, 14, 1, '', NULL),
(25, 9, 15, 1, '', NULL),
(25, 9, 16, 1, '', NULL),
(25, 9, 17, 1, '', NULL),
(25, 9, 18, 1, '', NULL),
(25, 9, 19, 1, '', NULL),
(25, 9, 20, 1, '', NULL),
(25, 10, 2, 1, '', NULL),
(25, 10, 3, 1, '', NULL),
(25, 10, 4, 1, '', NULL),
(25, 10, 5, 1, '', NULL),
(25, 10, 6, 1, '', NULL),
(25, 10, 7, 1, '', NULL),
(25, 10, 8, 1, '', NULL),
(25, 10, 9, 1, '', NULL),
(25, 10, 10, 1, '', NULL),
(25, 11, 2, 1, '', NULL),
(25, 11, 3, 1, '', NULL),
(25, 11, 4, 1, '', NULL),
(25, 11, 6, 1, '', NULL),
(25, 11, 7, 1, '', NULL),
(25, 11, 8, 1, '', NULL),
(25, 11, 9, 1, '', NULL),
(25, 11, 10, 1, '', NULL),
(25, 11, 14, 1, '', NULL),
(26, 3, 3, 1, '', NULL),
(26, 3, 4, 1, '', NULL),
(26, 3, 6, 1, '', NULL),
(26, 3, 7, 1, '', NULL),
(26, 3, 14, 1, '', NULL),
(26, 3, 20, 1, '', NULL),
(26, 3, 27, 1, '', NULL),
(26, 3, 33, 1, '', NULL),
(26, 5, 2, 1, '', NULL),
(26, 5, 3, 1, '', NULL),
(26, 5, 4, 1, '', NULL),
(26, 5, 6, 1, '', NULL),
(26, 5, 7, 1, '', NULL),
(26, 5, 10, 1, '', NULL),
(26, 5, 14, 1, '', NULL),
(26, 5, 17, 1, '', NULL),
(26, 5, 28, 1, '', NULL),
(26, 5, 29, 1, '', NULL),
(26, 5, 32, 1, '', NULL),
(26, 6, 21, 5, 'juana', NULL),
(26, 6, 22, 3, 'juana', NULL),
(26, 6, 23, 5, 'juana', NULL),
(26, 6, 24, 5, 'juana', NULL),
(26, 6, 25, 5, 'juana', NULL),
(26, 6, 26, 4, 'juana', NULL),
(26, 6, 27, 5, 'juana', NULL),
(26, 6, 28, 3, 'juana', NULL),
(26, 6, 29, 4, 'juana', NULL),
(26, 6, 30, 5, 'juana', NULL),
(26, 6, 31, 5, 'juana', NULL),
(26, 6, 32, 1, 'juana', NULL),
(26, 7, 2, 1, '', NULL),
(26, 7, 3, 1, '', NULL),
(26, 7, 4, 1, '', NULL),
(26, 7, 6, 1, '', NULL),
(26, 7, 7, 1, '', NULL),
(26, 7, 10, 1, '', NULL),
(26, 7, 14, 1, '', NULL),
(26, 7, 17, 1, '', NULL),
(26, 7, 28, 1, '', NULL),
(26, 7, 29, 1, '', NULL),
(26, 7, 32, 1, '', NULL),
(26, 8, 3, 1, '', NULL),
(26, 8, 4, 1, '', NULL),
(26, 8, 6, 1, '', NULL),
(26, 8, 7, 1, '', NULL),
(26, 8, 10, 1, '', NULL),
(26, 8, 12, 1, '', NULL),
(26, 8, 13, 1, '', NULL),
(26, 8, 14, 1, '', NULL),
(26, 8, 18, 1, '', NULL),
(26, 9, 11, 1, '', NULL),
(26, 9, 12, 1, '', NULL),
(26, 9, 13, 1, '', NULL),
(26, 9, 14, 1, '', NULL),
(26, 9, 15, 1, '', NULL),
(26, 9, 16, 1, '', NULL),
(26, 9, 17, 1, '', NULL),
(26, 9, 18, 1, '', NULL),
(26, 9, 19, 1, '', NULL),
(26, 9, 20, 1, '', NULL),
(26, 10, 2, 1, '', NULL),
(26, 10, 3, 1, '', NULL),
(26, 10, 4, 1, '', NULL),
(26, 10, 5, 1, '', NULL),
(26, 10, 6, 1, '', NULL),
(26, 10, 7, 1, '', NULL),
(26, 10, 8, 1, '', NULL),
(26, 10, 9, 1, '', NULL),
(26, 10, 10, 1, '', NULL),
(26, 11, 2, 1, '', NULL),
(26, 11, 3, 1, '', NULL),
(26, 11, 4, 1, '', NULL),
(26, 11, 6, 1, '', NULL),
(26, 11, 7, 1, '', NULL),
(26, 11, 8, 1, '', NULL),
(26, 11, 9, 1, '', NULL),
(26, 11, 10, 1, '', NULL),
(26, 11, 14, 1, '', NULL),
(27, 6, 21, 5, '', NULL),
(27, 6, 22, 5, '', NULL),
(27, 6, 23, 4, '', NULL),
(27, 6, 24, 4, '', NULL),
(27, 6, 25, 5, '', NULL),
(27, 6, 26, 5, '', NULL),
(27, 6, 27, 5, '', NULL),
(27, 6, 28, 5, '', NULL),
(27, 6, 29, 4, '', NULL),
(27, 6, 30, 4, '', NULL),
(27, 6, 31, 3, '', NULL),
(27, 6, 32, 4, '', NULL),
(28, 3, 3, 2, 'joshua', NULL),
(28, 3, 4, 3, 'joshua', NULL),
(28, 3, 6, 4, 'joshua', NULL),
(28, 3, 7, 3, 'joshua', NULL),
(28, 3, 14, 1, 'joshua', NULL),
(28, 3, 20, 3, 'joshua', NULL),
(28, 3, 27, 1, 'joshua', NULL),
(28, 3, 33, 5, 'joshua', NULL),
(28, 5, 2, 3, 'carlos', NULL),
(28, 5, 3, 2, 'carlos', NULL),
(28, 5, 4, 2, 'carlos', NULL),
(28, 5, 6, 3, 'carlos', NULL),
(28, 5, 7, 3, 'carlos', NULL),
(28, 5, 10, 3, 'carlos', NULL),
(28, 5, 14, 3, 'carlos', NULL),
(28, 5, 17, 1, 'carlos', NULL),
(28, 5, 28, 4, 'carlos', NULL),
(28, 5, 29, 5, 'carlos', NULL),
(28, 5, 32, 2, 'carlos', NULL),
(28, 6, 21, 3, 'Mateo', NULL),
(28, 6, 22, 4, 'Mateo', NULL),
(28, 6, 23, 1, 'Mateo', NULL),
(28, 6, 24, 2, 'Mateo', NULL),
(28, 6, 25, 5, 'Mateo', NULL),
(28, 6, 26, 5, 'Mateo', NULL),
(28, 6, 27, 3, 'Mateo', NULL),
(28, 6, 28, 2, 'Mateo', NULL),
(28, 6, 29, 4, 'Mateo', NULL),
(28, 6, 30, 5, 'Mateo', NULL),
(28, 6, 31, 3, 'Mateo', NULL),
(28, 6, 32, 3, 'Mateo', NULL),
(28, 7, 2, 3, 'Checho', NULL),
(28, 7, 3, 4, 'Checho', NULL),
(28, 7, 4, 5, 'Checho', NULL),
(28, 7, 6, 2, 'Checho', NULL),
(28, 7, 7, 4, 'Checho', NULL),
(28, 7, 10, 2, 'Checho', NULL),
(28, 7, 14, 4, 'Checho', NULL),
(28, 7, 17, 3, 'Checho', NULL),
(28, 7, 28, 5, 'Checho', NULL),
(28, 7, 29, 5, 'Checho', NULL),
(28, 7, 32, 3, 'Checho', NULL),
(28, 8, 3, 2, '', NULL),
(28, 8, 4, 4, '', NULL),
(28, 8, 6, 1, '', NULL),
(28, 8, 7, 3, '', NULL),
(28, 8, 10, 4, '', NULL),
(28, 8, 12, 3, '', NULL),
(28, 8, 13, 5, '', NULL),
(28, 8, 14, 4, '', NULL),
(28, 8, 18, 3, '', NULL),
(28, 9, 11, 3, '', NULL),
(28, 9, 12, 5, '', NULL),
(28, 9, 13, 5, '', NULL),
(28, 9, 14, 1, '', NULL),
(28, 9, 15, 1, '', NULL),
(28, 9, 16, 3, '', NULL),
(28, 9, 17, 2, '', NULL),
(28, 9, 18, 5, '', NULL),
(28, 9, 19, 4, '', NULL),
(28, 9, 20, 2, '', NULL),
(28, 10, 2, 4, '', NULL),
(28, 10, 3, 3, '', NULL),
(28, 10, 4, 5, '', NULL),
(28, 10, 5, 5, '', NULL),
(28, 10, 6, 2, '', NULL),
(28, 10, 7, 4, '', NULL),
(28, 10, 8, 3, '', NULL),
(28, 10, 9, 3, '', NULL),
(28, 10, 10, 5, '', NULL),
(28, 11, 2, 2, '', NULL),
(28, 11, 3, 4, '', NULL),
(28, 11, 4, 4, '', NULL),
(28, 11, 6, 2, '', NULL),
(28, 11, 7, 5, '', NULL),
(28, 11, 8, 4, '', NULL),
(28, 11, 9, 5, '', NULL),
(28, 11, 10, 5, '', NULL),
(28, 11, 14, 4, '', NULL),
(29, 3, 3, 2, '', NULL),
(29, 3, 4, 3, '', NULL),
(29, 3, 6, 4, '', NULL),
(29, 3, 7, 3, '', NULL),
(29, 3, 14, 1, '', NULL),
(29, 3, 20, 3, '', NULL),
(29, 3, 27, 1, '', NULL),
(29, 3, 33, 5, '', NULL),
(29, 5, 2, 3, '', NULL),
(29, 5, 3, 2, '', NULL),
(29, 5, 4, 2, '', NULL),
(29, 5, 6, 3, '', NULL),
(29, 5, 7, 3, '', NULL),
(29, 5, 10, 3, '', NULL),
(29, 5, 14, 3, '', NULL),
(29, 5, 17, 1, '', NULL),
(29, 5, 28, 4, '', NULL),
(29, 5, 29, 5, '', NULL),
(29, 5, 32, 2, '', NULL),
(29, 6, 21, 3, '', NULL),
(29, 6, 22, 4, '', NULL),
(29, 6, 23, 1, '', NULL),
(29, 6, 24, 2, '', NULL),
(29, 6, 25, 5, '', NULL),
(29, 6, 26, 5, '', NULL),
(29, 6, 27, 3, '', NULL),
(29, 6, 28, 2, '', NULL),
(29, 6, 29, 4, '', NULL),
(29, 6, 30, 5, '', NULL),
(29, 6, 31, 3, '', NULL),
(29, 6, 32, 3, '', NULL),
(29, 7, 2, 3, '', NULL),
(29, 7, 3, 4, '', NULL),
(29, 7, 4, 5, '', NULL),
(29, 7, 6, 2, '', NULL),
(29, 7, 7, 4, '', NULL),
(29, 7, 10, 2, '', NULL),
(29, 7, 14, 4, '', NULL),
(29, 7, 17, 3, '', NULL),
(29, 7, 28, 5, '', NULL),
(29, 7, 29, 5, '', NULL),
(29, 7, 32, 3, '', NULL),
(29, 8, 3, 2, '', NULL),
(29, 8, 4, 4, '', NULL),
(29, 8, 6, 1, '', NULL),
(29, 8, 7, 3, '', NULL),
(29, 8, 10, 4, '', NULL),
(29, 8, 12, 3, '', NULL),
(29, 8, 13, 5, '', NULL),
(29, 8, 14, 4, '', NULL),
(29, 8, 18, 3, '', NULL),
(29, 9, 11, 3, '', NULL),
(29, 9, 12, 5, '', NULL),
(29, 9, 13, 5, '', NULL),
(29, 9, 14, 1, '', NULL),
(29, 9, 15, 1, '', NULL),
(29, 9, 16, 3, '', NULL),
(29, 9, 17, 2, '', NULL),
(29, 9, 18, 5, '', NULL),
(29, 9, 19, 4, '', NULL),
(29, 9, 20, 2, '', NULL),
(29, 10, 2, 4, '', NULL),
(29, 10, 3, 3, '', NULL),
(29, 10, 4, 5, '', NULL),
(29, 10, 5, 5, '', NULL),
(29, 10, 6, 2, '', NULL),
(29, 10, 7, 4, '', NULL),
(29, 10, 8, 3, '', NULL),
(29, 10, 9, 3, '', NULL),
(29, 10, 10, 5, '', NULL),
(29, 11, 2, 2, '', NULL),
(29, 11, 3, 4, '', NULL),
(29, 11, 4, 4, '', NULL),
(29, 11, 6, 2, '', NULL),
(29, 11, 7, 5, '', NULL),
(29, 11, 8, 4, '', NULL),
(29, 11, 9, 5, '', NULL),
(29, 11, 10, 5, '', NULL),
(29, 11, 14, 4, '', NULL),
(30, 7, 2, 3, '', NULL),
(30, 7, 3, 5, '', NULL),
(30, 7, 4, 1, '', NULL),
(30, 7, 6, 1, '', NULL),
(30, 7, 7, 1, '', NULL),
(30, 7, 10, 1, '', NULL),
(30, 7, 14, 1, '', NULL),
(30, 7, 17, 1, '', NULL),
(30, 7, 28, 1, '', NULL),
(30, 7, 29, 1, '', NULL),
(30, 7, 32, 1, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluation_market_indicator`
--

CREATE TABLE IF NOT EXISTS `tb_evaluation_market_indicator` (
  `id_evaluation` int(11) NOT NULL,
  `id_market` int(11) NOT NULL,
  `id_indicator` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_evaluation`,`id_market`,`id_indicator`),
  KEY `id_indicator` (`id_indicator`),
  KEY `id_evaluation` (`id_evaluation`),
  KEY `id_market` (`id_market`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_indicator`
--

CREATE TABLE IF NOT EXISTS `tb_indicator` (
  `id_indicator` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ismarket` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `default_values` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_indicator`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `tb_indicator`
--

INSERT INTO `tb_indicator` (`id_indicator`, `name`, `ismarket`, `description`, `default_values`, `removed`) VALUES
(1, 'Hot Food', 1, 'Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)', NULL, 1),
(2, 'Wait time', 0, '', NULL, 0),
(3, 'Associate''s Uniform and name tag visibility', 0, '', NULL, 0),
(4, 'condition of associates uniform', 0, '', NULL, 0),
(5, 'Associate Smile and Greeting', 0, '', NULL, 0),
(6, 'Associate tone of voice and body language', 0, '', NULL, 0),
(7, 'Associate helpfulness,willingness to listen and find solutions', 0, '', NULL, 0),
(8, 'Did associate use positive language?', 0, '', NULL, 0),
(9, 'Speed of transaction', 0, '', NULL, 0),
(10, 'Associate''s closing of transaction', 0, '', NULL, 0),
(11, 'Associate''s Uniform and name tag visibility', 0, '(1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)', NULL, 0),
(12, 'Did Associate immediately acknowledge you?', 0, '', NULL, 0),
(13, 'Condition of associates uniform', 0, '(5 = excellent / 3 = good / 1 = poor)', NULL, 0),
(14, 'Associate Smile and stated Greeting', 0, ' (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)', NULL, 0),
(15, 'Associate tone of voice and body language', 0, '', NULL, 0),
(16, 'Associate helpfulness,willingness to listen and find solutions', 0, '', NULL, 0),
(17, 'Smell', 0, '( 1 = Bad smell  /  3 = Some Bad Smell  /  5 = Fresh Smell)', NULL, 0),
(18, 'Did Associate assist you in finding product?', 0, ' (1 = pointed / 3 = walked to end of aisle / 5 = walked to product)', NULL, 0),
(19, 'Any visible expired product', 0, '(1 = yes (anything within 1-day of exp. date) / 5 = no)', NULL, 0),
(20, 'Associate''s closing of transaction', 0, ' (1 = nothing / 4 = Thank you /5 = Thank you and an added appreciation)', NULL, 0),
(21, 'Wait time', 0, ' (5 = less than 10 minutes  /  4 = more than 10 minutes)', NULL, 0),
(22, 'Associate''s Uniform and name tag visibility', 0, ' (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)', NULL, 0),
(23, 'Condition of associates uniform', 0, '(5 = excellent / 3 = good / 1 = poor)', NULL, 0),
(24, 'Associate Smile and stated Greeting', 0, ' (1 = no smile or greeting / 3 = greeted - no smile / 5 =  smile and greeting)', NULL, 0),
(25, 'Associate tone of voice and body language', 0, '', NULL, 0),
(26, 'Associate helpfulness,willingness to listen and find solutions', 0, '', NULL, 0),
(27, 'Smell', 0, ' ( 1 = Bad smell  /  3 = Some Bad Smell  /  5 = Fresh Smell)', NULL, 0),
(28, 'Handling of Food', 0, ' (1 = improper / 5 = done correctly)', NULL, 0),
(29, '"Now serving ticket number use', 0, '  (1 = not using / 5 = using)', NULL, 0),
(30, 'Did the associate offer a sample slice', 0, ' (1 = no  /  5 = yes)', NULL, 0),
(31, 'Associate''s closing of transaction', 0, ' (1 = nothing / 4 = Thank you /5 = Thank you and an added appreciation)', NULL, 0),
(32, 'Did associate up-sell products', 0, ' (1 = no / 3 = Offered with NO enthusiasm  / 5 = Offered WITH enthusiasm)', NULL, 0),
(33, 'Availability of bags', 0, ' (1 = none / 3 = sparce / 5 = fully stocked)', NULL, 0),
(34, 'Shopping Carts', 1, '(1 = Visible Rust or Broken / 2 = Visible Garbage in Carts / 5 = Clean and Orderly)', NULL, 0),
(35, 'Store Entrance', 1, '(1 = Needs Pressure Cleaning / 2 = Too Much Visible Garbage  /  3 = Some Visible Garbage / 5 = Clean and Orderly', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_indicator_departament`
--

CREATE TABLE IF NOT EXISTS `tb_indicator_departament` (
  `id_indicator` int(11) NOT NULL,
  `id_departament` int(11) NOT NULL,
  PRIMARY KEY (`id_indicator`,`id_departament`),
  KEY `id_departament` (`id_departament`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_indicator_departament`
--

INSERT INTO `tb_indicator_departament` (`id_indicator`, `id_departament`) VALUES
(2, 5),
(2, 7),
(2, 10),
(2, 11),
(3, 3),
(3, 5),
(3, 7),
(3, 8),
(3, 10),
(3, 11),
(4, 3),
(4, 5),
(4, 7),
(4, 8),
(4, 10),
(4, 11),
(5, 10),
(6, 3),
(6, 5),
(6, 7),
(6, 8),
(6, 10),
(6, 11),
(7, 3),
(7, 5),
(7, 7),
(7, 8),
(7, 10),
(7, 11),
(8, 10),
(8, 11),
(9, 10),
(9, 11),
(10, 5),
(10, 7),
(10, 8),
(10, 10),
(10, 11),
(11, 9),
(12, 8),
(12, 9),
(13, 8),
(13, 9),
(14, 3),
(14, 5),
(14, 7),
(14, 8),
(14, 9),
(14, 11),
(15, 9),
(16, 9),
(17, 5),
(17, 7),
(17, 9),
(18, 8),
(18, 9),
(19, 9),
(20, 3),
(20, 9),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 3),
(27, 6),
(28, 5),
(28, 6),
(28, 7),
(29, 5),
(29, 6),
(29, 7),
(30, 6),
(31, 6),
(32, 5),
(32, 6),
(32, 7),
(33, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_indicator_market`
--

CREATE TABLE IF NOT EXISTS `tb_indicator_market` (
  `id_market` int(11) NOT NULL,
  `id_indicator` int(11) NOT NULL,
  PRIMARY KEY (`id_market`,`id_indicator`),
  KEY `id_indicator` (`id_indicator`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_indicator_market`
--

INSERT INTO `tb_indicator_market` (`id_market`, `id_indicator`) VALUES
(1, 34),
(1, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_market`
--

CREATE TABLE IF NOT EXISTS `tb_market` (
  `id_market` int(11) NOT NULL AUTO_INCREMENT,
  `num_market` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `group_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_market`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `tb_market`
--

INSERT INTO `tb_market` (`id_market`, `num_market`, `group_type`, `address`, `removed`) VALUES
(1, '5', 'A', '9688 S.W. 24th Street, Miami FL 33165', 0),
(3, '4', 'A', '6709 West Flagler St., Miami FL 33144', 0),
(4, '7', 'A', '4803 S.W. 8 Street, Coral Gables FL 33134', 0),
(5, '8', 'A', '3950 West 12th Ave, Hialeah, FL 33012', 0),
(6, '9', 'A', '4040 East 4th Ave., Hialeah FL 33013', 0),
(7, '10', 'A', '1690 West 68th Street, Hialeah FL 33014', 0),
(8, '15', 'A', '13659 S.W. 26 Street, Miami FL 33175', 0),
(9, '17', 'A', '10720 West Flagler Street, Miami FL 33175', 0),
(10, '20', 'A', '6430 N.W. 186 Street, Miami FL 33015', 0),
(11, '21', 'A', '13794 S.W. 152 Street, West Kendall FL 33177', 0),
(12, '23', 'A', '2425 S.W. 8th Street, Miami FL 33126', 0),
(13, '11', 'B', '950 East 4th Ave., Hialeah FL 33010', 0),
(14, '14', 'B', '1263 West Flagler Street, Miami FL 33135', 0),
(15, '16', 'B', '3925 Palm Ave., Hialeah FL 33012', 0),
(16, '18', 'B', '12175 S.W. 26 Street, Miami FL 33175', 0),
(17, '22', 'B', '5360 West 16th Ave., Hialeah FL 33012', 0),
(18, '24', 'B', '2319 North 60th Ave., Hollywood FL 33021', 0),
(19, '26', 'B', '2301 West 52nd Street, Hialeah FL 33016', 0),
(20, '27', 'B', '10333 Pines Boulevard, Pembroke Pines FL 33025', 0),
(21, '28', 'B', '3140 West 76 Street, Hialeah FL 33018', 0),
(22, '29', 'B', '16255 S.W. 88 Street, West Kendall FL 33196', 0),
(23, '31', 'B', '831 N.E. 8 St, Homestead FL 33030', 0),
(24, '32', 'B', '14655 S.W. 56 Street, Miami FL 33175', 0),
(25, '33', 'B', '10780 N.W. 58 Street, Miami FL 33178', 0),
(26, '34', 'B', '17171 Pines Boulevard, Pembroke Pines FL 33027', 0),
(27, '35', 'B', '7208 Southgate Blvd, North Lauderdale FL 33068', 0),
(28, '36', 'B', '18600 N.W. 87 Ave., Miami FL 33015', 0),
(29, '37', 'B', '14524 S.W. 8th Street, Miami FL 33184', 0),
(30, '38', 'B', '8601 Bird Road, Miami FL 33155', 0),
(31, '39', 'B', '1100 North John Young Parkway, Kissimmee FL 34741', 0),
(32, '40', 'B', '12981 South Orange Blossom, Orlando FL 32837', 0),
(33, '41', 'B', '5660 Curry Ford Road, Orlando FL 32822', 0),
(34, '42', 'B', '3801 West Flagler Street', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `type`, `description`) VALUES
(1, 'administrator', NULL),
(2, 'user', 'Usuarios del sistemas'),
(3, 'manager', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_role`, `user`, `name`, `surname`, `password`, `email`, `removed`) VALUES
(1, 1, 'administrator', 'Administrator', 'Administrator', '$2y$10$WEawMMLUnr1mNjuRIy1NHeBR2AWcP4pOjMfcZ3JCwNUCiAyCGAOKm', 'administrator@gmail.com', 0),
(2, 1, 'jebauza', 'Jorge', 'Bauza', '$2y$10$WEawMMLUnr1mNjuRIy1NHeBR2AWcP4pOjMfcZ3JCwNUCiAyCGAOKm', 'jebauza1989@gmail.com', 0),
(3, 3, 'kimzelen', 'Kim', 'Zelen', '$2y$10$aLjD7WtADhL3B/NNsEH61uXQcBpEaLGmQtcq2G8exBVItJXVa.j0m', 'kimzelen@yahoo.com', 0),
(4, 2, 'giovisbal', 'Gio Visbal', 'Mr.', '$2y$10$eNB10DkBchphtTwtsfgPOeCH5rRpNbyNUqVPEUEZM7g4VzTsOT956', 'giovisbal21@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

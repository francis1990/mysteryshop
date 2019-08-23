-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2017 a las 05:09:56
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mysteryshop_bd`
--
CREATE DATABASE IF NOT EXISTS `mysteryshop_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mysteryshop_bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departament`
--

CREATE TABLE `tb_departament` (
  `id_dpto` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_market` int(11) NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_departament`
--

INSERT INTO `tb_departament` (`id_dpto`, `name`, `id_market`, `removed`) VALUES
(1, 'Cafeteria Department', 1, 0),
(2, 'Bakery', 1, 0),
(3, 'Produce', 1, 0),
(4, 'Meat Department', 1, 0),
(5, 'Deli', 1, 0),
(6, 'Fish Department', 1, 0),
(7, 'Stock Personnel', 1, 0),
(8, 'Dairy', 1, 0),
(9, ' General Checkout', 1, 0),
(10, 'Customer Service Counter', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluation`
--

CREATE TABLE `tb_evaluation` (
  `id_evaluation` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_market` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_person` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_evaluation`
--

INSERT INTO `tb_evaluation` (`id_evaluation`, `date`, `time`, `id_user`, `id_market`, `update_date`, `update_person`, `approved`) VALUES
(32, '2017-06-26', '16:56:00', 2, 1, '2017-06-04', 'Jorge Bauza', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluation_departament_indicator`
--

CREATE TABLE `tb_evaluation_departament_indicator` (
  `id_evaluation` int(11) NOT NULL,
  `id_dpto` int(11) NOT NULL,
  `id_indicator` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `employee_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_evaluation_departament_indicator`
--

INSERT INTO `tb_evaluation_departament_indicator` (`id_evaluation`, `id_dpto`, `id_indicator`, `points`, `employee_name`, `description`) VALUES
(32, 1, 3, 3, 'Ernesto', NULL),
(32, 1, 4, 3, 'Ernesto', NULL),
(32, 1, 5, 3, 'Ernesto', NULL),
(32, 1, 6, 3, 'Ernesto', NULL),
(32, 1, 7, 3, 'Ernesto', NULL),
(32, 1, 8, 3, 'Ernesto', NULL),
(32, 1, 9, 5, 'Ernesto', NULL),
(32, 1, 10, 3, 'Ernesto', NULL),
(32, 1, 11, 3, 'Ernesto', NULL),
(32, 1, 12, 5, 'Ernesto', NULL),
(32, 2, 3, 2, 'Miguel', NULL),
(32, 2, 4, 3, 'Miguel', NULL),
(32, 2, 5, 3, 'Miguel', NULL),
(32, 2, 6, 3, 'Miguel', NULL),
(32, 2, 7, 2, 'Miguel', NULL),
(32, 2, 8, 2, 'Miguel', NULL),
(32, 2, 9, 1, 'Miguel', NULL),
(32, 2, 11, 1, 'Miguel', NULL),
(32, 2, 12, 3, 'Miguel', NULL),
(32, 2, 13, 1, 'Miguel', NULL),
(32, 3, 4, 5, 'Claudia', NULL),
(32, 3, 5, 5, 'Claudia', NULL),
(32, 3, 6, 5, 'Claudia', NULL),
(32, 3, 7, 5, 'Claudia', NULL),
(32, 3, 8, 5, 'Claudia', NULL),
(32, 3, 11, 5, 'Claudia', NULL),
(32, 3, 14, 5, 'Claudia', NULL),
(32, 3, 15, 5, 'Claudia', NULL),
(32, 4, 3, 5, 'Miguel', NULL),
(32, 4, 4, 5, 'Miguel', NULL),
(32, 4, 5, 5, 'Miguel', NULL),
(32, 4, 6, 5, 'Miguel', NULL),
(32, 4, 7, 5, 'Miguel', NULL),
(32, 4, 8, 5, 'Miguel', NULL),
(32, 4, 9, 5, 'Miguel', NULL),
(32, 4, 11, 5, 'Miguel', NULL),
(32, 4, 12, 5, 'Miguel', NULL),
(32, 4, 13, 5, 'Miguel', NULL),
(32, 4, 15, 5, 'Miguel', NULL),
(32, 5, 3, 0, '', NULL),
(32, 5, 4, 0, '', NULL),
(32, 5, 5, 0, '', NULL),
(32, 5, 6, 0, '', NULL),
(32, 5, 7, 0, '', NULL),
(32, 5, 8, 0, '', NULL),
(32, 5, 9, 0, '', NULL),
(32, 5, 11, 0, '', NULL),
(32, 5, 12, 0, '', NULL),
(32, 5, 13, 0, '', NULL),
(32, 5, 15, 0, '', NULL),
(32, 5, 16, 0, '', NULL),
(32, 6, 3, 3, '', NULL),
(32, 6, 4, 3, '', NULL),
(32, 6, 5, 3, '', NULL),
(32, 6, 6, 3, '', NULL),
(32, 6, 7, 3, '', NULL),
(32, 6, 8, 3, '', NULL),
(32, 6, 9, 1, '', NULL),
(32, 6, 11, 3, '', NULL),
(32, 6, 12, 3, '', NULL),
(32, 6, 13, 1, '', NULL),
(32, 6, 15, 3, '', NULL),
(32, 7, 4, 3, 'Guillermo', NULL),
(32, 7, 5, 3, 'Guillermo', NULL),
(32, 7, 6, 1, 'Guillermo', NULL),
(32, 7, 7, 3, 'Guillermo', NULL),
(32, 7, 8, 3, 'Guillermo', NULL),
(32, 7, 11, 3, 'Guillermo', NULL),
(32, 7, 17, 3, 'Guillermo', NULL),
(32, 7, 18, 3, 'Guillermo', NULL),
(32, 7, 19, 5, 'Guillermo', NULL),
(32, 8, 4, 5, '', NULL),
(32, 8, 5, 5, '', NULL),
(32, 8, 6, 5, '', NULL),
(32, 8, 7, 5, '', NULL),
(32, 8, 8, 5, '', NULL),
(32, 8, 11, 5, '', NULL),
(32, 8, 15, 5, '', NULL),
(32, 8, 17, 5, '', NULL),
(32, 8, 18, 5, '', NULL),
(32, 8, 19, 5, '', NULL),
(32, 9, 3, 5, '', NULL),
(32, 9, 4, 5, '', NULL),
(32, 9, 5, 5, '', NULL),
(32, 9, 6, 3, '', NULL),
(32, 9, 7, 2, '', NULL),
(32, 9, 8, 3, '', NULL),
(32, 9, 10, 3, '', NULL),
(32, 9, 11, 5, '', NULL),
(32, 10, 3, 5, '', NULL),
(32, 10, 4, 3, '', NULL),
(32, 10, 5, 5, '', NULL),
(32, 10, 6, 1, '', NULL),
(32, 10, 7, 3, '', NULL),
(32, 10, 8, 2, '', NULL),
(32, 10, 10, 3, '', NULL),
(32, 10, 11, 5, '', NULL),
(32, 10, 20, 3, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_evaluation_market_indicator`
--

CREATE TABLE `tb_evaluation_market_indicator` (
  `id_evaluation` int(11) NOT NULL,
  `id_market` int(11) NOT NULL,
  `id_indicator` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_evaluation_market_indicator`
--

INSERT INTO `tb_evaluation_market_indicator` (`id_evaluation`, `id_market`, `id_indicator`, `points`, `description`) VALUES
(32, 1, 1, 2, NULL),
(32, 1, 2, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_indicator`
--

CREATE TABLE `tb_indicator` (
  `id_indicator` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ismarket` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `default_values` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_indicator`
--

INSERT INTO `tb_indicator` (`id_indicator`, `name`, `ismarket`, `description`, `default_values`, `removed`) VALUES
(1, 'Shopping Carts', 1, '1 = Visible Rust or Broken / 2 = Visible Garbage in Carts / 5 = Clean and Orderly', '1,2,5', 0),
(2, 'Store Entrance', 1, '1 = Needs Pressure Cleaning / 2 = Too Much Visible Garbage  /  3 = Some Visible Garbage / 5 = Clean and Orderly', '1,2,3,5', 0),
(3, 'Wait time', 0, '5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min', '1,2,3,4,5', 0),
(4, 'Associate''s uniform and name tag visibility', 0, '1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag', '1,3,5', 0),
(5, 'Condition of Associate''s uniform', 0, '5 = excellent / 3 = good / 1 = poor', '1,3,5', 0),
(6, 'Associate smile and stated greeting', 0, '1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting', '1,3,5', 0),
(7, 'Associate''s tone of voice and body language', 0, '', '1,2,3,4,5', 0),
(8, 'Associate''s helpfulness, willingness to listen and find solutions', 0, '', '1,2,3,4,5', 0),
(9, 'Handling of food', 0, '1 = improper / 5 = done correctly', '1,5', 0),
(10, ' Speed of transaction', 0, '', '1,2,3,4,5', 0),
(11, 'Associate''s closing of transaction', 0, '1 = nothing / 3 = Thank you / 5 = Thank you and added appreciation', '1,3,5', 0),
(12, 'Did Associate up-sell products', 0, '1 = no / 3 = Offered with NO enthusiasm  / 5 = Offered WITH enthusiasm', '1,3,5', 0),
(13, 'Now serving, ticket number use', 0, '1 = not using / 5 = using', '1,5', 0),
(14, 'Availability of bags', 0, '1 = none / 3 = sparce / 5 = fully stocked', '1,3,5', 0),
(15, 'Smell', 0, '1 = Bad smell  /  3 = Some Bad Smell  /  5 = Fresh Smell', '1,3,5', 0),
(16, 'Did the Associate offer a sample slice', 0, '1 = no  /  5 = yes', '1,5', 0),
(17, 'Did Associate immediately acknowledge you?', 0, '', '1,2,3,4,5', 0),
(18, 'Did Associate assist you in finding product?', 0, '1 = pointed / 3 = walked to end of aisle / 5 = walked to product', '1,3,5', 0),
(19, 'Any visible expired product', 0, '1 = yes (anything within 1-day of exp. date) / 5 = no', '1,5', 0),
(20, 'Did Associate use positive language?', 0, '', '1,2,3,4,5', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_indicator_departament`
--

CREATE TABLE `tb_indicator_departament` (
  `id_indicator` int(11) NOT NULL,
  `id_departament` int(11) NOT NULL,
  `order_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_indicator_departament`
--

INSERT INTO `tb_indicator_departament` (`id_indicator`, `id_departament`, `order_position`) VALUES
(3, 1, 1),
(3, 2, 1),
(3, 4, 1),
(3, 5, NULL),
(3, 6, NULL),
(3, 9, NULL),
(3, 10, NULL),
(4, 1, 2),
(4, 2, 2),
(4, 3, 1),
(4, 4, 2),
(4, 5, NULL),
(4, 6, NULL),
(4, 7, NULL),
(4, 8, NULL),
(4, 9, NULL),
(4, 10, NULL),
(5, 1, 3),
(5, 2, 3),
(5, 3, 3),
(5, 4, 3),
(5, 5, NULL),
(5, 6, NULL),
(5, 7, NULL),
(5, 8, NULL),
(5, 9, NULL),
(5, 10, NULL),
(6, 1, 4),
(6, 2, 4),
(6, 3, 2),
(6, 4, 4),
(6, 5, NULL),
(6, 6, NULL),
(6, 7, NULL),
(6, 8, NULL),
(6, 9, NULL),
(6, 10, NULL),
(7, 1, 5),
(7, 2, 5),
(7, 3, 4),
(7, 4, 5),
(7, 5, NULL),
(7, 6, NULL),
(7, 7, NULL),
(7, 8, NULL),
(7, 9, NULL),
(7, 10, NULL),
(8, 1, 6),
(8, 2, 6),
(8, 3, 5),
(8, 4, 6),
(8, 5, NULL),
(8, 6, NULL),
(8, 7, NULL),
(8, 8, NULL),
(8, 9, NULL),
(8, 10, NULL),
(9, 1, 7),
(9, 2, 7),
(9, 4, 8),
(9, 5, NULL),
(9, 6, NULL),
(10, 1, 8),
(10, 9, NULL),
(10, 10, NULL),
(11, 1, 9),
(11, 2, 9),
(11, 3, 8),
(11, 4, 10),
(11, 5, NULL),
(11, 6, NULL),
(11, 7, NULL),
(11, 8, NULL),
(11, 9, NULL),
(11, 10, NULL),
(12, 1, 10),
(12, 2, 10),
(12, 4, 11),
(12, 5, NULL),
(12, 6, NULL),
(13, 2, 8),
(13, 4, 9),
(13, 5, NULL),
(13, 6, NULL),
(14, 3, 6),
(15, 3, 7),
(15, 4, 7),
(15, 5, NULL),
(15, 6, NULL),
(15, 8, NULL),
(16, 5, 0),
(17, 7, 0),
(17, 8, NULL),
(18, 7, 0),
(18, 8, NULL),
(19, 7, 0),
(19, 8, NULL),
(20, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_indicator_market`
--

CREATE TABLE `tb_indicator_market` (
  `id_market` int(11) NOT NULL,
  `id_indicator` int(11) NOT NULL,
  `order_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_indicator_market`
--

INSERT INTO `tb_indicator_market` (`id_market`, `id_indicator`, `order_position`) VALUES
(1, 1, 1),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_market`
--

CREATE TABLE `tb_market` (
  `id_market` int(11) NOT NULL,
  `num_market` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `group_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_role`, `user`, `name`, `surname`, `password`, `email`, `removed`) VALUES
(1, 1, 'administrator', 'Administrator', 'Administrator', '$2y$10$WEawMMLUnr1mNjuRIy1NHeBR2AWcP4pOjMfcZ3JCwNUCiAyCGAOKm', 'administrator@gmail.com', 0),
(2, 1, 'jebauza', 'Jorge', 'Bauza', '$2y$10$WEawMMLUnr1mNjuRIy1NHeBR2AWcP4pOjMfcZ3JCwNUCiAyCGAOKm', 'jebauza1989@gmail.com', 0),
(3, 3, 'kimzelen', 'Kim', 'Zelen', '$2y$10$aLjD7WtADhL3B/NNsEH61uXQcBpEaLGmQtcq2G8exBVItJXVa.j0m', 'kimzelen@yahoo.com', 0),
(4, 2, 'giovisbal', 'Gio Visbal', 'Mr.', '$2y$10$eNB10DkBchphtTwtsfgPOeCH5rRpNbyNUqVPEUEZM7g4VzTsOT956', 'giovisbal21@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_departament`
--
ALTER TABLE `tb_departament`
  ADD PRIMARY KEY (`id_dpto`),
  ADD KEY `id_market` (`id_market`);

--
-- Indices de la tabla `tb_evaluation`
--
ALTER TABLE `tb_evaluation`
  ADD PRIMARY KEY (`id_evaluation`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `tb_evaluation_departament_indicator`
--
ALTER TABLE `tb_evaluation_departament_indicator`
  ADD PRIMARY KEY (`id_evaluation`,`id_dpto`,`id_indicator`),
  ADD KEY `id_indicator` (`id_indicator`),
  ADD KEY `id_evaluation` (`id_evaluation`),
  ADD KEY `id_dpto` (`id_dpto`);

--
-- Indices de la tabla `tb_evaluation_market_indicator`
--
ALTER TABLE `tb_evaluation_market_indicator`
  ADD PRIMARY KEY (`id_evaluation`,`id_market`,`id_indicator`),
  ADD KEY `id_indicator` (`id_indicator`),
  ADD KEY `id_evaluation` (`id_evaluation`),
  ADD KEY `id_market` (`id_market`);

--
-- Indices de la tabla `tb_indicator`
--
ALTER TABLE `tb_indicator`
  ADD PRIMARY KEY (`id_indicator`);

--
-- Indices de la tabla `tb_indicator_departament`
--
ALTER TABLE `tb_indicator_departament`
  ADD PRIMARY KEY (`id_indicator`,`id_departament`),
  ADD KEY `id_departament` (`id_departament`);

--
-- Indices de la tabla `tb_indicator_market`
--
ALTER TABLE `tb_indicator_market`
  ADD PRIMARY KEY (`id_market`,`id_indicator`),
  ADD KEY `id_indicator` (`id_indicator`);

--
-- Indices de la tabla `tb_market`
--
ALTER TABLE `tb_market`
  ADD PRIMARY KEY (`id_market`);

--
-- Indices de la tabla `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_departament`
--
ALTER TABLE `tb_departament`
  MODIFY `id_dpto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tb_evaluation`
--
ALTER TABLE `tb_evaluation`
  MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `tb_indicator`
--
ALTER TABLE `tb_indicator`
  MODIFY `id_indicator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tb_market`
--
ALTER TABLE `tb_market`
  MODIFY `id_market` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_departament`
--
ALTER TABLE `tb_departament`
  ADD CONSTRAINT `tb_departament_ibfk_3` FOREIGN KEY (`id_market`) REFERENCES `tb_market` (`id_market`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_evaluation`
--
ALTER TABLE `tb_evaluation`
  ADD CONSTRAINT `tb_evaluation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Filtros para la tabla `tb_evaluation_departament_indicator`
--
ALTER TABLE `tb_evaluation_departament_indicator`
  ADD CONSTRAINT `tb_evaluation_departament_indicator_ibfk_2` FOREIGN KEY (`id_dpto`) REFERENCES `tb_departament` (`id_dpto`),
  ADD CONSTRAINT `tb_evaluation_departament_indicator_ibfk_3` FOREIGN KEY (`id_indicator`) REFERENCES `tb_indicator` (`id_indicator`),
  ADD CONSTRAINT `tb_evaluation_departament_indicator_ibfk_4` FOREIGN KEY (`id_evaluation`) REFERENCES `tb_evaluation` (`id_evaluation`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_evaluation_market_indicator`
--
ALTER TABLE `tb_evaluation_market_indicator`
  ADD CONSTRAINT `tb_evaluation_market_indicator_ibfk_2` FOREIGN KEY (`id_market`) REFERENCES `tb_market` (`id_market`),
  ADD CONSTRAINT `tb_evaluation_market_indicator_ibfk_3` FOREIGN KEY (`id_indicator`) REFERENCES `tb_indicator` (`id_indicator`),
  ADD CONSTRAINT `tb_evaluation_market_indicator_ibfk_4` FOREIGN KEY (`id_evaluation`) REFERENCES `tb_evaluation` (`id_evaluation`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_indicator_departament`
--
ALTER TABLE `tb_indicator_departament`
  ADD CONSTRAINT `tb_indicator_departament_ibfk_1` FOREIGN KEY (`id_indicator`) REFERENCES `tb_indicator` (`id_indicator`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_indicator_departament_ibfk_2` FOREIGN KEY (`id_departament`) REFERENCES `tb_departament` (`id_dpto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_indicator_market`
--
ALTER TABLE `tb_indicator_market`
  ADD CONSTRAINT `tb_indicator_market_ibfk_1` FOREIGN KEY (`id_market`) REFERENCES `tb_market` (`id_market`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_indicator_market_ibfk_2` FOREIGN KEY (`id_indicator`) REFERENCES `tb_indicator` (`id_indicator`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2019 a las 15:53:07
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `espacios_publicitarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciantes`
--

CREATE TABLE IF NOT EXISTS `anunciantes` (
`id` int(11) NOT NULL,
  `cod` varchar(15) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `tip_anu` int(11) NOT NULL,
  `exp` varchar(20) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `tel1` int(11) NOT NULL,
  `tel2` int(11) NOT NULL,
  `tip` varchar(2) NOT NULL,
  `rif` int(10) NOT NULL,
  `cor1` varchar(50) NOT NULL,
  `cor2` varchar(50) NOT NULL,
  `cor3` varchar(50) NOT NULL,
  `ddc` text NOT NULL,
  `tdc` int(11) NOT NULL,
  `cdc` int(11) NOT NULL,
  `est` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anunciantes`
--

INSERT INTO `anunciantes` (`id`, `cod`, `nom`, `tip_anu`, `exp`, `dir`, `tel1`, `tel2`, `tip`, `rif`, `cor1`, `cor2`, `cor3`, `ddc`, `tdc`, `cdc`, `est`) VALUES
(1, 'A-00001', 'Metro de Valencia', 1, '1', 'Monumental', 2147483647, 2147483647, 'C-', 20008023, 'mvalencia@metrovalencia.gob.ve', '', '', 'Luis Sarabia', 2147483647, 24290349, 1),
(2, 'A-00002', 'Transcarabobo', 3, '02', 'valencia', 6664446, 46464664, 'J-', 6464646, 'transc@gmail.com', '', '', 'Luis Sarabia', 112131614, 5333131, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE IF NOT EXISTS `bienes` (
`id` int(11) NOT NULL,
  `cod_are` varchar(3) NOT NULL,
  `tipo` varchar(4) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `ubc` text NOT NULL,
  `anc` varchar(5) NOT NULL,
  `alt` varchar(5) NOT NULL,
  `mt2` varchar(5) NOT NULL,
  `tip_esp` text NOT NULL,
  `desc` text NOT NULL,
  `est` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bienes`
--

INSERT INTO `bienes` (`id`, `cod_are`, `tipo`, `cod`, `ubc`, `anc`, `alt`, `mt2`, `tip_esp`, `desc`, `est`) VALUES
(1, '1', 'B', 'CI-MON-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Institucional', 2),
(2, '1', 'B', 'CI-MON-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Institucional', 1),
(3, '1', 'A', 'CI-MON-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Institucional', 1),
(4, '1', 'AA', 'CI-MON-AND-04', 'Anden/O', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Publicitaria', 1),
(5, '1', 'A', 'CI-MON-AND-05', 'Anden/O', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Institucional', 1),
(6, '1', 'B', 'CI-MON-AND-06', 'Anden/O', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Institucional', 1),
(7, '1', 'B', 'CI-MON-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Institucionales', 'Cartelera Institucional', 1),
(8, '1', 'B', 'CP-MON-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(9, '1', 'B', 'CP-MON-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(10, '1', 'AA', 'CP-MON-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(11, '1', 'A', 'CP-MON-AND-04', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(12, '1', 'A', 'CP-MON-AND-05', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(13, '1', 'A', 'CP-MON-AND-06', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(14, '1', 'AA', 'CP-MON-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(15, '1', 'AA', 'CP-MON-AND-08', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(16, '1', 'AA', 'CP-MON-AND-09', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(17, '1', 'AA', 'CP-MON-AND-10', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(18, '1', 'B', 'CP-MON-AND-11', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(19, '1', 'B', 'CP-MON-AND-12', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(20, '1', 'AA', 'EP-MUR-MON-MEZ-01', 'Mezzanina/N', '3.9', '1.6', '6.24', 'Murales', '', 1),
(21, '1', 'B', 'EP-MUR-MON-AND-01', 'Anden/E', '4', '1.6', '6.4', 'Murales', '', 1),
(22, '1', 'B', 'EP-MUR-MON-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(23, '1', 'B', 'EP-MUR-MON-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(24, '1', 'B', 'EP-MUR-MON-AND-04', 'Anden/E', '2', '1.2', '2.4', 'Murales', '', 1),
(25, '1', 'B', 'EP-MUR-MON-AND-05', 'Anden/E', '2', '1.2', '2.4', 'Murales', '', 1),
(26, '1', 'B', 'EP-MUR-MON-AND-06', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(27, '1', 'B', 'EP-MUR-MON-AND-07', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(28, '1', 'AA', 'EP-MUR-MON-AND-08', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(29, '1', 'AA', 'EP-MUR-MON-AND-09', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(30, '1', 'AA', 'EP-MUR-MON-AND-10', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(31, '1', 'AA', 'EP-MUR-MON-AND-11', 'Anden/E', '2.4', '1.2', '2.88', 'Murales', '', 1),
(32, '1', 'A', 'EP-MUR-MON-AND-12', 'Anden/O', '2.9', '1.4', '4.06', 'Murales', '', 1),
(33, '1', 'AA', 'EP-MUR-MON-AND-13', 'Anden/O', '2.55', '1.4', '3.57', 'Murales', '', 1),
(34, '1', 'AA', 'EP-MUR-MON-AND-14', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(35, '1', 'AA', 'EP-MUR-MON-AND-15', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(36, '1', 'A', 'EP-MUR-MON-AND-16', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(37, '1', 'B', 'EP-MUR-MON-AND-17', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(38, '1', 'B', 'EP-MUR-MON-AND-18', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(39, '1', 'B', 'EP-MUR-MON-AND-19', 'Anden/O', '4', '1.6', '6.4', 'Murales', '', 1),
(40, '1', 'B', 'EP-MUR-MON-AND-20', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(41, '1', 'B', 'EP-MUR-MON-AND-21', 'Anden/O', '2', '1.2', '2.4', 'Murales', '', 1),
(42, '1', 'B', 'EP-MUR-MON-AND-22', 'Anden/O', '2', '1.2', '2.4', 'Murales', '', 1),
(43, '1', 'B', 'EP-MUR-MON-AND-23', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(44, '1', 'B', 'EP-MUR-MON-AND-24', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(45, '1', 'B', 'EP-MUR-MON-AND-25', 'Anden/O', '2.4', '1.2', '2.88', 'Murales', '', 1),
(46, '1', 'AA', 'EP-COL-MON-MEZ-01', 'Mezzanina/E', '1', '1.6', '1.6', 'Columnas', '', 1),
(47, '1', 'AA', 'EP-COL-MON-MEZ-02', 'Mezzanina/E', '1', '2.4', '2.4', 'Columnas', '', 1),
(48, '1', 'AA', 'EP-COL-MON-MEZ-03', 'Mezzanina/E', '1.2', '1.6', '1.92', 'Columnas', '', 1),
(49, '1', 'AA', 'EP-COL-MON-MEZ-04', 'Mezzanina/E', '1', '1.6', '1.6', 'Columnas', '', 1),
(50, '1', 'A', 'EP-COL-MON-MEZ-05', 'Mezzanina/O', '1', '1.6', '1.6', 'Columnas', '', 1),
(51, '1', 'A', 'EP-COL-MON-MEZ-06', 'Mezzanina/O', '0.8', '2.4', '1.92', 'Columnas', '', 1),
(52, '1', 'A', 'EP-COL-MON-AND-01', 'Anden/E', '1', '1.6', '1.6', 'Columnas', '', 1),
(53, '1', 'A', 'EP-COL-MON-AND-02', 'Anden/E', '1', '1.6', '1.6', 'Columnas', '', 1),
(54, '1', 'A', 'EP-COL-MON-AND-03', 'Anden/E', '1', '1.6', '1.6', 'Columnas', '', 1),
(55, '1', 'AA', 'EP-COL-MON-AND-04', 'Anden/O', '1', '1.6', '1.6', 'Columnas', '', 1),
(56, '1', 'A', 'EP-COL-MON-AND-05', 'Anden/O', '0.8', '1.6', '1.28', 'Columnas', '', 1),
(57, '1', 'B', 'EP-COL-MON-AND-06', 'Anden/O', '1', '1.6', '1.6', 'Columnas', '', 1),
(58, '1', 'B', 'EP-COL-MON-AND-07', 'Anden/O', '0.8', '1.6', '1.28', 'Columnas', '', 1),
(59, '1', 'A', 'EP-ANT-MON-MEZ-01', 'Mezzanina/E', '2', '1.3', '2.6', 'Antepechos', '', 1),
(60, '1', 'AA', 'EP-ANT-MON-MEZ-02', 'Mezzanina/E', '2', '1.3', '2.6', 'Antepechos', '', 1),
(61, '1', 'AA', 'EP-ANT-MON-MEZ-03', 'Mezzanina/E', '2', '2.8', '5.6', 'Antepechos', '', 1),
(62, '1', 'A', 'EP-ANT-MON-MEZ-04', 'Mezzanina/O', '2', '1.3', '2.6', 'Antepechos', '', 1),
(63, '1', 'A', 'EP-ANT-MON-MEZ-05', 'Mezzanina/O', '2', '1.3', '2.6', 'Antepechos', '', 1),
(64, '1', 'AA', 'EP-CV-MON-AND-01', 'Anden', '2.4', '2', '4.8', 'Via', '', 1),
(65, '2', 'A', 'CI-FER-MEZ-01', 'Mezzanina/E', '1.75', '1.2', '2.1', 'Institucional', 'Cartelera Institucional', 2),
(66, '2', 'A', 'CI-FER-MEZ-02', 'Mezzanina/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(67, '2', 'A', 'CI-FER-MEZ-03', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(68, '2', 'A', 'CI-FER-MEZ-04', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(69, '2', 'A', 'CI-FER-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(70, '2', 'A', 'CI-FER-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(71, '2', 'A', 'CI-FER-AND-03', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(72, '2', 'A', 'CI-FER-AND-04', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(73, '2', 'A', 'CI-FER-AND-05', 'Anden/E', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(74, '2', 'A', 'CI-FER-AND-06', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(75, '2', 'A', 'CI-FER-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(76, '2', 'A', 'CI-FER-AND-08', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(77, '2', 'A', 'CI-FER-AND-09', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(78, '2', 'A', 'CI-FER-AND-10', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', '', 1),
(79, '2', 'A', 'CP-FER-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(80, '2', 'A', 'CP-FER-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(81, '2', 'A', 'CP-FER-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(82, '2', 'A', 'CP-FER-AND-04', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(83, '2', 'A', 'CP-FER-AND-05', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(84, '2', 'A', 'CP-FER-AND-06', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(85, '2', 'A', 'CP-FER-AND-07', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(86, '2', 'A', 'CP-FER-AND-08', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(87, '2', 'A', 'CP-FER-AND-09', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(88, '2', 'A', 'CP-FER-AND-10', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(89, '2', 'A', 'CP-FER-AND-11', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(90, '2', 'A', 'CP-FER-AND-12', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(91, '2', 'A', 'CP-FER-AND-13', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(92, '2', 'A', 'CP-FER-AND-14', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(93, '2', 'A', 'CP-FER-AND-15', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(94, '2', 'A', 'CP-FER-AND-16', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(95, '2', 'A', 'EP-MUR-FER-AND-01', 'Anden/E', '3.6', '1.2', '4.32', 'Murales', '', 1),
(96, '2', 'A', 'EP-MUR-FER-AND-02', 'Anden/o', '3.6', '1.2', '4.32', 'Murales', '', 1),
(97, '3', 'AA', 'CI-PAL-MEZ-01', 'Mezzanina/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(98, '3', 'AA', 'CI-PAL-MEZ-02', 'Mezzanina/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(99, '3', 'AA', 'CI-PAL-MEZ-03', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(100, '3', 'AA', 'CI-PAL-MEZ-04', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(101, '3', 'AA', 'CI-PAL-AND-01', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(102, '3', 'A', 'CI-PAL-AND-02', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(103, '3', 'AA', 'CI-PAL-AND-03', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(104, '3', 'AA', 'CI-PAL-AND-04', 'Anden/O', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(105, '3', 'A', 'CI-PAL-AND-05', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', 'Valla Institucional', 1),
(106, '3', 'AA', 'CI-PAL-AND-06', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', 'Valla Institucional', 1),
(107, '3', 'AA', 'CP-PAL-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(108, '3', 'AA', 'CP-PAL-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(109, '3', 'AA', 'CP-PAL-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(110, '3', 'AA', 'CP-PAL-AND-04', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(111, '3', 'AA', 'CP-PAL-AND-05', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(112, '3', 'AA', 'CP-PAL-AND-06', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(113, '3', 'AA', 'CP-PAL-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(114, '3', 'AA', 'CP-PAL-AND-08', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(115, '3', 'AA', 'CP-PAL-AND-09', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(116, '3', 'AA', 'CP-PAL-AND-10', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(117, '3', 'AA', 'CP-PAL-AND-11', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(118, '3', 'AA', 'CP-PAL-AND-12', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(119, '3', 'AA', 'EP-MUR-PAL-MEZ-01', 'Mezzanina/E', '3', '1.2', '3.6', 'Murales', '', 1),
(120, '3', 'AA', 'EP-MUR-PAL-MEZ-02', 'Mezzanina/E', '2.75', '1.8', '4.95', 'Murales', '', 1),
(121, '3', 'AA', 'EP-MUR-PAL-MEZ-03', 'Mezzanina/E', '3', '1.2', '3.6', 'Murales', '', 1),
(122, '3', 'AA', 'EP-MUR-PAL-MEZ-04', 'Mezzanina/O', '2.75', '1.8', '4.95', 'Murales', '', 1),
(123, '3', 'AA', 'EP-MUR-PAL-MEZ-05', 'Mezzanina/O', '3', '1.2', '3.6', 'Murales', '', 1),
(124, '3', 'AA', 'EP-MUR-PAL-AND-01', 'Anden/E', '2.4', '1.8', '4.32', 'Murales', '', 1),
(125, '3', 'AA', 'EP-MUR-PAL-AND-02', 'Anden/E', '2.4', '1.8', '4.32', 'Murales', '', 1),
(126, '3', 'AA', 'EP-MUR-PAL-AND-03', 'Anden/E', '2.4', '1.8', '4.32', 'Murales', '', 1),
(127, '3', 'AA', 'EP-MUR-PAL-AND-04', 'Anden/E', '2.4', '1.8', '4.32', 'Murales', '', 1),
(128, '3', 'AA', 'EP-MUR-PAL-AND-05', 'Anden/O', '4.2', '1.2', '5.04', 'Murales', '', 1),
(129, '3', 'AA', 'EP-MUR-PAL-AND-06', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(130, '3', 'AA', 'EP-MUR-PAL-AND-07', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(131, '3', 'AA', 'EP-MUR-PAL-AND-08', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(132, '3', 'AA', 'EP-COL-PAL-MEZ-01', 'Mezzanina/E', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(133, '3', 'AA', 'EP-COL-PAL-MEZ-02', 'Mezzanina/E', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(134, '3', 'AA', 'EP-COL-PAL-MEZ-03', 'Mezzanina/E', '1', '2.4', '2.4', 'Columnas', '', 1),
(135, '3', 'AA', 'EP-COL-PAL-MEZ-04', 'Mezzanina/O', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(136, '3', 'AA', 'EP-COL-PAL-AND-01', 'Anden/E', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(137, '3', 'AA', 'EP-COL-PAL-AND-02', 'Anden/E', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(138, '3', 'AA', 'EP-COL-PAL-AND-03', 'Anden/E', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(139, '3', 'AA', 'EP-COL-PAL-AND-04', 'Anden/E', '1', '2.4', '2.4', 'Columnas', '', 1),
(140, '3', 'AA', 'EP-COL-PAL-AND-05', 'Anden/E', '1.4', '2.1', '2.94', 'Columnas', '', 1),
(141, '3', 'AA', 'EP-COL-PAL-AND-06', 'Anden/O', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(142, '3', 'AA', 'EP-COL-PAL-AND-07', 'Anden/O', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(143, '3', 'AA', 'EP-COL-PAL-AND-08', 'Anden/O', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(144, '3', 'AA', 'EP-COL-PAL-AND-09', 'Anden/O', '1', '2.4', '2.4', 'Columnas', '', 1),
(145, '3', 'AA', 'EP-COL-PAL-AND-10', 'Anden/O', '2.8', '1.2', '3.36', 'Columnas', '', 1),
(146, '3', 'AA', 'EP-COL-PAL-AND-11', 'Anden/O', '0.95', '2.4', '2.28', 'Columnas', '', 1),
(147, '3', 'AA', 'EP-ANT-PAL-MEZ-01', 'Mezzanina/E', '4.25', '1.6', '6.8', 'Antepechos', '', 1),
(148, '3', 'AA', 'EP-ANT-PAL-MEZ-02', 'Mezzanina/N', '5', '0.65', '3.25', 'Antepechos', '', 1),
(149, '3', 'AA', 'EP-ANT-PAL-MEZ-03', 'Mezzanina/O', '4.25', '1.6', '6.8', 'Antepechos', '', 1),
(150, '3', 'AA', 'EP-ANT-PAL-AND-01', 'Anden/O', '4.2', '1.2', '5.04', 'Antepechos', '', 1),
(151, '3', 'AA', 'EP-FLO-PAL-MEZ-01/S', 'Mezzanina/S', '5.4', '4.2', '22.68', 'antepechos', '', 1),
(152, '3', 'AA', 'EP-FLO-PAL-MEZ-02/N', 'Mezzanina/N', '5.4', '4.2', '22.68', 'Floorgraphic', '', 1),
(153, '3', 'AA', 'EP-PV-PAL-MEZ-01', 'Mezzanina', '70.49', '0.6', '42.29', 'Vidrio', '', 1),
(154, '4', 'A', 'CI-STR-MEZ-01', 'Mezzanina/E', '1.7', '1.15', '1.955', 'Institucional', 'Valla Mapa', 1),
(155, '4', 'A', 'CI-STR-MEZ-02', 'Mezzanina/E', '1.7', '1.15', '1.955', 'Institucional', 'Valla Mapa', 1),
(156, '4', 'A', 'CI-STR-MEZ-03', 'Mezzanina/O', '1.7', '1.15', '1.955', 'Institucional', 'Valla Mapa', 2),
(157, '4', 'A', 'CI-STR-MEZ-04', 'Mezzanina/O', '1.7', '1.15', '1.955', 'Institucional', 'Valla Mapa', 1),
(158, '4', 'A', 'CI-STR-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Institucional', 'Valla Mapa', 1),
(159, '4', 'A', 'CI-STR-AND-02', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(160, '4', 'A', 'CI-STR-AND-03', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', 'Valla Mapa', 1),
(161, '4', 'A', 'CI-STR-AND-04', 'Anden/E', '2.4', '1.2', '2.88', 'Institucional', 'Valla Mapa', 1),
(162, '4', 'A', 'CI-STR-AND-05', 'Anden/O', '1.75', '1.15', '2.012', 'Institucional', 'Valla Institucional', 1),
(163, '4', 'A', 'CI-STR-AND-06', 'Anden/O', '1.75', '1.15', '2.012', 'Institucional', 'Valla Institucional', 1),
(164, '4', 'A', 'CI-STR-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', 'Valla Institucional', 2),
(165, '4', 'A', 'CI-STR-AND-08', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', 'Valla Institucional', 1),
(166, '4', 'A', 'CP-STR-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(167, '4', 'A', 'CP-STR-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(168, '4', 'A', 'CP-STR-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(169, '4', 'A', 'CP-STR-AND-04', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(170, '4', 'A', 'CP-STR-AND-05', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(171, '4', 'A', 'CP-STR-AND-06', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(172, '4', 'A', 'CP-STR-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(173, '4', 'A', 'CP-STR-AND-08', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(174, '4', 'A', 'CP-STR-AND-09', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(175, '4', 'A', 'CP-STR-AND-10', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(176, '4', 'A', 'EP-MUR-STR-MEZ-01', 'Mezzanina/E', '2.8', '1.2', '3.36', 'Murales', '', 1),
(177, '4', 'A', 'EP-MUR-STR-MEZ-02', 'Mezzanina/O', '2.8', '1.2', '3.36', 'Murales', '', 1),
(178, '4', 'A', 'EP-MUR-STR-AND- 01', 'Anden/O', '5', '0.6', '3', 'Murales', '', 1),
(179, '5', 'A', 'CI-MIC-MEZ-01', 'Mezzanina/E', '1.15', '1.15', '', 'Cartelera Institucional', '', 1),
(180, '5', 'A', 'CI-MIC-MEZ-02', 'Mezzanina/E', '1.15', '1.15', '', 'Cartelera Institucional', '', 1),
(181, '5', 'A', 'CI-MIC-MEZ-03', 'Mezzanina/O', '1.15', '1.15', '', 'Cartelera Institucional', '', 1),
(182, '5', 'A', 'CI-MIC-MEZ-04', 'Mezzanina/O', '1.15', '1.15', '', 'Cartelera Institucional', '', 1),
(183, '5', 'A', 'CI-MIC-AND-01', 'Anden/E', '1.7', '1.15', '', 'Cartelera Institucional', '', 1),
(184, '5', 'A', 'CI-MIC-AND-02', 'Anden/E', '1.7', '1.15', '', 'Cartelera Institucional', '', 1),
(185, '5', 'A', 'CI-MIC-AND-03', 'Anden/O', '1.7', '1.15', '', 'Cartelera Institucional', '', 1),
(186, '5', 'A', 'CI-MIC-AND-04', 'Anden/O', '1.7', '1.15', '', 'Cartelera Institucional', '', 1),
(187, '5', 'A', 'CI-MIC-AND-05', 'Anden/O', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(188, '5', 'A', 'CI-MIC-AND-06', 'Anden/O', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(189, '5', 'A', 'CP-MIC-AND-01', 'Anden/E', '2.35', '1.15', '', 'Cartelera Institucional', '', 2),
(190, '5', 'A', 'CP-MIC-AND-02', 'Anden/E', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(191, '5', 'A', 'CP-MIC-AND-03', 'Anden/E', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(192, '5', 'A', 'CP-MIC-AND-04', 'Anden/E', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(193, '5', 'A', 'CP-MIC-AND-05', 'Anden/O', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(194, '5', 'A', 'CP-MIC-AND-06', 'Anden/O', '2.35', '1.15', '', 'Cartelera Institucional', '', 1),
(195, '6', 'AA', 'CI-LAR-MEZ-01', 'Mezzanina/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(196, '6', 'AA', 'CI-LAR-MEZ-02', 'Mezzanina/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(197, '6', 'AA', 'CI-LAR-MEZ-03', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(198, '6', 'AA', 'CI-LAR-MEZ-04', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(199, '6', 'AA', 'CI-LAR-MEZ-05', 'Mezzanina/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(200, '6', 'AA', 'CI-LAR-AND-01', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(201, '6', 'AA', 'CI-LAR-AND-02', 'Anden/E', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(202, '6', 'AA', 'CI-LAR-AND-03', 'Anden/O', '2.4', '1.2', '2.88', 'Institucional', '', 2),
(203, '6', 'AA', 'CI-LAR-AND-04', 'Anden/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(204, '6', 'AA', 'CI-LAR-AND-05', 'Anden/O', '1.75', '1.2', '2.1', 'Institucional', '', 1),
(205, '6', 'AA', 'CP-LAR-MEZ-01', 'Mezzanina/O', '1.35', '1.75', '2.362', 'Publicitarias', '', 1),
(206, '6', 'AA', 'CP-LAR-MEZ-02', 'Mezzanina/O', '1.35', '1.75', '2.362', 'Publicitarias', '', 1),
(207, '6', 'AA', 'CP-LAR-MEZ-03', 'Mezzanina/O', '1.35', '1.75', '2.362', 'Publicitarias', '', 1),
(208, '6', 'AA', 'CP-LAR-MEZ-04', 'Mezzanina/O', '1.35', '1.75', '2.362', 'Publicitarias', '', 1),
(209, '6', 'AA', 'CP-LAR-MEZ-05', 'Mezzanina/O', '1.35', '1.75', '2.362', 'Publicitarias', '', 1),
(210, '6', 'AA', 'CP-LAR-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(211, '6', 'AA', 'CP-LAR-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(212, '6', 'AA', 'CP-LAR-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(213, '6', 'AA', 'CP-LAR-AND-04', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(214, '6', 'AA', 'CP-LAR-AND-05', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(215, '6', 'AA', 'CP-LAR-AND-06', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(216, '6', 'AA', 'CP-LAR-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(217, '6', 'AA', 'EP-LE-LAR-AND-01', 'Anden/E', '1.8', '1.8', '3.24', 'escalera', '', 1),
(218, '6', 'AA', 'EP-LE-LAR-AND-02', 'Anden/E', '1.8', '1.8', '3.24', 'escalera', '', 1),
(219, '6', 'AA', 'EP-LE-LAR-AND-03', 'Anden/O', '1.8', '1.8', '3.24', 'escalera', '', 1),
(220, '6', 'AA', 'EP-LE-LAR-AND-04', 'Anden/O', '1.8', '1.8', '3.24', 'escalera', '', 1),
(221, '6', 'A', 'EP-MUR-LAR-MEZ-01', 'Mezzanina/E', '3', '1.2', '3.6', 'Murales', '', 1),
(222, '6', 'A', 'EP-MUR-LAR-MEZ-02', 'Mezzanina/E', '3', '1.2', '3.6', 'Murales', '', 1),
(223, '6', 'A', 'EP-MUR-LAR-MEZ-03', 'Mezzanina/E', '4.2', '2.4', '10.08', 'Murales', '', 1),
(224, '6', 'A', 'EP-MUR-LAR-MEZ-04', 'Mezzanina/E', '10', '2.4', '24', 'Murales', '', 1),
(225, '6', 'A', 'EP-MUR-LAR-MEZ-05', 'Mezzanina/E', '5', '2.4', '12', 'Murales', '', 1),
(226, '6', 'A', 'EP-MUR-LAR-MEZ-06', 'Mezzanina/O', '3', '1.2', '3.6', 'Murales', '', 1),
(227, '6', 'A', 'EP-MUR-LAR-MEZ-07', 'Mezzanina/O', '3', '1.2', '3.6', 'Murales', '', 1),
(228, '6', 'A', 'EP-MUR-LAR-MEZ-08', 'Mezzanina/O', '3', '1.2', '3.6', 'Murales', '', 1),
(229, '6', 'A', 'EP-MUR-LAR-MEZ-09', 'Mezzanina/O', '3', '1.2', '3.6', 'Murales', '', 1),
(230, '6', 'A', 'EP-MUR-LAR-AND-01', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(231, '6', 'A', 'EP-MUR-LAR-AND-02', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(232, '6', 'A', 'EP-MUR-LAR-AND-03', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(233, '6', 'A', 'EP-MUR-LAR-AND-04', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(234, '6', 'A', 'EP-MUR-LAR-AND-05', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(235, '6', 'A', 'EP-MUR-LAR-AND-06', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(236, '6', 'A', 'EP-MUR-LAR-AND-07', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(237, '6', 'A', 'EP-MUR-LAR-AND-08', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(238, '6', 'A', 'EP-MUR-LAR-AND-09', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(239, '6', 'A', 'EP-MUR-LAR-AND-10', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(240, '6', 'A', 'EP-MUR-LAR-AND-11', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(241, '6', 'A', 'EP-MUR-LAR-AND-12', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(242, '6', 'A', 'EP-MUR-LAR-AND-13', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(243, '6', 'A', 'EP-MUR-LAR-AND-14', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(244, '6', 'A', 'EP-MUR-LAR-AND-15', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(245, '6', 'A', 'EP-MUR-LAR-AND-16', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(246, '6', 'A', 'EP-MUR-LAR-AND-17', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(247, '6', 'A', 'EP-MUR-LAR-AND-18', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(248, '6', 'A', 'EP-MUR-LAR-AND-19', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(249, '6', 'A', 'EP-MUR-LAR-AND-20', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(250, '6', 'A', 'EP-MUR-LAR-AND-21', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(251, '6', 'AA', 'EP-COL-LAR-MEZ-01', 'Mezzanina/E', '1.1', '1.7', '1.87', '', '', 1),
(252, '6', 'AA', 'EP-COL-LAR-MEZ-02', 'Mezzanina/E', '1.1', '1.7', '1.87', '', '', 1),
(253, '6', 'A', 'EP-COL-LAR-AND-01', 'Anden/E', '1.8', '1.8', '3.24', '', '', 1),
(254, '6', 'A', 'EP-COL-LAR-AND-02', 'Anden/O', '1.8', '1.8', '3.24', '', '', 1),
(255, '6', 'A', 'EP-COL-LAR-AND-03', 'Anden/O', '1.8', '1.8', '3.24', '', '', 1),
(256, '6', 'A', 'EP-COL-LAR-AND-04', 'Anden/O', '1.1', '1.7', '1.87', '', '', 1),
(257, '6', 'AA', 'EP-ANT-LAR-MEZ-01', 'Mezzanina/N', '15.2', '1.1', '16.72', '', '', 1),
(258, '6', 'AA', 'EP-ANT-LAR-MEZ-02', 'Mezzanina/N', '10.3', '0.6', '6.18', '', '', 1),
(259, '6', 'AA', 'EP-ANT-LAR-MEZ-03', 'Mezzanina/N', '10.3', '0.5', '5.15', '', '', 1),
(260, '6', 'AA', 'EP-ANT-LAR-MEZ-04', 'Mezzanina/N', '1.8', '1', '1.8', '', '', 1),
(261, '6', 'AA', 'EP-PV-LAR-MEZ-01', 'Mezzanina/O', '126', '0.6', '75.6', '', '', 1),
(262, '6', 'AA', 'EP-FLO-LAR-MEZ-01', 'Mezzanina/O', '4', '4', '16', '', '', 1),
(263, '7', 'AA', 'CI-CED-MEZ-01', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Institucionales', '', 1),
(264, '7', 'AA', 'CI-CED-MEZ-02', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Institucionales', '', 1),
(265, '7', 'A', 'CI-CED-MEZ-03', 'Mezzanina/E', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(266, '7', 'A', 'CI-CED-MEZ-04', 'Mezzanina/E', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(267, '7', 'A', 'CI-CED-MEZ-05', 'Mezzanina/E', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(268, '7', 'A', 'CI-CED-MEZ-06', 'Mezzanina/O', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(269, '7', 'AA', 'CI-CED-AND-01', 'Anden/E', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(270, '7', 'AA', 'CI-CED-AND-02', 'Anden/E', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(271, '7', 'AA', 'CI-CED-AND-03', 'Anden/O', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(272, '7', 'AA', 'CI-CED-AND-04', 'Anden/O', '1.7', '1.15', '1.955', 'Institucionales', '', 1),
(273, '7', 'AA', 'CP-CED-MEZ-01', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(274, '7', 'AA', 'CP-CED-MEZ-02', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(275, '7', 'AA', 'CP-CED-MEZ-03', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(276, '7', 'AA', 'CP-CED-MEZ-04', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(277, '7', 'AA', 'CP-CED-MEZ-05', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(278, '7', 'AA', 'CP-CED-MEZ-06', 'Mezzanina/E', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(279, '7', 'AA', 'CP-CED-MEZ-07', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(280, '7', 'AA', 'CP-CED-MEZ-08', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(281, '7', 'AA', 'CP-CED-MEZ-09', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(282, '7', 'AA', 'CP-CED-MEZ-10', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(283, '7', 'AA', 'CP-CED-MEZ-11', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(284, '7', 'AA', 'CP-CED-MEZ-12', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(285, '7', 'AA', 'CP-CED-MEZ-13', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(286, '7', 'AA', 'CP-CED-MEZ-14', 'Mezzanina/O', '1.7', '1.7', '2.89', 'Publicitarias', '', 1),
(287, '7', 'AA', 'CP-CED-AND-01', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(288, '7', 'AA', 'CP-CED-AND-02', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(289, '7', 'AA', 'CP-CED-AND-03', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(290, '7', 'AA', 'CP-CED-AND-04', 'Anden/E', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(291, '7', 'AA', 'CP-CED-AND-05', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(292, '7', 'AA', 'CP-CED-AND-06', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(293, '7', 'AA', 'CP-CED-AND-07', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(294, '7', 'AA', 'CP-CED-AND-08', 'Anden/O', '2.4', '1.2', '2.88', 'Publicitarias', '', 1),
(295, '7', 'AA', 'EP-MUR-CED-MEZ-01', 'Mezzanina/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(296, '7', 'AA', 'EP-MUR-CED-MEZ-02', 'Mezzanina/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(297, '7', 'AA', 'EP-MUR-CED-MEZ-03', 'Mezzanina/E', '3', '1.8', '5.4', 'Murales', '', 1),
(298, '7', 'AA', 'EP-MUR-CED-MEZ-04', 'Mezzanina/E', '4', '1.2', '4.8', 'Murales', '', 1),
(299, '7', 'AA', 'EP-MUR-CED-MEZ-05', 'Mezzanina/O', '4', '1.2', '4.8', 'Murales', '', 1),
(300, '7', 'AA', 'EP-MUR-CED-MEZ-06', 'Mezzanina/O', '3', '1.8', '5.4', 'Murales', '', 1),
(301, '7', 'AA', 'EP-MUR-CED-MEZ-07', 'Mezzanina/O', '2.4', '1.8', '4.32', 'Murales', '', 1),
(302, '7', 'AA', 'EP-MUR-CED-MEZ-08', 'Mezzanina/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(303, '7', 'AA', 'EP-MUR-CED-MEZ-09', 'Mezzanina/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(304, '7', 'AA', 'EP-MUR-CED-AND-01', 'Anden/E', '1.7', '1.8', '3.06', 'Murales', '', 1),
(305, '7', 'AA', 'EP-MUR-CED-AND-02', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(306, '7', 'AA', 'EP-MUR-CED-AND-03', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(307, '7', 'AA', 'EP-MUR-CED-AND-04', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(308, '7', 'AA', 'EP-MUR-CED-AND-05', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(309, '7', 'AA', 'EP-MUR-CED-AND-06', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(310, '7', 'AA', 'EP-MUR-CED-AND-07', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(311, '7', 'AA', 'EP-MUR-CED-AND-08', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(312, '7', 'AA', 'EP-MUR-CED-AND-09', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(313, '7', 'AA', 'EP-MUR-CED-AND-10', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(314, '7', 'AA', 'EP-MUR-CED-AND-11', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(315, '7', 'AA', 'EP-MUR-CED-AND-12', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(316, '7', 'AA', 'EP-MUR-CED-AND-13', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(317, '7', 'AA', 'EP-MUR-CED-AND-14', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(318, '7', 'AA', 'EP-MUR-CED-AND-15', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(319, '7', 'AA', 'EP-MUR-CED-AND-16', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(320, '7', 'AA', 'EP-MUR-CED-AND-17', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(321, '7', 'AA', 'EP-MUR-CED-AND-18', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(322, '7', 'AA', 'EP-MUR-CED-AND-19', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(323, '7', 'AA', 'EP-MUR-CED-AND-20', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(324, '7', 'AA', 'EP-MUR-CED-AND-21', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(325, '7', 'AA', 'EP-MUR-CED-AND-22', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(326, '7', 'AA', 'EP-MUR-CED-AND-23', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(327, '7', 'AA', 'EP-MUR-CED-AND-24', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(328, '7', 'AA', 'EP-MUR-CED-AND-25', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(329, '7', 'AA', 'EP-MUR-CED-AND-26', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(330, '7', 'AA', 'EP-MUR-CED-AND-27', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(331, '7', 'AA', 'EP-MUR-CED-AND-28', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(332, '7', 'AA', 'EP-MUR-CED-AND-29', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(333, '7', 'AA', 'EP-MUR-CED-AND-30', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(334, '7', 'AA', 'EP-MUR-CED-AND-31', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(335, '7', 'AA', 'EP-MUR-CED-AND-32', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(336, '7', 'AA', 'EP-MUR-CED-AND-33', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(337, '7', 'AA', 'EP-COL-CED-MEZ-01', 'Mezzanina/E', '1.5', '3', '4.5', 'Columnas', '', 1),
(338, '7', 'AA', 'EP-COL-CED-MEZ-02', 'Mezzanina/E', '1.5', '3', '4.5', 'Columnas', '', 1),
(339, '7', 'AA', 'EP-COL-CED-MEZ-03', 'Mezzanina/E', '1.6', '2.4', '3.84', 'Columnas', '', 1),
(340, '7', 'AA', 'EP-COL-CED-MEZ-04', 'Mezzanina/E', '1.5', '3', '4.5', 'Columnas', '', 1),
(341, '7', 'AA', 'EP-COL-CED-MEZ-05', 'Mezzanina/O', '1.5', '3', '4.5', 'Columnas', '', 1),
(342, '7', 'AA', 'EP-COL-CED-MEZ-06', 'Mezzanina/O', '1.6', '2.4', '3.84', 'Columnas', '', 1),
(343, '7', 'AA', 'EP-COL-CED-MEZ-07', 'Mezzanina/O', '1.5', '3', '4.5', 'Columnas', '', 1),
(344, '7', 'AA', 'EP-COL-CED-MEZ-08', 'Mezzanina/O', '1.5', '3', '4.5', 'Columnas', '', 1),
(345, '7', 'AA', 'EP-LE-CED-AND-01', 'Anden/E', '1.8', '1.8', '3.24', 'escalera', '', 1),
(346, '7', 'AA', 'EP-LE-CED-AND-02', 'Anden/E', '1.8', '1.8', '3.24', 'escalera', '', 1),
(347, '7', 'AA', 'EP-LE-CED-AND-03', 'Anden/O', '1.8', '1.8', '3.24', 'escalera', '', 1),
(348, '7', 'AA', 'EP-LE-CED-AND-04', 'Anden/O', '1.8', '1.8', '3.24', 'escalera', '', 1),
(349, '7', 'AA', 'EP-PV-CED-MEZ-01', 'Mezzanina', '138', '0.6', '82.8', 'Vidrio', '', 1),
(350, '7', 'AA', 'EP-CH-CED-MEZ-01', 'Mezzanina/S', '1.5', '3.65', '5.475', 'Contrahuella', '', 1),
(351, '7', 'AA', 'EP-FLO-CED-MEZ-01', 'Mezzanina/S', '3', '3', '9', 'Floorgraphic', '', 1),
(352, '8', 'A', 'VE-RU-SUP-01', 'Superficie', '28', '', '', '', '', 1),
(353, '8', 'A', 'EP-MUR-RU-SUP-01', 'Superficie/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(354, '8', 'A', 'EP-MUR-RU-SUP-02', 'Superficie/S', '3.6', '1.8', '6.48', 'Murales', '', 1),
(355, '8', 'A', 'EP-MUR-RU-MEZ-01', 'Mezzanina/E', '3.6', '1.2', '4.32', 'Murales', '', 1),
(356, '8', 'A', 'EP-MUR-RU-MEZ-02', 'Mezzanina/N', '2.4', '1.8', '4.32', 'Murales', '', 1),
(357, '8', 'A', 'EP-MUR-RU-MEZ-03', 'Mezzanina/N', '2.4', '1.8', '4.32', 'Murales', '', 1),
(358, '8', 'A', 'EP-MUR-RU-MEZ-04', 'Mezzanina/N', '2.4', '1.8', '4.32', 'Murales', '', 1),
(359, '8', 'A', 'EP-MUR-RU-MEZ-05', 'Mezzanina/S', '2.4', '1.8', '4.32', 'Murales', '', 1),
(360, '8', 'A', 'EP-MUR-RU-MEZ-06', 'Mezzanina/S', '1.8', '1.8', '3.24', 'Murales', '', 1),
(361, '8', 'AA', 'EP-MUR-RU-AND-01', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(362, '8', 'AA', 'EP-MUR-RU-AND-02', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(363, '8', 'AA', 'EP-MUR-RU-AND-03', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(364, '8', 'AA', 'EP-MUR-RU-AND-04', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(365, '8', 'AA', 'EP-MUR-RU-AND-05', 'Anden/E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(366, '8', 'AA', 'EP-MUR-RU-AND-06', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(367, '8', 'AA', 'EP-MUR-RU-AND-07', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(368, '8', 'AA', 'EP-MUR-RU-AND-08', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(369, '8', 'AA', 'EP-MUR-RU-AND-09', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(370, '8', 'AA', 'EP-MUR-RU-AND-10', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(371, '8', 'A', 'EP-COL-RU-SUP-01', 'Superficie', '1.2', '2.4', '2.88', 'Columnas', '', 1),
(372, '9', 'A', 'VM-FM-SUP-01', 'Mezzanina', '3.45', '1.15', '3.967', '', '', 1),
(373, '9', 'A', 'VM-FM-SUP-02', 'Mezzanina', '3.45', '1.15', '3.967', '', '', 2),
(374, '9', 'A', 'VM-FM-INF-01', 'Mezzanina', '0.45', '1.15', '0.517', '', '', 1),
(375, '9', 'A', 'VM-FM-INF-02', 'Mezzanina', '0.45', '1.15', '0.517', '', '', 1),
(376, '9', 'AA', 'EP-MUR-FM-SUP-01', 'Superficie', '4.8', '1.8', '8.64', 'Murales', '', 1),
(377, '9', 'AA', 'EP-MUR-FM-SUP-02', 'Superficie', '4.8', '1.8', '8.64', 'Murales', '', 2),
(378, '9', 'AA', 'EP-MUR-FM-SUP-03', 'Superficie', '4.8', '1.8', '8.64', 'Murales', '', 1),
(379, '9', 'AA', 'EP-MUR-FM-MEZ-01', 'Mezzanina/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(380, '9', 'AA', 'EP-MUR-FM-MEZ-02', 'Mezzanina/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(381, '9', 'AA', 'EP-MUR-FM-MEZ-03', 'Mezzanina/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(382, '9', 'AA', 'EP-MUR-FM-MEZ-04', 'Mezzanina/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(383, '9', 'AA', 'EP-MUR-FM-MEZ-05', 'Mezzanina/O', '3.1', '1.5', '4.65', 'Murales', '', 1),
(384, '9', 'AA', 'EP-MUR-FM-MEZ-06', 'Mezzanina/O', '3.1', '1.5', '4.65', 'Murales', '', 1),
(385, '9', 'AA', 'EP-MUR-FM-MEZ-07', 'Mezzanina/N', '2.4', '1.15', '2.76', 'Murales', '', 1),
(386, '9', 'AA', 'EP-MUR-FM-MEZ-08', 'Mezzanina/E', '3.6', '1.8', '6.48', 'Murales', '', 1),
(387, '9', 'AA', 'EP-MUR-FM-MEZ-09', 'Mezzanina/S', '1.8', '1.8', '3.24', 'Murales', '', 1),
(388, '9', 'AA', 'EP-MUR-FM-MEZ-10', 'Mezzanina/S', '1.8', '1.8', '3.24', 'Murales', '', 1),
(389, '9', 'AA', 'EP-MUR-FM-MEZ-11', 'Mezzanina/S', '4.8', '1.8', '8.64', 'Murales', '', 1),
(390, '9', 'AA', 'EP-MUR-FM-MEZ-12', 'Mezzanina/E', '3.6', '1.2', '4.32', 'Murales', '', 1),
(391, '9', 'AA', 'EP-MUR-FM-MEZ-13', 'Mezzanina/O', '3.6', '1.2', '4.32', 'Murales', '', 1),
(392, '9', 'AA', 'EP-MUR-FM-AND-01', 'Anden /E', '3.6', '1.8', '6.48', 'Murales', '', 1),
(393, '9', 'AA', 'EP-MUR-FM-AND-02', 'Anden /E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(394, '9', 'AA', 'EP-MUR-FM-AND-03', 'Anden /E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(395, '9', 'AA', 'EP-MUR-FM-AND-04', 'Anden /E', '1.8', '1.8', '3.24', 'Murales', '', 1),
(396, '9', 'AA', 'EP-MUR-FM-AND-05', 'Anden /E', '2.4', '1.15', '2.76', 'Murales', '', 1),
(397, '9', 'AA', 'EP-MUR-FM-AND-06', 'Anden /E', '3.6', '1.8', '6.48', 'Murales', '', 1),
(398, '9', 'AA', 'EP-MUR-FM-AND-07', 'Anden/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(399, '9', 'AA', 'EP-MUR-FM-AND-08', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(400, '9', 'AA', 'EP-MUR-FM-AND-09', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(401, '9', 'AA', 'EP-MUR-FM-AND-10', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(402, '9', 'AA', 'EP-MUR-FM-AND-11', 'Anden/O', '1.8', '1.8', '3.24', 'Murales', '', 1),
(403, '9', 'AA', 'EP-MUR-FM-AND-12', 'Anden/O', '3.6', '1.8', '6.48', 'Murales', '', 1),
(404, '9', 'A', 'EP-COL-FM-MEZ-01', 'Mezzanina/E', '1.2', '2.4', '2.88', 'Columnas', '', 1),
(405, '9', 'A', 'EP-COL-FM-MEZ-02', 'Mezzanina/E', '1.8', '1.8', '3.24', 'Columnas', '', 1),
(406, '9', 'A', 'EP-COL-FM-MEZ-03', 'Mezzanina/O', '1.2', '2.4', '2.88', 'Columnas', '', 1),
(407, '9', 'A', 'EP-COL-FM-MEZ-04', 'Mezzanina/O', '1.2', '2.4', '2.88', 'Columnas', '', 1),
(408, '9', 'B', 'EP-ANT-FM-SUP-01', 'Superficie', '3', '1.2', '3.6', 'Antepecho', '', 1),
(409, '9', 'AA', 'EP-PV-FM-MEZ-01', 'Mezzanina/O', '1.3', '0.6', '0.78', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
`id` int(11) NOT NULL,
  `cod_contrato` char(20) NOT NULL,
  `cod_anunciante` char(15) NOT NULL,
  `presupuesto` char(30) NOT NULL,
  `dir_rif` varchar(200) NOT NULL,
  `reg_mercantil` varchar(200) NOT NULL,
  `nacionalidad` text NOT NULL,
  `tip_ci` tinyint(4) NOT NULL,
  `cedula` int(11) NOT NULL,
  `sexo` tinytext NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `cargo` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `solvente` tinyint(4) NOT NULL DEFAULT '0',
  `tip_reg` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `cod_contrato`, `cod_anunciante`, `presupuesto`, `dir_rif`, `reg_mercantil`, `nacionalidad`, `tip_ci`, `cedula`, `sexo`, `nombres`, `apellidos`, `cargo`, `fecha`, `estado`, `solvente`, `tip_reg`) VALUES
(1, 'CJ-AEPC-18-001', 'A-00001', 'GMC-MV-PPTO-00001-2018', 'avenida Montes de Oca Nivel PB Local 000 Centro de Valencia Carabobo Zona Postal 0000, Municipio Valencia, del Estado Carabobo', 'inscrita ante la oficina del Registro Mercantil Segundo del estado Carabobo, en fecha 00 de enero del año 0000, bajo el N° 0, Tomo 000-A 000', 'canadiense', 1, 44444444, 'M', 'Nombre Nombres', 'Apellido Apellidos', 3, '2018-12-04', 1, 0, 1),
(2, '000000001', 'A-00001', 'GMC-MV-PPTO-00003-2019', 'avenida Montes de Oca Nivel PB Local 000 Centro de Valencia Carabobo Zona Postal 0000, Municipio Valencia, del Estado Carabobo ', 'inscrita ante la oficina del Registro Mercantil Segundo del estado Carabobo, en fecha 00 de enero del año 0000, bajo el N° 0, Tomo 000-A 000 ', 'venezolana', 1, 0, 'M', 'Nombres', 'Apellidos', 3, '2019-02-04', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios_pub`
--

CREATE TABLE IF NOT EXISTS `espacios_pub` (
`id` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `ncd` text NOT NULL,
  `nom` text NOT NULL,
  `dir` varchar(30) NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `espacios_pub`
--

INSERT INTO `espacios_pub` (`id`, `cod`, `ncd`, `nom`, `dir`, `est`) VALUES
(1, 1, 'MON', 'Est. Monumental', 'Direccion', 1),
(2, 2, 'FER', 'Est. Las Ferias', 'Direccion', 1),
(3, 3, 'PAL', 'Est. Palotal', 'Direccion', 1),
(4, 4, 'STR', 'Est. Santa Rosa', 'Direccion', 1),
(5, 5, 'MIC', 'Est. Michelena', 'Direccion', 1),
(6, 6, 'LAR', 'Est. Lara', 'Direccion', 1),
(7, 7, 'CED', 'Est. Cedeño', 'Direccion', 1),
(8, 8, 'RU', 'Est. Rafael Urdaneta', 'Direccion', 1),
(9, 9, 'FM', 'Est. Francisco de Miranda', 'Direccion', 1),
(10, 10, 'MR', 'Material Rodante', 'Direccion', 1),
(11, 11, 'AC', 'Area Comercial', 'Direccion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE IF NOT EXISTS `materiales` (
`id` int(11) NOT NULL,
  `cod` varchar(1) NOT NULL,
  `nom` text NOT NULL,
  `des` varchar(50) NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `cod`, `nom`, `des`, `est`) VALUES
(1, '1', 'Vinil', 'vinil descr', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `nombre` text NOT NULL,
  `url` text NOT NULL,
  `nivel` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `tipo`, `titulo`, `nombre`, `url`, `nivel`, `estado`) VALUES
(1, 2, 'inicio', 'inicio', 'inicio.php', 1, 1),
(2, 1, 'anunciantes', 'gestionar anunciantes', 'gestionar_anunciantes.php', 1, 1),
(3, 1, 'anunciantes', 'listar anunciantes', 'listar_anunciantes.php', 1, 1),
(4, 1, 'presupuestos', 'crear presupuesto', 'gestionar_presupuestos.php', 1, 1),
(5, 1, 'presupuestos', 'listar presupuestos', 'listar_presupuestos.php', 1, 1),
(6, 1, 'contratos', 'gestionar contratos', 'gestionar_contrato.php', 1, 1),
(7, 1, 'contratos', 'listar contratos', 'listar_contratos.php', 1, 1),
(8, 1, 'pagos', 'gestionar pagos', 'gestionar_pagos.php', 1, 1),
(9, 1, 'pagos', 'listar pagos', 'listar_pagos.php', 1, 1),
(10, 3, 'administrador', 'administrador de usuarios', 'gestion_usr.php', 2, 2),
(11, 3, 'administrador', 'configuraciones', 'config_sistem.php', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mv_detalles`
--

CREATE TABLE IF NOT EXISTS `mv_detalles` (
`id` int(11) NOT NULL,
  `nombres_p` text NOT NULL,
  `apellidos_p` text NOT NULL,
  `sexo` tinytext NOT NULL,
  `nacionalidad_p` text NOT NULL,
  `cedula_p` varchar(11) NOT NULL,
  `grado_ac_ab` tinytext NOT NULL,
  `cargo` text NOT NULL,
  `numero_resolucion` varchar(10) NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `numero_gaceta` varchar(10) NOT NULL,
  `fecha_gaceta` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mv_detalles`
--

INSERT INTO `mv_detalles` (`id`, `nombres_p`, `apellidos_p`, `sexo`, `nacionalidad_p`, `cedula_p`, `grado_ac_ab`, `cargo`, `numero_resolucion`, `fecha_resolucion`, `numero_gaceta`, `fecha_gaceta`) VALUES
(1, 'Yolyemil', 'Rodríguez Marín', 'F', 'venezolana', 'V-11745858', '', 'Presidente', '021', '2018-03-07', '41356', '2018-03-08'),
(2, 'Hilvic', 'Matute', 'F', 'Venezolana', '', 'ABG.', 'Consultor Juridico', '', '2018-06-01', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidades`
--

CREATE TABLE IF NOT EXISTS `nacionalidades` (
  `id` int(11) NOT NULL,
  `pais` text NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nacionalidades`
--

INSERT INTO `nacionalidades` (`id`, `pais`, `nombre`) VALUES
(1, 'México', 'mexicana'),
(2, 'España', 'española'),
(3, 'Alemania', 'alemana'),
(4, 'Brasil', 'brasileña'),
(5, 'Francia', 'francesa'),
(6, 'Bélgica', 'belga'),
(7, 'Argentina', 'argentina'),
(8, 'Canadá', 'canadiense'),
(9, 'Marruecos', 'marroquí'),
(10, 'Cuba', 'cubana'),
(11, 'India', 'india'),
(12, 'Estados', 'estadounidense'),
(13, 'Polonia', 'polaca'),
(14, 'Italia', 'italiana'),
(15, 'Grecia', 'griega'),
(16, 'Portugal', 'portuguesa'),
(17, 'Rusia', 'rusa'),
(18, 'Inglaterra', 'inglesa'),
(19, 'Suecia', 'sueca'),
(20, 'Dinamarca', 'danesa'),
(21, 'China', 'china'),
(22, 'Japón', 'japonesa'),
(23, 'Colombia', 'colombiana'),
(24, 'Perú', 'peruana'),
(25, 'Venezuela', 'venezolana'),
(26, 'Bolivia', 'boliviana'),
(27, 'Ecuador', 'ecuatoriana'),
(28, 'Chile', 'chilena'),
(29, 'Uruguay', 'uruguaya'),
(30, 'Paraguay', 'paraguaya'),
(31, 'Turquía', 'turca'),
(32, 'República', 'checo'),
(33, 'Egipto', 'egipcia'),
(34, 'Panamá', 'panameña'),
(35, 'Israel', 'israelí'),
(36, 'Australia', 'australiana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`id` int(11) NOT NULL,
  `id_pag` int(11) NOT NULL,
  `contrato` varchar(20) NOT NULL,
  `for_pag` tinyint(1) NOT NULL,
  `fec_pag` date NOT NULL,
  `ref_pag` int(12) NOT NULL,
  `mon_pag` double NOT NULL,
  `est_pag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_pag`, `contrato`, `for_pag`, `fec_pag`, `ref_pag`, `mon_pag`, `est_pag`) VALUES
(1, 1, 'CJ-AEPC-18-001', 1, '2019-02-04', 1, 100, 1),
(2, 2, 'CJ-AEPC-18-001', 1, '2019-02-04', 2, 202800, 1),
(3, 3, 'CJ-AEPC-18-001', 1, '2019-02-04', 3, 16000, 1),
(4, 4, 'CJ-AEPC-18-001', 3, '2019-02-04', 149616, 100, 1),
(5, 5, '000000001', 1, '2019-02-04', 22323, 792000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppto_cuotas`
--

CREATE TABLE IF NOT EXISTS `ppto_cuotas` (
`id` int(11) NOT NULL,
  `cod` varchar(50) NOT NULL,
  `item` int(11) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `mcuota` double NOT NULL,
  `mrest` double NOT NULL,
  `mesdpago` date NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ppto_cuotas`
--

INSERT INTO `ppto_cuotas` (`id`, `cod`, `item`, `concepto`, `mcuota`, `mrest`, `mesdpago`, `estatus`) VALUES
(1, 'GMC-MV-PPTO-00001-2018', 1, 'Cuota 1 de 4', 54750, 164250, '2018-12-04', 1),
(2, 'GMC-MV-PPTO-00001-2018', 2, 'Cuota 2 de 4', 54750, 109500, '2019-01-04', 1),
(3, 'GMC-MV-PPTO-00001-2018', 3, 'Cuota 3 de 4', 54750, 54750, '2019-02-04', 1),
(4, 'GMC-MV-PPTO-00001-2018', 4, 'Cuota 4 de 4', 54750, 0, '2019-03-04', 1),
(5, 'GMC-MV-PPTO-00002-2018', 1, 'Cuota 1 de 3', 3000, 6000, '2018-12-04', 0),
(6, 'GMC-MV-PPTO-00002-2018', 2, 'Cuota 2 de 3', 3000, 3000, '2019-01-04', 0),
(7, 'GMC-MV-PPTO-00002-2018', 3, 'Cuota 3 de 3', 3000, 0, '2019-02-04', 0),
(8, 'GMC-MV-PPTO-00003-2019', 1, 'Cuota 1 de 4', 198000, 594000, '2019-02-04', 1),
(9, 'GMC-MV-PPTO-00003-2019', 2, 'Cuota 2 de 4', 198000, 396000, '2019-03-04', 1),
(10, 'GMC-MV-PPTO-00003-2019', 3, 'Cuota 3 de 4', 198000, 198000, '2019-04-04', 1),
(11, 'GMC-MV-PPTO-00003-2019', 4, 'Cuota 4 de 4', 198000, 0, '2019-05-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppto_detalles`
--

CREATE TABLE IF NOT EXISTS `ppto_detalles` (
`id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `item` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `cod_bien` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `material` text NOT NULL,
  `montoxmes` double NOT NULL,
  `meses` int(11) NOT NULL,
  `total` double NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ppto_detalles`
--

INSERT INTO `ppto_detalles` (`id`, `codigo`, `item`, `ubicacion`, `cod_bien`, `cantidad`, `descripcion`, `material`, `montoxmes`, `meses`, `total`, `estatus`) VALUES
(1, 'GMC-MV-PPTO-00001-2018', 1, 'Est. Monumental', 'CI-MON-AND-01', 1, 'Cartelera Institucional', 'Vinil', 15000, 6, 90000, 1),
(2, 'GMC-MV-PPTO-00001-2018', 2, 'Est. Santa Rosa', 'CI-STR-MEZ-03', 1, 'Valla Mapa', 'Vinil', 1300, 6, 7800, 1),
(3, 'GMC-MV-PPTO-00001-2018', 3, 'Est. Francisco de Miranda', 'EP-MUR-FM-SUP-02', 1, '', 'Vinil', 1300, 6, 7800, 1),
(4, 'GMC-MV-PPTO-00001-2018', 4, 'Est. Lara', 'CI-LAR-AND-03', 1, '', 'Vinil', 1600, 6, 9600, 1),
(5, 'GMC-MV-PPTO-00001-2018', 5, 'Est. Santa Rosa', 'CI-STR-AND-07', 1, 'Valla Institucional', 'Vinil', 1300, 6, 7800, 0),
(6, 'GMC-MV-PPTO-00001-2018', 6, 'Est. Michelena', 'CP-MIC-AND-01', 1, '', 'Vinil', 16000, 6, 96000, 1),
(7, 'GMC-MV-PPTO-00001-2018', 5, 'Est. Santa Rosa', 'CI-STR-AND-07', 1, 'Valla Institucional', 'borrar', 1300, 6, 7800, 1),
(8, 'GMC-MV-PPTO-00001-2018', 5, 'Est. Santa Rosa', 'CI-STR-AND-07', 1, 'Valla Institucional', 'borrar', 1300, 6, 7800, 1),
(9, 'GMC-MV-PPTO-00001-2018', 5, 'Est. Santa Rosa', 'CI-STR-AND-07', 1, 'Valla Institucional', 'borrar', 1300, 6, 7800, 1),
(10, 'GMC-MV-PPTO-00002-2018', 1, 'Est. Monumental', 'CI-MON-AND-02', 1, 'Cartelera Institucional', 'Vinil', 1500, 6, 9000, 0),
(11, 'GMC-MV-PPTO-00003-2019', 1, 'Est. Las Ferias', 'CI-FER-MEZ-01', 1, 'Cartelera Institucional', 'Vinil', 12000, 6, 72000, 1),
(12, 'GMC-MV-PPTO-00003-2019', 2, 'Est. Francisco de Miranda', 'VM-FM-SUP-02', 1, '', 'Vinil', 120000, 6, 720000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppto_informacion`
--

CREATE TABLE IF NOT EXISTS `ppto_informacion` (
`id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ad` date NOT NULL,
  `duracion` varchar(15) NOT NULL,
  `cod_int` varchar(20) NOT NULL,
  `sub_total` float NOT NULL,
  `p_desc` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `total` float NOT NULL,
  `inic_mont` float NOT NULL,
  `import_let` text NOT NULL,
  `fecha_in` date NOT NULL,
  `forma_pago` text NOT NULL,
  `n_cuotas` int(11) NOT NULL,
  `mont_cuotas` float NOT NULL,
  `import_cuo` text NOT NULL,
  `elab_by` int(11) NOT NULL,
  `revi_by` int(11) NOT NULL,
  `apro_by` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ppto_informacion`
--

INSERT INTO `ppto_informacion` (`id`, `codigo`, `fecha_ad`, `duracion`, `cod_int`, `sub_total`, `p_desc`, `descuento`, `total`, `inic_mont`, `import_let`, `fecha_in`, `forma_pago`, `n_cuotas`, `mont_cuotas`, `import_cuo`, `elab_by`, `revi_by`, `apro_by`, `estatus`) VALUES
(1, 'GMC-MV-PPTO-00001-2018', '2018-12-04', '6', 'A-00001', 219000, 0, 0, 219000, 0, 'Doscientos Diecinueve Mil Con Cero Bolívares', '2018-12-04', '1', 4, 54750, 'Cincuenta Y Cuatro Mil Setecientos Cincuenta Con Cero Bolívares', 13533084, 12910897, 21222850, 2),
(2, 'GMC-MV-PPTO-00002-2018', '2018-12-11', '6', 'A-00001', 9000, 0, 0, 9000, 0, 'Nueve Mil Con Cero Bolívares', '2018-12-04', '1', 3, 3000, 'Tres Mil Con Cero Bolívares', 5331325, 13533084, 14277541, 0),
(3, 'GMC-MV-PPTO-00003-2019', '2019-02-04', '6', 'A-00001', 792000, 0, 0, 792000, 0, 'Setecientos Noventa Y Dos Mil Con Cero Bolívares', '2019-02-04', '1', 4, 198000, 'Ciento Noventa Y Ocho Mil Con Cero Bolívares', 5331325, 12910897, 15818156, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_cargo`
--

CREATE TABLE IF NOT EXISTS `select_cargo` (
`id` int(11) NOT NULL,
  `cod` varchar(2) NOT NULL,
  `nombre` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_cargo`
--

INSERT INTO `select_cargo` (`id`, `cod`, `nombre`, `status`) VALUES
(3, '3', 'Presidente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_cuotas`
--

CREATE TABLE IF NOT EXISTS `select_cuotas` (
`id` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_cuotas`
--

INSERT INTO `select_cuotas` (`id`, `cod`, `nombre`, `status`) VALUES
(1, 1, '1', 1),
(2, 2, '2', 1),
(3, 3, '3', 1),
(4, 4, '4', 1),
(5, 5, '5', 1),
(6, 6, '6', 1),
(7, 7, '7', 1),
(8, 8, '8', 1),
(9, 9, '9', 1),
(10, 10, '10', 1),
(11, 11, '11', 1),
(12, 12, '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_for_pag`
--

CREATE TABLE IF NOT EXISTS `select_for_pag` (
`id` int(11) NOT NULL,
  `tipo` tinytext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_for_pag`
--

INSERT INTO `select_for_pag` (`id`, `tipo`) VALUES
(1, 'Depósito'),
(2, 'Transferencia'),
(3, 'Cheque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_lapso`
--

CREATE TABLE IF NOT EXISTS `select_lapso` (
`id` int(11) NOT NULL,
  `cod` varchar(2) NOT NULL,
  `nombre` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_lapso`
--

INSERT INTO `select_lapso` (`id`, `cod`, `nombre`, `status`) VALUES
(1, '6', '6 Meses', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_pago`
--

CREATE TABLE IF NOT EXISTS `select_pago` (
`id` int(11) NOT NULL,
  `cod` varchar(2) NOT NULL,
  `nombre` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_pago`
--

INSERT INTO `select_pago` (`id`, `cod`, `nombre`, `status`) VALUES
(1, '1', 'Mensual', 1),
(2, '2', 'Bimensual', 1),
(3, '3', 'Trimestral', 1),
(4, '6', 'Semestral', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_rif`
--

CREATE TABLE IF NOT EXISTS `select_rif` (
`id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `tipo` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_rif`
--

INSERT INTO `select_rif` (`id`, `nom`, `tipo`) VALUES
(1, 'Venezolano(a)', 'V-'),
(2, 'Extranjero(a)', 'E-'),
(3, 'Pasaporte', 'P-'),
(4, 'Ente Gubernamental', 'G-'),
(5, 'Contribuyente Jurídico', 'J-'),
(6, 'Consejo Comunal', 'C-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_sexo`
--

CREATE TABLE IF NOT EXISTS `select_sexo` (
`id` int(11) NOT NULL,
  `cod` tinytext NOT NULL,
  `nombre` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_sexo`
--

INSERT INTO `select_sexo` (`id`, `cod`, `nombre`) VALUES
(1, 'F', 'Femenino'),
(2, 'M', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select_tip_anu`
--

CREATE TABLE IF NOT EXISTS `select_tip_anu` (
`id` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select_tip_anu`
--

INSERT INTO `select_tip_anu` (`id`, `cod`, `nom`) VALUES
(1, 1, 'Empresa'),
(2, 2, 'Anunciante'),
(3, 3, 'Intercambio comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nvl_acc` int(1) NOT NULL,
  `ced_usr` int(10) NOT NULL,
  `nom_usr` text NOT NULL,
  `ape_usr` text NOT NULL,
  `ger_usr` text NOT NULL,
  `fec_reg` datetime NOT NULL,
  `fec_ven` date NOT NULL,
  `est_usr` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `password`, `nvl_acc`, `ced_usr`, `nom_usr`, `ape_usr`, `ger_usr`, `fec_reg`, `fec_ven`, `est_usr`) VALUES
(1, 'root', 'c80a7d96d092467323f39a2e86ad6ef9', 1, 0, 'Desarrollador', '', '13', '2018-09-26 15:41:53', '0000-00-00', 1),
(2, 'lasv', '3b712de48137572f3849aabd5666a4e3', 2, 24290349, 'Luis', 'Sarabia', '13', '3000-12-13 08:26:39', '0000-00-00', 1),
(3, 'comercializacion', 'e10adc3949ba59abbe56e057f20f883e', 2, 14277541, 'Angela', 'Echenagucia', '14', '2018-11-06 10:49:15', '2050-12-01', 1),
(4, 'lsarabia', '3b712de48137572f3849aabd5666a4e3', 2, 24290349, 'Luis', 'Sarabia', '14', '2018-12-03 11:07:18', '2018-12-30', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anunciantes`
--
ALTER TABLE `anunciantes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cod` (`cod`);

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cod_contrato` (`cod_contrato`,`presupuesto`);

--
-- Indices de la tabla `espacios_pub`
--
ALTER TABLE `espacios_pub`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mv_detalles`
--
ALTER TABLE `mv_detalles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_pag` (`id_pag`);

--
-- Indices de la tabla `ppto_cuotas`
--
ALTER TABLE `ppto_cuotas`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `ppto_detalles`
--
ALTER TABLE `ppto_detalles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ppto_informacion`
--
ALTER TABLE `ppto_informacion`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `select_cargo`
--
ALTER TABLE `select_cargo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_cuotas`
--
ALTER TABLE `select_cuotas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_for_pag`
--
ALTER TABLE `select_for_pag`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_lapso`
--
ALTER TABLE `select_lapso`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_pago`
--
ALTER TABLE `select_pago`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_rif`
--
ALTER TABLE `select_rif`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_sexo`
--
ALTER TABLE `select_sexo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `select_tip_anu`
--
ALTER TABLE `select_tip_anu`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anunciantes`
--
ALTER TABLE `anunciantes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `bienes`
--
ALTER TABLE `bienes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=410;
--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `espacios_pub`
--
ALTER TABLE `espacios_pub`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `mv_detalles`
--
ALTER TABLE `mv_detalles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ppto_cuotas`
--
ALTER TABLE `ppto_cuotas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `ppto_detalles`
--
ALTER TABLE `ppto_detalles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ppto_informacion`
--
ALTER TABLE `ppto_informacion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `select_cargo`
--
ALTER TABLE `select_cargo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `select_cuotas`
--
ALTER TABLE `select_cuotas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `select_for_pag`
--
ALTER TABLE `select_for_pag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `select_lapso`
--
ALTER TABLE `select_lapso`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `select_pago`
--
ALTER TABLE `select_pago`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `select_rif`
--
ALTER TABLE `select_rif`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `select_sexo`
--
ALTER TABLE `select_sexo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `select_tip_anu`
--
ALTER TABLE `select_tip_anu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

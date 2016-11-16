-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2016 at 01:01 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renovatio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

CREATE TABLE `admin_group` (
  `group_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`group_id`, `title`, `image`, `status`, `creation_date`, `last_modification`) VALUES
(1, 'prueba', '../../../skin/images/groups/usergen.png', 'I', '2016-04-20 03:23:03', '2016-04-20 06:23:03'),
(2, 'test ale', '../../../skin/images/groups/usergen.png', 'I', '2016-04-20 19:19:17', '2016-04-20 22:19:17'),
(3, 'pepepepe', '../../../skin/images/body/pictures/usergen.png', 'I', '2016-04-20 19:28:40', '2016-04-20 22:28:40'),
(4, 'osa', '../../../skin/images/groups/group1238397047.jpeg', 'A', '2016-04-20 19:51:46', '2016-04-20 22:51:46'),
(5, 'pepsi', '../../../skin/images/body/pictures/usergen.png', 'A', '2016-04-20 20:35:39', '2016-04-20 23:35:39'),
(6, 'prueba ale', '../../../skin/images/body/pictures/usergen.png', 'A', '2016-04-25 03:09:11', '2016-04-25 06:09:11'),
(7, 'prueba3', '../../../skin/images/body/pictures/usergen.png', 'A', '2016-04-25 03:09:19', '2016-04-25 06:09:19'),
(8, 'prueba4', '../../../skin/images/body/pictures/usergen.png', 'A', '2016-04-25 03:09:27', '2016-04-25 06:09:27'),
(9, 'prueba5', '../../../skin/images/body/pictures/usergen.png', 'A', '2016-04-25 03:09:35', '2016-04-25 06:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `profile_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` char(1) DEFAULT 'A',
  `creation_date` datetime NOT NULL,
  `last_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`profile_id`, `company_id`, `title`, `image`, `status`, `creation_date`, `last_modification`) VALUES
(333, 1, 'superadministrador', '../../../skin/images/body/pictures/usergen.png', 'A', '2013-03-03 03:03:03', '2016-08-01 21:06:20'),
(350, 1, 'prueba', '../../../skin/images/profiles/profile1141210916.png', 'I', '2016-04-06 20:03:28', '2016-08-01 21:06:20'),
(351, 1, 'pepe', '../../../skin/images/profiles/profile112263729.jpeg', 'I', '2016-04-06 20:05:21', '2016-08-01 21:06:20'),
(352, 1, 'joni', '../../../skin/images/profiles/profile182896487.png', 'I', '2016-04-08 00:10:19', '2016-08-01 21:06:20'),
(353, 1, 'test', '../../../skin/images/body/pictures/usergen.png', 'A', '2016-04-11 02:56:59', '2016-08-01 21:06:20'),
(354, 1, 'asbndbnads sad ', '../../../skin/images/profiles/profile5053505598.jpeg', 'I', '2016-04-11 04:29:43', '2016-08-01 21:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `tries` int(11) NOT NULL,
  `last_access` datetime NOT NULL,
  `creation_date` datetime NOT NULL,
  `creator_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `company_id`, `user`, `password`, `first_name`, `last_name`, `email`, `profile_id`, `img`, `status`, `tries`, `last_access`, `creation_date`, `creator_id`) VALUES
(3, 1, 'javzero', 'a01610228fe998f515a72dd730294d87', 'Leandro', 'Andrade', '', 333, '../../../skin/images/users/3/user69110__3.jpeg', 'A', 0, '2016-06-04 03:19:08', '0000-00-00 00:00:00', 0),
(8, 1, 'cheketo', '72373a57bdf3807c0a1ac9c30bbf3045', 'Alejandro', 'Romero', 'romero.m.alejandro@gmail.com', 333, '../../../skin/images/users/8/ale.jpg', 'A', 0, '2016-08-01 19:59:21', '0000-00-00 00:00:00', 0),
(28, 1, 'viole', '9d7311ba459f9e45ed746755a32dcd11', 'Violeta', 'Raffin', '', 333, '../../../skin/images/users/28/vio.jpg', 'A', 0, '2016-03-07 06:01:47', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `title`, `image`, `status`, `last_update`, `creation_date`) VALUES
(1, 0, 'Prueba', '', 'A', '2016-03-17 04:58:21', '2016-03-17 00:00:00'),
(2, 1, 'Prueba 2', '', 'A', '2016-03-17 05:54:33', '2016-03-16 00:00:00'),
(3, 1, 'Prueba3', '', 'A', '2016-03-17 06:56:22', '2016-03-17 03:56:22'),
(4, 2, 'PruebaTest22', '', 'A', '2016-03-17 07:14:12', '2016-03-17 04:14:12'),
(5, 1, 'PruebaTest', '', 'A', '2016-03-17 07:18:09', '2016-03-17 04:18:09'),
(6, 0, '', '', 'I', '2016-03-23 06:07:38', '2016-03-23 03:07:38'),
(7, 0, '', '', 'I', '2016-03-23 06:09:52', '2016-03-23 03:09:52'),
(8, 0, '', '', 'I', '2016-03-23 06:12:00', '2016-03-23 03:12:00'),
(9, 0, '', '', 'I', '2016-03-23 06:12:25', '2016-03-23 03:12:25'),
(10, 0, '', '', 'I', '2016-03-23 06:12:28', '2016-03-23 03:12:28'),
(11, 0, '', '', 'I', '2016-03-23 06:27:28', '2016-03-23 03:27:28'),
(12, 0, '', '', 'I', '2016-03-26 01:16:27', '2016-03-25 22:16:27'),
(13, 0, '', '', 'I', '2016-04-11 06:07:15', '2016-04-11 03:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `company_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'P',
  `creation_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`company_id`, `parent_id`, `name`, `logo`, `link`, `phone`, `status`, `creation_date`, `last_update`, `creator_id`) VALUES
(1, 0, 'Innova Studios', '', 'www.innovastudio.com.ar', '', 'P', '2016-08-01 18:00:00', '2016-08-01 21:09:32', 8);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `log_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `tries` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`log_id`, `user`, `password`, `ip`, `tries`, `event`, `date`) VALUES
(1, 'cheketo', '', '::1', 0, 'OK', '2016-02-24 05:06:36'),
(2, 'javzero', '', '::1', 0, 'OK', '2016-02-24 05:51:38'),
(3, 'viole', '', '::1', 0, 'OK', '2016-02-24 05:58:53'),
(4, 'pepe', '', '::1', 0, 'OK', '2016-02-24 06:41:09'),
(5, 'cheketo', '', '::1', 0, 'OK', '2016-02-24 06:49:29'),
(6, 'user', '', '::1', 0, 'OK', '2016-02-24 06:55:08'),
(7, 'pepe', '', '::1', 0, 'OK', '2016-02-24 06:56:54'),
(8, '', '', '::1', 0, 'Usuario invalido', '2016-02-24 18:01:44'),
(9, 'cheketo', '', '::1', 0, 'OK', '2016-02-24 18:02:00'),
(10, 'javzero', '', '::1', 0, 'OK', '2016-02-25 07:33:21'),
(11, 'viole', '', '::1', 0, 'OK', '2016-02-25 07:55:19'),
(12, 'cheketo', '', '::1', 0, 'OK', '2016-02-25 22:42:39'),
(13, 'cheketo', '', '::1', 0, 'OK', '2016-02-26 04:27:46'),
(14, 'Cheketo', '', '::1', 0, 'OK', '2016-02-26 07:18:58'),
(15, 'cheketo', '', '::1', 0, 'OK', '2016-02-26 08:48:55'),
(16, 'cheketo', '', '::1', 0, 'OK', '2016-02-26 20:00:40'),
(17, 'Cheketo', '', '::1', 0, 'OK', '2016-02-27 00:09:13'),
(18, 'Cheketo', '', '::1', 0, 'OK', '2016-02-27 00:11:22'),
(19, 'Cheketo', '', '::1', 0, 'OK', '2016-02-28 06:10:18'),
(20, 'cheketo', '', '::1', 0, 'OK', '2016-02-28 18:04:02'),
(21, 'Cheketo', '', '::1', 0, 'OK', '2016-02-29 03:03:39'),
(22, 'Cheketo', '', '::1', 0, 'OK', '2016-02-29 03:50:29'),
(23, 'viole', '', '::1', 0, 'OK', '2016-02-29 04:08:37'),
(24, 'Cheketo', '', '::1', 0, 'OK', '2016-02-29 05:15:54'),
(25, 'Cheketo', '', '::1', 0, 'OK', '2016-02-29 05:19:21'),
(26, 'Cheketo', '', '::1', 0, 'OK', '2016-02-29 06:02:42'),
(27, 'user', '', '::1', 0, 'OK', '2016-02-29 06:29:41'),
(28, 'cheketo', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-02-29 21:29:45'),
(29, 'cheketo', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-02-29 21:31:26'),
(30, 'viole', '1988', '::1', 0, 'Usuario invalido', '2016-02-29 21:32:21'),
(31, 'viole', '', '::1', 0, 'OK', '2016-02-29 21:34:00'),
(32, 'test', 'asdasdasd', '::1', 0, 'Usuario invalido', '2016-02-29 21:34:16'),
(33, 'test', 'asdfsad', '::1', 0, 'Usuario invalido', '2016-02-29 21:34:42'),
(34, 'viole', '', '::1', 0, 'OK', '2016-02-29 21:35:29'),
(35, 'cheketo', '', '::1', 0, 'OK', '2016-03-02 02:05:18'),
(36, 'prueba', 'ale', '::1', 0, 'Usuario invalido', '2016-03-02 05:51:44'),
(37, 'cheketo', '', '::1', 0, 'OK', '2016-03-02 06:20:22'),
(38, 'Cheketo', '', '::1', 0, 'OK', '2016-03-03 01:56:40'),
(39, 'cheketo', '', '::1', 0, 'OK', '2016-03-03 09:48:06'),
(40, 'Cheketo', '', '::1', 0, 'OK', '2016-03-04 15:34:19'),
(41, 'cheketo', '', '::1', 0, 'OK', '2016-03-04 15:41:21'),
(42, 'Cheketo', '', '::1', 0, 'OK', '2016-03-06 06:00:40'),
(43, 'Cheketo', '', '::1', 0, 'OK', '2016-03-06 19:38:04'),
(44, 'Cheketo', '', '::1', 0, 'OK', '2016-03-06 19:39:44'),
(45, 'viole', '', '::1', 0, 'OK', '2016-03-07 09:01:47'),
(46, 'Cheketo', '', '::1', 0, 'OK', '2016-03-08 00:54:45'),
(47, 'Cheketo', '', '::1', 0, 'OK', '2016-03-08 20:44:32'),
(48, 'cheketo', '', '::1', 0, 'OK', '2016-03-08 23:06:05'),
(49, 'Cheketo', '', '::1', 0, 'OK', '2016-03-09 09:32:12'),
(50, 'Cheketo', '', '::1', 0, 'OK', '2016-03-09 19:13:54'),
(51, 'Cheketo', '', '::1', 0, 'OK', '2016-03-10 00:54:21'),
(52, 'Cheketo', '', '::1', 0, 'OK', '2016-03-10 16:34:40'),
(53, 'Cheketo', '', '::1', 0, 'OK', '2016-03-10 16:46:28'),
(54, 'Cheketo', '', '::1', 0, 'OK', '2016-03-10 17:08:50'),
(55, 'Cheketo', '', '::1', 0, 'OK', '2016-03-10 20:29:51'),
(56, 'Cheketo', '', '::1', 0, 'OK', '2016-03-10 20:45:10'),
(57, 'cheketo', '', '::1', 0, 'OK', '2016-03-13 04:10:10'),
(58, 'Cheketo', '', '::1', 0, 'OK', '2016-03-14 02:22:21'),
(59, 'Cheketo', 'Oraprod2015', '::1', 1, 'Clave Incorrecta', '2016-03-15 02:40:56'),
(60, 'Cheketo', '', '::1', 0, 'OK', '2016-03-15 02:41:03'),
(61, 'Cheketo', 'Oraprod2015', '::1', 1, 'Clave Incorrecta', '2016-03-16 03:46:10'),
(62, 'Cheketo', '', '::1', 0, 'OK', '2016-03-16 03:46:19'),
(63, 'Cheketo', '', '::1', 0, 'OK', '2016-03-16 22:34:44'),
(64, '', '', '::1', 0, 'Usuario invalido', '2016-03-17 02:30:04'),
(65, 'Cheketo', 'Oraprod2015', '::1', 1, 'Clave Incorrecta', '2016-03-17 02:30:15'),
(66, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 02:30:23'),
(67, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 04:26:01'),
(68, 'Cheketo', 'Oraprod21041', '::1', 1, 'Clave Incorrecta', '2016-03-17 06:33:55'),
(69, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 06:34:02'),
(70, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 09:19:38'),
(71, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 09:28:24'),
(72, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 09:31:18'),
(73, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 11:14:09'),
(74, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 22:10:47'),
(75, 'asdasda', '', '::1', 0, 'Usuario invalido', '2016-03-17 22:10:56'),
(76, 'asdasda', '', '::1', 0, 'Usuario invalido', '2016-03-17 22:11:00'),
(77, 'asdasda', '', '::1', 0, 'Usuario invalido', '2016-03-17 22:11:02'),
(78, 'asdasda', '', '::1', 0, 'Usuario invalido', '2016-03-17 22:11:04'),
(79, 'asdasda', '', '::1', 0, 'Usuario invalido', '2016-03-17 22:11:06'),
(80, 'Cheketo', '', '::1', 0, 'OK', '2016-03-17 22:11:14'),
(81, 'Cheketo', '', '::1', 0, 'OK', '2016-03-21 00:59:58'),
(82, 'Cheketo', '', '::1', 0, 'OK', '2016-03-21 02:37:33'),
(83, 'Cheketo', 'Dixit007', '::1', 1, 'Clave Incorrecta', '2016-03-22 20:59:23'),
(84, 'Cheketo', '', '::1', 0, 'OK', '2016-03-22 20:59:30'),
(85, 'Cheketo', '', '::1', 0, 'OK', '2016-03-22 21:51:26'),
(86, 'Cheketo', '', '::1', 0, 'OK', '2016-03-26 01:15:41'),
(87, 'cheketo', '', '::1', 0, 'OK', '2016-04-06 00:59:31'),
(88, 'Cheketo', '', '::1', 0, 'OK', '2016-04-06 18:32:43'),
(89, 'Cheketo', '', '::1', 0, 'OK', '2016-04-07 02:16:32'),
(90, 'Cheketo', '', '::1', 0, 'OK', '2016-04-07 18:54:18'),
(91, 'Cheketo', 'Dixit007', '::1', 1, 'Clave Incorrecta', '2016-04-08 03:05:03'),
(92, 'Cheketo', 'Dixit007', '::1', 2, 'Clave Incorrecta', '2016-04-08 03:05:08'),
(93, 'Cheketo', 'Dixit007', '::1', 3, 'Clave Incorrecta', '2016-04-08 03:05:10'),
(94, 'Cheketo', 'Dixit007', '::1', 4, 'Clave Incorrecta', '2016-04-08 03:05:11'),
(95, 'Cheketo', 'Dixit007', '::1', 5, 'Clave Incorrecta', '2016-04-08 03:05:13'),
(96, 'Cheketo', 'Dixit007', '::1', 6, 'Clave Incorrecta', '2016-04-08 03:05:14'),
(97, 'Cheketo', 'Dixit007', '::1', 7, 'Clave Incorrecta', '2016-04-08 03:05:15'),
(98, 'Cheketo', 'Dixit007', '::1', 8, 'Clave Incorrecta', '2016-04-08 03:05:17'),
(99, 'Cheketo', 'Dixit007', '::1', 9, 'Clave Incorrecta', '2016-04-08 03:05:18'),
(100, 'Cheketo', 'Dixit007', '::1', 10, 'Clave Incorrecta', '2016-04-08 03:05:20'),
(101, 'Cheketo', 'Dixit007', '::1', 11, 'Clave Incorrecta', '2016-04-08 03:05:21'),
(102, 'Cheketo', '', '::1', 0, 'OK', '2016-04-08 03:05:36'),
(103, 'Cheketo', '', '::1', 0, 'OK', '2016-04-11 05:14:47'),
(104, 'Cheketo', '', '::1', 0, 'OK', '2016-04-11 07:26:54'),
(105, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 04:25:48'),
(106, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 04:49:37'),
(107, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 04:50:55'),
(108, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 04:54:07'),
(109, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 04:55:32'),
(110, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 04:55:46'),
(111, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:00:11'),
(112, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:00:40'),
(113, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:00:58'),
(114, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:38:02'),
(115, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:40:36'),
(116, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:41:03'),
(117, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:43:37'),
(118, 'cheketo', 'Oraprod1041>                    </div>                    <div class=', '::1', 1, 'Clave Incorrecta', '2016-04-12 05:44:04'),
(119, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:50:33'),
(120, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:50:56'),
(121, 'Cheketo', '', '::1', 0, 'OK', '2016-04-12 05:51:17'),
(122, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:52:14'),
(123, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:52:20'),
(124, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:52:45'),
(125, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:56:09'),
(126, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 05:56:51'),
(127, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 06:04:24'),
(128, 'cheketo', '', '::1', 0, 'OK', '2016-04-12 06:09:52'),
(129, 'cheketo', '', '::1', 0, 'OK', '2016-04-13 02:41:32'),
(130, 'cheketo', '', '::1', 0, 'OK', '2016-04-14 09:43:21'),
(131, 'Cheketo', '', '::1', 0, 'OK', '2016-04-14 20:00:05'),
(132, 'cheketo', '', '::1', 0, 'OK', '2016-04-20 01:30:33'),
(133, 'cheketo', '', '::1', 0, 'OK', '2016-04-20 05:35:23'),
(134, 'Cheketo', '', '::1', 0, 'OK', '2016-04-20 06:07:09'),
(135, 'cheketo', '', '::1', 0, 'OK', '2016-04-20 21:11:54'),
(136, 'cheketo', '', '::1', 0, 'OK', '2016-04-21 03:35:37'),
(137, 'cheketo', '', '::1', 0, 'OK', '2016-04-21 12:31:43'),
(138, 'cheketo', '', '::1', 0, 'OK', '2016-04-21 12:35:19'),
(139, 'cheketo', '', '::1', 0, 'OK', '2016-04-22 07:26:01'),
(140, 'cheketo', '', '::1', 0, 'OK', '2016-04-23 00:47:54'),
(141, 'cheketo', '', '::1', 0, 'OK', '2016-04-24 03:43:02'),
(142, 'cheketo', '', '::1', 0, 'OK', '2016-04-24 17:31:01'),
(143, 'cheketo', '', '::1', 0, 'OK', '2016-04-24 17:41:25'),
(144, 'cheketo', '', '::1', 0, 'OK', '2016-04-24 19:43:29'),
(145, 'cheketo', '', '::1', 0, 'OK', '2016-04-25 04:20:01'),
(146, 'cheketo', '', '::1', 0, 'OK', '2016-04-27 06:13:16'),
(147, 'javzero', '', '::1', 0, 'OK', '2016-04-27 07:32:50'),
(148, 'Cheketo', '', '::1', 0, 'OK', '2016-04-27 07:43:41'),
(149, 'cheketo', '', '::1', 0, 'OK', '2016-04-27 21:15:53'),
(150, 'cheketo', '', '::1', 0, 'OK', '2016-04-27 21:26:12'),
(151, 'cheketo', '', '::1', 0, 'OK', '2016-04-27 21:52:04'),
(152, 'cheketo', '', '::1', 0, 'OK', '2016-04-27 22:01:20'),
(153, 'cheketo', '', '::1', 0, 'OK', '2016-04-28 01:36:22'),
(154, 'cheketo', '', '::1', 0, 'OK', '2016-05-03 03:52:09'),
(155, 'cheketo', '', '::1', 0, 'OK', '2016-05-03 06:04:35'),
(156, 'cheketo', '', '::1', 0, 'OK', '2016-05-03 06:05:02'),
(157, 'cheketo', '', '::1', 0, 'OK', '2016-05-06 22:38:33'),
(158, 'cheketo', '', '::1', 0, 'OK', '2016-05-11 05:43:30'),
(159, 'cheketo', '', '::1', 0, 'OK', '2016-05-11 16:20:44'),
(160, 'cheketo', '', '::1', 0, 'OK', '2016-05-12 01:49:16'),
(161, 'cheketo', '', '::1', 0, 'OK', '2016-05-12 04:15:44'),
(162, 'Cheketo', '', '::1', 0, 'OK', '2016-05-12 04:22:39'),
(163, 'cheketo', '', '::1', 0, 'OK', '2016-05-17 21:28:49'),
(164, 'cheketo', '', '::1', 0, 'OK', '2016-05-24 14:51:14'),
(165, 'cheketo', '', '::1', 0, 'OK', '2016-05-24 16:48:09'),
(166, 'cheketo', '', '::1', 0, 'OK', '2016-05-30 11:47:01'),
(167, 'cheketo', '', '::1', 0, 'OK', '2016-05-30 21:07:58'),
(168, 'cheketo', '', '::1', 0, 'OK', '2016-05-31 01:37:38'),
(169, 'javzero', '', '::1', 0, 'OK', '2016-05-31 01:59:34'),
(170, 'cheketo', '', '::1', 0, 'OK', '2016-05-31 02:01:08'),
(171, 'cheketo', '', '::1', 0, 'OK', '2016-05-31 17:58:41'),
(172, 'cheketo', '', '::1', 0, 'OK', '2016-05-31 23:11:25'),
(173, 'cheketo', '', '::1', 0, 'OK', '2016-06-01 03:13:31'),
(174, 'cheketo', '', '::1', 0, 'OK', '2016-06-01 05:06:36'),
(175, 'cheketo', '', '::1', 0, 'OK', '2016-06-02 03:43:19'),
(176, 'cheketo', '', '::1', 0, 'OK', '2016-06-04 06:09:08'),
(177, 'javzero', '', '::1', 0, 'OK', '2016-06-04 06:19:08'),
(178, 'cheketo', '', '::1', 0, 'OK', '2016-06-04 06:29:08'),
(179, 'cheketo', '', '::1', 0, 'OK', '2016-06-07 01:03:11'),
(180, 'cheketo', '', '::1', 0, 'OK', '2016-06-07 22:50:46'),
(181, 'cheketo', '', '::1', 0, 'OK', '2016-06-08 01:48:22'),
(182, 'cheketo', '', '::1', 0, 'OK', '2016-06-11 20:06:19'),
(183, 'cheketo', '', '::1', 0, 'OK', '2016-06-11 20:07:17'),
(184, 'cheketo', '', '::1', 0, 'OK', '2016-06-13 13:51:12'),
(185, 'cheketo', '', '::1', 0, 'OK', '2016-06-13 16:20:19'),
(186, 'cheketo', '', '::1', 0, 'OK', '2016-06-15 21:00:11'),
(187, 'pepe', '1212', '::1', 0, 'Usuario invalido', '2016-06-15 21:41:45'),
(188, 'pepe', '1212', '::1', 0, 'Usuario invalido', '2016-06-15 21:41:58'),
(189, 'pepe', '1212', '::1', 0, 'Usuario invalido', '2016-06-15 21:41:59'),
(190, 'pepe', '1212', '::1', 0, 'Usuario invalido', '2016-06-15 21:42:01'),
(191, 'pepe', '1212', '::1', 0, 'Usuario invalido', '2016-06-15 21:42:08'),
(192, 'cheketo', '', '::1', 0, 'OK', '2016-06-15 21:42:22'),
(193, 'cheketo', '', '::1', 0, 'OK', '2016-06-16 06:56:37'),
(194, 'cheketo', '', '::1', 0, 'OK', '2016-06-16 07:26:53'),
(195, 'cheketo', '', '::1', 0, 'OK', '2016-06-16 08:34:30'),
(196, 'cheketo', '', '::1', 0, 'OK', '2016-06-17 04:05:56'),
(197, 'cheketo', '', '::1', 0, 'OK', '2016-06-18 05:03:08'),
(198, 'Cheketo', '', '::1', 0, 'OK', '2016-06-18 11:17:39'),
(199, '', '', '::1', 0, 'Usuario invalido', '2016-06-18 13:59:07'),
(200, 'Cheketo', '', '::1', 0, 'OK', '2016-06-18 13:59:16'),
(201, 'cheketo', '', '::1', 0, 'OK', '2016-06-18 16:48:46'),
(202, 'cheketo', '', '::1', 0, 'OK', '2016-06-19 11:55:17'),
(203, 'cheketo', '', '::1', 0, 'OK', '2016-06-19 19:06:17'),
(204, 'cheketo', '', '::1', 0, 'OK', '2016-06-19 19:06:50'),
(205, 'cheketo', '', '::1', 0, 'OK', '2016-06-20 13:00:21'),
(206, 'cheketo', '', '::1', 0, 'OK', '2016-06-21 19:58:06'),
(207, '', '', '::1', 0, 'Usuario invalido', '2016-06-23 03:38:43'),
(208, 'cheketo', '', '::1', 0, 'OK', '2016-06-23 03:38:52'),
(209, 'cheketo', '', '::1', 0, 'OK', '2016-06-26 01:45:25'),
(210, 'cheketo', '', '::1', 0, 'OK', '2016-06-26 01:45:58'),
(211, 'cheketo', '', '::1', 0, 'OK', '2016-06-28 05:37:20'),
(212, 'cheketo', '', '::1', 0, 'OK', '2016-06-28 10:20:52'),
(213, 'cheketo', '', '::1', 0, 'OK', '2016-06-28 10:59:50'),
(214, 'cheketo', '', '::1', 0, 'OK', '2016-06-28 20:44:38'),
(215, 'cheketo', '', '::1', 0, 'OK', '2016-06-28 21:16:29'),
(216, 'cheketo', '', '::1', 0, 'OK', '2016-06-29 17:33:37'),
(217, 'cheketo', '', '::1', 0, 'OK', '2016-07-01 03:27:37'),
(218, 'aromero', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-07-01 05:51:55'),
(219, 'cheketo', '', '::1', 0, 'OK', '2016-07-01 05:52:04'),
(220, 'cheketo', '', '::1', 0, 'OK', '2016-07-03 18:35:35'),
(221, 'cheketo', '', '::1', 0, 'OK', '2016-07-05 08:58:06'),
(222, 'cheketo', '', '::1', 0, 'OK', '2016-07-05 08:59:36'),
(223, 'cheketo', '', '::1', 0, 'OK', '2016-07-05 21:25:15'),
(224, 'cheketo', '', '::1', 0, 'OK', '2016-07-12 04:35:52'),
(225, 'cheketo', '', '::1', 0, 'OK', '2016-07-12 11:11:41'),
(226, 'cheketo', '', '::1', 0, 'OK', '2016-07-12 23:22:35'),
(227, 'cheketo', '', '::1', 0, 'OK', '2016-07-14 12:54:07'),
(228, 'cheketo', '', '::1', 0, 'OK', '2016-07-14 13:03:20'),
(229, 'cheketo', '', '::1', 0, 'OK', '2016-07-15 19:20:09'),
(230, 'cheketo', '', '::1', 0, 'OK', '2016-07-19 04:54:02'),
(231, 'Cheketo', 'Dixit007', '::1', 1, 'Clave Incorrecta', '2016-07-20 21:14:01'),
(232, 'Cheketo', '', '::1', 0, 'OK', '2016-07-20 21:14:12'),
(233, 'Cheketo', '', '::1', 0, 'OK', '2016-07-22 22:06:28'),
(234, 'aromero', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-07-27 06:49:20'),
(235, 'cheketo', '', '::1', 0, 'OK', '2016-07-27 06:56:13'),
(236, 'undefined', '', '::1', 0, 'Usuario invalido', '2016-07-28 05:58:26'),
(237, 'undefined', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-07-28 06:16:10'),
(238, 'undefined', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-07-28 06:16:51'),
(239, 'undefined', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-07-28 06:21:46'),
(240, 'undefined', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-07-28 06:22:23'),
(241, 'cheketo', '', '::1', 0, 'OK', '2016-07-28 06:25:41'),
(242, 'cheketo', '', '::1', 0, 'OK', '2016-07-28 06:31:13'),
(243, 'cheketo', '', '::1', 0, 'OK', '2016-07-28 06:32:13'),
(244, 'asdasda', '', '::1', 0, 'Usuario invalido', '2016-07-28 07:48:18'),
(245, 'cheketo', '', '::1', 0, 'OK', '2016-07-28 07:48:48'),
(246, 'cheketo', '', '::1', 0, 'OK', '2016-07-28 07:54:02'),
(247, 'Cheketo', '', '::1', 0, 'OK', '2016-07-28 10:35:16'),
(248, 'cheketo', '', '::1', 0, 'OK', '2016-07-28 10:37:11'),
(249, 'Cheketo', '', '::1', 0, 'OK', '2016-07-28 10:43:11'),
(250, 'Cheketo', '', '::1', 0, 'OK', '2016-07-29 06:25:30'),
(251, 'Cheketo', '', '::1', 0, 'OK', '2016-07-29 07:19:38'),
(252, 'Cheketo', '', '::1', 0, 'OK', '2016-07-31 16:32:57'),
(253, 'Cheketo', '', '::1', 0, 'OK', '2016-07-31 18:08:14'),
(254, 'cheketo', '', '::1', 0, 'OK', '2016-07-31 18:35:22'),
(255, 'cheketo', '', '::1', 0, 'OK', '2016-07-31 18:53:49'),
(256, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 12:15:34'),
(257, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 12:51:20'),
(258, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 12:51:33'),
(259, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 14:25:58'),
(260, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 14:33:59'),
(261, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 14:56:09'),
(262, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 16:58:36'),
(263, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 17:14:56'),
(264, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 19:43:51'),
(265, 'romero.m.alejandro@gmail.com', '', '::1', 0, 'OK', '2016-08-01 20:49:36'),
(266, 'sdasdasss', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-08-01 20:49:52'),
(267, 'romero.m.alejandro@gmail.com', '', '::1', 0, 'OK', '2016-08-01 20:50:01'),
(268, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 20:50:13'),
(269, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 21:39:50'),
(270, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 21:40:15'),
(271, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 21:45:29'),
(272, 'cheket', 'Oraprod1041', '::1', 0, 'Usuario invalido', '2016-08-01 22:23:42'),
(273, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 22:27:28'),
(274, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 22:58:16'),
(275, 'cheketo', '', '::1', 0, 'OK', '2016-08-01 22:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `public` char(1) NOT NULL DEFAULT 'Y',
  `status` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `parent_id`, `title`, `link`, `icon`, `position`, `public`, `status`) VALUES
(1, 0, 'Administraci&oacute;n', '#', 'fa-gears', 4, 'N', 'A'),
(2, 0, 'Productos', '#', 'fa-cube', 2, 'N', 'A'),
(3, 0, 'Categor&iacute;as', '#', 'fa-tag', 3, 'N', 'A'),
(4, 6, 'Listado de Perfiles', '../profile/list.php', 'fa-list-ul', 1, 'N', 'A'),
(5, 1, 'Usuarios', '#', 'fa-user', 1, 'N', 'A'),
(6, 1, 'Pefiles', '#', 'fa-lock', 2, 'N', 'A'),
(7, 1, 'Grupos', '#', 'fa-users', 3, 'N', 'A'),
(8, 1, 'Men&uacute;es', '#', 'fa-align-left', 4, 'N', 'A'),
(9, 8, 'Nuevo Men&uacute;', '../menu/new.php', 'fa-plus-square', 1, 'N', 'A'),
(10, 8, 'Listado de Men&uacute;es', '../menu/list.php', 'fa-list-ul', 1, 'N', 'A'),
(11, 5, 'Nuevo Usuario', '../user/new.php', 'fa-user-plus', 1, 'N', 'A'),
(12, 5, 'Listado de Usuarios', '../user/list.php', 'fa-list-ul', 2, 'N', 'A'),
(13, 0, 'Inicio', '../main/main.php', 'fa-home', 1, 'N', 'A'),
(16, 5, 'Editar Usuario', '../user/edit.php', 'fa-edit', 3, 'N', 'O'),
(17, 8, 'Editar Men&uacute;', '../menu/edit.php', 'fa-edit', 3, 'N', 'O'),
(18, 2, 'Listado de Productos', '../product/list.php', 'fa-list-ul', 3, 'N', 'A'),
(19, 2, 'Agregar Producto', '../product/new.php', 'fa-plus-square', 0, 'N', 'A'),
(20, 5, 'Usuarios Eliminados', '../user/list.php?status=I', 'fa-trash', 4, 'N', 'A'),
(21, 6, 'Nuevo Perfil', '../profile/new.php', 'fa-plus-square', 1, 'N', 'A'),
(22, 3, 'Listado de Categor&iacute;as', '../category/list.php', 'fa-list-ul', 2, 'N', 'A'),
(23, 3, 'Nueva Categor&iacute;a', '../category/new.php', 'fa-plus-square', 1, 'N', 'A'),
(24, 3, 'Categor&iacute;as Eliminadas', '../category/list.php?status=I', 'fa-trash', 9, 'N', 'A'),
(25, 2, 'Productos Eliminados', '../product/list.php?status=I', 'fa-trash', 9, 'N', 'A'),
(26, 7, 'Nuevo Grupo', '../group/new.php', 'fa-plus-square', 1, 'N', 'A'),
(27, 7, 'Listado de Grupos', '../group/list.php', 'fa-list-ul', 2, 'N', 'A'),
(28, 7, 'Editar Grupo', '../group/edit.php', 'fa-pencil', 3, 'N', 'O'),
(29, 8, 'Switcher', '../menu/switcher.php', '', 9, 'N', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `menu_exception`
--

CREATE TABLE `menu_exception` (
  `exception_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_exception`
--

INSERT INTO `menu_exception` (`exception_id`, `menu_id`, `admin_id`) VALUES
(1, 2, 35),
(2, 19, 35),
(3, 18, 35),
(4, 25, 35),
(5, 3, 35),
(6, 23, 35),
(7, 22, 35),
(8, 24, 35);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `status` char(1) NOT NULL,
  `modification_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creation_date` datetime NOT NULL,
  `creator_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`image_id`, `product_id`, `src`, `position`) VALUES
(1, 1, '../../../skin/images/products/02.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relation_admin_group`
--

CREATE TABLE `relation_admin_group` (
  `relation_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relation_group_profile`
--

CREATE TABLE `relation_group_profile` (
  `relation_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_group_profile`
--

INSERT INTO `relation_group_profile` (`relation_id`, `group_id`, `profile_id`) VALUES
(8, 5, 353),
(9, 6, 333),
(10, 6, 353),
(11, 7, 333),
(12, 7, 353),
(13, 9, 333),
(14, 9, 353),
(15, 8, 333),
(16, 8, 353),
(17, 4, 333),
(18, 4, 353);

-- --------------------------------------------------------

--
-- Table structure for table `relation_menu_group`
--

CREATE TABLE `relation_menu_group` (
  `relation_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_menu_group`
--

INSERT INTO `relation_menu_group` (`relation_id`, `menu_id`, `group_id`) VALUES
(7, 13, 1),
(8, 2, 1),
(9, 19, 1),
(10, 18, 1),
(11, 25, 1),
(12, 3, 1),
(17, 2, 2),
(18, 19, 2),
(19, 18, 2),
(20, 25, 2),
(68, 13, 5),
(69, 2, 5),
(70, 19, 5),
(71, 18, 5),
(72, 25, 5),
(77, 13, 4),
(78, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `relation_menu_profile`
--

CREATE TABLE `relation_menu_profile` (
  `relation_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_menu_profile`
--

INSERT INTO `relation_menu_profile` (`relation_id`, `menu_id`, `profile_id`) VALUES
(7, 1, 351),
(8, 6, 351),
(9, 4, 351),
(10, 21, 351),
(11, 2, 350),
(12, 18, 350),
(13, 3, 350),
(14, 22, 350),
(15, 1, 352),
(16, 5, 352),
(17, 11, 352),
(18, 12, 352),
(19, 16, 352),
(20, 20, 352),
(81, 13, 353);

-- --------------------------------------------------------

--
-- Table structure for table `relation_product_category`
--

CREATE TABLE `relation_product_category` (
  `relation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_product_category`
--

INSERT INTO `relation_product_category` (`relation_id`, `product_id`, `category_id`) VALUES
(2, 1, 1),
(3, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_exception`
--
ALTER TABLE `menu_exception`
  ADD PRIMARY KEY (`exception_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `relation_admin_group`
--
ALTER TABLE `relation_admin_group`
  ADD PRIMARY KEY (`relation_id`),
  ADD KEY `admin_id` (`admin_id`,`group_id`);

--
-- Indexes for table `relation_group_profile`
--
ALTER TABLE `relation_group_profile`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `relation_menu_group`
--
ALTER TABLE `relation_menu_group`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `relation_menu_profile`
--
ALTER TABLE `relation_menu_profile`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `relation_product_category`
--
ALTER TABLE `relation_product_category`
  ADD PRIMARY KEY (`relation_id`),
  ADD KEY `product_id` (`product_id`,`category_id`),
  ADD KEY `category to relation` (`category_id`),
  ADD KEY `product_id_2` (`product_id`,`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=355;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `menu_exception`
--
ALTER TABLE `menu_exception`
  MODIFY `exception_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `relation_admin_group`
--
ALTER TABLE `relation_admin_group`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relation_group_profile`
--
ALTER TABLE `relation_group_profile`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `relation_menu_group`
--
ALTER TABLE `relation_menu_group`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `relation_menu_profile`
--
ALTER TABLE `relation_menu_profile`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `relation_product_category`
--
ALTER TABLE `relation_product_category`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

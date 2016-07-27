-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2016 at 09:23 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

CREATE TABLE `admin_group` (
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `profile_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` char(1) DEFAULT 'A',
  `creation_date` datetime NOT NULL,
  `last_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`profile_id`, `title`, `image`, `status`, `creation_date`, `last_modification`) VALUES
(333, 'superadministrador', '../../../skin/images/body/pictures/usergen.jpg', 'A', '2013-03-03 03:03:03', '2016-04-06 23:03:03'),
(350, 'prueba', '../../../skin/images/profiles/profile1141210916.png', 'A', '2016-04-06 20:03:28', '2016-04-07 04:42:51'),
(351, 'pepe', '../../../skin/images/profiles/profile112263729.jpeg', 'A', '2016-04-06 20:05:21', '2016-04-06 23:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `tries` int(11) NOT NULL,
  `last_access` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `user`, `password`, `first_name`, `last_name`, `email`, `profile_id`, `img`, `status`, `tries`, `last_access`) VALUES
(3, 'javzero', 'a01610228fe998f515a72dd730294d87', 'Leandro', 'Andrade', '', 333, '../../../skin/images/users/lea.jpg', 'A', 0, '2016-02-25 04:33:21'),
(8, 'cheketo', '72373a57bdf3807c0a1ac9c30bbf3045', 'Alejandro', 'Romero', 'romero.m.alejandro@gmail.com', 333, '../../../skin/images/users/ale.jpg', 'A', 0, '2016-04-07 15:54:18'),
(28, 'viole', '9d7311ba459f9e45ed746755a32dcd11', 'Violeta', 'Raffin', '', 333, '../../../skin/images/users/vio.jpg', 'A', 0, '2016-03-07 06:01:47'),
(33, 'test', 'a01610228fe998f515a72dd730294d87', 'Juan', 'Perez', 'jperez@terra.com.ar', 333, '', 'I', 0, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `title`, `image`, `status`, `last_update`, `creation_date`) VALUES
(1, 0, 'Prueba', '', 'A', '2016-03-17 04:58:21', '2016-03-17 00:00:00'),
(2, 1, 'Prueba 2', '', 'A', '2016-03-17 05:54:33', '2016-03-16 00:00:00'),
(3, 1, 'Prueba3', '', 'A', '2016-03-17 06:56:22', '2016-03-17 03:56:22'),
(4, 2, 'PruebaTest22', '', 'A', '2016-03-17 07:14:12', '2016-03-17 04:14:12'),
(5, 1, 'PruebaTest', '', 'A', '2016-03-17 07:18:09', '2016-03-17 04:18:09'),
(6, 0, '', '', 'A', '2016-03-23 06:07:38', '2016-03-23 03:07:38'),
(7, 0, '', '', 'A', '2016-03-23 06:09:52', '2016-03-23 03:09:52'),
(8, 0, '', '', 'A', '2016-03-23 06:12:00', '2016-03-23 03:12:00'),
(9, 0, '', '', 'A', '2016-03-23 06:12:25', '2016-03-23 03:12:25'),
(10, 0, '', '', 'A', '2016-03-23 06:12:28', '2016-03-23 03:12:28'),
(11, 0, '', '', 'A', '2016-03-23 06:27:28', '2016-03-23 03:27:28'),
(12, 0, '', '', 'A', '2016-03-26 01:16:27', '2016-03-25 22:16:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

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
(90, 'Cheketo', '', '::1', 0, 'OK', '2016-04-07 18:54:18');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `parent_id`, `title`, `link`, `icon`, `position`, `public`, `status`) VALUES
(1, 0, 'Administraci&oacute;n', '#', 'fa-gears', 4, 'N', 'A'),
(2, 0, 'Productos', '#', 'fa-tree', 2, 'N', 'A'),
(3, 0, 'Categor&iacute;as', '#', 'fa-sitemap', 3, 'N', 'A'),
(4, 6, 'Listado de Perfiles', '../profile/list.php', 'fa-list-ul', 1, 'N', 'A'),
(5, 1, 'Usuarios', '#', 'fa-user', 1, 'N', 'A'),
(6, 1, 'Pefiles', '#', 'fa-eye', 2, 'N', 'A'),
(7, 1, 'Grupos', '#', 'fa-sitemap', 3, 'N', 'A'),
(8, 1, 'Men&uacute;es', '#', 'fa-bars', 4, 'N', 'A'),
(9, 8, 'Nuevo Men&uacute;', '../menu/new.php', 'fa-plus-square', 1, 'N', 'A'),
(10, 8, 'Listado de Men&uacute;es', '../menu/list.php', 'fa-list-ul', 1, 'N', 'A'),
(11, 5, 'Nuevo Usuario', '../user/new.php', 'fa-plus-square', 1, 'N', 'A'),
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
(25, 2, 'Productos Eliminados', '../product/list.php?status=I', 'fa-trash', 9, 'N', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `menu_exception`
--

CREATE TABLE `menu_exception` (
  `exception_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `title`, `code`, `model`, `size`, `price`, `description`, `status`, `modification_date`, `creation_date`, `creator_id`) VALUES
(1, 'TuViejaSystem', '000012123', '0.1.13', '90-60-91', '120000.00', 'TuViejaSystem es el mejor robot para acompa&ntilde;ar a tu vieja en la cocina. Y solo cuesta 120 luquitas, una ganga. :)', 'A', '2016-03-17 12:42:22', '2016-03-17 09:42:22', 8),
(2, 'Producto de Prueba', 'asdasda', 'asdasdasd', '2x1', '12.12', 'Producto para realizar pruebas.', 'I', '2016-03-17 05:55:22', '2016-03-16 00:00:00', 8);

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
(1, 1, '../../../skin/images/products/cod1.jpg', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relation_menu_group`
--

CREATE TABLE `relation_menu_group` (
  `relation_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relation_menu_profile`
--

CREATE TABLE `relation_menu_profile` (
  `relation_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
(14, 22, 350);

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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `menu_exception`
--
ALTER TABLE `menu_exception`
  MODIFY `exception_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relation_menu_group`
--
ALTER TABLE `relation_menu_group`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relation_menu_profile`
--
ALTER TABLE `relation_menu_profile`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `relation_product_category`
--
ALTER TABLE `relation_product_category`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
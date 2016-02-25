-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2016 at 09:46 AM
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
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`profile_id`, `title`) VALUES
(333, 'superadministrador');

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
  `profile_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `tries` int(11) NOT NULL,
  `last_access` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `user`, `password`, `first_name`, `last_name`, `profile_id`, `img`, `status`, `tries`, `last_access`) VALUES
(3, 'javzero', 'a01610228fe998f515a72dd730294d87', 'Leandro', 'Andrade', 333, '../../../skin/images/users/lea.jpg', 'A', 0, '2016-02-25 04:33:21'),
(8, 'cheketo', '72373a57bdf3807c0a1ac9c30bbf3045', 'Alejandro', 'Romero', 333, '../../../skin/images/users/ale.jpg', 'A', 0, '2016-02-24 15:02:00'),
(28, 'viole', '9d7311ba459f9e45ed746755a32dcd11', 'Violeta', 'Raffin', 333, '../../../skin/images/users/vio.jpg', 'A', 0, '2016-02-25 04:55:19'),
(29, 'pepe', '81dc9bdb52d04dc20036dbd8313ed055', 'Jos&eacute;', 'Rodolfo', 0, '', 'A', 0, '2016-02-24 03:56:54'),
(30, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ãºser', 'Ã±am', 0, '', 'A', 0, '2016-02-24 03:55:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(11, 'viole', '', '::1', 0, 'OK', '2016-02-25 07:55:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `parent_id`, `title`, `link`, `icon`, `position`, `public`, `status`) VALUES
(1, 0, 'Administraci&oacute;n', '#', 'fa-gears', 4, 'N', 'A'),
(2, 0, 'Productos', '../product/list.php', 'fa-tree', 2, 'N', 'A'),
(3, 0, 'Categor&iacute;as', '../category/new.php', 'fa-sitemap', 3, 'N', 'A'),
(4, 6, 'Listado de Perfiles', '../profile/list.php', 'fa-money', 1, 'N', 'A'),
(5, 1, 'Usuarios', '#', 'fa-user', 1, 'N', 'A'),
(6, 1, 'Pefiles', '#', 'fa-eye', 2, 'N', 'A'),
(7, 1, 'Grupos', '#', 'fa-sitemap', 3, 'N', 'A'),
(8, 1, 'Men&uacute;es', '#', 'fa-bars', 4, 'N', 'A'),
(9, 8, 'Nuevo Men&uacute;', '../menu/new.php', 'fa-plus-square', 1, 'N', 'A'),
(10, 8, 'Listado de Men&uacute;es', '../menu/list.php', 'fa-list-ul', 1, 'N', 'A'),
(11, 5, 'Nuevo Usuario', '../user/new.php', 'fa-plus-square', 1, 'N', 'A'),
(12, 5, 'Listado de Usuarios', '../user/list.php', 'fa-list-ul', 2, 'N', 'A'),
(13, 0, 'Inicio', '../main/main.php', 'fa-home', 1, 'N', 'A');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `menu_exception`
--
ALTER TABLE `menu_exception`
  MODIFY `exception_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT;
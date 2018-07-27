-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 11:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurilaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `dc_appearance`
--

CREATE TABLE `dc_appearance` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `logo` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_appearance`
--

INSERT INTO `dc_appearance` (`id`, `name`, `logo`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'gurilaps', 'logogurilaps.png', '0000-00-00 00:00:00', '2018-07-19 11:50:12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_banner`
--

CREATE TABLE `dc_banner` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `link` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_banner`
--

INSERT INTO `dc_banner` (`id`, `title`, `summary`, `description`, `images`, `link`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'SELAMAT DATANG', 'www.pdam.sukabumikab.go.id', '<p>www.pdam.sukabumikab.go.id</p>', 'pdam.jpg', '', '0000-00-00 00:00:00', '2018-01-30 17:18:31', 0, 1),
(2, 'Medical Appointment', 'Talk to us now to schedule a medical appointment', '<p>Talk to us now to schedule a medical appointment<br></p>', 'banner2.jpg', '', '0000-00-00 00:00:00', '2018-01-30 17:18:48', 0, 1),
(3, '', '', '', 'banner3.jpg', '', '2018-01-30 16:49:18', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_brand`
--

CREATE TABLE `dc_brand` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `images` text,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_brand`
--

INSERT INTO `dc_brand` (`id`, `title`, `images`, `description`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Centornia Residence', '', '<p>Centornia Residence<br></p>', '0000-00-00 00:00:00', '2017-05-03 20:22:50', 0, 1),
(2, 'The Alana', NULL, '<p>The Alana<br></p>', '2017-05-03 20:23:31', NULL, 1, NULL),
(3, 'Saffron Noble', NULL, '<p>Saffron Sentul City<br></p>', '0000-00-00 00:00:00', '2017-05-12 19:16:03', 0, 1),
(4, 'Emerald Golf ', NULL, '<p>Emerald Golf&nbsp;<br></p>', '2017-05-03 20:47:38', NULL, 1, NULL),
(5, 'Spring Mountain Residence Sentul City', NULL, '<p>Spring Mountain Residence Sentul City<br></p>', '2017-05-10 12:46:06', NULL, 1, NULL),
(6, 'CBD NIAGA', NULL, '', '2017-05-10 14:03:41', NULL, 1, NULL),
(7, 'River View Residence', NULL, '', '2017-05-12 16:35:58', NULL, 1, NULL),
(8, 'Green Mountain', NULL, '', '2017-05-12 17:29:22', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_contact`
--

CREATE TABLE `dc_contact` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_contact`
--

INSERT INTO `dc_contact` (`id`, `name`, `email`, `subject`, `content`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'dsa', 'dsadas@dsada.com', 'asdasd', 'dsadasda ds sad sa', '2017-04-17 00:00:00', '2017-04-17 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_default`
--

CREATE TABLE `dc_default` (
  `id` int(100) NOT NULL,
  `name_group` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_event`
--

CREATE TABLE `dc_event` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `images` text NOT NULL,
  `description` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_event`
--

INSERT INTO `dc_event` (`id`, `title`, `images`, `description`, `date_start`, `date_end`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, ' sad sad ass a', 'bannercate2.jpg', '<p>safsaf <br></p>', '2017-04-25', '2017-04-29', '2017-04-25 11:22:40', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_fasilitas`
--

CREATE TABLE `dc_fasilitas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `images` text NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_fasilitas`
--

INSERT INTO `dc_fasilitas` (`id`, `title`, `images`, `content`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'dasdsa', 'rumah.jpg', '<p>asd<br></p>', '2017-05-13 16:12:39', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_gallery`
--

CREATE TABLE `dc_gallery` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `images` text,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_gallery`
--

INSERT INTO `dc_gallery` (`id`, `title`, `images`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, '', 'sc_1.jpg', '0000-00-00 00:00:00', '2017-05-11 21:15:52', 0, 1),
(2, 'asdad', 'sc_2.jpg', '0000-00-00 00:00:00', '2017-05-11 21:16:02', 0, 1),
(3, 'asdadad', 'sc_4.jpg', '0000-00-00 00:00:00', '2017-05-11 21:16:49', 0, 1),
(4, 'asdadasdad', 'sc_5.jpg', '0000-00-00 00:00:00', '2017-05-11 21:17:05', 0, 1),
(5, 'asdadad', 'sc_3.jpg', '0000-00-00 00:00:00', '2017-05-11 21:17:16', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_groups`
--

CREATE TABLE `dc_groups` (
  `id` int(100) NOT NULL,
  `name_group` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_groups`
--

INSERT INTO `dc_groups` (`id`, `name_group`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Super Admin', '2017-04-13 12:29:39', NULL, 1, NULL),
(5, 'Admin', '2017-04-13 15:24:27', NULL, 1, NULL),
(6, 'content', '2018-07-23 14:48:53', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_icons`
--

CREATE TABLE `dc_icons` (
  `id` int(100) NOT NULL,
  `name_icons` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_icons`
--

INSERT INTO `dc_icons` (`id`, `name_icons`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'fa fa-file-text', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'icon-custom-home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'icon-custom-thumb', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 'icon-custom-settings', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 'fa fa-adjust', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'fa fa-anchor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 'fa fa-archive', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 'fa fa-arrows', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(9, 'fa fa-arrows-h', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(10, 'fa fa-arrows-v', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 'fa fa-asterisk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(12, 'fa fa-ban', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(13, 'fa fa-bar-chart-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(14, 'fa fa-barcode', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(15, 'fa fa-bars', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(16, 'fa fa-beer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(17, 'fa fa-bell', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(18, 'fa fa-bell-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(19, 'fa fa-bolt', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(20, 'fa fa-book', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(21, 'fa fa-bookmark', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(22, 'fa fa-bookmark-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(23, 'fa fa-briefcase', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(24, 'fa fa-bug', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(25, 'fa fa-building-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(26, 'fa fa-bullhorn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(27, 'fa fa-bullseye', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(28, 'fa fa-calendar', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 'fa fa-calendar-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 'fa fa-camera', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(31, 'fa fa-envelope', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dc_menu`
--

CREATE TABLE `dc_menu` (
  `id` int(100) NOT NULL,
  `name_menu` varchar(1000) NOT NULL,
  `sub_menu` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `position` int(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_menu`
--

INSERT INTO `dc_menu` (`id`, `name_menu`, `sub_menu`, `target`, `icon`, `position`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Content', '0', 'admin_content', 'icon-custom-thumb', 1, '0000-00-00 00:00:00', '2017-04-13 11:13:46', 0, 1),
(2, 'Static Page', '1', 'static_page', '', 1, '2017-04-06 10:24:25', '2017-04-06 12:29:26', 1, 1),
(3, 'Settings System', '0', 'setting_system', 'icon-custom-settings', 3, '2017-04-13 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, 'Menu', '3', 'menu', '', 1, '2017-04-13 00:00:00', '2017-04-13 00:00:00', 1, 0),
(6, 'User Accsess', '3', 'user_accsess', 'fa fa-bars', 3, '0000-00-00 00:00:00', '2017-04-13 11:15:14', 0, 1),
(7, 'User Groups', '3', 'user_groups', 'none', 4, '2017-04-13 11:15:03', NULL, 1, NULL),
(8, 'User', '3', 'user', 'none', 2, '2017-04-16 18:04:14', NULL, 1, NULL),
(10, 'appearance', '3', 'appearance', 'none', 5, '2017-04-17 14:31:03', NULL, 1, NULL),
(11, 'Message', '0', 'message', 'fa fa-envelope', 2, '0000-00-00 00:00:00', '2017-04-17 15:58:18', 0, 1),
(12, 'Inbox', '11', 'inbox', 'none', 1, '2017-04-17 16:05:07', NULL, 1, NULL),
(13, 'Compose', '11', 'compose', 'none', 2, '2017-04-17 16:05:40', NULL, 1, NULL),
(14, 'Banner', '1', 'banner', 'none', 3, '2017-04-22 16:51:32', NULL, 1, NULL),
(21, 'Event', '1', 'event', 'none', 4, '2017-04-24 20:52:21', NULL, 1, NULL),
(22, 'Gallery', '1', 'gallery', 'none', 5, '2017-04-27 15:07:25', NULL, 1, NULL),
(23, 'Video', '1', 'video', 'none', 6, '2017-04-27 15:07:41', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_menu_accsess`
--

CREATE TABLE `dc_menu_accsess` (
  `id` int(100) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `id_group` int(100) NOT NULL,
  `accsess` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_menu_accsess`
--

INSERT INTO `dc_menu_accsess` (`id`, `id_menu`, `id_group`, `accsess`) VALUES
(12, 1, 0, 0),
(13, 2, 0, 1),
(14, 3, 0, 0),
(15, 4, 0, 0),
(16, 6, 0, 0),
(17, 7, 0, 0),
(18, 1, 1, 1),
(19, 2, 1, 1),
(20, 3, 1, 1),
(21, 4, 1, 1),
(22, 6, 1, 1),
(23, 7, 1, 1),
(24, 1, 5, 1),
(25, 2, 5, 1),
(26, 3, 5, 0),
(27, 4, 5, 0),
(28, 6, 5, 0),
(29, 7, 5, 0),
(30, 8, 1, 1),
(31, 9, 1, 1),
(32, 9, 5, 1),
(33, 8, 5, 0),
(34, 10, 1, 1),
(35, 11, 1, 0),
(36, 12, 1, 0),
(37, 13, 1, 0),
(38, 14, 1, 1),
(39, 14, 5, 1),
(40, 10, 5, 0),
(41, 11, 5, 0),
(42, 12, 5, 0),
(43, 13, 5, 0),
(44, 15, 1, 0),
(45, 16, 1, 0),
(46, 17, 1, 0),
(47, 18, 1, 0),
(48, 19, 1, 0),
(49, 20, 1, 0),
(50, 15, 5, 0),
(51, 16, 5, 0),
(52, 17, 5, 0),
(53, 18, 5, 0),
(54, 19, 5, 0),
(55, 20, 5, 0),
(56, 21, 1, 0),
(57, 21, 5, 1),
(58, 22, 1, 0),
(59, 23, 1, 0),
(60, 22, 5, 0),
(61, 23, 5, 0),
(62, 24, 1, 0),
(63, 25, 1, 0),
(64, 1, 6, 1),
(65, 2, 6, 0),
(66, 14, 6, 0),
(67, 21, 6, 0),
(68, 22, 6, 0),
(69, 23, 6, 1),
(70, 3, 6, 0),
(71, 4, 6, 0),
(72, 6, 6, 0),
(73, 7, 6, 0),
(74, 8, 6, 0),
(75, 10, 6, 0),
(76, 11, 6, 0),
(77, 12, 6, 0),
(78, 13, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dc_news`
--

CREATE TABLE `dc_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `images` text NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_news`
--

INSERT INTO `dc_news` (`id`, `title`, `images`, `content`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Perbaikan Pipa Wilayah Pelayanan PDAM', '6.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt accumsan enim vel pellentesque. Cras mattis nisl nisi, in laoreet arcu maximus sed. Duis dapibus, neque sed eleifend maximus, ex leo luctus nisl, in semper elit sapien vitae massa.<br></p>', '0000-00-00 00:00:00', '2018-02-01 13:40:07', 0, 1),
(2, 'Perbaikan Pipa Wilayah Pelayanan PDAM', 'Pulau-Burung-Belitung.png', '<p><font color="#576475">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt accumsan enim vel pellentesque. Cras mattis nisl nisi, in laoreet arcu maximus sed. Duis dapibus, neque sed eleifend maximus, ex leo luctus nisl, in semper elit sapien vitae massa.</font><br></p>', '0000-00-00 00:00:00', '2018-02-01 13:40:25', 0, 1),
(3, 'Perbaikan Pipa Wilayah Pelayanan PDAM', 'dsc_7196.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt accumsan enim vel pellentesque. Cras mattis nisl nisi, in laoreet arcu maximus sed. Duis dapibus, neque sed eleifend maximus, ex leo luctus nisl, in semper elit sapien vitae massa.<br></p>', '0000-00-00 00:00:00', '2018-02-01 13:40:39', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_pelanggan`
--

CREATE TABLE `dc_pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `images` text NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_pelanggan`
--

INSERT INTO `dc_pelanggan` (`id`, `title`, `images`, `content`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'PELANGGAN 1', 'IMG_6904.JPG', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt accumsan enim vel pellentesque. Cras mattis nisl nisi, in laoreet arcu maximus sed. Duis dapibus, neque sed eleifend maximus, ex leo luctus nisl, in semper elit sapien vitae massa.<br></p>', '0000-00-00 00:00:00', '2018-02-01 13:38:33', 0, 1),
(2, 'PELANGGAN 2', '6.jpg', '<p><font color="#576475">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt accumsan enim vel pellentesque. Cras mattis nisl nisi, in laoreet arcu maximus sed. Duis dapibus, neque sed eleifend maximus, ex leo luctus nisl, in semper elit sapien vitae massa.</font><br></p>', '2018-01-30 16:59:17', NULL, 1, NULL),
(3, 'PELANGGAN 3', '2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt accumsan enim vel pellentesque. Cras mattis nisl nisi, in laoreet arcu maximus sed. Duis dapibus, neque sed eleifend maximus, ex leo luctus nisl, in semper elit sapien vitae massa.<br></p>', '2018-01-30 16:59:37', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_static_content`
--

CREATE TABLE `dc_static_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `images` text,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_static_content`
--

INSERT INTO `dc_static_content` (`id`, `title`, `images`, `content`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(21, 'Profil', 'SOTK.jpg', '<strong style="margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><p></p>', '0000-00-00 00:00:00', '2018-02-01 13:18:35', 0, 1),
(22, 'Kontak', 'timthumb.jpg', '<h4 style="margin-top: 0px; margin-bottom: 15px; padding: 0px; -webkit-tap-highlight-color: transparent; zoom: 1; font-family: Lato, Arial, Helvetica, sans-serif; line-height: 1.25em; color: rgb(45, 62, 82); font-size: 1.3333em;"><b>PDAM TIRTA JAYA MANDIRI KABSUKABUMI</b></h4><p style="margin-bottom: 15px; padding: 0px; -webkit-tap-highlight-color: transparent; zoom: 1; font-size: 1.0833em; line-height: 1.6666; color: rgb(131, 131, 131); font-family: Lato, Arial, Helvetica, sans-serif;">Tower LT 2, Jl. Raya Meruya Ilir No. 88 Business Park Kebon Jeruk, Jakarta Barat</p><p style="margin-bottom: 15px; padding: 0px; -webkit-tap-highlight-color: transparent; zoom: 1; font-size: 1.0833em; line-height: 1.6666; color: rgb(131, 131, 131); font-family: Lato, Arial, Helvetica, sans-serif;"></p><span style="color: rgb(131, 131, 131); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 12px;">No Telp : 0815-900-6588</span><p style="margin-bottom: 15px; padding: 0px; -webkit-tap-highlight-color: transparent; zoom: 1; font-size: 1.0833em; line-height: 1.6666; color: rgb(131, 131, 131); font-family: Lato, Arial, Helvetica, sans-serif;"></p><p style="margin-bottom: 15px; padding: 0px; -webkit-tap-highlight-color: transparent; zoom: 1; font-size: 1.0833em; line-height: 1.6666; color: rgb(131, 131, 131); font-family: Lato, Arial, Helvetica, sans-serif;">Email : cs@umrohku.co.id</p>', '0000-00-00 00:00:00', '2018-01-31 19:26:15', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_user`
--

CREATE TABLE `dc_user` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `photo` text NOT NULL,
  `user_group` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(10) NOT NULL,
  `id_modifier` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_user`
--

INSERT INTO `dc_user` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `photo`, `user_group`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'admins', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'webei', '16807164_1234243823400398_1687302977082263434_n.jpg', 1, '0000-00-00 00:00:00', '2017-04-17 00:12:22', 0, 1),
(2, 'ilhamudzakir', '81dc9bdb52d04dc20036dbd8313ed055', 'ilhamudzakir@gmail.com', 'ilham', 'mudzakir', '20161201_6435.jpg', 5, '2017-04-17 01:54:09', NULL, 1, NULL),
(3, 'opik', '4297f44b13955235245b2497399d7a93', 'bandung@lautan.api', 'opik', 'pik', 'testputih.jpg', 6, '2018-07-23 14:51:21', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_video`
--

CREATE TABLE `dc_video` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `id_embed` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_video`
--

INSERT INTO `dc_video` (`id`, `title`, `id_embed`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'asda sas ', ' sdad sad as asdafa', '0000-00-00 00:00:00', '2017-04-27 15:26:04', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dc_appearance`
--
ALTER TABLE `dc_appearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_banner`
--
ALTER TABLE `dc_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_brand`
--
ALTER TABLE `dc_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_contact`
--
ALTER TABLE `dc_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_default`
--
ALTER TABLE `dc_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_event`
--
ALTER TABLE `dc_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_fasilitas`
--
ALTER TABLE `dc_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_gallery`
--
ALTER TABLE `dc_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_groups`
--
ALTER TABLE `dc_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_icons`
--
ALTER TABLE `dc_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_menu`
--
ALTER TABLE `dc_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_menu_accsess`
--
ALTER TABLE `dc_menu_accsess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_news`
--
ALTER TABLE `dc_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_pelanggan`
--
ALTER TABLE `dc_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_static_content`
--
ALTER TABLE `dc_static_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_user`
--
ALTER TABLE `dc_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_video`
--
ALTER TABLE `dc_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dc_appearance`
--
ALTER TABLE `dc_appearance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_banner`
--
ALTER TABLE `dc_banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_brand`
--
ALTER TABLE `dc_brand`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dc_contact`
--
ALTER TABLE `dc_contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_default`
--
ALTER TABLE `dc_default`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_event`
--
ALTER TABLE `dc_event`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_fasilitas`
--
ALTER TABLE `dc_fasilitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_gallery`
--
ALTER TABLE `dc_gallery`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dc_groups`
--
ALTER TABLE `dc_groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dc_icons`
--
ALTER TABLE `dc_icons`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `dc_menu`
--
ALTER TABLE `dc_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `dc_menu_accsess`
--
ALTER TABLE `dc_menu_accsess`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `dc_news`
--
ALTER TABLE `dc_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_pelanggan`
--
ALTER TABLE `dc_pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_static_content`
--
ALTER TABLE `dc_static_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dc_user`
--
ALTER TABLE `dc_user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_video`
--
ALTER TABLE `dc_video`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 01 sep. 2020 à 03:55
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `idCart` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `idSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`idCart`, `idP`, `idU`, `qte`, `idSize`) VALUES
(74, 10, 5, '1', 1),
(75, 37, 24, '3', 1),
(76, 36, 20, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idC` int(11) NOT NULL,
  `nameCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idC`, `nameCategory`) VALUES
(10, 'women'),
(12, 'men');

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_data`
--

CREATE TABLE `mirrormx_customer_chat_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_department`
--

CREATE TABLE `mirrormx_customer_chat_department` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_department`
--

INSERT INTO `mirrormx_customer_chat_department` (`id`, `name`, `description`) VALUES
(1, 'Admins', 'Admins of websites');

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_message`
--

CREATE TABLE `mirrormx_customer_chat_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `talk_id` int(10) UNSIGNED NOT NULL,
  `extra` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_message`
--

INSERT INTO `mirrormx_customer_chat_message` (`id`, `from_id`, `to_id`, `body`, `datetime`, `talk_id`, `extra`) VALUES
(1, 2, -1, '', '2020-07-19 22:08:39', 1, '{\"type\":\"talk_start\"}'),
(2, 2, -1, 'hi', '2020-07-19 22:08:51', 1, NULL),
(3, 1, -1, 'hi mr bochaib', '2020-07-19 22:09:26', 1, NULL),
(4, -2, -1, '', '2020-07-19 22:09:26', 1, '{\"type\":\"talk_owner\",\"id\":1,\"user\":\"gitsalah\"}'),
(5, 2, -1, '&lt;3', '2020-07-19 22:09:41', 1, NULL),
(6, 1, -1, 'download.jpg', '2020-07-19 22:10:51', 1, '{\"type\":\"files\",\"files\":[{\"name\":\"download.jpg\",\"size\":11946,\"type\":\"image\\/jpeg\"}]}'),
(7, 1, -1, 'hahahahaha', '2020-07-19 22:11:16', 1, NULL),
(8, -2, -1, '', '2020-07-19 22:11:45', 1, '{\"type\":\"talk_close\"}'),
(9, 3, -1, '', '2020-07-19 22:18:07', 2, '{\"type\":\"talk_start\"}'),
(10, 3, -1, 'HELLO', '2020-07-19 22:26:52', 2, NULL),
(11, -2, -1, '', '2020-07-19 22:48:27', 2, '{\"type\":\"talk_close\"}'),
(12, 5, -1, '', '2020-07-19 22:49:13', 3, '{\"type\":\"talk_start\"}'),
(13, 5, -1, 'yeah', '2020-07-19 22:49:20', 3, NULL),
(14, 1, 4, 'HELLO ', '2020-07-19 23:00:20', 4, NULL),
(15, -2, -1, '', '2020-07-19 23:02:41', 3, '{\"type\":\"talk_close\"}'),
(16, 6, -1, '', '2020-07-20 16:29:13', 5, '{\"type\":\"talk_start\"}'),
(17, 6, -1, 'hi', '2020-07-20 16:29:20', 5, NULL),
(18, 1, -1, 'test', '2020-07-20 16:29:51', 5, NULL),
(19, -2, -1, '', '2020-07-20 16:29:51', 5, '{\"type\":\"talk_owner\",\"id\":1,\"user\":\"gitsalah\"}'),
(20, 7, -1, '', '2020-07-23 02:20:57', 6, '{\"type\":\"talk_start\"}'),
(21, 8, -1, '', '2020-07-29 10:01:52', 7, '{\"type\":\"talk_start\"}'),
(22, 8, -1, 'HELLO', '2020-07-29 10:02:23', 7, NULL),
(23, -2, -1, '', '2020-07-29 10:02:50', 7, '{\"type\":\"talk_close\"}'),
(24, 9, -1, '', '2020-07-29 10:03:10', 8, '{\"type\":\"talk_start\"}'),
(25, 9, -1, 'hi how u doing', '2020-07-29 10:03:18', 8, NULL),
(26, 10, -1, '', '2020-07-29 12:04:38', 9, '{\"type\":\"talk_start\"}'),
(27, 10, -1, 'hi', '2020-07-29 12:04:43', 9, NULL),
(28, 11, -1, '', '2020-08-06 14:11:36', 10, '{\"type\":\"talk_start\"}'),
(29, 11, -1, 'hi', '2020-08-06 14:11:41', 10, NULL),
(30, 4, -1, 'hi', '2020-08-06 14:11:55', 10, NULL),
(31, -2, -1, '', '2020-08-06 14:11:55', 10, '{\"type\":\"talk_owner\",\"id\":4,\"user\":\"mariem\"}'),
(32, 11, -1, 'hi', '2020-08-07 15:49:59', 10, NULL),
(33, 4, 11, 'hello', '2020-08-07 15:50:12', 10, NULL),
(34, 12, -1, '', '2020-08-14 18:12:45', 11, '{\"type\":\"talk_start\"}'),
(35, 12, -1, 'hi', '2020-08-14 18:12:50', 11, NULL),
(36, 1, -1, 'hello sir', '2020-08-14 18:12:59', 11, NULL),
(37, -2, -1, '', '2020-08-14 18:12:59', 11, '{\"type\":\"talk_owner\",\"id\":1,\"user\":\"gitsalah\"}');

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_shared_file`
--

CREATE TABLE `mirrormx_customer_chat_shared_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `name` varchar(32) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(10) UNSIGNED DEFAULT NULL,
  `upload_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_shared_file`
--

INSERT INTO `mirrormx_customer_chat_shared_file` (`id`, `original_name`, `name`, `type`, `size`, `upload_id`, `password`) VALUES
(1, 'download.jpg', '5tyeL9cfJGRdJbhhdY8sXA7midmDdMy', 'image/jpeg', 11946, 1, 'zhKROO8QWajsnN6240J6bSzD5EF1PK3');

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_talk`
--

CREATE TABLE `mirrormx_customer_chat_talk` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(32) DEFAULT NULL,
  `department_id` smallint(5) UNSIGNED DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_talk`
--

INSERT INTO `mirrormx_customer_chat_talk` (`id`, `state`, `department_id`, `owner`, `last_activity`, `extra`) VALUES
(1, 'closed', NULL, 1, '2020-07-19 22:11:16', NULL),
(2, 'closed', NULL, NULL, '2020-07-19 22:18:07', NULL),
(3, 'closed', 1, NULL, '2020-07-19 22:49:13', NULL),
(4, 'closed', NULL, 1, '2020-07-21 18:11:27', NULL),
(5, 'closed', 1, 1, '2020-07-21 18:11:27', NULL),
(6, 'closed', 1, NULL, '2020-07-23 12:44:05', NULL),
(7, 'closed', 1, NULL, '2020-07-29 10:01:52', NULL),
(8, 'closed', 1, NULL, '2020-07-29 11:03:38', NULL),
(9, 'closed', 1, NULL, '2020-07-30 12:22:07', NULL),
(10, 'closed', 1, 4, '2020-08-07 15:50:12', NULL),
(11, 'in_progress', 1, 1, '2020-08-14 18:12:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_upload`
--

CREATE TABLE `mirrormx_customer_chat_upload` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `state` varchar(16) NOT NULL,
  `files_info` text,
  `size` int(10) UNSIGNED DEFAULT NULL,
  `progress` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_upload`
--

INSERT INTO `mirrormx_customer_chat_upload` (`id`, `message_id`, `state`, `files_info`, `size`, `progress`) VALUES
(1, 6, 'uploaded', '[{\"name\":\"download.jpg\",\"type\":\"image\\/jpeg\",\"size\":11946}]', 11946, 11946);

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_user`
--

CREATE TABLE `mirrormx_customer_chat_user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `info` text,
  `roles` varchar(128) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_user`
--

INSERT INTO `mirrormx_customer_chat_user` (`id`, `name`, `mail`, `password`, `image`, `info`, `roles`, `last_activity`) VALUES
(1, 'gitsalah', 'gitsalah@eshop.com', 'c66790b8d5087bdc85681ae7e2127b7b7f106179', NULL, '{\"ip\":\"::1\"}', 'ADMIN,OPERATOR', '2020-08-14 18:13:15'),
(2, 'BOCHAIB-1595192919', 'bochaib@gmail.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/c.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.40\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"en\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"regionCode\":\"11\",\"regionName\":\"Marrakech-Tensift-Al Haouz\",\"city\":\"Marrakesh\",\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":31.6315,\"longitude\":-8.0083,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '0000-00-00 00:00:00'),
(3, 'visitor.95204-1595193487', 'no@e.mail.provided', 'x', '/eshop/backoffice/livechat/img/avatar.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.40\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"en\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"regionCode\":\"11\",\"regionName\":\"Marrakech-Tensift-Al Haouz\",\"city\":\"Marrakesh\",\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":31.6315,\"longitude\":-8.0083,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '0000-00-00 00:00:00'),
(4, 'mariem', 'test@gmail.com', 'c66790b8d5087bdc85681ae7e2127b7b7f106179', '/eshop/backoffice/livechat/upload/default-avatars/b.png', '{\"ip\":\"::1\"}', 'OPERATOR', '2020-08-08 22:15:23'),
(5, 'Mick-1595195353', 'kaops@gmail.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/f.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.40\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"en\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"regionCode\":\"11\",\"regionName\":\"Marrakech-Tensift-Al Haouz\",\"city\":\"Marrakesh\",\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":31.6315,\"longitude\":-8.0083,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '0000-00-00 00:00:00'),
(6, 'zniti-1595258953', 'zniti@gmail.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.40\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"en\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"city\":null,\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":32,\"longitude\":-5,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '2020-07-20 16:30:27'),
(7, '&lt;script&gt;alert(\'heello\')&lt', 'mariem@eshop.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/g.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.40\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"fr\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"city\":null,\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":32,\"longitude\":-5,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '2020-07-23 02:21:02'),
(8, 'USERGEST-1596013312', 'salah.bouanba3@gmail.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.48\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"fr\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"regionCode\":\"13\",\"regionName\":\"Region de Souss-Massa-Draa\",\"city\":\"Agadir\",\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":30.4207,\"longitude\":-9.5932,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '0000-00-00 00:00:00'),
(9, 'TEST-1596013390', 'test@gmzil.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.48\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"fr\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"regionCode\":\"13\",\"regionName\":\"Region de Souss-Massa-Draa\",\"city\":\"Agadir\",\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":30.4207,\"longitude\":-9.5932,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '2020-07-29 10:03:26'),
(10, 'test-1596020678', 'test@gmzil.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/index.php\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.89 Safari\\/537.36 Edg\\/84.0.522.48\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"fr\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"city\":null,\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":32,\"longitude\":-5,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '2020-07-29 12:17:48'),
(11, 'okmk k-1596719496', 'mariem@gmail.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/c.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/eshop\\/views\\/index.php\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/81.0.4044.113 Safari\\/537.36\",\"browserName\":\"chrome\",\"browserVersion\":\"81.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"fr\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"city\":null,\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":32,\"longitude\":-5,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '2020-08-07 15:53:47'),
(12, 'ZNITI-1597425165', 'zniti@gmail.com', 'x', '/eshop/backoffice/livechat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/MshopVgitsalah\\/views\\/\",\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/84.0.4147.125 Safari\\/537.36 Edg\\/84.0.522.59\",\"browserName\":\"chrome\",\"browserVersion\":\"84.0\",\"os\":\"windows\",\"engine\":\"webkit\",\"language\":\"fr\",\"geoloc\":{\"countryCode\":\"MA\",\"countryName\":\"Morocco\",\"city\":null,\"zipCode\":null,\"timeZone\":\"Africa\\/Casablanca\",\"latitude\":32,\"longitude\":-5,\"metroCode\":null,\"utcOffset\":-60}}', 'GUEST', '2020-08-14 18:22:41');

-- --------------------------------------------------------

--
-- Structure de la table `mirrormx_customer_chat_user_department`
--

CREATE TABLE `mirrormx_customer_chat_user_department` (
  `user_id` int(11) NOT NULL,
  `department_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mirrormx_customer_chat_user_department`
--

INSERT INTO `mirrormx_customer_chat_user_department` (`user_id`, `department_id`) VALUES
(1, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `orderNumber` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idU` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `calculated` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` varchar(255) NOT NULL,
  `paypal` tinyint(4) NOT NULL,
  `cod` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`idOrder`, `orderNumber`, `status`, `firstname`, `lastname`, `address`, `zip`, `city`, `phone_number`, `email`, `idU`, `idP`, `qte`, `calculated`, `created_at`, `price`, `paypal`, `cod`) VALUES
(51, 'Mshop', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 12, 32, '2', 0, '2020-08-12 19:32:29', '31.98', 0, 0),
(52, 'Mshop51', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 12, 32, '2', 0, '2020-08-22 19:32:39', '31.98', 0, 1),
(53, 'Mshop52', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 12, 32, '1', 0, '2020-08-22 21:09:04', '15.99', 0, 1),
(55, 'Mshop53', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 6, 32, '1', 0, '2020-08-23 23:48:19', '15.99', 0, 1),
(56, 'Mshop55', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 6, 32, '2', 0, '2020-08-23 23:49:27', '31.98', 0, 1),
(57, 'Mshop55', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 6, 33, '2', 0, '2020-08-23 23:49:27', '69.98', 0, 1),
(58, 'Mshop57', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 6, 36, '1', 0, '2020-08-23 23:50:36', '22.99', 0, 1),
(59, 'Mshop58', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 6, 32, '2', 0, '2020-08-24 14:42:24', '31.98', 0, 1),
(60, 'Mshop59', 'shipped', 'salaheddine', 'bouanba', 'lot 161 AL MANAR YASSAMIN', '40000', '', '', '', 12, 33, '1', 0, '2020-08-24 14:43:04', '34.99', 0, 1),
(61, 'Mshop60', 'Delivred', 'mariem', 'elhadki', 'Lot reveue 2921', '40001', 'Safi', '0649118803', 'mariem@me.com', 12, 32, '2', 0, '2020-08-24 18:44:09', '31.98', 0, 1),
(62, 'Mshop61', 'pending', 'okmkhjn', 'kuyhuyh', '12 Rue omam quartie hopital', '042424', 'Aguelmous', '0644569834', 'mariem@gmail.com', 11, 32, '1', 0, '2020-08-27 23:59:33', '15.99', 0, 1),
(63, 'Mshop62', 'pending', 'okmk', 'Safi', '12 Rue omam quartie hopital', '042424', 'Aguelmous', '0644569834', 'mariem@gmail.com', 11, 10, '1', 0, '2020-08-28 17:19:08', '12.99', 0, 1),
(64, 'Mshop63', 'pending', 'okmk', 'kijujj', '12 Rue omam quartie hopital', '042424', 'Agdz', '0644569834', 'mariem@gmail.com', 11, 37, '1', 0, '2020-08-30 23:28:12', '22.99', 0, 1),
(65, 'Mshop63', 'pending', 'okmk', 'kijujj', '12 Rue omam quartie hopital', '042424', 'Agdz', '0644569834', 'mariem@gmail.com', 11, 36, '1', 0, '2020-08-30 23:28:12', '22.99', 0, 1),
(66, 'Mshop63', 'pending', 'okmk', 'kijujj', '12 Rue omam quartie hopital', '042424', 'Agdz', '0644569834', 'mariem@gmail.com', 11, 41, '1', 0, '2020-08-30 23:28:12', '35', 0, 1),
(67, 'Mshop66', 'pending', 'okmk', 'kijujj', '12 Rue omam quartie hopital', '042424', 'Berrechid', '0644569834', 'mariem@gmail.com', 11, 37, '1', 0, '2020-08-30 23:31:47', '22.99', 0, 1),
(68, 'Mshop67', 'pending', 'okmk', 'kuyhuyh', '12 Rue omam quartie hopital', '042424', 'Riah', '0644569834', 'mariem@gmail.com', 11, 41, '1', 0, '2020-08-30 23:32:18', '35', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset`
--

CREATE TABLE `password_reset` (
  `idReset` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `idP` int(11) NOT NULL,
  `nameProduct` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Qte` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `description` varchar(2550) NOT NULL,
  `idC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`idP`, `nameProduct`, `Price`, `Qte`, `Image`, `Image2`, `description`, `idC`) VALUES
(10, 'Men\'s V-Neck T-Shirt', '12.99', '108', '1597081174_product2.jpg', '1597081174_product2hover.jpg', '<p>Regular fit t-shirt, 100% cotton, round neck and short sleeves.</p>', 12),
(32, 'Men\'s Leaves T-shirt', '15.99', '100', '1597082308_95550282_0953_2.jpg', '1597082308_95550282_0953_1.jpg', '<p>Regular fit cotton blend t-shirt with round neck and short sleeves.</p>', 12),
(33, 'Men\'s Carey Check Slim Fit Blazer', '159.99', '50', '1598623291_95382272_0535_2.jpg', '1598623291_95382272_0535_4.jpg', '<p>Slim fit blazer made from a checked wool blend. Model with</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Double breasted</li>\r\n<li>Slit flap pockets</li>\r\n<li>Chest pocket&nbsp;</li>\r\n</ul>', 12),
(34, 'Men\'s slim fit Tom blazer', '119.99', '50', '1598629956_79626316_0060_2.jpg', '1598629956_79626316_0060_1.jpg', '<p>Slim fit blazer from finely woven quality wool blend</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Double button closure</li>\r\n<li>Two flap pockets</li>\r\n<li>a breast pocket</li>\r\n</ul>', 12),
(35, 'Women\'s organic cotton t-shirt', '11.00', '100', '1597085328_95320151_0665_2.jpg', '1597085328_95320151_0665_1.jpg', '<p>Regular fit t-shirt, 100% organic cotton, with round neck.</p>', 10),
(36, 'Women\'s printed T-shirt', '22.99', '100', '1597085450_95415345_0144_2.jpg', '1597085450_95415345_0144_1.jpg', '<p>Regular fit t-shirt in a soft cotton blend with a round neck and short sleeves.</p>\r\n<p>Text applied and application printed on the front.</p>', 10),
(37, 'Women\'s tank top with buttons', '22.99', '100', '1597085794_95555423_0104_2.jpg', '1597085794_95555423_0104_1.jpg', '<p>sleeveless cotton blend op with V-neck and buttons on the front.</p>', 10),
(38, 'Women\'s halterneck dress', '39.99', '100', '1597085959_95456508_0299_2.jpg', '1597085959_95456508_0299_1.jpg', '<p>Regular fit maxi dress worsens, leaf pattern all over, round neck and removable belt.</p>', 10),
(39, 'Women\'s dress with smocked details', '36.00', '100', '1597086077_95327334_0576_2.jpg', '1597086077_95327334_0576_1.jpg', '<p>Quality woven flare dress with pattern, narrow straps and elastic smocking at the top.</p>', 10),
(40, 'Women\'s knitted skirt', '39.99', '100', '1597086464_94993981_0060_2.jpg', '1597086464_94993981_0060_1.jpg', '<p>Stretch wool blend knitted skirt,</p>\r\n<p>with elastic waistband at the top and decorative button closure.</p>\r\n<p>The dress falls to the knee.</p>', 10),
(41, 'Women\'s pleated skirt', '35.00', '100', '1597086647_95253138_0047_2.jpg', '1597086647_95253138_0047_1.jpg', '<p>Quality woven pleated skirt with an edge at the waist.</p>\r\n<p>Featuring an invisible side zip and a wallet front that\'s shorter than the back.</p>', 10),
(42, 'Women\'s structured blouse', '35.99', '100', '1597089469_95296616_0110_2.jpg', '1597089469_95296616_0110_1.jpg', '<p>Regular fit blouse, 100% viscose, with shirt collar, invisible button closure and short sleeves.</p>', 10),
(43, 'Women\'s chest pocket top', '40.00', '100', '1597089698_95449074_0075_2.jpg', '1597089698_95449074_0075_1.jpg', '<p>Finely woven, regular fit blouse with V-neck, two chest flap pockets and short sleeves.</p>', 10),
(45, 'Women\'s slim fit chinos', '50.99', '100', '1597090408_95019093_0047_2.jpg', '1597090408_95019093_0047_4.jpg', '<p>Slim fit cotton blend hook and zip pants</p>', 10),
(47, 'Men\'s regular fit patterned shirt', '39.99', '100', '1598619677_95442921_0783_5.jpg', '1598619677_95442921_0783_6.jpg', '<p>Patterned cotton poplin shirt. Regular fit model with button-down collar, button closure and long sleeves with button closure.</p>', 12),
(48, 'Men\'s slim fit structure shirt', '30.00', '100', '1598620404_95105222_0783_2.jpg', '1598620404_95105222_0783_1.jpg', '<p>Shirt with all-over print and structure, V-neck, button closure and short sleeves.</p>\r\n<p>&nbsp;</p>', 12),
(49, 'Men\'s white t-shirt', '20.00', '100', '1598621934_95550176_0120_2.jpg', '1598621934_95550176_0120_1.jpg', '<p>Regular fit cotton blend t-shirt. Round neck, short sleeves and all-over print</p>', 12),
(50, 'Men\'s printed appliquÃ© T-shirt', '20.00', '100', '1598622555_95248363_0783_2.jpg', '1598622555_95248363_0783_1.jpg', '<p>Slim fit t-shirt, 100% cotton, with round neck and short sleeves. Application printed on the front</p>', 12),
(51, 'Men\'s slim-fit navy blue blazer', '119.99', '50', '1598630238_79626491_0783_2.jpg', '1598630238_79626491_0783_1.jpg', '<p>Slim fit blazer in a finely woven quality wool blend</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Double button closure</li>\r\n<li>Two flap pockets</li>\r\n<li>One breast pocket</li>\r\n<li>Three inside pockets, long sleeves and a double slit behind.</li>\r\n</ul>', 12),
(52, 'Men\'s slim fit checked shirt', '35.99', '100', '1598630585_94633733_0768_2.jpg', '1598630585_94633733_0768_1.jpg', '<p>Slim fit cotton blend shirt with a pattern</p>\r\n<ul class=\"tox-checklist\">\r\n<li>tiles all over the surface</li>\r\n<li>embroidery on the chest</li>\r\n<li>buttoned closure and long sleeves</li>\r\n</ul>\r\n<p>.</p>', 12),
(53, 'Men\'s slim fit checked Oxford shirt', '60.00', '100', '1598630714_95472416_0983_6.jpg', '1598630714_95472416_0983_1.jpg', '<p>Slim fit shirt in a stretch and checked Oxford cotton blend. Ribbed model buttoned closure and long sleeves.<br />Nice details: you can see our signature logo, the embroidered swallow, on the chest.</p>', 12),
(54, 'Men\'s slim fit patterned shirt', '40.99', '100', '1598630997_95443034_0749_5.jpg', '1598630997_95443034_0749_3.jpg', '<p>Slim fit cotton shirt to be printed all over and buttoned. Model with</p>\r\n<ul class=\"tox-checklist\">\r\n<li>button closure</li>\r\n<li>long sleeves</li>\r\n<li>embroidery on the chest and contrasting detail seam at the bottom.</li>\r\n</ul>', 12),
(55, 'Chemise corduroy boxy fit homme', '55.99', '100', '1598631179_95329765_0867_2.jpg', '1598631179_95329765_0867_1.jpg', '<p>Chemise boxy fit Blue Ridge &agrave;</p>\r\n<ul class=\"tox-checklist\">\r\n<li>&nbsp;col &agrave; revers courts,</li>\r\n<li>&nbsp; fermeture boutonn&eacute;e contrastante et manches courtes.</li>\r\n</ul>\r\n<p>Mod&egrave;le 100% coton.</p>', 12),
(56, 'Men\'s polo shirt', '25.99', '100', '1598631382_95362861_0857_2.jpg', '1598631382_95362861_0857_1.jpg', '<p>100% cotton polo shirt</p>\r\n<ul class=\"tox-checklist\">\r\n<li>contrasting button closure</li>\r\n<li>short sleeve chest pocket.</li>\r\n</ul>', 12),
(57, 'Men\'s striped cotton pique polo shirt', '25.00', '100', '1598631691_95363141_0492_2.jpg', '1598631691_95363141_0492_1.jpg', '<p>Slim fit polo shirt 100% cotton. Model to</p>\r\n<ul class=\"tox-checklist\">\r\n<li>short lapel collar</li>\r\n<li>buttoned closure at the top and short sleeves.</li>\r\n</ul>', 12);

-- --------------------------------------------------------

--
-- Structure de la table `product_history`
--

CREATE TABLE `product_history` (
  `idP` int(11) NOT NULL,
  `nameProduct` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Qte` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product_history`
--

INSERT INTO `product_history` (`idP`, `nameProduct`, `Price`, `Qte`, `Image`, `Image2`, `description`, `idC`) VALUES
(9, 'T-SHIRT ORGANIC COTTON', '15.00', '80', '1597079329_product1.jpg', '1597079329_product1hover.jpg', '<p>T-shirt slim fit de m&eacute;lange de coton bio &agrave; col rond et manches courtes.</p>', 'men'),
(10, 'T-Shirt Ã  Col En V Hommes', '12.99', '108', '1597081174_product2.jpg', '1597081174_product2hover.jpg', '<p>T-shirt regular fit, 100% coton, &agrave; col rond et manches courtes.</p>', '12'),
(32, 'Men\'s Leaves T-shirt', '15.99', '100', '1597082308_95550282_0953_2.jpg', '1597082308_95550282_0953_1.jpg', '<p>Regular fit cotton blend t-shirt with round neck and short sleeves.</p>', '12'),
(33, 'Men\'s Carey Check Slim Fit Blazer', '159.99', '50', '1598623291_95382272_0535_2.jpg', '1598623291_95382272_0535_4.jpg', '<p>Slim fit blazer made from a checked wool blend. Model with</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Double breasted</li>\r\n<li>Slit flap pockets</li>\r\n<li>Chest pocket&nbsp;</li>\r\n</ul>', '12'),
(34, 'Men\'s slim fit Tom blazer', '119.99', '50', '1598629956_79626316_0060_2.jpg', '1598629956_79626316_0060_1.jpg', '<p>Slim fit blazer from finely woven quality wool blend</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Double button closure</li>\r\n<li>Two flap pockets</li>\r\n<li>a breast pocket</li>\r\n</ul>', '12'),
(35, 'Women\'s organic cotton t-shirt', '11.00', '100', '1597085328_95320151_0665_2.jpg', '1597085328_95320151_0665_1.jpg', '<p>Regular fit t-shirt, 100% organic cotton, with round neck.</p>', '10'),
(36, 'Women\'s printed T-shirt', '22.99', '100', '1597085450_95415345_0144_2.jpg', '1597085450_95415345_0144_1.jpg', '<p>Regular fit t-shirt in a soft cotton blend with a round neck and short sleeves.</p>\r\n<p>Text applied and application printed on the front.</p>', '10'),
(37, 'Women\'s tank top with buttons', '22.99', '100', '1597085794_95555423_0104_2.jpg', '1597085794_95555423_0104_1.jpg', '<p>sleeveless cotton blend op with V-neck and buttons on the front.</p>', '10'),
(38, 'Women\'s halterneck dress', '39.99', '100', '1597085959_95456508_0299_2.jpg', '1597085959_95456508_0299_1.jpg', '<p>Regular fit maxi dress worsens, leaf pattern all over, round neck and removable belt.</p>', '10'),
(39, 'Women\'s dress with smocked details', '36.00', '100', '1597086077_95327334_0576_2.jpg', '1597086077_95327334_0576_1.jpg', '<p>Quality woven flare dress with pattern, narrow straps and elastic smocking at the top.</p>', '10'),
(40, 'Women\'s knitted skirt', '39.99', '100', '1597086464_94993981_0060_2.jpg', '1597086464_94993981_0060_1.jpg', '<p>Stretch wool blend knitted skirt,</p>\r\n<p>with elastic waistband at the top and decorative button closure.</p>\r\n<p>The dress falls to the knee.</p>', '10'),
(41, 'Women\'s pleated skirt', '35.00', '100', '1597086647_95253138_0047_2.jpg', '1597086647_95253138_0047_1.jpg', '<p>Quality woven pleated skirt with an edge at the waist.</p>\r\n<p>Featuring an invisible side zip and a wallet front that\'s shorter than the back.</p>', '10'),
(42, 'Women\'s structured blouse', '35.99', '100', '1597089469_95296616_0110_2.jpg', '1597089469_95296616_0110_1.jpg', '<p>Regular fit blouse, 100% viscose, with shirt collar, invisible button closure and short sleeves.</p>', '10'),
(43, 'Women\'s chest pocket top', '40.00', '100', '1597089698_95449074_0075_2.jpg', '1597089698_95449074_0075_1.jpg', '<p>Finely woven, regular fit blouse with V-neck, two chest flap pockets and short sleeves.</p>', '10'),
(44, 'Pantalon slim fit femme', '50.99', '100', '1597089919_91219169_0060_2.jpg', '1597090076_91219169_0060_4.jpg', '<p>Pantalon slim fit de qualit&eacute; finement tiss&eacute;e &agrave;</p>\r\n<ul class=\"tox-checklist\">\r\n<li>double fermeture &eacute;clair.</li>\r\n<li>deuxpochesfendues.</li>\r\n<li>une poche fendue &agrave; l&rsquo;arri&egrave;re et jambes en fuseau.</li>\r\n', 'women'),
(45, 'Women\'s slim fit chinos', '50.99', '100', '1597090408_95019093_0047_2.jpg', '1597090408_95019093_0047_4.jpg', '<p>Slim fit cotton blend hook and zip pants</p>', '10'),
(46, 'Nike', '34.99', '21', '1597253926_download.jpeg', '1597253926_images.jpeg', '<ul class=\"tox-checklist\">\r\n<li>NIKE ORIGINAL</li>\r\n</ul>', '12'),
(47, 'Men\'s regular fit patterned shirt', '39.99', '100', '1598619677_95442921_0783_5.jpg', '1598619677_95442921_0783_6.jpg', '<p>Patterned cotton poplin shirt. Regular fit model with button-down collar, button closure and long sleeves with button closure.</p>', '12'),
(48, 'Men\'s slim fit structure shirt', '30.00', '100', '1598620404_95105222_0783_2.jpg', '1598620404_95105222_0783_1.jpg', '<p>Shirt with all-over print and structure, V-neck, button closure and short sleeves.</p>\r\n<p>&nbsp;</p>', '12'),
(49, 'Men\'s white t-shirt', '20.00', '100', '1598621934_95550176_0120_2.jpg', '1598621934_95550176_0120_1.jpg', '<p>Regular fit cotton blend t-shirt. Round neck, short sleeves and all-over print</p>', '12'),
(50, 'Men\'s printed appliquÃ© T-shirt', '20.00', '100', '1598622555_95248363_0783_2.jpg', '1598622555_95248363_0783_1.jpg', '<p>Slim fit t-shirt, 100% cotton, with round neck and short sleeves. Application printed on the front</p>', '12'),
(51, 'Men\'s slim-fit navy blue blazer', '119.99', '50', '1598630238_79626491_0783_2.jpg', '1598630238_79626491_0783_1.jpg', '<p>Slim fit blazer in a finely woven quality wool blend</p>\r\n<ul class=\"tox-checklist\">\r\n<li>Double button closure</li>\r\n<li>Two flap pockets</li>\r\n<li>One breast pocket</li>\r\n<li>Three inside pockets, long sleeves and a double slit behind.</li>\r\n</ul>', '12'),
(52, 'Men\'s slim fit checked shirt', '35.99', '100', '1598630585_94633733_0768_2.jpg', '1598630585_94633733_0768_1.jpg', '<p>Slim fit cotton blend shirt with a pattern</p>\r\n<ul class=\"tox-checklist\">\r\n<li>tiles all over the surface</li>\r\n<li>embroidery on the chest</li>\r\n<li>buttoned closure and long sleeves</li>\r\n</ul>\r\n<p>.</p>', '12'),
(53, 'Men\'s slim fit checked Oxford shirt', '60.00', '100', '1598630714_95472416_0983_6.jpg', '1598630714_95472416_0983_1.jpg', '<p>Slim fit shirt in a stretch and checked Oxford cotton blend. Ribbed model buttoned closure and long sleeves.<br />Nice details: you can see our signature logo, the embroidered swallow, on the chest.</p>', '12'),
(54, 'Men\'s slim fit patterned shirt', '40.99', '100', '1598630997_95443034_0749_5.jpg', '1598630997_95443034_0749_3.jpg', '<p>Slim fit cotton shirt to be printed all over and buttoned. Model with</p>\r\n<ul class=\"tox-checklist\">\r\n<li>button closure</li>\r\n<li>long sleeves</li>\r\n<li>embroidery on the chest and contrasting detail seam at the bottom.</li>\r\n</ul>', '12'),
(55, 'Chemise corduroy boxy fit homme', '55.99', '100', '1598631179_95329765_0867_2.jpg', '1598631179_95329765_0867_1.jpg', '<p>Chemise boxy fit Blue Ridge &agrave;</p>\r\n<ul class=\"tox-checklist\">\r\n<li>&nbsp;col &agrave; revers courts,</li>\r\n<li>&nbsp; fermeture boutonn&eacute;e contrastante et manches courtes.</li>\r\n</ul>\r\n<p>Mod&egrave;le 100% coton.</p>', '12'),
(56, 'Men\'s polo shirt', '25.99', '100', '1598631382_95362861_0857_2.jpg', '1598631382_95362861_0857_1.jpg', '<p>100% cotton polo shirt</p>\r\n<ul class=\"tox-checklist\">\r\n<li>contrasting button closure</li>\r\n<li>short sleeve chest pocket.</li>\r\n</ul>', '12'),
(57, 'Men\'s striped cotton pique polo shirt', '25.00', '100', '1598631691_95363141_0492_2.jpg', '1598631691_95363141_0492_1.jpg', '<p>Slim fit polo shirt 100% cotton. Model to</p>\r\n<ul class=\"tox-checklist\">\r\n<li>short lapel collar</li>\r\n<li>buttoned closure at the top and short sleeves.</li>\r\n</ul>', '12');

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `idSize` int(11) NOT NULL,
  `nameSize` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`idSize`, `nameSize`) VALUES
(1, 'S'),
(3, 'M'),
(4, 'L'),
(7, 'XL'),
(8, 'XXXL');

-- --------------------------------------------------------

--
-- Structure de la table `size_product`
--

CREATE TABLE `size_product` (
  `idPS` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `idSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `size_product`
--

INSERT INTO `size_product` (`idPS`, `idP`, `idSize`) VALUES
(40, 10, 1),
(41, 10, 3),
(42, 10, 4),
(71, 32, 1),
(72, 32, 3),
(73, 32, 4),
(74, 32, 7),
(75, 33, 1),
(76, 33, 4),
(77, 33, 7),
(78, 33, 8),
(79, 34, 1),
(80, 34, 3),
(81, 34, 4),
(82, 39, 1),
(83, 39, 3),
(84, 39, 4),
(85, 38, 1),
(86, 38, 3),
(87, 38, 4),
(88, 37, 1),
(89, 37, 3),
(90, 37, 4),
(91, 36, 1),
(92, 36, 3),
(93, 36, 4),
(94, 35, 1),
(95, 35, 3),
(96, 35, 4),
(97, 35, 7),
(98, 41, 1),
(99, 41, 3),
(100, 41, 4),
(101, 40, 1),
(102, 40, 3),
(103, 40, 4),
(104, 42, 1),
(105, 42, 3),
(106, 42, 4),
(107, 43, 1),
(108, 43, 3),
(109, 43, 4),
(110, 45, 1),
(111, 45, 3),
(112, 45, 4),
(122, 47, 1),
(123, 47, 3),
(124, 47, 4),
(125, 57, 1),
(126, 57, 3),
(127, 57, 4),
(128, 48, 1),
(129, 48, 3),
(130, 48, 4),
(131, 49, 1),
(132, 49, 3),
(133, 49, 4),
(134, 50, 1),
(135, 50, 3),
(136, 50, 4),
(137, 51, 1),
(138, 51, 3),
(139, 51, 4),
(140, 56, 1),
(141, 56, 3),
(142, 56, 4),
(143, 52, 1),
(144, 52, 3),
(145, 52, 4),
(146, 55, 1),
(147, 55, 3),
(148, 55, 4),
(149, 53, 1),
(150, 53, 3),
(151, 53, 4),
(152, 54, 1),
(153, 54, 3),
(154, 54, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idU` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `superAdmin` tinyint(4) NOT NULL,
  `ban` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idU`, `fullname`, `email`, `password`, `phone_number`, `admin`, `superAdmin`, `ban`) VALUES
(5, 'gitsalah', 'test', '0646274243', '064664872', 1, 1, 0),
(6, 'SALAHEDDINE BOUANBA', 'salah.bouanba2@gmail.com', '$2y$10$3v0J3nfBX65EoKQDjGVgG.v1GnABIOIKVN1HMk4cTXaQCnohVuP5i', '0661263709', 0, 0, 0),
(7, 'test', 'hello@hello.com', '$2y$10$03XQMZrLQCfXMY6yia312.336DEjWm8NwSl32nucbQSDEkhGVLgfu', '0636382012', 0, 0, 0),
(11, 'mariem', 'mariem@eshop.com', '0646274243', '0646274243', 1, 0, 0),
(12, 'Hamza', 'hamza@gmail.com', '$2y$10$03XQMZrLQCfXMY6yia312.336DEjWm8NwSl32nucbQSDEkhGVLgfu', '0646275253', 0, 0, 0),
(13, 'mohamed', 'simo@gmail.com', '$2y$10$LiUhl5mr5x9jVS7YCLaUDe./tV33Y8S1WmT3LiGvEBfZhpr0igEnu', '0649118803', 0, 0, 0),
(14, 'simoo', 'simoo@gmail.com', '$2y$10$NG.cNPGxERT58pS/iQngTe4x0E0s4SqCE/fx9zU.GYKJzEj1LOowa', '0646274243', 0, 0, 0),
(15, 'yousef', 'youssef@gmail.com', '$2y$10$trA8VlRBGND9xFPEHn4xLOOYQ1h7KYgu/P1xWD6PwuKiqlQht9mJa', '0646274243', 0, 0, 0),
(16, 'SALAHEDDINE ', 'salah@salah.me', '$2y$10$m4AKaw9qhEG8v9d43DuxWeSFnKGSV9ti5hcE35THfxTX8vKwfa3WG', '0646274243', 0, 0, 0),
(17, 'salaheddine', 'gh@gh.com', '$2y$10$MJRFQiY0aL5nlrngFqSdh.IJVGwEHpPilOpZFLf2XHqOKOhbgjB/.', '0646274243', 0, 0, 0),
(18, 'imane', 'imane@gmail.com', '$2y$10$Cj5saRh2cuir1ClcsqqsOOa2DnuTNm/N.FG2QcMrfnHYJmOnGuBu.', '12356', 0, 0, 0),
(19, 'test', 'test@gmail.com', '$2y$10$4VJ74oOx4uNpoUva/y7Ky.kexVNJLgwppYmFef27mowlVzEdVS5OO', '12356', 0, 0, 0),
(20, 'Mariemff', 'mariem@gmail.com', '$2y$10$Xq6J5AWrStSjPBmolA7QruO3dNc2l/V9zg2UwmuUrRQeUlyPm1nta', '12356', 0, 0, 0),
(21, 'jade smith', 'test@smith.com', '$2y$10$GWlKBXv6n5TadPcEljM9WeXlTTW4wD36c6bBPYxPikZydy5ql9Ebe', '+212649118803', 0, 0, 0),
(22, 'SALAHEDDINE BOUANBA', 'salahbouanba14@gmail.com', '$2y$10$t4i5/LrRd7iOmJ21azjrBew71dyCAFsV3P5OHK0/OS3loPlG0w/F.', '0649118803', 0, 0, 0),
(23, 'SALAHEDDINE BOUANBA', 'salahbouanba2@gmail.com', '$2y$10$GEQesSXO6er1fyb9MhcZBuN87NSL0ApYrqksV6K9y7IcRCPGqNWBK', '+212649118803', 0, 0, 0),
(24, 'Dounia elhadki', 'Dounia@gmail.com', '$2y$10$lGvlSzQ2XukVwaT4P7gdrOaPteiM4n4S0Ed6opKi37nWFc7dKIJbu', '0654345676', 0, 0, 0),
(25, 'testadd ', 'ddd@gmail.com', '0646274243', '0621123454', 0, 0, 1),
(26, 'okmk k', 'salaj@gmail.com', '$2y$10$Y7JdzuobCfsOrBCic2ILiO08uwFlNgS4bSSseXI2ysV5dRcnjmDMy', '0644569834', 0, 0, 0),
(27, 'Malak El hadioui ', 'Malak@gmail.com', '$2y$10$wg60GWAZKRbE0dmwmGfXLenH6Uk4fyAjeYoQpVJAmFk2FzmWx895y', '0644569834', 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `fk_products` (`idP`),
  ADD KEY `fk_users` (`idU`),
  ADD KEY `fk_idSizeCart` (`idSize`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `mirrormx_customer_chat_data`
--
ALTER TABLE `mirrormx_customer_chat_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_type_ix` (`type`);

--
-- Index pour la table `mirrormx_customer_chat_department`
--
ALTER TABLE `mirrormx_customer_chat_department`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mirrormx_customer_chat_message`
--
ALTER TABLE `mirrormx_customer_chat_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_fk_talk` (`talk_id`),
  ADD KEY `message_from_id_ix` (`from_id`),
  ADD KEY `message_to_id_ix` (`to_id`),
  ADD KEY `message_datetime_ix` (`datetime`);

--
-- Index pour la table `mirrormx_customer_chat_shared_file`
--
ALTER TABLE `mirrormx_customer_chat_shared_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shared_file_fk_upload` (`upload_id`);

--
-- Index pour la table `mirrormx_customer_chat_talk`
--
ALTER TABLE `mirrormx_customer_chat_talk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talk_fk_department` (`department_id`),
  ADD KEY `talk_owner_ix` (`owner`),
  ADD KEY `talk_last_activity_ix` (`last_activity`);

--
-- Index pour la table `mirrormx_customer_chat_upload`
--
ALTER TABLE `mirrormx_customer_chat_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upload_fk_message` (`message_id`);

--
-- Index pour la table `mirrormx_customer_chat_user`
--
ALTER TABLE `mirrormx_customer_chat_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_mail_ix` (`mail`),
  ADD KEY `user_last_activity_ix` (`last_activity`);

--
-- Index pour la table `mirrormx_customer_chat_user_department`
--
ALTER TABLE `mirrormx_customer_chat_user_department`
  ADD UNIQUE KEY `user_department_uq` (`user_id`,`department_id`),
  ADD KEY `user_department_fk_department` (`department_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_user_order` (`idU`),
  ADD KEY `FK_IDPRODUCT` (`idP`);

--
-- Index pour la table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`idReset`),
  ADD KEY `FK_PASSWORD` (`idU`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `FK_Categorie` (`idC`);

--
-- Index pour la table `product_history`
--
ALTER TABLE `product_history`
  ADD PRIMARY KEY (`idP`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idSize`);

--
-- Index pour la table `size_product`
--
ALTER TABLE `size_product`
  ADD PRIMARY KEY (`idPS`),
  ADD KEY `fk_sizeproduct` (`idP`),
  ADD KEY `fk_addSizeproduct` (`idSize`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_data`
--
ALTER TABLE `mirrormx_customer_chat_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_department`
--
ALTER TABLE `mirrormx_customer_chat_department`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_message`
--
ALTER TABLE `mirrormx_customer_chat_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_shared_file`
--
ALTER TABLE `mirrormx_customer_chat_shared_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_talk`
--
ALTER TABLE `mirrormx_customer_chat_talk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_upload`
--
ALTER TABLE `mirrormx_customer_chat_upload`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mirrormx_customer_chat_user`
--
ALTER TABLE `mirrormx_customer_chat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `idReset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `product_history`
--
ALTER TABLE `product_history`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `idSize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `size_product`
--
ALTER TABLE `size_product`
  MODIFY `idPS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_idSizeCart` FOREIGN KEY (`idSize`) REFERENCES `size` (`idSize`),
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`idP`) REFERENCES `product` (`idP`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`idU`) REFERENCES `users` (`idU`);

--
-- Contraintes pour la table `mirrormx_customer_chat_message`
--
ALTER TABLE `mirrormx_customer_chat_message`
  ADD CONSTRAINT `message_fk_talk` FOREIGN KEY (`talk_id`) REFERENCES `mirrormx_customer_chat_talk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mirrormx_customer_chat_shared_file`
--
ALTER TABLE `mirrormx_customer_chat_shared_file`
  ADD CONSTRAINT `shared_file_fk_upload` FOREIGN KEY (`upload_id`) REFERENCES `mirrormx_customer_chat_upload` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mirrormx_customer_chat_talk`
--
ALTER TABLE `mirrormx_customer_chat_talk`
  ADD CONSTRAINT `talk_fk_department` FOREIGN KEY (`department_id`) REFERENCES `mirrormx_customer_chat_department` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `mirrormx_customer_chat_upload`
--
ALTER TABLE `mirrormx_customer_chat_upload`
  ADD CONSTRAINT `upload_fk_message` FOREIGN KEY (`message_id`) REFERENCES `mirrormx_customer_chat_message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mirrormx_customer_chat_user_department`
--
ALTER TABLE `mirrormx_customer_chat_user_department`
  ADD CONSTRAINT `user_department_fk_department` FOREIGN KEY (`department_id`) REFERENCES `mirrormx_customer_chat_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_department_fk_user` FOREIGN KEY (`user_id`) REFERENCES `mirrormx_customer_chat_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_IDPRODUCT` FOREIGN KEY (`idP`) REFERENCES `product_history` (`idP`),
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`idU`) REFERENCES `users` (`idU`);

--
-- Contraintes pour la table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `FK_PASSWORD` FOREIGN KEY (`idU`) REFERENCES `users` (`idU`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Categorie` FOREIGN KEY (`idC`) REFERENCES `category` (`idC`);

--
-- Contraintes pour la table `size_product`
--
ALTER TABLE `size_product`
  ADD CONSTRAINT `fk_addSizeproduct` FOREIGN KEY (`idSize`) REFERENCES `size` (`idSize`),
  ADD CONSTRAINT `fk_sizeproduct` FOREIGN KEY (`idP`) REFERENCES `product` (`idP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

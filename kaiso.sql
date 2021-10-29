-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Out-2021 às 18:36
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kaiso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `city` varchar(75) DEFAULT NULL,
  `complement` varchar(75) DEFAULT NULL,
  `post_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `address`
--

INSERT INTO `address` (`id`, `name`, `client_id`, `address`, `number`, `city`, `complement`, `post_code`) VALUES
(1, 'Casa', 1, 'Rua das Capivaras', '42', 'Hel Dourado', 'Toca', '44357500'),
(2, 'Casa 2', 1, 'Rua das Cumprida', '42', 'Hel Dourado', 'casa', '11111111'),
(3, 'Trampo 2', 1, 'AV. Capirara', '7070', 'Feira grande', 'covil', '00000000'),
(4, 'Casa', 3, 'guistola ', '55', 'aveiro', 'AP', ' 3750-015'),
(5, 'Predio', 1, 'baguim monte', '47', 'porto', 'casa', '4435750'),
(6, 'Trampo 2', 1, 'El Dourado 4', '47', 'London', 'arvore', ' 3750020'),
(7, 'Work', 1, 'rua das capivaras', '42', 'amazona', 'lago', '70707070'),
(8, '', 1, 'alcafaz', '', 'aveiro', '', '3750011'),
(9, '', 1, '', '', '', '', ''),
(10, '', 1, 'açores', '', 'guarda', '', '3570001'),
(11, '', 4, '', '', '', '', ''),
(12, '', 4, '', '', 'a', '', 'a'),
(13, '', 4, 'El Dourado 3', '55', '11111', '', ' 3750020'),
(14, '', 1, '1000-090 Lisboa, Portugal', '0', '1000-090 Lisboa, Portugal', '', '1000-090 Lisboa, Portugal'),
(15, '', 1, 'Av. Casal Ribeiro 14, ', '0', 'Lisboa', '', '1000-090');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `photo` varchar(75) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `photo`, `email`) VALUES
(1, 'Bruno', '3c78e3ac0a533da1236c3cf177ddd784', 'kaiso.png', 'kaiso_admin@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(66, 'destaque', 'destaque'),
(61, 'Pratos quentes', 'pratos-quentes'),
(60, 'FusÃ£o', 'fusao'),
(59, 'Entradas', 'entradas'),
(58, 'Tatakis', 'tatakis'),
(57, 'Hossomakis', 'hossomakis'),
(56, 'Hot roll', 'hot-roll'),
(55, 'Jhous / Gunkan', 'jhous-gunkan'),
(54, 'Temakis', 'temakis'),
(53, 'Sashimis', 'sashimis'),
(52, 'Menu', 'menu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `last_name` varchar(75) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `photo` varchar(75) DEFAULT NULL,
  `data_register` varchar(16) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `post_code` varchar(8) DEFAULT NULL,
  `number` varchar(12) DEFAULT NULL,
  `distance` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `name`, `last_name`, `email`, `phone`, `whatsapp`, `password`, `photo`, `data_register`, `status`, `address`, `provincia`, `post_code`, `number`, `distance`) VALUES
(1, 'Bruno ', 'Vieira', 'br.rafael@outlook.com', '82999776698', '82999776698', '3c78e3ac0a533da1236c3cf177ddd784', 'brc.png', '2020-12-02', 1, 'Av. Casal Ribeiro 14, ', 'Lisboa', '1000-090', '55', '3589'),
(3, 'Bruno ', 'GMAIL', 'brunnocriacoes@gmail.com', '', '', '3c78e3ac0a533da1236c3cf177ddd784', NULL, '2020-12-11', NULL, '', '', '', '', NULL),
(4, 'Bruno 2', NULL, 'bruno2@gmail.com', NULL, NULL, '3c78e3ac0a533da1236c3cf177ddd784', NULL, '2021-03-20', NULL, 'R. da Amargura', 'Portalegre', '7300-126', NULL, '227635'),
(5, 'Bruno 3', NULL, 'bruno3@gmail.com', NULL, NULL, '3c78e3ac0a533da1236c3cf177ddd784', NULL, '2021-03-20', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Bruno 4', NULL, 'bruno4@gmail.com', NULL, NULL, '3c78e3ac0a533da1236c3cf177ddd784', NULL, '2021-03-20', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(75) DEFAULT NULL,
  `money` double DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `money`, `percentage`) VALUES
(3, '11111111111', 3.7, 1.5),
(4, '#teste', 50, 1),
(5, 'CARNAVAL', 3.5, 0),
(6, 'TUDO', 3.5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(75) DEFAULT NULL,
  `post_code` varchar(75) DEFAULT NULL,
  `type` varchar(75) DEFAULT NULL,
  `money` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `delivery`
--

INSERT INTO `delivery` (`id`, `address`, `post_code`, `type`, `money`) VALUES
(5, '10000', NULL, '', 5.5),
(6, '20000', NULL, '', 12.5),
(7, '60000', NULL, '', 20.5),
(9, '15000', NULL, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_ref` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `order_ref`, `product_id`, `quantity`) VALUES
(32, '73ca6f95b5dafa8489947641e9ccaf98', 189, 1),
(23, '59b5ad356b5b234b19fce246de73cb26', 189, 1),
(31, 'cfb33f225c4240e210c086d5a62f1750', 202, 7),
(30, 'cfb33f225c4240e210c086d5a62f1750', 203, 7),
(20, 'cfb33f225c4240e210c086d5a62f1750', 188, 7),
(19, 'cfb33f225c4240e210c086d5a62f1750', 189, 1),
(15, 'cfb33f225c4240e210c086d5a62f1750', 222, 3),
(18, 'cfb33f225c4240e210c086d5a62f1750', 193, 1),
(37, '9ab1f1ad98a99b501fa24938e9bcceeb', 189, 7),
(34, '73ca6f95b5dafa8489947641e9ccaf98', 191, 1),
(36, '2400ddfb100221e72bddc08e721d0f77', 192, 3),
(38, '344ec06d29acd4d432237e4c4db28470', 189, 1),
(39, '0033fb127b40bdfe239ea703228fbe5b', 189, 1),
(40, '0033fb127b40bdfe239ea703228fbe5b', 188, 2),
(41, 'e2c7e07d4272b42a2d329f100f99bc64', 189, 1),
(42, '68b7eb445779e6b1159acd97de7f44ba', 189, 1),
(43, 'ab20aa286f6662f9628a42010aea3c86', 189, 1),
(44, 'e196fac2ecea72c15df91624d92eacf0', 189, 1),
(45, '2633a1d4d4b7523041cc5626e756ff59', 189, 1),
(46, '9eb8772f5e06cda21d4dd79e549c57a0', 189, 1),
(47, '2732a70bb645f68f5efc5d612417d0b9', 190, 1),
(48, '2732a70bb645f68f5efc5d612417d0b9', 189, 1),
(49, 'ee2a4566726d7ba13ef4d6d52f4675dc', 189, 1),
(50, '328ebb3014ec63c128560c897baceb7a', 189, 1),
(51, '2b75842b4bdd5cf14ec66251e85fee3f', 189, 1),
(52, '635ed9c9771ec7a630388d45ec27f395', 189, 1),
(53, '81b073d55ec0977dfe506f7f70c28798', 189, 1),
(54, 'ce74b22e64fdf8a6348c22c9142ead07', 189, 1),
(55, '06aa8cbb5cacfbe158c05014179597b5', 189, 1),
(56, '4f6586eaace6392c0b7dfadbae27e28f', 189, 1),
(57, '4f6586eaace6392c0b7dfadbae27e28f', 188, 1),
(58, '4f6586eaace6392c0b7dfadbae27e28f', 224, 1),
(59, '4e1f7b39eb41f1af1fa3ffb96100f3c1', 188, 1),
(60, '4e1f7b39eb41f1af1fa3ffb96100f3c1', 222, 1),
(61, '4e1f7b39eb41f1af1fa3ffb96100f3c1', 189, 1),
(62, '4e1f7b39eb41f1af1fa3ffb96100f3c1', 192, 1),
(63, '42c3a1f309a18e08c0456e737261e99a', 189, 1),
(64, '1fdeeabfab80d414ae5050e46516764b', 188, 1),
(65, 'c6d4b49b0880f4b3c88a5f225684f4bb', 188, 1),
(66, 'f569d24aa8305981c7b3fed8a2fa92a3', 188, 1),
(67, '44aed24a082be11431f1768da9f388fd', 189, 5),
(68, '22b0ce803ce328ff29b9792923c319b0', 193, 4),
(69, '22b0ce803ce328ff29b9792923c319b0', 189, 1),
(70, '4e90c9cf7f7a87cd6a38452b409bcf89', 189, 1),
(71, '4e90c9cf7f7a87cd6a38452b409bcf89', 188, 1),
(72, '4e90c9cf7f7a87cd6a38452b409bcf89', 190, 1),
(73, 'bfd8c49d508da243c1fe67a3844a78b8', 189, 1),
(74, 'da6f22c7fd403e760a2c1e35b7a77d80', 188, 1),
(75, '52739b5c28a8711626e955fdaccc9504', 189, 1),
(76, 'f202734bae2533ba7d8ff081cb2e46b6', 189, 1),
(77, 'c19fc118644fba5c302b5a948a433c6b', 189, 1),
(78, '2f1bc94629e4138a1bae6f5756349c14', 189, 1),
(79, '01acc12deadcb1a01a098422a858048c', 190, 1),
(80, '93a1cae8dcaf4e06ae7a1476a5f8639b', 188, 1),
(81, '077a1eb1779ee84ab8f9daa54d2ec3c7', 188, 1),
(82, '963147b6d803c84baf66ccdcf169b1d3', 188, 1),
(83, '65b637a269cadc1468e4e93bf7825bc9', 188, 1),
(84, 'ec910561e23200928f1d94b0f6a86a16', 188, 1),
(85, 'e015c366fcbd109814f178d323e7923a', 189, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `meta`
--

DROP TABLE IF EXISTS `meta`;
CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(255) DEFAULT NULL,
  `relation` varchar(75) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=275 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `meta`
--

INSERT INTO `meta` (`id`, `post_id`, `relation`, `content`) VALUES
(1, '38', 'TYPE_SEND', 'takeway'),
(2, '38', 'ADDRESS_SEND', 'Rua das Capivaras 3'),
(3, '41', 'TYPE_SEND', 'takeway'),
(4, '41', 'ADDRESS_SEND', 'Rua das Capivaras'),
(5, '42', 'ADDRESS_SEND', 'guistola 3750015 aveiro 215.07'),
(8, 'cfb33f225c4240e210c086d5a62f1750', 'COUPON', '11111111111'),
(6, '42', 'TYPE_SEND', 'takeway'),
(7, '73ca6f95b5dafa8489947641e9ccaf98', 'COUPON', '11111111111'),
(9, '42', 'FEE_FRETE', '0'),
(10, '42', 'FEE_FRETE_HTML', '00,00'),
(11, '43', 'FEE_FRETE', '3.5'),
(12, '43', 'FEE_FRETE_HTML', '3,50'),
(13, '43', 'TYPE_SEND', 'delivery'),
(14, '73ca6f95b5dafa8489947641e9ccaf98', 'PAY_VALUE', '150,00'),
(15, '73ca6f95b5dafa8489947641e9ccaf98', 'OS_OBS', 'perto da lavanderia '),
(16, '73ca6f95b5dafa8489947641e9ccaf98', 'PAY_TYPE', 'money'),
(17, '44', 'FEE_FRETE', '0'),
(18, '44', 'FEE_FRETE_HTML', '00,00'),
(19, '44', 'TYPE_SEND', 'takeway'),
(20, '44', 'ADDRESS_SEND', '3750-015'),
(21, '2400ddfb100221e72bddc08e721d0f77', 'PAY_VALUE', '150,00'),
(22, '2400ddfb100221e72bddc08e721d0f77', 'OS_OBS', ''),
(23, '2400ddfb100221e72bddc08e721d0f77', 'PAY_TYPE', 'money'),
(24, '45', 'FEE_FRETE', '3.5'),
(25, '45', 'FEE_FRETE_HTML', '3,50'),
(26, '45', 'TYPE_SEND', 'delivery'),
(27, '46', 'FEE_FRETE', '0'),
(28, '46', 'FEE_FRETE_HTML', '00,00'),
(29, '46', 'TYPE_SEND', 'takeway'),
(30, '46', 'ADDRESS_SEND', 'baguim monte - porto - 4435750'),
(31, '0033fb127b40bdfe239ea703228fbe5b', 'ADDRESS_DATA', '{\"zip_code\":\"4435750\",\"name\":\"Predio\",\"logadouro\":\"baguim monte\",\"number\":\"47\",\"complement\":\"casa\",\"cyte\":\"porto\"}'),
(32, '0033fb127b40bdfe239ea703228fbe5b', 'PAY_VALUE', '11111111'),
(33, '0033fb127b40bdfe239ea703228fbe5b', 'OS_OBS', ''),
(34, '0033fb127b40bdfe239ea703228fbe5b', 'PAY_TYPE', 'mbway_create'),
(35, '47', 'FEE_FRETE', '0'),
(36, '47', 'FEE_FRETE_HTML', '00,00'),
(37, '47', 'TYPE_SEND', 'takeway'),
(38, '48', 'FEE_FRETE', '0'),
(39, '48', 'FEE_FRETE_HTML', '00,00'),
(40, '48', 'TYPE_SEND', 'takeway'),
(41, '49', 'FEE_FRETE', '0'),
(42, '49', 'FEE_FRETE_HTML', '00,00'),
(43, '49', 'TYPE_SEND', 'takeway'),
(44, 'ab20aa286f6662f9628a42010aea3c86', 'ADDRESS_DATA', '{\"zip_code\":\"3750011\",\"name\":\"\",\"logadouro\":\"alcafaz\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"aveiro\"}'),
(45, '50', 'ADDRESS_SEND', 'alcafaz - aveiro - 3750011'),
(46, '50', 'FEE_FRETE', '0'),
(47, '50', 'FEE_FRETE_HTML', '00,00'),
(48, '50', 'TYPE_SEND', 'takeway'),
(49, 'ab20aa286f6662f9628a42010aea3c86', 'PAY_VALUE', '999999999'),
(50, 'ab20aa286f6662f9628a42010aea3c86', 'OS_OBS', ''),
(51, 'ab20aa286f6662f9628a42010aea3c86', 'PAY_TYPE', 'multibanco_create'),
(52, '51', 'FEE_FRETE', '0'),
(53, '51', 'FEE_FRETE_HTML', '00,00'),
(54, '51', 'TYPE_SEND', 'takeway'),
(55, 'e196fac2ecea72c15df91624d92eacf0', 'PAY_VALUE', '915184288'),
(56, 'e196fac2ecea72c15df91624d92eacf0', 'OS_OBS', ''),
(57, 'e196fac2ecea72c15df91624d92eacf0', 'PAY_TYPE', 'mbway_create'),
(58, 'e196fac2ecea72c15df91624d92eacf0', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(59, '52', 'FEE_FRETE', '0'),
(60, '52', 'FEE_FRETE_HTML', '00,00'),
(61, '52', 'TYPE_SEND', 'takeway'),
(62, '2633a1d4d4b7523041cc5626e756ff59', 'PAY_VALUE', '915184288'),
(63, '2633a1d4d4b7523041cc5626e756ff59', 'OS_OBS', ''),
(64, '2633a1d4d4b7523041cc5626e756ff59', 'PAY_TYPE', 'multibanco_create'),
(65, '2633a1d4d4b7523041cc5626e756ff59', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(66, '53', 'FEE_FRETE', '0'),
(67, '53', 'FEE_FRETE_HTML', '00,00'),
(68, '53', 'TYPE_SEND', 'takeway'),
(69, '9eb8772f5e06cda21d4dd79e549c57a0', 'PAY_VALUE', '915184288'),
(70, '9eb8772f5e06cda21d4dd79e549c57a0', 'OS_OBS', ''),
(71, '9eb8772f5e06cda21d4dd79e549c57a0', 'PAY_TYPE', 'multibanco_create'),
(72, '9eb8772f5e06cda21d4dd79e549c57a0', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(73, '54', 'FEE_FRETE', '0'),
(74, '54', 'FEE_FRETE_HTML', '00,00'),
(75, '54', 'TYPE_SEND', 'takeway'),
(76, '2732a70bb645f68f5efc5d612417d0b9', 'PAY_VALUE', '915184288'),
(77, '2732a70bb645f68f5efc5d612417d0b9', 'OS_OBS', ''),
(78, '2732a70bb645f68f5efc5d612417d0b9', 'PAY_TYPE', 'mbway_create'),
(79, '2732a70bb645f68f5efc5d612417d0b9', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(80, '55', 'FEE_FRETE', '0'),
(81, '55', 'FEE_FRETE_HTML', '00,00'),
(82, '55', 'TYPE_SEND', 'takeway'),
(83, 'ee2a4566726d7ba13ef4d6d52f4675dc', 'PAY_VALUE', '915184288'),
(84, 'ee2a4566726d7ba13ef4d6d52f4675dc', 'OS_OBS', ''),
(85, 'ee2a4566726d7ba13ef4d6d52f4675dc', 'PAY_TYPE', 'multibanco_create'),
(86, 'ee2a4566726d7ba13ef4d6d52f4675dc', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(87, '56', 'FEE_FRETE', '0'),
(88, '56', 'FEE_FRETE_HTML', '00,00'),
(89, '56', 'TYPE_SEND', 'takeway'),
(90, '328ebb3014ec63c128560c897baceb7a', 'PAY_VALUE', '915184288'),
(91, '328ebb3014ec63c128560c897baceb7a', 'OS_OBS', ''),
(92, '328ebb3014ec63c128560c897baceb7a', 'PAY_TYPE', 'mbway_create'),
(93, '328ebb3014ec63c128560c897baceb7a', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(94, '57', 'FEE_FRETE', '0'),
(95, '57', 'FEE_FRETE_HTML', '00,00'),
(96, '57', 'TYPE_SEND', 'takeway'),
(97, '58', 'FEE_FRETE', '0'),
(98, '58', 'FEE_FRETE_HTML', '00,00'),
(99, '58', 'TYPE_SEND', 'takeway'),
(100, '59', 'FEE_FRETE', '0'),
(101, '59', 'FEE_FRETE_HTML', '00,00'),
(102, '59', 'TYPE_SEND', 'takeway'),
(103, '60', 'FEE_FRETE', '0'),
(104, '60', 'FEE_FRETE_HTML', '00,00'),
(105, '60', 'TYPE_SEND', 'takeway'),
(106, '61', 'FEE_FRETE', '0'),
(107, '61', 'FEE_FRETE_HTML', '00,00'),
(108, '61', 'TYPE_SEND', 'takeway'),
(109, '635ed9c9771ec7a630388d45ec27f395', 'PAY_VALUE', 'zzz'),
(110, '635ed9c9771ec7a630388d45ec27f395', 'OS_OBS', ''),
(111, '635ed9c9771ec7a630388d45ec27f395', 'PAY_TYPE', 'multibanco_create'),
(112, '635ed9c9771ec7a630388d45ec27f395', 'ADDRESS_DATA', '{\"zip_code\":\"0000\",\"name\":\"casa\",\"logadouro\":\"rua das capiras\",\"number\":\"55\",\"complement\":\"casa\",\"cyte\":\"555\"}'),
(113, '62', 'FEE_FRETE', '0'),
(114, '62', 'FEE_FRETE_HTML', '00,00'),
(115, '62', 'TYPE_SEND', 'takeway'),
(116, '81b073d55ec0977dfe506f7f70c28798', 'ADDRESS_DATA', '{\"logadouro\":\"miragaia\",\"cyte\":\"aveiro\",\"zip_code\":\"3750055\",\"distance\":21.3}'),
(117, '62', 'ADDRESS_SEND', 'miragaia - aveiro - 3750055'),
(118, '63', 'FEE_FRETE', '0'),
(119, '63', 'FEE_FRETE_HTML', '00,00'),
(120, '63', 'TYPE_SEND', 'takeway'),
(121, 'ce74b22e64fdf8a6348c22c9142ead07', 'ADDRESS_DATA', '{\"logadouro\":\"quinta silveira\",\"cyte\":\"braganÃ§a\",\"zip_code\":\"5160002\",\"distance\":39.1}'),
(122, '63', 'ADDRESS_SEND', 'quinta silveira - braganÃ§a - 5160002'),
(123, '64', 'FEE_FRETE', '0'),
(124, '64', 'FEE_FRETE_HTML', '00,00'),
(125, '64', 'TYPE_SEND', 'takeway'),
(126, '2732a70bb645f68f5efc5d612417d0b9', 'COUPON', '#teste'),
(127, '06aa8cbb5cacfbe158c05014179597b5', 'COUPON', 'CARNAVAL'),
(128, '06aa8cbb5cacfbe158c05014179597b5', 'PAY_VALUE', '150.00'),
(129, '06aa8cbb5cacfbe158c05014179597b5', 'OS_OBS', ''),
(130, '06aa8cbb5cacfbe158c05014179597b5', 'PAY_TYPE', 'money'),
(131, '06aa8cbb5cacfbe158c05014179597b5', 'ADDRESS_DATA', '{\"zip_code\":\"\",\"name\":\"\",\"logadouro\":\"\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"\"}'),
(132, 'ce74b22e64fdf8a6348c22c9142ead07', 'COUPON', '11111111111'),
(133, '9eb8772f5e06cda21d4dd79e549c57a0', 'COUPON', '11111111111'),
(134, '40', 'FEE_FRETE', '0'),
(135, '40', 'FEE_FRETE_HTML', '00,00'),
(136, '40', 'TYPE_SEND', 'takeway'),
(137, '39', 'FEE_FRETE', '0'),
(138, '39', 'FEE_FRETE_HTML', '00,00'),
(139, '39', 'TYPE_SEND', 'takeway'),
(140, '65', 'FEE_FRETE', '3.5'),
(141, '65', 'FEE_FRETE_HTML', '3,50'),
(142, '65', 'TYPE_SEND', 'delivery'),
(143, '4f6586eaace6392c0b7dfadbae27e28f', 'ADDRESS_DATA', '{\"logadouro\":\"aveiro\",\"cyte\":\"aveiro\",\"zip_code\":\"3800357\",\"distance\":14.5}'),
(144, '65', 'ADDRESS_SEND', 'aveiro - aveiro - 3800357'),
(145, '4f6586eaace6392c0b7dfadbae27e28f', 'COUPON', '11111111111'),
(146, '66', 'FEE_FRETE', '3.5'),
(147, '66', 'FEE_FRETE_HTML', '3,50'),
(148, '66', 'TYPE_SEND', 'delivery'),
(149, '4e1f7b39eb41f1af1fa3ffb96100f3c1', 'ADDRESS_DATA', '{\"logadouro\":\"sÃ£o marcos\",\"cyte\":\"lisboa\",\"zip_code\":\"2735521\",\"distance\":11.1}'),
(150, '66', 'ADDRESS_SEND', 'sÃ£o marcos - lisboa - 2735521'),
(151, '42c3a1f309a18e08c0456e737261e99a', 'ADDRESS_DATA', '{\"zip_code\":\"2665-319\",\"name\":\"\",\"logadouro\":\"R. Moinhos da Casela 2\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"Milharado\"}'),
(152, '67', 'FEE_FRETE', '12.5'),
(153, '67', 'FEE_FRETE_HTML', '12,50'),
(154, '67', 'TYPE_SEND', 'delivery'),
(155, '67', 'ADDRESS_SEND', 'R. Moinhos da Casela 2, 2665-319 Milharado, Portugal'),
(156, '42c3a1f309a18e08c0456e737261e99a', 'PAY_VALUE', '100.00'),
(157, '42c3a1f309a18e08c0456e737261e99a', 'OS_OBS', ''),
(158, '42c3a1f309a18e08c0456e737261e99a', 'PAY_TYPE', 'money'),
(159, '1fdeeabfab80d414ae5050e46516764b', 'ADDRESS_DATA', '{\"zip_code\":\"2665-319\",\"name\":\"\",\"logadouro\":\"R. Moinhos da Casela 2\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"Milharado\"}'),
(160, '68', 'ADDRESS_SEND', 'R. Moinhos da Casela 2, 2665-319 Milharado, Portugal'),
(161, '68', 'FEE_FRETE', '12.5'),
(162, '68', 'FEE_FRETE_HTML', '12,50'),
(163, '68', 'TYPE_SEND', 'delivery'),
(164, '1fdeeabfab80d414ae5050e46516764b', 'PAY_VALUE', '150,00'),
(165, '1fdeeabfab80d414ae5050e46516764b', 'OS_OBS', ''),
(166, '1fdeeabfab80d414ae5050e46516764b', 'PAY_TYPE', 'money'),
(167, 'c6d4b49b0880f4b3c88a5f225684f4bb', 'ADDRESS_DATA', '{\"zip_code\":\"2665-319\",\"name\":\"\",\"logadouro\":\"R. Moinhos da Casela 2\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"Milharado\"}'),
(168, '69', 'ADDRESS_SEND', 'R. Moinhos da Casela 2, 2665-319 Milharado, Portugal'),
(169, '69', 'FEE_FRETE', '12.5'),
(170, '69', 'FEE_FRETE_HTML', '12,50'),
(171, '69', 'TYPE_SEND', 'delivery'),
(172, 'c6d4b49b0880f4b3c88a5f225684f4bb', 'PAY_VALUE', '150'),
(173, 'c6d4b49b0880f4b3c88a5f225684f4bb', 'OS_OBS', ''),
(174, 'c6d4b49b0880f4b3c88a5f225684f4bb', 'PAY_TYPE', 'money'),
(175, 'f569d24aa8305981c7b3fed8a2fa92a3', 'ADDRESS_DATA', '{\"zip_code\":\"2665-319\",\"name\":\"\",\"logadouro\":\"R. Moinhos da Casela 2\",\"number\":\"\",\"complement\":\"\",\"cyte\":\"Milharado\"}'),
(176, 'f569d24aa8305981c7b3fed8a2fa92a3', 'ADDRESS_DISTANCE', '31537'),
(177, '70', 'ADDRESS_SEND', 'R. Moinhos da Casela 2, 2665-319 Milharado, Portugal'),
(178, '70', 'FEE_FRETE', '20.5'),
(179, '70', 'FEE_FRETE_HTML', '20,50'),
(180, '70', 'TYPE_SEND', 'delivery'),
(181, 'f569d24aa8305981c7b3fed8a2fa92a3', 'PAY_VALUE', '200'),
(182, 'f569d24aa8305981c7b3fed8a2fa92a3', 'OS_OBS', ''),
(183, 'f569d24aa8305981c7b3fed8a2fa92a3', 'PAY_TYPE', 'money'),
(184, '71', 'FEE_FRETE', '5.5'),
(185, '71', 'FEE_FRETE_HTML', '5,50'),
(186, '71', 'TYPE_SEND', 'delivery'),
(187, '44aed24a082be11431f1768da9f388fd', 'ADDRESS_DATA', '{\"zip_code\":null,\"name\":null,\"logadouro\":null,\"number\":\"55\",\"complement\":null,\"cyte\":null}'),
(188, '44aed24a082be11431f1768da9f388fd', 'ADDRESS_DISTANCE', '1894'),
(189, '44aed24a082be11431f1768da9f388fd', 'PAY_VALUE', '915184288'),
(190, '44aed24a082be11431f1768da9f388fd', 'OS_OBS', ''),
(191, '44aed24a082be11431f1768da9f388fd', 'PAY_TYPE', 'mbway_create'),
(192, '72', 'FEE_FRETE', '12.5'),
(193, '72', 'FEE_FRETE_HTML', '12,50'),
(194, '72', 'TYPE_SEND', 'delivery'),
(195, '73', 'FEE_FRETE', '12.5'),
(196, '73', 'FEE_FRETE_HTML', '12,50'),
(197, '73', 'TYPE_SEND', 'delivery'),
(198, '74', 'FEE_FRETE', '12.5'),
(199, '74', 'FEE_FRETE_HTML', '12,50'),
(200, '74', 'TYPE_SEND', 'delivery'),
(201, '75', 'FEE_FRETE', '5.5'),
(202, '75', 'FEE_FRETE_HTML', '5,50'),
(203, '75', 'TYPE_SEND', 'delivery'),
(204, 'da6f22c7fd403e760a2c1e35b7a77d80', 'ADDRESS_DATA', '{\"address\":\"Av. da Igreja 55, 1700-188 Lisboa, Portugal\",\"distance\":1894,\"code\":\"OK\"}'),
(205, 'da6f22c7fd403e760a2c1e35b7a77d80', 'ADDRESS_DISTANCE', '1894'),
(206, '75', 'ADDRESS_SEND', 'Av. da Igreja 55, 1700-188 Lisboa, Portugal'),
(207, '76', 'FEE_FRETE', '12.5'),
(208, '76', 'FEE_FRETE_HTML', '12,50'),
(209, '76', 'TYPE_SEND', 'delivery'),
(210, '77', 'FEE_FRETE', '12.5'),
(211, '77', 'FEE_FRETE_HTML', '12,50'),
(212, '77', 'TYPE_SEND', 'delivery'),
(213, '78', 'FEE_FRETE', '12.5'),
(214, '78', 'FEE_FRETE_HTML', '12,50'),
(215, '78', 'TYPE_SEND', 'delivery'),
(216, '79', 'FEE_FRETE', '0'),
(217, '79', 'FEE_FRETE_HTML', '00,00'),
(218, '79', 'TYPE_SEND', 'takeway'),
(219, '2f1bc94629e4138a1bae6f5756349c14', 'PAY_VALUE', '111'),
(220, '2f1bc94629e4138a1bae6f5756349c14', 'OS_OBS', ''),
(221, '2f1bc94629e4138a1bae6f5756349c14', 'PAY_TYPE', 'money'),
(222, '2f1bc94629e4138a1bae6f5756349c14', 'ADDRESS_DATA', '{\"address\":\"R. da Amargura, 7300-126 Portalegre, Portugal\",\"distance\":227635,\"code\":\"OK\",\"data\":{\"post_code\":\"7300-126\",\"address\":\"R. da Amargura\",\"provincia\":\"Portalegre\"}}'),
(223, '2f1bc94629e4138a1bae6f5756349c14', 'ADDRESS_DISTANCE', '227635'),
(224, '79', 'ADDRESS_SEND', 'R. da Amargura, 7300-126 Portalegre, Portugal'),
(225, '2f1bc94629e4138a1bae6f5756349c14', 'COUPON', 'TUDO'),
(226, '80', 'FEE_FRETE', '12.5'),
(227, '80', 'FEE_FRETE_HTML', '12,50'),
(228, '80', 'TYPE_SEND', 'delivery'),
(229, '01acc12deadcb1a01a098422a858048c', 'PAY_VALUE', ''),
(230, '01acc12deadcb1a01a098422a858048c', 'OS_OBS', ''),
(231, '01acc12deadcb1a01a098422a858048c', 'PAY_TYPE', 'money'),
(232, '01acc12deadcb1a01a098422a858048c', 'ADDRESS_DATA', '{\"zip_code\":\"1700-188\",\"name\":\"\",\"logadouro\":\"Av. da Igreja 55-53\",\"number\":\"55\",\"complement\":\"\",\"cyte\":\"Lisboa\"}'),
(233, '81', 'FEE_FRETE', '0'),
(234, '81', 'FEE_FRETE_HTML', '00,00'),
(235, '81', 'TYPE_SEND', 'takeway'),
(236, '82', 'TYPE_SEND', 'delivery'),
(237, '82', 'FEE_FRETE', '12.5'),
(238, '82', 'FEE_FRETE_HTML', '12,50'),
(239, '077a1eb1779ee84ab8f9daa54d2ec3c7', 'PAY_VALUE', '999999999'),
(240, '077a1eb1779ee84ab8f9daa54d2ec3c7', 'OS_OBS', ''),
(241, '077a1eb1779ee84ab8f9daa54d2ec3c7', 'PAY_TYPE', 'multibanco_create'),
(242, '077a1eb1779ee84ab8f9daa54d2ec3c7', 'ADDRESS_DATA', '{\"zip_code\":\"1700-188\",\"name\":\"\",\"logadouro\":\"Av. da Igreja 55-53\",\"number\":\"55\",\"complement\":\"\",\"cyte\":\"Lisboa\"}'),
(243, '83', 'TYPE_SEND', 'delivery'),
(244, '83', 'FEE_FRETE', '5.5'),
(245, '83', 'FEE_FRETE_HTML', '5,50'),
(246, '963147b6d803c84baf66ccdcf169b1d3', 'ADDRESS_DATA', '{\"zip_code\":\"1000-090\",\"name\":\"\",\"logadouro\":\"Av. Casal Ribeiro 14\",\"number\":\"55\",\"complement\":\"\",\"cyte\":\"Lisboa\"}'),
(247, '963147b6d803c84baf66ccdcf169b1d3', 'ADDRESS_DISTANCE', '3597'),
(248, '83', 'ADDRESS_SEND', 'Av. da Igreja 55, 1700-188 Lisboa, Portugal'),
(249, '963147b6d803c84baf66ccdcf169b1d3', 'PAY_VALUE', ''),
(250, '963147b6d803c84baf66ccdcf169b1d3', 'OS_OBS', ''),
(251, '963147b6d803c84baf66ccdcf169b1d3', 'PAY_TYPE', 'money'),
(252, '84', 'TYPE_SEND', 'delivery'),
(253, '84', 'FEE_FRETE', '5.5'),
(254, '84', 'FEE_FRETE_HTML', '5,50'),
(255, '65b637a269cadc1468e4e93bf7825bc9', 'ADDRESS_DATA', '{\"zip_code\":\"1000-090\",\"name\":\"\",\"logadouro\":\"Av. Casal Ribeiro 14, \",\"number\":\"55\",\"complement\":\"\",\"cyte\":\"Lisboa\"}'),
(256, '65b637a269cadc1468e4e93bf7825bc9', 'ADDRESS_DISTANCE', '3589'),
(257, '65b637a269cadc1468e4e93bf7825bc9', 'PAY_VALUE', '11111111111111111111'),
(258, '65b637a269cadc1468e4e93bf7825bc9', 'OS_OBS', ''),
(259, '65b637a269cadc1468e4e93bf7825bc9', 'PAY_TYPE', 'multibanco_create'),
(260, '85', 'TYPE_SEND', 'delivery'),
(261, '85', 'FEE_FRETE', '0'),
(262, '85', 'FEE_FRETE_HTML', '0,00'),
(263, 'ec910561e23200928f1d94b0f6a86a16', 'ADDRESS_DATA', '{\"zip_code\":\"1000-090\",\"name\":\"\",\"logadouro\":\"Av. Casal Ribeiro 14, \",\"number\":\"55\",\"complement\":\"\",\"cyte\":\"Lisboa\"}'),
(264, 'ec910561e23200928f1d94b0f6a86a16', 'ADDRESS_DISTANCE', '3589'),
(265, 'ec910561e23200928f1d94b0f6a86a16', 'PAY_VALUE', '15'),
(266, 'ec910561e23200928f1d94b0f6a86a16', 'OS_OBS', ''),
(267, 'ec910561e23200928f1d94b0f6a86a16', 'PAY_TYPE', 'money'),
(268, '86', 'ADDRESS_SEND', 'Av. Casal Ribeiro 14, , 1000-090 Lisboa, Portugal'),
(269, '86', 'TYPE_SEND', 'takeway'),
(270, '86', 'FEE_FRETE', '0'),
(271, '86', 'FEE_FRETE_HTML', '00,00'),
(272, '87', 'TYPE_SEND', 'takeway'),
(273, '87', 'FEE_FRETE', '0'),
(274, '87', 'FEE_FRETE_HTML', '00,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `status` varchar(75) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `ref` varchar(255) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `order`
--

INSERT INTO `order` (`id`, `client_id`, `status`, `date_register`, `date_update`, `ref`, `total`) VALUES
(54, 1, 'finished', '2021-02-15', '2021-04-01', '2732a70bb645f68f5efc5d612417d0b9', 53.3),
(53, 1, 'finished', '2021-02-15', '2021-02-24', '9eb8772f5e06cda21d4dd79e549c57a0', 33.4),
(52, 1, 'waiting', '2021-02-15', '2021-02-24', '2633a1d4d4b7523041cc5626e756ff59', 33.4),
(51, 1, 'waiting', '2021-02-15', '2021-02-24', 'e196fac2ecea72c15df91624d92eacf0', 33.4),
(50, 1, 'waiting', '2021-02-09', '2021-02-15', 'ab20aa286f6662f9628a42010aea3c86', 33.4),
(49, 1, 'finished', '2021-02-09', '2021-02-24', '68b7eb445779e6b1159acd97de7f44ba', 33.4),
(48, 1, 'abandoned', '2021-02-09', '2021-02-09', 'e2c7e07d4272b42a2d329f100f99bc64', 33.4),
(47, 0, 'abandoned', '2021-02-08', '2021-02-09', '13f1a2ff77c63e3495aea4f60e43e8bb', 0),
(46, 1, 'finished', '2021-01-14', '2021-02-24', '0033fb127b40bdfe239ea703228fbe5b', 78.4),
(45, 1, 'abandoned', '2021-01-14', '2021-01-14', '344ec06d29acd4d432237e4c4db28470', 33.4),
(43, 0, 'finished', '2020-12-14', '2021-01-07', '9ab1f1ad98a99b501fa24938e9bcceeb', 233.8),
(42, 3, 'abandoned', '2020-12-11', '2021-01-06', '73ca6f95b5dafa8489947641e9ccaf98', 41.3),
(41, 1, 'abandoned', '2020-12-11', '2020-12-11', '59b5ad356b5b234b19fce246de73cb26', 33.4),
(40, 0, 'abandoned', '2020-12-11', '2021-02-24', '327fba6751d793f066eefb523a2145d6', 0),
(38, 0, 'canceled', '2020-12-09', '2020-12-16', 'cfb33f225c4240e210c086d5a62f1750', 428.1),
(39, 0, 'abandoned', '2020-12-10', '2021-02-24', '829d2279e6fc0250a9fbf15581d59693', 0),
(44, 3, 'waiting', '2021-01-06', '2021-01-07', '2400ddfb100221e72bddc08e721d0f77', 16.5),
(55, 1, 'waiting', '2021-02-16', '2021-02-16', 'ee2a4566726d7ba13ef4d6d52f4675dc', 33.4),
(56, 1, 'waiting', '2021-02-16', '2021-02-16', '328ebb3014ec63c128560c897baceb7a', 33.4),
(57, 0, 'abandoned', '2021-02-18', '2021-02-18', '1b120ba28c068bfc63f73ce6965c07a9', 0),
(58, 1, 'abandoned', '2021-02-18', '2021-02-19', '2b75842b4bdd5cf14ec66251e85fee3f', 33.4),
(59, 1, 'abandoned', '2021-02-19', '2021-02-19', 'c258e2e9a833c274c160fe76f5644e3e', 0),
(60, 1, 'abandoned', '2021-02-19', '2021-02-19', '252103897129b5b998dad73f2f51129a', 0),
(61, 1, 'waiting', '2021-02-19', '2021-02-19', '635ed9c9771ec7a630388d45ec27f395', 33.4),
(62, 1, 'abandoned', '2021-02-19', '2021-02-19', '81b073d55ec0977dfe506f7f70c28798', 33.4),
(63, 1, 'abandoned', '2021-02-19', '2021-02-19', 'ce74b22e64fdf8a6348c22c9142ead07', 33.4),
(64, 1, 'waiting', '2021-02-19', '2021-02-19', '06aa8cbb5cacfbe158c05014179597b5', 33.4),
(65, 1, 'abandoned', '2021-02-24', '2021-02-24', '4f6586eaace6392c0b7dfadbae27e28f', 78.8),
(66, 1, 'abandoned', '2021-02-24', '2021-02-25', '4e1f7b39eb41f1af1fa3ffb96100f3c1', 127.3),
(67, 1, 'abandoned', '2021-03-01', '2021-03-10', '42c3a1f309a18e08c0456e737261e99a', 33.4),
(68, 1, 'waiting', '2021-03-10', '2021-03-10', '1fdeeabfab80d414ae5050e46516764b', 22.5),
(69, 1, 'waiting', '2021-03-10', '2021-03-10', 'c6d4b49b0880f4b3c88a5f225684f4bb', 22.5),
(70, 1, 'waiting', '2021-03-10', '2021-03-10', 'f569d24aa8305981c7b3fed8a2fa92a3', 22.5),
(71, 1, 'waiting', '2021-03-20', '2021-03-20', '44aed24a082be11431f1768da9f388fd', 172.5),
(72, 1, 'abandoned', '2021-03-20', '2021-03-20', '22b0ce803ce328ff29b9792923c319b0', 57),
(73, 1, 'abandoned', '2021-03-20', '2021-03-20', '4e90c9cf7f7a87cd6a38452b409bcf89', 75.8),
(74, 1, 'abandoned', '2021-03-20', '2021-03-20', 'bfd8c49d508da243c1fe67a3844a78b8', 33.4),
(75, 0, 'abandoned', '2021-03-20', '2021-03-20', 'da6f22c7fd403e760a2c1e35b7a77d80', 22.5),
(76, 6, 'abandoned', '2021-03-20', '2021-03-20', '52739b5c28a8711626e955fdaccc9504', 33.4),
(77, 5, 'abandoned', '2021-03-20', '2021-03-20', 'f202734bae2533ba7d8ff081cb2e46b6', 33.4),
(78, 5, 'abandoned', '2021-03-20', '2021-03-20', 'c19fc118644fba5c302b5a948a433c6b', 33.4),
(79, 4, 'waiting', '2021-03-20', '2021-04-01', '2f1bc94629e4138a1bae6f5756349c14', 33.4),
(80, 1, 'waiting', '2021-04-08', '2021-04-08', '01acc12deadcb1a01a098422a858048c', 32.4),
(81, 1, 'abandoned', '2021-04-08', '2021-04-20', '93a1cae8dcaf4e06ae7a1476a5f8639b', 22.5),
(82, 1, 'waiting', '2021-05-01', '2021-05-04', '077a1eb1779ee84ab8f9daa54d2ec3c7', 35),
(83, 1, 'waiting', '2021-05-04', '2021-05-16', '963147b6d803c84baf66ccdcf169b1d3', 28),
(84, 1, 'waiting', '2021-05-16', '2021-05-16', '65b637a269cadc1468e4e93bf7825bc9', 28),
(85, 1, 'waiting', '2021-05-16', '2021-05-16', 'ec910561e23200928f1d94b0f6a86a16', 22.5),
(86, 1, 'abandoned', '2021-06-02', '2021-06-17', '843de6ca73585e18b429a70fd1e3073c', 0),
(87, 1, 'abandoned', '2021-10-28', '2021-10-28', 'e015c366fcbd109814f178d323e7923a', 66.8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_offer` double DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=230 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `description`, `price`, `price_offer`, `photo`) VALUES
(229, 'Bruno 2', 'bateco', '  ASDASD', 111, 111, '1623935839-whatsapp-image-2021-06-17-at-10.15.16.jpeg'),
(227, 'Marcelo', '1111111', '    kkkkkkkkkkkkkkkkkkk  wwww ', 111, 111, '1607454707-gravatar-brc.png'),
(225, '54 peças', '54-pecas', 'Menu delicioso de combinados. O Menu de 54 peças peças é composto por', 59.9, 59.9, 'menu-especial.jpg'),
(224, '18 peças', '18-pecas', 'Menu delicioso de combinados. O Menu de 18 peças peças é composto por', 22.9, 22.9, 'menu-solteiro.jpg'),
(223, '36 peças', '36-pecas', 'Menu delicioso de combinados. O Menu de 36 peças peças é composto por', 39.9, 39.9, 'menu-casal.jpg'),
(222, '74 Peças', '74-pecas', 'Menu delicioso de combinados. O Menu de 74 peças peças é composto por', 65.9, 65.9, 'menu-chef.jpg'),
(221, 'Yakimeshi vegetariano', 'yakimeshi-vegetariano', 'Gohan  Vegetais e Ovos', 6.9, 6.9, 'yakissoba-classico.jpg'),
(220, 'Yakimeshi camarão', 'yakimeshi-camarao', 'Gohan  Camarão Legumes e Ovos', 10.9, 10.9, 'yakissoba-classico.jpg'),
(219, 'Yakimeshi clássico', 'yakimeshi-classico', 'Gohan  carne frango legumes e ovos', 8.9, 8.9, 'yakissoba-classico.jpg'),
(218, 'Yakissoba camarão e legumes', 'yakissoba-camarao-e-legumes', '', 12.9, 12.9, 'yakissoba-carne.jpg'),
(217, 'Yakissoba de legumes', 'yakissoba-de-legumes', '', 7.5, 7.5, 'yakissoba-carne.jpg'),
(216, 'Yakissoba de carne', 'yakissoba-de-carne', ' frango e legumes', 9.9, 9.9, 'yakissoba-carne.jpg'),
(215, 'Tacos de salmão - 2 un', 'tacos-de-salmao-2-un', 'Taco de salmão cebolinha philadelphia e molho', 7.5, 7.5, 'tacos-salmao.jpg'),
(214, 'Tartá Especial', 'tarta-especial', 'Salmão em cubos com cebolinha  philadelphia e molho especial', 8.5, 8.5, 'tarta-especial.jpg'),
(213, 'Baterá de Salmão - 4un', 'batera-de-salmao-4un', 'Arroz prensado salmão philadelphia e cebolinha', 4.6, 4.6, 'batera-salmapo.jpg'),
(212, 'Salmão e Guacamole', 'salmao-e-guacamole', 'Salmão marinado em molho shoyu coberto por guacamole. ', 6.9, 6.9, 'salmao-guacamole.jpg'),
(210, 'Kani', 'kani', '', 4.25, 4.25, 'kani.jpg'),
(211, 'Atum burrata - 4 un', 'atum-burrata-4-un', 'Cubos de atum cobertos por queijo burrata molho pesto  farofinha crocante de pão.', 6.9, 6.9, 'Atum-burrata.jpg'),
(208, 'Gohan', 'gohan', '', 1.5, 1.5, 'gohan.jpg'),
(209, 'Sampiter ', 'sampiter', 'Peixe ao molho especial do Chef ', 13.9, 13.9, 'Sampiter-3.jpg'),
(207, 'Ceviche', 'ceviche', 'Peixe Branco ao molho de limão', 8.9, 8.9, 'ceviche.jpg'),
(206, 'Pipoca de Camarão', 'pipoca-de-camarao', 'Cubinhos de camarão tempura', 5.5, 5.5, 'pipoca-de-camarao.jpg'),
(205, 'Harumaki Vegetariano 2un', 'harumaki-vegetariano-2un', 'Crepe Chinês de Legumes', 1.95, 1.95, 'harumaki-camarao.jpg'),
(204, 'Harumaki Salmão - 2un', 'harumaki-salmao-2un', 'Crepe Chinês de salmão e Philadelphia', 2.3, 2.3, 'harumaki-camarao.jpg'),
(202, 'Gyosa - 2 un', 'gyosa-2-un', 'Frango e vegetais', 2.2, 2.2, 'gyosa.jpg'),
(203, 'Harumaki Camarão - 2 un', 'harumaki-camarao-2-un', 'Crepe chinés de camarão alho poró e Philadelphia ', 2.6, 2.6, 'harumaki-camarao.jpg'),
(201, 'Edamame ', 'edamame', 'Temperada com gengibre limão e flor de sal', 4.1, 4.1, 'edamame.jpg'),
(200, 'Sumono Especial', 'sumono-especial', 'Salada refrescante de salmão pepino e sésamo', 5.3, 5.3, 'sumono-especial.jpg'),
(197, '5 peças - Tataki salmão', '5-pecas-tataki-salmao', 'Salmão braseado com sésamo e cebolinha ', 6.9, 6.9, 'tataki-salmão.jpg'),
(198, 'Sopa Missoshiro', 'sopa-missoshiro', 'Missoshiro cebolinha e somen', 3, 3, 'sopa-sisoshiro.jpg'),
(196, '5 peças - Tataki atum', '5-pecas-tataki-atum', 'Atum braseado com sésamo e cebolinha', 7.9, 7.9, 'tataki-atum.jpg'),
(194, 'Salmão e camarão', 'salmao-e-camarao', '', 6.2, 6.2, 'Gunkan-braseado.jpg'),
(195, 'Massago', 'massago', '', 6.5, 6.5, 'menu-18.jpg'),
(192, 'Salmão', 'salmao', '', 5.5, 5.5, 'salmão.jpg'),
(193, 'Salmão braseado', 'salmao-braseado', '', 5.9, 5.9, 'Gunkan-braseado.jpg'),
(191, 'Uramaki - 8 peças', 'uramaki-8-pecas', 'Escolha o seu uramaki 8 peças!', 7.9, 7.9, 'uramaki.jpg'),
(228, 'Marcelo', 'bateco', '    1111111  ', 111, 111, '1623935813-whatsapp-image-2021-06-17-at-10.15.16.jpeg'),
(190, '18 peÃ§as', '18-pecas', ' Menu delicioso de combinados. O Menu de 18 peÃ§as Ã© composto por ', 19.9, 19.9, 'menu-18.jpg'),
(188, '25 peÃ§as', '25-pecas', '5 sashimis polvo \r\n5 sashimis de atum pesto \r\n5 sashimis salmÃ£o \r\n5 niguris polvo\r\n10 urmakis ebiten CalifÃ³rnia  \r\n5 urmakis com guacamole\r\n10 hots ebiten\r\n5 hots clÃ¡ssico', 22.5, 22.5, 'Menu-25.jpg'),
(189, '35 peÃ§as', '35-pecas', ' Menu delicioso de combinados. O Menu de 35 peÃ§as Ã© composto por ', 33.4, 33.4, 'Menu-35.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `taxonomy`
--

DROP TABLE IF EXISTS `taxonomy`;
CREATE TABLE IF NOT EXISTS `taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `post_taxonomy_id` int(11) DEFAULT NULL,
  `relation` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `taxonomy`
--

INSERT INTO `taxonomy` (`id`, `post_id`, `post_taxonomy_id`, `relation`) VALUES
(69, 61, 188, 'IN_CATEGORY'),
(3, 52, 189, 'IN_CATEGORY'),
(4, 52, 224, 'IN_CATEGORY'),
(5, 52, 191, 'IN_CATEGORY'),
(6, 55, 192, 'IN_CATEGORY'),
(7, 55, 193, 'IN_CATEGORY'),
(8, 55, 194, 'IN_CATEGORY'),
(9, 55, 195, 'IN_CATEGORY'),
(10, 58, 196, 'IN_CATEGORY'),
(11, 58, 197, 'IN_CATEGORY'),
(12, 59, 198, 'IN_CATEGORY'),
(13, 59, 199, 'IN_CATEGORY'),
(14, 59, 200, 'IN_CATEGORY'),
(15, 59, 201, 'IN_CATEGORY'),
(16, 59, 202, 'IN_CATEGORY'),
(17, 59, 203, 'IN_CATEGORY'),
(18, 59, 204, 'IN_CATEGORY'),
(19, 59, 205, 'IN_CATEGORY'),
(20, 59, 206, 'IN_CATEGORY'),
(21, 59, 207, 'IN_CATEGORY'),
(22, 59, 208, 'IN_CATEGORY'),
(23, 59, 209, 'IN_CATEGORY'),
(24, 0, 210, 'IN_CATEGORY'),
(25, 60, 211, 'IN_CATEGORY'),
(26, 60, 212, 'IN_CATEGORY'),
(27, 60, 213, 'IN_CATEGORY'),
(28, 60, 214, 'IN_CATEGORY'),
(29, 60, 215, 'IN_CATEGORY'),
(30, 61, 216, 'IN_CATEGORY'),
(31, 61, 217, 'IN_CATEGORY'),
(32, 61, 218, 'IN_CATEGORY'),
(33, 61, 219, 'IN_CATEGORY'),
(34, 61, 220, 'IN_CATEGORY'),
(35, 61, 221, 'IN_CATEGORY'),
(36, 52, 222, 'IN_CATEGORY'),
(37, 52, 223, 'IN_CATEGORY'),
(38, 52, 224, 'IN_CATEGORY'),
(39, 52, 225, 'IN_CATEGORY'),
(46, 66, 1888, 'IN_CATEGORY'),
(45, 61, 1888, 'IN_CATEGORY'),
(44, 66, 1888, 'IN_CATEGORY'),
(47, 61, 1888, 'IN_CATEGORY'),
(48, 61, 1888, 'IN_CATEGORY'),
(49, 60, 1888, 'IN_CATEGORY'),
(50, 59, 1888, 'IN_CATEGORY'),
(51, 55, 1888, 'IN_CATEGORY'),
(52, 56, 1888, 'IN_CATEGORY'),
(53, 61, 1888, 'IN_CATEGORY'),
(54, 66, 1888, 'IN_CATEGORY'),
(76, 66, 200, 'IN_CATEGORY'),
(74, 66, 201, 'IN_CATEGORY'),
(75, 66, 198, 'IN_CATEGORY'),
(73, 61, 190, 'IN_CATEGORY'),
(72, 66, 190, 'IN_CATEGORY'),
(68, 66, 188, 'IN_CATEGORY'),
(71, 59, 188, 'IN_CATEGORY'),
(70, 60, 188, 'IN_CATEGORY'),
(77, 66, 189, 'IN_CATEGORY'),
(78, 66, 227, 'IN_CATEGORY'),
(79, 53, 188, 'IN_CATEGORY'),
(80, 54, 188, 'IN_CATEGORY'),
(81, 66, 228, 'IN_CATEGORY'),
(82, 61, 228, 'IN_CATEGORY'),
(83, 60, 228, 'IN_CATEGORY'),
(84, 53, 228, 'IN_CATEGORY'),
(85, 66, 229, 'IN_CATEGORY'),
(86, 61, 229, 'IN_CATEGORY'),
(87, 57, 229, 'IN_CATEGORY'),
(88, 60, 229, 'IN_CATEGORY'),
(89, 59, 229, 'IN_CATEGORY'),
(90, 58, 229, 'IN_CATEGORY'),
(91, 56, 229, 'IN_CATEGORY'),
(92, 55, 229, 'IN_CATEGORY'),
(93, 54, 229, 'IN_CATEGORY'),
(94, 53, 229, 'IN_CATEGORY'),
(95, 52, 229, 'IN_CATEGORY');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

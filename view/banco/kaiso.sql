-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Dez-2020 às 12:21
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.2.25

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
  `cyte` varchar(75) DEFAULT NULL,
  `complement` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `photo`) VALUES
(1, 'admin_kaiso', '3c78e3ac0a533da1236c3cf177ddd784', 'kaiso.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(61, 'Pratos quentes', 'pratos-quentes'),
(60, 'Fusão', 'fusao'),
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
  `phome` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `photo` varchar(75) DEFAULT NULL,
  `data_register` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `name`, `last_name`, `email`, `phome`, `whatsapp`, `password`, `photo`, `data_register`, `status`) VALUES
(1, 'Bruno', 'Vieira', 'br.rafael@outlook.com', '82999776698', '82999776698', '3c78e3ac0a533da1236c3cf177ddd784', 'brc.png', '2020-12-02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(75) DEFAULT NULL,
  `money` double DEFAULT NULL,
  `porcetage` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `meta`
--

DROP TABLE IF EXISTS `meta`;
CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `relation` varchar(75) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` varchar(75) DEFAULT NULL,
  `data_register` date DEFAULT NULL,
  `data_update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `description`, `price`, `price_offer`, `photo`) VALUES
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
(199, 'Sumono', 'sumono', 'Salada refrescante de pepino e sésamo', 3.2, 3.2, 'sumono.jpg'),
(200, 'Sumono Especial', 'sumono-especial', 'Salada refrescante de salmão pepino e sésamo', 5.3, 5.3, 'sumono-especial.jpg'),
(197, '5 peças - Tataki salmão', '5-pecas-tataki-salmao', 'Salmão braseado com sésamo e cebolinha ', 6.9, 6.9, 'tataki-salmão.jpg'),
(198, 'Sopa Missoshiro', 'sopa-missoshiro', 'Missoshiro cebolinha e somen', 3, 3, 'sopa-sisoshiro.jpg'),
(196, '5 peças - Tataki atum', '5-pecas-tataki-atum', 'Atum braseado com sésamo e cebolinha', 7.9, 7.9, 'tataki-atum.jpg'),
(194, 'Salmão e camarão', 'salmao-e-camarao', '', 6.2, 6.2, 'Gunkan-braseado.jpg'),
(195, 'Massago', 'massago', '', 6.5, 6.5, 'menu-18.jpg'),
(192, 'Salmão', 'salmao', '', 5.5, 5.5, 'salmão.jpg'),
(193, 'Salmão braseado', 'salmao-braseado', '', 5.9, 5.9, 'Gunkan-braseado.jpg'),
(191, 'Uramaki - 8 peças', 'uramaki-8-pecas', 'Escolha o seu uramaki 8 peças!', 7.9, 7.9, 'uramaki.jpg'),
(190, '18 peças', '18-pecas', 'Menu delicioso de combinados. O Menu de 18 peças é composto por', 19.9, 19.9, 'menu-18.jpg'),
(188, '25 peças', '25-pecas', 'Menu delicioso de combinados. O Menu de 25 peças é composto por', 22.5, 22.5, 'Menu-25.jpg'),
(189, '35 peças', '35-pecas', 'Menu delicioso de combinados. O Menu de 35 peças é composto por', 33.4, 33.4, 'Menu-35.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `taxonomy`
--

INSERT INTO `taxonomy` (`id`, `post_id`, `post_taxonomy_id`, `relation`) VALUES
(2, 52, 188, 'IN_CATEGORY'),
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
(39, 52, 225, 'IN_CATEGORY');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Máquina: localhost:3306
-- Data de Criação: 07-Jan-2017 às 02:19
-- Versão do servidor: 5.6.34
-- versão do PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `easystud_salao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_colaboradora` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_colaboradora`,`id_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `telemovel` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telemovel`, `foto`, `datanascimento`) VALUES
(1, 'Paulo', 'x', '1', '1', '1978-07-06'),
(2, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(3, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(4, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(5, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(6, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(7, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(8, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(9, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(10, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(11, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(12, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(13, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(14, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(15, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(16, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(17, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(18, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(19, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(20, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(21, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(22, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(23, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(24, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(25, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00'),
(26, 'Paulo Serrano', 'pauloamserrano@gmail.com', '351961546227', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradoras`
--

CREATE TABLE IF NOT EXISTS `colaboradoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `telemovel` varchar(9) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_colaboradora` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_colaboradora`,`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `activo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `imagem`, `titulo`, `descricao`, `id_servico`, `activo`) VALUES
(1, 'gel1.jpg', 'Unhas de Gel', 'Unhas de Gel', 3, 1),
(2, 'gel2.jpg', 'Unhas de Gel', 'Unhas de Gel', 3, 1),
(3, 'gel3.jpg', NULL, NULL, 3, 1),
(4, 'manicura1.jpg', NULL, NULL, 1, 1),
(5, 'manicura2.jpg', NULL, NULL, 1, 1),
(6, 'micro1.jpg', NULL, NULL, 4, 1),
(7, 'micro2.jpg', NULL, NULL, 4, 1),
(8, 'micro3.jpg', NULL, NULL, 4, 1),
(9, 'micro4.jpg', NULL, NULL, 4, 1),
(10, 'pedicura1.jpg', NULL, NULL, 2, 1),
(11, 'pedicura2.jpg', NULL, NULL, 2, 1),
(12, 'pedicura3.jpg', NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE IF NOT EXISTS `marcacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_servico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `startdate` varchar(48) COLLATE utf8_swedish_ci DEFAULT NULL,
  `enddate` varchar(48) COLLATE utf8_swedish_ci DEFAULT NULL,
  `extra1` int(11) DEFAULT NULL,
  `extra2` int(11) DEFAULT NULL,
  `extra3` int(11) DEFAULT NULL,
  `codigo` int(5) DEFAULT '0',
  `confirmada` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `marcacoes`
--

INSERT INTO `marcacoes` (`id`, `id_servico`, `id_cliente`, `title`, `startdate`, `enddate`, `extra1`, `extra2`, `extra3`, `codigo`, `confirmada`) VALUES
(1, 1, 1, 'Unhas', '2016-12-05T12:00:00', '2016-12-05T14:00:00', NULL, NULL, NULL, 0, 0),
(2, 2, 1, 'Epilação', '2016-12-05T10:00:00', '2016-12-05T12:00:00', NULL, NULL, NULL, 0, 0),
(3, 1, 0, 'Manicure', '2016-12-29T08:00:00', '2016-12-29T10:30:00', 3, 0, 0, NULL, 0),
(4, 2, 0, 'Pedicure', '2016-12-27T09:00:00', '2016-12-27T12:30:00', 1, 3, 0, NULL, 0),
(5, 1, 4, 'Manicure', '2016-12-31T08:00:00', '2016-12-31T08:30:00', 0, 0, 0, NULL, 0),
(6, 2, 5, 'Pedicure', '2016-12-30T13:00:00', '2016-12-30T16:00:00', 3, 0, 0, NULL, 0),
(7, 2, 6, 'Pedicure', '2016-12-30T13:00:00', '2016-12-30T16:00:00', 3, 0, 0, NULL, 0),
(8, 1, 8, 'Manicure', '2017-01-04T12:00:00', '2017-01-04T12:30:00', 0, 0, 0, 68569, 1),
(9, 4, 9, 'Microblandig', '2017-01-07T12:00:00', '2017-01-07T14:30:00', 0, 0, 0, 54819, 0),
(10, 2, 2, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 37186, 0),
(11, 2, 3, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 64091, 0),
(12, 2, 4, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 12320, 0),
(13, 2, 5, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 72550, 0),
(14, 2, 6, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 71982, 0),
(15, 2, 7, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 30121, 0),
(16, 2, 8, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 75736, 0),
(17, 2, 9, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 33020, 0),
(18, 2, 10, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 66871, 0),
(19, 2, 11, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 23140, 0),
(20, 2, 12, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 11443, 0),
(21, 2, 13, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 42342, 0),
(22, 2, 14, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 28474, 0),
(23, 2, 15, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 97407, 0),
(24, 2, 16, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 48587, 0),
(25, 2, 17, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 9826, 0),
(26, 2, 18, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 74063, 0),
(27, 2, 19, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 26425, 0),
(28, 2, 20, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 98788, 0),
(29, 2, 21, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 50791, 0),
(30, 2, 22, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 11187, 0),
(31, 2, 23, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 2571, 0),
(32, 2, 24, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 62687, 0),
(33, 2, 25, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 95533, 0),
(34, 2, 26, 'Pedicure', '2017-01-07T11:00:00', '2017-01-07T12:00:00', 0, 0, 0, 3834, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE IF NOT EXISTS `niveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `duracao` time DEFAULT NULL,
  `preco` float(3,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `servico`, `duracao`, `preco`) VALUES
(1, 'Manicure', '00:30:00', 10),
(2, 'Pedicure', '01:00:00', 20),
(3, 'Unhas de Gel', '02:00:00', 60),
(4, 'Microblandig', '00:00:02', 120);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

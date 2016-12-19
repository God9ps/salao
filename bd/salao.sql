-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2016 às 16:56
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_colaboradora` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `telemovel` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `datanascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telemovel`, `foto`, `datanascimento`) VALUES
(1, 'Paulo', 'x', '1', '1', '1978-07-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradoras`
--

CREATE TABLE `colaboradoras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `telemovel` varchar(9) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE `funcoes` (
  `id` int(11) NOT NULL,
  `id_colaboradora` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE `marcacoes` (
  `id` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `startdate` varchar(48) COLLATE utf8_swedish_ci DEFAULT NULL,
  `enddate` varchar(48) COLLATE utf8_swedish_ci DEFAULT NULL,
  `extra1` int(11) DEFAULT NULL,
  `extra2` int(11) DEFAULT NULL,
  `extra3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `marcacoes`
--

INSERT INTO `marcacoes` (`id`, `id_servico`, `id_cliente`, `title`, `startdate`, `enddate`, `extra1`, `extra2`, `extra3`) VALUES
(1, 1, 1, 'Unhas', '2016-12-05T12:00:00', '2016-12-05T14:00:00', NULL, NULL, NULL),
(2, 2, 1, 'Epilação', '2016-12-05T10:00:00', '2016-12-05T12:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE `niveis` (
  `id` int(11) NOT NULL,
  `nivel` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `servico` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `duracao` time DEFAULT NULL,
  `preco` float(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `servico`, `duracao`, `preco`) VALUES
(1, 'Manicure', '00:30:00', 10),
(2, 'Pedicure', '01:00:00', 20),
(3, 'Unhas de Gel', '02:00:00', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`id_colaboradora`,`id_nivel`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colaboradoras`
--
ALTER TABLE `colaboradoras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcoes`
--
ALTER TABLE `funcoes`
  ADD PRIMARY KEY (`id`,`id_colaboradora`,`id_servico`);

--
-- Indexes for table `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveis`
--
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `colaboradoras`
--
ALTER TABLE `colaboradoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcoes`
--
ALTER TABLE `funcoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marcacoes`
--
ALTER TABLE `marcacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

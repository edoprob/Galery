-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13/05/2020 às 23:13
-- Versão do servidor: 5.6.47-87.0
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `galery`
--
CREATE DATABASE IF NOT EXISTS `galery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `galery`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `albumid`
--

CREATE TABLE `albumid` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `capa` varchar(255) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `albumid`
--

INSERT INTO `albumid` (`id`, `nome`, `data`, `capa`, `comentario`) VALUES
(2, 'Nature', '2019-04-03', '1588454606.png', 'Nature of the world');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotoid`
--

CREATE TABLE `fotoid` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `fotoid`
--

INSERT INTO `fotoid` (`id`, `id_album`, `nome`, `foto`) VALUES
(1, 2, '', '1588454631.png'),
(2, 2, 'Reserva', '1588454650.png'),
(3, 2, '', '1588454682.png'),
(4, 2, '', '1588454699.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `slideid`
--

CREATE TABLE `slideid` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `slideid`
--

INSERT INTO `slideid` (`id`, `imagem`) VALUES
(5, '1588454734.png'),
(3, '1588454368.png'),
(4, '1588454570.png'),
(6, '1588454762.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `userid`
--

CREATE TABLE `userid` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `passw` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `userid`
--

INSERT INTO `userid` (`id`, `userid`, `passw`) VALUES
(2, 'edo', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `albumid`
--
ALTER TABLE `albumid`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fotoid`
--
ALTER TABLE `fotoid`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `slideid`
--
ALTER TABLE `slideid`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `userid`
--
ALTER TABLE `userid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `albumid`
--
ALTER TABLE `albumid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fotoid`
--
ALTER TABLE `fotoid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `slideid`
--
ALTER TABLE `slideid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `userid`
--
ALTER TABLE `userid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

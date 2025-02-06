-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28/11/2024 às 18:16
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mitologias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `mito`
--

DROP TABLE IF EXISTS `mito`;
CREATE TABLE IF NOT EXISTS `mito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_mit` varchar(255) NOT NULL,
  `no_de` varchar(255) NOT NULL,
  `historia` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `mito`
--

INSERT INTO `mito` (`id`, `no_mit`, `no_de`, `historia`, `arquivo`) VALUES
(11, 'kk', 'kk', 'kk', ''),
(10, 'ss', 'ss', 'ss', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

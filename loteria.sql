-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2024 às 19:05
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loteria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gambler`
--

CREATE TABLE `gambler` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valorGanho` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sorteio`
--

CREATE TABLE `sorteio` (
  `id` int(11) NOT NULL,
  `valor` int(20) NOT NULL,
  `numeros_sorteados` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `id` varchar(100) NOT NULL,
  `sorteio` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `numeros_apostados` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `gambler`
--
ALTER TABLE `gambler`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `sorteio`
--
ALTER TABLE `sorteio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

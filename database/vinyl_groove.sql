-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2026 às 20:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aula`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id_dados` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados`
--

INSERT INTO `dados` (`id_dados`, `email`, `password`, `tipo`) VALUES
(1, 'admin@exemplo.pt', '$2y$10$1HrcDndSrUOt/8HskqnvVOg12SfbEVT52on9W0Wh87nYrvzBoFxV2', 1),
(2, 'user1@exemplo.pt', '$2y$10$1HrcDndSrUOt/8HskqnvVOg12SfbEVT52on9W0Wh87nYrvzBoFxV2', 0),
(3, 'user2@exemplo.pt', '$2y$10$1HrcDndSrUOt/8HskqnvVOg12SfbEVT52on9W0Wh87nYrvzBoFxV2', 0),
(4, 'gestor@exemplo.pt', '$2y$10$1HrcDndSrUOt/8HskqnvVOg12SfbEVT52on9W0Wh87nYrvzBoFxV2', 1),
(5, 'cliente@exemplo.pt', '$2y$10$1HrcDndSrUOt/8HskqnvVOg12SfbEVT52on9W0Wh87nYrvzBoFxV2', 0),
(6, 'novo@exemplo.pt', '$2y$10$DvCPK3gg/Vxv1f2IXQHqOOR0JNtHok4budJedJitHfzQoa1WTl9RG', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id_dados`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id_dados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

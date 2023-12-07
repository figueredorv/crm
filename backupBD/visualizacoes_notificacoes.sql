-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/12/2023 às 02:57
-- Versão do servidor: 10.6.15-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u594547444_crmcorban`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `visualizacoes_notificacoes`
--

CREATE TABLE `visualizacoes_notificacoes` (
  `id_visualizacao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_notificacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `visualizacoes_notificacoes`
--

INSERT INTO `visualizacoes_notificacoes` (`id_visualizacao`, `id_usuario`, `id_notificacao`) VALUES
(1, 28, 1),
(2, 6, 1),
(3, 21, 1),
(4, 21, 1),
(5, 21, 1),
(6, 28, 1),
(7, 28, 1),
(8, 28, 1),
(9, 28, 1),
(10, 28, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `visualizacoes_notificacoes`
--
ALTER TABLE `visualizacoes_notificacoes`
  ADD PRIMARY KEY (`id_visualizacao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_notificacao` (`id_notificacao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `visualizacoes_notificacoes`
--
ALTER TABLE `visualizacoes_notificacoes`
  MODIFY `id_visualizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `visualizacoes_notificacoes`
--
ALTER TABLE `visualizacoes_notificacoes`
  ADD CONSTRAINT `visualizacoes_notificacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`idusuarios`),
  ADD CONSTRAINT `visualizacoes_notificacoes_ibfk_2` FOREIGN KEY (`id_notificacao`) REFERENCES `notificacoes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

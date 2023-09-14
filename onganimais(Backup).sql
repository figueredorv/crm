-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jul-2022 às 01:42
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `onganimais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `id` int(11) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `vacinas` varchar(300) NOT NULL,
  `castrado` varchar(10) NOT NULL,
  `observacao` varchar(500) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `idade` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`id`, `sexo`, `nome`, `especie`, `vacinas`, `castrado`, `observacao`, `tipo`, `idade`, `data`, `situacao`) VALUES
(1847, 'Macho', 'BRUCE', 'RUSKY SIBERIANO', 'Raiva', 'Sim', 'Um cachorro muito bonito e sapeca!!', '', '10', '2022-07-19', 'Adotado'),
(1848, 'Macho', 'BOB', 'Vira lata', 'Raiva, Leptospirose', 'Sim', 'Chegou muito magrinho e com caganeira mas já se recuperou', 'Doado', '2', '2022-07-19', 'Disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'Funcionário'),
(2, 'Administrador'),
(5, 'Desenvolvedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loguser`
--

CREATE TABLE `loguser` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `acao` varchar(200) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `loguser`
--

INSERT INTO `loguser` (`id`, `nome`, `acao`, `data`) VALUES
(259, 'Ruan Victor Figueredo ', 'Editou um pet de espécie: Pit bull', '2022-07-20'),
(260, 'Ruan Victor Figueredo ', 'Editou um pet de espécie: Pit bull', '2022-07-20'),
(261, 'Ruan Victor Figueredo ', 'Editou um pet de espécie: Pit bull', '2022-07-20'),
(262, 'Ruan Victor ', 'Excluiu um pet de espécie: RUSKY SIBERIANO', '2022-07-29'),
(263, 'Ruan Victor ', 'Excluiu um pet de espécie: RUSKY SIBERIANO', '2022-07-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `cargo`, `id_funcionario`) VALUES
(12, 'Ruan Victor ', 'admin', 'admin', 'Desenvolvedor', 9),
(15, 'lucas', 'lucas', '123', 'Desenvolvedor', 0),
(16, 'Marcus Mota Macedo', 'sucram', 'marcus01', 'Funcionário', 0),
(17, 'Matheus Rabelo Carvalho', 'matheus', '220416', 'Funcionário', 0),
(18, 'Robson Rabelo', 'rabelo1', 'rabelo1', 'Administrador', 0),
(19, 'Bruno Souza', 'bruno', 'bruno01', 'Funcionário', 0),
(20, 'Marcelo Augusto', 'marcelo', 'm@defesa', 'Funcionário', 0),
(21, 'Nélison Brandão', 'brandao', 'defesa110', 'Administrador', 0),
(22, 'Arielma Rodrigues', 'arielma', 'ari951763', 'Funcionário', 0),
(23, 'Silvio Prado', 'silvio.prado', '1234', 'Administrador', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `loguser`
--
ALTER TABLE `loguser`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1854;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `loguser`
--
ALTER TABLE `loguser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

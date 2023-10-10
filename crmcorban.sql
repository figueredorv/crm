-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/10/2023 às 01:08
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crmcorban`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `idcargos` int(11) NOT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `propostas`
--

CREATE TABLE `propostas` (
  `idpropostas` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `nascimento` varchar(50) DEFAULT NULL,
  `nomedamae` varchar(100) DEFAULT NULL,
  `nomedopai` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `uf` varchar(30) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `convenio` varchar(100) DEFAULT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `tipodeconta` varchar(45) DEFAULT NULL,
  `agencia` varchar(45) DEFAULT NULL,
  `conta` varchar(30) NOT NULL,
  `renda` float DEFAULT NULL,
  `operacao` varchar(60) DEFAULT NULL,
  `tabela` varchar(60) DEFAULT NULL,
  `promotora` varchar(30) NOT NULL,
  `margem` varchar(45) DEFAULT NULL,
  `prazo` varchar(45) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `valorparcelas` float DEFAULT NULL,
  `formalizacao` varchar(45) DEFAULT NULL,
  `canal` varchar(45) DEFAULT NULL,
  `documentoanexado` varchar(45) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `statusproposta` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `propostas`
--

INSERT INTO `propostas` (`idpropostas`, `idusuario`, `nome`, `cpf`, `rg`, `nascimento`, `nomedamae`, `nomedopai`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `telefone`, `email`, `convenio`, `banco`, `tipodeconta`, `agencia`, `conta`, `renda`, `operacao`, `tabela`, `promotora`, `margem`, `prazo`, `valor`, `valorparcelas`, `formalizacao`, `canal`, `documentoanexado`, `observacao`, `statusproposta`, `data`) VALUES
(194, 1, 'RUAN VICTOR FIGUEREDO DOS SANTOS', '111.111.111-11', '36262471', '24/02/1997', 'Ivaneide Vieira de Figueredo', 'Edelsio Porto dos Santos', '49097-190', 'Rua Desembargador Gervásio Prata', '33', '', 'Jabotiana', 'Aracaju', 'SE', '(79) 99844-5065', 'vitinhomusic2014@gmail.com', 'INSS', '001 - BANCO DO BRASIL', 'CONTA CORRENTE', '000', '1', 3, 'REFINANCIAMENTO', '', 'CREDIBRASIL LOJAS', '11,11', '120', 22, 122, 'DIGITAL', 'TELEMARKETING', 'Nenhum documento enviado!', 'Teste', 'Pendente', '2023-10-06'),
(195, 6, 'FERNANDO DE JESUS', '222.222.222-22', '36262472', '24/02/1997', 'Ivaneide Vieira de Figueredo', 'Edelsio Porto dos Santos', '49097-190', 'Rua Desembargador Gervásio Prata', '33', '', 'Jabotiana', 'Aracaju', 'SE', '(55) 79998-4450', 'vitinhomusic2014@gmail.com', 'INSS', '001 - BANCO DO BRASIL', 'CONTA CORRENTE', '11111', '1', 26, 'REFINANCIAMENTO', '', 'CREDIBRASIL LOJAS', '1.000,00', '120', 200, 100, 'DIGITAL', 'TELEMARKETING', 'Nenhum documento enviado!', 'TESTE', 'Pendente', '2023-10-09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nome`, `usuario`, `senha`, `cargo`, `status`) VALUES
(1, 'Admin', 'admin', 'admin', 'Desenvolvedor', 1),
(6, 'Ruan', 'ruan.victor', 'batera15456', 'Funcionário', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idcargos`);

--
-- Índices de tabela `propostas`
--
ALTER TABLE `propostas`
  ADD PRIMARY KEY (`idpropostas`),
  ADD KEY `idusuarios_idx` (`idusuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idcargos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `propostas`
--
ALTER TABLE `propostas`
  MODIFY `idpropostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `propostas`
--
ALTER TABLE `propostas`
  ADD CONSTRAINT `idpropostas` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

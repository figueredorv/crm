-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/01/2024 às 02:35
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
-- Estrutura para tabela `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `banco` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `bancos`
--

INSERT INTO `bancos` (`id`, `banco`) VALUES
(1, 'Deu certo!'),
(4, '004 - BANCO DO NORDESTE DO BRASIL'),
(7, '007 - BNDES'),
(10, '010 - CREDICOAMO'),
(11, '011 - Credit Suisse'),
(12, '012 - BANCO INBURSA'),
(14, '014 - NATIXIS BRASIL'),
(15, '015 - UBS BRASIL CCTVM'),
(16, '016 - CCM DESP TRANS SC E RS'),
(17, '017 - BNY MELLON BANCO'),
(18, '018 - BANCO TRICURY'),
(21, '021 - BANCO BANESTES'),
(24, '024 - BCO BANDEPE'),
(25, '025 - BANCO ALFA'),
(29, '029 - BANCO ITAU CONSIGNADO'),
(33, '033 - BANCO SANTANDER BRASIL'),
(36, '036 - BANCO BBI'),
(37, '037 - BANCO DO ESTADO DO PARA'),
(40, '040 - BANCO CARGILL'),
(41, '041 - BANRISUL'),
(47, '047 - BANCO DO ESTADO DE SERGIPE'),
(60, '060 - CONFIDENCE CC'),
(62, '062 - HIPERCARD BM'),
(63, '063 - BANCO BRADESCARD'),
(64, '064 - GOLDMAN SACHS DO BRASIL BM'),
(65, '065 - BANCO ANDBANK'),
(66, '066 - BANCO MORGAN STANLEY'),
(69, '069 - BANCO CREFISA'),
(70, '070 - BANCO DE BRASILIA (BRB)'),
(74, '074 - BCO. J.SAFRA'),
(75, '075 - BCO ABN AMRO'),
(76, '076 - BANCO KDB BRASIL'),
(77, '077 - BANCO INTER'),
(78, '078 - HAITONG BI DO BRASIL'),
(79, '079 - BANCO ORIGINAL DO AGRONEGÓCIO'),
(80, '080 - B&T CC LTDA'),
(81, '081 - BBN BANCO BRASILEIRO DE NEGOCIOS'),
(82, '082 - BANCO TOPAZIO'),
(83, '083 - BANCO DA CHINA BRASIL'),
(84, '084 - UNIPRIME NORTE DO PARANA'),
(85, '085 - COOP CENTRAL AILOS'),
(89, '089 - CCR REG MOGIANA'),
(91, '091 - UNICRED CENTRAL RS'),
(92, '092 - BRK'),
(93, '093 - PÓLOCRED SCMEPP LTDA'),
(94, '094 - BANCO FINAXIS'),
(95, '095 - BANCO CONFIDENCE DE CAMBIO'),
(96, '096 - BANCO B3'),
(97, '097 - CCC NOROESTE BRASILEIRO LTDA'),
(98, '098 - CREDIALIANÇA CCR'),
(99, '099 - UNIPRIME CENTRAL CCC LTDA'),
(100, '100 - PLANNER CORRETORA DE VALORES'),
(101, '101 - RENASCENCA DTVM LTDA'),
(102, '102 - XP INVESTIMENTOS'),
(104, '104 - CAIXA ECONOMICA FEDERAL (CEF)'),
(105, '105 - LECCA CFI'),
(107, '107 - BANCO BOCOM BBM'),
(108, '108 - PORTOCRED'),
(111, '111 - BANCO OLIVEIRA TRUST DTVM'),
(113, '113 - MAGLIANO'),
(114, '114 - CENTRAL COOPERATIVA DE CREDITO NO ESTADO DO E'),
(117, '117 - ADVANCED CC LTDA'),
(118, '118 - STANDARD CHARTERED BI'),
(119, '119 - BANCO WESTERN UNION'),
(120, '120 - BANCO RODOBENS'),
(121, '121 - BANCO AGIBANK'),
(122, '122 - BANCO BRADESCO BERJ'),
(124, '124 - BANCO WOORI BANK DO BRASIL'),
(125, '125 - BRASIL PLURAL BANCO'),
(126, '126 - BR PARTNERS BI'),
(127, '127 - CODEPE CVC'),
(128, '128 - MS BANK BANCO DE CAMBIO'),
(129, '129 - UBS BRASIL BI'),
(130, '130 - CARUANA SCFI'),
(131, '131 - TULLETT PREBON BRASIL CVC LTDA'),
(132, '132 - ICBC DO BRASIL BM'),
(133, '133 - CRESOL CONFEDERAÇÃO'),
(134, '134 - BGC LIQUIDEZ DTVM LTDA'),
(136, '136 - UNICRED COOPERATIVA'),
(137, '137 - MULTIMONEY CC LTDA'),
(138, '138 - GET MONEY CC LTDA'),
(139, '139 - INTESA SANPAOLO BRASIL'),
(140, '140 - EASYNVEST - TITULO CV'),
(142, '142 - BROKER BRASIL CC LTDA'),
(143, '143 - TREVISO CC'),
(144, '144 - BEXS BANCO DE CAMBIO'),
(145, '145 - LEVYCAM CCV LTDA'),
(146, '146 - GUITTA CC LTDA'),
(149, '149 - FACTA . CFI'),
(157, '157 - ICAP DO BRASIL CTVM LTDA'),
(159, '159 - CASA CREDITO'),
(163, '163 - COMMERZBANK BRASIL BANCO MULTIPLO'),
(169, '169 - BANCO OLE CONSIGNADO'),
(172, '172 - ALBATROSS CCV'),
(173, '173 - BRL TRUST DTVM SA'),
(174, '174 - PERNAMBUCANAS FINANC'),
(177, '177 - GUIDE'),
(180, '180 - CM CAPITAL MARKETS CCTVM LTDA'),
(182, '182 - DACASA FINANCEIRA S/A'),
(183, '183 - SOCRED'),
(184, '184 - BANCO ITAU BBA'),
(188, '188 - ATIVA INVESTIMENTOS'),
(189, '189 - HS FINANCEIRA'),
(190, '190 - SERVICOOP'),
(191, '191 - NOVA FUTURA CTVM LTDA'),
(194, '194 - PARMETAL DTVM LTDA'),
(196, '196 - BANCO FAIR CC'),
(197, '197 - STONE PAGAMENTOS'),
(204, '204 - BANCO BRADESCO CARTOES'),
(208, '208 - BANCO BTG PACTUAL'),
(212, '212 - BANCO ORIGINAL'),
(213, '213 - BCO ARBI'),
(217, '217 - BANCO JOHN DEERE'),
(218, '218 - BANCO BS2'),
(222, '222 - BANCO CREDIT AGRICOLE BR'),
(224, '224 - BANCO FIBRA'),
(233, '233 - BANCO CIFRA'),
(237, '237 - BRADESCO'),
(241, '241 - BANCO CLASSICO'),
(243, '243 - BANCO MAXIMA'),
(246, '246 - BANCO ABC BRASIL'),
(249, '249 - BANCO INVESTCRED UNIBANCO'),
(250, '250 - BANCO BCV'),
(253, '253 - BEXS CC'),
(254, '254 - PARANA BANCO'),
(260, '260 - NU PAGAMENTOS (NUBANK)'),
(265, '265 - BANCO FATOR'),
(266, '266 - BANCO CEDULA'),
(268, '268 - BARIGUI CH'),
(269, '269 - HSBC BANCO DE INVESTIMENTO'),
(270, '270 - SAGITUR CC LTDA'),
(271, '271 - IB CCTVM LTDA'),
(273, '273 - CCR DE SÃO MIGUEL DO OESTE'),
(276, '276 - SENFF'),
(278, '278 - GENIAL INVESTIMENTOS CVM'),
(279, '279 - CCR DE PRIMAVERA DO LESTE'),
(280, '280 - AVISTA'),
(283, '283 - RB CAPITAL INVESTIMENTOS DTVM LTDA'),
(285, '285 - FRENTE CC LTDA'),
(286, '286 - CCR DE OURO'),
(288, '288 - CAROL DTVM LTDA'),
(290, '290 - Pagseguro Internet'),
(292, '292 - BS2 DISTRIBUIDORA DE TITULOS E INVESTIMENTOS'),
(293, '293 - LASTRO RDV DTVM LTDA'),
(298, '298 - VIPS CC LTDA'),
(300, '300 - BANCO LA NACION ARGENTINA'),
(301, '301 - BPP INSTITUIÇÃO DE PAGAMENTOS'),
(310, '310 - VORTX DTVM LTDA'),
(318, '318 - BANCO BMG'),
(320, '320 - BANCO CCB BRASIL'),
(321, '321 - CREFAZ SCMEPP LTDA'),
(323, '323 - Mercado Pago - conta do Mercado Livre'),
(329, '329 - Q I Sociedade'),
(335, '335 - Banco Digio'),
(336, '336 - C6 BANK'),
(340, '340 - SUPER PAGAMENTOS S/A (SUPERDITAL)'),
(341, '341 - ITAU UNIBANCO'),
(348, '348 - BANCO XP S/A'),
(359, '359 - ZEMA CFI S/A'),
(364, '364 - GERENCIANET PAGAMENTOS DO BRASIL'),
(366, '366 - BANCO SOCIETE GENERALE BRASIL'),
(370, '370 - BANCO MIZUHO'),
(376, '376 - BANCO J.P. MORGAN'),
(389, '389 - BANCO MERCANTIL DO BRASIL'),
(394, '394 - BANCO BRADESCO FINANCIAMENTOS'),
(399, '399 - KIRTON BANK'),
(412, '412 - BANCO CAPITAL'),
(413, '413 - BANCO BV'),
(422, '422 - BANCO SAFRA'),
(456, '456 - BANCO MUFG BRASIL'),
(464, '464 - BANCO SUMITOMO MITSUI BRASIL'),
(473, '473 - BANCO CAIXA GERAL BRASIL'),
(477, '477 - CITIBANK N.A'),
(479, '479 - BANCO ITAUBANK'),
(487, '487 - DEUTSCHE BANK BANCO ALEMÃO'),
(488, '488 - JPMORGAN CHASE BANK'),
(492, '492 - ING BANK N.V'),
(494, '494 - BANCO REP ORIENTAL URUGUAY'),
(495, '495 - LA PROVINCIA BUENOS AIRES BANCO'),
(505, '505 - BANCO CREDIT SUISSE (BRL)'),
(545, '545 - SENSO CCVM'),
(600, '600 - BANCO LUSO BRASILEIRO'),
(604, '604 - BANCO INDUSTRIAL DO BRASIL'),
(610, '610 - BANCO VR'),
(611, '611 - BANCO PAULISTA'),
(612, '612 - BANCO GUANABARA'),
(613, '613 - OMNI BANCO'),
(623, '623 - BANCO PAN'),
(626, '626 - BANCO FICSA'),
(630, '630 - BANCO INTERCAP'),
(633, '633 - BANCO RENDIMENTO'),
(634, '634 - BANCO TRIANGULO (BANCO TRIANGULO)'),
(637, '637 - BANCO SOFISA (SOFISA DIRETO)'),
(641, '641 - BANCO ALVORADA'),
(643, '643 - BANCO PINE'),
(652, '652 - ITAU UNIBANCO HOLDING BM'),
(653, '653 - BANCO INDUSVAL'),
(654, '654 - BANCO A.J. RENNER'),
(655, '655 - NEON PAGAMENTOS'),
(707, '707 - BANCO DAYCOVAL'),
(712, '712 - BANCO OURINVEST'),
(739, '739 - BANCO CETELEM'),
(741, '741 - BANCO RIBEIRÃO PRETO'),
(743, '743 - BANCO SEMEAR'),
(745, '745 - BANCO CITIBANK'),
(746, '746 - BANCO MODAL'),
(747, '747 - Banco RABOBANK INTERNACIONAL DO BRASIL'),
(748, '748 - SICREDI'),
(751, '751 - SCOTIABANK BRASIL'),
(752, '752 - BNP PARIBAS BRASIL'),
(753, '753 - NOVO BANCO CONTINENTAL BM'),
(754, '754 - BANCO SISTEMA'),
(755, '755 - BOFA MERRILL LYNCH BM'),
(756, '756 - BANCOOB (BANCO COOPERATIVO DO BRASIL)'),
(757, '757 - BANCO KEB HANA DO BRASIL'),
(908, '908 - PARATI – CREDITO FINANCIAMENTO E INVESTIMENTO'),
(954, '954 - BANCO CBSS'),
(955, '955 - BANCO BONSUCESSO CONSIGNADO'),
(956, 'Deu certo!'),
(957, 'ok'),
(958, 'Banco'),
(959, 'ok'),
(960, 'BELEZAA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `canaldevenda`
--

CREATE TABLE `canaldevenda` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `idcargos` int(11) NOT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`idcargos`, `cargo`) VALUES
(1, 'Operador'),
(2, 'Adm'),
(3, 'Master');

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `caminho` varchar(50) DEFAULT NULL,
  `idproposta` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `documentos`
--



-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data_publicacao` date NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `lida` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `titulo`, `data_publicacao`, `descricao`, `link`, `icon`, `lida`) VALUES
(36, 'Uma ótima tarde a todos.', '2023-12-13', 'Essa é uma notificação de teste.', '', NULL, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `observacoes`
--

CREATE TABLE `observacoes` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `observacao` varchar(100) NOT NULL,
  `idpropostas` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `observacoes`
--


-- --------------------------------------------------------

--
-- Estrutura para tabela `promotoras`
--

CREATE TABLE `promotoras` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `promotoras`
--

INSERT INTO `promotoras` (`id`, `nome`) VALUES
(1, 'CREDIBRASIL LOJASs'),
(2, 'CREDIBRASIL CONSIGNADO'),
(4, 'ok'),
(6, 'Deu certo!');

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
  `numerobeneficio` varchar(50) NOT NULL,
  `dataemissao` varchar(20) NOT NULL,
  `orgaoemissor` varchar(50) NOT NULL,
  `nascimento` varchar(50) DEFAULT NULL,
  `nomedamae` varchar(100) DEFAULT NULL,
  `nomedopai` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `uf` varchar(30) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `convenio` varchar(100) DEFAULT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `bancoproposta` varchar(50) NOT NULL,
  `tipodeconta` varchar(45) DEFAULT NULL,
  `agencia` varchar(45) DEFAULT NULL,
  `conta` varchar(30) NOT NULL,
  `renda` decimal(10,2) DEFAULT NULL,
  `operacao` varchar(60) DEFAULT NULL,
  `tabela` varchar(60) DEFAULT NULL,
  `promotora` varchar(30) NOT NULL,
  `margem` varchar(45) DEFAULT NULL,
  `prazo` varchar(45) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `valorparcelas` decimal(10,2) DEFAULT NULL,
  `formalizacao` varchar(45) DEFAULT NULL,
  `canal` varchar(45) DEFAULT NULL,
  `documentoanexado` varchar(45) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `statusproposta` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `propostas`
--


-- --------------------------------------------------------

--
-- Estrutura para tabela `statusproposta`
--

CREATE TABLE `statusproposta` (
  `id` int(11) NOT NULL,
  `statusproposta` varchar(50) NOT NULL,
  `cor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `statusproposta`
--

INSERT INTO `statusproposta` (`id`, `statusproposta`, `cor`) VALUES
(1, 'PENDENTE', '#f7ef02'),
(2, 'AVERBADA', '#1e90ff'),
(3, 'INTEGRADO', '#1e90ff'),
(4, 'AGUARDANDO AVERBAÇÃO', '#f7ef02'),
(5, 'CANCELADO', '#f90606'),
(6, 'PAGA', '#63f005'),
(7, 'DIGITADO', '#f00505'),
(8, 'SALDO RETORNADO', '#f00505'),
(9, 'EM DIGITAÇÃO', '#f00505'),
(10, 'FORMALIZAÇÃO CONCLUÍDA', '#f00505'),
(16, 'OK', '#f00505'),
(17, 'TESTE', '#f00505'),
(18, 'VERMELHO', '#FF4500'),
(21, 'AGUARD DIGITAÇÃO', '#f7ef02'),
(22, 'PENDENCIA RESOLVIDA', '#1e90ff');

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
  `status` int(11) DEFAULT NULL COMMENT '0= Bloqueado 1= Ativo',
  `imagem` varchar(50) NOT NULL,
  `sobremim` varchar(100) NOT NULL,
  `ultima_autenticacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nome`, `usuario`, `senha`, `cargo`, `status`, `imagem`, `sobremim`, `ultima_autenticacao`) VALUES
(1, 'Operador', 'operador', 'operador', 'Operador', 1, '098882002b0dd7ad492b49e8f1c64f1e.jpg', '', '2024-01-10'),
(6, 'CRM CORBAN', 'figueiredorv', 'figueiredorv', 'Master', 1, 'aec4cac62158c39f72a66dfce2133518.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condim', '2024-01-11'),
(14, 'Adm', 'adm', 'adm', 'Adm', 1, '14996d84acc1f456826f414334fe400c.png', '', '0000-00-00'),
(15, 'a', 'a', 'aa', 'Operador', 1, '', '', '0000-00-00');

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
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `canaldevenda`
--
ALTER TABLE `canaldevenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idcargos`);

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario_idx` (`idusuario`);

--
-- Índices de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `observacoes`
--
ALTER TABLE `observacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `promotoras`
--
ALTER TABLE `promotoras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `propostas`
--
ALTER TABLE `propostas`
  ADD PRIMARY KEY (`idpropostas`),
  ADD KEY `idusuarios_idx` (`idusuario`);

--
-- Índices de tabela `statusproposta`
--
ALTER TABLE `statusproposta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

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
-- AUTO_INCREMENT de tabela `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;

--
-- AUTO_INCREMENT de tabela `canaldevenda`
--
ALTER TABLE `canaldevenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idcargos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `observacoes`
--
ALTER TABLE `observacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `promotoras`
--
ALTER TABLE `promotoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `propostas`
--
ALTER TABLE `propostas`
  MODIFY `idpropostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;

--
-- AUTO_INCREMENT de tabela `statusproposta`
--
ALTER TABLE `statusproposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `visualizacoes_notificacoes`
--
ALTER TABLE `visualizacoes_notificacoes`
  MODIFY `id_visualizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `propostas`
--
ALTER TABLE `propostas`
  ADD CONSTRAINT `idpropostas` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `visualizacoes_notificacoes`
--
ALTER TABLE `visualizacoes_notificacoes`
  ADD CONSTRAINT `visualizacoes_notificacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`idusuarios`),
  ADD CONSTRAINT `visualizacoes_notificacoes_ibfk_2` FOREIGN KEY (`id_notificacao`) REFERENCES `notificacoes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

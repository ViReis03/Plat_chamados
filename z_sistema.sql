-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2022 às 19:12
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `n7_sunit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendar`
--

CREATE TABLE `calendar` (
  `codigo_evento` int(11) NOT NULL,
  `nome_evento` varchar(255) NOT NULL,
  `cor_evento` varchar(255) NOT NULL,
  `inicio_evento` timestamp NOT NULL DEFAULT current_timestamp(),
  `final_evento` timestamp NULL DEFAULT NULL,
  `url_evento` varchar(50) NOT NULL,
  `codigo_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `calendar`
--

INSERT INTO `calendar` (`codigo_evento`, `nome_evento`, `cor_evento`, `inicio_evento`, `final_evento`, `url_evento`, `codigo_ticket`) VALUES
(18, 'Ticket Criado ID: 35', '#198754', '2022-10-13 14:22:39', NULL, '?pag=ticket_aberto&idTicket=35', 35),
(20, 'Ticket Criado ID: 37', '#198754', '2022-10-13 14:36:39', NULL, '?pag=ticket_aberto&idTicket=37', 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat1`
--

CREATE TABLE `cat1` (
  `codigo_cat1` int(11) NOT NULL,
  `nome_cat1` varchar(50) NOT NULL,
  `desc_cat1` varchar(255) NOT NULL,
  `obs_cat1` varchar(255) DEFAULT NULL,
  `status_cat1` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cat1`
--

INSERT INTO `cat1` (`codigo_cat1`, `nome_cat1`, `desc_cat1`, `obs_cat1`, `status_cat1`) VALUES
(1, 'infra', 'isso ae', 'yurindo', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat2`
--

CREATE TABLE `cat2` (
  `codigo_cat2` int(11) NOT NULL,
  `codigo_cat1` int(11) NOT NULL,
  `nome_cat2` varchar(50) NOT NULL,
  `desc_cat2` varchar(255) NOT NULL,
  `obs_cat2` varchar(255) DEFAULT NULL,
  `status_cat2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cat2`
--

INSERT INTO `cat2` (`codigo_cat2`, `codigo_cat1`, `nome_cat2`, `desc_cat2`, `obs_cat2`, `status_cat2`) VALUES
(1, 1, 'isso ae', 'isso ae', 'yurindo', 'Ativo'),
(2, 1, '123123', '66', '123', 'Ativo'),
(3, 1, '12321', '7667', '123', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat3`
--

CREATE TABLE `cat3` (
  `codigo_cat3` int(11) NOT NULL,
  `codigo_cat2` int(11) NOT NULL,
  `nome_cat3` varchar(50) NOT NULL,
  `desc_cat3` varchar(255) NOT NULL,
  `obs_cat3` varchar(255) DEFAULT NULL,
  `status_cat3` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cat3`
--

INSERT INTO `cat3` (`codigo_cat3`, `codigo_cat2`, `nome_cat3`, `desc_cat3`, `obs_cat3`, `status_cat3`) VALUES
(1, 1, 'isso ae', 'isso ae', 'yurindo', 'Ativo'),
(2, 1, '123123', '66', '123', 'Ativo'),
(3, 3, 'oi', 'qwer', 'oi', 'Ativo'),
(4, 2, 'aeeeeeeeeee', 'isso ae', 'yurindo', 'Ativo'),
(5, 2, '123123', '66', '123', 'Ativo'),
(6, 2, '12321', '7667', '123', 'Ativo'),
(7, 3, 'eita giovana', 'isso ae', 'yurindo', 'Ativo'),
(8, 3, '123123', '66', '123', 'Ativo'),
(9, 3, '12321', '7667', '123', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `codigo_chat` int(11) NOT NULL,
  `codigo_usuario` varchar(255) NOT NULL,
  `codigo_ticket` varchar(255) NOT NULL,
  `datacadastro_chat` timestamp NOT NULL DEFAULT current_timestamp(),
  `mensagem_chat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`codigo_chat`, `codigo_usuario`, `codigo_ticket`, `datacadastro_chat`, `mensagem_chat`) VALUES
(1, '2', '27', '2022-10-11 17:19:29', 'oi'),
(2, '2', '27', '2022-10-11 17:25:11', 'oi'),
(3, '2', '28', '2022-10-12 23:40:49', 'oi'),
(4, '2', '33', '2022-10-13 12:28:37', 'teste'),
(5, '2', '33', '2022-10-13 12:28:41', 'teste'),
(6, '12', '37', '2022-10-13 15:27:07', 'estoou com problemas!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `codigo_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(50) NOT NULL,
  `razao_empresa` varchar(50) NOT NULL,
  `cep_empresa` char(9) NOT NULL,
  `endereco_empresa` varchar(50) NOT NULL,
  `numero_empresa` varchar(50) NOT NULL,
  `cidade_empresa` varchar(50) NOT NULL,
  `uf_empresa` varchar(50) NOT NULL,
  `tipo_empresa` varchar(50) NOT NULL,
  `cnpj_empresa` char(18) NOT NULL,
  `ie_empresa` char(18) NOT NULL,
  `datacadastro_empresa` timestamp NOT NULL DEFAULT current_timestamp(),
  `mail_empresa` varchar(50) NOT NULL,
  `tel_empresa` varchar(15) NOT NULL,
  `obs_empresa` varchar(255) DEFAULT NULL,
  `status_empresa` varchar(15) NOT NULL,
  `bairro_empresa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`codigo_empresa`, `nome_empresa`, `razao_empresa`, `cep_empresa`, `endereco_empresa`, `numero_empresa`, `cidade_empresa`, `uf_empresa`, `tipo_empresa`, `cnpj_empresa`, `ie_empresa`, `datacadastro_empresa`, `mail_empresa`, `tel_empresa`, `obs_empresa`, `status_empresa`, `bairro_empresa`) VALUES
(1, 'Sun.IT', 'Sun.IT', '07243-310', 'Rua Monte Castelo', '125', 'Guarulhos', 'SP', 'Matriz', '45.646.685/1668-51', '56456528856', '2022-08-03 22:25:34', 'contato@sunit.com', '11123123123', 'sem obs', 'Ativo', 'Parque das Nações');

-- --------------------------------------------------------

--
-- Estrutura da tabela `geralticket`
--

CREATE TABLE `geralticket` (
  `codigo_ticket` int(11) NOT NULL,
  `codigo_cat1` int(11) NOT NULL,
  `codigo_cat2` int(11) NOT NULL,
  `codigo_cat3` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `assunto_ticket` varchar(255) NOT NULL,
  `img_ticket` longblob DEFAULT NULL,
  `desc_ticket` varchar(999) NOT NULL,
  `datacadastro_ticket` timestamp NOT NULL DEFAULT current_timestamp(),
  `datafechamento_ticket` timestamp NULL DEFAULT NULL,
  `tipo_ticket` varchar(50) NOT NULL,
  `status_ticket` int(11) NOT NULL,
  `progresso_ticket` int(11) NOT NULL,
  `codigo_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `geralticket`
--

INSERT INTO `geralticket` (`codigo_ticket`, `codigo_cat1`, `codigo_cat2`, `codigo_cat3`, `codigo_usuario`, `assunto_ticket`, `img_ticket`, `desc_ticket`, `datacadastro_ticket`, `datafechamento_ticket`, `tipo_ticket`, `status_ticket`, `progresso_ticket`, `codigo_empresa`) VALUES
(35, 1, 2, 5, 11, 'teste', NULL, 'teste', '2022-10-13 14:22:39', NULL, 'Solicitacao', 1, 0, 1),
(37, 1, 2, 5, 12, 'teste', NULL, 'teste', '2022-10-13 14:36:39', NULL, 'Solicitacao', 4, 100, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `codigo_historico` int(11) NOT NULL,
  `codigo_ticket` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `desc_historico` varchar(255) NOT NULL,
  `datacadastro_historico` timestamp NOT NULL DEFAULT current_timestamp(),
  `progresso_historico` int(4) NOT NULL,
  `tempo_historico` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`codigo_historico`, `codigo_ticket`, `codigo_usuario`, `desc_historico`, `datacadastro_historico`, `progresso_historico`, `tempo_historico`) VALUES
(23, 37, 2, 'teste', '2022-10-13 15:32:36', 100, '23:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `codigo_ticket` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notification`
--

INSERT INTO `notification` (`id`, `text`, `status`, `codigo_ticket`, `codigo_usuario`) VALUES
(23, 'Ticket Aberto', 0, 35, 11),
(25, 'Ticket Aberto', 0, 37, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `codigo_servicos` int(11) NOT NULL,
  `nome_servicos` varchar(50) NOT NULL,
  `tipo_servicos` varchar(50) NOT NULL,
  `cat1_servicos` varchar(50) NOT NULL,
  `cat2_servicos` varchar(50) NOT NULL,
  `cat3_servicos` varchar(50) NOT NULL,
  `obs_servicos` varchar(255) DEFAULT NULL,
  `status_servicos` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`codigo_servicos`, `nome_servicos`, `tipo_servicos`, `cat1_servicos`, `cat2_servicos`, `cat3_servicos`, `obs_servicos`, `status_servicos`) VALUES
(1, 'teste', '1', 'infra', 'acesso remoto', 'criação de usuário VPN', '', 'Ativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usuario` int(11) NOT NULL,
  `codigo_empresa` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `cadastro_usuario` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_usuario` varchar(100) NOT NULL,
  `perm_usuario` varchar(50) NOT NULL,
  `login_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `obs_usuario` varchar(255) DEFAULT NULL,
  `status_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `codigo_empresa`, `nome_usuario`, `cadastro_usuario`, `img_usuario`, `perm_usuario`, `login_usuario`, `senha_usuario`, `obs_usuario`, `status_usuario`) VALUES
(2, 1, 'admin', '2022-08-23 23:16:29', 'wp5128415.png', '3', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sem obs', 'Ativo'),
(11, 1, 'ariel', '2022-10-13 14:18:20', 'icon_user.png', '2', 'ariel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Ativo'),
(12, 1, 'Solicitante', '2022-10-13 14:35:24', 'icon_user.png', '1', 'solicitante', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`codigo_evento`);

--
-- Índices para tabela `cat1`
--
ALTER TABLE `cat1`
  ADD PRIMARY KEY (`codigo_cat1`);

--
-- Índices para tabela `cat2`
--
ALTER TABLE `cat2`
  ADD PRIMARY KEY (`codigo_cat2`),
  ADD KEY `FK_cod_cat1_cat2` (`codigo_cat1`);

--
-- Índices para tabela `cat3`
--
ALTER TABLE `cat3`
  ADD PRIMARY KEY (`codigo_cat3`),
  ADD KEY `FK_cod_cat3_cat2` (`codigo_cat2`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`codigo_chat`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`codigo_empresa`),
  ADD UNIQUE KEY `cnpj_empresa` (`cnpj_empresa`),
  ADD UNIQUE KEY `ie_empresa` (`ie_empresa`);

--
-- Índices para tabela `geralticket`
--
ALTER TABLE `geralticket`
  ADD PRIMARY KEY (`codigo_ticket`),
  ADD KEY `FK_cod_usuario_ticket` (`codigo_usuario`),
  ADD KEY `FK_cod_cat1_ticket` (`codigo_cat1`),
  ADD KEY `FK_cod_cat2_ticket` (`codigo_cat2`),
  ADD KEY `FK_cod_cat3_ticket` (`codigo_cat3`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`codigo_historico`),
  ADD KEY `FK_cod_ticket_historico` (`codigo_ticket`),
  ADD KEY `FK_cod_usuario_historico` (`codigo_usuario`);

--
-- Índices para tabela `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`codigo_servicos`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usuario`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`),
  ADD KEY `FK_cod_empresa_usuario` (`codigo_empresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calendar`
--
ALTER TABLE `calendar`
  MODIFY `codigo_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `cat1`
--
ALTER TABLE `cat1`
  MODIFY `codigo_cat1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cat2`
--
ALTER TABLE `cat2`
  MODIFY `codigo_cat2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cat3`
--
ALTER TABLE `cat3`
  MODIFY `codigo_cat3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `codigo_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `codigo_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `geralticket`
--
ALTER TABLE `geralticket`
  MODIFY `codigo_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `codigo_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `codigo_servicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cat2`
--
ALTER TABLE `cat2`
  ADD CONSTRAINT `FK_cod_cat1_cat2` FOREIGN KEY (`codigo_cat1`) REFERENCES `cat1` (`codigo_cat1`);

--
-- Limitadores para a tabela `cat3`
--
ALTER TABLE `cat3`
  ADD CONSTRAINT `FK_cod_cat3_cat2` FOREIGN KEY (`codigo_cat2`) REFERENCES `cat2` (`codigo_cat2`);

--
-- Limitadores para a tabela `geralticket`
--
ALTER TABLE `geralticket`
  ADD CONSTRAINT `FK_cod_cat1_ticket` FOREIGN KEY (`codigo_cat1`) REFERENCES `cat1` (`codigo_cat1`),
  ADD CONSTRAINT `FK_cod_cat2_ticket` FOREIGN KEY (`codigo_cat2`) REFERENCES `cat2` (`codigo_cat2`),
  ADD CONSTRAINT `FK_cod_cat3_ticket` FOREIGN KEY (`codigo_cat3`) REFERENCES `cat3` (`codigo_cat3`),
  ADD CONSTRAINT `FK_cod_usuario_ticket` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `FK_cod_ticket_historico` FOREIGN KEY (`codigo_ticket`) REFERENCES `geralticket` (`codigo_ticket`),
  ADD CONSTRAINT `FK_cod_usuario_historico` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_cod_empresa_usuario` FOREIGN KEY (`codigo_empresa`) REFERENCES `empresa` (`codigo_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

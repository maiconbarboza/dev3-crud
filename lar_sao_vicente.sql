-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2019 às 01:34
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lar_sao_vicente`
--
CREATE DATABASE `lar_sao_vicente`;

USE `lar_sao_vicente`;

DROP TABLE IF EXISTS `usuarios`;

DROP TABLE IF EXISTS `necessidades`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `necessidades`
--

CREATE TABLE `necessidades` (
  `id` int(5) UNSIGNED NOT NULL,
  `tipo` int(3) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `prioridade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `senha` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `telefone` varchar(12) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `endereco` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `cpf` varchar(14) COLLATE latin1_general_cs NOT NULL,
  `cnpj` varchar(16) COLLATE latin1_general_cs NOT NULL,
  `razao_social` varchar(100) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `telefone`, `email`, `endereco`, `cpf`, `cnpj`, `razao_social`) VALUES
(3, 'Maicon', '81dc9bdb52', '991052271', 'maicon@maico', 'rua alexandre', '111.111.111-11', '', ''),
(4, 'Ariovaldo', '81dc9bdb52', '998704321', 'ariovaldo@gmail.com', 'Rua das arueiras', '222.222.222-22', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `necessidades`
--
ALTER TABLE `necessidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_uduario` (`id`);
ALTER TABLE `usuarios` ADD FULLTEXT KEY `nome_usuarios` (`nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `necessidades`
--
ALTER TABLE `necessidades`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

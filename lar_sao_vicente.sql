-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13/11/2019 às 02:44
-- Versão do servidor: 10.3.16-MariaDB
-- Versão do PHP: 7.3.7

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `telefone` varchar(13) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `endereco` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `cpf` varchar(15) COLLATE latin1_general_cs NOT NULL,
  `cnpj` varchar(16) COLLATE latin1_general_cs DEFAULT NULL,
  `razao_social` varchar(100) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `endereco`, `cpf`, `cnpj`, `razao_social`) VALUES
(3, 'Maicon', '991052271', 'maicon@maicon.com', 'rua alexandre', '111.111.111-11', '2', ''),
(4, 'teste', '9910011222', 'teste@teste', 'Rua ji', '2222', '', ''),
(5, 'Maicon Barboza', '12345', 'maicon@bar', 'Rua Max', '111111', '', 'sadsad');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_uduario` (`id`);
ALTER TABLE `usuarios` ADD FULLTEXT KEY `nome_usuarios` (`nome`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

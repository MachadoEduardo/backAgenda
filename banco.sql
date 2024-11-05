-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 01:21
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
-- Banco de dados: `agendasenac`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `dt_nasc` date NOT NULL,
  `descricao` text NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `telefone`, `endereco`, `dt_nasc`, `descricao`, `linkedin`, `email`, `foto`) VALUES
(5, 'xupisco', 'ldaslcsd', 'fdsgdfs', '2024-08-07', 'gfadga', 'fgdaga', 'eduarodmaoacpae@gmail.com', 'faga'),
(6, 'rato', 'bbbbb', 'aaaa', '2024-08-14', 'sfdsfdsd', 'fdsfds', 'gato', 'treco');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto_contato`
--

CREATE TABLE `foto_contato` (
  `id` int(11) NOT NULL,
  `id_contato` int(11) NOT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `permissoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `permissoes`) VALUES
(2, 'Usuario 2', 'usuario2@gmail.com', '750c52614b0013a7693af0787bb3218b', 'SUPER, ADD, EDIT'),
(3, 'Usuario 3', 'usuario3@gmail.com', 'b8dba2dfede3bcb244498c15fed2229a', 'SUPER'),
(4, 'Usuario 4', 'usuario4@gmail.com', 'a0d964c59636bba44764c1f668f3d15e', 'EDIT'),
(5, 'Usuario 5', 'usuario5@gmail.com', 'a705eb0f3e4dba89dd3be2ecce5cea74', 'ADD, DELETE'),
(6, 'Usuario 6', 'usuario6@gmail.com', '28500a9d2c1c4a651bcce3eab87c1c1a', 'SUPER, ADD');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `foto_contato`
--
ALTER TABLE `foto_contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `foto_contato`
--
ALTER TABLE `foto_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

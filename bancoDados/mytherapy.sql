-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jan-2024 às 01:32
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mytherapy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` bigint(20) NOT NULL,
  `title` varchar(220) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(45) NOT NULL,
  `fk_cpfPsi` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `title`, `start`, `end`, `color`, `fk_cpfPsi`) VALUES
(12, 'Ivania Izabel da Rocha', '2023-12-27 10:00:00', '2023-12-27 11:00:00', '#259B9F', '158.995.836-57'),
(22, 'Ivania Izabel da Rocha', '2023-12-28 10:00:00', '2023-12-28 11:00:00', '#259B9F', '158.995.836-57'),
(24, 'Ivania Izabel da Rocha', '2023-12-30 12:30:00', '2023-12-30 13:30:00', '#259B9F', '158.995.836-57'),
(25, 'Ana Clara da Rocha ', '2023-12-30 08:30:00', '2023-12-30 09:30:00', '#259B9F', '158.995.836-57'),
(26, 'Ivania Izabel da Rocha', '2023-12-26 05:30:00', '2023-12-26 06:30:00', '#259B9F', '158.995.836-57'),
(27, 'Ivania Izabel da Rocha', '2023-12-27 05:00:00', '2023-12-27 06:00:00', '#259B9F', '158.995.836-57'),
(28, 'Ivania Izabel da Rocha', '2023-12-27 16:30:00', '2023-12-27 17:30:00', '#259B9F', '158.995.836-57'),
(29, 'Ivania Izabel da Rocha', '2023-12-25 07:30:00', '2023-12-25 07:30:00', '#259B9F', '158.995.836-57'),
(30, 'Ivania Izabel da Rocha', '2023-12-29 06:30:00', '2023-12-29 06:30:00', '#259B9F', '158.995.836-57'),
(31, 'Ivania Izabel da Rocha', '2023-12-30 06:30:00', '2023-12-30 06:30:00', '#259B9F', '158.995.836-57'),
(32, 'Ivania Izabel da Rocha', '2023-12-27 07:00:00', '2023-12-27 07:00:00', '#259B9F', '158.995.836-57'),
(33, 'Ivania Izabel da Rocha', '2023-12-28 07:30:00', '2023-12-28 07:30:00', '#259B9F', '158.995.836-57'),
(34, 'Ivania Izabel da Rocha', '2023-12-26 12:30:00', '2023-12-26 12:30:00', '#259B9F', '158.995.836-57'),
(35, 'Ivania Izabel da Rocha', '2024-01-04 11:00:00', '2024-01-04 12:00:00', '#259B9F', '158.995.836-57'),
(40, 'Ivania Izabel da Rocha', '2024-01-08 14:00:00', '2024-01-08 15:00:00', '#259B9F', '158.995.836-57'),
(41, 'Ivania Izabel da Rocha', '2024-01-16 08:00:00', '2024-01-16 09:00:00', '#259B9F', '158.995.836-57'),
(42, 'Ivania Izabel da Rocha', '2024-01-17 08:00:00', '2024-01-17 09:00:00', '#259B9F', '158.995.836-57'),
(43, 'Ivania Izabel da Rocha', '2024-01-31 08:00:00', '2024-01-31 09:00:00', '#259B9F', '158.995.836-57'),
(44, 'Ivania Izabel da Rocha', '2024-01-31 09:00:00', '2024-01-31 10:00:00', '#259B9F', '158.995.836-57'),
(45, 'Ivania Izabel da Rocha', '2024-01-16 12:00:00', '2024-01-16 13:00:00', '#259B9F', '158.995.836-57'),
(46, 'Ivania Izabel da Rocha', '2024-01-19 08:00:00', '2024-01-19 09:00:00', '#259B9F', '158.995.836-57'),
(47, 'Ivania Izabel da Rocha', '2024-01-19 09:00:00', '2024-01-19 10:00:00', '#259B9F', '158.995.836-57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `chave_recuperarSenha` varchar(220) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `cod` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `dataNasc` date NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `medicamentos` text NOT NULL,
  `img` text NOT NULL,
  `fk_cpfPsi` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`cpf`, `nome`, `senha`, `chave_recuperarSenha`, `email`, `cod`, `telefone`, `dataNasc`, `sexo`, `endereco`, `medicamentos`, `img`, `fk_cpfPsi`) VALUES
('043.779.106-80', 'Ivania Izabel da Rocha', '202cb962ac59075b964b07152d234b70', '', 'ivaniaizabel19@gmail.com', 24, '(31)9 8581-8243', '1978-02-19', 'feminino', 'maria ....', 'não utiliza 0', 'user.png', '158.995.836-57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `psicologo`
--

CREATE TABLE `psicologo` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `senha` text NOT NULL,
  `chave_recuperarSenha` varchar(220) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `cod` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `dataNasc` date NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `psicologo`
--

INSERT INTO `psicologo` (`cpf`, `nome`, `senha`, `chave_recuperarSenha`, `email`, `cod`, `telefone`, `dataNasc`, `img`) VALUES
('158.995.836-57', 'Yasmim Isabela Rocha', '202cb962ac59075b964b07152d234b70', '', 'yasmimisabela.22@gmail.com', 8, '31988207028', '2006-03-22', '2112287528.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `cod` int(11) NOT NULL,
  `dataHora` datetime NOT NULL,
  `descricao` text NOT NULL,
  `fk_cpfPsi` varchar(14) NOT NULL,
  `fk_cpfPac` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cpfPsi` (`fk_cpfPsi`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Índices para tabela `psicologo`
--
ALTER TABLE `psicologo`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Índices para tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_cpfPac` (`fk_cpfPac`),
  ADD KEY `fk_cpfPsi` (`fk_cpfPsi`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `psicologo`
--
ALTER TABLE `psicologo`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`fk_cpfPsi`) REFERENCES `psicologo` (`cpf`);

--
-- Limitadores para a tabela `sessao`
--
ALTER TABLE `sessao`
  ADD CONSTRAINT `sessao_ibfk_1` FOREIGN KEY (`fk_cpfPac`) REFERENCES `paciente` (`cpf`),
  ADD CONSTRAINT `sessao_ibfk_2` FOREIGN KEY (`fk_cpfPsi`) REFERENCES `psicologo` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

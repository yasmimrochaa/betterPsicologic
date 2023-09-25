-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2023 às 20:16
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
CREATE DATABASE IF NOT EXISTS `mytherapy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mytherapy`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cod` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `dataNasc` date NOT NULL,
  `genero` varchar(100) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `medicamentos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`cpf`, `nome`, `senha`, `email`, `cod`, `telefone`, `dataNasc`, `genero`, `endereco`, `medicamentos`) VALUES
('123.456.789-10', 'Ana Clara da Rocha', '123', 'ana@gmail.com', 16, '31985540614', '2006-02-06', 'feminino', 'maria ....', 'não utiliza'),
('158.995.836-57', 'Yasmim Isabela Rocha ', '123', 'yasmimisabela.22@gmail.com', 15, '31988207028', '2006-03-22', 'feminino', 'maria ....', 'não utiliza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `psicologo`
--

CREATE TABLE `psicologo` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `senha` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `cod` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `psicologo`
--

INSERT INTO `psicologo` (`cpf`, `nome`, `senha`, `email`, `cod`, `telefone`, `dataNasc`) VALUES
('158.995.836-57', 'Yasmim Isabela Rocha ', '123', 'yasmimisabela.22@gmail.com', 8, '31988207028', '2006-03-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `codPac` bigint(11) UNSIGNED NOT NULL,
  `codPsi` bigint(11) UNSIGNED NOT NULL,
  `data/hora` datetime NOT NULL,
  `nota` int(11) NOT NULL,
  `resumo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

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
  ADD UNIQUE KEY `cod` (`cod`),
  ADD KEY `fk_codPac` (`codPac`),
  ADD KEY `fk_codPsi` (`codPsi`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `psicologo`
--
ALTER TABLE `psicologo`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sessao`
--
ALTER TABLE `sessao`
  ADD CONSTRAINT `fk_codPac` FOREIGN KEY (`codPac`) REFERENCES `paciente` (`cod`),
  ADD CONSTRAINT `fk_codPsi` FOREIGN KEY (`codPsi`) REFERENCES `psicologo` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

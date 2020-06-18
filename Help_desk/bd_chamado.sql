-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2020 às 00:15
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_chamado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`id_empresa`, `nome`) VALUES
(2, 'Celso EIRELLI'),
(1, 'IUIU LTDA'),
(3, 'IUIU technology');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ocorrencia`
--

CREATE TABLE `tbl_ocorrencia` (
  `id_ocorrencia` int(11) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `desc_ocorrencia` varchar(1000) NOT NULL,
  `sugestao` varchar(1000) DEFAULT NULL,
  `fkEmpresaid` int(11) NOT NULL,
  `fkUsuarioid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_ocorrencia`
--

INSERT INTO `tbl_ocorrencia` (`id_ocorrencia`, `assunto`, `desc_ocorrencia`, `sugestao`, `fkEmpresaid`, `fkUsuarioid`) VALUES
(57, 'Funciona?', 'Teste final', '', 3, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `fkEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nome`, `cpf`, `fkEmpresa`) VALUES
(21, 'Silas Oliveira Rodrigues Dos Santos', '08506326509', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `tbl_ocorrencia`
--
ALTER TABLE `tbl_ocorrencia`
  ADD PRIMARY KEY (`id_ocorrencia`),
  ADD KEY `fk_empresaid` (`fkEmpresaid`),
  ADD KEY `fk_usuarioid` (`fkUsuarioid`);

--
-- Índices para tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_empresa` (`fkEmpresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_ocorrencia`
--
ALTER TABLE `tbl_ocorrencia`
  MODIFY `id_ocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_ocorrencia`
--
ALTER TABLE `tbl_ocorrencia`
  ADD CONSTRAINT `fk_empresaid` FOREIGN KEY (`fkEmpresaid`) REFERENCES `tbl_empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_usuarioid` FOREIGN KEY (`fkUsuarioid`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`fkEmpresa`) REFERENCES `tbl_empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

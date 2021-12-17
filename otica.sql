-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 17/12/2021 às 18:13
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `otica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cidades`
--

CREATE TABLE `tb_cidades` (
  `id` int(11) NOT NULL,
  `cidade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_cidades`
--

INSERT INTO `tb_cidades` (`id`, `cidade`) VALUES
(1, 'monte mor'),
(2, 'capivari'),
(3, 'clientes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pacientes`
--

CREATE TABLE `tb_pacientes` (
  `id` int(11) NOT NULL,
  `id_cidade` int(3) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `idade` int(3) NOT NULL,
  `olho_direito_esferico` varchar(7) DEFAULT NULL,
  `olho_direito_cilindrico` varchar(7) DEFAULT NULL,
  `olho_direito_eixo` varchar(7) DEFAULT NULL,
  `olho_esquerdo_esferico` varchar(7) DEFAULT NULL,
  `olho_esquerdo_cilindrico` varchar(7) DEFAULT NULL,
  `olho_esquerdo_eixo` varchar(7) DEFAULT NULL,
  `adicao` varchar(6) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_cadastrado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_pacientes`
--

INSERT INTO `tb_pacientes` (`id`, `id_cidade`, `nome`, `idade`, `olho_direito_esferico`, `olho_direito_cilindrico`, `olho_direito_eixo`, `olho_esquerdo_esferico`, `olho_esquerdo_cilindrico`, `olho_esquerdo_eixo`, `adicao`, `descricao`, `data_cadastrado`) VALUES
(1, 1, 'Diego Alencar Jacober', 16, '-2,50', '-,1,75', '120', '-1,00', '-2,75', '20', '0,00', 'lentes poly blue', '2021-10-06 11:06:10'),
(2, 2, 'janete', 38, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', '+2,00', 'teste', '2021-10-06 12:08:28'),
(9, 2, 'Diego', 25, '', '', '', '', '', '', '+0,00', '-', '2021-10-07 14:58:04'),
(10, 1, 'bianca', 250, '', '', '', '', '', '', '+0,00', '-', '2021-10-07 14:58:17'),
(12, 1, 'thiago', 25, '', '', '', '', '', '', '+4,00', 'efefeeffe', '2021-10-18 19:11:02'),
(13, 1, 'thiago 2', 45, '', '', '', '', '', '', '+4,00', 'tste', '2021-10-18 19:13:04'),
(14, 2, 'Diego', 250, '+2,50', '', '', '', '', '', '+0,00', 'teste', '2021-10-18 20:27:49'),
(15, 2, 'teste ultimo', 0, '', '', '', '', '', '', '+0,00', '-', '2021-10-18 21:56:31'),
(16, 2, 'de', 0, '', '', '', '', '', '', '+0,00', 'de', '2021-10-19 14:50:19'),
(17, 1, 'teste de hora e data', 45, '', '', '', '', '', '', '+0,00', '-', '2021-10-19 15:06:09'),
(19, 1, 'de', 0, '', '', '', '', '', '', '+0,00', '-', '2021-10-19 15:28:35'),
(20, 3, 'teste 1', 25, '', '', '', '', '', '', '', 'testando atualizar', '2021-10-19 19:28:29'),
(21, 3, 'teste ', 0, '', '', '', '', '', '', '+0,00', '-', '2021-10-19 20:05:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cidades`
--
ALTER TABLE `tb_cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_pacientes`
--
ALTER TABLE `tb_pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cidade` (`id_cidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cidades`
--
ALTER TABLE `tb_cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_pacientes`
--
ALTER TABLE `tb_pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_pacientes`
--
ALTER TABLE `tb_pacientes`
  ADD CONSTRAINT `tb_pacientes_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `tb_cidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

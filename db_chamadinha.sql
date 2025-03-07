-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/02/2025 às 15:51
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
-- Banco de dados: `db_chamadinha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id`, `nome`) VALUES
(1, 'Antonio Gabriel Santos Godoy Carneiro'),
(2, 'Caua Canale Ferreira'),
(3, 'Daniel Camargo de Lima'),
(4, 'David Gabriel Tarley'),
(5, 'Gabriel de Oliveira Domingues Moraes'),
(6, 'Gustavo Sobrera Nunes dos Santos'),
(7, 'Josue Orellana Montenegro'),
(8, 'Kenya Banach Chrominski Jaques'),
(9, 'Leandro Piai Barreto'),
(10, 'Marcia Gisseli Mamani Condarco'),
(11, 'Matheus Dantas de Sousa'),
(12, 'Matheus David'),
(13, 'Matheus Guida'),
(14, 'Matheus Leonardo Ismarsi'),
(15, 'Ryan Lima Germano'),
(16, 'Thiago Bispo Souza'),
(17, 'Victor Huggo Lima da Silva'),
(18, 'Vítor Frazatto Barduco'),
(19, 'Walmir Antonio de Sousa Ribeiro'),
(20, 'Maria Fernanda'),
(21, 'Maria Fernanda'),
(22, 'Maria Fernanda'),
(23, 'Maria Fernanda'),
(24, 'Maria Fernanda'),
(25, 'Maria Fernanda'),
(26, 'Maria Fernanda'),
(27, 'Maria Fernanda'),
(28, 'Maria Fernanda'),
(29, 'Maria Fernanda'),
(30, 'Maria Fernanda'),
(31, 'Maria Fernanda'),
(32, 'Maria Fernanda'),
(33, 'Maria Fernanda'),
(34, 'Maria Fernanda'),
(35, 'Maria Fernanda'),
(36, 'Maria Fernanda'),
(37, 'Maria Fernanda'),
(38, 'Maria Fernanda'),
(39, 'Maria Fernanda'),
(40, 'Maria Fernanda'),
(41, 'Maria Fernanda'),
(42, 'Maria Fernanda'),
(43, 'Maria Fernanda'),
(44, 'Maria Fernanda'),
(45, 'Maria Fernanda'),
(46, 'Maria Fernanda'),
(47, 'Maria Fernanda'),
(48, 'Maria Fernanda'),
(49, 'Maria Fernanda'),
(50, 'Maria Fernanda'),
(51, 'Maria Fernanda'),
(52, 'Maria Fernanda'),
(53, 'Maria Fernanda'),
(54, 'Maria Fernanda'),
(55, 'Maria Fernanda'),
(56, 'Maria Fernanda'),
(57, 'Maria Fernanda'),
(58, 'Maria Fernanda'),
(59, 'Maria Fernanda'),
(60, 'Maria Fernanda'),
(61, 'Maria Fernanda'),
(62, 'Maria Fernanda'),
(63, 'Maria Fernanda'),
(64, 'Maria Fernanda'),
(65, 'Maria Fernanda'),
(66, 'Maria Fernanda'),
(67, 'Maria Fernanda'),
(68, 'Maria Fernanda'),
(69, 'Maria Fernanda'),
(70, 'Maria Fernanda'),
(71, 'Maria Fernanda'),
(72, 'Maria Fernanda'),
(73, 'Maria Fernanda'),
(74, 'Maria Fernanda');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_info_alunos`
--

CREATE TABLE `tb_info_alunos` (
  `id` int(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `frequente` tinyint(1) NOT NULL,
  `id_alunos` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_info_alunos`
--

INSERT INTO `tb_info_alunos` (`id`, `telefone`, `email`, `nascimento`, `frequente`, `id_alunos`, `img`) VALUES
(1, '11988628750', 'antonioxbiel@gmail.com', '1999-05-07', 0, 1, 'antonio.png'),
(2, '19991486248', 'cauacanale33@gmail.com', '2007-11-23', 0, 2, 'caua.png'),
(3, '19495991393', 'Daniel@gmail.com', '2008-01-10', 1, 3, 'daniel.png\r\n'),
(4, '16109028285', 'David@gmail.com', '2000-09-08', 1, 4, 'david.png'),
(5, '14413046245', 'Gabriel@gmail.com', '2007-05-05', 0, 5, ''),
(6, '14133216964', 'Gustavo@gmail.com', '2008-01-31', 1, 6, 'gustavo.png'),
(7, '12632477002', 'Josue @gmail.com', '2006-01-19', 1, 7, 'josue.png'),
(8, '16773431839', 'Kenya@gmail.com', '1994-02-17', 1, 8, 'kenya.png'),
(9, '11440797994', 'Leandro@gmail.com', '2006-05-04', 1, 9, 'leandro.png'),
(10, '14073968091', 'Marcia@gmail.com', '2000-05-07', 1, 10, 'marcia.png'),
(11, '13974976536', 'MatheusDantas@gmail.com', '1980-07-06', 1, 11, 'matheusDantas.png'),
(12, '12143616002', 'MatheusDavid@gmail.com', '2007-04-27', 1, 12, 'matheusDavid.png'),
(13, '18898381340', 'MatheusGuida@gmail.com', '2004-01-02', 1, 13, 'matheusGuida.png'),
(14, '18262215541', 'MatheusIsmarsi@gmail.com', '2007-02-22', 1, 14, 'matheusIsmarsi.png'),
(15, '12620419470', 'Ryan@gmail.com', '2008-03-02', 1, 15, 'ryan.png'),
(16, '19627729143', 'Thiago@gmail.com', '2007-03-24', 1, 16, 'thiago.png'),
(17, '19103526611', 'Victor@gmail.com', '2007-01-18', 1, 17, 'victor.png'),
(18, '13409792391', 'Vítor@gmail.com', '2005-08-22', 1, 18, 'vitor.png'),
(19, '13157565466', 'Walmir@gmail.com', '1994-04-29', 1, 19, 'walmir.png'),
(20, '19955874178', 'mariaf@gmail.com', '2003-10-10', 0, 73, 'Ellipse 1.png'),
(21, '19955874178', 'mariaf@gmail.com', '2003-10-10', 0, 74, 'Ellipse 1.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_info_alunos`
--
ALTER TABLE `tb_info_alunos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_info_alunos`
--
ALTER TABLE `tb_info_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

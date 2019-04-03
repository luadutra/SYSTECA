-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Abr-2019 às 05:10
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_saed`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aberto`
--

CREATE TABLE `aberto` (
  `id` int(50) NOT NULL,
  `codigo_liv` varchar(50) NOT NULL,
  `livro` varchar(50) NOT NULL,
  `aluno` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `data_ret` date NOT NULL,
  `data_br` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `adm_cod` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`adm_cod`, `usuario`, `senha`) VALUES
(1, 'adm', 'adm'),
(2, 'recuperasistema', 'recuperasistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `alu_cod` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `aberto` int(10) DEFAULT NULL,
  `retiradas` int(10) DEFAULT NULL,
  `atrasos` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cont`
--

CREATE TABLE `cont` (
  `id` int(10) NOT NULL,
  `cont_alu` int(50) NOT NULL,
  `cont_liv` int(50) NOT NULL,
  `cont_ret` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cont`
--

INSERT INTO `cont` (`id`, `cont_alu`, `cont_liv`, `cont_ret`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(10) NOT NULL,
  `codigo_liv` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `retiradas` int(10) NOT NULL,
  `situacao` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `retirada`
--

CREATE TABLE `retirada` (
  `id_ret` int(10) NOT NULL,
  `alu_cod` varchar(50) NOT NULL,
  `aluno` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `codigo_liv` varchar(50) NOT NULL,
  `livro` varchar(50) NOT NULL,
  `data_ret` date NOT NULL,
  `data_dev` date DEFAULT NULL,
  `data_br_ret` varchar(50) NOT NULL,
  `data_br_dev` varchar(50) DEFAULT NULL,
  `situacao` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `serie_cod` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aberto`
--
ALTER TABLE `aberto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`adm_cod`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`alu_cod`);

--
-- Indexes for table `cont`
--
ALTER TABLE `cont`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_liv` (`codigo_liv`);

--
-- Indexes for table `retirada`
--
ALTER TABLE `retirada`
  ADD PRIMARY KEY (`id_ret`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`serie_cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aberto`
--
ALTER TABLE `aberto`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `adm_cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `alu_cod` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cont`
--
ALTER TABLE `cont`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retirada`
--
ALTER TABLE `retirada`
  MODIFY `id_ret` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `serie_cod` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

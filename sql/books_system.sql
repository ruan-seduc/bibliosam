-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2022 às 15:03
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `books_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `codigo` varchar(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `editora` varchar(200) NOT NULL,
  `paginas` int(11) NOT NULL,
  `publicacao` date DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'disponivel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`codigo`, `titulo`, `autor`, `editora`, `paginas`, `publicacao`, `data_cadastro`, `status`) VALUES
('41214124HP', 'Harry Potter e a Pedra Filosofal', 'JK Rowling', 'Gryffindor', 528, '1998-01-01', '2022-06-19 21:45:21', 'disponivel'),
('753943844PA', 'Dom Casmurro', 'Machado de Assis', 'Real', 288, '1889-01-01', '2022-06-19 21:48:18', 'disponivel'),
('323321112AM', 'O Alienista', 'Machado de Assis', 'Real', 80, '1998-01-01', '2022-06-19 21:49:14', 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `codigo` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `turma` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `prazo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`codigo`, `nome`, `turma`, `data`, `prazo`) VALUES
('112344HP', 'Ruan de Queiroz', '3 Infor', '2022-06-11', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `senha`, `nome`, `data_cadastro`) VALUES
(0, 'dinossauro', '827ccb0eea8a706c4c34a16891f84e7b', 'maria', '2022-06-15 07:08:42'),
(1, 'adminuser', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '2022-05-04 08:33:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2022 às 19:31
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_books`
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
(' teste2 ', 'Harry Potter e A Pedra Filosofal', 'JK Rowling', 'América', 2395, '2006-04-02', '0000-00-00 00:00:00', 'disponivel'),
('codigoDoLivro     ', 'Titulo do Livro', 'Autor do Livro', 'Editora do Livro', 1234, '1988-02-22', '0000-00-00 00:00:00', 'disponivel'),
('teste1', 'Dom Casmurro', 'Machado de Assis', 'Lorem', 350, '1984-01-01', '0000-00-00 00:00:00', 'disponivel');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

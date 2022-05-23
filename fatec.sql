-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2022 às 01:35
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fatec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaprodutos`
--

CREATE TABLE `categoriaprodutos` (
  `id` int(11) NOT NULL,
  `descricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `usuario` varchar(35) NOT NULL,
  `tombo` varchar(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `usuario`, `tombo`, `data_emprestimo`, `data_devolucao`) VALUES
(1, 'teste', 'teste', '2022-05-16', '0000-00-00'),
(2, 'JosÃ©', '8575225340', '2022-05-20', '2022-05-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `autor` varchar(20) DEFAULT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `area` varchar(16) DEFAULT NULL,
  `ano` smallint(6) DEFAULT NULL,
  `tombo` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`autor`, `titulo`, `area`, `ano`, `tombo`) VALUES
('Maria Margarida', 'PHP', 'Programacao', 2017, '1234567890'),
('Juliano Niederauer', 'Desenvolvendo Websites com PHP: Aprenda ', 'Web', 2016, '8575225340'),
('Catarina Bertonha', 'MySQL', 'Programacao', 2016, '1234567893');

-- --------------------------------------------------------

--
-- Estrutura da tabela `privilegio`
--

CREATE TABLE `privilegio` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `privilegio`
--

INSERT INTO `privilegio` (`codigo`, `descricao`) VALUES
(0, 'Administrador'),
(1, 'Administrador'),
(2, 'Biblioecario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`login`, `senha`, `nivel`) VALUES
('admin', '123', 1),
('anv', 'f@tek', 1),
('hkhaah', 'nnssn', 2),
('iconsistente', '123', 0),
('teste', '122', 1),
('yss', '1111', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoriaprodutos`
--
ALTER TABLE `categoriaprodutos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD KEY `autor` (`autor`),
  ADD KEY `titulo` (`titulo`(20)),
  ADD KEY `area` (`area`(4)),
  ADD KEY `ano` (`ano`);

--
-- Índices para tabela `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`),
  ADD KEY `nivel` (`nivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `privilegio` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2023 às 12:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exerciciofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `DATANASC` date NOT NULL,
  `SENHA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CPF`, `NOME`, `SEXO`, `DATANASC`, `SENHA`) VALUES
('112233', 'Marília', 'Masculino', '2023-02-06', '123456'),
('1234', 'eu', 'masculino', '2022-07-05', '123456'),
('12345', 'Leise', 'Feminino', '2023-02-22', '123456'),
('56789', 'Lewandowski', 'Masculino', '1991-01-16', '12345'),
('756', 'José da Silva', 'Masculino', '2023-04-16', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `CODIGO` varchar(11) NOT NULL,
  `LOJA` varchar(30) DEFAULT NULL,
  `VALOR` decimal(7,2) DEFAULT NULL,
  `DATAHORA` varchar(30) DEFAULT NULL,
  `CPF_TITULAR` varchar(11) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `CPF_CUPOM` varchar(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cupom`
--

INSERT INTO `cupom` (`CODIGO`, `LOJA`, `VALOR`, `DATAHORA`, `CPF_TITULAR`, `STATUS`, `CPF_CUPOM`, `ID`) VALUES
('0001', 'abc', '301.00', '2023-02-15 9:30', NULL, 'reprovado', '12345', 1),
('000148', 'ab', '80.00', '2023-02-14 10:30', '1234', 'aprovado', '1234', 2),
('0002', 'abcd', '302.00', '2023-02-21 9:30', '1234', 'reprovado', '12345', 3),
('0003', 'ab', '500.00', '2023-02-14 9:30', '1234', 'aprovado', '1234', 4),
('0004', 'abc', '301.00', '2023-02-07 9:30', '1234', 'aprovado', '1234', 5),
('0005', 'abc', '301.00', '2023-02-14 9:30', '1234', 'aprovado', '1234', 6),
('000307', 'abcd', '80.00', '2023-03-02 10:30', '12345', 'aprovado', '12345', 7),
('000142', 'ab', '170.00', '2023-02-28 9:30', '12345', 'reprovado', '1234', 8),
('0001489', 'ab', '250.00', '2023-02-23 10:30', '12345', 'aprovado', '12345', 9),
('000148', 'ab', '80.00', '2023-02-14 10:30', '1234', 'reprovado', '1234', 10),
('0002099', 'abdce', '620.00', '2023-02-22 11:49', '12345', 'aprovado', '12345', 11),
('090909', 'Baratos ', '550.00', '2023-02-22 11:47', '1234', 'aprovado', '1234', 12),
('080808', 'BH Supermercados', '90.00', '2023-02-06 07:50', '12345', 'aprovado', '12345', 13),
('0001445', 'abdce', '170.00', '2023-03-11 11:49', '12345', 'aprovado', '12345', 14),
('0002066', 'Lacoste', '80.00', '2023-02-28 11:47', '1234', 'aprovado', '1234', 15),
('121212', 'esterr', '1.00', '2023-03-02 07:50', '1234', 'aprovado', '1234', 16),
('1313131', 'flamengo', '299.00', '2023-02-21 11:47', '1234', 'aprovado', '1234', 17),
('00013333', 'Mazinho', '2.00', '2023-02-28 11:49', '1234', 'reprovado', '12345', 18),
('0001009', 'Baratos ', '620.00', '2023-03-02 9:30', '1234', 'aprovado', '1234', 19),
('0001667', 'abc', '150.00', '2023-03-06 10:30', '1234', 'aprovado', '1234', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `numerodasorte`
--

CREATE TABLE `numerodasorte` (
  `NUMERO` varchar(7) NOT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `numerodasorte`
--

INSERT INTO `numerodasorte` (`NUMERO`, `CPF`, `STATUS`) VALUES
('13541', '1234', 'aguardando sorteio'),
('22067', '12345', 'aguardando sorteio'),
('22976', '1234', 'aguardando sorteio'),
('25712', '12345', 'aguardando sorteio'),
('36636', '1234', 'aguardando sorteio'),
('38931', '12345', 'aguardando sroteio'),
('41535', '1234', 'aguardando sroteio'),
('48511', '1234', 'aguardando sorteio'),
('55558', '12345', 'aguardando sroteio'),
('5938', '1234', 'aguardando sorteio'),
('76252', '1234', 'aguardando sorteio'),
('772', '1234', 'aguardando sroteio'),
('95684', '1234', 'aguardando sorteio');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices para tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_cliente_cupo` (`CPF_TITULAR`);

--
-- Índices para tabela `numerodasorte`
--
ALTER TABLE `numerodasorte`
  ADD PRIMARY KEY (`NUMERO`),
  ADD KEY `fk_numerodasorte_cliente` (`CPF`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cupom`
--
ALTER TABLE `cupom`
  ADD CONSTRAINT `fk_cliente_cupo` FOREIGN KEY (`CPF_TITULAR`) REFERENCES `cliente` (`CPF`);

--
-- Limitadores para a tabela `numerodasorte`
--
ALTER TABLE `numerodasorte`
  ADD CONSTRAINT `fk_numerodasorte_cliente` FOREIGN KEY (`CPF`) REFERENCES `cliente` (`CPF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

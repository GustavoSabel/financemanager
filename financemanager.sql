-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2015 às 23:47
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `financemanager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `transacao_oid` int(11) DEFAULT NULL,
  `parcelas_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelas`
--

CREATE TABLE IF NOT EXISTS `parcelas` (
  `oid` int(11) NOT NULL,
  `valortotal` decimal(19,2) DEFAULT NULL,
  `numeroparcelas` int(11) DEFAULT NULL,
  `transacao_oid` int(11) DEFAULT NULL,
  `transacao_oid_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE IF NOT EXISTS `transacao` (
  `oid` int(11) NOT NULL,
  `datapagamento` date DEFAULT NULL,
  `valor` decimal(19,2) DEFAULT NULL,
  `datavencimento` date DEFAULT NULL,
  `transacao_oid` int(11) DEFAULT NULL,
  `emprestimo` bit(1) DEFAULT NULL,
  `pago` bit(1) DEFAULT NULL,
  `entrada` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoesfixas`
--

CREATE TABLE IF NOT EXISTS `transacoesfixas` (
  `oid` int(11) NOT NULL,
  `numerotransacoes` int(11) DEFAULT NULL,
  `transacao_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8 COMMENT='Usuários do sistema';

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `login`, `senha`) VALUES
(341, 'Gustavo Sabel', 'gsabel', '123'),
(342, 'AndrÃ© VinÃ­cius Bampi', 'andrevbampi', '123'),
(343, 'Teste', 'teste', 'teste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`idCategoria`), ADD KEY `fk_categoria_transacao` (`transacao_oid`), ADD KEY `fk_categoria_parcelas` (`parcelas_oid`);

--
-- Indexes for table `parcelas`
--
ALTER TABLE `parcelas`
 ADD PRIMARY KEY (`oid`), ADD KEY `fk_parcelas_transacao_2` (`transacao_oid`), ADD KEY `fk_parcelas_transacao` (`transacao_oid_2`);

--
-- Indexes for table `transacao`
--
ALTER TABLE `transacao`
 ADD PRIMARY KEY (`oid`), ADD KEY `fk_transacao_transacao` (`transacao_oid`);

--
-- Indexes for table `transacoesfixas`
--
ALTER TABLE `transacoesfixas`
 ADD PRIMARY KEY (`oid`), ADD KEY `fk_transacoesfixas_transacao` (`transacao_oid`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=344;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
ADD CONSTRAINT `fk_categoria_parcelas` FOREIGN KEY (`parcelas_oid`) REFERENCES `parcelas` (`oid`),
ADD CONSTRAINT `fk_categoria_transacao` FOREIGN KEY (`transacao_oid`) REFERENCES `transacao` (`oid`);

--
-- Limitadores para a tabela `parcelas`
--
ALTER TABLE `parcelas`
ADD CONSTRAINT `fk_parcelas_transacao` FOREIGN KEY (`transacao_oid_2`) REFERENCES `transacao` (`oid`),
ADD CONSTRAINT `fk_parcelas_transacao_2` FOREIGN KEY (`transacao_oid`) REFERENCES `transacao` (`oid`);

--
-- Limitadores para a tabela `transacao`
--
ALTER TABLE `transacao`
ADD CONSTRAINT `fk_transacao_transacao` FOREIGN KEY (`transacao_oid`) REFERENCES `transacao` (`oid`);

--
-- Limitadores para a tabela `transacoesfixas`
--
ALTER TABLE `transacoesfixas`
ADD CONSTRAINT `fk_transacoesfixas_transacao` FOREIGN KEY (`transacao_oid`) REFERENCES `transacao` (`oid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS categoria (
  idCategoria int NOT NULL AUTO_INCREMENT,
  descricao varchar(255) DEFAULT NULL,
  PRIMARY KEY (idCategoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS parcela (
  idParecela int(11) NOT NULL,
  valortotal decimal(19,2) DEFAULT NULL,
  numeroparcelas int(11) DEFAULT NULL,
  idTransacao int(11) DEFAULT NULL,
  PRIMARY KEY (idParecela)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS transacao (
  idTransacao int(11) NOT NULL,
  datapagamento date DEFAULT NULL,
  valor decimal(19,2) DEFAULT NULL,
  datavencimento date DEFAULT NULL,
  emprestimo bit(1) DEFAULT NULL,
  pago bit(1) DEFAULT NULL,
  entrada bit(1) DEFAULT NULL,
  PRIMARY KEY (idTransacao)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS transacoesfixas (
  idTransacaofixa int(11) NOT NULL,
  numerotransacoes int(11) DEFAULT NULL,
  idTransacao int(11) DEFAULT NULL,
  PRIMARY KEY (idTransacaofixa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS usuario (
  idUsuario int(11) NOT NULL,
  nome varchar(100) NOT NULL,
  login varchar(50) NOT NULL,
  senha varchar(255) NOT NULL,
   PRIMARY KEY (idUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuários do sistema';




INSERT INTO usuario (idUsuario, nome, login, senha) VALUES
(20, 'Gustavo Sabel', 'gsabel', '123'),
(21, 'AndrÃ© VinÃ­cius Bampi', 'andrevbampi', '123'),
(22, 'Administrador', 'admin', 'admin');

ALTER TABLE usuario ADD UNIQUE KEY login (login);
ALTER TABLE categoria ADD UNIQUE KEY descricao (descricao);

ALTER TABLE parcela
ADD CONSTRAINT fk_parcela_transacao FOREIGN KEY (idTransacao) REFERENCES transacao (idTransacao);

ALTER TABLE transacoesfixas
ADD CONSTRAINT fk_transacoesfixas_transacao FOREIGN KEY (idTransacao) REFERENCES transacao (idTransacao);

-- Usuario
CREATE TABLE IF NOT EXISTS `usuario` (
   `idusuario` int(11) not null,
   `nome`  varchar(255) not null,
   `login`  varchar(255) not null,
   `senha`  varchar(255) not null,
  primary key (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='Usuários do sistema';

ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;


-- Categoria
CREATE TABLE IF NOT EXISTS `categoria` (
   `idcategoria`  int(11)  not null,
   `descricao`  varchar(255) not null,
  primary key (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='Categorias de transações';

ALTER TABLE `categoria`
MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;


-- Transação
CREATE TABLE IF NOT EXISTS `transacao` (
   `idtransacao`  int(11)  not null,
   `descricao` varchar(255),   
   `valortotal`  decimal(19,2),
   `numeroparcelas`  int(11),
   `tipo` integer,
  primary key (`idtransacao`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='Transações financeiras';

ALTER TABLE `transacao`
MODIFY `idtransacao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;


-- Parcela
CREATE TABLE IF NOT EXISTS `parcela` (
   `idparcela`  integer  not null,
   `valor`  decimal(19,2),
   `datapagamento`  date,
   `datavencimento`  date,
   `pago`  boolean,
  primary key (`idparcela`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='Parcelas das Transações';

ALTER TABLE `parcela`
MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;


-- Pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
   `idpessoa`  integer  not null,
   `nome`  varchar(100) not null,
   `endereco`  varchar(100) not null,
   `email`  varchar(100) not null,
   `telefone`  varchar(100) not null,
  primary key (`idpessoa`)   
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='Pessoas com quem o usuário faz Transações';

ALTER TABLE `pessoa`
MODIFY `idpessoa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;



-- Transacao_Usuario
alter table `transacao` add column `idusuario` integer;
alter table `transacao` add index fk_transacao_usuario (`idusuario`), add constraint fk_transacao_usuario foreign key (`idusuario`) references `usuario` (`idusuario`);

-- Transacao_Pessoa
alter table `transacao` add column `idpessoa` integer;
alter table `transacao` add index fk_transacao_pessoa (`idpessoa`), add constraint fk_transacao_pessoa foreign key (`idpessoa`) references `pessoa` (`idpessoa`);

-- Transacao_Categoria
alter table `transacao` add column `idcategoria` integer;
alter table `transacao` add index fk_transacao_categoria (`idcategoria`), add constraint fk_transacao_categoria foreign key (`idcategoria`) references `categoria` (`idcategoria`);

-- Parcela_Transacao
alter table `parcela` add column `idtransacao` integer;
alter table `parcela` add index fk_parcela_transacao (`idtransacao`), add constraint fk_parcela_transacao foreign key (`idtransacao`) references `transacao` (`idtransacao`);
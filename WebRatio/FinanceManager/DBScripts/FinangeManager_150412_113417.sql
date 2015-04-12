-- TransacoesFixas [ent2]
create table `transacoesfixas` (
   `oid`  integer  not null,
   `numerotransacoes`  integer,
  primary key (`oid`)
);


-- Parcelas [ent5]
create table `parcelas` (
   `oid`  integer  not null,
   `valortotal`  decimal(19,2),
   `numeroparcelas`  integer,
  primary key (`oid`)
);


-- Transacao [ent4]
alter table `transacao`  add column  `emprestimo`  bit;
alter table `transacao`  add column  `pago`  bit;
alter table `transacao`  add column  `entrada`  bit;


-- Transacao_GrupoTransacoes [rel4]
alter table `transacoesfixas`  add column  `transacao_oid`  integer;
alter table `transacoesfixas`   add index fk_transacoesfixas_transacao (`transacao_oid`), add constraint fk_transacoesfixas_transacao foreign key (`transacao_oid`) references `transacao` (`oid`);


-- Parcelas_Transacao [rel7]
alter table `parcelas`  add column  `transacao_oid`  integer;
alter table `parcelas`   add index fk_parcelas_transacao_2 (`transacao_oid`), add constraint fk_parcelas_transacao_2 foreign key (`transacao_oid`) references `transacao` (`oid`);


-- Transacao_Parcelas [rel8]
alter table `parcelas`  add column  `transacao_oid_2`  integer;
alter table `parcelas`   add index fk_parcelas_transacao (`transacao_oid_2`), add constraint fk_parcelas_transacao foreign key (`transacao_oid_2`) references `transacao` (`oid`);


-- Categoria_Parcelas [rel9]
alter table `categoria`  add column  `parcelas_oid`  integer;
alter table `categoria`   add index fk_categoria_parcelas (`parcelas_oid`), add constraint fk_categoria_parcelas foreign key (`parcelas_oid`) references `parcelas` (`oid`);



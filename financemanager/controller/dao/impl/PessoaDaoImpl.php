<?php
require_once("../controller/dao/DAO.php");
require_once("../controller/dao/util/ConnectionMySql.php");
require_once("../model/Pessoa.php");

  class PessoaDaoImpl implements DAO {

    public function salvar($info) {
      geraQuery("insert into ".Pessoa::$TABELA."(".Pessoa::$CAMPO_IDPESSOA.", ".Pessoa::$CAMPO_NOME.", ".Pessoa::$CAMPO_ENDERECO.", ".Pessoa::$CAMPO_EMAIL.", ".Pessoa::$CAMPO_TELEFONE.")".
	        " values (".$info->getIdPessoa().", '".$info->getNome()."', '".$info->getEndereco()."', '".$info->getEmail()."', '".$info->getTelefone()."')");
    }
    
    public function excluir($identificador) {
      geraQuery("DELETE FROM ".Pessoa::$TABELA." WHERE ".Pessoa::$CAMPO_IDPESSOA." = ".$identificador);
    }
    
    public function buscar($identificador) {
    
      $result = geraQuery("select ".Pessoa::$CAMPO_IDPESSOA.", ".Pessoa::$CAMPO_NOME.", ".Pessoa::$CAMPO_ENDERECO.", ".Pessoa::$CAMPO_EMAIL.", ".Pessoa::$CAMPO_TELEFONE.
                          " from ".Pessoa::$TABELA." where ".Pessoa::$CAMPO_NOME." = '".$identificador."'");
      if (geraNumeroLinhas($result) > 0) {
        	if ($pessoas = geraArrayQuery($result)) {
        	  return new Pessoa($pessoas[0], $pessoas[1], $pessoas[2], $pessoas[3], $pessoas[4]);
        	}
      }
      return null;
    }
    
    public function listar($infoInicial, $infoFinal) {
      throw new Exception("Função listar não implementada.");
    }
    
    public function listarTodos() {
      $result = geraQuery("select ".Pessoa::$CAMPO_IDPESSOA.", ".Pessoa::$CAMPO_NOME.", ".Pessoa::$CAMPO_ENDERECO.", ".Pessoa::$CAMPO_EMAIL.", ".Pessoa::$CAMPO_TELEFONE.
                            " from ".Pessoa::$TABELA);
      return $result;
    }
    
    public function editar($info) {
      throw new Exception("Função editar não implementada.");
    }
    
  }
?>
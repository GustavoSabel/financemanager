<?php
require_once("../controller/dao/DAO.php");
require_once("../controller/dao/util/ConnectionMySql.php");
require_once("../model/Transacao.php");

  class TransacaoDaoImpl implements DAO {

    public function salvar($info) {
      geraQuery("insert into ".Transacao::$TABELA."(".Transacao::$CAMPO_IDTRANSACAO.", ".Transacao::$CAMPO_DESCRICAO.", ".Transacao::$CAMPO_TIPO.", ".Transacao::$CAMPO_DATA.", ".Transacao::$CAMPO_IDUSUARIO.", ".Transacao::$CAMPO_IDPESSOA.", ".Transacao::$CAMPO_IDCATEGORIA.")".
	        " values (".$info->getIdTransacao().", '".$info->getDescricao()."', '".$info->getTipo()."', '".$info->getData()."', '".$info->getIdUsuario()."', '".$info->getIdPessoa()."', '".$info->getIdCategoria()."')");
    }
    
    public function excluir($identificador) {
      geraQuery("DELETE FROM ".Transacao::$TABELA." WHERE ".Transacao::$CAMPO_IDTRANSACAO." = ".$identificador);
    }
    
    public function buscar($identificador) {
    
      $result = geraQuery("select ".Transacao::$CAMPO_IDTRANSACAO.", ".Transacao::$CAMPO_DESCRICAO.", ".Transacao::$CAMPO_TIPO.", ".Transacao::$CAMPO_DATA.", ".Transacao::$CAMPO_IDUSUARIO.", ".Transacao::$CAMPO_IDPESSOA.", ".Transacao::$CAMPO_IDCATEGORIA.
                          " from ".Transacao::$TABELA." where ".Transacao::$CAMPO_IDTRANSACAO." = '".$identificador."'");
      if (geraNumeroLinhas($result) > 0) {
        	if ($transacoes = geraArrayQuery($result)) {
        	  return new Transacao($transacoes[0], $transacoes[1], $transacoes[2], $transacoes[3], $transacoes[4], $transacoes[5], $transacoes[6]);
        	}
      }
      return null;
    }
    
    public function listar($infoInicial, $infoFinal) {
      throw new Exception("Função listar não implementada.");
    }
    
    public function listarTodos() {
      $result = geraQuery("select ".Transacao::$CAMPO_IDTRANSACAO.", ".Transacao::$CAMPO_DESCRICAO.", ".Transacao::$CAMPO_TIPO.", ".Transacao::$CAMPO_DATA.", ".Transacao::$CAMPO_IDUSUARIO.", ".Transacao::$CAMPO_IDPESSOA.", ".Transacao::$CAMPO_IDCATEGORIA.
                            " from ".Transacao::$TABELA);
      return $result;
    }
    
    public function editar($info) {
      throw new Exception("Função editar não implementada.");
    }
    
  }
?>
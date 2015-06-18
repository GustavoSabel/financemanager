<?php
require_once("../controller/dao/DAO.php");
require_once("../controller/dao/util/ConnectionMySql.php");
require_once("../model/Parcela.php");

/*
    public static $TABELA               = "parcela";
    public static $CAMPO_IDPARCELA      = "idparcela";
    public static $CAMPO_VALOR          = "valor";
    public static $CAMPO_DATAPAGAMENTO  = "datapagamento";
    public static $CAMPO_DATAVENCIMENTO = "datavencimento";
    public static $CAMPO_PAGO           = "pago";
    public static $CAMPO_IDTRANSACAO    = "idtransacao";
*/

  class ParcelaDaoImpl implements DAO {

    public function salvar($info) {
      geraQuery("insert into ".Parcela::$TABELA."(".Parcela::$CAMPO_IDPARCELA.", ".Parcela::$CAMPO_VALOR.", ".Parcela::$CAMPO_DATAPAGAMENTO.", ".Parcela::$CAMPO_DATAVENCIMENTO.", ".Parcela::$CAMPO_PAGO.", ".Parcela::$CAMPO_IDTRANSACAO.")".
	        " values (".$info->getIdParcela().", '".$info->getValor()."', '".$info->getDataPagamento()."', '".$info->getDataVencimento()."', '".$info->getPago()."', '".$info->getIdTransacao()."')");
    }
    
    public function excluir($identificador) {
      geraQuery("DELETE FROM ".Parcela::$TABELA." WHERE ".Parcela::$CAMPO_IDPARCELA." = ".$identificador);
    }
    
    public function buscar($identificador) {
    
      $result = geraQuery("select ".Parcela::$CAMPO_IDPARCELA.", ".Parcela::$CAMPO_VALOR.", ".Parcela::$CAMPO_DATAPAGAMENTO.", ".Parcela::$CAMPO_DATAVENCIMENTO.", ".Parcela::$CAMPO_PAGO.", ".Parcela::$CAMPO_IDTRANSACAO.
                          " from ".Parcela::$TABELA." where ".Parcela::$CAMPO_IDPARCELA." = '".$identificador."'");
      if (geraNumeroLinhas($result) > 0) {
        	if ($parcelas = geraArrayQuery($result)) {
        	  return new Parcela($parcelas[0], $parcelas[1], $parcelas[2], $parcelas[3], $parcelas[4], $parcelas[5]);
        	}
      }
      return null;
    }
    
    public function listar($infoInicial, $infoFinal) {
      throw new Exception("Função listar não implementada.");
    }
    
    public function listarTodos() {
      $result = geraQuery("select ".Parcela::$CAMPO_IDPARCELA.", ".Parcela::$CAMPO_VALOR.", ".Parcela::$CAMPO_DATAPAGAMENTO.", ".Parcela::$CAMPO_DATAVENCIMENTO.", ".Parcela::$CAMPO_PAGO.", ".Parcela::$CAMPO_IDTRANSACAO.
                            " from ".Parcela::$TABELA);
      return $result;
    }
    
    public function editar($info) {
      throw new Exception("Função editar não implementada.");
    }
    
  }
?>
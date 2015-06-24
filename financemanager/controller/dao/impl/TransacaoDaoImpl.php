<?php
require_once("../controller/dao/DAO.php");
require_once("../controller/dao/util/ConnectionMySql.php");
require_once("../model/Transacao.php");
require_once ("../controller/dao/impl/ParcelaDaoImpl.php");
require_once("../model/Categoria.php");
require_once("../model/Pessoa.php");

  class TransacaoDaoImpl implements DAO {

    public function salvar($info) {
      return geraQuery("insert into ".Transacao::$TABELA."(".Transacao::$CAMPO_IDTRANSACAO.", ".Transacao::$CAMPO_DESCRICAO.", ".Transacao::$CAMPO_TIPO.", ".Transacao::$CAMPO_DATA.", ".Transacao::$CAMPO_IDUSUARIO.", ".Transacao::$CAMPO_IDPESSOA.", ".Transacao::$CAMPO_IDCATEGORIA.")".
                       " values (".$info->getIdTransacao().", '".$info->getDescricao()."', '".$info->getTipo()."', '".$info->getData()."', '".$info->getIdUsuario()."', '".$info->getIdPessoa()."', '".$info->getIdCategoria()."')");
    }
    
    public function excluir($identificador) {
        $parcelaDao = new ParcelaDaoImpl();
        $result = $parcelaDao->listarPorIdTransacao($identificador);
        while ($parcela = $result->fetch_array()) {
          $parcelaDao->excluir($parcela[0]);
        }

      $result = performQuery("DELETE FROM ".Transacao::$TABELA." WHERE ".Transacao::$CAMPO_IDTRANSACAO." = ".$identificador);
      return $result;
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
    
    /*public function listarTodos() {
      $result = geraQuery("select ".Transacao::$CAMPO_IDTRANSACAO.", ".Transacao::$CAMPO_DESCRICAO.", ".Transacao::$CAMPO_TIPO.", ".Transacao::$CAMPO_DATA.", ".Transacao::$CAMPO_IDUSUARIO.", ".Transacao::$CAMPO_IDPESSOA.", ".Transacao::$CAMPO_IDCATEGORIA.
                            " from ".Transacao::$TABELA);
      return $result;
    }*/

    public function listarTodos() {
      $result = performQuery("select ".Transacao::$CAMPO_IDTRANSACAO.", ".Transacao::$CAMPO_DESCRICAO.", ".Transacao::$CAMPO_TIPO.", ".Transacao::$CAMPO_DATA.", ".Transacao::$CAMPO_IDUSUARIO.", ".Transacao::$CAMPO_IDPESSOA.", ".Transacao::$CAMPO_IDCATEGORIA.
                            " from ".Transacao::$TABELA);
    
      return $result;
    }

    public function listarTodosDoUsuario($identificador) {
      $result = performQuery("select T.".Transacao::$CAMPO_IDTRANSACAO.", T.".Transacao::$CAMPO_DESCRICAO.", T.".Transacao::$CAMPO_TIPO.", T.".Transacao::$CAMPO_DATA.", T.".Transacao::$CAMPO_IDUSUARIO.", P.".Pessoa::$CAMPO_NOME." pessoa, C.".Categoria::$CAMPO_DESCRICAO." categoria".
                            " from ".Transacao::$TABELA." T, ".Categoria::$TABELA." C, ".Pessoa::$TABELA." P".
                            " where T.".Transacao::$CAMPO_IDCATEGORIA." = C.".Categoria::$CAMPO_ID.
                            " and T.".Transacao::$CAMPO_IDPESSOA." = P.".Pessoa::$CAMPO_IDPESSOA.
                            " and T.".Transacao::$CAMPO_IDUSUARIO." = '".$identificador."'");    
      return $result;
    }
    
    public function editar($info) {
      throw new Exception("Função editar não implementada.");
    }

    public function getProximoId() {
      $result = geraQuery("select max(".Transacao::$CAMPO_IDTRANSACAO.") from ".Transacao::$TABELA);
      if (geraNumeroLinhas($result) > 0) {
          if ($transacoes = geraArrayQuery($result)) {
            return $transacoes[0] + 1;
          }
      }
    }
    
  }
?>
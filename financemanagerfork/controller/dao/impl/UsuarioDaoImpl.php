<?php
require_once("../controller/dao/DAO.php");
require_once("../controller/dao/util/ConnectionMySql.php");
require_once("../model/Usuario.php");

  class UsuarioDaoImpl implements DAO {

    public function salvar($info) {
      geraQuery("insert into ".Usuario::$TABELA."(".Usuario::$CAMPO_IDUSUARIO.", ".Usuario::$CAMPO_NOME.", ".Usuario::$CAMPO_LOGIN.", ".Usuario::$CAMPO_SENHA.")".
	        " values (".$info->getIdUsuario().", '".$info->getNome()."', '".$info->getLogin()."', '".$info->getSenha()."')");
    }
    
    public function excluir($identificador) {
      geraQuery("DELETE FROM ".Usuario::$TABELA." WHERE ".Usuario::$CAMPO_IDUSUARIO." = ".$identificador);
    }
    
    public function buscar($identificador) {
    
      $result = geraQuery("select ".Usuario::$CAMPO_IDUSUARIO.", ".Usuario::$CAMPO_NOME.", ".Usuario::$CAMPO_LOGIN.", ".Usuario::$CAMPO_SENHA.
                          " from ".Usuario::$TABELA." where ".Usuario::$CAMPO_LOGIN." = '".$identificador."'");
      if (geraNumeroLinhas($result) > 0) {
        	if ($usuarios = geraArrayQuery($result)) {
        	  return new Usuario($usuarios[0], $usuarios[1], $usuarios[2], $usuarios[3]);
        	}
      }
      return null;
    }
    
    public function listar($infoInicial, $infoFinal) {
      throw new Exception("Função listar não implementada.");
    }
    
    public function listarTodos() {
      $result = geraQuery("select ".Usuario::$CAMPO_IDUSUARIO.", ".Usuario::$CAMPO_NOME.", ".Usuario::$CAMPO_LOGIN.", ".Usuario::$CAMPO_SENHA.
                            " from ".Usuario::$TABELA);
      return $result;
    }
    
    public function editar($info) {
      throw new Exception("Função editar não implementada.");
    }
    
  }
?>
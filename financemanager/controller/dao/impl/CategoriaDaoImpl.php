<?php
require_once ("../controller/dao/DAO.php");
require_once ("../controller/dao/util/ConnectionMySql.php");
require_once ("../model/Categoria.php");

class CategoriaDaoImpl implements DAO {
	public function salvar($info) {
		$id = 0;
		$query = "insert into " . Categoria::$TABELA . "(" . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . ")" . " values (" . $info->getId () . ", '" . $info->getDescricao () . "')";
		$result = execQuery($query, $id);
		$info->setId($id);
		return $result;
	}
	
	public function excluir($codigo) {
		$result = performQuery( "DELETE FROM " . Categoria::$TABELA . " WHERE " . Categoria::$CAMPO_ID . " = " . $codigo );
		return $result;
	}
	
	public function buscar($descricao) {
		$result = performQuery ( "select " . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . " from " . Categoria::$TABELA . " where " . Categoria::$CAMPO_DESCRICAO . " = '" . $descricao . "'" );
		if ($result->num_rows > 0) {
			if ($usuarios = $result->fetch_array()) {
				return new Categoria ( $usuarios [0], $usuarios [1] );
			}
		}
		return null;
	}
	
	public function buscarParecido($descricao) {
		$result = performQuery ( "select " . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . " from " . Categoria::$TABELA . " where " . Categoria::$CAMPO_DESCRICAO . " like '%" . $descricao . "%'" );
		if ($result->num_rows > 0) {
			if ($usuarios = $result->fetch_array()) {
				return new Categoria ( $usuarios [0], $usuarios [1] );
			}
		}
		return null;
	}
	
	public function listar($infoInicial, $infoFinal) {
		throw new Exception ( "Função listar não implementada." );
	}
	
	public function listarTodos() {
		$result = performQuery ( "select " . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . " from " . Categoria::$TABELA );
		
		return $result;
	}
	
	public function editar($info) {
		$query = " UPDATE " . Categoria::$TABELA . 
				 " SET " . Categoria::$CAMPO_DESCRICAO . " = '" . $info->getDescricao() . "'" .	
				 " WHERE " . Categoria::$CAMPO_ID . " = " . $info->getId();
		$result = performQuery($query);
		return $result;
	}
}
?>
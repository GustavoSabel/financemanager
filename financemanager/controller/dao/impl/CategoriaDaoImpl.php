<?php
require_once ("../controller/dao/DAO.php");
require_once ("../controller/dao/util/ConnectionMySql.php");
require_once ("../model/Categoria.php");
class CategoriaDaoImpl implements DAO {
	public function salvar($info) {
		return geraQuery ( "insert into " . Categoria::$TABELA . "(" . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . ")" . " values (" . $info->getId () . ", '" . $info->getDescricao () . "')" );
	}
	public function excluir($codigo) {
		throw new Exception ( "Função excluir não implementada." );
	}
	public function buscar($descricao) {
		$result = geraQuery ( "select " . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . " from " . Categoria::$TABELA . " where " . Categoria::$CAMPO_DESCRICAO . " like '%" . $descricao . "%'" );
		if (geraNumeroLinhas ( $result ) > 0) {
			if ($usuarios = geraArrayQuery ( $result )) {
				return new Categoria ( $usuarios [0], $usuarios [1] );
			}
		}
		return null;
	}
	public function listar($infoInicial, $infoFinal) {
		throw new Exception ( "Função listar não implementada." );
	}
	public function listarTodos() {
		$result = geraQuery ( "select " . Categoria::$CAMPO_ID . ", " . Categoria::$CAMPO_DESCRICAO . " from " . Categoria::$TABELA );
		
		return $result;
	}
	public function editar($info) {
		throw new Exception ( "Função editar não implementada." );
	}
}
?>
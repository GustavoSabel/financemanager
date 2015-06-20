<?php
require_once ("funcoesController.php");
require_once ("dao/impl/CategoriaDaoImpl.php");
require_once ("../model/Categoria.php");

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'POST' :
		
		header ( 'Content-type: application/json' );
		header ( 'Access-Control-Allow-Origin: *' );
		header ( 'Access-Control-Allow-Headers: X-Requested-With' );
		
		$msgRetorno = criaMensagemRetorno ( 99, "Erro indefinido na operação " . $_GET ["operacao"] );
		
		// switch ($_POST ["operacao"]) {
		switch ($_GET ["operacao"]) {
			case 'salvar' :
				$msgRetorno = salvar ( $_POST ["categoria"] );
				break;
			case 'excluir' :
				$msgRetorno = excluir ( $_POST ["idCategoria"] );
				break;
		}
		
		$jsonFormat = json_encode ( $msgRetorno );
		print ($jsonFormat) ;
		
		break;
	// case 'PUT' :
	// $msgRetorno ["erro"] = salvar ();
	// break;
	// case 'DELETE' :
	// $msgRetorno ["erro"] = 999;
	// $msgRetorno ["msg"] = "DELETE Ainda não implementado";
	// break;
	// case 'GET' :
	// $msgRetorno ["erro"] = 999;
	// $msgRetorno ["msg"] = "GET Ainda não implementado";
	// break;
}

/**
 * Verifica se existe alguma categoria ja cadastrada com o mesmo nome
 *
 * @param unknown $categoria        	
 * @return boolean Retorna true se essa categoria já estiver gravada no banco
 */
function categoriaJaCadastrada($categoria) {
	$categoriaDao = new CategoriaDaoImpl ();
	if ($categoriaDao->buscar ( $categoria ) != null) {
		return true;
	}
	return false;
}
/**
 * Persiste essa categoria
 *
 * @param unknown $categoria        	
 * @return multitype:unknown
 */
function salvar($descricaoCategoria) {
	if (trim ( $descricaoCategoria ) == "") {
		return criaMensagemRetorno ( 1, "Nome da categoria não informado." );
	}
	
	if (categoriaJaCadastrada ( $descricaoCategoria )) {
		return criaMensagemRetorno ( 2, 'Categoria com nome "' . $descricaoCategoria . '" já existe.' );
	}
	
	$categoria = new Categoria ( 0, $descricaoCategoria );
	$categoriaDao = new CategoriaDaoImpl ();
	
	if (! $categoriaDao->salvar ( $categoria )) {
		return criaMensagemRetorno ( 3, "Erro ao gravar a categoria " . $descricaoCategoria );
	}
	
	return criaMensagemRetorno ( 0, "Gravado com sucesso com o ID " . $categoria->getId() );
}

/**
 * Remove a categoria com o $idCategoria
 * 
 * @param unknown $idCategoria        	
 * @return multitype:unknown
 */
function excluir($idCategoria) {
	$daoCategoria = new CategoriaDaoImpl ();
	$result = $daoCategoria->excluir ( $idCategoria );
	if (! $result) {
		return criaMensagemRetorno ( 1, "Erro ao excluir a categoria" );
	} else {
		return criaMensagemRetorno ( 0, "Categoria excluida com sucesso" );
	}
}

/**
 * Lista todas as categorias gravadas no banco
 * @return mixed
 */
function listarCategorias() {
	$daoCat = new CategoriaDaoImpl ();
	$categorias = $daoCat->listarTodos ();
	return $categorias;
}
?>
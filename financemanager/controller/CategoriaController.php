<?php
require_once ("funcoesController.php");
require_once ("dao/impl/CategoriaDaoImpl.php");
require_once ("../model/Categoria.php");

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
 * Define o cabeçalho da mensagem em caso de requisição json
 */
function defineHeaderRetornoJson() {
	header ( 'Content-type: application/json' );
	header ( 'Access-Control-Allow-Origin: *' );
	header ( 'Access-Control-Allow-Headers: X-Requested-With' );
}
/**
 * Persiste essa categoria
 *
 * @param unknown $categoria        	
 * @return multitype:unknown
 */
function salvar($categoria) {
	if (trim ( $categoria->getDescricao() ) == "") {
		return criaMensagemRetorno ( 1, "Nome da categoria não informado." );
	}
	
	if (categoriaJaCadastrada ( $categoria->getDescricao() )) {
		return criaMensagemRetorno ( 2, 'Categoria com nome "' . $categoria->getDescricao() . '" já existe.' );
	}
	
	$categoriaDao = new CategoriaDaoImpl ();
	
	if (! $categoriaDao->salvar ( $categoria )) {
		return criaMensagemRetorno ( 3, "Erro ao gravar a categoria " . $categoria->getDescricao() );
	}
	
	return criaMensagemRetorno ( 0, "Gravado com sucesso com o ID " . $categoria->getId () );
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
 *
 * @return mysqli_result
 */
function listarCategorias() {
	$daoCat = new CategoriaDaoImpl ();
	$categorias = $daoCat->listarTodos ();
	return $categorias;
}

defineHeaderRetornoJson ();
// $retorno = criaMensagemRetorno ( 9999, "REQUEST_METHOD:" . $_SERVER ['REQUEST_METHOD'] );

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'GET' :
		switch ($_GET ["operacao"]) {
			case 'listar' :
				$mysqliResult = listarCategorias ();
				$retorno = $mysqliResult->fetch_all ( MYSQLI_ASSOC );
				break;
			default :
				$retorno = criaMensagemRetorno ( 10, "Operação " . $_GET ["operacao"] . " inválida" );
		}
		break;
	case 'POST' :
		defineHeaderRetornoJson ();
		
		// switch ($_POST ["operacao"]) {
		switch ($_GET ["operacao"]) {
			case 'salvar' :
				$categoria = new Categoria ( 0, $_POST ["categoria"] );
				$retorno = salvar ( $categoria );
				$retorno ["categoria"] = array (
						"id" => $categoria->getId (),
						"descricao" => $categoria->getDescricao () 
				);
				break;
			case 'excluir' :
				$retorno = excluir ( $_POST ["idCategoria"] );
				break;
			case 'listar' :
				$mysqliResult = listarCategorias ();
				$retorno = $mysqliResult->fetch_all ( MYSQLI_ASSOC );
				break;
			default :
				$retorno = criaMensagemRetorno ( 10, "Operação " . $_GET ["operacao"] . " inválida" );
		}
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
$jsonFormat = json_encode ( $retorno );
print ($jsonFormat) ;
?>
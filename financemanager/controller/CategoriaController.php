<?php
require_once ("funcoesController.php");
require_once ("dao/impl/CategoriaDaoImpl.php");
require_once ("../model/Categoria.php");
header ( 'Content-type: application/json' );
header ( 'Access-Control-Allow-Origin: *' );
header ( 'Access-Control-Allow-Headers: X-Requested-With' );

$msgRetorno = array (
		"erro" => 99,
		"msg" => "Erro indefinido" 
);

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'POST' :
		switch ($_POST ["operacao"]) {
			case 'salvar' :
				$msgRetorno = salvar ();
				break;
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
function salvar() {
	$msgRetorno = array (
			"erro" => 0,
			"msg" => "Gravado com sucesso" 
	);
	
	if (trim ( $_POST ["categoria"] ) == "") {
		$msgRetorno ["msg"] = "Nome da categoria não informado.";
		$msgRetorno ["erro"] = 1;
		return $msgRetorno;
	}
	
	$categoria = new Categoria ( 0, $_POST ["categoria"] );
	
	$categoriaDao = new CategoriaDaoImpl ();
	
	if ($categoriaDao->buscar ( $categoria->getDescricao () ) != null) {
		$msgRetorno ["msg"] = 'Categoria com nome "' . $categoria->getDescricao () . '" já existe.';
		$msgRetorno ["erro"] = 2;
		return $msgRetorno;
	}
	if (! $categoriaDao->salvar ( $categoria )) {
		$msgRetorno ["msg"] = "Erro ao gravar a categoria " . $categoria;
		$msgRetorno ["erro"] = 3;
		return $msgRetorno;
	}
	
	return $msgRetorno;
}

$jsonFormat = json_encode ( $msgRetorno );
print ($jsonFormat) ;

?>
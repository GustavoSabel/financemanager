<?php
require_once ("../controller/dao/impl/UsuarioDaoImpl.php");
require_once ("../controller/funcoesController.php");
require_once ("../model/Usuario.php");
header ( 'Content-type: application/json' );
header ( 'Access-Control-Allow-Origin: *' );
header ( 'Access-Control-Allow-Headers: X-Requested-With' );

$msgRetorno = array (
		"erro" => 99,
		"msg" => "Erro indefinido" 
);

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'POST' :
		$msgRetorno = salvar ( $msgRetorno );
		break;
	// Não consegui pegar as varáveis via $_REQUEST com o PUT
	/*
	 * case 'PUT':
	 * $msgRetorno["erro"] = salvar();
	 * break;
	 * case 'DELETE':
	 * $msgRetorno["erro"] = 999;
	 * $msgRetorno["msg"] = "DELETE Ainda não implementado";
	 * break;
	 */
	case 'GET' :
		$msgRetorno ["erro"] = 999;
		$msgRetorno ["msg"] = "GET Ainda não implementado";
		break;
}

$jsonFormat = json_encode ( $msgRetorno );
print ($jsonFormat) ;
function salvar($msgRetorno) {
	$msgRetorno = array (
			"erro" => 99,
			"msg" => "SSSSSSSSSSSS" 
	);
	if (trim ( $_REQUEST ["nome"] ) == "") {
		$msgRetorno ["msg"] = "Nome de usuário não informado.";
		$msgRetorno ["erro"] = 1;
	} else if (trim ( $_REQUEST ["login"] ) == "") {
		$msgRetorno ["msg"] = "Login de usuário não informado.";
		$msgRetorno ["erro"] = 2;
	} else if (trim ( $_REQUEST ["senha"] ) == "") {
		$msgRetorno ["msg"] = "Senha de usuário não informada.";
		$msgRetorno ["erro"] = 3;
	} else {
		$usuario = new Usuario ( 0, $_REQUEST ["nome"], $_REQUEST ["login"], $_REQUEST ["senha"] );
		$usuarioDao = new UsuarioDaoImpl ();
		if ($usuarioDao->buscar ( $usuario->getLogin () ) != null) {
			$msgRetorno ["msg"] = 'Usuário com login "' . $usuario->getLogin () . '" já existe.';
			$msgRetorno ["erro"] = 4;
		} else {
			$usuarioDao->salvar ( $usuario );
			$msgRetorno ["msg"] = "Salvo com sucesso";
			$msgRetorno ["erro"] = 0;
		}
	}
	return $msgRetorno;
}
?>


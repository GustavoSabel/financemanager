<?php
require_once ("funcoesController.php");
require_once ("dao/impl/UsuarioDaoImpl.php");
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
		// if ($_SERVER["REQUEST_URI"] == "/login.php") {
		switch ($_REQUEST ["operacao"]) {
			case "logar" :
				$usuarioDao = new UsuarioDaoImpl ();
				$categoria = $usuarioDao->buscar ( $_REQUEST ["username"] );
				if ($categoria != null) {
					if ($categoria->getSenha () == $_REQUEST ["password"]) {
						session_start ();
						$_SESSION [SESSION_USER] = $categoria->getNome ();
						$msgRetorno ["erro"] = 0;
						$msgRetorno ["msg"] = "Usuário autenticado";
					} else {
						$msgRetorno ["erro"] = 1;
						$msgRetorno ["msg"] = "Senha inválida";
					}
				} else {
					$msgRetorno ["erro"] = 2;
					$msgRetorno ["msg"] = "Usuário inválido";
				}
				break;
			case "logoff" :
				session_start ();
				$_SESSION [SESSION_USER] = "";
				$msgRetorno ["erro"] = 0;
				$msgRetorno ["msg"] = "Usuário desconectado";
				break;
			default :
				$msgRetorno ["erro"] = 99;
				$msgRetorno ["msg"] = "Operação inválida";
		}
		// }
		break;
	case 'GET' :
		break;
	default :
}
$jsonFormat = json_encode ( $msgRetorno );
print ($jsonFormat) ;
?>
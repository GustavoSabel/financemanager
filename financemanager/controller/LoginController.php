<?php
require_once ("funcoesController.php");
require_once ("dao/impl/UsuarioDaoImpl.php");
require_once ("../model/Usuario.php");
header ( 'Content-type: application/json' );
header ( 'Access-Control-Allow-Origin: *' );
header ( 'Access-Control-Allow-Headers: X-Requested-With' );

$retorno = array (
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
						$retorno ["erro"] = 0;
						$retorno ["msg"] = "Usuário autenticado";
					} else {
						$retorno ["erro"] = 1;
						$retorno ["msg"] = "Senha inválida";
					}
				} else {
					$retorno ["erro"] = 2;
					$retorno ["msg"] = "Usuário inválido";
				}
				break;
			case "logoff" :
				session_start ();
				$_SESSION [SESSION_USER] = "";
				$retorno ["erro"] = 0;
				$retorno ["msg"] = "Usuário desconectado";
				break;
			default :
				$retorno ["erro"] = 99;
				$retorno ["msg"] = "Operação inválida";
		}
		// }
		break;
	case 'GET' :
		break;
	default :
}
$jsonFormat = json_encode ( $retorno );
print ($jsonFormat) ;
?>
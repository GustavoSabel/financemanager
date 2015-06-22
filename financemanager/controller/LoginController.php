<?php
require_once ("funcoesController.php");
require_once ("dao/impl/UsuarioDaoImpl.php");
require_once ("../model/Usuario.php");
header ( 'Content-type: application/json' );
header ( 'Access-Control-Allow-Origin: *' );
header ( 'Access-Control-Allow-Headers: X-Requested-With' );

$arquivos = array (
		"erro" => 99,
		"msg" => "Erro indefinido" 
);

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'POST' :
		// if ($_SERVER["REQUEST_URI"] == "/login.php") {
		switch ($_REQUEST ["operacao"]) {
			case "logar" :
				$usuarioDao = new UsuarioDaoImpl ();
				$usuario = $usuarioDao->buscar ( $_REQUEST ["username"] );
				if ($usuario != null) {
					if ($usuario->getSenha () == $_REQUEST ["password"]) {
						session_start ();
						$_SESSION [SESSION_USER] = $usuario->getNome ();
						$_SESSION [SESSION_USER_ID] = $categoria->getIdUsuario();
						$arquivos ["erro"] = 0;
						$arquivos ["msg"] = "Usuário autenticado";
					} else {
						$arquivos ["erro"] = 1;
						$arquivos ["msg"] = "Senha inválida";
					}
				} else {
					$arquivos ["erro"] = 2;
					$arquivos ["msg"] = "Usuário inválido";
				}
				break;
			case "logoff" :
				session_start ();
				$_SESSION [SESSION_USER] = "";
				$arquivos ["erro"] = 0;
				$arquivos ["msg"] = "Usuário desconectado";
				break;
			default :
				$arquivos ["erro"] = 99;
				$arquivos ["msg"] = "Operação inválida";
		}
		// }
		break;
	case 'GET' :
		break;
	default :
}
$jsonFormat = json_encode ( $arquivos );
print ($jsonFormat) ;
?>
<?php
define ( "SESSION_USER", "username####" );
define ( "PATH_FINANCEMANAGER", getPathFinanceManager () );

/**
 * Retorna o caminho do site até a pasta financemanager
 * Ex: http://localhost/Furb/financemanager
 *
 * @return string
 */
function getPathFinanceManager() {
	// return "http://". $_SERVER['SERVER_NAME'] ."/financemanager";
	// return "http://" . $_SERVER ['SERVER_NAME'] . "/FURB/web/financemanager/trunk/financemanager";
	// return "http://" . $_SERVER ['SERVER_NAME'] . "/FURB/web/financemanager/trunk/financemanager";
	$path = "http://" . $_SERVER ['SERVER_NAME'];
	$path .= dirname ( $_SERVER ['SCRIPT_NAME'] );
	while ( basename ( $path ) != "financemanager" ) {
		$path = dirname ( $path );
	}
	return $path;
}
/**
 * Monta uma mensagem padrão de retorno para exibir ao usuário
 * @param unknown $codigo Código da mensagem
 * @param unknown $mensagem Mensagem
 * @return multitype:unknown Matriz com os dados da mensagem
 */
function criaMensagemRetorno($codigo, $mensagem) {
	$msgRetorno = array (
			"erro" => $codigo,
			"msg" => $mensagem 
	);
	return $msgRetorno;
}

/**
 * Redireciona para outra página enviando uma mensagem
 */
function redireMsg($local, $mensagem) {
	header ( "location:" . $local . "?msg=" . $mensagem );
}

/**
 * Verifica se existe algum usuário logado
 *
 * @return boolean
 */
function existeUsuarioLogado() {
	return (isset ( $_SESSION [SESSION_USER] ) && ($_SESSION [SESSION_USER] != ""));
}

/**
 * Caso não tenha nenhum usuário logado, redireciona para a tela de login
 */
function validaSessao() {
	if (existeUsuarioLogado () == false) {
		gotoLogin ();
		exit ();
	}
}

/**
 * Redireciona para a página home
 */
function gotoHome() {
	header ( 'Location: ' . PATH_FINANCEMANAGER . '/view/index.php' );
}

/**
 * Redireciona para a página de login
 */
function gotoLogin() {
	header ( 'Location: ' . PATH_FINANCEMANAGER . '/view/Login.php' );
}

/**
 * Retorna o nome do usuário logado
 *
 * @return unknown|string
 */
function usuarioLogado() {
	if (existeUsuarioLogado ()) {
		return $_SESSION [SESSION_USER];
	} else {
		return "Nenhum usuário logado";
	}
}

?>

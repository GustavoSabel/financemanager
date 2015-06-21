<?php

/**
 * Abre a conexão com o banco de dados
 * @throws Exception
 * @return mysqli
 */
function getConnectionMysqli() {
	$host = "localhost";
	$db_name = "financemanager";
	$user = "root";
	$password = "";
	
	$mysqli = new mysqli ( $host, $user, $password, $db_name );
	$link = mysql_connect ( $host, $user, $password );
	if ($mysqli->connect_errno) {
		printf ( "Connect failed: %s\n", $mysqli->connect_error );
		throw new Exception ( "Não foi possível conectar no mysql: " . $mysqli->connect_error );
	}
	return $mysqli;
}

/**
 * Conecta ao banco de dDados "financemanager"
 * This extension is deprecated as of PHP 5.5.0, and will be removed in the future.
 */
function getConnection() {
	$host = "localhost";
	$db_name = "financemanager";
	$user = "root";
	$password = "";
	
	$link = mysql_connect ( $host, $user, $password );
	if (! $link) {
		throw new Exception ( "Não foi possível conectar no mysql: " . mysql_error () );
	}
	$db_selected = mysql_select_db ( $db_name, $link );
	if (! $db_selected) {
		throw new Exception ( "Banco de dados inexistente: " . mysql_error () );
	}
	return $link;
}

// Gera o tempo atual no fuso-horário de Brasília. No horário oficial, o formato é Hora-3. No horário de verão, Hora-2
// Infelizmente a mudança de horário de oficial para horário de verão (e vice-versa) tem que ser feita de forma manual
function geraTempo() {
	// Horário Oficial
	return mktime ( date ( 'H' ) - 3, date ( 'i' ), date ( 's' ) );
	// Horário de Verão
	// return mktime(date('H')-2, date('i'), date('s'));
}

/**
 * Retorna uma query mysql de um script
 * 
 * @param unknown $sql        	
 * @return mixed
 */
function geraQuery($sql) {
	$con = getConnection ();
	try {
		$result = mysql_query ( $sql );
		/*
		 * if (! $result) {
		 * throw new Exception ( "Query inválida: " . mysql_error () );
		 * }
		 */
	} finally {
		mysql_close ( $con );
		return $result;
	}
}

/**
 * Faz um insert, udpate ou delete
 * 
 * @param unknown $sql
 *        	commando insert
 * @param unknown $id
 *        	Se for insert, retorna por referencia o código AUTO_INCREMENT inserido
 * @return boolean False se falhar ou True se executar com sucesso
 */
function execQuery($sql, &$id) {
	$mysqli = getConnectionMysqli ();
	try {
		$result = $mysqli->real_query ( $sql );
		if (! $result) {
			printf ( $mysqli->error );
		}
		$id = $mysqli->insert_id;
	} finally {
		$mysqli->close ();
		return $result;
	}
}

/**
 * Faz um elect
 * 
 * @param unknown $sql
 *        	commando insert
 * @param unknown $id
 *        	retorna por referencia o código UTO_INCREMENT inserido
 * @return mysqli_result
 */
function performQuery($sql) {
	$mysqli = getConnectionMysqli ();
	try {
		$result = $mysqli->query ( $sql );
		if (! $result) {
			printf ( $mysqli->error );
		}
	} finally {
		$mysqli->close ();
		return $result;
	}
}

// Retorna o número de linhas de uma query mysql
function geraNumeroLinhas($result) {
	return mysql_num_rows ( $result );
}

// Retorna um array com o resultado de uma query mysql
function geraArrayQuery($result) {
	return mysql_fetch_array ( $result );
}
?>

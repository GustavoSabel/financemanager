<?php
    
  //Conecta ao banco de dDados "financemanager"
  function getConnection() {
    $host = "localhost";
    $db_name = "financemanager";
    $user = "root";
    $password = "";
    
    $link = mysql_connect($host, $user, $password);
    if (!$link) {
      throw new Exception ("Não foi possível conectar no mysql: ".mysql_error());
    }
    $db_selected = mysql_select_db($db_name,$link);
    if (!$db_selected) {
      throw new Exception("Banco de dados inexistente".mysql_error());
    }
    return $link;
  }
    
  //Fechar a conexão com o banco de dados "financemanager"
  function closeConnection() {
    mysql_close;
  }
	
  //Gera o tempo atual no fuso-horário de Brasília. No horário oficial, o formato é Hora-3. No horário de verão, Hora-2
  //Infelizmente a mudança de horário de oficial para horário de verão (e vice-versa) tem que ser feita de forma manual
  function geraTempo() {
    //Horário Oficial
    return mktime(date('H')-3, date('i'), date('s'));
    //Horário de Verão
    //return mktime(date('H')-2, date('i'), date('s')); 
  }
    
  //Retorna uma query mysql de um script
  function geraQuery($sql) {
    getConnection();
    try {
      $result = mysql_query($sql);
      if (!$result) {
	throw new Exception("Query inválida: ".mysql_error());
      }
    } finally {
      closeConnection();
      return $result;
    }
  }
    
  //Retorna o número de linhas de uma query mysql
  function geraNumeroLinhas($result) {
    return mysql_num_rows($result);
  }
	
  //Retorna um array com o resultado de uma query mysql
  function geraArrayQuery($result) {
    return mysql_fetch_array($result);
  }
?>

<?php
require_once ("funcoesController.php");
require_once ("dao/impl/TransacaoDaoImpl.php");
require_once ("../model/Transacao.php");
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
				$msgRetorno = salvar($msgRetorno);
				break;
		}
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
	/*case 'GET' :
		$msgRetorno ["erro"] = 999;
		$msgRetorno ["msg"] = "GET Ainda não implementado";
		break;*/
}

$jsonFormat = json_encode ( $msgRetorno );
print ($jsonFormat) ;

function salvar($msgRetorno) {
	$msgRetorno = array (
			"erro" => 0,
			"msg" => "Salva com sucesso." 
	);

	if (trim ( $_REQUEST ["tipo"] ) == "") {
		$msgRetorno ["msg"] = "Tipo não informado.";
		$msgRetorno ["erro"] = 1;
	} else if (trim ( $_REQUEST ["descricao"] ) == "") {
		$msgRetorno ["msg"] = "Descrição não informada.";
		$msgRetorno ["erro"] = 2;
	} else if (trim ( $_REQUEST ["idcategoria"] ) == "") {
		$msgRetorno ["msg"] = "Categoria não informada.";
		$msgRetorno ["erro"] = 3;
	} else if (trim ( $_REQUEST ["data"] ) == "") {
		$msgRetorno ["msg"] = "Data não informada.";
		$msgRetorno ["erro"] = 4;
	} else if (trim ( $_REQUEST ["idpessoa"] ) == "") {
		$msgRetorno ["msg"] = "Pessoa não informada.";
		$msgRetorno ["erro"] = 5;
	} else if (trim ( $_REQUEST ["idusuario"] ) == "") {
		$msgRetorno ["msg"] = "Usuário não autenticado.";
		$msgRetorno ["erro"] = 6;
	} else {

    /*$numeroParcelas = 0;
	    for($i = 1; $i < 5; $i++) {
	      if((isset($_REQUEST["valor".$i])) && (trim($_REQUEST["valor".$i]) != "")) {
	        if (trim($_REQUEST["datavencimento".$i]) == "") {
	          $msgRetorno ["msg"] = "Data de vencimento não informada.";
			  $msgRetorno ["erro"] = 7;
	        }
	        if (trim($_REQUEST["datapagamento".$i]) == "") {
	          $msgRetorno ["msg"] = "Data de pagamento não informada.";
			  $msgRetorno ["erro"] = 8;
	        }
	        $numeroParcelas++;
	      }*/

	    /*if ($numeroParcelas == 0) {
	      $msgRetorno ["msg"] = "Não é possível efetuar transações sem parcela.";
	      $msgRetorno ["erro"] = 9;
	    }*/

	    $transacaoDao = new TransacaoDaoImpl();
	    $idtransacao = $transacaoDao->getProximoId();
	    $transacao = new Transacao($idtransacao, $_REQUEST["descricao"], $_REQUEST["tipo"], $_REQUEST["data"], $_REQUEST["idusuario"], $_REQUEST["idpessoa"], $_REQUEST["idcategoria"]);
	    try {
	      $transacaoDao->salvar($transacao);
	    } catch (Exception $e) {
	      $msgRetorno ["msg"] =  "Erro ao salvar transação: ".$e->getMessage();
		  $msgRetorno ["erro"] = 10;
	    } 


	    /*$parcelaDao = new ParcelaDaoImpl();
	    for($i = 1; $i < 5; $i++) {
	      if((isset($_POST["valor".$i])) && (trim($_POST["valor".$i]) != "")) {
	        $parcela = new Parcela(0, $_POST["valor".$i], $_POST["datapagamento".$i], $_POST["datavencimento".$i], $_POST["pago".$i], $idtransacao);
	        try {
	          $parcelaDao->salvar($parcela);
	        } catch (Exception $e) {
	          $msgRetorno ["msg"] =  "Erro ao salvar parcelas: ".$e->getMessage();
			  $msgRetorno ["erro"] = 11;
	        }
	      }
	    }*/
	return $msgRetorno;
    }
}

?>


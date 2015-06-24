<?php
require_once ("funcoesController.php");
require_once ("dao/impl/TransacaoDaoImpl.php");
require_once ("../model/Transacao.php");
require_once ("dao/impl/ParcelaDaoImpl.php");
require_once ("../model/Parcela.php");
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
	} else if (trim ( $_REQUEST ["numeroparcelas"] ) == "") {
		$msgRetorno ["msg"] = "Não é possível efetuar transações sem parcelas.";
		$msgRetorno ["erro"] = 7;		
	} else {

		if(!isset($_REQUEST["valor"])) {
			$msgRetorno ["msg"] = "Não é possível efetuar transações sem parcelas.";
			$msgRetorno ["erro"] = 8;
		}
		$vetorValor = $_REQUEST["valor"];
		$vetorPago = $_REQUEST["pago"];
		$vetorDataVencimento = $_REQUEST["datavencimento"];
		$vetorDataPagamento = $_REQUEST["datapagamento"];
		$numeroParcelas = $_REQUEST["numeroparcelas"];

		for($i = 0; $i < $numeroParcelas; $i++) {
			if ((trim($vetorValor[$i]) == "") || ($vetorValor[$i] == 0)) {
				$msgRetorno ["msg"] = "Valor da parcela ".$i." não informado.";
				$msgRetorno ["erro"] = 9;	
			} else if (trim($vetorPago[$i]) == "") {
				$msgRetorno ["msg"] = "Não foi informado se a parcela ".$i." foi paga.";
				$msgRetorno ["erro"] = 10;	
			} else if (trim($vetorDataVencimento[$i]) == "") {
				$msgRetorno ["msg"] = "Data de vencimento da parcela ".$i." não informada.";
				$msgRetorno ["erro"] = 11;	
			} else if (trim($vetorDataPagamento[$i]) == "") {
				$msgRetorno ["msg"] = "Data de pagamento da parcela ".$i." não informada.";
				$msgRetorno ["erro"] = 12;	
			}
		}

	    $transacaoDao = new TransacaoDaoImpl();
	    $idtransacao = $transacaoDao->getProximoId();
	    $transacao = new Transacao($idtransacao, $_REQUEST["descricao"], $_REQUEST["tipo"], $_REQUEST["data"], $_REQUEST["idusuario"], $_REQUEST["idpessoa"], $_REQUEST["idcategoria"]);
	    try {
	    	$transacaoDao->salvar($transacao);
	    } catch (Exception $e) {
	    	$msgRetorno ["msg"] =  "Erro ao salvar transação: ".$e->getMessage();
			$msgRetorno ["erro"] = 10;
	    } 

	    $parcelaDao = new ParcelaDaoImpl();
	    for($i = 0; $i < $numeroParcelas; $i++) {
			$parcela = new Parcela(0, $vetorValor[$i], $vetorDataPagamento[$i], $vetorDataVencimento[$i], $vetorPago[$i], $idtransacao);
	        	try {
	          		$parcelaDao->salvar($parcela);
	        	} catch (Exception $e) {
	          		$msgRetorno ["msg"] =  "Erro ao salvar parcelas: ".$e->getMessage();
			  		$msgRetorno ["erro"] = 11;
	        	}
	      	}
    }
	return $msgRetorno;
}

?>


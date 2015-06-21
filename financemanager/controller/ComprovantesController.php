<?php
require_once ("funcoesController.php");

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'GET' :
		defineHeaderRetornoJson();
		
		//Buscar os arquivos da pasta financemanager/arquivos/usert_[codigo do usuario]/[nome do arquivo]
		$file1 = array("caminho" => PATH_FINANCEMANAGER . "/arquivos/user_1/0aaaa.txt", "descricao"=>"0aaaa.txt");
		$file2 = array("caminho" => PATH_FINANCEMANAGER . "/arquivos/user_1/EstadoRainhas.java", "descricao"=>"EstadoRainhas.java");
		$retorno = array(0=>$file1, 1=>$file2);
		
		print (json_encode ( $retorno )) ;
		
		break;
	case 'POST' :
		switch ($_POST ["operacao"]) {
			case "upload" :
				
				$retorno = criaMensagemRetorno ( 99, "Erro indefinido" );
				$campoArquivo = "arquivoParaUpload";
				
				session_start ();
				$target_dir = "../arquivos/user_" . $_SESSION [SESSION_USER_ID] . "/";
				
				if (! file_exists ( $target_dir )) {
					mkdir ( $target_dir, 0777, true );
				}
				
				$target_file = $target_dir . basename ( $_FILES [$campoArquivo] ["name"] );
				$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
				
				// Check if file already exists
				if (file_exists ( $target_file )) {
					$retorno = criaMensagemRetorno ( 1, "Ja existe um arquivo com este nome." );
				} else if ($_FILES [$campoArquivo] ["size"] > 500000) {
					$retorno = criaMensagemRetorno ( 2, "Arquivo muito grande." );
				} else if ($imageFileType == "exe") {
					$retorno = criaMensagemRetorno ( 3, "Formato de arquivo não aceito" );
				} else {
					if (move_uploaded_file ( $_FILES [$campoArquivo] ["tmp_name"], $target_file )) {
						$retorno = criaMensagemRetorno ( 0, "O arquivo " . basename ( $_FILES [$campoArquivo] ["name"] ) . " foi carregado com sucesso." );
					} else {
						$retorno = criaMensagemRetorno ( 4, "Ocorreu um erro ao fazer upload do arquivo" );
					}
				}
				
				// $jsonFormat = json_encode ( $retorno );
				// print ($jsonFormat) ;
				redireMsgErro ( "../view/comprovantes.php", $retorno ["erro"], $retorno ["msg"] );
		}
}
?>
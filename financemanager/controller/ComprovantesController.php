<?php
require_once ("funcoesController.php");

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'GET' :
		defineHeaderRetornoJson();
		
		session_start();
		$directoryUser = PATH_FINANCEMANAGER . "/arquivos/user_" . $_SESSION[SESSION_USER_ID];
// 		$directoryUserServer = __DIR__ . "/../arquivos/user_" . $_SESSION[SESSION_USER_ID];
		$directoryUserServer = "../arquivos/user_" . $_SESSION[SESSION_USER_ID];
		
		$arquivos = array();
			
// 		$filenames = scandir($directoryUserServer);
// 		foreach ($filenames as $filename) {
// 			array_push($arquivos, array("caminho" => $directoryUser . "/" . $filename, "descricao" => $filename));
// 		}
		
		if(is_dir($directoryUserServer)){
			foreach (new DirectoryIterator($directoryUserServer) as $fileInfo) {
				if($fileInfo->isDot()) continue;
				$file =  $fileInfo->getFilename();
				array_push($arquivos, array("caminho" => $directoryUser . "/" . $file, "descricao" => $file));
			}
		}
		
		print (json_encode ( $arquivos )) ;
		
		break;
	case 'POST' :
		switch ($_POST ["operacao"]) {
			case "upload" :
				
				$arquivos = criaMensagemRetorno ( 99, "Erro indefinido" );
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
					$arquivos = criaMensagemRetorno ( 1, "Ja existe um arquivo com este nome." );
				} else if ($_FILES [$campoArquivo] ["size"] > 500000) {
					$arquivos = criaMensagemRetorno ( 2, "Arquivo muito grande." );
				} else if ($imageFileType == "exe") {
					$arquivos = criaMensagemRetorno ( 3, "Formato de arquivo não aceito" );
				} else {
					if (move_uploaded_file ( $_FILES [$campoArquivo] ["tmp_name"], $target_file )) {
						$arquivos = criaMensagemRetorno ( 0, "O arquivo " . basename ( $_FILES [$campoArquivo] ["name"] ) . " foi carregado com sucesso." );
					} else {
						$arquivos = criaMensagemRetorno ( 4, "Ocorreu um erro ao fazer upload do arquivo" );
					}
				}
				
				// $jsonFormat = json_encode ( $retorno );
				// print ($jsonFormat) ;
				redireMsgErro ( "../view/comprovantes.php", $arquivos ["erro"], $arquivos ["msg"] );
		}
}
?>
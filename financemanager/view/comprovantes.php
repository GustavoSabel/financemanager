<!DOCTYPE html>
<?php include("componenteUsuarioLogado.php")?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Comprovante de Pagamentos</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../Resources/TratadorErro.js"></script>
<script src="../Resources/Login.js"></script>
<script src="../Resources/Comprovantes.js"></script>
</head>
<header>
	<div class="cabecalho">
		<h1>Cadastro de categoria</h1>
	</div>
</header>
	<?php include("componenteNavegacao.html")?>
	<section>
	<form method="post" action="../controller/ComprovantesController.php" enctype="multipart/form-data">
		<label class="formulario comprovante" for="arquivoParaUpload">Arquivo
			para upload</label> <input type="file" id="categoria"
			name="arquivoParaUpload" maxlength="255" /> <br /> <input
			type="submit" id="submit" name="enviar" value="Enviar" /> <input
			type="hidden" id="operacao" name="operacao" value="upload" /> <input
			type="reset" value="Limpar" />
	</form>

	<?php
		if (isset ( $_GET ["msg"] )) {
			$msg = $_GET ["msg"];
			$classe = "sucesso";
			if($_GET ["erro"] != 0){
				$classe = "erro";
			}
			echo("<div id='msg' class='" . $classe . "'>");
			echo($msg);
			echo("</div>");
		}
	?>	
<table id="comprovantes">
	<thead>
		<tr>
			<th>Arquivo</th>
			<th>Download</th>
			<th>Visualizar</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

	
	
	
	
	
	
	
	
	
	
	
	
	
</section>
<footer>
	<span> All Rights Reserved. </span>
</footer>
</html>
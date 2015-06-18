<!DOCTYPE html>

<?php
session_start ();
require_once ("../controller/funcoesController.php");
validaSessao ();
$usuario = usuarioLogado ();
?>

<html>
<head>
<meta charset="utf-8">
<title>Cadastro de transação</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../Resources/Login.js"></script>
<script src="../Resources/transacao.js"></script>
</head>
<body>
	<header>
		<div class="cabecalho">
			<h1>Cadastro de transação</h1>
			<br>
		</div>
	</header>
	<?php include("componenteNavegacao.html")?>
	<section>
		<form method="post" action="">
			<div class="formulario transacao">
				<input type="radio" name="tipo" value="despesa" id="despesa" checked>
				<label for="despesa">Despesa</label> <input type="radio" name="tipo"
					value="receita" id="receita"> <label for="receita">Receita</label>
			</div>

			<label class="formulario transacao" for="categoria">Categoria</label>
			<input type="text" id="categoria" name="categoria" /> <br> <label
				class="formulario transacao" for="valorTotal">Valor Total</label> <input
				type="text" id="valorTotal" name="valorTotal" maxlength="10" /> <br>
			<label class="formulario transacao" for="valorTotal">Numero de
				Parcelas</label> <input type="number" min="1" max="99" id="login"
				name="login" /> <br> <label class="formulario transacao" for="senha">Descrição</label>
			<input type="text" id="senha" name="senha" maxlength="150" /> <br> <input
				type="submit" name="submit" id="submit" value="Cadastrar" /> <input
				type="reset" value="Limpar" /> <br>
		</form>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>

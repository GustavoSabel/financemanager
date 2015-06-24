<!DOCTYPE html>
<?php include("componenteUsuarioLogado.php") ?>
<html>
<head>
<meta charset="utf-8"/>
<title>Transações</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script src="../Resources/jquery.min.js"></script>
<script src="../Resources/TratadorErro.js"></script>
<script src="../Resources/Login.js"></script>
<script src="../Resources/Transacao.js"></script>
</head>
<body>
	<header>
		<div class="cabecalho">
			<h1>Transações</h1>
		</div>
	</header>
	<?php include("componenteNavegacao.html") ?>
	<section>
		<span id="editando" class="mensagem"></span>
		<form method="post" action="">
			<input type="hidden" name="operacao" value="salvar">
			<input type="hidden" name="idTransacao" id="idTransacao"/>
		</form>
		<div id="msg"></div>
	</section>
	<?php include("componenteTabelaTransacao.html") ?>
	<!--<footer>
		<span> All Rights Reserved. </span>
	</footer> -->
</body>
</html>


<!DOCTYPE html>

<?php
session_start ();
require_once ("../controller/funcoesController.php");
validaSessao ();
$categoria = usuarioLogado ();
?>

<html>
<head>
<meta charset="utf-8">
<title>Finance Manager</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../Resources/Login.js"></script>
</head>
<body>
	<header>
		<div id="usuarioLogado">
			<span><?php echo($categoria) ?></span> <a href="#" id="logoff">Sair</a>
		</div>
		<div class="cabecalho">
			<img class="logo"
				src="http://www.fronteirasemfim.com.br/wp-content/uploads/2011/08/financisto.png" />
			<h1>Finance Manager</h1>
		</div>
	</header>
  	<?php include("componenteNavegacao.html")?>
	<section>
		<div id="Valores">
			<h2>Resumo do Mês</h2>
			<span>Saldo atual: R$0,00</span><br> <span>Receitas: R$0,00</span><br>
			<span>Despesas: R$0,00</span>
		</div>
		<div id="Pendencias">
			<h2>Pendências</h2>
			<ul>
				<li>Pagar João</li>
				<li>Receber de Tiago</li>
			</ul>
		</div>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>

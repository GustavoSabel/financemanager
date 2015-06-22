<!DOCTYPE html>
<?php include("componenteUsuarioLogado.php") ?>
<html>
<head>
<meta charset="utf-8">
<title>Finance Manager</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script src="../Resources/jquery.min.js"></script>
<script src="../Resources/TratadorErro.js"></script>
<script src="../Resources/Login.js"></script>
</head>
<body>
	<header>
		<div class="cabecalho">
			<img class="logo"
				src="../Resources/Imagens/wallet.png" />
			<h1>Finance Manager</h1>
		</div>
	</header>
  	<?php include("componenteNavegacao.html") ?>
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

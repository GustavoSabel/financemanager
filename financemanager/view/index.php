<!DOCTYPE html>
<?php include("componenteUsuarioLogado.php") ?>
<?php require_once("../controller/dao/impl/TransacaoDaoImpl.php"); ?>
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
			<h2>Resumo</h2>
			<?php
				$transacaoDao = new TransacaoDaoImpl();
				$receitas = $transacaoDao->buscarReceitas();
				$despesas = $transacaoDao->buscarDespesas();
				$receitasNaoPagas = $transacaoDao->buscarReceitasNaoPagas();
				$despesasNaoPagas = $transacaoDao->buscarDespesasNaoPagas();
				echo "<span>Saldo atual: R$".number_format(($receitas-$despesas),2,",",".")."</span><br>";
				echo "<span>Receitas: R$".number_format($receitas,2,",",".")."</span><br>";
				echo "<span>Despesas: R$".number_format($despesas,2,",",".")."</span><br><br>";
				echo "<span>Me devem: R$".number_format($receitasNaoPagas,2,",",".")."</span><br>";
				echo "<span>Devo: R$".number_format($despesasNaoPagas,2,",",".")."</span><br>";
			?>
		</div>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>

<!DOCTYPE html>
<?php include("componenteUsuarioLogado.php") ?>
<html>
<head>
<meta charset="utf-8"/>
<title>Cadastro de categoria</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script src="../Resources/jquery.min.js"></script>
<script src="../Resources/TratadorErro.js"></script>
<script src="../Resources/Login.js"></script>
<script src="../Resources/Categoria.js"></script>
</head>
<body>
	<header>
		<div class="cabecalho">
			<h1>Cadastro de categoria</h1>
		</div>
	</header>
	<?php include("componenteNavegacao.html") ?>
	<section>
		<span id="editando" class="mensagem"></span>
		<form method="post" action="">
			<label class="formulario categoria" for="categoria">Categoria</label>
			<input type="text" id="categoria" name="categoria" maxlength="150" />
			<br/> 
			<input type="submit" id="submit" name="submit" value="Cadastrar" /> 
			<input type="reset" value="Limpar" /> 
			<br/> 
			<input type="hidden" name="operacao" value="salvar">
			<input type="hidden" name="idCategoria" id="idCategoria"/>
		</form>
		<div id="msg"></div>
	</section>
	<?php include("componenteTabelaCategorias.html") ?>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>


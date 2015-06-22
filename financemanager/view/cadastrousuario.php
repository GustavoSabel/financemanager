<!DOCTYPE html>

<?php
session_start ();
require_once ("../controller/funcoesController.php");
if (existeUsuarioLogado ()) {
	gotoHome ();
}
?>

<html>
<head>
<meta charset="utf-8">
<title>Cadastro de usuário</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script src="../Resources/jquery.min.js"></script>
<script src="../Resources/TratadorErro.js"></script>
<script src="../Resources/Login.js"></script>
<script src="../Resources/Usuario.js"></script>
</head>
<body>
	<header>
		<div class="cabecalho">
			<h1>Cadastro de usuário</h1>
			<br>
		</div>
	</header>
	<nav>
		<ul class="navegacao">
			<li><a class="link_texto" href="login.php">Login</a></li>
		</ul>
	</nav>
	<section>
		<form method="post" action="">
			<label class="formulario usuario" for="nome">Nome</label> <input
				type="text" id="nome" name="nome" maxlength="150" /> <br> <label
				class="formulario usuario" for="login">Login</label> <input
				type="text" id="login" name="login" maxlength="50" /> <br> <label
				class="formulario usuario" for="senha">Senha</label> <input
				type="password" id="senha" name="senha" maxlength="150" /> <br> <label
				class="formulario usuario" for="senhaRepetida">Repita a senha</label>
			<input type="password" id="senhaRepetida" name="senhaRepetida"
				maxlength="150" /> <br> <input type="submit" name="submit"
				id="submit" value="Cadastrar" /> <input type="reset" value="Limpar" />
			<br>
		</form>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>


<!DOCTYPE html>

<?php
	session_start();
	require_once("../controller/funcoesController.php");
/*	if(existeUsuarioLogado()) {
		gotoHome();
	}*/
?>

<html>
  <head>
	<meta charset="utf-8">
    <title>Cadastro de usuário</title>
	<link rel="stylesheet" href="../Resources/Estilos.css">
	<!--<script src="../Resources/jquery.min.js"></script>-->
	<!--<script src="../Resources/Login.js"></script>-->
	<!--<script src="../Resources/Usuario.js"></script>-->
  </head>
  <body>
	<header>	
		<div class="cabecalho">
			<h1>Cadastro de usuário</h1><br>
		</div>
	</header>
	<nav>
		<ul class="navegacao">
			<li>
				<a class="link_texto" href="login.php">Login</a>
			</li>
		</ul>
	</nav>
	<section>
		<form method=post action="../controller/UsuarioController.php">
			<input type="hidden" name="operacao" id="operacao" value="salvar"/>
			<label class="formulario usuario" for="nome">Nome</label> 
			<input type="text" id="nome" name="nome" maxlength="150"/> <br>
			<label class="formulario usuario" for="login">Login</label> 
			<input type="text" id="login" name="login" maxlength="50"/> <br>
			<label class="formulario usuario" for="senha">Senha</label> 
			<input type="password" id="senha" name="senha" maxlength="150"/> <br>
			<label class="formulario usuario" for="senharepetida">Repita a senha</label> 
			<input type="password" id="senharepetida" name="senharepetida" maxlength="150"/> <br>
			<input type="submit" name="submit" id="submit" value="Cadastrar"/> 
			<input type="reset" value="Limpar"/> <br>
		<div id="msg">
			<?php
				if (isset($_GET["msg"])){
					$msg=$_GET["msg"];
					echo "<br>".$msg."<br>";
				}
			?>
		</div>
		</form>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
  </body>
</html>
 

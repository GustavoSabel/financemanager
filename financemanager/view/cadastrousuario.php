<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <title>Cadastro de usuário</title>
	<link rel="stylesheet" href="../Resources/Estilos.css">
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
				<a class="link_img" href="../index.php">
					<img src="../Resources/Imagens/home-icon_white_64.png" alt="Home" style="width:16px; height:16px; border:0; padding-top:0px;" />
				</a>
			</li>
			<li>
				<a class="link_texto" href="cadastrocategoria.php">Cadastro de categoria</a>
			</li>
		</ul>
	</nav>
	<section>
		<form method=post action="../controller/UsuarioController.php">

			<label class="formulario usuario" for="nome">Nome</label> <input type="text" id="nome" name="nome" maxlength="150"/> <br>
			<label class="formulario usuario" for="login">Login</label> <input type="text" id="login" name="login" maxlength="50"/> <br>
			<label class="formulario usuario" for="senha">Senha</label> <input type="password" id="senha" name="senha" maxlength="150"/> <br>
			<label class="formulario usuario" for="senhaRepetida">Repita a senha</label> <input type="password" id="senhaRepetida" name="senhaRepetida" maxlength="150"/> <br>
			<input type="submit" name="cadastrar" value="Cadastrar"/> <input type="reset" value="Limpar"/> <br>
			<input type="hidden" name="operacao" value="salvar"> <br>
		
			<?php
				if (isset($_GET["msg"])){
					$msg=$_GET["msg"];
					echo "<br>".$msg."<br>";
				}
			?>
		</form>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
  </body>
</html>
 

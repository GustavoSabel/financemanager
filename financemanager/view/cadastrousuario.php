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

			Nome <input type="text" name="nome" maxlength="150"/> <br>
			Login <input type="text" name="login" maxlength="50"/> <br>
			Senha <input type="password" name="senha" maxlength="150"/> <br>
			Repita a senha <input type="password" name="senhaRepetida" maxlength="150"/> <br>
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
 

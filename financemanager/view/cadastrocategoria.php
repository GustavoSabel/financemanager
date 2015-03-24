﻿<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <title>Cadastro de categoria</title>
	<link rel="stylesheet" href="../Resources/Estilos.css">
  </head>
  <body>	
	<header>
		<div class="cabecalho">
			<h1>Cadastro de categoria</h1>
		</div>
	</header>
	<nav>
		<ul class="navegacao">
			<li>
				<a href="../index.php">
					<img src="../Resourses/Imagens/home-icon_white_64.png" alt="Home" style="width:42px; height:42px; border:0" />
				</a>
			</li>
			<li>
				<a href="cadastrousuario.php">Cadastro de usuário</a>
			</li>
		</ul>
	</nav>
	<section>
		<form method=post action="../controller/CategoriaController.php">
			Categoria <input type="text" name="categoria" maxlength="150"/> <br>
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
 

<!DOCTYPE html>

<?php
	session_start();
	require_once("../controller/funcoesController.php");
	validaSessao();
	$usuario = usuarioLogado();
?>

<html>
  <head>
	<meta charset="utf-8">
    <title>Cadastro de categoria</title>
	<link rel="stylesheet" href="../Resources/Estilos.css">
	<!--<script src="../Resources/jquery.min.js"></script>-->
	<!--<script src="../Resources/Login.js"></script>-->
  </head>
  <body>	
	<header>
		<div id="usuarioLogado"> <span><?php echo($usuario) ?></span> <a href="#" id="logoff">Sair</a> </div>
		<div class="cabecalho">
			<h1>Cadastro de categoria</h1>
		</div>
	</header>
		<?php include("componenteNavegacao.html") ?>
	<section>
		<form method=post action="../controller/categoriaController.php">
			<input type="hidden" name="operacao" id="operacao" value="salvar"/>
			<label class="formulario categoria" for="categoria">Categoria</label> 
			<input type="text" id="descricao" name="descricao" maxlength="150"/> <br>
			<input type="submit" name="cadastrar" value="Cadastrar"/> 
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
 

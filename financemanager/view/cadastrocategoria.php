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
<title>Cadastro de categoria</title>
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
			<h1>Cadastro de categoria</h1>
		</div>
	</header>
	<?php include("componenteNavegacao.html")?>
	<section>
		<form method="post" action="../controller/categoriaController.php">
			<label class="formulario categoria" for="categoria">Categoria</label>
			<input type="text" id="categoria" name="categoria" maxlength="150" />
			<br> <input type="submit" name="cadastrar" value="Cadastrar" /> <input
				type="reset" value="Limpar" /> <br> <input type="hidden"
				name="operacao" value="salvar"> <br>

			<?php
			if (isset ( $_GET ["msg"] )) {
				$msg = $_GET ["msg"];
				echo "<br>" . $msg . "<br>";
			}
			?>
		</form>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>


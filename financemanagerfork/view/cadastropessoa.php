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
    <title>Cadastro de usuário</title>
	<link rel="stylesheet" href="../Resources/Estilos.css">
	<!--<script src="../Resources/jquery.min.js"></script>-->
	<!--<script src="../Resources/Login.js"></script>-->
	<!--<script src="../Resources/Pessoa.js"></script>-->
  </head>
  <body>
	<header>	
		<div class="cabecalho">
			<h1>Cadastro de pessoa</h1><br>
		</div>
	</header>
    	<?php include("componenteNavegacao.html") ?>
	</nav>
	<section>
		<form method=post action="../controller/PessoaController.php">
			<input type="hidden" name="operacao" id="operacao" value="salvar"/>
			<label class="formulario pessoa" for="nome">Nome</label> 
			<input type="text" id="nome" name="nome" maxlength="150"/> <br>
			<label class="formulario pessoa" for="endereco">Endereço</label> 
			<input type="text" id="endereco" name="endereco" maxlength="50"/> <br>
			<label class="formulario pessoa" for="email">E-mail</label> 
			<input type="text" id="email" name="email" maxlength="50"/> <br>
			<label class="formulario pessoa" for="telefone">Telefone</label> 
			<input type="text" id="telefone" name="telefone" maxlength="150"/> <br>
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
 

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
	<!--<script src="../Resources/Transacao.js"></script>-->
  </head>
  <body>
	<header>	
		<div class="cabecalho">
			<h1>Cadastro de transação</h1><br>
		</div>
	</header>
    	<?php include("componenteNavegacao.html") ?>
	</nav>
	<section>
		<form method=post action="../controller/TransacaoController.php">
			<input type="hidden" name="operacao" id="operacao" value="salvar"/>
			<label class="formulario transacao" for="descricao">Descrição</label> 
			<input type="text" id="descricao" name="descricao" maxlength="150"/> </br>
			<label class="formulario transacao" for="categoria">Categoria</label> 
			<select name="idcategoria">
			<?php
				require_once("../controller/dao/impl/CategoriaDaoImpl.php");
				$categoriaDao = new CategoriaDaoImpl();
				$categorias = $categoriaDao->listarTodos();
				while ($categoria = geraArrayQuery($categorias)) {
					echo '<option value="'.$categoria[0].'">'.$categoria[1].'</option>';
				}
			?>
			</select> </br>
			<label class="formulario transacao" for="tipo">Tipo</label> 
			<select name="tipo">
			  <option value="1">Entrada</option>
			  <option value="2">Saída</option>
			</select> </br>
			<label class="formulario transacao" for="data">Data</label> 
			<input type="date" id="data" name="data" maxlength="50"/> </br>
			<label class="formulario transacao" for="pessoa">Pessoa</label> 
			<select name="idpessoa">
			<?php
				require_once("../controller/dao/impl/PessoaDaoImpl.php");
				$pessoaDao = new PessoaDaoImpl();
				$pessoas = $pessoaDao->listarTodos();
				while ($pessoa = geraArrayQuery($pessoas)) {
					echo '<option value="'.$pessoa[0].'">'.$pessoa[1].'</option>';
				}
			?>
			</select> </br>

			<input type="hidden" name="idusuario" id="idusuario" value="1"/> <!-- Temporário - enquanto não ter id usuário na sessão -->

			<input type="submit" name="submit" id="submit" value="Cadastrar"/> 
			<input type="reset" value="Limpar"/> </br>
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
 

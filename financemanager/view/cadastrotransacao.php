<!DOCTYPE html>
<?php include("componenteUsuarioLogado.php") ?>
<?php require_once("../controller/dao/impl/CategoriaDaoImpl.php"); ?>
<?php require_once("../controller/dao/impl/PessoaDaoImpl.php"); ?>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de transação</title>
<link rel="stylesheet" href="../Resources/Estilos.css">
<script src="../Resources/jquery.min.js"></script>
<script src="../Resources/TratadorErro.js"></script>
<script src="../Resources/Login.js"></script>
<script src="../Resources/Transacao.js"></script>
</head>
<body>
	<header>
		<div class="cabecalho">
			<h1>Cadastro de transação</h1>
			<br>
		</div>
	</header>
	<?php include("componenteNavegacao.html") ?>
	<section>
		<form method="post" action="">
			<div class="formulario">
				<input type="radio" name="tipo" id="receita" value="1" checked> <label for="receita">Receita</label>
				<input type="radio" name="tipo" id="despesa" value="2"> <label for="despesa">Despesa</label>
			</div>
			<label class="formulario" for="descricao">Descrição</label> 
			<input type="text" id="descricao" name="descricao" maxlength="150"/> <br/>
			<label class="formulario" for="categoria">Categoria</label> 
			<select id="idcategoria" name="idcategoria" >
			<?php
				$categoriaDao = new CategoriaDaoImpl();
				$result = $categoriaDao->listarTodos();
				while ($categoria = $result->fetch_array()) {
					echo '<option value="'.$categoria[0].'">'.$categoria[1].'</option>';
				}
			?>
			</select> <br/>
			<input type="hidden" id="idusuario" name="idusuario" value=<?php echo '"'.$_SESSION[SESSION_USER_ID].'"' ?>/>
			<input type="hidden" id="data" name="data" value=<?php echo '"'.date('y-m-d') .'"' ?>/>
			<label class="formulario" for="pessoa">Pessoa</label> 
			<select id="idpessoa" name="idpessoa" >
			<?php
				$pessoaDao = new PessoaDaoImpl();
				$pessoas = $pessoaDao->listarTodos();
				while ($pessoa = geraArrayQuery($pessoas)) {
					echo '<option value="'.$pessoa[0].'">'.$pessoa[1].'</option>';
				}
			?>
			</select> <br/> </br>

			<input type="button" value="Adicionar parcela" name="add_input" id="add_input" onClick="addInput();">  
			<label id="parcelas"></label>
			<br><input type="hidden" name="count" id="count" value="">

			<input type="submit" name="submit" id="submit" value="Cadastrar" /> 
			<input type="reset" value="Limpar" /> </br>
		</form>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>

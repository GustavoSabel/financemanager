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
			<div class="formulario transacao">
				<input type="radio" name="tipo" value="1" id="tipo" checked> <label for="receita">Receita</label>
				<input type="radio" name="tipo" value="2" id="tipo"> <label for="despesa">Despesa</label>
			</div>
			<label class="formulario transacao" for="descricao">Descrição</label> 
			<input type="text" id="descricao" name="descricao" maxlength="150"/> </br>
			<label class="formulario transacao" for="categoria">Categoria</label> 
			<select name="idcategoria">
			<?php
				$categoriaDao = new CategoriaDaoImpl();
				$categoria = $categoriaDao->listarTodos();
				while ($categoria = geraArrayQuery($categoria)) {
					echo '<option value="'.$categoria[0].'">'.$categoria[1].'</option>';
				}
			?>
			</select> </br>
			<label class="formulario transacao" for="data">Data</label> 
			<input type="date" id="data" name="data"/> </br>
			<label class="formulario transacao" for="pessoa">Pessoa</label> 
			<select name="idpessoa">
			<?php
				$pessoaDao = new PessoaDaoImpl();
				$pessoas = $pessoaDao->listarTodos();
				while ($pessoa = geraArrayQuery($pessoas)) {
					echo '<option value="'.$pessoa[0].'">'.$pessoa[1].'</option>';
				}
			?>
			</select> </br>
			<input type="hidden" name="idusuario" id="idusuario" value=<?php echo '"'.$_SESSION[SESSION_USER_ID].'"' ?> />
			</br>
			<label class="formulario transacao" for="Parcelas">Parcelas</label> </br>
			<label class="formulario transacao" for="pago">Pago?</label> 
			<label class="formulario transacao" for="valor">Valor</label> 
			<label class="formulario transacao" for="datavencimento">Data de vencimento</label> 
			<label class="formulario transacao" for="datapagamento">Data de pagamento</label> </br>
			<?php
				for($i = 1; $i < 5; $i++) {
					echo '<select name="pago'.$i.'">'.
						 '<option value="0">Não</option>'.
						 '<option value="1">Sim</option>'.
						 '</select>'.
						 '<input type="text" name="valor'.$i.'" maxlength="50"/> '.
						 '<input type="date" name="datavencimento'.$i.'"/> '.
						 '<input type="date" name="datapagamento'.$i.'"/> </br>';
				}
			?>
			<input type="submit" name="submit" id="submit" value="Cadastrar" /> 
			<input type="reset" value="Limpar" /> <br>
		</form>
		<div id="msg"></div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
</body>
</html>

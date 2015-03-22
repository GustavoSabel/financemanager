<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <title>Finance Manager</title>
	<style>
		nav, section { margin: 10px;}
	    body { margin:0; padding:0; }
		html { background-color: #F8F8F8; }
		header { height: 100px; background-color: #F2F2F2; }
		h1 { text-align: center; padding-top: 30px}
		img.logo { float:left; width:100px; height:100px }
		div.cabecalho { width: 400px; margin: 0 auto; }
		nav { clear:both }
		section { min-height: 500px;}
		#Valores { float:left }
		#Pendencias { margin-left: 50px; float:left }

		ul.navegacao {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		ul.navegacao li {
			display:inline;
			margin-right:10px;
		}
		
		footer {  
			background-color: #000000; 
			color:#FFFFFF; 
			text-align:right;  
			padding-top:10px;
			padding-bottom:10px;
		
			width:100%;
			position:absolute;
			bottom:0;
			left:0;
	
		}
		

	</style>
  </head>
  <body>
	<header>
		<div class="cabecalho">
			<img class="logo" src="http://www.fronteirasemfim.com.br/wp-content/uploads/2011/08/financisto.png" />
			<h1>Finance Manager</h1>
		<div>
	</header>
	<nav>
		<ul class="navegacao">
			<li>
				<a href="view/cadastrousuario.php">Cadastro de usuário</a>
			</li>
			<li>
				<a href="view/cadastrocategoria.php">Cadastro de categoria</a>
			</li>
		</ul>
	</nav>
	<section>
		
		<div id="Valores">
			<h2>Resumo do Mês</h2>
			<span>Saldo atual: R$0,00</span><br>
			<span>Receitas: R$0,00</span><br>
			<span>Despesas: R$0,00</span>
		</div>
		<div id="Pendencias">
			<h2>Pendências</h2>
			<ul>
				<li>	
					Pagar João
				</li>
				<li>
					Receber de Tiago
				</li>
			</ul>
		</div>
	</section>
	<footer>
		<span> All Rights Reserved. </span>
	</footer>
  </body>
</html>

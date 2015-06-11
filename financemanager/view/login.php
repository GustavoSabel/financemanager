<!DOCTYPE html>

<?php
  session_start();
  require_once("../controller/funcoesController.php");
  if(existeUsuarioLogado()) {
    gotoHome();
  }
?>

<html>
  <head>
	<meta charset="utf-8">
    <title>Login</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../Resources/Login.js"></script>
	  <link rel="stylesheet" href="../Resources/Estilos.css">
  </head>
  <body>
  	<header>
  		<div class="cabecalho">
        <img class="logo" src="../Resources/Imagens/User.png" />
        <h1>Login</h1>
  		</div>
  	</header>
    <nav>
      <ul class="navegacao">
        <li>
          <a class="link_texto" href="cadastrousuario.php">Cadastrar novo usuário</a>
        </li>
      </ul>
    </nav>
    <section>
      <form id="form" name="form" method="post" action="">
          <label class="formulario login" for="username">Usuário: </label> 
          <input type="text" id="username" name="username" id="username" pattern="[a-z\s]+$" required="required"/> <br/>
          <label class="formulario login" for="password">Senha: </label> 
          <input type="password" id="password" name="password" id="password" /> <br/>
          <input type="submit" id="submitLogin" name="submitLogin" value="validar" />
      </form>
      <a href="cadastrousuario.php">Cadastrar novo usuário</a>
      <div id="msg"></div>
    </section>
  	<footer>
  		<span> All Rights Reserved. </span>
  	</footer>
  </body>
</html>
 

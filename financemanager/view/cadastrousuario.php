<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro de usuário</title>
  </head>
  <body>
    <form method=post action="../controller/UsuarioController.php">
    
      <h1>Cadastro de usuário</h1><br>
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
      
      <a href="../index.php">Página inicial</a>
    </form>
  </body>
</html>
 

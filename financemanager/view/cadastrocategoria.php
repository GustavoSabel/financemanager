<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro de categoria</title>
  </head>
  <body>
    <form method=post action="../controller/CategoriaController.php">
    
      <h1>Cadastro de categoria</h1><br>
      Categoria <input type="text" name="categoria" maxlength="150"/> <br>
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
 

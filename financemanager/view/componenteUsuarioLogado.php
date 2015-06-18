<?php 
session_start ();
require_once ("../controller/funcoesController.php");
validaSessao ();
$categoria = usuarioLogado ();
?>

<div id="usuarioLogado">
	<span><?php echo($categoria) ?></span> <a href="#" id="logoff">Sair</a>
</div>



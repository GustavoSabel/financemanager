<?php 
session_start ();
require_once ("../controller/funcoesController.php");
validaSessao ();
$usuario = usuarioLogado ();
?>

<div id="usuarioLogado">
	<span><?php echo($usuario) ?></span> <a href="#" id="logoff">Sair</a>
</div>



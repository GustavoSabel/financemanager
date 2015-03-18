<?php	
  //Redireciona para outra página enviando uma mensagem
  function redireMsg($local, $mensagem) {
    header("location:".$local."?msg=".$mensagem);
  }
?>

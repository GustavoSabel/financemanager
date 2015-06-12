<?php	
  define("SESSION_USER", "username####");
  //define("PATH_FINANCEMANAGER", "http://". $_SERVER['SERVER_NAME']   ."/financemanager");
  define("PATH_FINANCEMANAGER", "http://".$_SERVER['SERVER_NAME']."/FURB/Trabalho/trunk/financemanager");

  //Redireciona para outra página enviando uma mensagem
  function redireMsg($local, $mensagem) {
    header("location:".$local."?msg=".$mensagem);
  }

  function existeUsuarioLogado() {
    return (isset($_SESSION[SESSION_USER]) && ($_SESSION[SESSION_USER] != ""));
  }
  
  //Caso não tenha nenhum usuário logado, redireciona para a tela de login
  function validaSessao() { 
    if(existeUsuarioLogado() == false) {
      gotoLogin();
      exit;
    }
  }

  function gotoHome() {
    header('Location: '. PATH_FINANCEMANAGER . '/view/index.php');
  }

  function gotoLogin() {
    header('Location: '. PATH_FINANCEMANAGER . '/view/Login.php');
  }

  //Retorna o usuario logado
  function usuarioLogado() {
      if(existeUsuarioLogado()) {
        return $_SESSION[SESSION_USER];
      }
      else {
        return "Nenhum usuário logado";
      }
  }

?>

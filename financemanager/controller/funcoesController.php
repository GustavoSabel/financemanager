<?php	
  define("SESSION_USER", "username####");
  define("PATH_FINANCEMANAGER", "http://localhost/FURB/Trabalho/trunk/financemanager");

  //Redireciona para outra página enviando uma mensagem
  function redireMsg($local, $mensagem) {
    header("location:".$local."?msg=".$mensagem);
  }

  //Verifica se existe alguma sessão de algum usuario
  function existeUsuarioLogado() {
    if (!isset($_SESSION[SESSION_USER])) {
      $_SESSION[SESSION_USER] == "";
    }
    if ($_SESSION[SESSION_USER] != "") {
      return true;
    }
    return false;      
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

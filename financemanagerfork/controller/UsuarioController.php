<?php
  require_once("../controller/dao/impl/UsuarioDaoImpl.php");
  require_once("../controller/funcoesController.php");
  require_once("../model/Usuario.php");

  $cadastrousuario = "../view/cadastrousuario.php";

  if (trim($_POST["operacao"]) == "salvar") {
    if (trim($_POST["nome"]) == "") {
      redireMsg($cadastrousuario, "Nome não informado.");
    }
    if (trim($_POST["login"]) == "") {
      redireMsg($cadastrousuario, "Login não informado.");
    }
    if (trim($_POST["senha"]) == "") {
      redireMsg($cadastrousuario, "Senha não informada.");
    }
    if (trim($_POST["senharepetida"]) == "") {
      redireMsg($cadastrousuario, "Repita a senha.");
    }
    if (strcmp(trim($_POST["senha"]),trim($_POST["senharepetida"])) != 0) {
      redireMsg($cadastrousuario, "Senhas não conferem.");
    }

    $usuario = new Usuario(0, $_POST["nome"], $_POST["login"], $_POST["senha"]);
    $usuarioDao = new UsuarioDaoImpl();
    if ($usuarioDao->buscar($usuario->getLogin()) != null) {
      redireMsg($cadastrousuario, 'Usuário com login "'.$usuario->getLogin().'" já existe.');
    }
    $usuarioDao->salvar($usuario);
    redireMsg($cadastrousuario, "Salvo com sucesso");
  }

?>

